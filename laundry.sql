CREATE TABLE kasir (
    id_kasir INT AUTO_INCREMENT PRIMARY KEY,
    nama_kasir VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Tabel Pelanggan (Menyimpan Profil Konsumen)
CREATE TABLE pelanggan (
    id_pelanggan INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(100) NOT NULL,
    nomor_wa VARCHAR(15) NOT NULL,
    alamat TEXT
) ENGINE=InnoDB;

-- Tabel Paket Laundry (Sesuai Request: Cuci+Setrika, Cuci Kering, Cuci Saja, Setrika Aja)
CREATE TABLE paket_laundry (
    id_paket INT AUTO_INCREMENT PRIMARY KEY,
    nama_paket VARCHAR(100) NOT NULL,
    harga_per_kg INT NOT NULL
) ENGINE=InnoDB;


-- Tabel Daftar Cucian (Transaksi Aktif / Antrean di Kasir)
CREATE TABLE daftar_cucian (
    id_cucian INT AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT NOT NULL,
    id_kasir INT NOT NULL,
    id_paket INT NOT NULL,
    berat_laundry DECIMAL(4,2) NOT NULL, -- Mendukung desimal (Contoh: 3.50 kg)
    total_biaya INT NOT NULL,            -- Hasil perkalian Berat x Harga Paket
    tgl_masuk DATETIME DEFAULT CURRENT_TIMESTAMP,
    status_cucian ENUM('Diproses', 'Dicuci', 'Disetrika', 'Selesai', 'Diambil') DEFAULT 'Diproses',
    FOREIGN KEY (id_pelanggan) REFERENCES pelanggan(id_pelanggan) ON DELETE CASCADE,
    FOREIGN KEY (id_kasir) REFERENCES kasir(id_kasir) ON DELETE CASCADE,
    FOREIGN KEY (id_paket) REFERENCES paket_laundry(id_paket) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabel Riwayat (Arsip Transaksi yang Baju-nya Sudah Diambil & Lunas)
CREATE TABLE riwayat (
    id_riwayat INT AUTO_INCREMENT PRIMARY KEY,
    id_cucian INT NOT NULL,              -- Menyimpan ID order referensi asli
    nama_pelanggan_arsip VARCHAR(100) NOT NULL,
    nama_paket_arsip VARCHAR(100) NOT NULL,
    total_biaya_final INT NOT NULL,
    tgl_diambil DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Mengisi Data Akun Kasir 
-- (Password di-enkripsi MD5. Akun 1 passwordnya 'siti123', Akun 2 passwordnya 'rian123')
INSERT INTO kasir (nama_kasir, email, password) VALUES
('Siti Aminah', 'siti@laundry.com', MD5('siti123')),
('Rian Hidayat', 'rian@laundry.com', MD5('rian123'));

-- Mengisi Data Master Pelanggan awal
INSERT INTO pelanggan (nama_pelanggan, nomor_wa, alamat) VALUES
('Ahmad Fauzi', '081234567890', 'Jl. Merpati No. 12, Mataram'),
('Rina Amanda', '087765432100', 'Kost Bahagia Room 4, Pagutan'),
('Andi Wijaya', '081900112233', 'Perumahan Asri Blok C, Ampenan');

-- Mengisi Varian Paket Laundry Sesuai Permintaan Anda
INSERT INTO paket_laundry (nama_paket, harga_per_kg) VALUES
('Cuci + Setrika', 7000),
('Cuci Kering', 5000),
('Cuci Saja', 4000),
('Setrika Aja', 4000);

-- Mengisi Contoh Antrean Cucian (Daftar Cucian) yang Sedang Berjalan
-- Nota 1: Ahmad Fauzi, Cuci+Setrika, Berat 3 Kg. Total: 3 x 7000 = 21000
INSERT INTO daftar_cucian (id_pelanggan, id_kasir, id_paket, berat_laundry, total_biaya, status_cucian) VALUES
(1, 1, 1, 3.00, 21000, 'Diproses');

-- Nota 2: Rina Amanda, Cuci Kering, Berat 2.5 Kg. Total: 2.5 x 5000 = 12500
INSERT INTO daftar_cucian (id_pelanggan, id_kasir, id_paket, berat_laundry, total_biaya, status_cucian) VALUES
(2, 1, 2, 2.50, 12500, 'Dicuci');

-- Mengisi Contoh Riwayat Transaksi Masa Lalu yang Sudah Diambil Pelanggan
INSERT INTO riwayat (id_cucian, nama_pelanggan_arsip, nama_paket_arsip, total_biaya_final, tgl_diambil) VALUES
(99, 'Budi Utomo', 'Cuci + Setrika', 35000, '2026-06-25 09:30:00'),
(100, 'Siti Sarah', 'Setrika Aja', 16000, '2026-06-25 14:15:00');