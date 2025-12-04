<?php
declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';

// Logout
if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php');
    exit;
}

// Nur Admin hat Zugriff
if (!hasPermission('manage_users')) {
    http_response_code(403);
    exit('Zugriff verweigert. Nur Admins können Einstellungen ändern.');
}

$appName = $config['app_name'];
$brandName = $config['brand_name'];

$message = null;
$messageType = null;

// Alle verfügbaren Dateitypen (erweiterbar)
$availableFileTypes = [
    'pdf' => ['name' => 'PDF-Dokumente', 'mime' => 'application/pdf'],
    'xlsx' => ['name' => 'Excel (XLSX)', 'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
    'xlsm' => ['name' => 'Excel mit Makros (XLSM)', 'mime' => 'application/vnd.ms-excel.sheet.macroEnabled.12'],
    'xls' => ['name' => 'Excel alt (XLS)', 'mime' => 'application/vnd.ms-excel'],
    'doc' => ['name' => 'Word alt (DOC)', 'mime' => 'application/msword'],
    'docx' => ['name' => 'Word (DOCX)', 'mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
    'ppt' => ['name' => 'PowerPoint alt (PPT)', 'mime' => 'application/vnd.ms-powerpoint'],
    'pptx' => ['name' => 'PowerPoint (PPTX)', 'mime' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation'],
    'txt' => ['name' => 'Text-Dateien', 'mime' => 'text/plain'],
    'csv' => ['name' => 'CSV-Dateien', 'mime' => 'text/csv'],
    'zip' => ['name' => 'ZIP-Archive', 'mime' => 'application/zip'],
    'rar' => ['name' => 'RAR-Archive', 'mime' => 'application/x-rar-compressed'],
    'jpg' => ['name' => 'JPEG-Bilder', 'mime' => 'image/jpeg'],
    'jpeg' => ['name' => 'JPEG-Bilder', 'mime' => 'image/jpeg'],
    'png' => ['name' => 'PNG-Bilder', 'mime' => 'image/png'],
    'gif' => ['name' => 'GIF-Bilder', 'mime' => 'image/gif'],
    'svg' => ['name' => 'SVG-Grafiken', 'mime' => 'image/svg+xml'],
];

/* ---------------------------------------------------
   SETTINGS SPEICHERN
--------------------------------------------------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } elseif (isset($_POST['save_settings'])) {
        $newSettings = loadSettings();

        // Dateitypen aktualisieren
        $selectedTypes = $_POST['file_types'] ?? [];
        if (empty($selectedTypes)) {
            $message = 'Mindestens ein Dateityp muss erlaubt sein.';
            $messageType = 'danger';
        } else {
            $newSettings['allowed_extensions'] = array_values($selectedTypes);

            // Max. Dateigröße aktualisieren
            $maxSize = (int)($_POST['max_file_size'] ?? 50);
            if ($maxSize < 1 || $maxSize > 1000) {
                $message = 'Dateigröße muss zwischen 1 und 1000 MB liegen.';
                $messageType = 'danger';
            } else {
                $newSettings['max_file_size_mb'] = $maxSize;

                // Passwort-Reset Features
                $newSettings['enable_password_reset'] = isset($_POST['enable_password_reset']);
                $newSettings['enable_access_request'] = isset($_POST['enable_access_request']);
                $newSettings['admin_email'] = trim($_POST['admin_email'] ?? '');
                $newSettings['sender_email'] = trim($_POST['sender_email'] ?? '');

                if (saveSettings($newSettings)) {
                    $message = 'Einstellungen erfolgreich gespeichert.';
                    $messageType = 'success';

                    // Config neu laden
                    $config['allowed_extensions'] = $newSettings['allowed_extensions'];
                    $config['max_file_size_mb'] = $newSettings['max_file_size_mb'];
                } else {
                    $message = 'Fehler beim Speichern der Einstellungen.';
                    $messageType = 'danger';
                }
            }
        }
    }
}

$currentSettings = loadSettings();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Einstellungen - <?= htmlspecialchars($appName) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-flammi mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="assets/logo.png" alt="Logo" class="logo-img">
            <?= htmlspecialchars($brandName) ?> - <?= htmlspecialchars($appName) ?>
        </a>
        <div class="ms-auto">
            <?php
            $username = $_SESSION['user'];
$isAdmin = true;
$currentPage = 'settings';
$pendingRequestsCount = getPendingRequestsCount();
include __DIR__ . '/includes/user_dropdown.php';
?>
        </div>
    </div>
</nav>

<main class="container">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>⚙️ Einstellungen</h2>
        <a href="index.php" class="btn btn-secondary">← Zurück</a>
    </div>

    <?php if ($message): ?>
        <div class="alert alert-<?= $messageType ?> alert-dismissible fade show">
            <?= htmlspecialchars($message) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
        <input type="hidden" name="save_settings" value="1">

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-4" id="settingsTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="files-tab" data-bs-toggle="tab" 
                        data-bs-target="#files" type="button" role="tab">
                    📁 Datei-Einstellungen
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="users-tab" data-bs-toggle="tab" 
                        data-bs-target="#users" type="button" role="tab">
                    👥 Benutzer-Features
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="email-tab" data-bs-toggle="tab" 
                        data-bs-target="#email" type="button" role="tab">
                    📧 E-Mail-Konfiguration
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="settingsTabContent">
            
            <!-- TAB 1: Datei-Einstellungen -->
            <div class="tab-pane fade show active" id="files" role="tabpanel">
                
                <!-- Dateitypen -->
                <div class="settings-section">
                    <h5>📁 Erlaubte Dateitypen</h5>
                    <p class="text-muted">Wähle aus, welche Dateitypen hochgeladen werden dürfen.</p>
            
                    <div class="row">
                        <?php foreach ($availableFileTypes as $ext => $info): ?>
                            <div class="col-md-4 col-sm-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           name="file_types[]" value="<?= htmlspecialchars($ext) ?>" 
                                           id="type_<?= htmlspecialchars($ext) ?>"
                                           <?= in_array($ext, $currentSettings['allowed_extensions']) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="type_<?= htmlspecialchars($ext) ?>">
                                        <strong>.<?= htmlspecialchars($ext) ?></strong> - <?= htmlspecialchars($info['name']) ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            
                    <div class="mt-3 p-3 bg-light rounded">
                        <strong>Aktuell erlaubt:</strong>
                        <?php foreach ($currentSettings['allowed_extensions'] as $ext): ?>
                            <span class="badge bg-primary">.<?= htmlspecialchars($ext) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Dateigröße -->
                <div class="settings-section">
                    <h5>📦 Maximale Dateigröße</h5>
                    <p class="text-muted">Lege fest, wie groß hochgeladene Dateien maximal sein dürfen.</p>
            
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="number" class="form-control" name="max_file_size" 
                                       value="<?= htmlspecialchars((string)$currentSettings['max_file_size_mb']) ?>"
                                       min="1" max="1000" required>
                                <span class="input-group-text">MB</span>
                            </div>
                            <small class="text-muted">Wert zwischen 1 und 1000 MB</small>
                        </div>
                        <div class="col-md-6">
                            <div class="alert alert-info mb-0">
                                <strong>💡 Hinweis:</strong> Die php.ini muss entsprechend konfiguriert sein 
                                (<code>upload_max_filesize</code> und <code>post_max_size</code>).
                            </div>
                        </div>
                    </div>
            
                    <div class="mt-3 p-3 bg-light rounded">
                        <strong>PHP-Limits:</strong><br>
                        <code>upload_max_filesize</code>: <?= ini_get('upload_max_filesize') ?><br>
                        <code>post_max_size</code>: <?= ini_get('post_max_size') ?><br>
                        <code>max_file_uploads</code>: <?= ini_get('max_file_uploads') ?>
                    </div>
                </div>
                
            </div><!-- Ende TAB 1: Datei-Einstellungen -->
            
            <!-- TAB 2: Benutzer-Features -->
            <div class="tab-pane fade" id="users" role="tabpanel">
                
                <!-- Passwort-Reset & Zugangsanfragen -->
                <div class="settings-section">
                    <h5>🔐 Passwort-Reset & Zugangsanfragen</h5>
                    <p class="text-muted">Konfiguriere, ob Benutzer ihr Passwort zurücksetzen oder Zugang anfragen können.</p>
            
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="enable_password_reset" 
                                       id="enable_password_reset" 
                                       <?= ($currentSettings['enable_password_reset'] ?? true) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="enable_password_reset">
                                    <strong>🔑 "Passwort vergessen" aktivieren</strong><br>
                                    <small class="text-muted">Benutzer können ihr Passwort per E-Mail zurücksetzen (nur wenn E-Mail hinterlegt)</small>
                                </label>
                            </div>
                        </div>
                
                        <div class="col-md-6 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="enable_access_request" 
                                       id="enable_access_request" 
                                       <?= ($currentSettings['enable_access_request'] ?? true) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="enable_access_request">
                                    <strong>📝 "Zugang anfragen" aktivieren</strong><br>
                                    <small class="text-muted">Neue Benutzer können einen Account anfordern (Admin muss genehmigen)</small>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div><!-- Ende TAB 2: Benutzer-Features -->
            
            <!-- TAB 3: E-Mail-Konfiguration -->
            <div class="tab-pane fade" id="email" role="tabpanel">
                
                <div class="settings-section">
                    <h5>📧 E-Mail-Konfiguration</h5>
                    <p class="text-muted">Konfiguriere E-Mail-Adressen für Benachrichtigungen und Versand.</p>
            
                    <div class="mb-3">
                        <label class="form-label"><strong>Admin E-Mail (optional)</strong></label>
                        <input type="email" class="form-control" name="admin_email" 
                               value="<?= htmlspecialchars($currentSettings['admin_email'] ?? '') ?>" 
                               placeholder="admin@example.com">
                        <small class="text-muted">
                            Diese E-Mail erhält Benachrichtigungen über Zugangsanfragen.
                        </small>
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label"><strong>Absender E-Mail (optional)</strong></label>
                        <input type="email" class="form-control" name="sender_email" 
                               value="<?= htmlspecialchars($currentSettings['sender_email'] ?? '') ?>" 
                               placeholder="noreply@deinedomain.de">
                        <small class="text-muted">
                            <strong>Wichtig für IONOS/Hosting:</strong> Verwende eine existierende E-Mail-Adresse deiner Domain als Absender.
                            Sonst wird die Mail vom Server abgelehnt. Wenn leer, wird <code>noreply@<?= $_SERVER['HTTP_HOST'] ?></code> verwendet.
                        </small>
                    </div>
            
                    <div class="alert alert-warning">
                        <strong>⚠️ Wichtig:</strong> Für den E-Mail-Versand muss PHP's <code>mail()</code> Funktion konfiguriert sein. 
                        Bei XAMPP unter Windows ist dies standardmäßig nicht aktiviert. 
                        Alternativ wird der Reset-Link in der Session gespeichert und kann manuell weitergegeben werden.
                    </div>
                </div>
                
            </div><!-- Ende TAB 3: E-Mail-Konfiguration -->
            
        </div><!-- Ende Tab Content -->

        <!-- Speichern Button (unter allen Tabs) -->
        <div class="text-end">
            <button type="submit" class="btn btn-success btn-lg">
                💾 Einstellungen speichern
            </button>
        </div>
    </form>

</main>

<footer class="py-3 mt-5 text-center text-muted footer-default">
    <?= htmlspecialchars($appName) ?> © 2025 | Lizenz: MIT
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
