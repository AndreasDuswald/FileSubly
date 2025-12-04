# FileSubly - Projekt-Übersicht

## 🎯 Was ist FileSubly?

FileSubly ist ein **modernes, sicheres Dokumentenverwaltungs-System** entwickelt mit PHP, Bootstrap 5 und modernem CSS. Es kombiniert eine einfach zu bedienende Oberfläche mit robuster Sicherheit und flexibler Berechtigungsverwaltung.

**Perfekt für:** Teams, Firmen, Projekte die sichere Dateifreigabe mit granularer Zugriffskontrolle benötigen.

---

## 📁 Projekt-Struktur

```
FileSubly/
├── 📄 Core Files
│   ├── index.php                   # Hauptseite (Dateiliste, Upload, Merge)
│   ├── config.php                  # Zentrale Konfiguration & Helper-Funktionen
│   ├── login.php                   # Login-Seite mit Rate Limiting
│   ├── download.php                # Download-Handler mit Counter
│   ├── merge_pdf.php               # PDF-Zusammenführung mit FPDI
│   └── profile.php                 # User-Profil mit Tabs
│
├── 👥 User Management
│   ├── admin.php                   # User-CRUD für Admins
│   ├── statistics.php              # Download-Statistiken
│   ├── access_requests.php         # Zugangsanfragen verwalten
│   ├── request_access.php          # Öffentliches Anfrage-Formular
│   ├── reset_password.php          # Passwort zurücksetzen Flow
│   └── reset_password_request.php  # Reset-Anfrage stellen
│
├── ⚙️ Settings
│   └── settings.php                # Admin-Einstellungen (Tabs: Dateien, Features, E-Mail)
│
├── 📚 Bibliothek-Modul (OOP)
│   ├── bibliothek.php              # Library-Übersicht & File-Browser
│   ├── bibliothek_admin.php        # Library-CRUD Admin-Panel
│   ├── bibliothek_config.php       # OOP-Klassen (Library, LibraryManager)
│   ├── bibliothek_download.php     # Download mit Permission-Check
│   ├── bibliothek_merge.php        # PDF-Merge für Bibliotheken
│   └── bibliothek/                 # Data Directory
│       ├── .htaccess               # Deny from all
│       └── [libraries]/            # Separate Library-Ordner
│           ├── .config.json        # Config & Permissions
│           ├── .stats.json         # Download-Counter
│           ├── .order.json         # Custom Sortierung
│           └── [files]             # Hochgeladene Dateien
│
├── 🎨 Assets
│   ├── assets/
│   │   ├── css/
│   │   │   ├── style.css           # Main Stylesheet (500+ Zeilen)
│   │   │   └── bibliothek.css      # Bibliothek-spezifische Styles
│   │   ├── logo.png                # Main Logo
│   │   └── flammy.png              # Loading Animation
│   └── lib/
│       ├── fpdf/                   # PDF-Generierung
│       └── fpdi/                   # PDF-Import (für Merge)
│
├── 🔧 Shared Components
│   └── includes/
│       └── user_dropdown.php       # Wiederverwendbares User-Dropdown (alle Seiten)
│
├── 📊 Data Files
│   ├── users.json                  # User-Datenbank
│   ├── settings.json               # App-Einstellungen
│   ├── access_requests.json        # Zugangsanfragen
│   ├── password_reset_tokens.json  # Reset-Tokens (1h TTL)
│   ├── download_stats.json         # Globale Download-Stats
│   └── file_order.json             # Custom Datei-Sortierung
│
└── 📖 Documentation
    ├── README.md                   # Hauptdokumentation
    ├── docs/
    │   ├── Roadmap-Entwicklung.md  # Feature-Roadmap
    │   └── Bibliothek-Modul.md     # Detaillierte Bibliothek-Doku
    └── files/                      # Upload-Directory (Hauptsystem)
```

---

## 🏛️ Architektur-Entscheidungen

### Zwei-Schichtige Architektur

FileSubly nutzt **zwei unterschiedliche Architektur-Ansätze**:

#### 1. **Hauptsystem (Prozedural)**

```
login.php → index.php → download.php
    ↓           ↓           ↓
config.php (Helper-Funktionen)
    ↓
users.json, settings.json, stats.json
```

**Warum prozedural?**

- Einfache, direkte Code-Struktur
- Schnelle Entwicklung und Wartung
- Für kleine bis mittlere Projekte ideal
- Alle Business-Logic transparent und linear

#### 2. **Bibliothek-Modul (OOP)**

```
bibliothek.php → LibraryManager → Library
                      ↓              ↓
                  getAllLibraries() getFiles()
                  createLibrary()  hasPermission()
                  deleteLibrary()  saveConfig()
                      ↓
            bibliothek/[slug]/.config.json
```

**Warum OOP?**

- Modulare Erweiterung mit klaren Interfaces
- Wiederverwendbare Klassen (Library, LibraryManager)
- Einfache Testbarkeit
- Skalierbar für zukünftige Features
- Best Practice für komplexe Domänen-Logik

### Datenspeicherung: JSON vs. Datenbank

**Entscheidung:** JSON-Dateien statt MySQL/PostgreSQL

**Vorteile:**

- ✅ **Zero Dependencies**: Keine DB-Installation nötig
- ✅ **Portabilität**: Einfaches Backup (Ordner kopieren)
- ✅ **Einfache Entwicklung**: Keine Migrations, Schemas
- ✅ **Transparenz**: Daten lesbar mit jedem Editor
- ✅ **Performance**: Ausreichend für <1000 Dateien/Users

**Nachteile:**

- ❌ Concurrent Writes problematisch (LOCK_EX verwendet)
- ❌ Keine komplexen Queries
- ❌ Nicht optimal für >10.000 Dateien

**Perfekt für:** KMU, Teams bis 50 User, <1000 Dateien

---

## 🔐 Sicherheits-Features

### 1. Authentifizierung & Autorisierung

```php
// Session-basiert
$_SESSION['logged_in'] = true;
$_SESSION['user'] = 'john';

// Permission-Check überall
if (!hasPermission('upload')) {
    die('Keine Berechtigung');
}
```

### 2. CSRF-Schutz

```php
// Token generieren
<input type="hidden" name="csrf_token" value="<?= generateCsrfToken() ?>">

// Token prüfen
if (!verifyCsrfToken($_POST['csrf_token'])) {
    die('CSRF-Angriff erkannt');
}
```

### 3. Rate Limiting

```php
// Max. 5 Login-Versuche
if ($attempts >= 5) {
    // 15 Minuten Sperre
    $waitTime = 900 - (time() - $lockoutTime);
}
```

### 4. File Upload Security

```php
// Extension-Check
$allowed = ['pdf', 'docx', 'xlsx'];
if (!in_array($ext, $allowed)) die('Typ nicht erlaubt');

// MIME-Type Validierung
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['file']['tmp_name']);
$validMimes = ['application/pdf', 'application/vnd.openxmlformats...'];
if (!in_array($mime, $validMimes)) die('MIME invalid');

// Size-Check
if (filesize() > $maxBytes) die('Zu groß');

// Path Sanitization
$safe = basename($_GET['file']); // Verhindert ../../../etc/passwd
```

### 5. Password Security

```php
// bcrypt mit automatischem Salt
password_hash($password, PASSWORD_DEFAULT);

// Verify
password_verify($input, $hash);
```

---

## 📊 Berechtigungssystem

### Hierarchie

```
Admin (manage_users)
  ├─ Alle Rechte in allen Bibliotheken
  └─ Zugriff auf Admin-Panel, Einstellungen, Statistiken

Premium User
  ├─ download, upload, delete, sort, merge
  └─ Bibliotheks-Rechte individuell konfigurierbar

User
  ├─ download (meist)
  └─ Bibliotheks-Rechte individuell konfigurierbar
```

### Permissions im Hauptsystem

| Permission     | Bedeutung              | UI             |
| -------------- | ---------------------- | -------------- |
| `download`     | Dateien herunterladen  | 📥 Button      |
| `upload`       | Dateien hochladen      | 📤 Upload-Zone |
| `delete`       | Dateien löschen        | 🗑️ Button      |
| `sort`         | Drag & Drop Sortierung | ⋮⋮ Handles     |
| `merge`        | PDFs zusammenführen    | ☑️ Checkboxen  |
| `manage_users` | Admin-Rechte           | 👥 Admin-Panel |

### Permissions in Bibliotheken

**Granular pro User pro Bibliothek:**

```json
{
  "permissions": {
    "john": ["download", "upload"],
    "jane": ["download", "delete", "merge"],
    "bob": ["download"]
  }
}
```

→ John kann in Bibliothek A uploaden, in B nur downloaden!

---

## 🎨 UI/UX Design-Prinzipien

### 1. **Konsistenz**

- Einheitliche Button-Styles
- Icons überall gleich (📥 Download, 🗑️ Löschen, etc.)
- Bootstrap 5 Components (Modals, Alerts, Cards)
- Identische Tabellen-Layouts

### 2. **Feedback**

```php
// Success
$_SESSION['upload_success'] = '✅ Datei erfolgreich hochgeladen!';

// Error
$_SESSION['upload_error'] = '❌ Fehler beim Upload.';

// Loading
<div id="loadingOverlay">🔄 Lade...</div>
```

### 3. **Accessibility**

- Semantic HTML
- ARIA-Labels auf Buttons/Modals
- Keyboard Shortcuts (ESC, Ctrl+U, Delete, ?)
- Clear Focus States

### 4. **Responsive Design**

```css
/* Mobile-first */
.file-actions {
  display: flex;
  gap: 0.5rem;
}

/* Desktop */
@media (min-width: 768px) {
  .table-responsive {
    overflow-x: visible;
  }
}
```

---

## 🔧 Technologie-Stack

### Backend

- **PHP 7.4+** (prozedural + OOP hybrid)
- **Session-basierte Auth**
- **JSON-Datenspeicherung**
- **FPDI/FPDF** für PDF-Manipulation

### Frontend

- **Bootstrap 5.3.3** (Modals, Forms, Grid)
- **Vanilla JavaScript** (keine Frameworks)
- **Custom CSS** (500+ Zeilen in style.css)
- **SVG Icons** (inline, colored)

### Dependencies

- **FPDI 2.6.1** (PDF-Import für Merge)
- **FPDF** (PDF-Generierung)
- **Bootstrap 5.3.3 CDN**

### Server-Requirements

- PHP 7.4+ mit Extensions: json, fileinfo, mbstring
- Apache/Nginx mit .htaccess Support
- Schreibrechte für: files/, bibliothek/, \*.json

---

## 🚀 Entwicklungs-Workflow

### Setup (Entwickler)

```bash
# 1. Repository klonen
git clone [repo-url] FileSubly
cd FileSubly

# 2. Verzeichnisse erstellen
mkdir -p files bibliothek
chmod 755 files bibliothek

# 3. XAMPP/MAMP starten
# http://localhost/FileSubly

# 4. Login mit Fallback
# User: admin, Pass: admin
# → users.json wird automatisch erstellt
```

### Development Guidelines

**1. Code-Style:**

```php
// ✅ Gut: Type hints, Doc-Comments
/**
 * Load all users from users.json
 * @return array User-Array mit [username => data]
 */
function loadUsers(): array {
    // ...
}

// ❌ Schlecht: Keine Types, keine Docs
function loadUsers() {
    // ...
}
```

**2. Security-First:**

```php
// ✅ Immer CSRF prüfen
if (!verifyCsrfToken($_POST['csrf_token'])) die();

// ✅ Immer Permission prüfen
if (!hasPermission('delete')) die();

// ✅ Immer Input sanitizen
$file = basename($_GET['file']);
```

**3. Fehlerbehandlung:**

```php
// ✅ User-Feedback
if ($error) {
    $_SESSION['error'] = 'Fehler: ' . $error;
    header('Location: index.php');
    exit;
}

// ❌ Silent Fail
if ($error) {
    // nichts...
}
```

---

## 📈 Performance-Optimierungen

### 1. JSON-Caching

```php
// Nicht bei jedem Request neu laden
static $cache = null;
if ($cache === null) {
    $cache = json_decode(file_get_contents('users.json'), true);
}
return $cache;
```

### 2. Lazy Loading

```php
// Dateien erst laden wenn nötig
$files = getFiles(); // Nur wenn angezeigt wird
```

### 3. AJAX statt Page Reload

```javascript
// Sortierung speichern ohne Reload
fetch("?save_order", {
  method: "POST",
  body: JSON.stringify(order),
});
```

### 4. CSS/JS Minification (Production)

```bash
# Minify CSS
npx csso assets/css/style.css -o assets/css/style.min.css

# Use in Production
<link href="assets/css/style.min.css" rel="stylesheet">
```

---

## 🧪 Testing-Strategie

### Manuelle Tests (aktuell)

**User-Stories:**

1. Als Admin: Kann ich neue User erstellen?
2. Als User: Kann ich Dateien downloaden/uploaden?
3. Als Viewer: Kann ich KEINE Dateien löschen?
4. PDF-Merge: Funktioniert mit 2+ PDFs?
5. Bibliothek: Verschiedene Rechte in verschiedenen Libraries?

### Zukünftig: Unit Tests

```php
// Beispiel mit PHPUnit
class LibraryTest extends TestCase {
    public function testCreateLibrary() {
        $manager = new LibraryManager();
        $success = $manager->createLibrary([...]);
        $this->assertTrue($success);
    }

    public function testPermissionCheck() {
        $library = new Library('test-lib');
        $this->assertTrue($library->hasPermission('john', 'download'));
        $this->assertFalse($library->hasPermission('john', 'delete'));
    }
}
```

---

## 🔮 Roadmap & Zukunft

Siehe [docs/Roadmap-Entwicklung.md](docs/Roadmap-Entwicklung.md)

**Nächste Schritte:**

1. **Bibliothek-Zugriff für normale User**

   - `hasLibraryAccess()` Funktion
   - Dropdown-Link auch für nicht-Admins

2. **OOP-Refaktorierung Hauptsystem**

   - FileManager, UserManager Klassen
   - Service-Layer für Business-Logic

3. **Erweiterte Features**
   - Unterordner in Bibliotheken
   - Datei-Versionierung
   - Aktivitäts-Log
   - Erweiterte Suche/Filter

---

## 👨‍💻 Für Entwickler

### API-Ähnliche Funktionen (config.php)

```php
// User Management
loadUsers(): array
saveUsers(array): bool
hasPermission(string): bool
getUserRole(): string

// CSRF
generateCsrfToken(): string
verifyCsrfToken(string): bool

// File Handling
getFiles(): array
fileIcon(string): string (SVG)
formatFileSize(int): string

// Stats
loadDownloadStats(): array
saveDownloadStats(array): bool
getPendingRequestsCount(): int
```

### Bibliothek-API (bibliothek_config.php)

```php
// Manager
$manager = getBibliothekManager();
$manager->getAllLibraries(): Library[]
$manager->getLibrary(slug): Library
$manager->createLibrary(config): bool
$manager->deleteLibrary(slug): bool

// Library
$library->getDisplayName(): string
$library->hasPermission(user, perm): bool
$library->getFiles(): array
$library->incrementDownloadCounter(file): void
$library->saveConfig(config): bool
```

### Hooks für Erweiterungen

```php
// Eigene Business-Logic einfügen:

// Nach erfolgreichem Upload
function afterUpload($filename) {
    // Log schreiben, Webhook triggern, etc.
}

// Vor Download
function beforeDownload($filename, $user) {
    // Custom Logging, Analytics
}
```

---

## 🎓 Best Practices gelernt

### 1. **Modularität über Refaktorierung**

- Neues Modul (Bibliothek) in OOP statt ganzes System umbauen
- Ermöglicht Iteration ohne Breaking Changes

### 2. **Zentralisierung von Wiederholungen**

- `includes/user_dropdown.php` statt 7x dupliziert
- Änderungen nur an einer Stelle

### 3. **Permission-Driven UI**

```php
<?php if (hasPermission('delete')): ?>
    <button>🗑️ Löschen</button>
<?php endif; ?>
```

→ Keine Buttons anzeigen die User nicht nutzen dürfen

### 4. **Session-Messages für Feedback**

```php
$_SESSION['success'] = 'Aktion erfolgreich!';
header('Location: index.php');
// → In index.php: Zeige Alert, lösche Session-Key
```

### 5. **Defensive Programmierung**

```php
$data = $_POST['data'] ?? null;
if (!$data) die('Fehler');

$file = basename($_GET['file']); // Nie raw Input!
```

---

## 📝 Changelog

### v1.0 - Initial Release (Dezember 2025)

**Features:**

- Login mit Rate Limiting
- User-Management mit 3 Rollen
- Datei-Upload/Download mit Counter
- Drag & Drop Sortierung
- PDF-Merge mit FPDI
- Einstellungs-Seite für Admins
- Passwort-Reset mit Token
- Zugangsanfragen-System
- Keyboard Shortcuts
- Fallback-User System

**Bibliothek-Modul v1.0:**

- Multiple Libraries mit OOP
- Granulare Permissions (5 Typen)
- Admin-Panel für Library-CRUD
- Inline-Zugriffsverwaltung
- Identische UI zu Hauptsystem
- Download-Counter & Custom-Sortierung

---

## 🤝 Contributing

Aktuell: **Privates Projekt**

Zukünftig: Guidelines für Pull Requests, Code-Reviews, etc.

---

## 📄 Lizenz

MIT License - Siehe LICENSE Datei

---

## 🙏 Credits

**Entwickelt von:** Andreas Duswald  
**Entwicklungszeitraum:** Dezember 2025  
**Technologie-Berater:** GitHub Copilot

**Drittanbieter-Bibliotheken:**

- Bootstrap 5.3.3 (MIT License)
- FPDI 2.6.1 (MIT License)
- FPDF (Public Domain)

---

_Dokumentiert am 4. Dezember 2025 | FileSubly v1.0 | "Secure File Management Made Simple"_
