<?php
declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';

$settings = loadSettings();
$appName = $settings['app_name'];
$brandName = $settings['brand_name'];

// Feature deaktiviert?
if (!($settings['enable_password_reset'] ?? true)) {
    http_response_code(404);
    exit('Diese Funktion ist derzeit deaktiviert.');
}

$token = $_GET['token'] ?? '';
$message = null;
$messageType = null;
$showForm = false;
$username = null;

// Token verifizieren
if (!empty($token)) {
    $username = verifyResetToken($token);

    if ($username) {
        $showForm = true;
    } else {
        $message = 'Der Reset-Link ist ungültig oder abgelaufen. Bitte fordere einen neuen an.';
        $messageType = 'danger';
    }
} else {
    $message = 'Kein gültiger Reset-Link.';
    $messageType = 'danger';
}

// Neues Passwort setzen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $showForm) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } else {
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if (strlen($newPassword) < 4) {
            $message = 'Passwort muss mindestens 4 Zeichen lang sein.';
            $messageType = 'danger';
        } elseif ($newPassword !== $confirmPassword) {
            $message = 'Die Passwörter stimmen nicht überein.';
            $messageType = 'danger';
        } else {
            // Passwort ändern
            $users = loadUsers();

            if (isset($users[$username])) {
                $users[$username]['password'] = password_hash($newPassword, PASSWORD_DEFAULT);

                if (saveUsers($users)) {
                    // Token löschen
                    deleteResetToken($token);

                    $message = '✅ Passwort erfolgreich geändert! Du kannst dich jetzt anmelden.';
                    $messageType = 'success';
                    $showForm = false;

                    // Session-Nachricht für Login-Seite
                    $_SESSION['password_reset_success'] = true;
                } else {
                    $message = 'Fehler beim Speichern des Passworts.';
                    $messageType = 'danger';
                }
            } else {
                $message = 'Benutzer nicht gefunden.';
                $messageType = 'danger';
                $showForm = false;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Passwort zurücksetzen - <?= htmlspecialchars($appName) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="login-body">

<div class="login-card card">
    <div class="card-body">
        
        <div class="text-center mb-4">
            <img src="assets/logo.png" alt="Logo" class="logo-large">
            <h1 class="h4 mt-3"><?= htmlspecialchars($brandName) ?></h1>
            <p class="text-muted">Neues Passwort setzen</p>
        </div>

        <?php if ($message): ?>
            <div class="alert alert-<?= $messageType ?> alert-dismissible fade show">
                <?= $message ?>
                <?php if ($messageType !== 'danger'): ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($showForm): ?>
            <div class="alert alert-info mb-3">
                <strong>Benutzer:</strong> <?= htmlspecialchars($username) ?>
            </div>
            
            <form method="post">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                
                <div class="mb-3">
                    <label class="form-label">Neues Passwort</label>
                    <input type="password" name="new_password" class="form-control" 
                           minlength="4" required autofocus>
                    <small class="text-muted">Mindestens 4 Zeichen</small>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Passwort bestätigen</label>
                    <input type="password" name="confirm_password" class="form-control" 
                           minlength="4" required>
                </div>
                
                <button type="submit" class="btn btn-flammi w-100 mb-3">
                    🔒 Passwort speichern
                </button>
            </form>
        <?php endif; ?>
        
        <a href="index.php" class="btn btn-outline-secondary w-100">
            ← Zurück zum Login
        </a>
        
    </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
