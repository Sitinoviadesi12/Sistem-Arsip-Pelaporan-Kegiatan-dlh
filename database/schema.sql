-- SIPK-DLH ADMIN Database Schema
-- MySQL 8.0+

CREATE DATABASE IF NOT EXISTS sipk_dlh CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sipk_dlh;

-- Laravel default tables (users, sessions, cache, jobs) dibuat via migration.
-- Tabel aplikasi utama:

CREATE TABLE IF NOT EXISTS kategori_kegiatan (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    deskripsi TEXT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    INDEX idx_kategori_active (is_active)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS lokasi_kegiatan (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    alamat TEXT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    INDEX idx_lokasi_active (is_active)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS kegiatan (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    kategori_kegiatan_id BIGINT UNSIGNED NOT NULL,
    lokasi_kegiatan_id BIGINT UNSIGNED NOT NULL,
    judul VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    tanggal_kegiatan DATE NOT NULL,
    thumbnail VARCHAR(255) NULL,
    deskripsi TEXT NOT NULL,
    isi_lengkap LONGTEXT NULL,
    status ENUM('draft', 'published') NOT NULL DEFAULT 'draft',
    is_published TINYINT(1) NOT NULL DEFAULT 0,
    published_at TIMESTAMP NULL,
    meta_description VARCHAR(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    INDEX idx_kegiatan_status (status),
    INDEX idx_kegiatan_published (is_published),
    INDEX idx_kegiatan_tanggal (tanggal_kegiatan),
    INDEX idx_kegiatan_published_at (published_at),
    INDEX idx_kegiatan_kategori_status (kategori_kegiatan_id, status),
    CONSTRAINT fk_kegiatan_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    CONSTRAINT fk_kegiatan_kategori FOREIGN KEY (kategori_kegiatan_id) REFERENCES kategori_kegiatan(id) ON DELETE CASCADE,
    CONSTRAINT fk_kegiatan_lokasi FOREIGN KEY (lokasi_kegiatan_id) REFERENCES lokasi_kegiatan(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS dokumentasi_kegiatan (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kegiatan_id BIGINT UNSIGNED NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    original_name VARCHAR(255) NULL,
    file_size INT UNSIGNED NULL,
    sort_order SMALLINT UNSIGNED NOT NULL DEFAULT 0,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    INDEX idx_dokumentasi_kegiatan (kegiatan_id, sort_order),
    CONSTRAINT fk_dokumentasi_kegiatan FOREIGN KEY (kegiatan_id) REFERENCES kegiatan(id) ON DELETE CASCADE
) ENGINE=InnoDB;
