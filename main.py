# main.py
from database import Database
from pdf_generator import PDFGenerator
from html_generator import HTMLGenerator
import os
import sys

def clear_screen():
    """Membersihkan layar terminal"""
    os.system('cls' if os.name == 'nt' else 'clear')

def print_header(title):
    """Mencetak header yang rapi"""
    clear_screen()
    print("=" * 60)
    print(title.center(60))
    print("=" * 60)
    print()

def login_admin():
    """Fungsi login admin sederhana"""
    print_header("LOGIN ADMIN")
    username = input("Username: ")
    password = input("Password: ")
    
    # Login sederhana
    if username == "admin" and password == "admin123":
        return True
    else:
        print("\n❌ Login gagal! Username atau password salah.")
        input("Tekan Enter untuk kembali...")
        return False

ef daftar_kegiatan(db, pdf_gen, html_gen):
    """Fungsi pendaftaran kegiatan oleh mahasiswa"""
    # ... [kode sebelumnya]
    
    if db.daftar_peserta(kg_id, nim, nama):
        print("\nPendaftaran berhasil!")
        
        # Generate bukti pendaftaran
        peserta_data = {
            'nim': nim,
            'nama': nama,
            'waktu_daftar': db.get_connection().execute(
                'SELECT waktu_daftar FROM peserta WHERE nim = ? AND kegiatan_id = ?',
                (nim, kg_id)
            ).fetchone()['waktu_daftar']
        }
        kegiatan_data = db.get_kegiatan_by_id(kg_id)
        
        # Generate PDF
        pdf_filename = pdf_gen.buat_bukti_pendaftaran(peserta_data, kegiatan_data)
        print(f"✓ Bukti pendaftaran PDF: {pdf_filename}")
        
        # Generate HTML
        html_filename = html_gen.buat_bukti_pendaftaran_html(peserta_data, kegiatan_data)
        print(f"✓ Bukti pendaftaran HTML: {html_filename}")
        
    else:
        print("\nPendaftaran gagal! Kuota penuh atau ID kegiatan tidak valid.")

# ... (Fungsi-fungsi lainnya seperti lihat_daftar_kegiatan, daftar_kegiatan, menu_admin, dll.)
# [Fungsi-fungsi ini akan sama dengan versi sebelumnya, tapi sekarang menggunakan MySQL]

def main():
    """Program utama"""
    try:
        # Inisialisasi database
        db = Database()
        pdf_gen = PDFGenerator()
        
        print("✅ Database connected successfully!")
        input("Tekan Enter untuk melanjutkan...")
        
        menu_utama(db, pdf_gen)
        
    except Exception as e:
        print(f"❌ Error starting application: {e}")
        print("Please check your MySQL configuration in config.py")
        input("Press Enter to exit...")

if __name__ == "__main__":
    # Pastikan folder output ada
    os.makedirs("output", exist_ok=True)
    os.makedirs("sql", exist_ok=True)
    
    main()