# 🚀 Future Features - FileSubly

Geplante Features und Erweiterungen für zukünftige Versionen.

---

## 📧 E-Mail Benachrichtigung für neue Dateien

**Status:** 🎯 Geplant  
**Priorität:** Hoch  
**Version:** 1.4.0

### Konzept

Erweitere die bestehende Checkbox-Auswahl in der Dateiliste um eine E-Mail-Benachrichtigungsfunktion.

**Aktuell:**

- Checkboxen zum Auswählen mehrerer PDFs
- Button "📄 Ausgewählte PDFs zusammenführen"

**Neu:**

- Zusätzlicher Button "📧 Benutzer informieren" neben dem Merge-Button
- Modal öffnet sich mit User-Liste (Checkboxen für jeden User)
- Admin wählt aus, welche User benachrichtigt werden sollen
- Optional: Persönliche Nachricht hinzufügen
- E-Mail wird versendet mit Liste der ausgewählten Dateien

### User Story

```
Als Admin möchte ich ausgewählte Dateien an bestimmte User schicken,
damit sie informiert werden, welche neuen/wichtigen Dokumente verfügbar sind,
ohne dass ich jeden einzeln anrufen oder manuell informieren muss.
```

### UI/UX Design

#### Schritt 1: Dateien auswählen

```
┌─────────────────────────────────────────────────────┐
│ [✓] Dokument1.pdf                                   │
│ [✓] Dokument2.pdf                                   │
│ [ ] Tabelle.xlsx                                    │
└─────────────────────────────────────────────────────┘

Buttons (intelligente Logik):
[📄 Ausgewählte PDFs zusammenführen (2)]  [📧 Benutzer informieren (2)]
```

**Button-Logik:**

| Auswahl        | Merge-Button          | Notify-Button |
| -------------- | --------------------- | ------------- |
| 2 PDFs         | ✅ Aktiv (2)          | ✅ Aktiv (2)  |
| 1 PDF + 1 XLSX | ⚠️ Disabled + Tooltip | ✅ Aktiv (2)  |
| 2 XLSX         | ❌ Versteckt          | ✅ Aktiv (2)  |
| Nichts         | ❌ Versteckt          | ❌ Versteckt  |

**Tooltip bei Merge-Disabled:**

```
⚠️ PDF-Zusammenführung nur mit reinen PDF-Auswahlen möglich.
Bitte entferne andere Dateitypen (xlsx, docx, etc.)
```

**JavaScript-Logik:**

```javascript
function updateActionButtons() {
  const selected = getSelectedFiles();
  const pdfCount = selected.filter((f) => f.endsWith(".pdf")).length;
  const totalCount = selected.length;
  const allPdfs = pdfCount === totalCount && totalCount > 0;
  const hasMixedTypes = totalCount > 0 && !allPdfs;

  // Merge-Button
  if (totalCount === 0 || pdfCount === 0) {
    $("#mergePdfBtn").hide();
  } else if (allPdfs) {
    $("#mergePdfBtn")
      .show()
      .prop("disabled", false)
      .html(`📄 Ausgewählte PDFs zusammenführen (${pdfCount})`);
  } else {
    $("#mergePdfBtn")
      .show()
      .prop("disabled", true)
      .attr("title", "⚠️ Nur reine PDF-Auswahlen können zusammengeführt werden")
      .html(`📄 PDFs zusammenführen (${pdfCount}/${totalCount})`);
  }

  // Notify-Button (immer verfügbar bei Auswahl)
  if (totalCount === 0) {
    $("#notifyBtn").hide();
  } else {
    $("#notifyBtn")
      .show()
      .prop("disabled", false)
      .html(`📧 Benutzer informieren (${totalCount})`);
  }
}

// Bei jedem Checkbox-Click aufrufen
$(".file-checkbox").on("change", updateActionButtons);
```

#### Schritt 2: User auswählen (Modal)

```
┌──────────────────────────────────────────────────────┐
│  📧 Benutzer über neue Dateien informieren           │
├──────────────────────────────────────────────────────┤
│                                                      │
│  Ausgewählte Dateien (2):                           │
│  • Dokument1.pdf                                    │
│  • Dokument2.pdf                                    │
│                                                      │
│  ─────────────────────────────────────────────────  │
│                                                      │
│  An folgende Benutzer senden:                       │
│                                                      │
│  [✓] 👤 Peter (peter@example.com)                   │
│  [✓] 👤 Maria (maria@example.com)                   │
│  [ ] 👤 Hans (hans@example.com)                     │
│  [✓] 👑 Admin (admin@example.com)                   │
│                                                      │
│  [ ] Alle auswählen / [ ] Alle abwählen             │
│                                                      │
│  ─────────────────────────────────────────────────  │
│                                                      │
│  Optionale Nachricht:                               │
│  ┌────────────────────────────────────────────────┐ │
│  │ Bitte die neuen Dokumente prüfen und bei      │ │
│  │ Fragen melden.                                 │ │
│  └────────────────────────────────────────────────┘ │
│                                                      │
│  [Abbrechen]                [📧 E-Mails senden (3)] │
└──────────────────────────────────────────────────────┘
```

#### Schritt 3: Bestätigung

```
┌──────────────────────────────────────────────────────┐
│  ✅ E-Mails erfolgreich versendet!                   │
├──────────────────────────────────────────────────────┤
│                                                      │
│  📧 3 Benutzer wurden informiert:                    │
│  • Peter                                            │
│  • Maria                                            │
│  • Admin                                            │
│                                                      │
│  Über folgende Dateien:                             │
│  • Dokument1.pdf                                    │
│  • Dokument2.pdf                                    │
│                                                      │
│  [OK]                                               │
└──────────────────────────────────────────────────────┘
```

### E-Mail Template

**Betreff:**

```
[FileSubly] Neue Dokumente verfügbar (2)
```

**Body:**

```
Hallo Peter,

es wurden neue Dokumente für dich bereitgestellt:

📄 Verfügbare Dokumente:
──────────────────────────────────────
• Dokument1.pdf
• Dokument2.pdf

Nachricht vom Admin:
──────────────────────────────────────
Bitte die neuen Dokumente prüfen und bei Fragen melden.

──────────────────────────────────────

» Zum Download-Portal:
https://your-domain.com/FileSubly/

──────────────────────────────────────
Diese E-Mail wurde automatisch von FileSubly versendet.
Bei Fragen wende dich an deinen Administrator.
```

---

## 🛠️ Technische Umsetzung

### ⚠️ Wichtig: Button-Logik für gemischte Dateitypen

**Problem:**

- PDF-Merge funktioniert nur mit reinen PDF-Auswahlen
- E-Mail-Benachrichtigung sollte aber alle Dateitypen unterstützen

**Lösung:**

1. **Merge-Button** wird disabled wenn Non-PDFs dabei sind (mit Tooltip)
2. **Notify-Button** ist immer aktiv bei jeder Dateiauswahl
3. **Checkbox-Handler** aktualisiert Button-States in Echtzeit

**Implementierung in `index.php`:**

```javascript
function updateActionButtons() {
  const selected = getSelectedFiles();
  const pdfCount = selected.filter((f) =>
    f.toLowerCase().endsWith(".pdf")
  ).length;
  const totalCount = selected.length;
  const allPdfs = pdfCount === totalCount && totalCount > 0;

  // Merge-Button Logik
  const mergeBtn = $("#pdfMergeActions button");
  if (totalCount === 0 || pdfCount === 0) {
    mergeBtn.closest("#pdfMergeActions").hide();
  } else if (allPdfs) {
    mergeBtn.closest("#pdfMergeActions").show();
    mergeBtn
      .prop("disabled", false)
      .removeClass("btn-secondary")
      .addClass("btn-success")
      .attr("title", "")
      .html(`📄 Ausgewählte PDFs zusammenführen (${pdfCount})`);
  } else {
    mergeBtn.closest("#pdfMergeActions").show();
    mergeBtn
      .prop("disabled", true)
      .removeClass("btn-success")
      .addClass("btn-secondary")
      .attr(
        "title",
        "⚠️ Nur reine PDF-Auswahlen können zusammengeführt werden. Bitte entferne andere Dateitypen."
      )
      .html(
        `📄 PDFs zusammenführen (${pdfCount}/${totalCount} - Gemischte Typen)`
      );
  }

  // Notify-Button (immer verfügbar)
  const notifyBtn = $("#notifyUsersBtn");
  if (totalCount === 0) {
    notifyBtn.hide();
  } else {
    notifyBtn
      .show()
      .prop("disabled", false)
      .html(`📧 Benutzer informieren (${totalCount})`);
  }

  // Badge-Count aktualisieren
  $("#selectedCount").text(pdfCount);
}

// Event-Listener für alle Checkboxen
$(document).on("change", ".file-checkbox", updateActionButtons);
```

**CSS für disabled Button:**

```css
.btn-secondary[disabled] {
  cursor: not-allowed;
  opacity: 0.6;
}
```

### Schritt-für-Schritt Plan

#### Phase 1: Vorbereitung (30 Min)

**Ziel:** E-Mail-Infrastruktur einrichten

1. **E-Mail-Konfiguration in `config.php`**

   - SMTP-Settings hinzufügen (Host, Port, User, Pass)
   - Fallback auf PHP `mail()` wenn kein SMTP
   - Absender-E-Mail und Name konfigurierbar

2. **User-E-Mails sicherstellen**

   - `users.json` Schema prüfen (hat bereits `email` Feld)
   - Falls fehlend: Migration-Script für bestehende User

3. **PHPMailer installieren** (falls noch nicht vorhanden)
   ```powershell
   # Composer oder manueller Download
   composer require phpmailer/phpmailer
   # ODER: Manuelle Installation in lib/phpmailer/
   ```

**Dateien:**

- `config.php` (neue Funktion `sendNotificationEmail()`)
- `settings.json` (SMTP-Settings)

---

#### Phase 2: Backend API (45 Min)

**Ziel:** Endpoint für E-Mail-Versand erstellen

1. **Neue Datei: `send_notification.php`**

   - Prüft Admin-Rechte (`hasPermission('manage_users')`)
   - Empfängt POST-Daten:
     ```json
     {
       "files": ["file1.pdf", "file2.pdf"],
       "recipients": ["peter", "maria", "admin"],
       "message": "Optional custom message"
     }
     ```
   - CSRF-Token validieren
   - User-E-Mails aus `users.json` laden
   - E-Mails versenden (Loop über Recipients)
   - Logging: Wer hat wann welche E-Mails versendet

2. **Funktion in `config.php`**

   ```php
   function sendNotificationEmail(
       string $recipientEmail,
       string $recipientName,
       array $files,
       string $customMessage = ''
   ): bool
   ```

3. **Log-Datei: `.notification_log.json`**
   - Tracking: Wer wurde wann über welche Dateien informiert
   - Verhindert Spam (z.B. max. 1 Mail pro User pro Stunde)

**Dateien:**

- `send_notification.php` (neu)
- `config.php` (neue Funktion)
- `.gitignore` (`.notification_log.json` hinzufügen)

---

#### Phase 3: Frontend UI (60 Min)

**Ziel:** Button und Modal hinzufügen

1. **Button in `index.php` hinzufügen**

   - Neben "PDFs zusammenführen" Button
   - Nur sichtbar für Admins (`hasPermission('manage_users')`)
   - Badge mit Anzahl ausgewählter Dateien
   - Disabled wenn keine Dateien ausgewählt

2. **Modal erstellen**

   ```html
   <div class="modal" id="notifyUsersModal">
     <!-- User-Liste mit Checkboxen -->
     <!-- Textarea für optionale Nachricht -->
     <!-- Senden-Button -->
   </div>
   ```

3. **JavaScript-Funktionen**

   ```javascript
   function openNotifyUsersModal()
   function toggleAllUsers()
   function sendNotifications()
   ```

4. **AJAX-Call zum Backend**
   - FormData mit Files, Recipients, Message
   - Success-Feedback (Toast oder Modal)
   - Error-Handling

**Dateien:**

- `index.php` (Button + Modal HTML)
- `index.php` (JavaScript Funktionen)

---

#### Phase 4: E-Mail Template & Design (30 Min)

**Ziel:** Professionelles E-Mail-Layout

1. **HTML-E-Mail Template erstellen**

   - Responsive Design (funktioniert in allen Mail-Clients)
   - FileSubly Branding (Logo, Farben)
   - Dateiliste als schöne Aufzählung
   - Link zum Portal
   - Footer mit Disclaimer

2. **Plain-Text Fallback**
   - Für Mail-Clients ohne HTML-Support

**Dateien:**

- `templates/email_notification.html` (neu)
- `templates/email_notification.txt` (neu)

---

#### Phase 5: Settings UI (Optional, 45 Min)

**Ziel:** SMTP-Einstellungen im Admin-Panel konfigurierbar

1. **Settings-Seite erweitern**

   - Neue Sektion "📧 E-Mail Einstellungen"
   - Felder: SMTP Host, Port, Username, Password, From-Email, From-Name
   - Test-Mail Button ("E-Mail an mich senden")

2. **Speichern in `settings.json`**
   - Passwörter verschlüsselt speichern (optional)

**Dateien:**

- `settings.php` (erweitern)

---

#### Phase 6: Testing & Polish (30 Min)

1. **Testszenarien:**

   - ✅ E-Mail an 1 User
   - ✅ E-Mail an mehrere User
   - ✅ Mit/ohne optionale Nachricht
   - ✅ Fehlerfall: Ungültige E-Mail-Adresse
   - ✅ Fehlerfall: SMTP-Verbindung fehlgeschlagen
   - ✅ Spam-Schutz: Zu viele Mails in kurzer Zeit

2. **UI-Polish:**

   - Loading-Spinner während E-Mail-Versand
   - Toast-Notifications für Success/Error
   - Button disabled während Versand

3. **Dokumentation:**
   - CHANGELOG.md updaten
   - README.md erweitern (neues Feature beschreiben)

---

## 📊 Geschätzte Umsetzungszeit

| Phase     | Beschreibung           | Zeit             |
| --------- | ---------------------- | ---------------- |
| 1         | E-Mail-Infrastruktur   | 30 Min           |
| 2         | Backend API            | 45 Min           |
| 3         | Frontend UI            | 60 Min           |
| 4         | E-Mail Templates       | 30 Min           |
| 5         | Settings UI (Optional) | 45 Min           |
| 6         | Testing & Polish       | 30 Min           |
| **Total** |                        | **~3-4 Stunden** |

---

## 🔒 Security Considerations

1. **CSRF-Protection:** Alle POST-Requests validieren
2. **Rate-Limiting:** Max. X E-Mails pro Admin pro Stunde
3. **E-Mail Validation:** Sicherstellen, dass nur registrierte User-E-Mails verwendet werden
4. **SMTP-Credentials:** Verschlüsselt in settings.json speichern
5. **Logging:** Alle versendeten E-Mails protokollieren (Audit-Trail)
6. **Permissions:** Nur Admins können E-Mails versenden

---

## 🎯 Success Criteria

- [ ] Admin kann Dateien auswählen und "Benutzer informieren" klicken
- [ ] Modal zeigt alle registrierten User mit E-Mail
- [ ] E-Mails werden erfolgreich versendet
- [ ] Empfänger erhalten formatierte E-Mail mit Dateiliste
- [ ] Optionale Nachricht wird korrekt übernommen
- [ ] Logging funktioniert (Wer wurde wann informiert)
- [ ] Success-Feedback im Frontend
- [ ] Fehlerbehandlung bei fehlgeschlagenen E-Mails

---

## 🚀 Weitere Ausbaustufen

### v1.4.1 - Erweiterte Features

- **E-Mail-Templates verwalten:** Admin kann eigene Templates erstellen
- **Zeitgesteuerte E-Mails:** "Morgen um 9 Uhr versenden"
- **Empfangs-Bestätigung:** Tracking ob E-Mail geöffnet wurde (optional)
- **Gruppen:** "Team Vertrieb", "Alle Premium-User" als Shortcuts

### v1.4.2 - Automatisierung

- **Auto-Benachrichtigung:** Bei Upload automatisch bestimmte User informieren
- **Regeln:** "Alle PDFs mit 'Rechnung' im Namen → an Buchhaltung"
- **Digest-Mails:** Wöchentliche Zusammenfassung neuer Dateien

---

## 💡 Offene Fragen

1. **SMTP vs. PHP mail()?**

   - Empfehlung: SMTP für Zuverlässigkeit
   - Fallback auf mail() wenn SMTP nicht konfiguriert

2. **Attachments direkt mitschicken?**

   - Option 1: Nur Link (empfohlen, kleinere Mails)
   - Option 2: Dateien als Attachment (optional checkbox)

3. **Benachrichtigungs-Präferenzen pro User?**

   - Soll User sich abmelden können? ("Keine E-Mails erhalten")
   - User-Profil mit E-Mail-Settings erweitern?

4. **Queue-System für viele E-Mails?**
   - Bei >10 Empfängern: Background-Job statt direkter Versand?
   - Verhindert Timeouts

---

## 🚨 Error Reporting & Monitoring System

**Status:** 📅 Nach E-Mail-Feature  
**Priorität:** Mittel  
**Version:** 1.5.0  
**Abhängigkeit:** E-Mail-System muss funktionieren

### Konzept

Ein integriertes Error-Reporting System für Admins, das alle Fehler, Warnungen und kritischen Events zentral sammelt und visualisiert.

**Probleme die gelöst werden:**
- ❌ PHP-Fehler werden nur in Apache-Logs geschrieben (nicht benutzerfreundlich)
- ❌ Admins wissen nicht wenn etwas schiefgeht
- ❌ User bekommen generische "Es ist ein Fehler aufgetreten" Messages
- ❌ Debugging erfordert Server-Zugriff

**Neue Lösung:**
- ✅ Zentrales Error-Dashboard für Admins
- ✅ E-Mail-Benachrichtigung bei kritischen Fehlern
- ✅ Benutzerfreundliche Fehlermeldungen für User
- ✅ Automatisches Logging mit Context (User, File, Action)

### Features

#### 1. Error Dashboard (Admin-Only)
```
┌──────────────────────────────────────────────────────┐
│  🚨 System-Fehler & Warnungen                        │
├──────────────────────────────────────────────────────┤
│                                                      │
│  📊 Übersicht (Letzte 7 Tage)                       │
│  ┌─────────────┬─────────────┬─────────────┐       │
│  │  Kritisch   │   Warnung   │    Info     │       │
│  │     3       │     12      │     45      │       │
│  └─────────────┴─────────────┴─────────────┘       │
│                                                      │
│  🔴 Kritische Fehler:                               │
│  ──────────────────────────────────────────────     │
│  • PDF Merge fehlgeschlagen (3x heute)             │
│    User: Peter | Datei: dokument.pdf               │
│    Fehler: Memory limit exceeded                    │
│    [Details] [Als gelöst markieren]                │
│                                                      │
│  ⚠️ Warnungen:                                      │
│  ──────────────────────────────────────────────     │
│  • Upload fast am Limit (48/50 MB)                 │
│    User: Maria | Datei: großedatei.xlsx            │
│    [Details]                                        │
│                                                      │
│  ℹ️ Informationen:                                  │
│  ──────────────────────────────────────────────     │
│  • System-Backup erfolgreich (heute 03:00)         │
│  • 15 neue Downloads heute                          │
│                                                      │
└──────────────────────────────────────────────────────┘
```

#### 2. Error-Typen & Severity

**Kritisch (🔴):**
- PHP Fatal Errors
- Datenbank-Corruption (JSON-Files)
- Upload-Fehler (Permission-Problems)
- PDF-Merge Crashes
- Authentication-Failures (außer normale Login-Fehler)

**Warnung (⚠️):**
- Dateigröße nahe am Limit
- Langsame Operations (>5s)
- Viele fehlgeschlagene Logins (Bot-Verdacht)
- Speicherplatz <10% frei

**Info (ℹ️):**
- Erfolgreiche Backups
- System-Updates
- Neue User erstellt
- Feature-Usage Stats

#### 3. E-Mail-Benachrichtigungen

**Sofort-Benachrichtigung** (bei kritischen Fehlern):
```
Betreff: [FileSubly] 🚨 Kritischer Fehler aufgetreten

Hallo Admin,

Ein kritischer Fehler ist aufgetreten:

Fehler: PDF Merge fehlgeschlagen
User: Peter (peter@example.com)
Datei: rechnung_2025.pdf
Zeit: 07.12.2025 18:45:23

Details:
──────────────────────────────────────
Fatal error: Allowed memory size of 134217728 bytes exhausted
Stack Trace: merge_pdf.php:45

Empfohlene Aktion:
- Memory Limit in php.ini erhöhen
- Große PDF-Dateien komprimieren

» Zum Error-Dashboard:
https://your-domain.com/FileSubly/errors.php

──────────────────────────────────────
Diese E-Mail wurde automatisch generiert.
```

**Tägliche Digest-Mail** (Optional):
- Zusammenfassung aller Fehler des Tages
- Nur wenn Fehler aufgetreten sind
- Konfigurierbare Uhrzeit (z.B. 20:00)

#### 4. User-Friendly Error Messages

**Aktuell:**
```php
// Generisch und nicht hilfreich
$_SESSION['upload_error'] = "Fehler beim Hochladen.";
```

**Neu:**
```php
// Kontextbezogen und hilfreich
$_SESSION['upload_error'] = "Upload fehlgeschlagen: Datei ist zu groß (52 MB / max. 50 MB). Bitte Datei komprimieren.";

// Im Hintergrund: Log als Warning für Admin
logError('upload_size_exceeded', [
    'user' => $_SESSION['user'],
    'file' => $fileName,
    'size' => formatBytes($fileSize),
    'limit' => formatBytes($maxSize)
], 'warning');
```

### Technische Umsetzung

#### Datei-Struktur
```
.error_log.json          - Alle Fehler mit Timestamps, Context
.error_config.json       - Error-Reporting Einstellungen
errors.php               - Admin Error-Dashboard
includes/error_handler.php - Custom Error/Exception Handler
```

#### Custom Error Handler
```php
// In config.php oder separater error_handler.php

set_error_handler('customErrorHandler');
set_exception_handler('customExceptionHandler');

function customErrorHandler($errno, $errstr, $errfile, $errline) {
    $severity = match($errno) {
        E_ERROR, E_PARSE, E_CORE_ERROR => 'critical',
        E_WARNING, E_NOTICE => 'warning',
        default => 'info'
    };
    
    logError('php_error', [
        'message' => $errstr,
        'file' => $errfile,
        'line' => $errline,
        'user' => $_SESSION['user'] ?? 'guest'
    ], $severity);
    
    // Bei kritischen Fehlern: E-Mail an Admin
    if ($severity === 'critical') {
        sendErrorNotificationEmail($errstr, $errfile, $errline);
    }
    
    return false; // PHP default handler läuft weiter
}

function logError(string $type, array $context, string $severity = 'info'): void {
    $logFile = __DIR__ . '/.error_log.json';
    $logs = file_exists($logFile) ? json_decode(file_get_contents($logFile), true) : [];
    
    $logs[] = [
        'id' => uniqid('err_'),
        'type' => $type,
        'severity' => $severity,
        'context' => $context,
        'timestamp' => date('Y-m-d H:i:s'),
        'resolved' => false
    ];
    
    // Nur letzte 500 Fehler behalten
    if (count($logs) > 500) {
        $logs = array_slice($logs, -500);
    }
    
    file_put_contents($logFile, json_encode($logs, JSON_PRETTY_PRINT));
}
```

#### Error-Dashboard (errors.php)
```php
// Nur für Admins zugänglich
if (!hasPermission('manage_users')) {
    http_response_code(403);
    exit('Zugriff verweigert');
}

$errors = loadErrors();

// Filter
$severity = $_GET['severity'] ?? 'all'; // all, critical, warning, info
$resolved = $_GET['resolved'] ?? 'unresolved'; // all, resolved, unresolved
$days = $_GET['days'] ?? 7;

// Statistiken
$stats = [
    'critical' => count(array_filter($errors, fn($e) => $e['severity'] === 'critical')),
    'warning' => count(array_filter($errors, fn($e) => $e['severity'] === 'warning')),
    'info' => count(array_filter($errors, fn($e) => $e['severity'] === 'info'))
];

// Gruppierung (gleiche Fehler zusammenfassen)
$grouped = groupErrorsByType($errors);

// Darstellung mit Bootstrap Cards
```

#### Settings Integration
```php
// In settings.php neue Sektion hinzufügen

'error_reporting' => [
    'enabled' => true,
    'email_on_critical' => true,
    'daily_digest' => false,
    'digest_time' => '20:00',
    'retention_days' => 30,
    'ignored_errors' => [] // Bestimmte Error-Typen ignorieren
]
```

### Implementation Plan

#### Phase 1: Error Logging (1h)
1. `includes/error_handler.php` erstellen
2. Custom Error/Exception Handler implementieren
3. `logError()` Funktion mit JSON-Storage
4. In `config.php` registrieren
5. Bestehende Error-Messages ersetzen mit `logError()` Calls

#### Phase 2: Error Dashboard (1.5h)
1. `errors.php` erstellen (Admin-Only)
2. Fehler-Liste mit Filter (Severity, Resolved, Days)
3. Statistik-Übersicht (Cards)
4. "Als gelöst markieren" Button
5. Detail-Ansicht für jeden Fehler
6. Export als CSV (optional)

#### Phase 3: E-Mail Integration (1h)
1. `sendErrorNotificationEmail()` Funktion
2. Template für kritische Fehler
3. Template für Daily Digest
4. Cron-Job Setup für Digest (optional)
5. Settings-Toggle für E-Mail-Benachrichtigungen

#### Phase 4: User-Facing Improvements (1h)
1. Alle generischen Error-Messages durchgehen
2. Kontextbezogene, hilfreiche Messages schreiben
3. Error-Codes einführen (z.B. ERR_UPLOAD_SIZE)
4. Dokumentation für häufige Fehler
5. "Weitere Hilfe" Links in Error-Messages

#### Phase 5: Testing & Polish (30 Min)
1. Kritische Fehler provozieren und testen
2. E-Mail-Versand testen
3. Dashboard-Filter testen
4. Performance-Check (Log-File-Größe)
5. Dokumentation updaten

### Success Criteria

- [ ] Alle PHP-Fehler werden geloggt
- [ ] Admin bekommt E-Mail bei kritischen Fehlern
- [ ] Error-Dashboard ist übersichtlich und hilfreich
- [ ] User sehen verständliche Fehlermeldungen
- [ ] Fehler können als "gelöst" markiert werden
- [ ] Daily Digest funktioniert (optional)
- [ ] Performance-Impact ist minimal (<50ms)

### Weitere Ausbaustufen

**v1.5.1 - Monitoring:**
- System-Health Dashboard (CPU, RAM, Disk)
- Uptime-Tracking
- Performance-Metriken (Page Load Times)

**v1.5.2 - Alerts:**
- Webhook-Integration (Slack, Discord)
- SMS-Benachrichtigung (via Twilio)
- Push-Notifications (Browser)

**v1.5.3 - Analytics:**
- Error-Trends über Zeit visualisieren
- Meistgenutzte Features tracken
- User-Behavior Analytics

---

**Erstellt:** 07.12.2025  
**Autor:** Andreas Duswald + GitHub Copilot  
**Status:** 📝 Konzept bereit für Umsetzung nach E-Mail-Feature

---

## 🌐 CDN vs. Lokale Assets (Deployment-Strategie)

**Status:** 💡 Idee für v1.6.0  
**Priorität:** Niedrig  
**Komplexität:** Mittel (~2-3 Stunden)

### Problem

**Aktuell:**
- Bootstrap, JavaScript und CSS werden **lokal** ausgeliefert (`assets/css/bootstrap.min.css`, `assets/js/bootstrap.bundle.min.js`)
- Vorteile: ✅ Offline-fähig, ✅ Keine externen Abhängigkeiten, ✅ Datenschutz (kein CDN-Tracking)
- Nachteile: ❌ Größerer Repo-Footprint, ❌ Manuelle Updates nötig, ❌ Kein Browser-Caching über Domains hinweg

**Idee:**
- **Standard-Installation** nutzt **CDN-Links** (schneller Setup, kleinere Download-Größe)
- **Admin-Toggle** zum Umschalten auf **lokale Assets** (für Air-Gapped-Systeme, Intranet, Datenschutz)
- Bei Umschaltung: Detaillierte Installationsanleitung für Libraries anzeigen

### Use Cases

#### 1. Schneller Start (CDN)
**Szenario:** Neue Installation, Internet verfügbar  
**Vorteil:** Sofort lauffähig, keine Library-Downloads nötig  
**Nachteil:** Erfordert Internetverbindung

```html
<!-- CDN-Modus (Standard) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
```

#### 2. Offline / Air-Gapped (Lokal)
**Szenario:** Intranet, kein Internet, Datenschutz-Anforderungen  
**Vorteil:** Komplett offline-fähig, keine externen Anfragen  
**Nachteil:** Erfordert manuelle Installation der Libraries

```html
<!-- Lokaler Modus -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<script src="assets/js/bootstrap.bundle.min.js"></script>
```

### Features

#### 1. Settings Toggle
```php
// In settings.json
'deployment' => [
    'use_cdn' => true,  // Standard: CDN aktiviert
    'cdn_urls' => [
        'bootstrap_css' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        'bootstrap_js' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        'bootstrap_integrity_css' => 'sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH',
        'bootstrap_integrity_js' => 'sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz'
    ]
]
```

#### 2. Admin-Panel Sektion
```
┌──────────────────────────────────────────────────────┐
│  ⚙️ Deployment-Einstellungen                        │
├──────────────────────────────────────────────────────┤
│                                                      │
│  🌐 Asset-Auslieferung                              │
│                                                      │
│  ○ CDN (Standard) - Empfohlen für Internet-Systeme │
│     ✅ Schneller, ✅ Browser-Cache, ✅ Auto-Updates │
│     ⚠️ Erfordert Internetverbindung                 │
│                                                      │
│  ○ Lokal - Für Intranet / Offline-Systeme          │
│     ✅ Offline-fähig, ✅ Datenschutz                │
│     ⚠️ Manuelle Installation erforderlich           │
│                                                      │
│  [Umschalten]                                        │
│                                                      │
│  ℹ️ Aktueller Status: CDN aktiv                     │
│     Bootstrap 5.3.3 von jsdelivr.net                │
│                                                      │
└──────────────────────────────────────────────────────┘
```

#### 3. Installations-Assistent (bei Umschaltung zu Lokal)

**Modal nach Toggle:**
```
┌──────────────────────────────────────────────────────┐
│  📦 Lokale Assets installieren                       │
├──────────────────────────────────────────────────────┤
│                                                      │
│  Um FileSubly im Offline-Modus zu nutzen, müssen    │
│  folgende Libraries heruntergeladen werden:         │
│                                                      │
│  ✅ Bootstrap 5.3.3                                  │
│     Download: https://getbootstrap.com/             │
│     Ziel: assets/css/bootstrap.min.css              │
│           assets/js/bootstrap.bundle.min.js         │
│                                                      │
│  📋 Installations-Schritte:                         │
│                                                      │
│  1. Bootstrap herunterladen:                        │
│     https://github.com/twbs/bootstrap/releases/     │
│        download/v5.3.3/bootstrap-5.3.3-dist.zip     │
│                                                      │
│  2. Entpacken und Dateien kopieren:                 │
│     bootstrap.min.css → assets/css/                 │
│     bootstrap.bundle.min.js → assets/js/            │
│                                                      │
│  3. Optional: TCPDF (falls nicht vorhanden)         │
│     Composer: composer require tecnickcom/tcpdf     │
│     Manuell: https://github.com/tecnickcom/TCPDF    │
│     Ziel: lib/tcpdf/                                │
│                                                      │
│  4. Berechtigungen setzen (Linux):                  │
│     chmod -R 755 assets/                            │
│                                                      │
│  [Installation abgeschlossen] [Abbrechen]           │
│                                                      │
└──────────────────────────────────────────────────────┘
```

#### 4. Automatische Asset-Detection

**Beim Umschalten auf Lokal:**
```php
function validateLocalAssets(): array {
    $required = [
        'assets/css/bootstrap.min.css' => 'Bootstrap CSS',
        'assets/js/bootstrap.bundle.min.js' => 'Bootstrap JavaScript',
        'lib/tcpdf/tcpdf.php' => 'TCPDF Library'
    ];
    
    $missing = [];
    foreach ($required as $path => $name) {
        if (!file_exists(__DIR__ . '/' . $path)) {
            $missing[] = $name;
        }
    }
    
    return $missing;
}
```

**Warnung bei fehlenden Files:**
```
⚠️ Achtung: Folgende Assets fehlen noch:
   • Bootstrap CSS
   • Bootstrap JavaScript

FileSubly wird möglicherweise nicht korrekt funktionieren.
Siehe Installationsanleitung.
```

### Technische Umsetzung

#### Phase 1: Helper-Funktionen (30 Min)
```php
// In config.php

function getAssetUrl(string $type): string {
    $settings = loadSettings();
    $useCdn = $settings['deployment']['use_cdn'] ?? true;
    
    if ($useCdn) {
        return $settings['deployment']['cdn_urls'][$type] ?? '';
    }
    
    $localPaths = [
        'bootstrap_css' => 'assets/css/bootstrap.min.css',
        'bootstrap_js' => 'assets/js/bootstrap.bundle.min.js'
    ];
    
    return $localPaths[$type] ?? '';
}

function getAssetIntegrity(string $type): string {
    $settings = loadSettings();
    $useCdn = $settings['deployment']['use_cdn'] ?? true;
    
    if (!$useCdn) {
        return ''; // Keine Integrity-Checks bei lokalen Files
    }
    
    return $settings['deployment']['cdn_urls'][$type . '_integrity'] ?? '';
}
```

#### Phase 2: Template-Anpassung (45 Min)
```php
// In index.php und allen anderen Templates
<link 
    href="<?= getAssetUrl('bootstrap_css') ?>" 
    rel="stylesheet"
    <?php if ($integrity = getAssetIntegrity('bootstrap_css')): ?>
        integrity="<?= $integrity ?>"
        crossorigin="anonymous"
    <?php endif; ?>
>

<script 
    src="<?= getAssetUrl('bootstrap_js') ?>"
    <?php if ($integrity = getAssetIntegrity('bootstrap_js')): ?>
        integrity="<?= $integrity ?>"
        crossorigin="anonymous"
    <?php endif; ?>
></script>
```

#### Phase 3: Admin-Toggle (60 Min)
1. Settings-Sektion "Deployment" hinzufügen
2. Toggle-Button mit Live-Preview
3. Validierung bei Umschaltung (validateLocalAssets)
4. Warnungen bei fehlenden Files
5. Modal mit Installationsanleitung

#### Phase 4: Installer-Script (30 Min)
```bash
#!/bin/bash
# install_assets.sh - Optional: Automatisches Download-Script

BOOTSTRAP_VERSION="5.3.3"
BOOTSTRAP_URL="https://github.com/twbs/bootstrap/releases/download/v${BOOTSTRAP_VERSION}/bootstrap-${BOOTSTRAP_VERSION}-dist.zip"

echo "📦 Downloading Bootstrap ${BOOTSTRAP_VERSION}..."
wget $BOOTSTRAP_URL -O bootstrap.zip

echo "📂 Extracting..."
unzip -q bootstrap.zip

echo "📋 Copying files..."
cp bootstrap-${BOOTSTRAP_VERSION}-dist/css/bootstrap.min.css assets/css/
cp bootstrap-${BOOTSTRAP_VERSION}-dist/js/bootstrap.bundle.min.js assets/js/

echo "🧹 Cleaning up..."
rm -rf bootstrap.zip bootstrap-${BOOTSTRAP_VERSION}-dist

echo "✅ Installation complete!"
```

#### Phase 5: Dokumentation (30 Min)
- README.md Update: CDN vs. Lokal Sektion
- INSTALL.md: Detaillierte Anleitung für beide Modi
- Troubleshooting: "Assets fehlen" Fehlerbehandlung

### Vorteile

**Für Entwickler:**
- 🚀 Schnellere Entwicklung (CDN-Mode)
- 🔄 Einfache Updates (nur CDN-URLs ändern)
- 📦 Kleineres Git-Repo (bei CDN-Default)

**Für Benutzer:**
- ⚡ Schnellerer Setup (CDN-Mode)
- 🔒 Datenschutz-Option (Lokal-Mode)
- 🌐 Flexibilität je nach Umgebung

**Für Admins:**
- 🎛️ Einfaches Umschalten per Toggle
- ✅ Automatische Validierung
- 📋 Klare Installationsanleitung

### Nachteile / Überlegungen

**CDN-Modus:**
- ⚠️ Externe Abhängigkeit (jsdelivr.net)
- ⚠️ Potenzielle Tracking-Cookies (Browser-Fingerprinting)
- ⚠️ Erfordert Internetverbindung

**Lokal-Modus:**
- ⚠️ Manuelle Installation erforderlich
- ⚠️ Größeres Repo (wenn Assets committed)
- ⚠️ Manuelle Updates bei neuen Bootstrap-Versionen

### Entscheidung: Was ist Standard?

**Empfehlung: CDN als Standard**

**Argumente:**
- ✅ Einfacherer Einstieg für neue User
- ✅ Kleinere Repository-Größe
- ✅ Bootstrap wird von vielen Seiten genutzt (Browser-Cache)
- ✅ FileSubly ist primär für Internet-Umgebungen gedacht
- ⚠️ Lokal-Mode bleibt optional für Spezialfälle

**Gegenargument: Lokal als Standard** (aktuelle Situation)

**Argumente:**
- ✅ Offline-fähig out-of-the-box
- ✅ Keine externen Abhängigkeiten
- ✅ Datenschutz-freundlicher (keine CDN-Anfragen)
- ✅ Funktionierende Installation garantiert
- ⚠️ Größerer Initial-Download

**Fazit:** Aktuell ist **Lokal-Mode Standard** und das ist gut so! 
Das CDN-Feature sollte **optional** bleiben für User die:
- Bandbreite sparen wollen
- Schnelleren Setup brauchen
- Bereits viele Bootstrap-Projekte nutzen (Cache-Vorteil)

### Alternative: Hybrid-Ansatz

**Best of Both Worlds:**
1. **Repository:** Enthält lokale Assets (wie jetzt)
2. **Settings:** Toggle für CDN (optional)
3. **Fallback:** Wenn CDN fehlschlägt → Automatisch auf Lokal wechseln

```php
function getAssetUrl(string $type): string {
    $settings = loadSettings();
    $useCdn = $settings['deployment']['use_cdn'] ?? false; // Standard: Lokal!
    
    if ($useCdn) {
        $cdnUrl = $settings['deployment']['cdn_urls'][$type] ?? '';
        
        // CDN-Check: Ist CDN erreichbar?
        if ($cdnUrl && isCdnReachable($cdnUrl)) {
            return $cdnUrl;
        }
        
        // Fallback auf Lokal
        error_log("CDN nicht erreichbar, Fallback auf lokale Assets");
    }
    
    // Standard: Lokale Assets
    $localPaths = [
        'bootstrap_css' => 'assets/css/bootstrap.min.css',
        'bootstrap_js' => 'assets/js/bootstrap.bundle.min.js'
    ];
    
    return $localPaths[$type] ?? '';
}

function isCdnReachable(string $url, int $timeout = 2): bool {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true); // HEAD-Request
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return $httpCode === 200;
}
```

### Implementation Priority

**Jetzt:** ❌ Nicht prioritär  
**Warum:**
- Aktuelle Lösung (lokal) funktioniert perfekt
- Kein dringender Bedarf für CDN-Modus
- Andere Features wichtiger (Email, Error-Reporting)

**Später (v1.6.0):** ✅ Nice-to-Have Feature  
**Wenn:**
- Email + Error-Reporting läuft
- User fragen explizit nach CDN-Option
- Größere Refactoring-Phase geplant

### Dokumentation in README

**Neue Sektion hinzufügen:**
```markdown
## 🌐 Asset-Auslieferung (CDN vs. Lokal)

**Standard:** Lokale Assets (Offline-fähig)

FileSubly nutzt standardmäßig **lokale Kopien** von Bootstrap und anderen Libraries.
Dies garantiert:
- ✅ Offline-Funktionalität
- ✅ Keine externen Abhängigkeiten
- ✅ Datenschutz (keine CDN-Tracking)

**Optional:** CDN-Modus für schnelleren Setup und kleinere Repo-Größe.
Aktivierung: ⚙️ Einstellungen → Deployment → CDN aktivieren

**Hinweis:** Beim Wechsel zwischen CDN und Lokal werden automatisch
die benötigten Assets validiert und ggf. Installationshinweise angezeigt.
```

---

**Erstellt:** 07.12.2025  
**Autor:** Andreas Duswald + GitHub Copilot  
**Status:** 💡 Konzept für zukünftige Entwicklung (v1.6.0)  
**Priorität:** Niedrig - Nice-to-Have

---

**Erstellt:** 07.12.2025  
**Autor:** Andreas Duswald + GitHub Copilot  
**Status:** 📝 Konzept bereit für Umsetzung nach E-Mail-Feature

---

**Erstellt:** 07.12.2025  
**Autor:** Andreas Duswald + GitHub Copilot  
**Status:** 📝 Konzept bereit für Umsetzung
