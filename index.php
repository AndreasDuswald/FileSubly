<?php
declare(strict_types=1);

session_start();

// Konfiguration laden
require __DIR__ . '/config.php';

// Werte aus config holen
$appName      = $config['app_name'];
$brandName    = $config['brand_name'];

$downloadDir  = $config['download_dir'];
$allowedExts  = $config['allowed_extensions'];

$loginError = null;


/* ---------------------------------------------------
   LOGOUT
--------------------------------------------------- */
if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}


/* ---------------------------------------------------
   LOGIN mit Rate Limiting
--------------------------------------------------- */
if (!($_SESSION['logged_in'] ?? false)) {

    // Rate Limiting initialisieren
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['login_locked_until'] = 0;
    }

    // Prüfen ob Account gesperrt ist
    $currentTime = time();
    if ($_SESSION['login_locked_until'] > $currentTime) {
        $remainingMinutes = ceil(($_SESSION['login_locked_until'] - $currentTime) / 60);
        $loginError = "Zu viele fehlgeschlagene Versuche. Bitte warte noch {$remainingMinutes} Minute(n).";
        renderLogin($brandName, $appName, $loginError);
        exit;
    }

    // Lock abgelaufen? Zurücksetzen
    if ($_SESSION['login_locked_until'] > 0 && $_SESSION['login_locked_until'] <= $currentTime) {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['login_locked_until'] = 0;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $user = trim($_POST['username'] ?? '');
        $pass = $_POST['password'] ?? '';

        $users = loadUsers();

        if (isset($users[$user]) && password_verify($pass, $users[$user]['password'])) {

            // Login erfolgreich - Counter zurücksetzen
            $_SESSION['login_attempts'] = 0;
            $_SESSION['login_locked_until'] = 0;
            $_SESSION['logged_in'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['show_welcome'] = true;

            // Wenn Fallback-User verwendet wurde, sofort users.json neu erstellen
            if (isset($users[$user]['is_fallback']) && $users[$user]['is_fallback'] === true) {
                unset($users[$user]['is_fallback']); // Marker entfernen
                saveUsers($users);
                $_SESSION['fallback_restored'] = true;
            }

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }

        // Login fehlgeschlagen - Counter erhöhen
        $_SESSION['login_attempts']++;

        if ($_SESSION['login_attempts'] >= 5) {
            $_SESSION['login_locked_until'] = time() + (15 * 60); // 15 Minuten
            $loginError = "Zu viele fehlgeschlagene Versuche. Account gesperrt für 15 Minuten.";
        } else {
            $remainingAttempts = 5 - $_SESSION['login_attempts'];
            $loginError = "Zugangsdaten falsch. Noch {$remainingAttempts} Versuch(e) übrig.";
        }
    }

    renderLogin($brandName, $appName, $loginError);
    exit;
}


/* ---------------------------------------------------
   UPLOAD (nur Admin)
--------------------------------------------------- */
$uploadSuccess = null;
$uploadError = null;

// Cancel upload confirmation
if (isset($_GET['cancel_upload'])) {
    unset($_SESSION['upload_pending'], $_SESSION['upload_confirm_needed']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Delete file (mit Permission)
if (hasPermission('delete') && isset($_POST['delete_file'])) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $_SESSION['upload_error'] = "Ungültige Anfrage (CSRF-Token fehlt).";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    $fileName = basename($_POST['delete_file']);
    $filePath = $downloadDir . '/' . $fileName;

    if (file_exists($filePath) && is_file($filePath)) {
        if (unlink($filePath)) {
            $_SESSION['upload_success'] = "Datei '{$fileName}' wurde gelöscht.";
        } else {
            $_SESSION['upload_error'] = "Fehler beim Löschen der Datei '{$fileName}'.";
        }
    } else {
        $_SESSION['upload_error'] = "Datei '{$fileName}' existiert nicht.";
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Save sort order (mit Permission)
if (hasPermission('sort') && isset($_POST['save_order'])) {
    // CSRF-Check für AJAX
    $headers = getallheaders();
    $csrfToken = $headers['X-CSRF-Token'] ?? $_POST['csrf_token'] ?? '';
    if (!verifyCsrfToken($csrfToken)) {
        echo json_encode(['success' => false, 'error' => 'CSRF token invalid']);
        exit;
    }

    $order = json_decode($_POST['save_order'], true);
    if (is_array($order)) {
        $orderFile = $downloadDir . '/.sort_order.json';
        file_put_contents($orderFile, json_encode($order, JSON_PRETTY_PRINT));
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit;
}

// Confirm overwrite (mit Permission)
if (hasPermission('upload') && isset($_POST['confirm_overwrite'])) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $_SESSION['upload_error'] = "Ungültige Anfrage (CSRF-Token fehlt).";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    $pending = $_SESSION['upload_pending'] ?? null;
    if ($pending && file_exists($pending['tmp_name'])) {
        $targetPath = $downloadDir . '/' . $pending['name'];
        if (move_uploaded_file($pending['tmp_name'], $targetPath)) {
            $_SESSION['upload_success'] = "Datei '{$pending['name']}' wurde überschrieben.";
        } else {
            $_SESSION['upload_error'] = "Fehler beim Überschreiben der Datei.";
        }
    }
    unset($_SESSION['upload_pending'], $_SESSION['upload_confirm_needed']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// New upload (mit Permission)
if (hasPermission('upload') && isset($_FILES['uploadfile'])) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $_SESSION['upload_error'] = "Ungültige Anfrage (CSRF-Token fehlt).";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    $file = $_FILES['uploadfile'];

    if ($file['error'] === UPLOAD_ERR_OK) {

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $fileName = basename($file['name']);
        $targetPath = $downloadDir . '/' . $fileName;

        // Extension prüfen
        if (!in_array($ext, $allowedExts)) {
            $uploadError = "Dateityp '.{$ext}' ist nicht erlaubt. Erlaubt sind: " . implode(', ', $allowedExts);
            $_SESSION['upload_error'] = $uploadError;
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }

        // MIME-Type prüfen (Sicherheit)
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        // Erlaubte MIME-Types pro Extension
        $allowedMimes = [
            'pdf' => ['application/pdf'],
            'xlsx' => ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
            'xlsm' => ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel.sheet.macroEnabled.12'],
            'xls' => ['application/vnd.ms-excel'],
            'doc' => ['application/msword'],
            'docx' => ['application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
            'txt' => ['text/plain'],
            'csv' => ['text/csv', 'text/plain'],
            'zip' => ['application/zip', 'application/x-zip-compressed'],
        ];

        if (isset($allowedMimes[$ext]) && !in_array($mimeType, $allowedMimes[$ext])) {
            $uploadError = "Ungültiger Dateityp. Datei hat MIME-Type '{$mimeType}', erwartet wurde: " . implode(' oder ', $allowedMimes[$ext]);
            $_SESSION['upload_error'] = $uploadError;
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }

        // Dateigröße prüfen
        $maxSizeBytes = $config['max_file_size_mb'] * 1024 * 1024;
        if ($file['size'] > $maxSizeBytes) {
            $sizeMB = round($file['size'] / 1024 / 1024, 2);
            $uploadError = "Datei ist zu groß ({$sizeMB} MB). Maximal erlaubt: {$config['max_file_size_mb']} MB.";
            $_SESSION['upload_error'] = $uploadError;
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }

        // Check if file exists
        if (file_exists($targetPath)) {
            // Save temp file info for confirmation
            $tempPath = sys_get_temp_dir() . '/' . uniqid('upload_') . '_' . $fileName;
            if (move_uploaded_file($file['tmp_name'], $tempPath)) {
                $_SESSION['upload_pending'] = [
                    'tmp_name' => $tempPath,
                    'name' => $fileName
                ];
                $_SESSION['upload_confirm_needed'] = $fileName;
                // Don't redirect here - show confirmation on same page load
            } else {
                $_SESSION['upload_error'] = "Fehler beim temporären Speichern der Datei.";
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            }
        } else {
            // Upload the file
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                $_SESSION['upload_success'] = "Datei '{$fileName}' wurde erfolgreich hochgeladen.";
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            } else {
                $_SESSION['upload_error'] = "Fehler beim Hochladen der Datei.";
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            }
        }
    } else {
        $uploadError = match($file['error']) {
            UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE => 'Datei ist zu groß.',
            UPLOAD_ERR_NO_FILE => 'Keine Datei ausgewählt.',
            default => 'Upload-Fehler (Code: ' . $file['error'] . ')'
        };
        $_SESSION['upload_error'] = $uploadError;
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}


/* ---------------------------------------------------
   LOGIN-SEITE
--------------------------------------------------- */
function renderLogin(string $brand, string $title, ?string $error): void
{
    $settings = loadSettings();
    $showPasswordReset = $settings['enable_password_reset'] ?? true;
    $showAccessRequest = $settings['enable_access_request'] ?? true;
    $resetSuccess = $_SESSION['password_reset_success'] ?? false;
    unset($_SESSION['password_reset_success']);

    ?>
    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="utf-8">
        <title><?= htmlspecialchars($title) ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body class="login-body">

    <div class="login-card card">
        <div class="card-body text-center">

            <img src="assets/logo.png" alt="Logo" class="logo-medium">

            <h1 class="h4 mb-1"><?= htmlspecialchars($brand) ?></h1>
            <p class="text-muted mb-4"><?= htmlspecialchars($title) ?></p>

            <?php if ($resetSuccess): ?>
                <div class="alert alert-success">
                    ✅ Passwort erfolgreich geändert! Du kannst dich jetzt anmelden.
                </div>
            <?php endif; ?>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="post">
                <input type="text" name="username" class="form-control mb-3" placeholder="Benutzername" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Passwort" required>
                <button class="btn btn-flammi w-100 mb-3">Anmelden</button>
            </form>
            
            <?php if ($showPasswordReset || $showAccessRequest): ?>
                <div class="d-flex gap-2 justify-content-center flex-wrap">
                    <?php if ($showPasswordReset): ?>
                        <a href="forgot_password.php" class="btn btn-sm btn-outline-secondary">
                            🔑 Passwort vergessen?
                        </a>
                    <?php endif; ?>
                    <?php if ($showAccessRequest): ?>
                        <a href="request_access.php" class="btn btn-sm btn-outline-secondary">
                            📝 Zugang anfragen
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="mt-3 text-center">
                <small class="text-muted">
                    <?= htmlspecialchars($title) ?> v<?= htmlspecialchars(getAppVersion()) ?> | 
                    <a href="https://github.com/AndreasDuswald/FileSubly/tree/master" target="_blank" rel="noopener" class="text-muted">ℹ️ Info</a>
                </small>
            </div>
        </div>
    </div>

    </body>
    </html>
    <?php
}


/* ---------------------------------------------------
   DATEIEN EINLESEN
--------------------------------------------------- */
$files = [];
$orderFile = $downloadDir . '/.sort_order.json';
$statsFile = $downloadDir . '/.download_stats.json';
$savedOrder = [];
$downloadStats = [];

// Load saved sort order
if (file_exists($orderFile)) {
    $savedOrder = json_decode(file_get_contents($orderFile), true) ?? [];
}

// Load download statistics
if (file_exists($statsFile)) {
    $downloadStats = json_decode(file_get_contents($statsFile), true) ?? [];
}

if (is_dir($downloadDir)) {

    $handle = opendir($downloadDir);

    while (($file = readdir($handle)) !== false) {

        if ($file === '.' || $file === '..' || $file === '.sort_order.json' || $file === '.download_stats.json') {
            continue;
        }

        $path = $downloadDir . '/' . $file;

        if (!is_file($path)) {
            continue;
        }

        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExts)) {
            continue;
        }

        $files[] = [
            'name' => $file,
            'mtime' => filemtime($path),
            'ext' => $ext,
            'downloads' => $downloadStats[$file] ?? 0,
        ];
    }

    closedir($handle);
}

// Sortieren nach gespeicherter Reihenfolge oder Datum
if (!empty($savedOrder)) {
    usort($files, function ($a, $b) use ($savedOrder) {
        $posA = array_search($a['name'], $savedOrder);
        $posB = array_search($b['name'], $savedOrder);

        // If both in saved order, use that
        if ($posA !== false && $posB !== false) {
            return $posA <=> $posB;
        }
        // New files (not in saved order) go to top by date
        if ($posA === false && $posB !== false) {
            return -1;
        }
        if ($posA !== false && $posB === false) {
            return 1;
        }

        // Both new, sort by date
        return $b['mtime'] <=> $a['mtime'];
    });
} else {
    // Sortieren nach Datum (Standard)
    usort($files, fn ($a, $b) => $b['mtime'] <=> $a['mtime']);
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($appName) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-flammi mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="assets/logo.png" alt="Logo" class="logo-img">
            <?= htmlspecialchars($brandName) ?> - <?= htmlspecialchars($appName) ?>
        </a>

        <div class="ms-auto">
            <?php
            $username = $_SESSION['user'];
$isAdmin = hasPermission('manage_users');
$currentPage = 'index';
$pendingRequestsCount = $isAdmin ? getPendingRequestsCount() : 0;
include __DIR__ . '/includes/user_dropdown.php';
?>
        </div>
    </div>
</nav>

<main class="container">

    <?php
    // Fallback restored warning
    if (isset($_SESSION['fallback_restored'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
        echo '⚠️ <strong>Notfall-Wiederherstellung:</strong> Die Benutzerdatenbank war beschädigt oder fehlend. ';
        echo 'Ein neuer Admin-Account wurde erstellt. Bitte erstelle weitere Benutzer in der Benutzerverwaltung.';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
        unset($_SESSION['fallback_restored']);
    }

// Welcome message after login
if (isset($_SESSION['show_welcome'])) {
    $username = htmlspecialchars($_SESSION['user']);
    echo '<div class="alert alert-info alert-dismissible fade show" role="alert" id="welcomeAlert">';
    echo "👋 Willkommen zurück, {$username}!";
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    unset($_SESSION['show_welcome']);
}

// Display upload feedback messages
if (isset($_SESSION['upload_success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
    echo htmlspecialchars($_SESSION['upload_success']);
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    unset($_SESSION['upload_success']);
}
if (isset($_SESSION['upload_error'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
    echo htmlspecialchars($_SESSION['upload_error']);
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    unset($_SESSION['upload_error']);
}
?>

    <div class="card p-4 mb-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h5 mb-0">Dokumente</h2>
            <?php if (hasPermission('merge')): ?>
                <div id="pdfMergeActions">
                    <button type="button" class="btn btn-sm btn-success" onclick="mergePDFs()">
                        📄 Ausgewählte PDFs zusammenführen (<span id="selectedCount">0</span>)
                    </button>
                </div>
            <?php endif; ?>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <?php if (hasPermission('sort')): ?>
                            <th class="col-drag"></th>
                        <?php endif; ?>
                        <?php if (hasPermission('merge')): ?>
                            <th class="col-checkbox">
                                <input type="checkbox" id="selectAllPdf" title="Alle PDFs auswählen">
                            </th>
                        <?php endif; ?>
                        <th>Typ</th>
                        <th>Dateiname</th>
                        <th>Aktualiesiert am</th>
                        <?php if (hasPermission('manage_users')): ?>
                            <th class="text-center">Downloads</th>
                        <?php endif; ?>
                        <th class="text-end">Aktionen</th>
                    </tr>
                </thead>

                <tbody id="fileTable">
                <?php foreach ($files as $f): ?>
                    <tr class="<?= hasPermission('sort') ? 'draggable-row' : '' ?>" 
                        data-filename="<?= htmlspecialchars($f['name']) ?>"
                        draggable="<?= hasPermission('sort') ? 'true' : 'false' ?>">
                        <?php if (hasPermission('sort')): ?>
                            <td class="drag-handle">⋮⋮</td>
                        <?php endif; ?>
                        <?php if (hasPermission('merge')): ?>
                            <td>
                                <?php if ($f['ext'] === 'pdf'): ?>
                                    <input type="checkbox" class="pdf-checkbox" 
                                           value="<?= htmlspecialchars($f['name']) ?>"
                                           onchange="updatePdfSelection()">
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                        <td data-label="Typ"><?= fileIcon($f['ext']) ?></td>

                        <td data-label="Datei"><?= htmlspecialchars($f['name']) ?></td>

                        <td data-label="Datum">
                            <?= date('d.m.Y H:i', $f['mtime']) ?>
                        </td>

                        <?php if (hasPermission('manage_users')): ?>
                            <td data-label="Downloads" class="text-center">
                                <span class="badge bg-secondary"><?= $f['downloads'] ?>×</span>
                            </td>
                        <?php endif; ?>

                        <td data-label="Aktion" class="text-end">
                            <div class="file-actions">
                                <button
                                    class="btn btn-primary btn-download"
                                    onclick="downloadFile('<?= htmlspecialchars($f['name'], ENT_QUOTES) ?>')"
                                    title="Herunterladen"
                                >📥</button>
                                <?php if (hasPermission('delete')): ?>
                                    <button
                                        class="btn btn-danger btn-delete"
                                        onclick="confirmDelete('<?= htmlspecialchars($f['name'], ENT_QUOTES) ?>')"
                                        title="Löschen"
                                    >🗑️</button>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <?php if (hasPermission('upload')): ?>

        <hr class="my-4">

        <h5>Datei hochladen</h5>

        <?php if (isset($_SESSION['upload_confirm_needed'])): ?>
            <div class="alert alert-warning" role="alert">
                <strong>⚠️ Datei existiert bereits:</strong> <?= htmlspecialchars($_SESSION['upload_confirm_needed']) ?><br>
                <div class="mt-2">
                    <form method="post" class="form-inline">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                        <input type="hidden" name="confirm_overwrite" value="1">
                        <button type="submit" class="btn btn-sm btn-danger">Ja, überschreiben</button>
                    </form>
                    <a href="?cancel_upload=1" class="btn btn-sm btn-secondary">Abbrechen</a>
                </div>
            </div>
        <?php endif; ?>

        <div id="dropzone" class="dropzone">
            <strong>Datei hierher ziehen</strong><br>oder klicken
            <div class="mt-2 text-muted dropzone-info">
                Erlaubt: <?php
                    $extLabels = array_map(fn ($e) => strtoupper($e), $allowedExts);
        echo implode(', ', $extLabels);
        ?><br>
                Max. Dateigröße: <?= $config['max_file_size_mb'] ?> MB
            </div>
        </div>

        <form id="uploadForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
            <input type="file" name="uploadfile" id="uploadInput" class="form-hidden"
                   accept=".<?= implode(',.', $allowedExts) ?>">
        </form>

    <?php endif; ?>

</main>

<!-- Delete Confirmation Form (hidden) -->
<form id="deleteForm" method="post" class="form-hidden">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
    <input type="hidden" name="delete_file" id="deleteFileName">
</form>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
function confirmDelete(fileName) {
    if (confirm('Datei "' + fileName + '" wirklich löschen?')) {
        document.getElementById('deleteFileName').value = fileName;
        document.getElementById('deleteForm').submit();
    }
}

<?php if (hasPermission('sort')): ?>
// Drag & Drop Sortierung
const fileTable = document.getElementById('fileTable');
let draggedRow = null;

fileTable.addEventListener('dragstart', (e) => {
    if (e.target.tagName === 'TR') {
        draggedRow = e.target;
        e.target.classList.add('dragging');
    }
});

fileTable.addEventListener('dragend', (e) => {
    if (e.target.tagName === 'TR') {
        e.target.classList.remove('dragging');
        saveOrder();
    }
});

fileTable.addEventListener('dragover', (e) => {
    e.preventDefault();
    const afterElement = getDragAfterElement(fileTable, e.clientY);
    if (afterElement == null) {
        fileTable.appendChild(draggedRow);
    } else {
        fileTable.insertBefore(draggedRow, afterElement);
    }
});

function getDragAfterElement(container, y) {
    const draggableElements = [...container.querySelectorAll('tr.draggable-row:not(.dragging)')];

    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;

        if (offset < 0 && offset > closest.offset) {
            return { offset: offset, element: child };
        } else {
            return closest;
        }
    }, { offset: Number.NEGATIVE_INFINITY }).element;
}

function saveOrder() {
    const rows = fileTable.querySelectorAll('tr.draggable-row');
    const order = Array.from(rows).map(row => row.dataset.filename);
    
    const formData = new FormData();
    formData.append('csrf_token', '<?= generateCsrfToken() ?>');
    order.forEach((filename, index) => {
        formData.append('order[]', filename);
    });
    
    fetch('save_sort_order.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (!data.success) {
            console.error('Sortierung speichern fehlgeschlagen:', data.error);
        }
    })
    .catch(error => console.error('Fehler beim Speichern:', error));
}

// PDF Selection & Merge
function updatePdfSelection() {
    const checkboxes = document.querySelectorAll('.pdf-checkbox:checked');
    const count = checkboxes.length;
    document.getElementById('selectedCount').textContent = count;
    document.getElementById('pdfMergeActions').style.display = count > 0 ? 'block' : 'none';
}

document.getElementById('selectAllPdf')?.addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.pdf-checkbox');
    checkboxes.forEach(cb => cb.checked = this.checked);
    updatePdfSelection();
});

function mergePDFs() {
    const checkboxes = document.querySelectorAll('.pdf-checkbox:checked');
    if (checkboxes.length === 0) {
        alert('Bitte wähle mindestens eine PDF aus.');
        return;
    }
    
    // Dateinamen sammeln
    const fileNames = Array.from(checkboxes).map(cb => cb.value);
    
    // Bestätigungsdialog anzeigen
    const confirmModal = new bootstrap.Modal(document.getElementById('mergeConfirmModal'));
    document.getElementById('mergeFileList').innerHTML = fileNames.map(name => 
        `<li class="list-group-item"><svg class="svg-inline" width="20" height="20" viewBox="0 0 24 24">
            <rect width="24" height="24" rx="4" fill="#dc3545"/>
            <path d="M16 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7l-3-4z" fill="white" opacity="0.15"/>
            <text x="12" y="16" font-size="10" fill="white" font-weight="bold" text-anchor="middle">PDF</text>
        </svg> ${name}</li>`
    ).join('');
    document.getElementById('mergeFileCount').textContent = fileNames.length;
    confirmModal.show();
}

function confirmMerge() {
    const checkboxes = document.querySelectorAll('.pdf-checkbox:checked');
    
    // Loading-Animation anzeigen
    showLoading('PDFs werden zusammengeführt...');
    
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'merge_pdf.php';
    
    // CSRF-Token hinzufügen
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = 'csrf_token';
    csrfInput.value = '<?= generateCsrfToken() ?>';
    form.appendChild(csrfInput);
    
    checkboxes.forEach(cb => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'pdf_files[]';
        input.value = cb.value;
        form.appendChild(input);
    });
    
    document.body.appendChild(form);
    form.submit();
    
    // Overlay nach 3 Sekunden automatisch ausblenden (Fallback)
    setTimeout(() => {
        hideLoading();
    }, 3000);
}

// Download-Funktion mit Feedback
function downloadFile(filename) {
    // Loading-Animation anzeigen
    showLoading('Download wird vorbereitet...');
    
    // iframe für Download erstellen (damit Seite nicht neu lädt)
    const iframe = document.createElement('iframe');
    iframe.style.display = 'none';
    iframe.src = 'download.php?file=' + encodeURIComponent(filename);
    document.body.appendChild(iframe);
    
    // Overlay ausblenden sobald Download startet
    setTimeout(() => {
        hideLoading();
    }, 1500);
    
    // iframe nach Download entfernen (erst nach 10 Sekunden)
    setTimeout(() => {
        iframe.remove();
    }, 10000);
}

// Helper-Funktionen für Loading-Overlay
function showLoading(text) {
    document.getElementById('loadingText').textContent = text;
    document.getElementById('loadingOverlay').style.display = 'flex';
}

function hideLoading() {
    document.getElementById('loadingOverlay').style.display = 'none';
}
<?php endif; ?>

const dropzone = document.getElementById('dropzone');
const uploadInput = document.getElementById('uploadInput');
const uploadForm = document.getElementById('uploadForm');

// Auto-hide welcome message after 4 seconds
const welcomeAlert = document.getElementById('welcomeAlert');
if (welcomeAlert) {
    setTimeout(() => {
        const bsAlert = bootstrap.Alert.getOrCreateInstance(welcomeAlert);
        bsAlert.close();
    }, 4000);
}

if (dropzone) {

    dropzone.addEventListener('click', () => uploadInput.click());

    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.style.background = '#e3ffe3';
        dropzone.style.borderColor = '#28a745';
    });

    dropzone.addEventListener('dragleave', () => {
        dropzone.style.background = '#fafafa';
        dropzone.style.borderColor = '#aaa';
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.style.background = '#fafafa';
        dropzone.style.borderColor = '#aaa';

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            // Create a new DataTransfer object and assign it
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(files[0]);
            uploadInput.files = dataTransfer.files;
            uploadForm.submit();
        }
    });

    uploadInput.addEventListener('change', () => {
        if (uploadInput.files.length > 0) {
            uploadForm.submit();
        }
    });
}

// ========================================
// KEYBOARD SHORTCUTS
// ========================================
document.addEventListener('keydown', (e) => {
    // Ignore shortcuts when typing in input fields
    if (e.target.matches('input, textarea, select')) {
        return;
    }
    
    // ESC - Close modals and overlays
    if (e.key === 'Escape') {
        // Close loading overlay
        const overlay = document.getElementById('loadingOverlay');
        if (overlay && overlay.style.display !== 'none') {
            overlay.style.display = 'none';
            return;
        }
        
        // Close Bootstrap modals
        const openModals = document.querySelectorAll('.modal.show');
        openModals.forEach(modal => {
            const bsModal = bootstrap.Modal.getInstance(modal);
            if (bsModal) bsModal.hide();
        });
    }
    
    <?php if (hasPermission('upload')): ?>
    // Ctrl+U - Open upload dialog
    if ((e.ctrlKey || e.metaKey) && e.key === 'u') {
        e.preventDefault();
        uploadInput.click();
    }
    <?php endif; ?>
    
    <?php if (hasPermission('merge')): ?>
    // Ctrl+M - Merge selected PDFs
    if ((e.ctrlKey || e.metaKey) && e.key === 'm') {
        e.preventDefault();
        const checkedBoxes = document.querySelectorAll('.file-checkbox:checked');
        if (checkedBoxes.length >= 2) {
            mergePDFs();
        }
    }
    <?php endif; ?>
    
    <?php if (hasPermission('delete')): ?>
    // Delete - Delete selected file (only if exactly one is selected)
    if (e.key === 'Delete') {
        e.preventDefault();
        const checkedBoxes = document.querySelectorAll('.file-checkbox:checked');
        if (checkedBoxes.length === 1) {
            const filename = checkedBoxes[0].value;
            if (confirm('Datei "' + filename + '" wirklich löschen?')) {
                deleteFile(filename);
            }
        }
    }
    <?php endif; ?>
    
    // ? or Ctrl+/ - Show keyboard shortcuts help
    if (e.key === '?' || ((e.ctrlKey || e.metaKey) && e.key === '/')) {
        e.preventDefault();
        showShortcutsHelp();
    }
});

// Show shortcuts help modal
function showShortcutsHelp() {
    const shortcuts = [
        { key: 'ESC', desc: 'Modals und Overlays schließen' }
        <?php if (hasPermission('upload')): ?>
        , { key: 'Ctrl+U', desc: 'Datei hochladen' }
        <?php endif; ?>
        <?php if (hasPermission('merge')): ?>
        , { key: 'Ctrl+M', desc: 'Ausgewählte PDFs zusammenführen' }
        <?php endif; ?>
        <?php if (hasPermission('delete')): ?>
        , { key: 'Delete', desc: 'Ausgewählte Datei löschen' }
        <?php endif; ?>
        , { key: '? oder Ctrl+/', desc: 'Diese Hilfe anzeigen' }
    ];
    
    let html = '<div class="table-responsive"><table class="table table-sm">';
    html += '<thead><tr><th>Tastenkürzel</th><th>Aktion</th></tr></thead><tbody>';
    shortcuts.forEach(s => {
        html += `<tr><td><kbd class="badge bg-secondary">${s.key}</kbd></td><td>${s.desc}</td></tr>`;
    });
    html += '</tbody></table></div>';
    
    // Create or update modal
    let modal = document.getElementById('shortcutsModal');
    if (!modal) {
        modal = document.createElement('div');
        modal.id = 'shortcutsModal';
        modal.className = 'modal fade';
        modal.innerHTML = `
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">⌨️ Tastenkürzel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" id="shortcutsModalBody"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                    </div>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
    }
    
    document.getElementById('shortcutsModalBody').innerHTML = html;
    const bsModal = new bootstrap.Modal(modal);
    bsModal.show();
}
</script>

<!-- Merge Bestätigungsdialog -->
<div class="modal fade" id="mergeConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">📄 PDFs zusammenführen?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Folgende <strong><span id="mergeFileCount">0</span> PDFs</strong> werden zusammengeführt:</p>
                <ul class="list-group" id="mergeFileList">
                    <!-- Wird via JS gefüllt -->
                </ul>
                <div class="alert alert-info mt-3 mb-0">
                    <small>ℹ️ Die PDFs werden in der angezeigten Reihenfolge zusammengeführt.</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                <button type="button" class="btn btn-success" onclick="confirmMerge()" data-bs-dismiss="modal">
                    ✅ Zusammenführen
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Loading Overlay mit Flammy (für Merge und Download) -->
<div id="loadingOverlay" class="loading-overlay" onclick="this.style.display='none';">
    <div class="loading-content">
        <div class="loading-spinner">
            <div class="loading-ring"></div>
            <img src="assets/flammy.png" alt="Loading" class="loading-logo" onerror="this.src='assets/logo.png';">
        </div>
        <p class="loading-text" id="loadingText">Wird verarbeitet...</p>
        <p class="loading-hint">(Klicke zum Schließen)</p>
    </div>
</div>

<style>
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<?php renderFooter(); ?>

</body>
</html>
