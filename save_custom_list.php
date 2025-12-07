<?php

declare(strict_types=1);

session_start();
require_once 'config.php';

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit;
}

// Verify CSRF token
$headers = array_change_key_case(getallheaders(), CASE_LOWER);
$csrfToken = $headers['x-csrf-token'] ?? '';
if (empty($csrfToken) || !verifyCsrfToken($csrfToken)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid CSRF token']);
    exit;
}

// Check manage_users permission (only admin can manage lists)
if (!hasPermission('manage_users')) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'No permission']);
    exit;
}

$action = $_POST['action'] ?? '';
$listFile = $config['download_dir'] . '/.custom_lists.json';

// Load existing lists
$lists = ['tabs' => []];
if (file_exists($listFile)) {
    $lists = json_decode(file_get_contents($listFile), true) ?? ['tabs' => []];
}

switch ($action) {
    case 'create_tab':
        $title = trim($_POST['title'] ?? '');
        if (empty($title)) {
            echo json_encode(['success' => false, 'error' => 'Title required']);
            exit;
        }

        $newTab = [
            'id' => 'list_' . uniqid(),
            'title' => $title,
            'columns' => ['Erledigt', 'Prio', 'Beschreibung'],
            'rows' => []
        ];

        $lists['tabs'][] = $newTab;
        break;

    case 'add_row':
        $listId = $_POST['list_id'] ?? '';
        $tabIndex = findTabIndex($lists, $listId);

        if ($tabIndex === -1) {
            echo json_encode(['success' => false, 'error' => 'List not found']);
            exit;
        }

        $newRow = [
            'checked' => false,
            'priority' => 0,
            'cells' => ['Neuer Eintrag']
        ];

        $lists['tabs'][$tabIndex]['rows'][] = $newRow;
        break;

    case 'toggle_checkbox':
        $listId = $_POST['list_id'] ?? '';
        $rowIndex = (int)($_POST['row_index'] ?? -1);
        $checked = ($_POST['checked'] ?? '0') === '1';

        $tabIndex = findTabIndex($lists, $listId);
        if ($tabIndex === -1 || !isset($lists['tabs'][$tabIndex]['rows'][$rowIndex])) {
            echo json_encode(['success' => false, 'error' => 'Row not found']);
            exit;
        }

        $lists['tabs'][$tabIndex]['rows'][$rowIndex]['checked'] = $checked;
        break;

    case 'edit_cell':
        $listId = $_POST['list_id'] ?? '';
        $rowIndex = (int)($_POST['row_index'] ?? -1);
        $cellIndex = (int)($_POST['cell_index'] ?? -1);
        $value = $_POST['value'] ?? '';

        $tabIndex = findTabIndex($lists, $listId);
        if ($tabIndex === -1 || !isset($lists['tabs'][$tabIndex]['rows'][$rowIndex])) {
            echo json_encode(['success' => false, 'error' => 'Row not found']);
            exit;
        }

        $lists['tabs'][$tabIndex]['rows'][$rowIndex]['cells'][$cellIndex] = $value;
        break;

    case 'edit_priority':
        $listId = $_POST['list_id'] ?? '';
        $rowIndex = (int)($_POST['row_index'] ?? -1);
        $priority = (int)($_POST['priority'] ?? 0);

        if ($priority < 0 || $priority > 3) {
            echo json_encode(['success' => false, 'error' => 'Invalid priority']);
            exit;
        }

        $tabIndex = findTabIndex($lists, $listId);
        if ($tabIndex === -1 || !isset($lists['tabs'][$tabIndex]['rows'][$rowIndex])) {
            echo json_encode(['success' => false, 'error' => 'Row not found']);
            exit;
        }

        $lists['tabs'][$tabIndex]['rows'][$rowIndex]['priority'] = $priority;
        break;

    case 'delete_row':
        $listId = $_POST['list_id'] ?? '';
        $rowIndex = (int)($_POST['row_index'] ?? -1);

        $tabIndex = findTabIndex($lists, $listId);
        if ($tabIndex === -1 || !isset($lists['tabs'][$tabIndex]['rows'][$rowIndex])) {
            echo json_encode(['success' => false, 'error' => 'Row not found']);
            exit;
        }

        array_splice($lists['tabs'][$tabIndex]['rows'], $rowIndex, 1);
        break;

    case 'delete_list':
        $listId = $_POST['list_id'] ?? '';
        $tabIndex = findTabIndex($lists, $listId);

        if ($tabIndex === -1) {
            echo json_encode(['success' => false, 'error' => 'List not found']);
            exit;
        }

        array_splice($lists['tabs'], $tabIndex, 1);
        break;

    default:
        echo json_encode(['success' => false, 'error' => 'Invalid action']);
        exit;
}

// Save lists
if (file_put_contents($listFile, json_encode($lists, JSON_PRETTY_PRINT)) !== false) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Failed to save']);
}

function findTabIndex($lists, $listId)
{
    foreach ($lists['tabs'] as $index => $tab) {
        if ($tab['id'] === $listId) {
            return $index;
        }
    }
    return -1;
}
