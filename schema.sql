-- sql/schema.sql
CREATE DATABASE IF NOT EXISTS db_kampus_kegiatan;
USE db_kampus_kegiatan;

CREATE TABLE IF NOT EXISTS kegiatan (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    jenis VARCHAR(50) NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    lokasi VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    kuota INT NOT NULL,
    pendaftar INT DEFAULT 0,
    status VARCHAR(20) DEFAULT 'Buka'
);

CREATE TABLE IF NOT EXISTS peserta (
    id INT PRIMARY KEY AUTO_INCREMENT,
    kegiatan_id INT NOT NULL,
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(255) NOT NULL,
    waktu_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (kegiatan_id) REFERENCES kegiatan(id) ON DELETE CASCADE
);