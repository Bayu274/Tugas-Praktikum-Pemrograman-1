# html_generator.py
from datetime import datetime
import os

class HTMLGenerator:
    def buat_bukti_pendaftaran_html(self, data_peserta, data_kegiatan):
        """Membuat bukti pendaftaran dalam format HTML"""
        
        html_content = f"""
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Bukti Pendaftaran Kegiatan</title>
            <style>
                body {{
                    font-family: 'Arial', sans-serif;
                    margin: 40px;
                    background-color: #f5f5f5;
                }}
                .container {{
                    background-color: white;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.1);
                    max-width: 800px;
                    margin: 0 auto;
                }}
                .header {{
                    text-align: center;
                    color: #2c3e50;
                    border-bottom: 2px solid #3498db;
                    padding-bottom: 20px;
                    margin-bottom: 30px;
                }}
                .section {{
                    margin-bottom: 20px;
                }}
                .section-title {{
                    color: #2c3e50;
                    border-bottom: 1px solid #ecf0f1;
                    padding-bottom: 5px;
                    margin-bottom: 15px;
                }}
                .info-grid {{
                    display: grid;
                    grid-template-columns: 150px 1fr;
                    gap: 10px;
                    margin-bottom: 10px;
                }}
                .label {{
                    font-weight: bold;
                    color: #7f8c8d;
                }}
                .value {{
                    color: #2c3e50;
                }}
                .footer {{
                    text-align: center;
                    margin-top: 30px;
                    padding-top: 20px;
                    border-top: 1px solid #ecf0f1;
                    color: #7f8c8d;
                    font-size: 12px;
                }}
                .logo {{
                    text-align: center;
                    margin-bottom: 20px;
                    font-size: 24px;
                    font-weight: bold;
                    color: #3498db;
                }}
            </style>
        </head>
        <body>
            <div class="container">
                <div class="logo">🎓 KAMPUS UNIVERSA</div>
                
                <div class="header">
                    <h1>BUKTI PENDAFTARAN KEGIATAN</h1>
                    <p>Nomor Registrasi: {data_peserta['nim']}-{data_kegiatan['id']}</p>
                </div>

                <div class="section">
                    <h2 class="section-title">Informasi Kegiatan</h2>
                    <div class="info-grid">
                        <div class="label">Nama Kegiatan:</div>
                        <div class="value">{data_kegiatan['nama']}</div>
                        
                        <div class="label">Jenis:</div>
                        <div class="value">{data_kegiatan['jenis']}</div>
                        
                        <div class="label">Tanggal:</div>
                        <div class="value">{data_kegiatan['tanggal']}</div>
                        
                        <div class="label">Waktu:</div>
                        <div class="value">{data_kegiatan['waktu']}</div>
                        
                        <div class="label">Lokasi:</div>
                        <div class="value">{data_kegiatan['lokasi']}</div>
                        
                        <div class="label">Deskripsi:</div>
                        <div class="value">{data_kegiatan.get('deskripsi', 'Tidak ada deskripsi')}</div>
                    </div>
                </div>

                <div class="section">
                    <h2 class="section-title">Data Peserta</h2>
                    <div class="info-grid">
                        <div class="label">NIM:</div>
                        <div class="value">{data_peserta['nim']}</div>
                        
                        <div class="label">Nama Lengkap:</div>
                        <div class="value">{data_peserta['nama']}</div>
                        
                        <div class="label">Waktu Pendaftaran:</div>
                        <div class="value">{data_peserta['waktu_daftar']}</div>
                        
                        <div class="label">Status:</div>
                        <div class="value" style="color: #27ae60; font-weight: bold;">TERDAFTAR</div>
                    </div>
                </div>

                <div class="section">
                    <h2 class="section-title">Informasi Penting</h2>
                    <ul>
                        <li>Harap datang 30 menit sebelum kegiatan dimulai</li>
                        <li>Bawa bukti pendaftaran ini (cetak atau elektronik)</li>
                        <li>Bawa kartu identitas (KTM/KTP) untuk verifikasi</li>
                        <li>Untuk informasi lebih lanjut, hubungi panitia</li>
                    </ul>
                </div>

                <div class="footer">
                    <p>Dicetak secara elektronik pada {datetime.now().strftime('%Y-%m-%d %H:%M:%S')}</p>
                    <p>Bukti ini sah tanpa tanda tangan basah</p>
                </div>
            </div>
        </body>
        </html>
        """
        
        # Simpan file HTML
        filename = f"bukti_daftar_{data_peserta['nim']}_{data_kegiatan['id']}.html"
        filepath = os.path.join("output", filename)
        
        with open(filepath, 'w', encoding='utf-8') as file:
            file.write(html_content)
        
        return filename

    def buat_laporan_peserta_html(self, data_kegiatan, data_peserta):
        """Membuat laporan daftar peserta dalam format HTML"""
        
        # Generate rows untuk tabel peserta
        peserta_rows = ""
        for i, peserta in enumerate(data_peserta, 1):
            peserta_rows += f"""
            <tr>
                <td style="text-align: center;">{i}</td>
                <td>{peserta['nim']}</td>
                <td>{peserta['nama']}</td>
                <td>{peserta['waktu_daftar']}</td>
            </tr>
            """
        
        html_content = f"""
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Laporan Peserta Kegiatan</title>
            <style>
                body {{
                    font-family: 'Arial', sans-serif;
                    margin: 40px;
                    background-color: #f5f5f5;
                }}
                .container {{
                    background-color: white;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.1);
                    max-width: 1000px;
                    margin: 0 auto;
                }}
                .header {{
                    text-align: center;
                    color: #2c3e50;
                    border-bottom: 2px solid #3498db;
                    padding-bottom: 20px;
                    margin-bottom: 30px;
                }}
                .info-section {{
                    margin-bottom: 30px;
                    padding: 20px;
                    background-color: #f8f9fa;
                    border-radius: 5px;
                }}
                .info-grid {{
                    display: grid;
                    grid-template-columns: 150px 1fr;
                    gap: 10px;
                }}
                .label {{
                    font-weight: bold;
                    color: #7f8c8d;
                }}
                .value {{
                    color: #2c3e50;
                }}
                table {{
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }}
                th, td {{
                    padding: 12px;
                    text-align: left;
                    border-bottom: 1px solid #ddd;
                }}
                th {{
                    background-color: #3498db;
                    color: white;
                }}
                tr:hover {{
                    background-color: #f5f5f5;
                }}
                .footer {{
                    text-align: center;
                    margin-top: 30px;
                    padding-top: 20px;
                    border-top: 1px solid #ecf0f1;
                    color: #7f8c8d;
                    font-size: 12px;
                }}
                .stats {{
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 20px;
                    margin-bottom: 20px;
                }}
                .stat-card {{
                    background-color: #e8f4fc;
                    padding: 15px;
                    border-radius: 5px;
                    text-align: center;
                }}
                .stat-number {{
                    font-size: 24px;
                    font-weight: bold;
                    color: #3498db;
                }}
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>LAPORAN DAFTAR PESERTA KEGIATAN</h1>
                    <p>Dicetak pada: {datetime.now().strftime('%Y-%m-%d %H:%M:%S')}</p>
                </div>

                <div class="info-section">
                    <h2>Informasi Kegiatan</h2>
                    <div class="info-grid">
                        <div class="label">Nama Kegiatan:</div>
                        <div class="value">{data_kegiatan['nama']}</div>
                        
                        <div class="label">Jenis:</div>
                        <div class="value">{data_kegiatan['jenis']}</div>
                        
                        <div class="label">Tanggal:</div>
                        <div class="value">{data_kegiatan['tanggal']}</div>
                        
                        <div class="label">Waktu:</div>
                        <div class="value">{data_kegiatan['waktu']}</div>
                        
                        <div class="label">Lokasi:</div>
                        <div class="value">{data_kegiatan['lokasi']}</div>
                    </div>
                </div>

                <div class="stats">
                    <div class="stat-card">
                        <div class="label">Total Kuota</div>
                        <div class="stat-number">{data_kegiatan['kuota']}</div>
                    </div>
                    <div class="stat-card">
                        <div class="label">Terdaftar</div>
                        <div class="stat-number">{data_kegiatan['pendaftar']}</div>
                    </div>
                    <div class="stat-card">
                        <div class="label">Sisa Kuota</div>
                        <div class="stat-number">{data_kegiatan['kuota'] - data_kegiatan['pendaftar']}</div>
                    </div>
                </div>

                <h2>Daftar Peserta ({len(data_peserta)} orang)</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Waktu Pendaftaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        {peserta_rows}
                    </tbody>
                </table>

                <div class="footer">
                    <p>Laporan dihasilkan secara otomatis oleh Sistem Informasi Kegiatan Kampus</p>
                    <p>© {datetime.now().year} - Universitas Example</p>
                </div>
            </div>
        </body>
        </html>
        """
        
        # Simpan file HTML
        filename = f"laporan_peserta_{data_kegiatan['id']}.html"
        filepath = os.path.join("output", filename)
        
        with open(filepath, 'w', encoding='utf-8') as file:
            file.write(html_content)
        
        return filename

    def convert_html_to_pdf(self, html_file, pdf_file):
        """Convert HTML file to PDF (optional)"""
        try:
            # Jika ingin konversi HTML ke PDF, install library tambahan
            # from weasyprint import HTML
            # HTML(html_file).write_pdf(pdf_file)
            print(f"Fitur konversi HTML ke PDF memerlukan instalasi library tambahan")
            print("Jalankan: pip install weasyprint")
            return False
        except ImportError:
            print("Library weasyprint tidak terinstall. File HTML tetap disimpan.")
            return False

# Contoh penggunaan
if __name__ == "__main__":
    # Test the HTML generator
    html_gen = HTMLGenerator()
    
    # Data contoh untuk testing
    contoh_kegiatan = {
        'id': 1,
        'nama': 'Seminar Kewirausahaan',
        'jenis': 'Seminar',
        'tanggal': '2024-03-15',
        'waktu': '14:00:00',
        'lokasi': 'Auditorium Utama',
        'deskripsi': 'Seminar tentang peluang bisnis untuk mahasiswa',
        'kuota': 100,
        'pendaftar': 75
    }
    
    contoh_peserta = {
        'nim': '123456789',
        'nama': 'John Doe',
        'waktu_daftar': '2024-03-10 10:30:45'
    }
    
    # Generate contoh file
    filename = html_gen.buat_bukti_pendaftaran_html(contoh_peserta, contoh_kegiatan)
    print(f"File HTML berhasil dibuat: {filename}")