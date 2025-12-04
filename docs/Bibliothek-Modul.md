# Bibliothek-Modul - Dokumentation

## 📚 Überblick

Das Bibliothek-Modul ist eine vollständig isolierte Erweiterung von FileSubly, die es ermöglicht, mehrere separate Dateibibliotheken mit granularen Berechtigungen pro User zu verwalten. Es wurde mit einer sauberen OOP-Architektur entwickelt und hat **null Auswirkungen** auf das bestehende Hauptsystem.

### Hauptmerkmale

- ✅ **Mehrere Bibliotheken**: Unbegrenzte Anzahl an separaten Bibliotheken (z.B. "Projekt A", "Marketing Materialien", "Rechnungen")
- ✅ **Granulare Berechtigungen**: Jeder User kann pro Bibliothek individuelle Rechte haben (download, upload, delete, sort, merge)
- ✅ **OOP-Architektur**: Saubere Klassenstruktur mit `Library` und `LibraryManager`
- ✅ **Isolierte Datenspeicherung**: Jede Bibliothek hat eigenen Ordner, Config, Stats und Sortierung
- ✅ **Identische UI zu index.php**: Drag & Drop, PDF Merge, Download Counter, gleiche Icons und Styles
- ✅ **Zero Impact**: Komplett unabhängig vom Hauptsystem, kann jederzeit entfernt werden

---

## 🏗️ Architektur

### Dateistruktur

```
FileSubly/
├── bibliothek.php                  # Hauptansicht (User-Interface)
├── bibliothek_admin.php            # Admin-Panel (CRUD für Bibliotheken)
├── bibliothek_config.php           # OOP-Klassen (Library, LibraryManager)
├── bibliothek_download.php         # Download-Handler mit Permission-Check
├── bibliothek_merge.php            # PDF-Merge mit FPDI
├── bibliothek/                     # Daten-Verzeichnis
│   ├── .htaccess                   # "Deny from all" - Sicherheit
│   ├── projekt-a/                  # Beispiel Bibliothek
│   │   ├── .config.json            # Konfiguration dieser Bibliothek
│   │   ├── .stats.json             # Download-Counter
│   │   ├── .order.json             # Custom Sortierung
│   │   ├── dokument1.pdf
│   │   └── dokument2.xlsx
│   └── marketing/
│       ├── .config.json
│       └── ...
├── assets/css/bibliothek.css       # Modul-spezifische Styles
└── includes/user_dropdown.php      # Shared Dropdown (auch für Haupt-System)
```

### Klassendiagramm

```
┌─────────────────────────────────────┐
│        LibraryManager               │
├─────────────────────────────────────┤
│ - baseDir: string                   │
├─────────────────────────────────────┤
│ + getAllLibraries(): Library[]      │
│ + getLibrary(slug): Library         │
│ + getLibrariesForUser(user): []     │
│ + createLibrary(config): bool       │
│ + deleteLibrary(slug): bool         │
└─────────────────────────────────────┘
                 │
                 │ manages
                 ▼
┌─────────────────────────────────────┐
│            Library                  │
├─────────────────────────────────────┤
│ - slug: string                      │
│ - path: string                      │
│ - config: array                     │
├─────────────────────────────────────┤
│ + getDisplayName(): string          │
│ + getDescription(): string          │
│ + getAllowedExtensions(): array     │
│ + getMaxSizeMB(): int               │
│ + hasPermission(user, perm): bool   │
│ + getUserPermissions(user): array   │
│ + getFiles(): array                 │
│ + incrementDownloadCounter(file)    │
│ + saveConfig(config): bool          │
└─────────────────────────────────────┘
```

---

## 📦 Komponenten im Detail

### 1. `bibliothek_config.php` - OOP Core

#### Klasse: `Library`

Repräsentiert eine einzelne Bibliothek mit allen Metadaten und Funktionen.

**Wichtige Methoden:**

```php
// Berechtigungsprüfung
$library->hasPermission('john', 'download');  // bool
$library->getUserPermissions('john');         // ['download', 'upload', 'delete']

// Dateien mit Counter und Sortierung
$files = $library->getFiles();
// Gibt Array zurück: ['name', 'size', 'modified', 'ext', 'downloads']

// Download-Counter erhöhen
$library->incrementDownloadCounter('dokument.pdf');

// Konfiguration speichern
$library->saveConfig([
    'display_name' => 'Projekt Alpha',
    'description' => 'Projektdokumente für Team Alpha',
    'allowed_extensions' => ['pdf', 'docx', 'xlsx'],
    'max_size_mb' => 50,
    'permissions' => [
        'john' => ['download', 'upload'],
        'jane' => ['download', 'delete', 'merge']
    ]
]);
```

#### Klasse: `LibraryManager`

Zentrale Verwaltung aller Bibliotheken.

**Wichtige Methoden:**

```php
$manager = getBibliothekManager();

// Alle Bibliotheken laden
$allLibs = $manager->getAllLibraries();

// Einzelne Bibliothek laden
$lib = $manager->getLibrary('projekt-a');

// Bibliotheken für bestimmten User
$userLibs = $manager->getLibrariesForUser('john');

// Neue Bibliothek erstellen
$manager->createLibrary([
    'slug' => 'marketing',
    'display_name' => 'Marketing',
    'description' => 'Marketing Materialien',
    'allowed_extensions' => ['pdf', 'png', 'jpg'],
    'max_size_mb' => 10
]);

// Bibliothek löschen (inkl. aller Dateien!)
$manager->deleteLibrary('alte-projekte');
```

#### Helper-Funktionen

```php
// Manager-Instanz holen (Singleton-Pattern)
$manager = getBibliothekManager();

// Zugriffsprüfung
if (hasLibraryAccess('john')) {
    // User hat mindestens in einer Bibliothek Zugriff
}

// Dateigröße formatieren
echo formatFileSize(1048576); // "1.00 MB"
```

---

### 2. `bibliothek.php` - User Interface

#### Funktionen

**Library Overview:**

- Zeigt alle Bibliotheken als Cards mit:
  - Dateianzahl
  - Permission-Badges (Download, Upload, Delete, Sort, Merge)
  - Klickbar zur Dateiansicht

**File Browser:**

- Identische Tabelle wie index.php:
  - Drag & Drop Sortierung (wenn `sort` Berechtigung)
  - PDF-Checkboxen (wenn `merge` Berechtigung)
  - File-Icons (PDF rot, Excel grün, Word blau)
  - Download-Counter (nur für Admins sichtbar)
  - Download- und Löschen-Buttons (permission-abhängig)

**Modals:**

1. **Upload Modal**: Datei hochladen mit Extension- und Size-Validation
2. **Access Management Modal**: Inline-Berechtigungsverwaltung mit User-Tabelle und Checkboxen
3. **Merge Confirmation Modal**: Liste der zu mergenden PDFs mit Bestätigung
4. **Loading Overlay**: Flammy-Animation während PDF-Merge

#### Handler

```php
// File Upload Handler
- CSRF-Check
- Permission-Check (upload)
- Extension- und Size-Validation
- File-Upload ins Library-Verzeichnis

// File Delete Handler
- CSRF-Check
- Permission-Check (delete)
- Datei löschen

// File Order Saving (AJAX)
- CSRF-Check
- Permission-Check (sort)
- Reihenfolge in .order.json speichern

// Access Management Handler
- CSRF-Check
- Admin-Check
- Berechtigungen aus POST-Checkboxen parsen
- In .config.json speichern
```

---

### 3. `bibliothek_admin.php` - Admin Panel

#### Funktionen

**Library CRUD:**

- **Create**: Neue Bibliothek mit Slug, Name, Beschreibung, Extensions, Size-Limit erstellen
- **Edit Config**: Extensions und Size-Limit nachträglich ändern
- **Edit Permissions**: Alle User-Berechtigungen in einer Tabelle bearbeiten
- **Delete**: Bibliothek und alle Dateien komplett löschen (mit Bestätigung)

**Validation:**

- Slug: nur Kleinbuchstaben, Zahlen, Bindestriche (z.B. "projekt-a")
- Extensions: Komma-getrennte Liste (z.B. "pdf,docx,xlsx")
- Max Size: Positiver Integer in MB

#### Handler

```php
// Create Library
POST: create_library=1, slug, display_name, description, allowed_extensions, max_size_mb
→ Creates: bibliothek/{slug}/.config.json

// Edit Config
POST: edit_config=1, allowed_extensions, max_size_mb
→ Updates: bibliothek/{slug}/.config.json

// Edit Permissions
POST: edit_permissions=1, perm_{username}_{permission} Checkboxen
→ Updates: permissions in .config.json

// Delete Library
POST: delete_library=1
→ Deletes: bibliothek/{slug}/ komplett
```

---

### 4. `bibliothek_download.php` - Download Handler

#### Sicherheit

```php
// 1. Login-Check
if (!$_SESSION['logged_in']) → 403

// 2. Permission-Check
if (!$library->hasPermission($user, 'download')) → 403

// 3. Path-Sanitization
$fileName = basename($_GET['file']); // Verhindert ../../../etc/passwd

// 4. File-Existence-Check
if (!file_exists($filePath)) → 404
```

#### Download-Counter

```php
// Automatisch bei jedem Download
$library->incrementDownloadCounter($fileName);
// Speichert in bibliothek/{slug}/.stats.json
```

---

### 5. `bibliothek_merge.php` - PDF Zusammenführung

#### Technologie

Nutzt **FPDI/FPDF** (identisch zu merge_pdf.php im Hauptsystem):

```php
use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();

foreach ($pdfFiles as $filename) {
    $pageCount = $pdf->setSourceFile($filePath);

    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $templateId = $pdf->importPage($pageNo);
        $size = $pdf->getTemplateSize($templateId);
        $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $pdf->useTemplate($templateId);
    }
}

// Direkter Download (NICHT speichern in Bibliothek)
$pdf->Output('D', 'merged_' . date('Y-m-d_H-i-s') . '.pdf');
```

#### Ablauf

1. User wählt PDFs mit Checkboxen aus
2. Klick auf "Zusammenführen" → Merge-Modal mit Dateiliste
3. Bestätigung → Loading-Overlay mit Flammy-Animation
4. POST zu bibliothek_merge.php
5. FPDI merged PDFs
6. Browser-Download startet automatisch
7. Overlay schließt nach 3s oder per Klick

---

## 🔐 Berechtigungssystem

### Berechtigungstypen

| Berechtigung | Beschreibung           | UI-Element                |
| ------------ | ---------------------- | ------------------------- |
| `download`   | Dateien herunterladen  | 📥 Button                 |
| `upload`     | Dateien hochladen      | 📤 Button                 |
| `delete`     | Dateien löschen        | 🗑️ Button                 |
| `sort`       | Drag & Drop Sortierung | ⋮⋮ Handle                 |
| `merge`      | PDFs zusammenführen    | ☑️ Checkboxen + 📄 Button |

### Speicherung

Berechtigungen werden **pro Bibliothek** in `.config.json` gespeichert:

```json
{
  "display_name": "Projekt Alpha",
  "description": "Projektdokumente",
  "allowed_extensions": ["pdf", "docx", "xlsx"],
  "max_size_mb": 50,
  "permissions": {
    "john": ["download", "upload", "delete"],
    "jane": ["download", "sort", "merge"],
    "admin": ["download", "upload", "delete", "sort", "merge"]
  }
}
```

**NICHT** in users.json → Users können verschiedene Rechte in verschiedenen Bibliotheken haben!

### Admin-Sonderrechte

```php
$isAdmin = hasPermission('manage_users');

// Admins haben IMMER alle Rechte in allen Bibliotheken
if ($isAdmin || $library->hasPermission($user, 'download')) {
    // Download erlaubt
}
```

---

## 📊 Datenspeicherung

### Pro Bibliothek

```
bibliothek/projekt-a/
├── .config.json        # Konfiguration & Berechtigungen
├── .stats.json         # Download-Counter pro Datei
├── .order.json         # Custom Sortierreihenfolge
└── [Dateien]           # Hochgeladene Dateien
```

#### `.config.json` - Bibliotheks-Konfiguration

```json
{
  "display_name": "Projekt Alpha",
  "description": "Dokumente für Team Alpha",
  "allowed_extensions": ["pdf", "docx", "xlsx"],
  "max_size_mb": 50,
  "permissions": {
    "john": ["download", "upload"],
    "jane": ["download", "delete", "merge"]
  }
}
```

#### `.stats.json` - Download-Counter

```json
{
  "dokument1.pdf": 15,
  "bericht.xlsx": 7,
  "praesentation.pdf": 23
}
```

Wird automatisch bei jedem Download inkrementiert.

#### `.order.json` - Custom Sortierung

```json
["wichtig.pdf", "sehr-wichtig.pdf", "mittel.docx", "unwichtig.xlsx"]
```

Wird via Drag & Drop gespeichert (AJAX).

---

## 🎨 UI/UX Features

### 1. Library Cards

```
┌──────────────────────────────────┐
│  📁  Projekt Alpha               │
│                                  │
│  Projektdokumente für Team A     │
│                                  │
│  📄 15 Dateien                   │
│                                  │
│  📥 Download  📤 Upload          │
│  🗑️ Löschen  🔀 Sortieren        │
│  📄 Merge                        │
└──────────────────────────────────┘
```

Hover-Effekt, klickbar, zeigt alle verfügbaren Berechtigungen als Badges.

### 2. File Browser Table

Identisch zu index.php:

```
┌──┬──┬─────┬───────────────┬──────────────┬───────────┬──────────┐
│⋮⋮│☑ │ Typ │ Dateiname     │ Aktualisiert │ Downloads │ Aktionen │
├──┼──┼─────┼───────────────┼──────────────┼───────────┼──────────┤
│⋮⋮│☑ │[PDF]│ dokument1.pdf │ 04.12. 15:30 │    5×     │ 📥 🗑️   │
│⋮⋮│☑ │[XLS]│ tabelle.xlsx  │ 03.12. 10:15 │    12×    │ 📥 🗑️   │
└──┴──┴─────┴───────────────┴──────────────┴───────────┴──────────┘
```

- **⋮⋮**: Drag Handle (nur mit sort-Berechtigung)
- **☑**: Checkbox (nur PDFs, nur mit merge-Berechtigung)
- **Downloads**: Badge mit Counter (nur für Admins)

### 3. Inline Access Management

Statt separatem Admin-Panel: Direkt in der Bibliothek per Modal.

```
┌─────────────────────────────────────────────────────┐
│ 👥 Zugriff verwalten                               │
├─────────────────────────────────────────────────────┤
│                                                     │
│  Benutzer      📥   📤   🗑️   🔀   📄             │
│  ─────────────────────────────────────────────────  │
│  john (admin)  [✓]  [✓]  [✓]  [✓]  [✓]            │
│  jane (user)   [✓]  [ ]  [ ]  [✓]  [✓]            │
│  bob (user)    [✓]  [ ]  [ ]  [ ]  [ ]            │
│                                                     │
├─────────────────────────────────────────────────────┤
│          [Abbrechen]  [💾 Speichern]               │
└─────────────────────────────────────────────────────┘
```

→ Checkboxen direkt in der Tabelle, Save speichert in .config.json

### 4. PDF Merge Flow

```
1. User wählt PDFs    2. Bestätigung       3. Loading           4. Download
   ┌───────────┐         ┌───────────┐        ┌───────────┐        ✅
   │[✓] PDF 1  │   →     │ 📄 Liste  │   →    │  🔄 💥    │   →    Download
   │[✓] PDF 2  │         │ 3 PDFs    │        │  Flammy   │        startet
   │[ ] PDF 3  │         │ [Merge]   │        └───────────┘
   └───────────┘         └───────────┘
```

Identisch zu index.php: Modal → Loading-Overlay → Download

---

## 🔧 Integration ins Hauptsystem

### Minimal-Invasiv

**Geänderte Haupt-Dateien:**

1. **index.php** (1 Zeile):

   ```php
   <li><a class="dropdown-item" href="bibliothek.php">📚 Bibliothek</a></li>
   ```

2. **includes/user_dropdown.php** (NEW - auch für Hauptsystem):
   - Zentrales User-Dropdown für alle Seiten
   - Zeigt "📚 Bibliothek" Link (nur für Admins aktuell)

**Keine Änderungen an:**

- download.php
- upload.php
- merge_pdf.php
- admin.php
- Jeglicher Business-Logic des Hauptsystems

### Dependency

```php
// bibliothek_config.php benötigt:
require __DIR__ . '/config.php';  // Für CSRF-Funktionen, hasPermission()

// Nutzt bestehende Funktionen:
- generateCsrfToken()
- verifyCsrfToken()
- hasPermission('manage_users')
- loadUsers()
- fileIcon($ext)
```

Sonst **komplett unabhängig**.

---

## 🚀 Verwendung

### Als Admin

1. **Bibliothek erstellen:**

   - Navigation: Bibliothek → ⚙️ Bibliotheken verwalten
   - "➕ Neue Bibliothek" klicken
   - Slug (z.B. "projekt-a"), Name, Beschreibung, Extensions, Size eingeben
   - Erstellen

2. **Dateien hochladen:**

   - Zur Bibliothek navigieren
   - "📤 Datei hochladen" klicken
   - Datei auswählen und hochladen

3. **Berechtigungen vergeben:**

   - In Bibliothek: "👥 Zugriff verwalten" klicken
   - Checkboxen für jeden User setzen
   - Speichern

4. **Dateien verwalten:**
   - Sortieren: Einfach mit Maus ziehen
   - PDFs mergen: Checkboxen → "Zusammenführen"
   - Löschen: 🗑️ Button

### Als User (mit Berechtigungen)

1. **Bibliotheken anzeigen:**

   - Dropdown → 📚 Bibliothek
   - Sieht nur Bibliotheken mit Berechtigungen

2. **Dateien nutzen:**
   - Download: Wenn `download` Berechtigung
   - Upload: Wenn `upload` Berechtigung
   - Sortieren: Wenn `sort` Berechtigung
   - PDFs mergen: Wenn `merge` Berechtigung
   - Löschen: Wenn `delete` Berechtigung

---

## 🔮 Zukünftige Erweiterungen

### In Roadmap

1. **Bibliothek-Link für normale User:**

   ```php
   // Aktuell nur für Admins sichtbar
   <?php if ($isAdmin): ?>
       <li><a href="bibliothek.php">📚 Bibliothek</a></li>
   <?php endif; ?>

   // Zukünftig:
   <?php if ($isAdmin || hasLibraryAccess($currentUser)): ?>
       <li><a href="bibliothek.php">📚 Bibliothek</a></li>
   <?php endif; ?>
   ```

2. **OOP-Refaktorierung Hauptsystem:**
   - FileManager, UserManager, DownloadService Klassen
   - Konsistente Architektur zwischen Bibliothek und Hauptsystem
   - Dependency Injection

### Mögliche Features

- **Unterordner** in Bibliotheken
- **Versionierung** von Dateien
- **Sharing-Links** für externe User
- **Kommentare** an Dateien
- **Tags** und erweiterte Suche
- **Aktivitäts-Log** (wer hat wann was gemacht)
- **Bulk-Upload** (mehrere Dateien gleichzeitig)
- **Vorschau** für PDFs/Bilder im Browser

---

## 🐛 Troubleshooting

### Bibliothek erscheint nicht

**Problem:** Nach Erstellung keine Bibliothek sichtbar.

**Lösung:**

1. Prüfen ob `bibliothek/` Ordner existiert und beschreibbar ist
2. `.htaccess` in `bibliothek/` prüfen (Deny from all)
3. Browser-Cache leeren und neu laden

### Upload schlägt fehl

**Problem:** "Dateityp nicht erlaubt" oder "Datei zu groß".

**Lösung:**

1. In bibliothek_admin.php Config der Bibliothek prüfen
2. `allowed_extensions` enthält gewünschte Extension?
3. `max_size_mb` ausreichend?
4. PHP `upload_max_filesize` und `post_max_size` in php.ini prüfen

### PDF Merge funktioniert nicht

**Problem:** Modal erscheint, aber Download startet nicht.

**Lösung:**

1. FPDI-Bibliothek installiert? (`lib/fpdi/`)
2. Browser-Console auf JavaScript-Fehler prüfen
3. Network-Tab: POST zu bibliothek_merge.php erfolgreich?
4. Error-Log: `$_SESSION['merge_error']` gesetzt?

### Download-Counter zählt nicht

**Problem:** Badge zeigt immer 0×.

**Lösung:**

1. `.stats.json` existiert in Bibliotheks-Ordner?
2. Datei beschreibbar?
3. Download läuft über `bibliothek_download.php`?
4. `incrementDownloadCounter()` wird aufgerufen?

### Drag & Drop funktioniert nicht

**Problem:** Dateien lassen sich nicht verschieben.

**Lösung:**

1. User hat `sort` Berechtigung?
2. JavaScript-Errors in Browser-Console?
3. CSRF-Token korrekt?
4. `.order.json` beschreibbar?

---

## 📝 Code-Beispiele

### Neue Bibliothek programmgesteuert erstellen

```php
require 'bibliothek_config.php';

$manager = getBibliothekManager();
$success = $manager->createLibrary([
    'slug' => 'team-marketing',
    'display_name' => 'Marketing Team',
    'description' => 'Alle Marketing-Dokumente',
    'allowed_extensions' => ['pdf', 'png', 'jpg', 'psd'],
    'max_size_mb' => 100
]);

if ($success) {
    echo "Bibliothek erstellt!";
}
```

### Berechtigungen setzen

```php
$library = $manager->getLibrary('team-marketing');

$config = [
    'display_name' => $library->getDisplayName(),
    'description' => $library->getDescription(),
    'allowed_extensions' => $library->getAllowedExtensions(),
    'max_size_mb' => $library->getMaxSizeMB(),
    'permissions' => [
        'john' => ['download', 'upload', 'delete'],
        'jane' => ['download', 'sort', 'merge'],
        'marketing-team' => ['download']
    ]
];

$library->saveConfig($config);
```

### Alle Dateien einer Bibliothek auflisten

```php
$library = $manager->getLibrary('team-marketing');
$files = $library->getFiles();

foreach ($files as $file) {
    echo "{$file['name']} - {$file['downloads']} Downloads\n";
}
```

### Prüfen ob User Zugriff hat

```php
$library = $manager->getLibrary('team-marketing');

if ($library->hasPermission('john', 'upload')) {
    // John darf hochladen
}

$perms = $library->getUserPermissions('jane');
// Returns: ['download', 'sort', 'merge']
```

---

## 🎯 Best Practices

### 1. Slug-Benennung

✅ **Gut:**

- `projekt-alpha`
- `team-marketing`
- `rechnungen-2024`

❌ **Schlecht:**

- `Projekt Alpha` (Leerzeichen)
- `team_marketing` (Unterstriche OK, aber Bindestriche bevorzugt)
- `projekt-a!` (Sonderzeichen)

### 2. Berechtigungen

```php
// ✅ Granular: Verschiedene Rechte für verschiedene Rollen
'permissions' => [
    'viewer' => ['download'],
    'editor' => ['download', 'upload', 'delete'],
    'manager' => ['download', 'upload', 'delete', 'sort', 'merge']
]

// ❌ Zu viel: Normale User brauchen selten merge/sort
'permissions' => [
    'everyone' => ['download', 'upload', 'delete', 'sort', 'merge']
]
```

### 3. File-Extensions

```php
// ✅ Spezifisch: Nur was wirklich gebraucht wird
'allowed_extensions' => ['pdf', 'docx']

// ❌ Zu offen: Sicherheitsrisiko
'allowed_extensions' => ['*']  // NICHT MÖGLICH, aber wenn...
```

### 4. Size-Limits

```php
// ✅ Angemessen für Zweck
'max_size_mb' => 10,   // Dokumente
'max_size_mb' => 100,  // Design-Dateien

// ❌ Zu groß: Server-Limits beachten
'max_size_mb' => 9999  // PHP limits often lower
```

---

## 📚 Zusammenfassung

Das Bibliothek-Modul ist eine **vollständig modulare Erweiterung** mit:

✅ **Sauberer OOP-Architektur** (Library, LibraryManager Klassen)  
✅ **Granularem Berechtigungssystem** (5 Berechtigungstypen pro User pro Bibliothek)  
✅ **Identischer UX zu index.php** (Drag & Drop, Merge, Icons, Counter)  
✅ **Zero Impact** auf bestehendes System  
✅ **Einfacher Integration** (nur 1 Zeile in index.php)  
✅ **Vollständiger Isolation** (eigener Ordner, Config, Stats)

**Perfekt für:** Teams mit mehreren Projekten, verschiedene Abteilungen, externe Kollaboration mit unterschiedlichen Zugriffsrechten.

---

_Entwickelt am 4. Dezember 2025 als modulare OOP-Erweiterung für FileSubly v1.0_
