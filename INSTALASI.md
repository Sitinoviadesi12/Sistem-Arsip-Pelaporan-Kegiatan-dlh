# SIPK-DLH ADMIN — Panduan Instalasi

**Sistem Pelaporan Kegiatan Dinas Lingkungan Hidup**  
Sistem admin internal untuk pengelolaan dan pelaporan kegiatan DLH.

---

## Persyaratan Sistem

- PHP 8.3+
- Composer 2.x
- Node.js 18+ & NPM
- MySQL 8.0+
- Extension PHP: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML, GD atau Imagick

---

## Langkah Instalasi

### Setup Otomatis (Disarankan)

Setelah menerima file ZIP dan mengekstraknya, cukup jalankan:

```bash
cd c:\laragon\www\siap-sistem-dlh
setup.bat
```

Script ini akan otomatis menginstall semua dependensi, membuat storage link untuk gambar, dan menyiapkan aplikasi.

### Setup Manual

#### 1. Clone / salin project

```bash
cd c:\laragon\www\siap-sistem-dlh
```

#### 2. Install dependensi

```bash
composer install
npm install
npm run build
```

#### 3. Konfigurasi environment

```bash
copy .env.example .env
php artisan key:generate
```

Edit file `.env`:

```env
APP_NAME="SIPK-DLH ADMIN"
APP_URL=http://siap-sistem-dlh.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sipk_dlh
DB_USERNAME=root
DB_PASSWORD=090123

SESSION_DRIVER=database
SESSION_LIFETIME=120
FILESYSTEM_DISK=public
```

#### 4. Buat database MySQL

```sql
CREATE DATABASE sipk_dlh CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Atau jalankan file `database/schema.sql` (setelah tabel `users` dari migration).

#### 5. Migrasi & seeder

```bash
php artisan migrate --seed
```

#### 6. Buat storage link (WAJIB untuk gambar)

> **PENTING:** Langkah ini WAJIB dilakukan agar gambar kegiatan dan dokumentasi bisa tampil.

```bash
php artisan storage:link
```

Perintah ini membuat link dari `public/storage` → `storage/app/public`. Tanpa langkah ini, semua gambar kegiatan tidak akan tampil.

#### 7. Jalankan aplikasi

```bash
php artisan serve
```

Atau gunakan virtual host Laragon: `http://siap-sistem-dlh.test`

---

## Login Admin

| Field    | Nilai              |
|----------|--------------------|
| URL      | `/internal-dlh-login` |
| Email    | `admin@dlh.go.id`  |
| Password | `admin123`    |

> **Penting:** Ganti password default setelah instalasi pertama!

Route `/login` default **tidak aktif**. Gunakan URL tersembunyi di atas.

---

## Fitur Utama

- Dashboard statistik kegiatan
- CRUD Kategori & Lokasi kegiatan
- Pelaporan kegiatan (draft / published)
- Upload thumbnail & dokumentasi (kompresi otomatis)
- Galeri dokumentasi
- Statistik bulanan & kategori
- Filter & pencarian kegiatan
- Export Excel, PDF, Print
- Siap integrasi website publik (`is_published`, `published_at`, `slug`)

---

## Struktur Folder Penting

```
app/
├── Livewire/Admin/     # Komponen Livewire admin
├── Models/             # Model Eloquent
├── Services/           # ImageService (kompresi)
├── Policies/           # Authorization
├── Exports/            # Export Excel
└── Http/Controllers/Admin/

database/
├── migrations/
├── seeders/AdminSeeder.php
└── schema.sql

resources/views/
├── layouts/admin.blade.php
└── livewire/admin/
```

---

## Keamanan

- Hidden login route: `/internal-dlh-login`
- Rate limiting login (5 percobaan)
- Session timeout (120 menit default)
- CSRF protection
- Validasi & sanitasi input
- Password hashing bcrypt
- File upload validation (image only, max 5MB)

---

## Export Data

Dari halaman **Kegiatan**, gunakan tombol:

- **Export Excel** — `.xlsx`
- **Export PDF** — `.pdf`
- **Print** — halaman cetak browser

Filter aktif ikut diterapkan ke export.

---

## Cara Mengirim / Transfer Project

> **PENTING:** Ikuti langkah ini dengan benar agar gambar ikut terbawa!

Project ini menggunakan **symbolic link** (junction) dari `public/storage` → `storage/app/public`. Saat di-ZIP, symbolic link ini **tidak ikut terbawa**. Berikut cara yang benar:

### Mengirim Project

1. Pastikan folder `storage/app/public/kegiatan/` dan isinya (gambar dokumentasi & thumbnail) ikut terkirim
2. ZIP seluruh folder project (termasuk folder `storage/`)
3. Kirim file ZIP beserta file **database export** (`.sql`)
4. Penerima tidak perlu khawatir tentang `public/storage` — akan dibuat otomatis

### Setelah Menerima Project

1. Ekstrak ZIP ke folder web server (misal: `c:\laragon\www\siap-sistem-dlh`)
2. Jalankan `setup.bat` (otomatis) atau ikuti Langkah Instalasi Manual
3. **WAJIB** jalankan `php artisan storage:link` jika setup manual
4. Import database dari file `.sql`

### Struktur Gambar

```
storage/app/public/
├── kegiatan/
│   ├── dokumentasi/    ← foto-foto dokumentasi kegiatan
│   └── thumbnails/     ← thumbnail kegiatan
└── .gitignore
```

---

## Troubleshooting

**Error koneksi database**  
Pastikan MySQL berjalan dan kredensial `.env` benar.

**Gambar tidak tampil**  
Penyebab utama: symbolic link belum dibuat. Jalankan:
```bash
php artisan storage:link
```
Jika masih error, hapus folder/link `public/storage` dulu, lalu jalankan ulang perintah di atas.

**Gambar hilang setelah transfer/ZIP**  
Pastikan folder `storage/app/public/kegiatan/` beserta isinya ikut ter-ZIP dan terekstrak.

**Livewire upload gagal**  
Periksa `upload_max_filesize` dan `post_max_size` di `php.ini`.

---

## Teknologi

- Laravel 13 (compatible dengan ekosistem Laravel 12)
- Livewire 3 + Volt
- Laravel Breeze
- Tailwind CSS
- MySQL
- Maatwebsite Excel
- DomPDF
- Intervention Image

---

## Pengembangan Selanjutnya

Struktur database sudah menyediakan field untuk website publik:

- `kegiatan.is_published`
- `kegiatan.published_at`
- `kegiatan.slug`

API atau modul publik dapat mengambil data `where is_published = 1`.
