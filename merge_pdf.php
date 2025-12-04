<?php

declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';

// Nur User mit merge-Permission dürfen mergen
if (!hasPermission('merge')) {
    http_response_code(403);
    exit('Keine Berechtigung zum Zusammenführen von PDFs.');
}

// CSRF-Check
if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    $_SESSION['upload_error'] = 'Ungültige Anfrage (CSRF-Token fehlt).';
    header('Location: index.php');
    exit;
}

// FPDF und FPDI laden
require_once __DIR__ . '/lib/fpdf/fpdf.php';
require_once __DIR__ . '/lib/fpdi/FPDI-2.6.1/src/autoload.php';

use setasign\Fpdi\Fpdi;

$downloadDir = rtrim($config['download_dir'], DIRECTORY_SEPARATOR);

// PDFs aus POST holen
$selectedFiles = $_POST['pdf_files'] ?? [];

if (empty($selectedFiles)) {
    $_SESSION['upload_error'] = 'Keine PDFs ausgewählt.';
    header('Location: index.php');
    exit;
}

try {
    $pdf = new Fpdi();

    // Alle ausgewählten PDFs durchgehen
    foreach ($selectedFiles as $filename) {
        $filename = basename($filename); // Sicherheit
        $filePath = $downloadDir . '/' . $filename;

        if (!file_exists($filePath)) {
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

    // Ausgabe
    $outputName = 'Zusammengefuehrt_' . date('Y-m-d_H-i-s') . '.pdf';
    $pdf->Output('D', $outputName);
    exit;

} catch (Exception $e) {
    $_SESSION['upload_error'] = 'Fehler beim Zusammenführen: ' . $e->getMessage();
    header('Location: index.php');
    exit;
}
