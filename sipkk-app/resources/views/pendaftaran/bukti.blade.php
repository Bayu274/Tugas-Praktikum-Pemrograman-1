<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pendaftaran - {{ $pendaftaran->nama }}</title>
    <style>
        /* 1. Body: Hanya untuk menampung elemen watermark */
        body { 
            font-family: 'Arial', sans-serif; 
            margin: 0;
            padding: 0;
            /* Pastikan background body bersih agar watermark terlihat */
            background-color: #f0f0f0; 
        }

        /* 2. Watermark: Elemen terpisah di belakang konten */
        .watermark {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Taruh di belakang semua konten */
            background-image: url('{{ asset('images/gambar-fix.jpg') }}'); /* Ganti path gambar Anda */
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover; 
            opacity: 0.1; /* Tingkat transparansi watermark (sesuaikan 0.05 hingga 0.2) */
        }

        /* 3. Container: Wrapper utama dengan background solid */
        .container { 
            /* Batasi lebar cetak */
            max-width: 800px; 
            margin: 50px auto; 
            padding: 30px;
            
            /* PENTING: LATAR BELAKANG PUTIH SOLID */
            background-color: white; 
            color: #333; /* Warna teks utama gelap */
            
            border: 1px solid #ddd; 
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15); /* Bayangan agar terlihat menonjol */
        }

        /* 4. Header & Info Box Styles */
        .header { 
            text-align: center; 
            margin-bottom: 25px; 
            border-bottom: 3px double #1e8449; /* Garis bawah ganda warna hijau */
            padding-bottom: 15px; 
        }
        .header h2 { 
            margin: 5px 0; 
            color: #0b0b0b; /* Warna hijau kampus */
        }
        .info-box { 
            padding: 15px; 
            background-color: #e6ffe6; /* Warna latar belakang hijau muda */
            border: 1px solid #c3e6cb;
            border-radius: 5px; 
            margin-bottom: 25px;
            color: #155724; /* Warna teks hijau gelap */
        }

        /* 5. Detail Table Styles */
        .details table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px;
        }
        .details th { 
            text-align: left; 
            padding: 10px 0; 
            width: 35%;
            font-weight: normal;
        }
        .details td { 
            padding: 10px 0; 
            font-weight: bold; 
            color: #333;
        }
        
        /* 6. Footer */
        .footer { 
            text-align: right; 
            margin-top: 50px; 
        }

        /* 7. Print Control: Sembunyikan elemen saat mencetak */
        @media print {
            .watermark { display: none !important; }
            .no-print { display: none !important; }
            .container { 
                box-shadow: none !important; 
                border: none !important; 
                margin: 0;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    
    <div class="watermark"></div> 
    
    <div class="container">
        <div class="header">
            <h2>BUKTI PENDAFTARAN KEGIATAN KAMPUS</h2>
            <p>Sistem Informasi Pendaftaran Kegiatan Kampus (SIPKK)</p>
        </div>

        <div class="info-box">
            <p style="font-size: 1.1em;">Selamat, {{ $pendaftaran->nama }}, Anda telah berhasil terdaftar pada kegiatan berikut.</p>
            <p style="font-size: 0.9em; color: #333;">Harap simpan bukti ini untuk keperluan verifikasi pada hari-H kegiatan.</p>
        </div>

        <div class="details">
            <h3 style="border-bottom: 1px solid #ccc; padding-bottom: 5px;">Detail Pendaftar</h3>
            <table>
                <tr><th>ID Pendaftaran</th><td>{{ $pendaftaran->id }}</td></tr>
                <tr><th>Nama Pendaftar</th><td>{{ $pendaftaran->nama }}</td></tr>
                <tr><th>NIM</th><td>{{ $pendaftaran->nim }}</td></tr>
                <tr><th>Tanggal Pendaftaran</th><td>{{ $pendaftaran->created_at->format('d F Y H:i:s') }} WIB</td></tr>
            </table>

            <h3 style="border-bottom: 1px solid #ccc; padding-bottom: 5px; margin-top: 30px;">Detail Kegiatan</h3>
            <table>
                <tr><th>Nama Kegiatan</th><td>{{ $pendaftaran->kegiatan->nama_kegiatan ?? 'N/A' }}</td></tr>
                <tr><th>Lokasi</th><td>{{ $pendaftaran->kegiatan->lokasi ?? 'N/A' }}</td></tr>
                <tr><th>Tanggal Kegiatan</th><td>{{ $pendaftaran->kegiatan->tanggal_mulai ?? 'N/A' }}</td></tr>
                <tr><th>Status Pendaftaran</th><td><span style="color: green; font-weight: bold;">BERHASIL TERDAFTAR</span></td></tr>
            </table>
        </div>

        <div class="footer">
            <p>Tercetak otomatis oleh sistem.</p>
            <p>Hormat Kami,</p>
            <p>Admin SIPKK</p>
        </div>
        
        <div class="no-print" style="text-align: center; margin-top: 30px;">
            <button onclick="window.print()" style="padding: 10px 20px; background-color: #1e8449; color: white; border: none; cursor: pointer; border-radius: 5px;">
                Cetak Bukti Pendaftaran
            </button>
            <a href="{{ url('dashboard') }}" style="margin-left: 20px; text-decoration: none; color: #555;">
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</body>
</html>