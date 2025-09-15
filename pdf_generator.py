# pdf_generator.py
from fpdf import FPDF
from datetime import datetime

class PDFGenerator:
    def buat_bukti_pendaftaran(self, data_peserta, data_kegiatan):
        """Membuat bukti pendaftaran dalam format PDF"""
        pdf = FPDF()
        pdf.add_page()
        
        # Header
        pdf.set_font("Arial", 'B', 16)
        pdf.cell(0, 10, "BUKTI PENDAFTARAN KEGIATAN KAMPUS", 0, 1, 'C')
        pdf.ln(10)
        
        # Data Kegiatan
        pdf.set_font("Arial", 'B', 12)
        pdf.cell(40, 10, "Kegiatan:", 0, 0)
        pdf.set_font("Arial", '', 12)
        pdf.cell(0, 10, data_kegiatan['nama'], 0, 1)
        
        pdf.set_font("Arial", 'B', 12)
        pdf.cell(40, 10, "Jenis:", 0, 0)
        pdf.set_font("Arial", '', 12)
        pdf.cell(0, 10, data_kegiatan['jenis'], 0, 1)
        
        pdf.set_font("Arial", 'B', 12)
        pdf.cell(40, 10, "Tanggal/Waktu:", 0, 0)
        pdf.set_font("Arial", '', 12)
        pdf.cell(0, 10, f"{data_kegiatan['tanggal']} | {data_kegiatan['waktu']}", 0, 1)
        
        pdf.set_font("Arial", 'B', 12)
        pdf.cell(40, 10, "Lokasi:", 0, 0)
        pdf.set_font("Arial", '', 12)
        pdf.cell(0, 10, data_kegiatan['lokasi'], 0, 1)
        pdf.ln(5)
        
        # Data Peserta
        pdf.set_font("Arial", 'B', 14)
        pdf.cell(0, 10, "Data Peserta", 0, 1)
        pdf.set_font("Arial", '', 12)
        
        pdf.cell(40, 10, "NIM:", 0, 0)
        pdf.cell(0, 10, data_peserta['nim'], 0, 1)
        
        pdf.cell(40, 10, "Nama:", 0, 0)
        pdf.cell(0, 10, data_peserta['nama'], 0, 1)
        
        pdf.cell(40, 10, "Waktu Daftar:", 0, 0)
        pdf.cell(0, 10, str(data_peserta['waktu_daftar']), 0, 1)
        pdf.ln(10)
        
        # Footer
        pdf.set_font("Arial", 'I', 10)
        pdf.cell(0, 10, "Dicetak secara elektronik - Sah tanpa tanda tangan basah", 0, 1, 'C')
        
        # Simpan file
        filename = f"bukti_daftar_{data_peserta['nim']}_{data_kegiatan['id']}.pdf"
        pdf.output(f"output/{filename}")
        return filename

    def buat_laporan_peserta(self, data_kegiatan, data_peserta):
        """Membuat laporan daftar peserta suatu kegiatan dalam format PDF"""
        pdf = FPDF()
        pdf.add_page()
        
        # Header
        pdf.set_font("Arial", 'B', 16)
        pdf.cell(0, 10, "LAPORAN DAFTAR PESERTA KEGIATAN", 0, 1, 'C')
        pdf.ln(5)
        
        # Info Kegiatan
        pdf.set_font("Arial", 'B', 12)
        pdf.cell(40, 10, "Kegiatan:", 0, 0)
        pdf.set_font("Arial", '', 12)
        pdf.cell(0, 10, data_kegiatan['nama'], 0, 1)
        
        pdf.set_font("Arial", 'B', 12)
        pdf.cell(40, 10, "Tanggal:", 0, 0)
        pdf.set_font("Arial", '', 12)
        pdf.cell(0, 10, str(data_kegiatan['tanggal']), 0, 1)
        
        pdf.set_font("Arial", 'B', 12)
        pdf.cell(40, 10, "Lokasi:", 0, 0)
        pdf.set_font("Arial", '', 12)
        pdf.cell(0, 10, data_kegiatan['lokasi'], 0, 1)
        
        pdf.set_font("Arial", 'B', 12)
        pdf.cell(40, 10, "Kuota:", 0, 0)
        pdf.set_font("Arial", '', 12)
        pdf.cell(0, 10, f"{data_kegiatan['pendaftar']}/{data_kegiatan['kuota']}", 0, 1)
        pdf.ln(10)
        
        # Tabel Peserta
        pdf.set_font("Arial", 'B', 12)
        pdf.cell(10, 10, "No", 1, 0, 'C')
        pdf.cell(30, 10, "NIM", 1, 0, 'C')
        pdf.cell(60, 10, "Nama", 1, 0, 'C')
        pdf.cell(50, 10, "Waktu Pendaftaran", 1, 1, 'C')
        
        pdf.set_font("Arial", '', 10)
        for i, peserta in enumerate(data_peserta, 1):
            pdf.cell(10, 10, str(i), 1, 0, 'C')
            pdf.cell(30, 10, peserta['nim'], 1, 0)
            pdf.cell(60, 10, peserta['nama'], 1, 0)
            pdf.cell(50, 10, str(peserta['waktu_daftar']), 1, 1)
        
        # Simpan file
        filename = f"laporan_peserta_{data_kegiatan['id']}.pdf"
        pdf.output(f"output/{filename}")
        return filename