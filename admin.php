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
    exit('Zugriff verweigert. Nur Admins können User verwalten.');
}

$appName = $config['app_name'];
$brandName = $config['brand_name'];
$users = loadUsers();

$message = null;
$messageType = null;

// Verfügbare Permissions
$availablePermissions = [
    'download' => 'Dateien herunterladen',
    'upload' => 'Dateien hochladen',
    'delete' => 'Dateien löschen',
    'sort' => 'Dateien sortieren',
    'merge' => 'PDFs zusammenführen',
    'manage_users' => 'Benutzer verwalten (Admin)'
];

// Rollen-Presets
$rolePresets = [
    'admin' => ['download', 'upload', 'delete', 'sort', 'merge', 'manage_users'],
    'helper' => ['download', 'sort', 'merge'],
    'user' => ['download']
];

/* ---------------------------------------------------
   USER ACTIONS
--------------------------------------------------- */

// Add/Edit User
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } elseif ($_POST['action'] === 'save_user') {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? 'user';
        $permissions = $_POST['permissions'] ?? [];
        $email = trim($_POST['email'] ?? '');

        if (empty($username)) {
            $message = 'Benutzername darf nicht leer sein.';
            $messageType = 'danger';
        } else {
            $isNew = !isset($users[$username]);

            // Wenn neuer User oder Passwort geändert
            if ($isNew || !empty($password)) {
                if (strlen($password) < 4) {
                    $message = 'Passwort muss mindestens 4 Zeichen lang sein.';
                    $messageType = 'danger';
                } else {
                    $users[$username]['password'] = password_hash($password, PASSWORD_DEFAULT);
                }
            }

            if (!$message) {
                $users[$username]['role'] = $role;
                $users[$username]['permissions'] = $permissions;
                $users[$username]['email'] = $email; // E-Mail speichern (optional)

                if (saveUsers($users)) {
                    $message = $isNew ? "Benutzer '$username' wurde erstellt." : "Benutzer '$username' wurde aktualisiert.";
                    $messageType = 'success';
                } else {
                    $message = 'Fehler beim Speichern.';
                    $messageType = 'danger';
                }
            }
        }
    } elseif ($_POST['action'] === 'delete_user') {
        // Delete User
        $username = $_POST['username'] ?? '';

        if ($username === $_SESSION['user']) {
            $message = 'Du kannst dich nicht selbst löschen.';
            $messageType = 'danger';
        } elseif (isset($users[$username])) {
            unset($users[$username]);
            if (saveUsers($users)) {
                $message = "Benutzer '$username' wurde gelöscht.";
                $messageType = 'success';
            } else {
                $message = 'Fehler beim Löschen.';
                $messageType = 'danger';
            }
        }
    }

    // Reload users after changes
    $users = loadUsers();
}

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Benutzerverwaltung - <?= htmlspecialchars($appName) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-flammi mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="assets/logo.png" alt="Logo" class="logo-img">
            <?= htmlspecialchars($brandName) ?>
        </a>
        <div class="ms-auto d-flex align-items-center gap-2">
            <a href="index.php" class="btn btn-sm btn-light">← Zurück</a>
            <?php
            $username = $_SESSION['user'];
$isAdmin = true;
$currentPage = 'admin';
$pendingRequestsCount = getPendingRequestsCount();
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

    <div class="card p-4 mb-4">
        <h2 class="h4 mb-4">👥 Benutzerverwaltung</h2>

        <!-- Add New User Button -->
        <div class="mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" onclick="newUser()">
                ➕ Neuer Benutzer
            </button>
        </div>

        <!-- Users Table -->
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Benutzername</th>
                        <th>Rolle</th>
                        <th>Berechtigungen</th>
                        <th class="text-end">Aktionen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $username => $data): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($username) ?></strong></td>
                            <td>
                                <span class="badge bg-<?= $data['role'] === 'admin' ? 'danger' : ($data['role'] === 'helper' ? 'warning' : 'secondary') ?>">
                                    <?= ucfirst($data['role']) ?>
                                </span>
                            </td>
                            <td>
                                <?php foreach ($data['permissions'] ?? [] as $perm): ?>
                                    <span class="badge bg-info permission-badge">
                                        <?= htmlspecialchars($availablePermissions[$perm] ?? $perm) ?>
                                    </span>
                                <?php endforeach; ?>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-primary" 
                                        onclick='editUser(<?= json_encode($username) ?>, <?= json_encode($data) ?>)'
                                        title="Bearbeiten">
                                    ✏️
                                </button>
                                <?php if ($username !== $_SESSION['user']): ?>
                                    <button class="btn btn-sm btn-danger" 
                                            onclick="deleteUser('<?= htmlspecialchars($username) ?>')"
                                            title="Löschen">
                                        🗑️
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</main>

<!-- User Modal -->
<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                <input type="hidden" name="action" value="save_user">
                <input type="hidden" id="originalUsername" value="">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Neuer Benutzer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Benutzername</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                        <small class="text-muted">Bei Änderung wird neuer User angelegt</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">E-Mail (optional)</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="user@example.com">
                        <small class="text-muted">Wird für Passwort-Reset benötigt. Wenn nicht angegeben, ist "Passwort vergessen" nicht verfügbar.</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Passwort</label>
                        <input type="password" name="password" id="password" class="form-control" minlength="4">
                        <small class="text-muted" id="passwordHint">Mindestens 4 Zeichen</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Rolle</label>
                        <select name="role" id="role" class="form-select" onchange="applyRolePreset()">
                            <option value="user">Benutzer (nur Download)</option>
                            <option value="helper">Premium Nutzer (Download, Sortieren, Merge)</option>
                            <option value="admin">Admin (alle Rechte)</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Individuelle Berechtigungen</label>
                        <div class="border rounded p-3">
                            <?php foreach ($availablePermissions as $perm => $label): ?>
                                <div class="form-check">
                                    <input class="form-check-input permission-check" type="checkbox" 
                                           name="permissions[]" value="<?= $perm ?>" id="perm_<?= $perm ?>">
                                    <label class="form-check-label" for="perm_<?= $perm ?>">
                                        <?= htmlspecialchars($label) ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abbrechen</button>
                    <button type="submit" class="btn btn-primary">Speichern</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Form -->
<form id="deleteForm" method="post" class="form-hidden">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
    <input type="hidden" name="action" value="delete_user">
    <input type="hidden" name="username" id="deleteUsername">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const rolePresets = <?= json_encode($rolePresets) ?>;
let userModal;

document.addEventListener('DOMContentLoaded', () => {
    userModal = new bootstrap.Modal(document.getElementById('userModal'));
});

function newUser() {
    document.getElementById('modalTitle').textContent = 'Neuer Benutzer';
    document.getElementById('originalUsername').value = '';
    document.getElementById('username').value = '';
    document.getElementById('username').readOnly = false;
    document.getElementById('password').value = '';
    document.getElementById('password').required = true;
    document.getElementById('passwordHint').textContent = 'Mindestens 4 Zeichen (erforderlich)';
    document.getElementById('role').value = 'user';
    
    document.querySelectorAll('.permission-check').forEach(cb => cb.checked = false);
    applyRolePreset();
    
    userModal.show();
}

function editUser(username, data) {
    document.getElementById('modalTitle').textContent = 'Benutzer bearbeiten';
    document.getElementById('originalUsername').value = username;
    document.getElementById('username').value = username;
    document.getElementById('username').readOnly = true;
    document.getElementById('email').value = data.email || '';
    document.getElementById('password').value = '';
    document.getElementById('password').required = false;
    document.getElementById('passwordHint').textContent = 'Leer lassen um Passwort beizubehalten';
    document.getElementById('role').value = data.role;
    
    document.querySelectorAll('.permission-check').forEach(cb => {
        cb.checked = (data.permissions || []).includes(cb.value);
    });
    
    userModal.show();
}

function applyRolePreset() {
    const role = document.getElementById('role').value;
    const permissions = rolePresets[role] || [];
    
    document.querySelectorAll('.permission-check').forEach(cb => {
        cb.checked = permissions.includes(cb.value);
    });
}

function deleteUser(username) {
    if (confirm(`Benutzer "${username}" wirklich löschen?`)) {
        document.getElementById('deleteUsername').value = username;
        document.getElementById('deleteForm').submit();
    }
}
</script>

<footer class="py-3 mt-5 text-center text-muted footer-default">
    <?= htmlspecialchars($appName) ?> © 2025 | Lizenz: MIT
</footer>

</body>
</html>
