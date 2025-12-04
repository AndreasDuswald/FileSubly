<?php

declare(strict_types=1);

/**
 * Zentrale Konfiguration fü¼r den Duswald Download-Service.
 */

// Load settings from JSON file
function loadSettings(): array
{
    $settingsFile = __DIR__ . '/settings.json';

    // Default settings
    $defaults = [
        'app_name' => 'AD - FileSubly 1.0.2',
        'brand_name' => 'Download-Service',
        'allowed_extensions' => ['pdf', 'xlsx', 'xlsm', 'doc', 'docx'],
        'max_file_size_mb' => 50
    ];

    if (!file_exists($settingsFile)) {
        file_put_contents($settingsFile, json_encode($defaults, JSON_PRETTY_PRINT));
        return $defaults;
    }

    $settings = json_decode(file_get_contents($settingsFile), true);
    return is_array($settings) ? array_merge($defaults, $settings) : $defaults;
}

// Save settings to JSON file
function saveSettings(array $settings): bool
{
    $settingsFile = __DIR__ . '/settings.json';
    return file_put_contents(
        $settingsFile,
        json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    ) !== false;
}

$settings = loadSettings();

$config = [
    // Branding & Titel
    'app_name'   => $settings['app_name'],
    'brand_name' => $settings['brand_name'],

    // Ordner, in dem die Download-Dateien liegen
    'download_dir' => __DIR__ . '/files',

    // Erlaubte Dateiendungen (aus Settings)
    'allowed_extensions' => $settings['allowed_extensions'],

    // Maximale Dateigrü¶üŸe in MB
    'max_file_size_mb' => $settings['max_file_size_mb'],

    // User-Datei
    'users_file' => __DIR__ . '/users.json',

    // Settings-Datei
    'settings_file' => __DIR__ . '/settings.json',
];

/**
 * Load users from JSON file
 */
function loadUsers(): array
{
    global $config;
    $file = $config['users_file'];

    if (!file_exists($file)) {
        return getFallbackUsers();
    }

    $content = file_get_contents($file);
    $users = json_decode($content, true);

    // Wenn JSON korrupt ist, Fallback verwenden
    if (!is_array($users) || empty($users)) {
        return getFallbackUsers();
    }

    return $users;
}

/**
 * Get fallback admin user (emergency access)
 */
function getFallbackUsers(): array
{
    return [
        'admin' => [
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'role' => 'admin',
            'permissions' => ['download', 'upload', 'delete', 'sort', 'merge', 'manage_users'],
            'email' => '',
            'is_fallback' => true // Marker fü¼r Fallback-User
        ]
    ];
}

/**
 * Save users to JSON file
 */
function saveUsers(array $users): bool
{
    global $config;
    $file = $config['users_file'];

    return file_put_contents(
        $file,
        json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    ) !== false;
}

/**
 * Check if current user has a specific permission
 */
function hasPermission(string $permission): bool
{
    if (!isset($_SESSION['user'])) {
        return false;
    }

    $users = loadUsers();
    $username = $_SESSION['user'];

    if (!isset($users[$username])) {
        return false;
    }

    $permissions = $users[$username]['permissions'] ?? [];
    return in_array($permission, $permissions, true);
}

/**
 * Get current user's role
 */
function getUserRole(): ?string
{
    if (!isset($_SESSION['user'])) {
        return null;
    }

    $users = loadUsers();
    $username = $_SESSION['user'];

    return $users[$username]['role'] ?? null;
}

/**
 * Get count of pending access requests
 */
function getPendingRequestsCount(): int
{
    $requestsFile = __DIR__ . '/access_requests.json';

    if (!file_exists($requestsFile)) {
        return 0;
    }

    $content = file_get_contents($requestsFile);
    $requests = json_decode($content, true);

    if (!is_array($requests)) {
        return 0;
    }

    return count(array_filter($requests, fn ($r) => ($r['status'] ?? '') === 'pending'));
}

/**
 * Generate CSRF token
 */
function generateCsrfToken(): string
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function verifyCsrfToken(string $token): bool
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Log download activity
 */
function logDownload(string $filename, string $username): void
{
    global $config;
    $logFile = $config['download_dir'] . '/.download_log.json';

    $logs = [];
    if (file_exists($logFile)) {
        $logs = json_decode(file_get_contents($logFile), true) ?? [];
    }

    $logs[] = [
        'filename' => $filename,
        'username' => $username,
        'timestamp' => date('Y-m-d H:i:s'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ];

    // Nur die letzten 1000 Eintrü¤ge behalten
    if (count($logs) > 1000) {
        $logs = array_slice($logs, -1000);
    }

    file_put_contents($logFile, json_encode($logs, JSON_PRETTY_PRINT), LOCK_EX);
}

/**
 * Get download statistics per user
 */
function getDownloadStats(): array
{
    global $config;
    $logFile = $config['download_dir'] . '/.download_log.json';

    if (!file_exists($logFile)) {
        return [];
    }

    $logs = json_decode(file_get_contents($logFile), true) ?? [];

    // Gruppieren nach User und Datei
    $stats = [];
    foreach ($logs as $log) {
        $user = $log['username'];
        $file = $log['filename'];

        if (!isset($stats[$user])) {
            $stats[$user] = [];
        }
        if (!isset($stats[$user][$file])) {
            $stats[$user][$file] = 0;
        }
        $stats[$user][$file]++;
    }

    return $stats;
}

/**
 * Icon-Funktion (SVGs fü¼r Dateitypen)
 */
function fileIcon(string $ext): string
{
    return match($ext) {
        'pdf' => '
            <svg width="28" height="28" viewBox="0 0 24 24">
              <rect width="24" height="24" rx="4" fill="#dc3545"/>
              <path d="M16 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7l-3-4z" fill="white" opacity="0.15"/>
              <text x="12" y="16" font-size="10" fill="white" font-weight="bold" text-anchor="middle">PDF</text>
            </svg>',
        'xlsx' => '
            <svg width="28" height="28" viewBox="0 0 24 24">
              <rect width="24" height="24" rx="4" fill="#198754"/>
              <path d="M16 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7l-3-4z" fill="white" opacity="0.15"/>
              <text x="12" y="16" font-size="10" fill="white" font-weight="bold" text-anchor="middle">XLS</text>
            </svg>',
        'xlsm' => '
            <svg width="28" height="28" viewBox="0 0 24 24">
              <rect width="24" height="24" rx="4" fill="#198754"/>
              <path d="M16 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7l-3-4z" fill="white" opacity="0.15"/>
              <text x="12" y="16" font-size="10" fill="white" font-weight="bold" text-anchor="middle">XLM</text>
            </svg>',
        'doc', 'docx' => '
            <svg width="28" height="28" viewBox="0 0 24 24">
              <rect width="24" height="24" rx="4" fill="#0d6efd"/>
              <path d="M16 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7l-3-4z" fill="white" opacity="0.15"/>
              <text x="12" y="16" font-size="10" fill="white" font-weight="bold" text-anchor="middle">DOC</text>
            </svg>',
        default => '',
    };
}

/**
 * Generate password reset token
 */
function generateResetToken(string $username): string
{
    $token = bin2hex(random_bytes(32));
    $expiry = time() + (3600); // 1 Stunde gü¼ltig

    $resetTokens = [];
    $tokenFile = __DIR__ . '/password_reset_tokens.json';

    if (file_exists($tokenFile)) {
        $resetTokens = json_decode(file_get_contents($tokenFile), true) ?? [];
    }

    // Alte Tokens lü¶schen
    foreach ($resetTokens as $key => $data) {
        if ($data['expiry'] < time()) {
            unset($resetTokens[$key]);
        }
    }

    $resetTokens[$token] = [
        'username' => $username,
        'expiry' => $expiry,
        'created' => date('Y-m-d H:i:s')
    ];

    file_put_contents($tokenFile, json_encode($resetTokens, JSON_PRETTY_PRINT), LOCK_EX);

    return $token;
}

/**
 * Verify reset token
 */
function verifyResetToken(string $token): ?string
{
    $tokenFile = __DIR__ . '/password_reset_tokens.json';

    if (!file_exists($tokenFile)) {
        return null;
    }

    $resetTokens = json_decode(file_get_contents($tokenFile), true) ?? [];

    if (!isset($resetTokens[$token])) {
        return null;
    }

    if ($resetTokens[$token]['expiry'] < time()) {
        // Token abgelaufen
        unset($resetTokens[$token]);
        file_put_contents($tokenFile, json_encode($resetTokens, JSON_PRETTY_PRINT), LOCK_EX);
        return null;
    }

    return $resetTokens[$token]['username'];
}

/**
 * Delete reset token after use
 */
function deleteResetToken(string $token): void
{
    $tokenFile = __DIR__ . '/password_reset_tokens.json';

    if (!file_exists($tokenFile)) {
        return;
    }

    $resetTokens = json_decode(file_get_contents($tokenFile), true) ?? [];

    if (isset($resetTokens[$token])) {
        unset($resetTokens[$token]);
        file_put_contents($tokenFile, json_encode($resetTokens, JSON_PRETTY_PRINT), LOCK_EX);
    }
}

/**
 * Send password reset email (simple version without mail server)
 */
function sendPasswordResetEmail(string $email, string $username, string $token): bool
{
    $settings = loadSettings();
    $appName = $settings['app_name'];

    // Reset-Link generieren (HTTPS verwenden wenn verfü¼gbar)
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
    $resetLink = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/reset_password.php?token=" . urlencode($token);

    $subject = "[$appName] Passwort zurü¼cksetzen";
    $message = "Hallo $username,\n\n";
    $message .= "Du hast eine Passwort-Zurü¼cksetzung angefordert.\n\n";
    $message .= "Klicke auf folgenden Link, um dein Passwort zurü¼ckzusetzen:\n";
    $message .= "$resetLink\n\n";
    $message .= "Der Link ist 1 Stunde gü¼ltig.\n\n";
    $message .= "Falls du diese Anfrage nicht gestellt hast, ignoriere diese E-Mail.\n\n";
    $message .= "Grü¼üŸe,\n$appName Team";

    // Absender: sender_email aus Settings, sonst noreply@domain
    $fromEmail = $settings['sender_email'] ?: ("noreply@" . $_SERVER['HTTP_HOST']);
    $replyToEmail = $settings['admin_email'] ?: $fromEmail;

    // UTF-8 Betreff-Encoding
    $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "From: $fromEmail\r\n";
    $headers .= "Reply-To: $replyToEmail\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    return mail($email, $encodedSubject, $message, $headers);
}

/**
 * Save access request
 */
function saveAccessRequest(array $request): bool
{
    $requestFile = __DIR__ . '/access_requests.json';

    $requests = [];
    if (file_exists($requestFile)) {
        $requests = json_decode(file_get_contents($requestFile), true) ?? [];
    }

    $requests[] = $request;

    return file_put_contents(
        $requestFile,
        json_encode($requests, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        LOCK_EX
    ) !== false;
}

/**
 * Load access requests
 */
function loadAccessRequests(): array
{
    $requestFile = __DIR__ . '/access_requests.json';

    if (!file_exists($requestFile)) {
        return [];
    }

    return json_decode(file_get_contents($requestFile), true) ?? [];
}

/**
 * Get application version from VERSION file
 */
function getAppVersion(): string
{
    $versionFile = __DIR__ . '/VERSION';
    
    if (file_exists($versionFile)) {
        return trim(file_get_contents($versionFile));
    }
    
    return '1.0.0'; // Fallback
}

/**
 * Render application footer with version and GitHub link
 */
function renderFooter(): void
{
    $appName = $GLOBALS['config']['app_name'] ?? 'FileSubly';
    $version = getAppVersion();
    $year = date('Y');
    
    echo '<footer class="py-3 mt-5 text-center text-muted footer-default">';
    echo htmlspecialchars($appName) . ' v' . htmlspecialchars($version);
    echo ' &copy; Andreas Duswald ' . $year . ' | ';
    echo '<a href="https://github.com/AndreasDuswald/FileSubly" target="_blank" rel="noopener" class="text-muted">GitHub</a>';
    echo ' | Lizenz: MIT';
    echo '</footer>';
}

