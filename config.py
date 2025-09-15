# config.py
# Konfigurasi Database MySQL - SILAKAN SESUAIKAN DENGAN SETTING ANDA

DB_CONFIG = {
    'host': 'localhost',      # Biasanya 'localhost' jika di PC sendiri
    'user': 'root',           # Username MySQL Anda
    'password': '',           # Password MySQL Anda (biarkan kosong jika tidak ada)
    'database': 'db_kampus_kegiatan',  # Nama database yang akan dibuat/digunakan
    'auth_plugin': 'mysql_native_password'  # Penting untuk MySQL versi terbaru
}

# Catatan: Jika menggunakan XAMPP/MAMP, password mungkin kosong ('') atau 'root'