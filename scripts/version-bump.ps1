# FileSubly - Version Bump Script
# Usage: powershell -ExecutionPolicy Bypass -File .\scripts\version-bump.ps1 -BumpType [patch|minor|major] -CommitMessage "Your message"

param(
    [Parameter(Mandatory=$true)]
    [ValidateSet('patch','minor','major')]
    [string]$BumpType,
    
    [Parameter(Mandatory=$true)]
    [string]$CommitMessage
)

Write-Host "[INFO] FileSubly Version Bump - Starting..." -ForegroundColor Cyan
Write-Host "[INFO] Bump Type: $BumpType" -ForegroundColor Cyan
Write-Host "[INFO] Message: $CommitMessage" -ForegroundColor Cyan

# 1. Prüfe ob Git Repository
if (-not (Test-Path ".git")) {
    Write-Host "[ERROR] Not a git repository!" -ForegroundColor Red
    exit 1
}

# 2. Prüfe ob Working Directory clean
$status = git status --porcelain
if (-not $status) {
    Write-Host "[WARNING] No changes to commit. Stage files first with: git add -A" -ForegroundColor Yellow
    exit 1
}

# 3. Lese aktuelle Version aus VERSION-Datei
if (-not (Test-Path "VERSION")) {
    Write-Host "[ERROR] VERSION file not found!" -ForegroundColor Red
    exit 1
}

$currentVersion = Get-Content "VERSION" -Raw
$currentVersion = $currentVersion.Trim()

# Parse Version (Format: MAJOR.MINOR.PATCH oder MAJOR.MINOR.PATCH+git.hash)
if ($currentVersion -match '^(\d+)\.(\d+)\.(\d+)') {
    $major = [int]$matches[1]
    $minor = [int]$matches[2]
    $patch = [int]$matches[3]
} else {
    Write-Host "[ERROR] Invalid VERSION format: $currentVersion" -ForegroundColor Red
    exit 1
}

Write-Host "[INFO] Current Version: $currentVersion" -ForegroundColor Cyan

# 4. Berechne neue Version
switch ($BumpType) {
    'patch' {
        $patch++
        if ($patch -ge 10) {
            Write-Host "[WARNING] Patch >= 10, auto-bumping minor..." -ForegroundColor Yellow
            $minor++
            $patch = 0
        }
    }
    'minor' {
        $minor++
        $patch = 0
    }
    'major' {
        $major++
        $minor = 0
        $patch = 0
    }
}

$newVersion = "$major.$minor.$patch"
Write-Host "[SUCCESS] New Version: $newVersion" -ForegroundColor Green

# 5. Update VERSION-Datei (ohne Git-Hash, kommt später)
$newVersion | Out-File -FilePath "VERSION" -NoNewline -Encoding UTF8

# 6. Update config.php Default-Settings
$configPath = "config.php"
if (Test-Path $configPath) {
    $configContent = Get-Content $configPath -Raw
    $pattern = "('app_name'\s*=>\s*'AD - FileSubly )[\d\.]+(')";
    $replacement = "`${1}$newVersion`${2}"
    $configContent = $configContent -replace $pattern, $replacement
    # Use Set-Content to preserve file encoding and line endings
    Set-Content -Path $configPath -Value $configContent -NoNewline -Encoding UTF8
    Write-Host "[SUCCESS] Updated config.php app_name" -ForegroundColor Green
}

# 7. Update CHANGELOG.md
$changelogPath = "CHANGELOG.md"
$date = Get-Date -Format "yyyy-MM-dd"
$changelogEntry = @"

## [$newVersion] - $date

### Changes
- $CommitMessage

"@

if (Test-Path $changelogPath) {
    $changelog = Get-Content $changelogPath -Raw
    $headerPattern = '(# .+?\r?\n\r?\n)'
    if ($changelog -match $headerPattern) {
        $changelog = $changelog -replace $headerPattern, "`$1$changelogEntry"
        $changelog | Out-File -FilePath $changelogPath -NoNewline -Encoding UTF8
        Write-Host "[SUCCESS] Updated CHANGELOG.md" -ForegroundColor Green
    }
} else {
    Write-Host "[WARNING] CHANGELOG.md not found, skipping..." -ForegroundColor Yellow
}

# 8. Stage alle Änderungen
git add -A
Write-Host "[SUCCESS] Staged all changes" -ForegroundColor Green

# 9. Commit
git commit -m "$CommitMessage (v$newVersion)"
if ($LASTEXITCODE -ne 0) {
    Write-Host "[ERROR] Commit failed!" -ForegroundColor Red
    exit 1
}
Write-Host "[SUCCESS] Committed: $CommitMessage (v$newVersion)" -ForegroundColor Green

# 10. Hole Git-Hash
$gitHash = git rev-parse --short HEAD
$versionWithHash = "$newVersion+git.$gitHash"
Write-Host "[INFO] Git Hash: $gitHash" -ForegroundColor Cyan

# 11. Update VERSION mit Git-Hash
$versionWithHash | Out-File -FilePath "VERSION" -NoNewline -Encoding UTF8
Write-Host "[SUCCESS] Updated VERSION with git hash: $versionWithHash" -ForegroundColor Green

# 12. Stage VERSION und amend commit
git add VERSION
git commit --amend --no-edit
Write-Host "[SUCCESS] Amended commit with VERSION file" -ForegroundColor Green

# 13. Erstelle Git-Tag
$tagName = "v$newVersion"
git tag -a $tagName -m "Release $newVersion"
Write-Host "[SUCCESS] Created tag: $tagName" -ForegroundColor Green

# 14. Zusammenfassung
Write-Host "`n========================================" -ForegroundColor Magenta
Write-Host "SUCCESS - Version Bump Complete!" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Magenta
Write-Host "Old Version:  $currentVersion" -ForegroundColor Yellow
Write-Host "New Version:  $versionWithHash" -ForegroundColor Green
Write-Host "Tag Created:  $tagName" -ForegroundColor Cyan
Write-Host "Commit Hash:  $gitHash" -ForegroundColor Gray
Write-Host "`nNext Steps:" -ForegroundColor Cyan
Write-Host "  git push origin master" -ForegroundColor White
Write-Host "  git push origin --tags" -ForegroundColor White
Write-Host "========================================`n" -ForegroundColor Magenta
