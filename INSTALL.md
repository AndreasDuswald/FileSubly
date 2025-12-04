# Installation - FileSubly 1.0

Detaillierte Schritt-für-Schritt Anleitung zur Installation von FileSubly auf verschiedenen Systemen.

## 📋 Voraussetzungen

### Mindestanforderungen

- **PHP**: Version 7.4 oder höher
- **Webserver**: Apache 2.4+ (mit mod_rewrite)
- **Speicherplatz**: Mind. 500 MB (abhängig von Dateigröße)
- **Browser**: Chrome, Firefox, Edge, Safari (moderne Version)

### PHP-Extensions (erforderlich)

```
✓ fileinfo    - MIME-Type Erkennung
✓ json        - JSON-Parsing
✓ session     - Session-Management
✓ mbstring    - String-Verarbeitung
✓ openssl     - Passwort-Hashing (bcrypt)
```

---

## 🪟 Installation auf Windows (XAMPP)

### Schritt 1: XAMPP installieren

1. **XAMPP herunterladen**

   - Gehe zu: https://www.apachefriends.org/
   - Lade XAMPP für Windows (mit PHP 7.4+)
   - Installiere nach `C:\xampp\`

2. **XAMPP Control Panel starten**
   - Starte XAMPP Control Panel als Administrator
   - Klicke auf "Start" bei Apache

### Schritt 2: FileSubly herunterladen

```bash
# Option 1: Git Clone
cd C:\xampp\htdocs
git clone https://github.com/AndreasDuswald/FileSubly.git

# Option 2: ZIP Download
# - Lade ZIP von GitHub herunter
# - Entpacke nach C:\xampp\htdocs\FileSubly\
```

### Schritt 3: Ordner-Berechtigungen

1. **Rechtsklick auf `C:\xampp\htdocs\FileSubly\files\`**

   - Eigenschaften → Sicherheit → Bearbeiten
   - Vollzugriff für "Benutzer"

2. **Das gleiche für `C:\xampp\htdocs\FileSubly\bibliothek\`**

### Schritt 4: PHP-Konfiguration anpassen

1. **Öffne `C:\xampp\php\php.ini`**

2. **Suche und ändere folgende Werte:**

   ```ini
   upload_max_filesize = 50M
   post_max_size = 50M
   max_execution_time = 300
   memory_limit = 256M
   ```

3. **Apache neu starten** im XAMPP Control Panel

### Schritt 5: Im Browser öffnen

```
http://localhost/FileSubly/
```

**Erster Login:**

- Benutzername: `admin`
- Passwort: `admin`

⚠️ **Passwort sofort ändern!**

---

## 🐧 Installation auf Linux (Ubuntu/Debian)

### Schritt 1: Apache und PHP installieren

```bash
sudo apt update
sudo apt install apache2 php libapache2-mod-php php-fileinfo php-json php-mbstring php-session git

# Apache-Module aktivieren
sudo a2enmod rewrite
sudo systemctl restart apache2
```

### Schritt 2: FileSubly herunterladen

```bash
cd /var/www/html
sudo git clone https://github.com/AndreasDuswald/FileSubly.git
cd FileSubly
```

### Schritt 3: Berechtigungen setzen

```bash
# Ordner-Besitzer auf Apache-User setzen
sudo chown -R www-data:www-data /var/www/html/FileSubly

# Schreibrechte für Upload-Ordner
sudo chmod -R 755 /var/www/html/FileSubly
sudo chmod -R 777 /var/www/html/FileSubly/files
sudo chmod -R 777 /var/www/html/FileSubly/bibliothek
```

### Schritt 4: Apache VirtualHost (optional)

```bash
sudo nano /etc/apache2/sites-available/filesubly.conf
```

**Inhalt:**

```apache
<VirtualHost *:80>
    ServerName filesubly.local
    DocumentRoot /var/www/html/FileSubly

    <Directory /var/www/html/FileSubly>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/filesubly_error.log
    CustomLog ${APACHE_LOG_DIR}/filesubly_access.log combined
</VirtualHost>
```

**Aktivieren:**

```bash
sudo a2ensite filesubly.conf
sudo systemctl reload apache2

# In /etc/hosts eintragen:
sudo nano /etc/hosts
# Zeile hinzufügen: 127.0.0.1 filesubly.local
```

### Schritt 5: PHP-Limits anpassen

```bash
sudo nano /etc/php/8.1/apache2/php.ini  # Version anpassen!
```

**Ändern:**

```ini
upload_max_filesize = 50M
post_max_size = 50M
max_execution_time = 300
memory_limit = 256M
```

**Apache neu starten:**

```bash
sudo systemctl restart apache2
```

### Schritt 6: Im Browser öffnen

```
http://localhost/FileSubly/
# oder
http://filesubly.local/
```

---

## 🍎 Installation auf macOS

### Schritt 1: XAMPP für macOS installieren

1. **Download von** https://www.apachefriends.org/
2. Installiere XAMPP nach `/Applications/XAMPP/`
3. Starte XAMPP Control Panel

### Schritt 2: FileSubly klonen

```bash
cd /Applications/XAMPP/htdocs
git clone https://github.com/AndreasDuswald/FileSubly.git
```

### Schritt 3: Berechtigungen setzen

```bash
sudo chmod -R 755 /Applications/XAMPP/htdocs/FileSubly
sudo chmod -R 777 /Applications/XAMPP/htdocs/FileSubly/files
sudo chmod -R 777 /Applications/XAMPP/htdocs/FileSubly/bibliothek
```

### Schritt 4: PHP-Konfiguration

```bash
sudo nano /Applications/XAMPP/etc/php.ini
```

**Ändern (wie bei Windows):**

```ini
upload_max_filesize = 50M
post_max_size = 50M
max_execution_time = 300
```

**Apache neu starten** im XAMPP Control Panel

### Schritt 5: Öffnen

```
http://localhost/FileSubly/
```

---

## 🔧 Konfiguration nach Installation

### 1. Passwort ändern

1. Login mit `admin` / `admin`
2. Klicke auf Benutzer-Dropdown (oben rechts)
3. "👤 Mein Profil" → "Passwort ändern"
4. Neues sicheres Passwort eingeben

### 2. Weitere Benutzer anlegen

1. "👥 Benutzerverwaltung"
2. "➕ Neuer Benutzer"
3. Berechtigungen vergeben:
   - `download` - Dateien herunterladen
   - `upload` - Dateien hochladen
   - `delete` - Dateien löschen
   - `sort` - Sortierung ändern
   - `merge` - PDFs zusammenführen
   - `manage_users` - Admin-Rechte

### 3. Erste Bibliothek erstellen

1. "📚 Bibliothek-Verwaltung"
2. "➕ Neue Bibliothek"
3. Eingeben:
   - **Anzeigename**: z.B. "Projekte 2025"
   - **Slug**: z.B. "projekte2025" (nur Kleinbuchstaben, Bindestriche)
   - **Beschreibung**: Kurze Info
4. Berechtigungen pro User festlegen
5. Dateien hochladen

### 4. Einstellungen anpassen

1. "⚙️ Einstellungen" (nur Admin)
2. Passe an:
   - App-Name / Brand-Name
   - Erlaubte Dateitypen
   - Max. Dateigröße
   - Features (Passwort-Reset, Zugangsanfragen)

---

## 🔐 Sicherheits-Checkliste

Nach der Installation prüfen:

- [ ] Admin-Passwort geändert
- [ ] `files/` Ordner ist beschreibbar
- [ ] `bibliothek/` Ordner ist beschreibbar
- [ ] PHP upload_max_filesize ≥ 50M
- [ ] PHP post_max_size ≥ 50M
- [ ] `.htaccess` existiert (schützt JSON-Dateien)
- [ ] Apache mod_rewrite aktiviert
- [ ] Firewall-Regeln gesetzt (Produktiv)
- [ ] SSL-Zertifikat installiert (Produktiv)

---

## 🐛 Häufige Probleme

### Problem: "Login funktioniert nicht"

**Lösung:**

1. Prüfe ob `users.json` existiert
2. Falls nicht: Login mit `admin`/`admin` erstellt sie automatisch
3. Falls beschädigt: Lösche `users.json` und logge dich neu ein

### Problem: "Upload schlägt fehl"

**Lösung:**

1. Prüfe PHP `upload_max_filesize` in `php.ini`
2. Prüfe Ordner-Berechtigungen für `files/`
3. Prüfe Apache Error-Log:
   - Windows: `C:\xampp\apache\logs\error.log`
   - Linux: `/var/log/apache2/error.log`

### Problem: "500 Internal Server Error"

**Lösung:**

1. Prüfe `.htaccess` existiert
2. Prüfe Apache `mod_rewrite` aktiviert:
   ```bash
   # Linux:
   sudo a2enmod rewrite
   sudo systemctl restart apache2
   ```
3. Prüfe PHP-Version ≥ 7.4:
   ```bash
   php -v
   ```

### Problem: "PDF-Merge funktioniert nicht"

**Lösung:**

1. Prüfe ob `lib/fpdf/` und `lib/fpdi/` existieren
2. Prüfe PHP-Extension `fileinfo` aktiv:
   ```bash
   php -m | grep fileinfo
   ```
3. Prüfe ob PDFs nicht beschädigt/verschlüsselt sind

### Problem: "Bibliothek erstellen schlägt fehl"

**Lösung:**

1. Prüfe Ordner-Berechtigungen für `bibliothek/`:
   ```bash
   # Linux/Mac:
   sudo chmod 777 bibliothek/
   ```
2. Slug darf nur enthalten: `a-z`, `0-9`, `-`
3. Slug muss eindeutig sein (nicht bereits vorhanden)

---

## 📊 Performance-Optimierung

### PHP OPcache aktivieren (Produktiv)

```ini
# In php.ini:
opcache.enable=1
opcache.memory_consumption=128
opcache.max_accelerated_files=10000
```

### Apache-Komprimierung (Produktiv)

```apache
# In .htaccess oder VirtualHost:
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/css application/javascript
</IfModule>
```

### Browser-Caching (Produktiv)

```apache
# In .htaccess:
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

---

## 🔄 Backup-Strategie

### Was sichern?

```bash
# Kritische Dateien:
users.json              # Benutzerdaten
settings.json           # Einstellungen
access_requests.json    # Zugangsanfragen
files/*                 # Alle Dateien
bibliothek/*/          # Alle Bibliotheken
```

### Backup-Skript (Linux)

```bash
#!/bin/bash
BACKUP_DIR="/backup/filesubly"
DATE=$(date +%Y%m%d_%H%M%S)

mkdir -p $BACKUP_DIR

# Dateien sichern
tar -czf "$BACKUP_DIR/filesubly_$DATE.tar.gz" \
    /var/www/html/FileSubly/users.json \
    /var/www/html/FileSubly/settings.json \
    /var/www/html/FileSubly/access_requests.json \
    /var/www/html/FileSubly/files/ \
    /var/www/html/FileSubly/bibliothek/

# Alte Backups löschen (älter als 30 Tage)
find $BACKUP_DIR -name "*.tar.gz" -mtime +30 -delete
```

**Cronjob einrichten:**

```bash
crontab -e
# Täglich um 2 Uhr:
0 2 * * * /pfad/zu/backup.sh
```

---

## 🆘 Support

Bei Problemen:

1. **GitHub Issues**: https://github.com/AndreasDuswald/FileSubly/issues
2. **Dokumentation**: Siehe `docs/` Ordner
3. **Apache Logs prüfen**:
   - Windows: `C:\xampp\apache\logs\error.log`
   - Linux: `/var/log/apache2/error.log`

---

**Installation abgeschlossen?** → Zurück zu [README.md](README.md)
