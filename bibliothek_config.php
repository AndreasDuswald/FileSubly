<?php

declare(strict_types=1);

/**
 * Bibliothek-Modul Konfiguration und Klassen
 * Komplett isoliert vom Haupt-System
 */

class Library
{
    private string $slug;
    private string $path;
    private array $config;

    public function __construct(string $slug)
    {
        $this->slug = $slug;
        $this->path = __DIR__ . '/bibliothek/' . $slug;
        $this->loadConfig();
    }

    private function loadConfig(): void
    {
        $configFile = $this->path . '/.config.json';

        if (!file_exists($configFile)) {
            throw new Exception("Library config not found: {$this->slug}");
        }

        $content = file_get_contents($configFile);
        $this->config = json_decode($content, true);

        if (!is_array($this->config)) {
            throw new Exception("Invalid config for library: {$this->slug}");
        }
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getDisplayName(): string
    {
        return $this->config['display_name'] ?? $this->slug;
    }

    public function getDescription(): string
    {
        return $this->config['description'] ?? '';
    }

    public function getAllowedExtensions(): array
    {
        return $this->config['allowed_extensions'] ?? [];
    }

    public function getMaxSizeMB(): int
    {
        return $this->config['max_size_mb'] ?? 50;
    }

    public function getPermissions(): array
    {
        return $this->config['permissions'] ?? [];
    }

    public function hasPermission(string $username, string $permission): bool
    {
        $userPerms = $this->config['permissions'][$username] ?? [];
        return in_array($permission, $userPerms);
    }

    public function getUserPermissions(string $username): array
    {
        return $this->config['permissions'][$username] ?? [];
    }

    public function saveConfig(array $config): bool
    {
        $this->config = $config;
        $configFile = $this->path . '/.config.json';

        return file_put_contents(
            $configFile,
            json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        ) !== false;
    }

    public function getFiles(): array
    {
        if (!is_dir($this->path)) {
            return [];
        }

        // Load download stats
        $statsFile = $this->path . '/.stats.json';
        $stats = [];
        if (file_exists($statsFile)) {
            $statsContent = file_get_contents($statsFile);
            $stats = json_decode($statsContent, true) ?? [];
        }

        // Load custom order
        $orderFile = $this->path . '/.order.json';
        $order = [];
        if (file_exists($orderFile)) {
            $orderContent = file_get_contents($orderFile);
            $order = json_decode($orderContent, true) ?? [];
        }

        $files = [];
        $items = scandir($this->path);

        foreach ($items as $item) {
            if ($item === '.' || $item === '..' || $item === '.config.json' || $item === '.stats.json' || $item === '.order.json') {
                continue;
            }

            $fullPath = $this->path . '/' . $item;

            if (is_file($fullPath)) {
                $files[] = [
                    'name' => $item,
                    'size' => filesize($fullPath),
                    'modified' => filemtime($fullPath),
                    'ext' => strtolower(pathinfo($item, PATHINFO_EXTENSION)),
                    'downloads' => $stats[$item] ?? 0
                ];
            }
        }

        // Sort by custom order if available, otherwise by name
        if (!empty($order)) {
            usort($files, function ($a, $b) use ($order) {
                $posA = array_search($a['name'], $order);
                $posB = array_search($b['name'], $order);

                if ($posA === false && $posB === false) {
                    return strcmp($a['name'], $b['name']);
                }
                if ($posA === false) {
                    return 1;
                }
                if ($posB === false) {
                    return -1;
                }

                return $posA - $posB;
            });
        } else {
            usort($files, fn ($a, $b) => strcmp($a['name'], $b['name']));
        }

        return $files;
    }

    public function incrementDownloadCounter(string $filename): void
    {
        $statsFile = $this->path . '/.stats.json';
        $stats = [];

        if (file_exists($statsFile)) {
            $statsContent = file_get_contents($statsFile);
            $stats = json_decode($statsContent, true) ?? [];
        }

        $stats[$filename] = ($stats[$filename] ?? 0) + 1;

        file_put_contents(
            $statsFile,
            json_encode($stats, JSON_PRETTY_PRINT),
            LOCK_EX
        );
    }
}

class LibraryManager
{
    private string $baseDir;

    public function __construct()
    {
        $this->baseDir = __DIR__ . '/bibliothek';

        // Create base directory if not exists
        if (!is_dir($this->baseDir)) {
            mkdir($this->baseDir, 0755, true);
        }
    }

    public function getAllLibraries(): array
    {
        if (!is_dir($this->baseDir)) {
            return [];
        }

        $libraries = [];
        $items = scandir($this->baseDir);

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $path = $this->baseDir . '/' . $item;

            if (is_dir($path) && file_exists($path . '/.config.json')) {
                try {
                    $libraries[] = new Library($item);
                } catch (Exception $e) {
                    // Skip invalid libraries
                    continue;
                }
            }
        }

        return $libraries;
    }

    public function getLibrary(string $slug): ?Library
    {
        try {
            return new Library($slug);
        } catch (Exception $e) {
            return null;
        }
    }

    public function getLibrariesForUser(string $username): array
    {
        $allLibraries = $this->getAllLibraries();
        $userLibraries = [];

        foreach ($allLibraries as $library) {
            $perms = $library->getUserPermissions($username);
            if (!empty($perms)) {
                $userLibraries[] = $library;
            }
        }

        return $userLibraries;
    }

    public function createLibrary(string $slug, array $config): bool
    {
        $slug = $this->sanitizeSlug($slug);
        $path = $this->baseDir . '/' . $slug;

        // Check if already exists
        if (is_dir($path)) {
            return false;
        }

        // Create directory
        if (!mkdir($path, 0755, true)) {
            return false;
        }

        // Create config
        $configFile = $path . '/.config.json';
        $defaultConfig = [
            'display_name' => $config['display_name'] ?? $slug,
            'description' => $config['description'] ?? '',
            'allowed_extensions' => $config['allowed_extensions'] ?? ['pdf', 'docx', 'xlsx'],
            'max_size_mb' => $config['max_size_mb'] ?? 50,
            'permissions' => $config['permissions'] ?? [],
            'created' => date('Y-m-d H:i:s'),
            'created_by' => $_SESSION['user'] ?? 'system'
        ];

        return file_put_contents(
            $configFile,
            json_encode($defaultConfig, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            LOCK_EX
        ) !== false;
    }

    public function deleteLibrary(string $slug): bool
    {
        $path = $this->baseDir . '/' . $slug;

        if (!is_dir($path)) {
            return false;
        }

        // Delete all files first
        $files = glob($path . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }

        // Delete directory
        return rmdir($path);
    }

    private function sanitizeSlug(string $slug): string
    {
        // Convert to lowercase, replace spaces with hyphens
        $slug = strtolower($slug);
        $slug = preg_replace('/[^a-z0-9-_]/', '-', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = trim($slug, '-');

        return $slug;
    }
}

/**
 * Helper Functions
 */

function getBibliothekManager(): LibraryManager
{
    static $manager = null;
    if ($manager === null) {
        $manager = new LibraryManager();
    }
    return $manager;
}

function hasLibraryAccess(string $username): bool
{
    $manager = getBibliothekManager();
    $libraries = $manager->getLibrariesForUser($username);
    return !empty($libraries);
}

function formatFileSize(int $bytes): string
{
    $units = ['B', 'KB', 'MB', 'GB'];
    $i = 0;

    while ($bytes >= 1024 && $i < count($units) - 1) {
        $bytes /= 1024;
        $i++;
    }

    return round($bytes, 2) . ' ' . $units[$i];
}
