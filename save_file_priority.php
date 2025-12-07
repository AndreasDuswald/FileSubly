<?php

declare(strict_types=1);

session_start();
require_once 'config.php';

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    http_response_code(403);
    exit('Unauthorized');
}

// Verify CSRF token
$headers = array_change_key_case(getallheaders(), CASE_LOWER);
$csrfToken = $headers['x-csrf-token'] ?? '';
if (!isset($_POST['filename']) || !isset($_POST['priority']) || empty($csrfToken) || !verifyCsrfToken($csrfToken)) {
    http_response_code(400);
    exit('Invalid request');
}

// Check manage_users permission (only admin can set priorities)
if (!hasPermission('manage_users')) {
    http_response_code(403);
    exit('No permission');
}

$filename = $_POST['filename'];
$priority = (int)$_POST['priority'];

// Validate priority range
if ($priority < 0 || $priority > 3) {
    http_response_code(400);
    exit('Invalid priority value');
}

// Load existing priorities
$priorityFile = $config['download_dir'] . '/.file_priorities.json';
$priorities = [];
if (file_exists($priorityFile)) {
    $priorities = json_decode(file_get_contents($priorityFile), true) ?? [];
}

// Update or remove priority
if ($priority === 0) {
    unset($priorities[$filename]);
} else {
    $priorities[$filename] = $priority;
}

// Save priorities
if (file_put_contents($priorityFile, json_encode($priorities, JSON_PRETTY_PRINT)) !== false) {
    http_response_code(200);
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    exit('Failed to save priority');
}
