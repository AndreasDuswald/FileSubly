# 🚀 FileSubly - Commit & Push Protocol

**Purpose:** Standardized workflow for committing and pushing changes with version tracking.

---

## 📋 Required Information from User

Before executing the commit & push protocol, get these details from the user:

### 1. **Commit Message** (Required)

- Short, descriptive summary of changes
- Examples:
  - `"Initial Release - FileSubly 1.0"`
  - `"Fix PDF merge download issue"`
  - `"Add Bibliothek permissions system"`

### 2. **Version Bump Type** (Required)

Choose one:

- **`patch`** - Bug fixes, small tweaks, iterations (+1 step: 1.0.5 → 1.0.6, auto-bumps minor at 10)
- **`minor`** - New features, non-breaking changes (1.0.x → 1.1.0, resets patch to 0)
- **`major`** - Breaking changes, major updates (1.x.x → 2.0.0, resets all)

**Note:** Patch auto-bumps to minor when reaching 10. For FileSubly, we use minor bumps for stable releases.

### 3. **CHANGELOG Entry** (Optional but Recommended)

Ask user if detailed CHANGELOG entry is needed or use commit message as default.

---

## 🔧 Execution Steps

### Step 1: Verify Current State

```powershell
git status
```

**Check:**

- Are there uncommitted changes?
- Any merge conflicts?
- Are critical files staged?

### Step 2: Run Version Bump Script

```powershell
powershell -ExecutionPolicy Bypass -File .\scripts\version-bump.ps1 -BumpType [patch|minor|major] -CommitMessage "Your message here"
```

**This automatically:**

- ✅ Updates `VERSION` file
- ✅ Updates `config.php` app_name version
- ✅ Adds entry to `CHANGELOG.md`
- ✅ Commits all staged changes
- ✅ Generates git hash and updates `VERSION` file (e.g., `1.0.1+git.abc1234`)
- ✅ Amends commit with VERSION file
- ✅ Creates git tag (e.g., `v1.0.1`)

### Step 3: Push to Remote

```powershell
git push origin main
git push origin --tags
```

**This pushes:**

- ✅ Main branch commits
- ✅ Version tags

### Step 4: Verify

```powershell
cat VERSION
git log -1 --oneline
git tag -l
```

**Confirm:**

- VERSION file contains git hash
- Latest commit message is correct
- Tag was created

---

## 📝 Template Response

When user requests commit & push, respond with:

```
I'll commit and push with these details:
- Message: "[commit message]"
- Bump: [patch/minor/major]
- Current Version: [current]
- New Version: [new]

Proceeding...
```

Then execute the 4 steps above.

---

## 🎯 Example Workflow

**User says:**

> "Alles fertig, lass uns committen und pushen für Version 1.0"

**You ask:**

> "Gerne! Ich brauche:
>
> 1. **Commit Message** - Was wurde gemacht?
> 2. **Version Bump** - patch/minor/major?
>
> Aktuelle Version: 1.0.0
> Vorschlag: 'Initial Release - FileSubly 1.0' mit major bump (da erster Release)"

**User responds:**

> "Ja, genau so"

**You execute:**

```powershell
# Check status
git status

# Run version bump
powershell -ExecutionPolicy Bypass -File .\scripts\version-bump.ps1 -BumpType major -CommitMessage "Initial Release - FileSubly 1.0"

# Push
git push origin main
git push origin --tags

# Verify
cat VERSION
```

**You confirm:**

> "✅ Committed and pushed!
>
> - Version: 1.0.0 → 1.0.0+git.abc1234
> - Tag: v1.0.0
> - Commit: abc1234"

---

## 🚨 Common Issues & Solutions

### Issue: "Execution of scripts is disabled"

**Solution:** Use `-ExecutionPolicy Bypass` flag:

```powershell
powershell -ExecutionPolicy Bypass -File .\scripts\version-bump.ps1 ...
```

### Issue: "Nothing to commit"

**Solution:** Stage changes first:

```powershell
git status
git add -A
```

### Issue: "Tag already exists"

**Solution:** Delete old tag first:

```powershell
git tag -d v1.0.0
git push origin :refs/tags/v1.0.0
```

### Issue: "Push rejected (non-fast-forward)"

**Solution:** Pull first, then push:

```powershell
git pull origin main --rebase
git push origin main
```

---

## 📚 FileSubly-Specific Files to Update

After commit & push, these files are automatically updated:

### Always Updated by Script:

- [x] `VERSION` - Contains version + git hash
- [x] `CHANGELOG.md` - Entry added
- [x] `config.php` - app_name version updated

### Sometimes Update Manually:

- [ ] `README.md` - If features changed
- [ ] `INSTALL.md` - If installation steps changed
- [ ] `docs/Bibliothek-Modul.md` - If Bibliothek features changed
- [ ] `docs/Projekt-Uebersicht.md` - If architecture changed

---

## 🔄 Quick Reference

| Bump Type | When to Use                        | Example       | Changes                |
| --------- | ---------------------------------- | ------------- | ---------------------- |
| **patch** | Bug fixes, typos, small tweaks     | 1.0.5 → 1.0.6 | +1 (auto-bump at 10)   |
| **minor** | New features, non-breaking changes | 1.0.x → 1.1.0 | resets patch to 0      |
| **major** | Breaking changes, major rewrites   | 1.x.x → 2.0.0 | resets minor and patch |

**FileSubly Versioning:**

- **1.0.x** - Stable releases with bug fixes
- **1.x.0** - New features (e.g., Bibliothek-Modul was 1.0.0 → consider 1.1.0 for next feature)
- **x.0.0** - Major rewrites (e.g., OOP refactoring → 2.0.0)

---

## 💡 Best Practices for FileSubly

1. **Security First** - Always test authentication/permissions before committing
2. **Test Upload/Download** - Verify file operations work
3. **Check .gitignore** - Ensure no `users.json` or sensitive files committed
4. **Update Docs** - Keep README and INSTALL.md in sync
5. **CHANGELOG First** - Document what changed before bumping version

---

## 🎯 Commit Message Format

Use this format for consistency:

```
<type>: <subject>

<optional body>

<optional footer>
```

**Types:**

- `feat:` - New feature (Bibliothek, PDF merge, etc.)
- `fix:` - Bug fix (login, upload, merge)
- `docs:` - Documentation only
- `style:` - Formatting, CSS changes
- `refactor:` - Code restructuring
- `security:` - Security improvements
- `chore:` - Maintenance tasks

**Examples:**

```
feat: Add Bibliothek module with OOP architecture
fix: Correct PDF merge download with FPDI
docs: Update INSTALL.md for Linux setup
security: Implement CSRF protection for all forms
chore: Initial Release - FileSubly 1.0
```

---

## 🏁 Final Checklist

Before marking task complete:

- [ ] All changes committed
- [ ] VERSION file has git hash
- [ ] config.php version updated
- [ ] Git tag created
- [ ] Pushed to origin/main
- [ ] Tags pushed to origin
- [ ] CHANGELOG.md updated
- [ ] README.md reflects current state
- [ ] No sensitive data in repo (users.json, files/, bibliothek/\*)
- [ ] User notified of new version

---

## 🔐 FileSubly-Specific Security Checklist

Before every commit:

- [ ] ✅ `.gitignore` protects `users.json`
- [ ] ✅ `.gitignore` protects `files/*`
- [ ] ✅ `.gitignore` protects `bibliothek/*/`
- [ ] ✅ No real usernames in committed files
- [ ] ✅ No real passwords or hashes in committed files
- [ ] ✅ Example files use placeholders (user1, user2)
- [ ] ✅ Settings.json not committed (only .example.json)

---

## 📊 Version History Tracking

FileSubly uses:

- **VERSION** - Single source of truth (e.g., `1.0.0+git.abc1234`)
- **config.php** - Default app_name includes version
- **CHANGELOG.md** - Human-readable history
- **Git Tags** - Machine-readable releases (v1.0.0)

This ensures version is trackable across:

- ✅ Git repository (tags)
- ✅ Running application (config.php)
- ✅ File system (VERSION file)
- ✅ User-facing docs (CHANGELOG.md)

---

**Last Updated:** December 4, 2025  
**Version:** 1.0.0  
**Status:** ✅ Active Protocol  
**Project:** FileSubly
