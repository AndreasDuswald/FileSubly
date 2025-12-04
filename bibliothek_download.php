<?php

declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';
require __DIR__ . '/bibliothek_config.php';

// Login required
if (!($_SESSION['logged_in'] ?? false)) {
    http_response_code(403);
    exit('Zugriff verweigert');
}

$currentUser = $_SESSION['user'];
$isAdmin = hasPermission('manage_users');

// Get parameters
$librarySlug = $_GET['lib'] ?? '';
$fileName = $_GET['file'] ?? '';

if (empty($librarySlug) || empty($fileName)) {
    http_response_code(400);
    exit('Ungültige Parameter');
}

// Load library
$manager = getBibliothekManager();
$library = $manager->getLibrary($librarySlug);

if (!$library) {
    http_response_code(404);
    exit('Bibliothek nicht gefunden');
}

// Check permission
if (!$isAdmin && !$library->hasPermission($currentUser, 'download')) {
    http_response_code(403);
    exit('Keine Download-Berechtigung');
}

// Get file
$fileName = basename($fileName); // Security
$filePath = $library->getPath() . '/' . $fileName;

if (!file_exists($filePath) || !is_file($filePath)) {
    http_response_code(404);
    exit('Datei nicht gefunden');
}

// Send file
$fileSize = filesize($filePath);
$mimeType = mime_content_type($filePath);

// Increment download counter
$library->incrementDownloadCounter($fileName);

header('Content-Type: ' . $mimeType);
header('Content-Length: ' . $fileSize);
header('Content-Disposition: attachment; filename="' . $fileName . '"');
header('Cache-Control: must-revalidate');
header('Pragma: public');

readfile($filePath);
exit;
