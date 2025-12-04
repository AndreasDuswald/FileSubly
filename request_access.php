<?php
declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';

$settings = loadSettings();
$appName = $settings['app_name'];
$brandName = $settings['brand_name'];

// Feature deaktiviert?
if (!($settings['enable_access_request'] ?? true)) {
    http_response_code(404);
    exit('Diese Funktion ist derzeit deaktiviert.');
}

$message = null;
$messageType = null;
$showForm = true;

// Formular verarbeiten
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $reason = trim($_POST['reason'] ?? '');
    $isExistingUser = isset($_POST['is_existing_user']);

    if (empty($username) || empty($email)) {
        $message = 'Bitte fülle alle Pflichtfelder aus.';
        $messageType = 'danger';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Bitte gib eine gültige E-Mail-Adresse ein.';
        $messageType = 'danger';
    } else {
        // Prüfen ob Username bereits existiert (außer wenn Checkbox gesetzt)
        $users = loadUsers();
        if (!$isExistingUser && isset($users[$username])) {
            $message = 'Dieser Benutzername ist bereits vergeben.';
            $messageType = 'danger';
        } else {
            // Anfrage speichern
            $request = [
                'username' => $username,
                'email' => $email,
                'reason' => $reason,
                'timestamp' => date('Y-m-d H:i:s'),
                'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
                'status' => 'pending'
            ];

            if (saveAccessRequest($request)) {
                $message = '✅ Deine Anfrage wurde gesendet! Ein Administrator wird sie prüfen und dich kontaktieren.';
                $messageType = 'success';
                $showForm = false;

                // Optional: E-Mail an Admin senden
                if (!empty($settings['admin_email'])) {
                    $subject = "[$appName] Neue Zugangsanfrage von $username";
                    $mailMessage = "Neue Zugangsanfrage:\n\n";
                    $mailMessage .= "Benutzername: $username\n";
                    $mailMessage .= "E-Mail: $email\n";
                    $mailMessage .= "Begründung: $reason\n";
                    $mailMessage .= "IP: " . ($request['ip']) . "\n\n";
                    $mailMessage .= "Bitte prüfe die Anfrage in der Benutzerverwaltung.";

                    $fromEmail = $settings['sender_email'] ?: ("noreply@" . $_SERVER['HTTP_HOST']);

                    // UTF-8 Betreff-Encoding
                    $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                    $headers .= "From: $fromEmail\r\n";
                    $headers .= "Reply-To: $email\r\n";

                    @mail($settings['admin_email'], $encodedSubject, $mailMessage, $headers);
                }
            } else {
                $message = 'Fehler beim Speichern der Anfrage. Bitte versuche es später erneut.';
                $messageType = 'danger';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Zugang anfragen - <?= htmlspecialchars($appName) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="login-body">

<div class="login-card card request-card">
    <div class="card-body">
        
        <div class="text-center mb-4">
            <img src="assets/logo.png" alt="Logo" class="logo-large">
            <h1 class="h4 mt-3"><?= htmlspecialchars($brandName) ?></h1>
            <p class="text-muted">Zugang anfragen</p>
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
                Fülle das Formular aus, um Zugang zu diesem System anzufordern. 
                Ein Administrator wird deine Anfrage prüfen.
            </p>
            
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Benutzername <span class="text-danger">*</span></label>
                    <input type="text" name="username" id="username" class="form-control" 
                           pattern="[a-zA-Z0-9_-]+" required autofocus>
                    <small class="text-muted">Nur Buchstaben, Zahlen, _ und -</small>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" name="is_existing_user" id="is_existing_user" 
                           class="form-check-input" onchange="toggleUsernameHelp()">
                    <label class="form-check-label" for="is_existing_user">
                        ✅ Ich bin bereits als User eingetragen
                    </label>
                    <div id="existing-user-help" class="text-muted small mt-1">
                        Dein Benutzername wird nicht auf Verfügbarkeit geprüft. 
                        Gib deinen bestehenden Benutzernamen ein.
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">E-Mail-Adresse <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" required>
                    <small class="text-muted">Wird für Rückmeldungen verwendet</small>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Begründung (optional)</label>
                    <textarea name="reason" class="form-control" rows="3" 
                              placeholder="Warum benötigst du Zugang?"></textarea>
                </div>
                
                <button type="submit" class="btn btn-flammi w-100 mb-3">
                    📝 Anfrage absenden
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
<script>
function toggleUsernameHelp() {
    const checkbox = document.getElementById('is_existing_user');
    const help = document.getElementById('existing-user-help');
    help.style.display = checkbox.checked ? 'block' : 'none';
}
</script>
</body>
</html>
