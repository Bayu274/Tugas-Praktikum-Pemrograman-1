# database.py
import mysql.connector
from mysql.connector import Error
from config import DB_CONFIG

class Database:
    def __init__(self):
        self.create_database()
        self.create_tables()

    def get_connection(self):
        """Membuat dan mengembalikan koneksi MySQL"""
        try:
            conn = mysql.connector.connect(**DB_CONFIG)
            return conn
        except Error as e:
            print(f"Error connecting to MySQL: {e}")
            return None

    def create_database(self):
        """Membuat database jika belum ada"""
        try:
            # Temporary config tanpa database name
            temp_config = DB_CONFIG.copy()
            database_name = temp_config.pop('database')
            
            conn = mysql.connector.connect(**temp_config)
            cursor = conn.cursor()
            cursor.execute(f"CREATE DATABASE IF NOT EXISTS {database_name}")
            print(f"Database {database_name} checked/created successfully")
            conn.close()
        except Error as e:
            print(f"Error creating database: {e}")

    def create_tables(self):
        """Membuat tabel jika belum ada"""
        conn = self.get_connection()
        if conn is None:
            return

        cursor = conn.cursor()

        # Tabel kegiatan
        cursor.execute('''
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
            )
        ''')

        # Tabel peserta
        cursor.execute('''
            CREATE TABLE IF NOT EXISTS peserta (
                id INT PRIMARY KEY AUTO_INCREMENT,
                kegiatan_id INT NOT NULL,
                nim VARCHAR(20) NOT NULL,
                nama VARCHAR(255) NOT NULL,
                waktu_daftar TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (kegiatan_id) REFERENCES kegiatan(id) ON DELETE CASCADE
            )
        ''')

        conn.commit()
        cursor.close()
        conn.close()
        print("Tables checked/created successfully")

    # --- CRUD untuk Kegiatan ---
    def tambah_kegiatan(self, nama, jenis, tanggal, waktu, lokasi, deskripsi, kuota):
        conn = self.get_connection()
        if conn is None:
            return False

        cursor = conn.cursor()
        try:
            cursor.execute('''
                INSERT INTO kegiatan (nama, jenis, tanggal, waktu, lokasi, deskripsi, kuota)
                VALUES (%s, %s, %s, %s, %s, %s, %s)
            ''', (nama, jenis, tanggal, waktu, lokasi, deskripsi, kuota))
            conn.commit()
            return True
        except Error as e:
            print(f"Error adding kegiatan: {e}")
            return False
        finally:
            cursor.close()
            conn.close()

    def get_semua_kegiatan(self):
        conn = self.get_connection()
        if conn is None:
            return []

        cursor = conn.cursor(dictionary=True)  # Return results as dictionary
        try:
            cursor.execute('SELECT * FROM kegiatan ORDER BY tanggal, waktu')
            return cursor.fetchall()
        except Error as e:
            print(f"Error fetching kegiatan: {e}")
            return []
        finally:
            cursor.close()
            conn.close()

    def get_kegiatan_by_id(self, id):
        conn = self.get_connection()
        if conn is None:
            return None

        cursor = conn.cursor(dictionary=True)
        try:
            cursor.execute('SELECT * FROM kegiatan WHERE id = %s', (id,))
            return cursor.fetchone()
        except Error as e:
            print(f"Error fetching kegiatan: {e}")
            return None
        finally:
            cursor.close()
            conn.close()

    def update_kegiatan(self, id, nama, jenis, tanggal, waktu, lokasi, deskripsi, kuota, status):
        conn = self.get_connection()
        if conn is None:
            return False

        cursor = conn.cursor()
        try:
            cursor.execute('''
                UPDATE kegiatan
                SET nama=%s, jenis=%s, tanggal=%s, waktu=%s, lokasi=%s, 
                    deskripsi=%s, kuota=%s, status=%s
                WHERE id=%s
            ''', (nama, jenis, tanggal, waktu, lokasi, deskripsi, kuota, status, id))
            conn.commit()
            return True
        except Error as e:
            print(f"Error updating kegiatan: {e}")
            return False
        finally:
            cursor.close()
            conn.close()

    def hapus_kegiatan(self, id):
        conn = self.get_connection()
        if conn is None:
            return False

        cursor = conn.cursor()
        try:
            # ON DELETE CASCADE di foreign key akan otomatis hapus peserta
            cursor.execute('DELETE FROM kegiatan WHERE id = %s', (id,))
            conn.commit()
            return True
        except Error as e:
            print(f"Error deleting kegiatan: {e}")
            return False
        finally:
            cursor.close()
            conn.close()

    # --- CRUD untuk Peserta ---
    def daftar_peserta(self, kegiatan_id, nim, nama):
        conn = self.get_connection()
        if conn is None:
            return False

        cursor = conn.cursor()
        try:
            # Cek kuota terlebih dahulu
            cursor.execute('SELECT kuota, pendaftar FROM kegiatan WHERE id = %s', (kegiatan_id,))
            result = cursor.fetchone()
            
            if not result or result[1] >= result[0]:
                return False  # Kuota penuh atau kegiatan tidak ada

            # Tambah peserta
            cursor.execute('''
                INSERT INTO peserta (kegiatan_id, nim, nama)
                VALUES (%s, %s, %s)
            ''', (kegiatan_id, nim, nama))

            # Update jumlah pendaftar
            cursor.execute('UPDATE kegiatan SET pendaftar = pendaftar + 1 WHERE id = %s', (kegiatan_id,))
            conn.commit()
            return True
            
        except Error as e:
            print(f"Error registering peserta: {e}")
            return False
        finally:
            cursor.close()
            conn.close()

    def get_peserta_by_kegiatan(self, kegiatan_id):
        conn = self.get_connection()
        if conn is None:
            return []

        cursor = conn.cursor(dictionary=True)
        try:
            cursor.execute('''
                SELECT p.*, k.nama as nama_kegiatan
                FROM peserta p
                JOIN kegiatan k ON p.kegiatan_id = k.id
                WHERE p.kegiatan_id = %s
                ORDER BY p.waktu_daftar
            ''', (kegiatan_id,))
            return cursor.fetchall()
        except Error as e:
            print(f"Error fetching peserta: {e}")
            return []
        finally:
            cursor.close()
            conn.close()