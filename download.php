<?php

declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';

// Nur wenn eingeloggt
if (!($_SESSION['logged_in'] ?? false)) {
    http_response_code(403);
    exit('Zugriff verweigert.');
}

$downloadDir = rtrim($config['download_dir'], DIRECTORY_SEPARATOR);
$allowedExts = $config['allowed_extensions'];

$file = basename($_GET['file'] ?? '');
$path = $downloadDir . '/' . $file;

if (!is_file($path)) {
    http_response_code(404);
    exit('Datei nicht gefunden.');
}

$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
if (!in_array($ext, $allowedExts, true)) {
    http_response_code(403);
    exit('Dateityp nicht erlaubt.');
}

// Track download count BEFORE sending file
$statsFile = $downloadDir . '/.download_stats.json';
$stats = [];

if (file_exists($statsFile)) {
    $content = file_get_contents($statsFile);
    $stats = json_decode($content, true) ?? [];
}

if (!isset($stats[$file])) {
    $stats[$file] = 0;
}
$stats[$file]++;

// Save stats before output
file_put_contents($statsFile, json_encode($stats, JSON_PRETTY_PRINT), LOCK_EX);

// Log download for user statistics
logDownload($file, $_SESSION['user']);

// Now send the file
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$file.'"');
header('Content-Length: ' . filesize($path));

readfile($path);
exit;
