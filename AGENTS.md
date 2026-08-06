# AGENTS.md

Plain procedural PHP (no framework, no composer) MySQL app: a food-recipe site ("Dapur Kita"). UI text and code comments are in Indonesian.

## Running locally (XAMPP)
- Copy/keep the repo under `\xampp\htdocs\ProjekAkhirWeb` — the folder name is part of the URL (`localhost/ProjekAkhirWeb`).
- Start MySQL + Apache in XAMPP. Create a DB and import `database/projek_akhir_prak_web.sql` (it has no CREATE DATABASE/USE — you choose the name; the config file expects `projek_akhir_prak_web`).
- No build, lint, or test steps exist. Verify changes by clicking through in a browser.
- Connection is **split/inconsistent right now**: root view pages use `include './config/koneksi.php'` (DB name `projek_akhir_prak_web`), but `php/` handlers (`cek_login.php`, `daftar_akun.php`, `add_proses.php`, `update.php`, `hapus.php`, `php/editProfile.php`) and the root `editProfile.php` view still hardcode `new mysqli('localhost', 'root', '', 'projek_akhir_web')`. Both DB names must exist for all pages to work; if one is missing you get silent SQL failures or "konek gagal". Prefer `config/koneksi.php` when touching DB access.

## Structure & request flow
- Root pages (`index.php`, `homepage.php`, `dashboard.php`, `tambah.php`, `editResep.php`, `editProfile.php`, `detail.php`, `menu*.php`, `about*.php`) are views that do inline SQL, `require` partials from `component/`, and post to handlers. Root views that query the DB open `include './config/koneksi.php'` (defines `$konek`); pages like `login.php`/`register.php`/`tambah.php` never touch the DB directly.
- `php/` holds form handlers (`cek_login.php`, `daftar_akun.php`, `add_proses.php`, `update.php`, `editProfile.php`, `hapus.php`, `logout.php`). Handlers live one level below root, so redirects/links use `../` (e.g. `header('location:../dashboard.php')`). Keep this relative-path scheme when adding handlers.
- `component/` is shared HTML fragments: `head-data.php` (opens `<head>`, loads Bootstrap/TinyMCE/Alpine and must be `require`d near the top), `footer-data.php`, navbar/menu/`dashProfile.php`, `detailContent.php`, `LogRegTop.php`.
- Two parallel page sets: guest (`index.php`, `menu.php`, `about.php`, `detailBelumLogin.php`) and logged-in (`homepage.php`, `menuSudahLogin.php`, `aboutSudahLogin.php`, `detail.php`). Copy the logged-in pair when a page changes.

## Auth/session pattern
- Login required pages: `session_start();` then `require './php/session.php'` (redirects to `login.php?pesan=belum` when `$_SESSION['username']` is unset). Use this exact pattern for any new protected page.
- Login flow: `login.php` → `php/cek_login.php` → sets `$_SESSION['username']`, `['id_user']`, `['profilePicture']`. Passwords are bcrypt via `password_verify`/`password_hash` (see `daftar_akun.php`).
- Flash messages pass through `?pesan=` (berhasil/gagal/keluar/terdaftar/belum) rendered in `component/LogRegTop.php`.
- `php/hapus.php` has **no** session check — deleting a resep is a plain GET on `php/hapus.php?id_resep=N` and never verifies ownership. Also note the "Keluar" link in `dashboard.php`/`tambah.php`/`editResep.php` points at `login.php` (not `php/logout.php`); don't assume it logs out.

## Database (`projek_akhir_prak_web`)
- Tables: `users` (`id_user`, `username`, `email`, `password`, `headline`, `profilePicture` default `profile-dummy.png`, `namaLengkap`) and `resep` (`id_resep`, `judul`, `deskripsi`, `bahan_bahan`, `cara_pembuatan`, `tgl_pembuatan`, `foto`, `id_user` FK → `users`).
- `resep.bahan_bahan` and `cara_pembuatan` store raw HTML from TinyMCE — render with `<?= ?>` (they are echoed, not re-escaped, elsewhere). Seed login: `123`/`123`, `wijdan`/`wijdan123`, `adit`/`adit123`.
- For schema changes, edit `database/projek_akhir_prak_web.sql` (single dump, FOREIGN KEYs on) and re-import manually.

## Forms & image uploads
- Add/edit resep forms: `enctype="multipart/form-data"` → `php/add_proses.php` / `php/update.php`. Uploads go to `img/resep/`, renamed with `uniqid()` + extension (allowed: jpg/jpeg/png/webp, max 5MB). Edit keeps the old image via a hidden `gambarLama` input.
- Profile edit (`editProfile.php`) uploads to `img/profile/`, allowed extensions jpg/jpeg/png, and must update the session (`$_SESSION['username']`, `['profilePicture']`) after saving.
- `component/head-data.php` initializes TinyMCE on `textarea#editor` — the editor textareas must keep `id="editor"`. Note `tambah.php`/`editResep.php` give two textareas the same `id="editor"`.
