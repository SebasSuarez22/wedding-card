# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What this is

A single-wedding invitation site (PHP + vanilla JS/CSS) with a countdown timer and an RSVP form that writes to MySQL. `catalogo.html` is a separate, self-contained static page that showcases the available color themes as a template catalog — it is not part of the live invitation flow.

## Running locally

No build step, no package manager, no test suite — this is plain PHP served by Apache (via Docker) or `php -S`.

- Via Docker (matches production): `docker build -t wedding-card . && docker run -p 8080:80 -e PORT=80 wedding-card`
- Quick local run without Docker: `php -S localhost:8000` from the repo root, with a local MySQL reachable using the env vars below (or defaults `localhost` / `root` / no password / db `wedding`).
- Database schema: run `schema.sql` against the target MySQL database before first use (creates the `invitados` table).

## Configuration model

`config.php` is the single point of customization for a given wedding (couple's names, story, date, location, dress code copy, and which theme to use). **To re-skin this template for a different couple, edit only `config.php` and swap files in `img/` keeping the same filenames** — `index.php` and `app.js` are not meant to change per-deployment.

Theme selection (`config.php`'s `'tema'` key) picks a CSS file from `themes/` by basename; `'sage-gold'` is the default theme baked into `stylesheet.css` and has no corresponding file in `themes/`. `index.php` resolves the theme path defensively (`basename()` + `file_exists()`) before linking it, since the value ultimately comes from a PHP array, not user input.

## Database connection

`db.php` supports two connection modes, checked in order:
1. A full DSN via `MYSQL_URL` or `MYSQL_PUBLIC_URL` (Railway-style connection string), parsed with `parse_url()`.
2. Discrete `MYSQLHOST` / `MYSQLPORT` / `MYSQLUSER` / `MYSQLPASSWORD` / `MYSQLDATABASE` env vars, falling back to local defaults.

Every script that touches the DB (`confirmar.php`) does `require __DIR__ . '/db.php'` directly — there is no bootstrap/router file.

## Request flow

- `index.php` renders all five sections of the invitation (`#page1`–`#page5`) plus a hidden `#gracias` (thank-you) section in one page load; `#page2`–`#page5` start with the `d-none` class and are revealed by `verDetalles()` in `app.js` when the user clicks through from the cover page.
- The RSVP form on `#page5` POSTs to `confirmar.php`, which inserts into `invitados` via a prepared statement and redirects back to `index.php` with `?success=1` or `?error=1|2`.
- `index.php` reads `$_GET['success']`/`$_GET['error']` and, if set, emits an inline `<script>mostrarGracias()</script>` call, which hides `#page1`–`#page5` and reveals `#gracias`. There is no client-side routing/SPA framework involved — it's all server-rendered state plus small imperative DOM toggles in `app.js`.
- The countdown in `app.js` reads the wedding date from the global `window.WEDDING_DATE`, which `index.php` injects via `json_encode($config['fecha'])`. Note `fecha.mes` is 1–12 in `config.php` but JS `Date` expects 0–11, so `app.js` subtracts 1 when constructing the date.

## Deployment

Deploys as a Docker container (see `Dockerfile`, `docker-entrypoint.sh`) intended for Railway (see `README.md` for the Railway MySQL variable-wiring steps). The entrypoint rewrites the Apache `Listen` port from the `PORT` env var and optionally rewrites `/` to a `$HOMEPAGE` path via `RewriteRule` if that env var is set.
