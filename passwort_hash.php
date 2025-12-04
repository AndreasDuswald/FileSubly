<?php
declare(strict_types=1);

/**
 * Kleines Helper-Script zum Erzeugen eines Passwort-Hashes.
 *
 * Gebrauch:
 * 1) In Datei make_hash.php speichern.
 * 2) Browser öffnen: https://DEINEURL/make_hash.php
 * 3) Passwort eingeben → Hash erscheint.
 * 4) Hash in config.php eintragen.
 * 5) Datei wieder löschen! (Sicherheitsgrund)
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plain = (string)($_POST['password'] ?? '');
    $plain = trim($plain);

    if ($plain === '') {
        $msg = 'Bitte ein Passwort eingeben.';
    } else {
        $hash = password_hash($plain, PASSWORD_DEFAULT);
        $msg = "Dein Passwort-Hash:<br><code>{$hash}</code>";
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Passwort Hash Generator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>🔐 Passwort-Hash Generator</h1>
    <form method="post">
        <label>Passwort eingeben:</label><br>
        <input type="password" name="password" required>
        <br><br>
        <button type="submit">Hash erzeugen</button>
    </form>

    <?php if (isset($msg)): ?>
        <hr>
        <div><?= $msg ?></div>
    <?php endif; ?>
</body>
</html>
