<?php

declare(strict_types=1);

session_start();
require_once 'config.php';
require_once __DIR__ . '/lib/tcpdf/tcpdf.php';

// Ensure user is logged in
if (!isset($_SESSION['user'])) {
    http_response_code(403);
    exit('Unauthorized');
}

$listId = $_GET['list_id'] ?? '';
if (empty($listId)) {
    http_response_code(400);
    exit('List ID required');
}

// Load lists
$listFile = $config['download_dir'] . '/.custom_lists.json';
if (!file_exists($listFile)) {
    http_response_code(404);
    exit('Lists not found');
}

$lists = json_decode(file_get_contents($listFile), true) ?? ['tabs' => []];
$targetTab = null;

foreach ($lists['tabs'] as $tab) {
    if ($tab['id'] === $listId) {
        $targetTab = $tab;
        break;
    }
}

if (!$targetTab) {
    http_response_code(404);
    exit('List not found');
}

// Generate filename from list title
$fileName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $targetTab['title']) . '.pdf';
$filePath = $config['download_dir'] . '/' . $fileName;

// Create PDF using TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set document information
$pdf->SetCreator('FileSubly');
$pdf->SetAuthor($_SESSION['user']);
$pdf->SetTitle($targetTab['title']);

// Set margins - full width usage
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(true, 15);

// Add a page
$pdf->AddPage();

// Title
$pdf->SetFont('helvetica', 'B', 22);
$pdf->Cell(0, 10, $targetTab['title'], 0, 1, 'L');

// Subtitle with line
$pdf->SetFont('helvetica', '', 9);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(0, 5, 'Erstellt am: ' . date('d.m.Y H:i') . ' Uhr', 0, 1, 'L');
$pdf->SetDrawColor(0, 102, 204);
$pdf->SetLineWidth(0.8);
$pdf->Line(15, $pdf->GetY(), 195, $pdf->GetY());
$pdf->Ln(5);

// Reset colors for table
$pdf->SetTextColor(0, 0, 0);
$pdf->SetDrawColor(200, 200, 200);

// Calculate column widths (total: 180mm for A4 with 15mm margins)
$colWidths = [
    20,  // Checkbox
    15,  // Prio
    145  // Text (rest of width)
];

// Table header
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->SetLineWidth(0.2);

foreach ($targetTab['columns'] as $colIndex => $column) {
    $align = ($colIndex === 0 || $colIndex === 1) ? 'C' : 'L';
    $pdf->Cell($colWidths[$colIndex], 8, $column, 1, 0, $align, true);
}
$pdf->Ln();

// Table rows
$pdf->SetFont('helvetica', '', 10);
$fill = false;

foreach ($targetTab['rows'] as $rowIndex => $row) {
    // Alternate row colors
    if ($fill) {
        $pdf->SetFillColor(250, 250, 250);
    } else {
        $pdf->SetFillColor(255, 255, 255);
    }

    $maxHeight = 7;

    // Calculate required height for text with word wrap
    $textWidth = $colWidths[2] - 4; // subtract padding
    foreach ($row['cells'] as $cell) {
        $cellHeight = $pdf->getStringHeight($textWidth, $cell);
        if ($cellHeight > $maxHeight) {
            $maxHeight = $cellHeight;
        }
    }

    // Checkbox
    $checkboxSymbol = $row['checked'] ? '☑' : '[ ]';
    $pdf->MultiCell($colWidths[0], $maxHeight, $checkboxSymbol, 1, 'C', true, 0, '', '', true, 0, false, true, $maxHeight, 'M');

    // Priority
    $prioText = $row['priority'] > 0 ? (string)$row['priority'] : '';
    $pdf->MultiCell($colWidths[1], $maxHeight, $prioText, 1, 'C', true, 0, '', '', true, 0, false, true, $maxHeight, 'M');

    // Text cells
    foreach ($row['cells'] as $cell) {
        $pdf->MultiCell($colWidths[2], $maxHeight, $cell, 1, 'L', true, 0, '', '', true, 0, false, true, $maxHeight, 'T');
    }

    $pdf->Ln();
    $fill = !$fill;
}

// Save PDF to files directory (overwrite if exists)
$pdf->Output($filePath, 'F');

// Set priority to 1 for this file
$priorityFile = $config['download_dir'] . '/.file_priorities.json';
$priorities = [];
if (file_exists($priorityFile)) {
    $priorities = json_decode(file_get_contents($priorityFile), true) ?? [];
}
$priorities[$fileName] = 1;
file_put_contents($priorityFile, json_encode($priorities, JSON_PRETTY_PRINT));

// Also offer browser download
$pdf->Output($fileName, 'D');
