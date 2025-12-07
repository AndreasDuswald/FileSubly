<?php
declare(strict_types=1);

session_start();
require __DIR__ . '/config.php';

// Logout
if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: index.php');
    exit;
}

// Nur Admin hat Zugriff
if (!hasPermission('manage_users')) {
    http_response_code(403);
    exit('Zugriff verweigert. Nur Admins können Statistiken sehen.');
}

$appName = $config['app_name'];
$brandName = $config['brand_name'];

// Download-Statistiken laden
$stats = getDownloadStats();
$lastDownloads = getLastDownloadPerFile();
$users = loadUsers();

// Sortieren nach Gesamt-Downloads pro User
$userTotals = [];
foreach ($stats as $user => $files) {
    $userTotals[$user] = array_sum($files);
}
arsort($userTotals);

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Statistiken - <?= htmlspecialchars($appName) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-flammi mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="assets/logo.png" alt="Logo" class="logo-img">
            <?= htmlspecialchars($brandName) ?> - <?= htmlspecialchars($appName) ?>
        </a>
        <div class="ms-auto">
            <div class="dropdown">
            <?php
            $username = $_SESSION['user'];
$isAdmin = true;
$currentPage = 'statistics';
$pendingRequestsCount = getPendingRequestsCount();
include __DIR__ . '/includes/user_dropdown.php';
?>
            </div>
        </div>
    </div>
</nav>

<main class="container">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📊 Download-Statistiken</h2>
        <a href="index.php" class="btn btn-secondary">← Zurück</a>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs mb-4" id="statsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">
                📈 Übersicht
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="last-downloads-tab" data-bs-toggle="tab" data-bs-target="#last-downloads" type="button" role="tab">
                🕒 Letzte Downloads
            </button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="statsTabsContent">

        <!-- Übersicht Tab -->
        <div class="tab-pane fade show active" id="overview" role="tabpanel">

    <?php if (empty($stats)): ?>
        <div class="alert alert-info">
            Noch keine Downloads aufgezeichnet.
        </div>
    <?php else: ?>

        <!-- Gesamt-Übersicht -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card stat-card text-center">
                    <div class="card-body">
                        <h3 class="display-4"><?= count($stats) ?></h3>
                        <p class="text-muted mb-0">Aktive Benutzer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card text-center">
                    <div class="card-body">
                        <h3 class="display-4"><?= array_sum($userTotals) ?></h3>
                        <p class="text-muted mb-0">Gesamt-Downloads</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card text-center">
                    <div class="card-body">
                        <?php
            $avgDownloads = count($stats) > 0 ? round(array_sum($userTotals) / count($stats), 1) : 0;
        ?>
                        <h3 class="display-4"><?= $avgDownloads ?></h3>
                        <p class="text-muted mb-0">Ø pro Benutzer</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detaillierte Statistiken pro User -->
        <?php foreach ($userTotals as $user => $total): ?>
            <?php
            $userRole = $users[$user]['role'] ?? 'unbekannt';
            $roleLabel = match($userRole) {
                'admin' => '👑 Admin',
                'helper' => '⭐ Premium Nutzer',
                'user' => '👤 Nutzer',
                default => '? Unbekannt'
            };
            ?>
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <strong><?= htmlspecialchars($user) ?></strong>
                    <span>
                        <span class="badge bg-secondary"><?= $roleLabel ?></span>
                        <span class="badge bg-primary"><?= $total ?> Downloads</span>
                    </span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Datei</th>
                                    <th class="text-end">Downloads</th>
                                    <th class="text-end">Anteil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                arsort($stats[$user]);
            foreach ($stats[$user] as $file => $count):
                $percentage = round(($count / $total) * 100);
                ?>
                                <tr>
                                    <td>📄 <?= htmlspecialchars($file) ?></td>
                                    <td class="text-end">
                                        <span class="badge bg-info"><?= $count ?>×</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="progress-wrapper">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar" role="progressbar" 
                                                     style="width: <?= $percentage ?>%"
                                                     aria-valuenow="<?= $percentage ?>" 
                                                     aria-valuemin="0" aria-valuemax="100">
                                                    <?= $percentage ?>%
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>

        </div><!-- End Übersicht Tab -->

        <!-- Letzte Downloads Tab -->
        <div class="tab-pane fade" id="last-downloads" role="tabpanel">
            <?php if (empty($lastDownloads)): ?>
                <div class="alert alert-info">
                    Noch keine Downloads aufgezeichnet.
                </div>
            <?php else: ?>
                <div class="card">
                    <div class="card-header">
                        <strong>📄 Letzte Downloads pro Datei und User</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Datei</th>
                                        <th>Benutzer</th>
                                        <th>Letzter Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Sortiere Dateien alphabetisch
                                    ksort($lastDownloads);
                foreach ($lastDownloads as $filename => $userDownloads):
                    // Sortiere User nach Zeitstempel (neueste zuerst)
                    uasort($userDownloads, function ($a, $b) {
                        return $b['timestamp'] <=> $a['timestamp'];
                    });
                    $rowspan = count($userDownloads);
                    $firstRow = true;
                    foreach ($userDownloads as $username => $downloadInfo):
                        ?>
                                    <tr>
                                        <?php if ($firstRow): ?>
                                            <td rowspan="<?= $rowspan ?>" class="align-middle">
                                                <strong>📄 <?= htmlspecialchars($filename) ?></strong>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <?php
                                $userRole = $users[$username]['role'] ?? 'user';
                        $roleIcon = match($userRole) {
                            'admin' => '👑',
                            'helper' => '⭐',
                            default => '👤'
                        };
                        ?>
                                            <?= $roleIcon ?> <?= htmlspecialchars($username) ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-info"><?= htmlspecialchars($downloadInfo['date']) ?> Uhr</span>
                                        </td>
                                    </tr>
                                    <?php
                                        $firstRow = false;
                    endforeach;
                endforeach;
?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div><!-- End Letzte Downloads Tab -->

    </div><!-- End Tab Content -->

</main>

<?php renderFooter(); ?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
