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
    exit('Zugriff verweigert. Nur Admins können Zugangsanfragen sehen.');
}

$appName = $config['app_name'];
$brandName = $config['brand_name'];
$settings = loadSettings();

$message = null;
$messageType = null;

// Zugangsanfrage genehmigen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['approve'])) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } else {
        $requestIndex = (int)$_POST['request_index'];
        $requests = loadAccessRequests();

        if (isset($requests[$requestIndex])) {
            $request = $requests[$requestIndex];

            // Neuen User anlegen
            $users = loadUsers();

            if (isset($users[$request['username']])) {
                $message = "Benutzername '{$request['username']}' existiert bereits.";
                $messageType = 'danger';
            } else {
                // Temporäres Passwort generieren
                $tempPassword = bin2hex(random_bytes(4));

                $users[$request['username']] = [
                    'password' => password_hash($tempPassword, PASSWORD_DEFAULT),
                    'role' => 'user',
                    'permissions' => ['download'],
                    'email' => $request['email']
                ];

                if (saveUsers($users)) {
                    // Anfrage als genehmigt markieren
                    $requests[$requestIndex]['status'] = 'approved';
                    $requests[$requestIndex]['approved_at'] = date('Y-m-d H:i:s');
                    $requests[$requestIndex]['temp_password'] = $tempPassword;

                    // Requests speichern
                    $requestFile = __DIR__ . '/access_requests.json';
                    file_put_contents(
                        $requestFile,
                        json_encode($requests, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                        LOCK_EX
                    );

                    // E-Mail an User senden
                    if (!empty($request['email'])) {
                        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
                        $loginLink = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/";

                        $subject = "[$appName] Zugang gewährt";
                        $mailMessage = "Hallo {$request['username']},\n\n";
                        $mailMessage .= "dein Zugangsantrag wurde genehmigt!\n\n";
                        $mailMessage .= "Login-Daten:\n";
                        $mailMessage .= "Benutzername: {$request['username']}\n";
                        $mailMessage .= "Temporäres Passwort: $tempPassword\n\n";
                        $mailMessage .= "Bitte ändere das Passwort nach dem ersten Login.\n\n";
                        $mailMessage .= "Login: $loginLink\n\n";
                        $mailMessage .= "Viel Spaß!\n$appName Team";

                        $fromEmail = $settings['sender_email'] ?: ("noreply@" . $_SERVER['HTTP_HOST']);
                        $replyToEmail = $settings['admin_email'] ?: $fromEmail;

                        // UTF-8 Betreff-Encoding
                        $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

                        $headers = "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                        $headers .= "From: $fromEmail\r\n";
                        $headers .= "Reply-To: $replyToEmail\r\n";

                        @mail($request['email'], $encodedSubject, $mailMessage, $headers);
                    }                    $message = "Zugang für '{$request['username']}' wurde gewährt. Temporäres Passwort: <strong>$tempPassword</strong>";
                    $messageType = 'success';
                } else {
                    $message = 'Fehler beim Anlegen des Benutzers.';
                    $messageType = 'danger';
                }
            }
        }
    }
}

// Zugangsanfrage ablehnen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reject'])) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } else {
        $requestIndex = (int)$_POST['request_index'];
        $requests = loadAccessRequests();

        if (isset($requests[$requestIndex])) {
            $requests[$requestIndex]['status'] = 'rejected';
            $requests[$requestIndex]['rejected_at'] = date('Y-m-d H:i:s');

            // Requests speichern
            $requestFile = __DIR__ . '/access_requests.json';
            file_put_contents(
                $requestFile,
                json_encode($requests, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                LOCK_EX
            );

            $message = "Anfrage von '{$requests[$requestIndex]['username']}' wurde abgelehnt.";
            $messageType = 'info';
        }
    }
}

// Reset-Mail senden
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_reset'])) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } else {
        $requestIndex = (int)$_POST['request_index'];
        $requests = loadAccessRequests();

        if (isset($requests[$requestIndex]) && $requests[$requestIndex]['status'] === 'approved') {
            $username = $requests[$requestIndex]['username'];
            $email = $requests[$requestIndex]['email'];

            // Prüfen ob User existiert
            $users = loadUsers();
            if (isset($users[$username]) && !empty($email)) {
                // Token generieren
                $token = generateResetToken($username);

                // E-Mail senden
                if (sendPasswordResetEmail($email, $username, $token)) {
                    $message = "Reset-Mail wurde an {$email} gesendet.";
                    $messageType = 'success';
                } else {
                    $message = 'E-Mail-Versand fehlgeschlagen.';
                    $messageType = 'warning';
                }
            } else {
                $message = 'Benutzer existiert nicht oder hat keine E-Mail.';
                $messageType = 'danger';
            }
        }
    }
}

// Anfrage löschen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_request'])) {
    // CSRF-Check
    if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
        $message = 'Ungültige Anfrage (CSRF-Token fehlt).';
        $messageType = 'danger';
    } else {
        $requestIndex = (int)$_POST['request_index'];
        $requests = loadAccessRequests();

        if (isset($requests[$requestIndex])) {
            $username = $requests[$requestIndex]['username'];
            array_splice($requests, $requestIndex, 1);

            // Requests speichern
            $requestFile = __DIR__ . '/access_requests.json';
            file_put_contents(
                $requestFile,
                json_encode($requests, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                LOCK_EX
            );

            $message = "Anfrage von '{$username}' wurde gelöscht.";
            $messageType = 'success';
        }
    }
}

$requests = loadAccessRequests();
$pendingRequests = array_filter($requests, fn ($r) => $r['status'] === 'pending');
$processedRequests = array_filter($requests, fn ($r) => $r['status'] !== 'pending');
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Zugangsanfragen - <?= htmlspecialchars($appName) ?></title>
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
            <div class="dropdown">
            <?php
            $username = $_SESSION['user'];
$isAdmin = true;
$currentPage = 'access_requests';
$pendingRequestsCount = count($pendingRequests);
include __DIR__ . '/includes/user_dropdown.php';
?>
            </div>
        </div>
    </div>
</nav>

<main class="container">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📝 Zugangsanfragen</h2>
        <a href="admin.php" class="btn btn-secondary">← Zurück</a>
    </div>

    <?php if ($message): ?>
        <div class="alert alert-<?= $messageType ?> alert-dismissible fade show">
            <?= $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Offene Anfragen -->
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark">
            <strong>⏳ Offene Anfragen (<?= count($pendingRequests) ?>)</strong>
        </div>
        <div class="card-body">
            <?php if (empty($pendingRequests)): ?>
                <p class="text-muted mb-0">Keine offenen Anfragen.</p>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Benutzername</th>
                                <th>E-Mail</th>
                                <th>Begründung</th>
                                <th>Datum</th>
                                <th>IP</th>
                                <th>Aktionen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($requests as $index => $request): ?>
                                <?php if ($request['status'] !== 'pending') {
                                    continue;
                                } ?>
                                <tr>
                                    <td><strong><?= htmlspecialchars($request['username']) ?></strong></td>
                                    <td><?= htmlspecialchars($request['email']) ?></td>
                                    <td><?= htmlspecialchars($request['reason'] ?: '-') ?></td>
                                    <td><?= htmlspecialchars($request['timestamp']) ?></td>
                                    <td><small><?= htmlspecialchars($request['ip']) ?></small></td>
                                    <td>
                                        <form method="post" class="form-inline">
                                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                                            <input type="hidden" name="request_index" value="<?= $index ?>">
                                            <button type="submit" name="approve" class="btn btn-sm btn-success" 
                                                    onclick="return confirm('Zugang für \'<?= htmlspecialchars($request['username']) ?>\' gewähren?')">
                                                ✅ Genehmigen
                                            </button>
                                            <button type="submit" name="reject" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Anfrage ablehnen?')">
                                                ❌ Ablehnen
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bearbeitete Anfragen -->
    <?php if (!empty($processedRequests)): ?>
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <strong>📜 Bearbeitete Anfragen (<?= count($processedRequests) ?>)</strong>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Benutzername</th>
                                <th>E-Mail</th>
                                <th>Status</th>
                                <th>Angefragt</th>
                                <th>Bearbeitet</th>
                                <th>Aktionen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($requests as $index => $request): ?>
                                <?php if ($request['status'] === 'pending') {
                                    continue;
                                } ?>
                                <tr>
                                    <td><?= htmlspecialchars($request['username']) ?></td>
                                    <td><?= htmlspecialchars($request['email']) ?></td>
                                    <td>
                                        <?php if ($request['status'] === 'approved'): ?>
                                            <span class="badge bg-success">✅ Genehmigt</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">❌ Abgelehnt</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($request['timestamp']) ?></td>
                                    <td><?= htmlspecialchars($request['approved_at'] ?? $request['rejected_at'] ?? '-') ?></td>
                                    <td>
                                        <form method="post" class="form-inline">
                                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(generateCsrfToken()) ?>">
                                            <input type="hidden" name="request_index" value="<?= $index ?>">
                                            
                                            <?php if ($request['status'] === 'approved' && !empty($request['email'])): ?>
                                                <button type="submit" name="send_reset" class="btn btn-sm btn-info" 
                                                        onclick="return confirm('Reset-Mail an <?= htmlspecialchars($request['email']) ?> senden?')">
                                                    🔑 Reset-Mail
                                                </button>
                                            <?php endif; ?>
                                            
                                            <button type="submit" name="delete_request" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Anfrage wirklich löschen?')">
                                                🗑️ Löschen
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>

</main>

<?php renderFooter(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
