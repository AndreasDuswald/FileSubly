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

// Check POST and CSRF
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Methode nicht erlaubt');
}

if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
    http_response_code(403);
    exit('CSRF-Token ungültig');
}

// Get parameters
$librarySlug = $_POST['library'] ?? '';
$pdfFiles = $_POST['pdf_files'] ?? [];

if (empty($librarySlug) || empty($pdfFiles) || !is_array($pdfFiles)) {
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
if (!$isAdmin && !$library->hasPermission($currentUser, 'merge')) {
    http_response_code(403);
    exit('Keine Merge-Berechtigung');
}

// FPDF und FPDI laden
require_once __DIR__ . '/lib/fpdf/fpdf.php';
require_once __DIR__ . '/lib/fpdi/FPDI-2.6.1/src/autoload.php';

use setasign\Fpdi\Fpdi;

try {
    $pdf = new Fpdi();

    // Alle ausgewählten PDFs durchgehen
    foreach ($pdfFiles as $filename) {
        $filename = basename($filename); // Sicherheit
        $filePath = $library->getPath() . '/' . $filename;

        if (!file_exists($filePath)) {
            continue;
        }

        // Nur PDFs
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if ($ext !== 'pdf') {
            continue;
        }

        // PDF laden
        $pageCount = $pdf->setSourceFile($filePath);

        // Alle Seiten importieren
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $templateId = $pdf->importPage($pageNo);
            $size = $pdf->getTemplateSize($templateId);

            // Seite mit Original-Größe hinzufügen
            $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
            $pdf->useTemplate($templateId);
        }
    }

    // Ausgabe als Download
    $outputName = $library->getSlug() . '_Zusammengefuehrt_' . date('Y-m-d_H-i-s') . '.pdf';
    $pdf->Output('D', $outputName);
    exit;

} catch (Exception $e) {
    $_SESSION['merge_error'] = '❌ Fehler beim Zusammenführen: ' . $e->getMessage();
    header('Location: bibliothek.php?lib=' . urlencode($librarySlug));
    exit;
}
