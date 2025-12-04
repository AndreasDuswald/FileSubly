<?php
declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';

// Nur für eingeloggte User
if (!($_SESSION['logged_in'] ?? false)) {
    http_response_code(403);
    exit(json_encode(['success' => false, 'error' => 'Nicht angemeldet']));
}

// CSRF-Check
if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
    http_response_code(403);
    exit(json_encode(['success' => false, 'error' => 'Ungültiges CSRF-Token']));
}

// Permission-Check
if (!hasPermission('sort')) {
    http_response_code(403);
    exit(json_encode(['success' => false, 'error' => 'Keine Berechtigung zum Sortieren']));
}

$downloadDir = rtrim($config['download_dir'], DIRECTORY_SEPARATOR);
$orderFile = $downloadDir . '/.sort_order.json';

// Dateinamen aus Request holen
$fileOrder = $_POST['order'] ?? [];

if (!is_array($fileOrder)) {
    http_response_code(400);
    exit(json_encode(['success' => false, 'error' => 'Ungültige Daten']));
}

// Nur Dateinamen ohne Pfad erlauben (Security)
$fileOrder = array_map('basename', $fileOrder);

// Speichern
if (file_put_contents($orderFile, json_encode($fileOrder, JSON_PRETTY_PRINT), LOCK_EX) !== false) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Speichern fehlgeschlagen']);
}
