# FileSubly 1.0 - Dokumentenverwaltungs-System

Ein modernes, sicheres Datei-Upload und Download-System mit Benutzerverwaltung, Rollen-basierter Zugriffskontrolle und modularem Bibliotheks-System.

## 🚀 Features

### ✅ Kern-Features

#### 🔒 Sicherheit

- ✅ Rate Limiting für Login (max. 5 Versuche, 15 Min Sperre)
- ✅ CSRF-Schutz für alle Formulare und AJAX-Requests
- ✅ MIME-Type Validierung bei Datei-Uploads
- ✅ Konfigurierbare Dateigröße-Limits
- ✅ bcrypt Password-Hashing
- ✅ Session-basierte Authentifizierung
- ✅ Notfall-Wiederherstellung (admin/admin Fallback)

#### 👥 Benutzer-Management

- ✅ Granulare Berechtigungen: download, upload, delete, sort, merge, manage_users
- ✅ Admin-Panel für Benutzerverwaltung
- ✅ Profil-Seite mit Passwort-Änderung
- ✅ User-spezifische Download-Statistiken
- ✅ Passwort-Zurücksetzen mit Token (1h Gültigkeit)
- ✅ Zugangsanfragen-System für neue Benutzer
- ✅ Zentralisiertes User-Dropdown (DRY-Prinzip)

#### 📁 Datei-Management

- ✅ Drag & Drop Upload mit Überschreiben-Bestätigung
- ✅ Datei-Sortierung per Drag & Drop (persistent)
- ✅ Löschen mit Bestätigung
- ✅ Download-Counter (global und pro User)
- ✅ PDF-Merge Funktion mit FPDI
- ✅ Datei-Icons für verschiedene Typen
- ✅ Tastenkürzel für häufige Aktionen (ESC, Ctrl+U, Ctrl+M, Delete)

#### 📚 Bibliothek-Modul (OOP)

- ✅ **Mehrere separate Bibliotheken** mit eigenen Ordnern und Configs
- ✅ **Granulare Berechtigungen** pro User pro Bibliothek (download, upload, delete, sort, merge)
- ✅ **OOP-Architektur** mit Library und LibraryManager Klassen
- ✅ **Admin-Panel** für Library-CRUD (Erstellen, Bearbeiten, Löschen)
- ✅ **Inline-Zugriffsverwaltung** direkt in der Bibliothek
- ✅ **Identische UI zu Hauptsystem** (Drag & Drop, PDF Merge, Download Counter)
- ✅ **JSON-basierte Datenhaltung** (.config.json, .stats.json, .order.json)
- ✅ **Komplett isoliert** vom Hauptsystem
- 📖 Siehe: [docs/Bibliothek-Modul.md](docs/Bibliothek-Modul.md)

#### ⚙️ Einstellungen

- ✅ Admin-Einstellungsseite mit Live-Vorschau
- ✅ Konfigurierbare Dateitypen
- ✅ Einstellbare max. Dateigröße
- ✅ Anzeige der PHP-Limits
- ✅ Toggle für Passwort-Zurücksetzen Feature
- ✅ Toggle für Zugangsanfragen Feature

#### 🎨 UI/UX

- ✅ Responsive Bootstrap 5.3.3 Design
- ✅ Mobile-optimierte Tabellenansicht
- ✅ Externes CSS in `assets/css/style.css`
- ✅ Icon-basierte Navigation
- ✅ Auto-dismissable Alerts
- ✅ Loading-Overlay mit Animation (Flammy)
- ✅ Keyboard-Shortcuts Hilfe

## 📋 Systemanforderungen

- **PHP**: 7.4 oder höher
- **Webserver**: Apache (XAMPP empfohlen) mit mod_rewrite
- **PHP Extensions**:
  - `fileinfo` (für MIME-Type Validierung)
  - `json` (für Daten-Persistierung)
  - `session` (für Authentifizierung)
- **Composer**: Nicht erforderlich (alle Libraries inkludiert)

## 🔧 Installation

### Schnellstart

1. **Repository klonen**

   ```bash
   git clone https://github.com/AndreasDuswald/FileSubly.git
   cd FileSubly
   ```

2. **In XAMPP htdocs platzieren**

   ```
   Ziel: c:\xampp\htdocs\FileSubly\
   oder: /var/www/html/FileSubly/ (Linux)
   ```

3. **Berechtigungen setzen** (Linux/Mac)

   ```bash
   chmod -R 755 .
   chmod -R 777 files/ bibliothek/
   ```

4. **Apache starten**

   - XAMPP Control Panel → Apache → Start

5. **Im Browser öffnen**

   ```
   http://localhost/FileSubly/
   ```

6. **Erster Login**
   - **Benutzername**: `admin`
   - **Passwort**: `admin`
   - ⚠️ **WICHTIG**: Ändere das Passwort sofort nach dem ersten Login!

### Automatische Initialisierung

Beim ersten Start werden automatisch erstellt:

- `users.json` (mit admin/admin Account)
- `settings.json` (Standard-Einstellungen)
- `files/` Ordner (falls nicht vorhanden)
- `bibliothek/` Ordner (falls nicht vorhanden)

### Detaillierte Installationsanleitung

Siehe [INSTALL.md](INSTALL.md) für detaillierte Schritt-für-Schritt Anleitung.

## 📖 Dokumentation

- [Installation](INSTALL.md) - Detaillierte Installationsanleitung
- [Bibliothek-Modul](docs/Bibliothek-Modul.md) - Dokumentation des OOP-Moduls
- [Projekt-Übersicht](docs/Projekt-Uebersicht.md) - Architektur und Design-Entscheidungen
- [Roadmap](docs/Roadmap-Entwicklung.md) - Geplante Features und Entwicklung

## 🔐 Sicherheitshinweise

### Nach Installation durchführen:

1. ✅ **Admin-Passwort ändern** (Profil → Passwort ändern)
2. ✅ **Weitere Benutzer anlegen** (Admin-Panel)
3. ✅ **Dateigröße-Limits prüfen** (Einstellungen)
4. ✅ **PHP-Limits anpassen** falls nötig:
   ```ini
   # In php.ini:
   upload_max_filesize = 50M
   post_max_size = 50M
   max_execution_time = 300
   ```

### Produktiv-Umgebung:

- ⚠️ **HTTPS verwenden** (SSL-Zertifikat)
- ⚠️ **Regelmäßige Backups** von `users.json`, `files/`, `bibliothek/`
- ⚠️ **PHP error_reporting** auf Production-Level setzen
- ⚠️ **Zugriff beschränken** via `.htaccess` oder Firewall

## 📁 Projekt-Struktur

```
FileSubly/
├── assets/
│   ├── css/
│   │   ├── style.css           # Hauptstyles
│   │   └── bibliothek.css      # Bibliothek-spezifische Styles
│   ├── logo.png
│   └── flammy.png
├── bibliothek/                 # Bibliotheken-Ordner (nicht im Repo)
│   ├── .gitkeep
│   ├── .config.example.json    # Template für neue Bibliotheken
│   └── [slug]/                 # Einzelne Bibliotheken (dynamisch)
│       ├── .config.json        # Konfiguration + Berechtigungen
│       ├── .stats.json         # Download-Statistiken
│       ├── .order.json         # Sortierreihenfolge
│       └── *.pdf, *.xlsx, ...  # Dateien
├── docs/
│   ├── Bibliothek-Modul.md
│   ├── Projekt-Uebersicht.md
│   └── Roadmap-Entwicklung.md
├── files/                      # Hauptdateien-Ordner (nicht im Repo)
│   ├── .gitkeep
│   ├── .download_stats.json
│   ├── .sort_order.json
│   └── *.pdf, *.xlsx, ...
├── includes/
│   └── user_dropdown.php       # Zentralisiertes User-Dropdown
├── lib/
│   ├── fpdf/                   # PDF-Library
│   └── fpdi/                   # PDF Import
├── access_requests.php         # Zugangsanfragen-Verwaltung
├── admin.php                   # Benutzerverwaltung
├── bibliothek.php              # Bibliothek-Übersicht (User)
├── bibliothek_admin.php        # Bibliothek-Verwaltung (Admin)
├── bibliothek_config.php       # Bibliothek OOP-Klassen
├── bibliothek_download.php     # Bibliothek-Downloads
├── bibliothek_merge.php        # Bibliothek PDF-Merge
├── config.php                  # Zentrale Konfiguration
├── download.php                # Hauptdateien-Download
├── forgot_password.php         # Passwort vergessen
├── index.php                   # Hauptseite
├── merge_pdf.php               # Hauptdateien PDF-Merge
├── request_access.php          # Zugangsanfrage stellen
├── reset_password.php          # Passwort zurücksetzen
├── settings.php                # Admin-Einstellungen
├── statistics.php              # Download-Statistiken
├── users.example.json          # Template für Benutzer
├── settings.example.json       # Template für Einstellungen
├── .gitignore                  # Git-Ignore
├── .htaccess                   # Apache-Config
├── LICENSE                     # MIT-Lizenz
└── README.md                   # Diese Datei
```

## 🎯 Verwendung

### Als Admin

1. **Benutzerverwaltung** (Admin-Panel)

   - Neue Benutzer anlegen
   - Berechtigungen vergeben
   - Passwörter zurücksetzen

2. **Bibliotheken erstellen**

   - "📚 Bibliothek-Verwaltung" → "Neue Bibliothek"
   - Berechtigungen pro User vergeben
   - Dateien hochladen und organisieren

3. **Einstellungen anpassen**
   - Dateitypen konfigurieren
   - Upload-Limits setzen
   - Features aktivieren/deaktivieren

### Als Benutzer

1. **Dateien herunterladen**

   - Klick auf 📥-Button
   - Download wird gezählt

2. **Dateien sortieren** (mit Berechtigung)

   - Zeile mit ⋮⋮ greifen und ziehen
   - Reihenfolge wird gespeichert

3. **PDFs zusammenführen** (mit Berechtigung)

   - Checkboxen bei PDFs aktivieren
   - "Ausgewählte PDFs zusammenführen"
   - Download startet automatisch

4. **Tastenkürzel nutzen**
   - `ESC` - Modals schließen
   - `Ctrl+U` - Datei hochladen
   - `Ctrl+M` - PDFs zusammenführen
   - `?` oder `Ctrl+/` - Hilfe anzeigen

## 🔄 Updates

Updates via Git Pull:

```bash
cd FileSubly
git pull origin main
```

**Wichtig**: Deine Daten bleiben erhalten:

- `users.json` (nicht im Repo)
- `files/` (nicht im Repo)
- `bibliothek/` (nicht im Repo)
- `settings.json` (nicht im Repo)

## 🐛 Troubleshooting

### Login funktioniert nicht

- Prüfe: Ist `users.json` vorhanden?
- Fallback: admin/admin sollte immer funktionieren
- Lösche `users.json` für kompletten Reset

### Upload schlägt fehl

- Prüfe PHP `upload_max_filesize` und `post_max_size`
- Prüfe Ordner-Berechtigungen für `files/`
- Prüfe Apache-Logs: `C:\xampp\apache\logs\error.log`

### PDF-Merge funktioniert nicht

- Prüfe ob FPDF/FPDI in `lib/` vorhanden
- Prüfe PHP-Extension `fileinfo`
- Prüfe ob PDFs nicht beschädigt sind

### Bibliothek erstellen schlägt fehl

- Prüfe Ordner-Berechtigungen für `bibliothek/`
- Slug darf nur Kleinbuchstaben und Bindestriche enthalten
- Bibliothek-Name muss eindeutig sein

## 🤝 Beitragen

Contributions sind willkommen!

1. Fork das Repository
2. Erstelle einen Feature-Branch (`git checkout -b feature/AmazingFeature`)
3. Commit deine Änderungen (`git commit -m 'Add some AmazingFeature'`)
4. Push zum Branch (`git push origin feature/AmazingFeature`)
5. Öffne einen Pull Request

## 📄 Lizenz

Dieses Projekt ist unter der MIT-Lizenz lizenziert - siehe [LICENSE](LICENSE) für Details.

## 👨‍💻 Autor

**Andreas Duswald**

- GitHub: [@AndreasDuswald](https://github.com/AndreasDuswald)

## 🙏 Danksagungen

Dieses Projekt wäre ohne die großartige Arbeit der Open-Source-Community nicht möglich. Herzlichen Dank an:

### 🎨 Frontend & UI

**[Bootstrap 5.3.3](https://getbootstrap.com)**  
Leistungsstarkes, responsive Frontend-Framework  
📦 [GitHub](https://github.com/twbs/bootstrap) | 📄 MIT License  
Verwendung: Komplettes UI/UX Design, Modals, Navigation, Forms

### 📄 PDF-Verarbeitung

**[TCPDF 6.7.5](https://tcpdf.org)**  
PHP-Bibliothek zur PDF-Generierung  
📦 [GitHub](https://github.com/tecnickcom/TCPDF) | 📄 LGPL-3.0 License  
Verwendung: Custom Lists PDF-Export mit nativen Rendering-Methoden

**[FPDF 1.86](http://www.fpdf.org)**  
PHP-Klasse zur einfachen PDF-Erstellung  
📄 Freeware License  
Verwendung: Basis für PDF-Merge Funktionalität

**[FPDI 2.6.0](https://www.setasign.com/fpdi)**  
PHP-Erweiterung für FPDF zum Import existierender PDFs  
📦 [GitHub](https://github.com/Setasign/FPDI) | 📄 MIT License  
Verwendung: Import und Zusammenführen von PDF-Dateien

### 👨‍💻 Entwicklung

**PHP 7.4+** mit Extensions: `fileinfo`, `json`, `session`, `gd`  
**Apache Webserver** mit mod_rewrite  
**Git & GitHub** für Versionskontrolle

### 💡 Community

Ein besonderer Dank an alle Contributors, Tester und die Open-Source-Community für ihre unermüdliche Arbeit und das Teilen von Wissen.

**ℹ️ Credits anzeigen:** Klicke auf "ℹ️ Info & Credits" auf der Login-Seite für detaillierte Informationen zu allen verwendeten Libraries.

---

**Version**: 1.0  
**Status**: Produktionsreif  
**Letztes Update**: Dezember 2025

## 🎯 Erste Schritte

1. **Browser öffnen:** `http://localhost/andreas.duswald/FileSubly/`
2. **Einloggen** mit `admin` / `password`
3. **Passwort ändern:** Profil → Passwort ändern
4. **Einstellungen anpassen:** ⚙️ Einstellungen → Dateitypen & Größe festlegen
5. **Benutzer anlegen:** 👥 Benutzerverwaltung → Neuer Benutzer

## 🔐 Rollen & Permissions

### Admin

- Alle Rechte
- Benutzerverwaltung
- Statistiken einsehen
- Einstellungen ändern

### Premium Nutzer (ehem. Helfer)

- Dateien herunterladen
- Dateien sortieren
- PDFs zusammenführen

### User

- Nur Dateien herunterladen

## 📊 Statistiken

Admins können detaillierte Download-Statistiken einsehen:

- Gesamt-Downloads pro User
- Datei-spezifische Downloads
- Zeitstempel und IP-Adressen (in `.download_log.json`)

## 🛠️ Technische Details

### Daten-Persistierung

- **users.json** - Benutzerdaten (verschlüsselte Passwörter, optionale E-Mails)
- **settings.json** - System-Einstellungen, Feature-Toggles
- **password_reset_tokens.json** - Temporäre Reset-Tokens (1h Gültigkeit)
- **access_requests.json** - Zugangsanfragen (pending/approved/rejected)
- **files/.sort_order.json** - Datei-Sortierung
- **files/.download_stats.json** - Download-Counter
- **files/.download_log.json** - Detaillierte Logs (max. 1000 Einträge)

### Sicherheits-Mechanismen

1. **CSRF-Tokens** in allen Formularen
2. **Rate Limiting** bei Login-Versuchen
3. **MIME-Type Validierung** zusätzlich zu Extensions
4. **Dateigröße-Prüfung** vor Upload
5. **Session-basierte Auth** mit Timeout
6. **Password Hashing** mit bcrypt (cost 10)

### CSS-Architektur

Externes Stylesheet: `assets/css/style.css`

- Globale Styles
- Navbar & Buttons
- Drag & Drop
- Profile & Settings
- Mobile Responsive

## 🐛 Troubleshooting

### Upload funktioniert nicht

- `files/` Ordner Berechtigungen prüfen
- `php.ini` Upload-Limits erhöhen
- Apache neu starten

### Login-Sperre

- 15 Minuten warten ODER
- Session manuell löschen: `session_destroy()` in PHP

### MIME-Type Fehler

- `fileinfo` Extension aktivieren in `php.ini`:
  ```ini
  extension=fileinfo
  ```

### PDF-Merge Fehler

- FPDF/FPDI Pfade in `merge_pdf.php` prüfen
- PHP Memory Limit erhöhen bei großen PDFs

### E-Mail-Versand funktioniert nicht

- **Passwort-Reset** und **Zugangsanfragen** nutzen PHP `mail()`
- **Fallback:** Manueller Link wird in Session gespeichert und angezeigt
- **XAMPP Windows:** E-Mail standardmäßig nicht konfiguriert
- **Lösung:** SMTP in `php.ini` einrichten oder Fallback nutzen
  ```ini
  [mail function]
  SMTP = smtp.example.com
  smtp_port = 587
  sendmail_from = noreply@example.com
  ```

## 📝 Lizenz

MIT License © 2025

## 👨‍💻 Entwicklung

Weitere geplante Features siehe: `docs/Roadmap-Entwicklung.md`
