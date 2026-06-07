-- ============================================================
--  DATABASE: naruto_anime_wiki
--  TABEL: users
-- ============================================================

CREATE DATABASE IF NOT EXISTS naruto_anime_wiki
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE naruto_anime_wiki;

CREATE TABLE users (
    id          INT UNSIGNED    AUTO_INCREMENT PRIMARY KEY,
    username    VARCHAR(50)     NOT NULL UNIQUE,
    email       VARCHAR(100)    NOT NULL UNIQUE,
    password    VARCHAR(255)    NOT NULL,
    role        ENUM('admin','user') NOT NULL DEFAULT 'user',
    created_at  TIMESTAMP       DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Data awal: 1 admin + 1 user biasa
INSERT INTO users (username, email, password, role) VALUES
('admin',      'admin@naruto.wiki', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('naruto_fan', 'user@naruto.wiki',  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user');

-- TABEL 1: Kategori merchandise
CREATE TABLE merch_categories (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(100) NOT NULL UNIQUE,   -- contoh: Action Figure, Pakaian
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- TABEL 2: Merchandise utama
CREATE TABLE merchandise (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id INT UNSIGNED NOT NULL,
    name        VARCHAR(150) NOT NULL,
    price       DECIMAL(10,2) NOT NULL,
    stock       INT UNSIGNED NOT NULL DEFAULT 0,
    description TEXT,
    created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES merch_categories(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- TABEL 3: Gambar merchandise (bisa lebih dari 1 gambar per produk)
CREATE TABLE merch_images (
    id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    merch_id     INT UNSIGNED NOT NULL,
    filename     VARCHAR(255) NOT NULL,   -- nama file yang disimpan di folder
    is_primary   TINYINT(1) DEFAULT 0,    -- 1 = gambar utama
    uploaded_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (merch_id) REFERENCES merchandise(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
--  DATA AWAL
-- ============================================================

INSERT INTO merch_categories (name) VALUES
('Action Figure'),
('Pakaian'),
('Aksesori'),
('Poster');

INSERT INTO merchandise (category_id, name, price, stock, description) VALUES
(1, 'Action Figure Naruto Sage Mode', 250000, 50, 'Figure Naruto mode Sage setinggi 15 cm.'),
(2, 'T-Shirt Akatsuki',               150000, 75, 'Kaos hitam berlogo awan merah Akatsuki.'),
(3, 'Headband Konoha',                 85000, 100,'Ikat kepala besi berlambang Konoha.'),
(4, 'Poster Shippuden Arc Pain',       45000, 200,'Poster A2 full color arc Pain vs Naruto.');