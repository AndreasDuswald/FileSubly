<?php
declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';
require __DIR__ . '/bibliothek_config.php';

// Logout
if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php');
    exit;
}

// Login required
if (!($_SESSION['logged_in'] ?? false)) {
    header('Location: index.php');
    exit;
}

$appName = $config['app_name'];
$brandName = $config['brand_name'];
$currentUser = $_SESSION['user'];

$manager = getBibliothekManager();
$isAdmin = hasPermission('manage_users');

// Load all users for access management
$users = loadUsers();

// Get libraries for current user
if ($isAdmin) {
    $libraries = $manager->getAllLibraries();
} else {
    $libraries = $manager->getLibrariesForUser($currentUser);
}

// Selected library
$selectedLibrary = null;
$selectedSlug = $_GET['lib'] ?? null;

if ($selectedSlug) {
    $selectedLibrary = $manager->getLibrary($selectedSlug);

    // Check access
    if ($selectedLibrary && !$isAdmin) {
        $userPerms = $selectedLibrary->getUserPermissions($currentUser);
        if (empty($userPerms)) {
            $selectedLibrary = null;
        }
    }
}

$message = null;
$messageType = null;

// Handle file order saving
if ($selectedLibrary && isset($_POST['save_order'])) {
    if (verifyCsrfToken($_POST['csrf_token'] ?? '') && ($isAdmin || $selectedLibrary->hasPermission($currentUser, 'sort'))) {
        $order = json_decode($_POST['save_order'], true);
        if (is_array($order)) {
            $orderFile = __DIR__ . '/bibliothek/' . $selectedLibrary->getSlug() . '/.order.json';
            file_put_contents($orderFile, json_encode($order, JSON_PRETTY_PRINT));
        }
    }
    exit; // AJAX response
}

// Handle file upload
if ($selectedLibrary && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    // CSRF check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } elseif (!$selectedLibrary->hasPermission($currentUser, 'upload') && !$isAdmin) {
        $message = 'Keine Upload-Berechtigung für diese Bibliothek.';
        $messageType = 'danger';
    } else {
        $file = $_FILES['file'];
        $fileName = basename($file['name']);
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Check extension
        $allowedExts = $selectedLibrary->getAllowedExtensions();
        if (!in_array($ext, $allowedExts)) {
            $message = "Dateityp '.{$ext}' ist in dieser Bibliothek nicht erlaubt.";
            $messageType = 'danger';
        } else {
            // Check size
            $maxBytes = $selectedLibrary->getMaxSizeMB() * 1024 * 1024;
            if ($file['size'] > $maxBytes) {
                $sizeMB = round($file['size'] / 1024 / 1024, 2);
                $message = "Datei zu groß ({$sizeMB} MB). Max: {$selectedLibrary->getMaxSizeMB()} MB";
                $messageType = 'danger';
            } else {
                // Upload
                $targetPath = $selectedLibrary->getPath() . '/' . $fileName;

                if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                    $message = "Datei '{$fileName}' erfolgreich hochgeladen.";
                    $messageType = 'success';
                } else {
                    $message = 'Upload fehlgeschlagen.';
                    $messageType = 'danger';
                }
            }
        }
    }
}

// Handle file delete
if ($selectedLibrary && isset($_POST['delete_file'])) {
    // CSRF check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } elseif (!$selectedLibrary->hasPermission($currentUser, 'delete') && !$isAdmin) {
        $message = 'Keine Lösch-Berechtigung für diese Bibliothek.';
        $messageType = 'danger';
    } else {
        $fileName = basename($_POST['delete_file']);
        $filePath = $selectedLibrary->getPath() . '/' . $fileName;

        if (file_exists($filePath) && unlink($filePath)) {
            $message = "Datei '{$fileName}' gelöscht.";
            $messageType = 'success';
        } else {
            $message = 'Löschen fehlgeschlagen.';
            $messageType = 'danger';
        }
    }
}

// Handle access management update
if ($selectedLibrary && isset($_POST['update_access']) && $isAdmin) {
    // CSRF check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } else {
        $currentConfig = [
            'display_name' => $selectedLibrary->getDisplayName(),
            'description' => $selectedLibrary->getDescription(),
            'allowed_extensions' => $selectedLibrary->getAllowedExtensions(),
            'max_size_mb' => $selectedLibrary->getMaxSizeMB(),
            'permissions' => []
        ];

        // Parse permissions from POST
        foreach ($users as $username => $userData) {
            $userPerms = [];
            if (isset($_POST['perm_' . $username . '_download'])) {
                $userPerms[] = 'download';
            }
            if (isset($_POST['perm_' . $username . '_upload'])) {
                $userPerms[] = 'upload';
            }
            if (isset($_POST['perm_' . $username . '_delete'])) {
                $userPerms[] = 'delete';
            }
            if (isset($_POST['perm_' . $username . '_sort'])) {
                $userPerms[] = 'sort';
            }
            if (isset($_POST['perm_' . $username . '_merge'])) {
                $userPerms[] = 'merge';
            }

            if (!empty($userPerms)) {
                $currentConfig['permissions'][$username] = $userPerms;
            }
        }

        if ($selectedLibrary->saveConfig($currentConfig)) {
            $message = '✅ Berechtigungen erfolgreich aktualisiert.';
            $messageType = 'success';
        } else {
            $message = 'Fehler beim Speichern der Berechtigungen.';
            $messageType = 'danger';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Bibliothek - <?= htmlspecialchars($appName) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/bibliothek.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-flammi mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="assets/logo.png" alt="Logo" class="logo-img">
            <?= htmlspecialchars($brandName) ?>
        </a>
        <div class="ms-auto">
            <?php
            $username = $currentUser;
$currentPage = 'bibliothek';
$pendingRequestsCount = $isAdmin ? getPendingRequestsCount() : 0;
include __DIR__ . '/includes/user_dropdown.php';
?>
        </div>
    </div>
</nav>

<main class="container">

    <?php if ($message): ?>
        <div class="alert alert-<?= $messageType ?> alert-dismissible fade show">
            <?= htmlspecialchars($message) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['merge_success'])): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= htmlspecialchars($_SESSION['merge_success']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['merge_success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['merge_error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= htmlspecialchars($_SESSION['merge_error']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['merge_error']); ?>
    <?php endif; ?>

    <?php if (!$selectedLibrary): ?>
        <!-- Library Overview -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0">📚 Meine Bibliotheken</h2>
            <?php if ($isAdmin): ?>
                <a href="bibliothek_admin.php" class="btn btn-primary btn-sm">
                    ➕ Neue Bibliothek erstellen
                </a>
            <?php endif; ?>
        </div>

        <?php if (empty($libraries)): ?>
            <div class="empty-state">
                <div class="empty-state-icon">📚</div>
                <h5>Keine Bibliotheken verfügbar</h5>
                <p class="text-muted">
                    <?= $isAdmin ? 'Erstelle deine erste Bibliothek.' : 'Du hast noch keinen Zugriff auf Bibliotheken.' ?>
                </p>
            </div>
        <?php else: ?>
            <div class="row g-3">
                <?php foreach ($libraries as $lib): ?>
                    <?php
        $files = $lib->getFiles();
                    $fileCount = count($files);
                    $userPerms = $lib->getUserPermissions($currentUser);
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card library-card h-100" onclick="window.location.href='?lib=<?= urlencode($lib->getSlug()) ?>'">
                            <div class="card-body">
                                <div class="library-icon">
                                    📁
                                </div>
                                <h5 class="card-title"><?= htmlspecialchars($lib->getDisplayName()) ?></h5>
                                <p class="card-text text-muted small">
                                    <?= htmlspecialchars($lib->getDescription()) ?>
                                </p>
                                <div class="library-stats">
                                    <span>📄 <?= $fileCount ?> Dateien</span>
                                </div>
                                <div class="mt-2">
                                    <?php if ($isAdmin || in_array('download', $userPerms)): ?>
                                        <span class="badge bg-success permission-badge">📥 Download</span>
                                    <?php endif; ?>
                                    <?php if ($isAdmin || in_array('upload', $userPerms)): ?>
                                        <span class="badge bg-primary permission-badge">📤 Upload</span>
                                    <?php endif; ?>
                                    <?php if ($isAdmin || in_array('delete', $userPerms)): ?>
                                        <span class="badge bg-danger permission-badge">🗑️ Löschen</span>
                                    <?php endif; ?>
                                    <?php if ($isAdmin || in_array('sort', $userPerms)): ?>
                                        <span class="badge bg-info permission-badge">🔀 Sortieren</span>
                                    <?php endif; ?>
                                    <?php if ($isAdmin || in_array('merge', $userPerms)): ?>
                                        <span class="badge bg-warning permission-badge">📄 Merge</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    <?php else: ?>
        <!-- Library File Browser -->
        <div class="library-breadcrumb">
            <a href="bibliothek.php">📚 Bibliotheken</a> / 
            <strong><?= htmlspecialchars($selectedLibrary->getDisplayName()) ?></strong>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?= htmlspecialchars($selectedLibrary->getDisplayName()) ?></h5>
                <div>
                    <?php if ($isAdmin): ?>
                        <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#accessModal">
                            👥 Zugriff verwalten
                        </button>
                    <?php endif; ?>
                    <?php if ($isAdmin || $selectedLibrary->hasPermission($currentUser, 'upload')): ?>
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                            📤 Datei hochladen
                        </button>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <?php if (!empty($selectedLibrary->getDescription())): ?>
                    <p class="text-muted"><?= htmlspecialchars($selectedLibrary->getDescription()) ?></p>
                <?php endif; ?>

                <?php
                $files = $selectedLibrary->getFiles();
$canSort = $isAdmin || $selectedLibrary->hasPermission($currentUser, 'sort');
$canMerge = $isAdmin || $selectedLibrary->hasPermission($currentUser, 'merge');
$canDownload = $isAdmin || $selectedLibrary->hasPermission($currentUser, 'download');
$canDelete = $isAdmin || $selectedLibrary->hasPermission($currentUser, 'delete');

if (empty($files)):
    ?>
                    <div class="empty-state">
                        <div class="empty-state-icon">📄</div>
                        <h6>Keine Dateien vorhanden</h6>
                        <p class="text-muted small">Lade die erste Datei hoch.</p>
                    </div>
                <?php else: ?>

                    <?php if ($canMerge): ?>
                    <div class="d-flex justify-content-end mb-3">
                        <div id="pdfMergeActions" style="display: none;">
                            <button type="button" class="btn btn-sm btn-success" onclick="mergePDFs()">
                                📄 Ausgewählte PDFs zusammenführen (<span id="selectedCount">0</span>)
                            </button>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <?php if ($canSort): ?>
                                        <th class="col-drag"></th>
                                    <?php endif; ?>
                                    <?php if ($canMerge): ?>
                                        <th class="col-checkbox">
                                            <input type="checkbox" id="selectAllPdf" title="Alle PDFs auswählen">
                                        </th>
                                    <?php endif; ?>
                                    <th>Typ</th>
                                    <th>Dateiname</th>
                                    <th>Aktualisiert am</th>
                                    <?php if ($isAdmin): ?>
                                        <th class="text-center">Downloads</th>
                                    <?php endif; ?>
                                    <th class="text-end">Aktionen</th>
                                </tr>
                            </thead>

                            <tbody id="fileTable">
                                <?php foreach ($files as $file):
                                    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                                    ?>
                                    <tr class="<?= $canSort ? 'draggable-row' : '' ?>" 
                                        data-filename="<?= htmlspecialchars($file['name']) ?>"
                                        draggable="<?= $canSort ? 'true' : 'false' ?>">
                                        <?php if ($canSort): ?>
                                            <td class="drag-handle">⋮⋮</td>
                                        <?php endif; ?>
                                        <?php if ($canMerge): ?>
                                            <td>
                                                <?php if ($ext === 'pdf'): ?>
                                                    <input type="checkbox" class="pdf-checkbox" 
                                                           value="<?= htmlspecialchars($file['name']) ?>"
                                                           onchange="updatePdfSelection()">
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                        <td data-label="Typ"><?= fileIcon($ext) ?></td>

                                        <td data-label="Datei"><?= htmlspecialchars($file['name']) ?></td>

                                        <td data-label="Datum">
                                            <?= date('d.m.Y H:i', $file['modified']) ?>
                                        </td>

                                        <?php if ($isAdmin): ?>
                                            <td data-label="Downloads" class="text-center">
                                                <span class="badge bg-secondary"><?= $file['downloads'] ?? 0 ?>×</span>
                                            </td>
                                        <?php endif; ?>

                                        <td data-label="Aktion" class="text-end">
                                            <div class="file-actions">
                                                <?php if ($canDownload): ?>
                                                    <a class="btn btn-primary btn-download"
                                                       href="bibliothek_download.php?lib=<?= urlencode($selectedLibrary->getSlug()) ?>&file=<?= urlencode($file['name']) ?>" 
                                                       title="Herunterladen">📥</a>
                                                <?php endif; ?>
                                                <?php if ($canDelete): ?>
                                                    <button class="btn btn-danger btn-delete"
                                                            onclick="confirmDelete('<?= htmlspecialchars($file['name'], ENT_QUOTES) ?>')"
                                                            title="Löschen">🗑️</button>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

</main>

<!-- Upload Modal -->
<?php if ($selectedLibrary && ($isAdmin || $selectedLibrary->hasPermission($currentUser, 'upload'))): ?>
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                
                <div class="modal-header">
                    <h5 class="modal-title">Datei hochladen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Datei auswählen</label>
                        <input type="file" name="file" class="form-control" required>
                        <div class="form-text">
                            Erlaubte Dateitypen: <?= implode(', ', $selectedLibrary->getAllowedExtensions()) ?><br>
                            Max. Größe: <?= $selectedLibrary->getMaxSizeMB() ?> MB
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="submit" class="btn btn-primary">Hochladen</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Access Management Modal -->
<?php if ($selectedLibrary && $isAdmin): ?>
<div class="modal fade" id="accessModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                <input type="hidden" name="update_access" value="1">
                
                <div class="modal-header">
                    <h5 class="modal-title">👥 Zugriff verwalten</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body">
                    <div class="alert alert-info">
                        <small>
                            <strong>Tipp:</strong> Setze Häkchen bei den Berechtigungen, die jeder Benutzer für diese Bibliothek haben soll.
                        </small>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Benutzer</th>
                                    <th class="text-center">📥 Download</th>
                                    <th class="text-center">📤 Upload</th>
                                    <th class="text-center">🗑️ Löschen</th>
                                    <th class="text-center">🔀 Sortieren</th>
                                    <th class="text-center">📄 Merge PDFs</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $username => $userData): ?>
                                    <?php
                                        $userPerms = $selectedLibrary->getUserPermissions($username);
                                    ?>
                                    <tr>
                                        <td>
                                            <strong><?= htmlspecialchars($username) ?></strong>
                                            <small class="text-muted ms-1">(<?= $userData['role'] ?>)</small>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="perm_<?= $username ?>_download" 
                                                   class="form-check-input"
                                                   <?= in_array('download', $userPerms) ? 'checked' : '' ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="perm_<?= $username ?>_upload"
                                                   class="form-check-input"
                                                   <?= in_array('upload', $userPerms) ? 'checked' : '' ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="perm_<?= $username ?>_delete"
                                                   class="form-check-input"
                                                   <?= in_array('delete', $userPerms) ? 'checked' : '' ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="perm_<?= $username ?>_sort"
                                                   class="form-check-input"
                                                   <?= in_array('sort', $userPerms) ? 'checked' : '' ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="perm_<?= $username ?>_merge"
                                                   class="form-check-input"
                                                   <?= in_array('merge', $userPerms) ? 'checked' : '' ?>>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="submit" class="btn btn-primary">💾 Speichern</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Delete Form -->
<form id="deleteForm" method="post" class="form-hidden">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
    <input type="hidden" name="delete_file" id="deleteFileName">
</form>

<!-- Merge Bestätigungsdialog -->
<?php if ($selectedLibrary && ($isAdmin || $selectedLibrary->hasPermission($currentUser, 'merge'))): ?>
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

<!-- Loading Overlay mit Flammy -->
<div id="loadingOverlay" class="loading-overlay" onclick="this.style.display='none';">
    <div class="loading-content">
        <div class="loading-spinner">
            <div class="loading-ring"></div>
            <img src="assets/flammy.png" alt="Loading" class="loading-logo" onerror="this.src='assets/logo.png';">
        </div>
        <p class="loading-text">PDFs werden zusammengeführt...</p>
        <p class="loading-hint">(Klicke zum Schließen)</p>
    </div>
</div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function confirmDelete(fileName) {
    if (confirm('Datei "' + fileName + '" wirklich löschen?')) {
        document.getElementById('deleteFileName').value = fileName;
        document.getElementById('deleteForm').submit();
    }
}

<?php if ($selectedLibrary && ($isAdmin || $selectedLibrary->hasPermission($currentUser, 'sort'))): ?>
// Drag & Drop Sortierung
const fileTable = document.getElementById('fileTable');
if (fileTable) {
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
        
        fetch(window.location.href, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'csrf_token=<?= generateCsrfToken() ?>&save_order=' + encodeURIComponent(JSON.stringify(order))
        });
    }
}
<?php endif; ?>

<?php if ($selectedLibrary && ($isAdmin || $selectedLibrary->hasPermission($currentUser, 'merge'))): ?>
// PDF Selection & Merge
function updatePdfSelection() {
    const checkboxes = document.querySelectorAll('.pdf-checkbox:checked');
    const count = checkboxes.length;
    const countSpan = document.getElementById('selectedCount');
    const mergeActions = document.getElementById('pdfMergeActions');
    
    if (countSpan) countSpan.textContent = count;
    if (mergeActions) mergeActions.style.display = count > 0 ? 'block' : 'none';
}

const selectAllPdf = document.getElementById('selectAllPdf');
if (selectAllPdf) {
    selectAllPdf.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.pdf-checkbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
        updatePdfSelection();
    });
}

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
    document.getElementById('loadingOverlay').style.display = 'flex';
    
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = 'bibliothek_merge.php';
    
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = 'csrf_token';
    csrfInput.value = '<?= generateCsrfToken() ?>';
    form.appendChild(csrfInput);
    
    const libInput = document.createElement('input');
    libInput.type = 'hidden';
    libInput.name = 'library';
    libInput.value = '<?= htmlspecialchars($selectedLibrary->getSlug()) ?>';
    form.appendChild(libInput);
    
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
        document.getElementById('loadingOverlay').style.display = 'none';
    }, 3000);
}
<?php endif; ?>
</script>

<?php renderFooter(); ?>

</body>
</html>
