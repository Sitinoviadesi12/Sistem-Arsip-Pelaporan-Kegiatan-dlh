@echo off
chcp 65001 >nul
echo ============================================================
echo   SIPK-DLH ADMIN — Setup Otomatis
echo   Sistem Pelaporan Kegiatan Dinas Lingkungan Hidup
echo ============================================================
echo.

REM Check PHP
php -v >nul 2>&1
if errorlevel 1 (
    echo [ERROR] PHP tidak ditemukan! Pastikan PHP sudah terinstall dan ada di PATH.
    echo         Jika menggunakan Laragon, pastikan Laragon sudah berjalan.
    pause
    exit /b 1
)

REM Check Composer
composer --version >nul 2>&1
if errorlevel 1 (
    echo [ERROR] Composer tidak ditemukan! Install dari https://getcomposer.org
    pause
    exit /b 1
)

REM Check Node.js
node -v >nul 2>&1
if errorlevel 1 (
    echo [ERROR] Node.js tidak ditemukan! Install dari https://nodejs.org
    pause
    exit /b 1
)

echo [1/7] Menginstall dependensi PHP (composer)...
call composer install --no-interaction --prefer-dist
echo.

echo [2/7] Menginstall dependensi Node.js (npm)...
call npm install
echo.

echo [3/7] Build assets (Vite)...
call npm run build
echo.

echo [4/7] Menyiapkan file .env...
if not exist ".env" (
    copy .env.example .env
    echo        File .env dibuat dari .env.example
    echo        [PENTING] Edit file .env sesuai konfigurasi database Anda!
) else (
    echo        File .env sudah ada, melewati...
)
echo.

echo [5/7] Generate application key...
php artisan key:generate --force
echo.

echo [6/7] Membuat storage link (public/storage)...
REM Remove existing broken symlink/junction if exists
if exist "public\storage" (
    echo        Menghapus link lama...
    rmdir "public\storage" 2>nul
    del "public\storage" 2>nul
)
php artisan storage:link
echo.

echo [7/7] Menjalankan migrasi database...
echo        [INFO] Pastikan database MySQL sudah dibuat dan .env sudah dikonfigurasi.
echo        Jika Anda ingin menjalankan migrasi sekarang, tekan Y. Jika tidak, tekan N.
set /p RUNMIGRATE="Jalankan migrasi? (Y/N): "
if /i "%RUNMIGRATE%"=="Y" (
    php artisan migrate --seed
    echo        Migrasi selesai!
) else (
    echo        Melewati migrasi. Jalankan manual: php artisan migrate --seed
)

echo.
echo ============================================================
echo   Setup selesai!
echo.
echo   Langkah selanjutnya:
echo   1. Pastikan database MySQL sudah dibuat (sipk_dlh)
echo   2. Edit .env sesuai konfigurasi database
echo   3. Jalankan: php artisan migrate --seed (jika belum)
echo   4. Jalankan: php artisan serve
echo      Atau gunakan virtual host Laragon
echo.
echo   Login Admin:
echo   URL:      /internal-dlh-login
echo   Email:    admin@dlh.go.id
echo   Password: admin123
echo ============================================================
pause
