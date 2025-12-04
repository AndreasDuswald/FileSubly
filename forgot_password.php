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

$message = null;
$messageType = null;
$showForm = true;

// Formular verarbeiten
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');

    if (empty($username)) {
        $message = 'Bitte gib deinen Benutzernamen ein.';
        $messageType = 'danger';
    } else {
        $users = loadUsers();

        if (!isset($users[$username])) {
            // Aus Sicherheitsgründen nicht verraten, ob User existiert
            $message = 'Wenn ein Account mit diesem Benutzernamen existiert und eine E-Mail hinterlegt ist, wurde ein Reset-Link gesendet.';
            $messageType = 'info';
            $showForm = false;
        } else {
            $userEmail = $users[$username]['email'] ?? '';

            if (empty($userEmail)) {
                $message = 'Für diesen Account ist keine E-Mail-Adresse hinterlegt. Bitte kontaktiere einen Administrator.';
                $messageType = 'warning';
            } else {
                // Reset-Token generieren
                $token = generateResetToken($username);

                // E-Mail versenden (oder in Session speichern falls mail() nicht funktioniert)
                $mailSent = @sendPasswordResetEmail($userEmail, $username, $token);

                if ($mailSent) {
                    $message = "Ein Reset-Link wurde an {$userEmail} gesendet.";
                    $messageType = 'success';
                } else {
                    // Fallback: Link in Session speichern
                    $resetLink = "https://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/reset_password.php?token=" . urlencode($token);
                    $_SESSION['password_reset_link'] = $resetLink;
                    $_SESSION['password_reset_user'] = $username;

                    $message = "E-Mail-Versand fehlgeschlagen. Bitte kopiere folgenden Link und öffne ihn:<br>";
                    $message .= "<code>" . htmlspecialchars($resetLink) . "</code>";
                    $messageType = 'warning';
                }

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
    <title>Passwort vergessen - <?= htmlspecialchars($appName) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="login-body">

<div class="login-card card">
    <div class="card-body">
        
        <div class="text-center mb-4">
            <img src="assets/logo.png" alt="Logo" class="logo-large">
            <h1 class="h4 mt-3"><?= htmlspecialchars($brandName) ?></h1>
            <p class="text-muted">Passwort vergessen?</p>
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
            <p class="text-muted mb-3">
                Gib deinen Benutzernamen ein. Wenn eine E-Mail-Adresse hinterlegt ist, 
                erhältst du einen Link zum Zurücksetzen deines Passworts.
            </p>
            
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Benutzername</label>
                    <input type="text" name="username" class="form-control" required autofocus>
                </div>
                
                <button type="submit" class="btn btn-flammi w-100 mb-3">
                    📧 Reset-Link anfordern
                </button>
                
                <a href="index.php" class="btn btn-outline-secondary w-100">
                    ← Zurück zum Login
                </a>
            </form>
        <?php else: ?>
            <a href="index.php" class="btn btn-outline-secondary w-100">
                ← Zurück zum Login
            </a>
        <?php endif; ?>
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
