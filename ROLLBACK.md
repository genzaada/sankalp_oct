# Migration Rollback Procedure

This document details the instant recovery steps if a rollback to the original React/Vite development baseline is required.

---

## 1. Local Development Rollback

The original React 19 / TypeScript application was established in Git before any migration actions were taken:
- Baseline commit: `baseline: original React application before migration`
- Dedicated migration branch: `migration/react-to-php`

To return the repository to the pristine pre-migration state:

```bash
cd /Users/salman/Downloads/sankalp_16_09
git checkout main
```
Or to reset all changes on the current branch:
```bash
git reset --hard 4f1837f
```
(where `4f1837f` is the baseline commit).

### To Run the Original React Application:
The Vite development server is configured on port 8443:
```bash
npm run dev
# Server is reachable at http://localhost:8443
```

---

## 2. Production Hosting Server Rollback

If an existing older version of the website was already live on the MGMU hosting server before this deployment:
1. Open **cPanel File Manager**.
2. Restore the previous backup zip file (or delete newly uploaded `php_app` files and uncompress the previous backup).
3. If database changes were made, restore the database backup via **phpMyAdmin** > **Import**.
4. Clear browser cache and verify the restored site.
