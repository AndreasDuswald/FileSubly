# FileSubly - Entwicklungs-Roadmap

## ✅ Abgeschlossen

### Sicherheit & Robustheit:

1. ✅ **Rate Limiting** für Login-Versuche (max. 5 Versuche, 15 Min Sperre)
2. ✅ **CSRF-Token** für alle Formulare und AJAX-Requests
3. ✅ **Einstellungen-Seite** für Admins:
   - Konfigurierbare erlaubte Dateitypen
   - Maximale Dateigröße festlegen
   - Anzeige der PHP-Limits
   - Feature-Toggles für Passwort-Reset & Zugangsanfragen
   - Admin-E-Mail für Benachrichtigungen
4. ✅ **CSS ausgelagert** in `assets/css/style.css`
5. ✅ **MIME-Type Validierung** bei Uploads (zusätzlich zu Extension-Check)
6. ✅ **Dateigröße-Prüfung** mit konfigurierbarem Limit

### Benutzer-Management:

7. ✅ **Optionale E-Mail-Adressen** für Benutzer
8. ✅ **Passwort-Zurücksetzen** mit Token-System:
   - Token-basierter Reset-Flow (1h Gültigkeit)
   - E-Mail-Versand mit Fallback auf manuellen Link
   - Nur für Benutzer mit hinterlegter E-Mail
   - In Einstellungen deaktivierbar
9. ✅ **Zugangsanfragen-System**:
   - Öffentliches Formular für neue Benutzer
   - Admin-Interface zur Verwaltung von Anfragen
   - Automatische Temp-Passwort-Generierung bei Genehmigung
   - E-Mail-Benachrichtigung bei Approve/Reject
   - In Einstellungen deaktivierbar

### Dokumentation:

10. ✅ **README.md** mit Setup-Anleitung, Systemanforderungen, erster Admin-User

### UI/UX:

11. ✅ **Tab-Navigation in Einstellungen** (Datei-Einstellungen, Benutzer-Features, E-Mail-Konfiguration)
12. ✅ **Tab-Navigation im Profil** (Profilinformationen, E-Mail-Adresse, Passwort ändern)
13. ✅ **PDF-Merge Bestätigungsdialog** mit Liste der zu mergenden PDFs
14. ✅ **Loading-Animation** mit Flammy.png und rotierendem Ring (auto-close nach 3s oder per Klick)
15. ✅ **E-Mail-Feld im Profil** für Benutzer (mit Hinweis zu Passwort-Reset)
16. ✅ **"Bereits als User eingetragen" Checkbox** im Zugangsanfragen-Formular
17. ✅ **Keyboard Shortcuts**: ESC (Modals schließen), Ctrl+U (Upload), Ctrl+M (Merge), Delete (Löschen), ? (Hilfe anzeigen)

### Notfall-Recovery:

18. ✅ **Fallback-User System**: Bei korrupter/fehlender users.json wird automatisch Admin-Account (user: admin, pass: admin) erstellt, nach Login wird saubere users.json wiederhergestellt

### Modularität & Erweiterungen:

19. ✅ **Bibliothek-Modul (OOP-Architektur)**:

- Separate Bibliotheken mit eigenen Ordnern und Konfigurationen
- Granulares Berechtigungssystem (download, upload, delete, sort, merge) pro User pro Bibliothek
- Admin-Panel zur Bibliotheksverwaltung (erstellen, konfigurieren, löschen)
- Inline-Zugriffsverwaltung direkt in der Bibliothek
- Dateilisten-Ansicht identisch zu index.php (Drag & Drop Sortierung, PDF Merge, Download Counter)
- OOP-Klassen: `Library`, `LibraryManager` mit sauberem API-Design
- Komplett isoliert vom Haupt-System, keine Auswirkungen auf bestehende Funktionalität
- Download-Counter und Custom-Sortierung pro Bibliothek
- FPDI-basierte PDF-Zusammenführung mit direktem Download

20. ✅ **Zentralisiertes User-Dropdown**: Wiederverwendbares Template für alle Seiten (index, admin, bibliothek, etc.) mit Badge für Zugangsanfragen

## 📋 Offen

### Bibliothek-Modul Erweiterungen:

1. **Bibliothek-Zugriff für normale User sichtbar machen**:
   - Dropdown-Link "📚 Bibliothek" auch für nicht-Admins anzeigen (wenn sie Zugriff haben)
   - `hasLibraryAccess()` Funktion prüft, ob User in mindestens einer Bibliothek Berechtigungen hat
   - Nur Bibliotheken mit Berechtigungen in der Übersicht anzeigen

### Code-Qualität:

2. **OOP-Refaktorierung des Hauptsystems**:
   - Bestehende prozedurale Struktur (index.php, download.php, etc.) in OOP umwandeln
   - FileManager, UserManager, DownloadService Klassen
   - Dependency Injection und Service-Layer
   - Konsistente Architektur zwischen Bibliothek-Modul und Hauptsystem

### Dokumentation & Wartbarkeit:
