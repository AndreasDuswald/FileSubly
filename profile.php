<?php
declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';

// Nur eingeloggte User
if (!($_SESSION['logged_in'] ?? false)) {
    header('Location: index.php');
    exit;
}

// Logout
if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php');
    exit;
}

$appName = $config['app_name'];
$brandName = $config['brand_name'];
$username = $_SESSION['user'];
$users = loadUsers();
$userData = $users[$username] ?? null;

$message = null;
$messageType = null;

// E-Mail aktualisieren
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_email'])) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } else {
        $email = trim($_POST['email'] ?? '');

        if (empty($email)) {
            // E-Mail entfernen
            unset($users[$username]['email']);
            $message = 'E-Mail-Adresse wurde entfernt.';
            $messageType = 'info';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = 'Bitte gib eine gültige E-Mail-Adresse ein.';
            $messageType = 'danger';
        } else {
            // E-Mail speichern
            $users[$username]['email'] = $email;
            $message = 'E-Mail-Adresse wurde aktualisiert.';
            $messageType = 'success';
        }

        if ($messageType !== 'danger') {
            if (saveUsers($users)) {
                $userData = $users[$username];
            } else {
                $message = 'Fehler beim Speichern.';
                $messageType = 'danger';
            }
        }
    }
}

// Passwort ändern
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } else {
        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // Aktuelles Passwort prüfen
        if (!password_verify($currentPassword, $userData['password'])) {
            $message = 'Aktuelles Passwort ist falsch.';
            $messageType = 'danger';
        } elseif (strlen($newPassword) < 4) {
            $message = 'Neues Passwort muss mindestens 4 Zeichen lang sein.';
            $messageType = 'danger';
        } elseif ($newPassword !== $confirmPassword) {
            $message = 'Die Passwörter stimmen nicht überein.';
            $messageType = 'danger';
        } else {
            // Passwort ändern
            $users[$username]['password'] = password_hash($newPassword, PASSWORD_DEFAULT);

            if (saveUsers($users)) {
                $message = 'Passwort erfolgreich geändert.';
                $messageType = 'success';
            } else {
                $message = 'Fehler beim Speichern.';
                $messageType = 'danger';
            }
        }
    }
}

$role = $userData['role'] ?? 'user';
$permissions = $userData['permissions'] ?? [];

$roleLabels = [
    'admin' => 'Administrator',
    'helper' => 'Premium Nutzer',
    'user' => 'Benutzer'
];

$permissionLabels = [
    'download' => 'Dateien herunterladen',
    'upload' => 'Dateien hochladen',
    'delete' => 'Dateien löschen',
    'sort' => 'Dateien sortieren',
    'merge' => 'PDFs zusammenführen',
    'manage_users' => 'Benutzer verwalten'
];
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Mein Profil - <?= htmlspecialchars($appName) ?></title>
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
        <div class="ms-auto">
            <a href="index.php" class="btn btn-sm btn-light me-2">← Zurück</a>
            <a href="?logout=1" class="btn btn-sm btn-outline-light">Logout</a>
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

    <div class="profile-header">
        <div class="profile-icon">
            <svg width="35" height="35" viewBox="0 0 24 24" fill="white">
                <circle cx="12" cy="8" r="4"/>
                <path d="M12 14c-6 0-8 4-8 4v2h16v-2s-2-4-8-4z"/>
            </svg>
        </div>
        <div class="profile-info">
            <h1 class="h4 mb-1"><?= htmlspecialchars($username) ?></h1>
            <span class="badge bg-light text-dark"><?= $roleLabels[$role] ?? $role ?></span>
        </div>
    </div>

    <!-- Tabs Navigation -->
    <ul class="nav nav-tabs mb-4" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" 
                    data-bs-target="#info" type="button" role="tab">
                👤 Profilinformationen
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="email-tab" data-bs-toggle="tab" 
                    data-bs-target="#email" type="button" role="tab">
                📧 E-Mail-Adresse
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="password-tab" data-bs-toggle="tab" 
                    data-bs-target="#password" type="button" role="tab">
                🔒 Passwort ändern
            </button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="profileTabContent">
        
        <!-- TAB 1: Profilinformationen -->
        <div class="tab-pane fade show active" id="info" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">👤 Profilinformationen</h5>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Benutzername</label>
                        <div class="fw-bold"><?= htmlspecialchars($username) ?></div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="text-muted small">Rolle</label>
                        <div class="fw-bold"><?= $roleLabels[$role] ?? $role ?></div>
                    </div>
                    
                    <div>
                        <label class="text-muted small mb-2">Berechtigungen</label>
                        <div>
                            <?php foreach ($permissions as $perm): ?>
                                <span class="badge bg-info me-1 mb-1">
                                    <?= htmlspecialchars($permissionLabels[$perm] ?? $perm) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Ende TAB 1: Profilinformationen -->
        
        <!-- TAB 2: E-Mail-Adresse -->
        <div class="tab-pane fade" id="email" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">📧 E-Mail-Adresse</h5>
                    
                    <form method="post">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                        <input type="hidden" name="update_email" value="1">
                        
                        <div class="mb-3">
                            <label class="form-label">E-Mail-Adresse (optional)</label>
                            <input type="email" name="email" class="form-control" 
                                   value="<?= htmlspecialchars($userData['email'] ?? '') ?>"
                                   placeholder="deine@email.de">
                            <small class="text-muted">
                                <?php if (empty($userData['email'])): ?>
                                    ⚠️ Ohne E-Mail kannst du dein Passwort nicht selbst zurücksetzen.
                                <?php else: ?>
                                    ✅ Mit dieser E-Mail kannst du dein Passwort zurücksetzen.
                                <?php endif; ?>
                            </small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">
                            E-Mail aktualisieren
                        </button>
                    </form>
                </div>
            </div>
        </div><!-- Ende TAB 2: E-Mail-Adresse -->
        
        <!-- TAB 3: Passwort ändern -->
        <div class="tab-pane fade" id="password" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">🔒 Passwort ändern</h5>
                    
                    <form method="post" autocomplete="off">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                        <input type="hidden" name="change_password" value="1">
                        
                        <div class="mb-3">
                            <label class="form-label">Aktuelles Passwort</label>
                            <div class="password-field-wrapper">
                                <input type="password" name="current_password" id="current_password" 
                                       class="form-control" required autocomplete="new-password">
                                <span class="password-toggle" onclick="togglePassword('current_password')">👁️</span>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Neues Passwort</label>
                            <div class="password-field-wrapper">
                                <input type="password" name="new_password" id="new_password" class="form-control" 
                                       minlength="4" required autocomplete="new-password">
                                <span class="password-toggle" onclick="togglePassword('new_password')">👁️</span>
                            </div>
                            <small class="text-muted">Mindestens 4 Zeichen</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Passwort bestätigen</label>
                            <div class="password-field-wrapper">
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" 
                                       minlength="4" required autocomplete="new-password">
                                <span class="password-toggle" onclick="togglePassword('confirm_password')">👁️</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">
                            Passwort ändern
                        </button>
                    </form>
                </div>
            </div>
        </div><!-- Ende TAB 3: Passwort ändern -->
        
    </div><!-- Ende Tab Content -->

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const toggle = field.nextElementSibling;
    
    if (field.type === 'password') {
        field.type = 'text';
        toggle.textContent = '🙈';
    } else {
        field.type = 'password';
        toggle.textContent = '👁️';
    }
}
</script>
<?php renderFooter(); ?>

</body>
</html>
