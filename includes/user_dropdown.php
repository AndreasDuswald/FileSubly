<?php
/**
 * Wiederverwendbares User-Dropdown für die Navigation
 *
 * Erwartete Variablen:
 * - $username: Der anzuzeigende Benutzername
 * - $isAdmin: Boolean ob Admin-Menüpunkte angezeigt werden
 * - $currentPage: Aktuelle Seite (z.B. 'index', 'bibliothek', 'admin')
 * - $pendingRequestsCount: (optional) Anzahl ausstehender Zugangsanfragen für Badge
 */

$username = $username ?? $_SESSION['user'] ?? 'Unbekannt';
$isAdmin = $isAdmin ?? false;
$currentPage = $currentPage ?? '';
$pendingRequestsCount = $pendingRequestsCount ?? 0;
?>

<div class="dropdown">
    <button class="btn btn-sm btn-light dropdown-toggle d-flex align-items-center" 
            type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" class="me-2">
            <circle cx="12" cy="8" r="4"/>
            <path d="M12 14c-6 0-8 4-8 4v2h16v-2s-2-4-8-4z"/>
        </svg>
        <?= htmlspecialchars($username) ?>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <?php if ($currentPage !== 'index'): ?>
            <li><a class="dropdown-item" href="index.php">🏠 Hauptseite</a></li>
        <?php endif; ?>
        
        <li><a class="dropdown-item" href="profile.php">👤 Mein Profil</a></li>
        
        <?php if ($isAdmin): ?>
            <li><hr class="dropdown-divider"></li>
            
            <?php if ($currentPage !== 'bibliothek'): ?>
                <li><a class="dropdown-item" href="bibliothek.php">📚 Bibliothek</a></li>
            <?php endif; ?>
            
            <?php if ($currentPage === 'bibliothek'): ?>
                <li><a class="dropdown-item" href="bibliothek_admin.php">⚙️ Bibliotheken verwalten</a></li>
            <?php endif; ?>
            
            <?php if ($currentPage !== 'admin'): ?>
                <li><a class="dropdown-item" href="admin.php">👥 Benutzerverwaltung</a></li>
            <?php endif; ?>
            
            <?php if ($currentPage !== 'statistics'): ?>
                <li><a class="dropdown-item" href="statistics.php">📊 Statistiken</a></li>
            <?php endif; ?>
            
            <?php if ($currentPage !== 'settings'): ?>
                <li><a class="dropdown-item" href="settings.php">⚙️ Einstellungen</a></li>
            <?php endif; ?>
            
            <?php if ($currentPage !== 'access_requests'): ?>
                <li><a class="dropdown-item" href="access_requests.php">📝 Zugangsanfragen<?php if ($pendingRequestsCount > 0): ?> <span class="badge bg-danger"><?= $pendingRequestsCount ?></span><?php endif; ?></a></li>
            <?php endif; ?>
        <?php endif; ?>
        
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="?logout=1">🚪 Logout</a></li>
    </ul>
</div>
