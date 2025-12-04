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

// Only admins
if (!hasPermission('manage_users')) {
    http_response_code(403);
    exit('Zugriff verweigert. Nur Admins können Bibliotheken verwalten.');
}

$appName = $config['app_name'];
$brandName = $config['brand_name'];
$currentUser = $_SESSION['user'];

$manager = getBibliothekManager();
$users = loadUsers();

$message = null;
$messageType = null;

// Handle create library
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    // CSRF check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } elseif ($_POST['action'] === 'create_library') {
        $slug = trim($_POST['slug'] ?? '');
        $displayName = trim($_POST['display_name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $allowedExts = $_POST['allowed_extensions'] ?? [];
        $maxSize = (int)($_POST['max_size_mb'] ?? 50);

        if (empty($slug) || empty($displayName)) {
            $message = 'Bitte Slug und Anzeigename angeben.';
            $messageType = 'danger';
        } else {
            $config = [
                'display_name' => $displayName,
                'description' => $description,
                'allowed_extensions' => $allowedExts,
                'max_size_mb' => $maxSize,
                'permissions' => []
            ];

            if ($manager->createLibrary($slug, $config)) {
                $message = "Bibliothek '{$displayName}' erfolgreich erstellt.";
                $messageType = 'success';
            } else {
                $message = 'Fehler beim Erstellen der Bibliothek. Slug möglicherweise bereits vergeben.';
                $messageType = 'danger';
            }
        }
    } elseif ($_POST['action'] === 'delete_library') {
        $slug = $_POST['slug'] ?? '';

        if ($manager->deleteLibrary($slug)) {
            $message = "Bibliothek gelöscht.";
            $messageType = 'success';
        } else {
            $message = 'Fehler beim Löschen.';
            $messageType = 'danger';
        }
    } elseif ($_POST['action'] === 'update_permissions') {
        $slug = $_POST['slug'] ?? '';
        $library = $manager->getLibrary($slug);

        if ($library) {
            $currentConfig = [
                'display_name' => $library->getDisplayName(),
                'description' => $library->getDescription(),
                'allowed_extensions' => $library->getAllowedExtensions(),
                'max_size_mb' => $library->getMaxSizeMB(),
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

                if (!empty($userPerms)) {
                    $currentConfig['permissions'][$username] = $userPerms;
                }
            }

            if ($library->saveConfig($currentConfig)) {
                $message = 'Berechtigungen aktualisiert.';
                $messageType = 'success';
            } else {
                $message = 'Fehler beim Speichern.';
                $messageType = 'danger';
            }
        }
    }
}

$libraries = $manager->getAllLibraries();
$selectedLibrary = null;
$selectedSlug = $_GET['edit'] ?? null;

if ($selectedSlug) {
    $selectedLibrary = $manager->getLibrary($selectedSlug);
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Bibliotheken verwalten - <?= htmlspecialchars($appName) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
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
            <a href="bibliothek.php" class="btn btn-sm btn-light me-2">← Zurück zur Bibliothek</a>
            <div class="d-inline">
                <?php
                $username = $currentUser;
$currentPage = 'bibliothek_admin';
$pendingRequestsCount = getPendingRequestsCount();
include __DIR__ . '/includes/user_dropdown.php';
?>
            </div>
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

    <?php if (!$selectedLibrary): ?>
        <!-- Library List -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h4 mb-0">⚙️ Bibliotheken verwalten</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                ➕ Neue Bibliothek
            </button>
        </div>

        <div class="card">
            <div class="card-body">
                <?php if (empty($libraries)): ?>
                    <div class="empty-state">
                        <div class="empty-state-icon">📚</div>
                        <h6>Noch keine Bibliotheken</h6>
                        <p class="text-muted">Erstelle deine erste Bibliothek.</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Beschreibung</th>
                                    <th>Dateien</th>
                                    <th>Benutzer</th>
                                    <th class="text-end">Aktionen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($libraries as $lib): ?>
                                    <?php
                    $perms = $lib->getPermissions();
                                    $userCount = count($perms);
                                    $fileCount = count($lib->getFiles());
                                    ?>
                                    <tr>
                                        <td><strong><?= htmlspecialchars($lib->getDisplayName()) ?></strong></td>
                                        <td class="text-muted small"><?= htmlspecialchars($lib->getDescription()) ?></td>
                                        <td><?= $fileCount ?></td>
                                        <td><?= $userCount ?> Benutzer</td>
                                        <td class="text-end">
                                            <a href="?edit=<?= urlencode($lib->getSlug()) ?>" class="btn btn-sm btn-primary">
                                                ✏️ Bearbeiten
                                            </a>
                                            <button class="btn btn-sm btn-danger" onclick="deleteLibrary('<?= htmlspecialchars($lib->getSlug()) ?>')">
                                                🗑️
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php else: ?>
        <!-- Edit Library Permissions -->
        <div class="mb-3">
            <a href="bibliothek_admin.php" class="btn btn-sm btn-secondary">← Zurück zur Übersicht</a>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Berechtigungen: <?= htmlspecialchars($selectedLibrary->getDisplayName()) ?></h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                    <input type="hidden" name="action" value="update_permissions">
                    <input type="hidden" name="slug" value="<?= htmlspecialchars($selectedLibrary->getSlug()) ?>">

                    <div class="library-config-section">
                        <h6>📝 Bibliotheks-Informationen</h6>
                        <p class="mb-1"><strong>Slug:</strong> <?= htmlspecialchars($selectedLibrary->getSlug()) ?></p>
                        <p class="mb-1"><strong>Erlaubte Dateitypen:</strong> <?= implode(', ', $selectedLibrary->getAllowedExtensions()) ?></p>
                        <p class="mb-0"><strong>Max. Dateigröße:</strong> <?= $selectedLibrary->getMaxSizeMB() ?> MB</p>
                    </div>

                    <h6 class="mb-3">👥 Benutzer-Berechtigungen</h6>

                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Benutzer</th>
                                    <th class="text-center">📥 Download</th>
                                    <th class="text-center">📤 Upload</th>
                                    <th class="text-center">🗑️ Löschen</th>
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
                                            <small class="text-muted">(<?= $userData['role'] ?>)</small>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="perm_<?= $username ?>_download" 
                                                   <?= in_array('download', $userPerms) ? 'checked' : '' ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="perm_<?= $username ?>_upload"
                                                   <?= in_array('upload', $userPerms) ? 'checked' : '' ?>>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="perm_<?= $username ?>_delete"
                                                   <?= in_array('delete', $userPerms) ? 'checked' : '' ?>>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">💾 Berechtigungen speichern</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>

</main>

<!-- Create Library Modal -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                <input type="hidden" name="action" value="create_library">
                
                <div class="modal-header">
                    <h5 class="modal-title">Neue Bibliothek erstellen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Slug (technischer Name)</label>
                        <input type="text" name="slug" class="form-control" pattern="[a-z0-9-_]+" required>
                        <div class="form-text">Nur Kleinbuchstaben, Zahlen, - und _</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Anzeigename</label>
                        <input type="text" name="display_name" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Beschreibung</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Erlaubte Dateitypen</label>
                        <div class="row g-2">
                            <?php
                            $commonTypes = ['pdf', 'docx', 'xlsx', 'xlsm', 'txt', 'jpg', 'png', 'zip'];
foreach ($commonTypes as $type):
    ?>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="allowed_extensions[]" 
                                               value="<?= $type ?>" id="ext_<?= $type ?>" checked>
                                        <label class="form-check-label" for="ext_<?= $type ?>">
                                            .<?= $type ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Max. Dateigröße (MB)</label>
                        <input type="number" name="max_size_mb" class="form-control" value="50" min="1" max="500">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="submit" class="btn btn-primary">Erstellen</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Form -->
<form id="deleteForm" method="post" class="form-hidden">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
    <input type="hidden" name="action" value="delete_library">
    <input type="hidden" name="slug" id="deleteSlug">
</form>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
function deleteLibrary(slug) {
    if (confirm('Bibliothek "' + slug + '" wirklich löschen? Alle Dateien gehen verloren!')) {
        document.getElementById('deleteSlug').value = slug;
        document.getElementById('deleteForm').submit();
    }
}
</script>

<?php renderFooter(); ?>

</body>
</html>
