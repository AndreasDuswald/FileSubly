# 🚀 Commit & Push Protocol

**Purpose:** Standardized workflow for committing and pushing changes with version tracking.

---

## 📋 Required Information from User

Before executing the commit & push protocol, get these details from the user:

### 1. **Commit Message** (Required)

- Short, descriptive summary of changes
- Examples:
  - `"MediaPower Settings System"`
  - `"Fix gallery drag & drop"`
  - `"Add Hero block animations"`

### 2. **Version Bump Type** (Required)

Choose one:

- **`patch`** - Bug fixes, small tweaks, iterations (+1 step: 1.3.102 → 1.3.103, max 999)
- **`minor`** - New features, non-breaking changes (1.3.x → 1.4.0 when patch ≥9)
- **`major`** - Breaking changes, major updates (1.x.x → 2.0.0)

**Note:** During development phase, patch bumps increment by 1. Use `minor` bump when ready for stable release or when approaching patch=999.

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
- Is working directory clean?
- Any merge conflicts?

### Step 2: Run Version Bump Script

```powershell
powershell -ExecutionPolicy Bypass -File .\scripts\version-bump.ps1 -BumpType [patch|minor|major] -CommitMessage "Your message here"
```

**This automatically:**

- ✅ Updates `package.json` version
- ✅ Adds entry to `CHANGELOG.md`
- ✅ Commits all staged changes
- ✅ Generates git hash and updates `VERSION` file (e.g., `1.3.1+git.abc1234`)
- ✅ Amends commit with VERSION file
- ✅ Creates git tag (e.g., `v1.3.1`)

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
- New Version: [current] → [new]

Proceeding...
```

Then execute the 4 steps above.

---

## 🎯 Example Workflow

**User says:**

> "Alles fertig, lass uns committen und pushen"

**You ask:**

> "Gerne! Ich brauche:
>
> 1. **Commit Message** - Was wurde gemacht?
> 2. **Version Bump** - patch/minor/major?
>
> Soll ich eine detaillierte CHANGELOG-Entry schreiben oder reicht die Commit Message?"

**User responds:**

> "Message: 'Add gallery filtering', minor bump"

**You execute:**

```powershell
# Check status
git status

# Run version bump (minor resets patch to 0)
powershell -ExecutionPolicy Bypass -File .\scripts\version-bump.ps1 -BumpType minor -CommitMessage "Add gallery filtering"

# Push
git push origin main
git push origin --tags

# Verify
cat VERSION
```

**You confirm:**

> "✅ Committed and pushed!
>
> - Version: 1.3.402 → 1.4.0+git.def5678
> - Tag: v1.4.0
> - Commit: abc1234"

---

## 🚨 Common Issues & Solutions

### Issue: "Execution of scripts is disabled"

**Solution:** Use `-ExecutionPolicy Bypass` flag:

```powershell
powershell -ExecutionPolicy Bypass -File .\scripts\version-bump.ps1 ...
```

### Issue: "Nothing to commit"

**Solution:** Check if changes are staged:

```powershell
git status
git add -A  # If needed
```

### Issue: "Tag already exists"

**Solution:** Delete old tag first:

```powershell
git tag -d v1.3.1
git push origin :refs/tags/v1.3.1
```

### Issue: "Push rejected (non-fast-forward)"

**Solution:** Pull first, then push:

```powershell
git pull origin main --rebase
git push origin main
```

---

## 📚 Documentation to Update

After commit & push, consider updating:

### Always Check:

- [ ] `VERSION` - Contains git hash?
- [ ] `CHANGELOG.md` - Entry added?
- [ ] `package.json` - Version bumped?

### Sometimes Update:

- [ ] `README.md` - If features changed
- [ ] `Docs/` - If major changes
- [ ] `INTEGRATION.md` - If API changed

---

## 🔄 Quick Reference

| Bump Type | When to Use                                | Example           | Step Size                        |
| --------- | ------------------------------------------ | ----------------- | -------------------------------- |
| **patch** | Bug fixes, typos, small tweaks, iterations | 1.3.102 → 1.3.103 | +001 til max 999 than 1.4.0      |
| **minor** | New features, non-breaking changes         | 1.3.x → 1.4.0     | resets patch to 0 when 9 reached |
| **major** | Breaking changes, major rewrites           | 1.x.x → 2.0.0     | resets all                       |

**Development Phase:** Patch bumps increment by +1 (up to 999). Use `minor` bump to reset to clean version when approaching limits or ready for stable release.

---

## 💡 Best Practices

1. **Atomic Commits** - One logical change per commit
2. **Clear Messages** - Describe WHAT and WHY, not HOW
3. **Regular Pushes** - Don't accumulate too many local commits
4. **Test First** - Verify changes work before committing
5. **CHANGELOG First** - Update docs before version bump

---

## 🎯 Commit Message Format

Use this format for consistency:

```
<type>: <subject>

<optional body>

<optional footer>
```

**Types:**

- `feat:` - New feature
- `fix:` - Bug fix
- `docs:` - Documentation only
- `style:` - Formatting, missing semicolons, etc.
- `refactor:` - Code restructuring
- `test:` - Adding tests
- `chore:` - Maintenance tasks

**Examples:**

```
feat: Add gallery filtering by file type
fix: Correct scrolling in settings dialog
docs: Update MEDIAPOWER.md integration guide
chore: MediaPower Settings System (v1.3.0)
```

---

## 🏁 Final Checklist

Before marking task complete:

- [ ] All changes committed
- [ ] VERSION file has git hash
- [ ] Git tag created
- [ ] Pushed to origin/main
- [ ] Tags pushed to origin
- [ ] Documentation updated (if needed)
- [ ] User notified of new version

---

**Last Updated:** December 2, 2025  
**Version:** 1.0.0  
**Status:** ✅ Active Protocol
