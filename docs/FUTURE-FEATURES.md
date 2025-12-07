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

**Erstellt:** 07.12.2025  
**Autor:** Andreas Duswald + GitHub Copilot  
**Status:** 📝 Konzept bereit für Umsetzung
