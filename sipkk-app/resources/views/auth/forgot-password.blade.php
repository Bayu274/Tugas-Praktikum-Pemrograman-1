<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password - Sistem Kegiatan UNS</title>

    {{-- Menggunakan Bootstrap 5.2.3 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        /* 1. VARIABEL DAN WARNA UNS */
        :root {
          --uns-primary: #004d40; 
          --uns-accent: #fcd34d; 
          --uns-secondary: #008066; 
        }

        /* 2. BACKGROUND GAMBAR STATIS & OVERLAY - FIX BACKGROUND TERBELAH */
        body {
            min-height: 100vh;
            position: relative;
            overflow-x: hidden; 
            
            /* PENTING: Gunakan Flexbox untuk centering sempurna */
            padding: 0; 
            display: flex;
            flex-direction: column; 
            justify-content: center; /* Card di tengah vertikal */
            align-items: center; /* Card di tengah horizontal */
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/images/gambar-fix.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: brightness(0.65) blur(2px); 
            z-index: -1; 
        }

        /* 3. CARD GLASSMORPHISM (form-signin) - WIDER & MINIMAL PADDING (KOTAK) */
        .form-signin {
            max-width: 400px; /* Lebar yang sama dengan Login/Register */
            
            /* PADDING INTERNAL CARD (LEBIH KOTAK) */
            padding: 40px 45px 40px 45px !important; 
            
            margin: auto; 
            border-radius: 10px; 
            
            /* GLASSMORPHISM & SHADOW MAKSIMAL */
            background-color: rgba(255, 255, 255, 0.2); 
            -webkit-backdrop-filter: blur(30px); 
            backdrop-filter: blur(30px); 
            border: 1px solid rgba(0, 128, 102, 0.5); 
            box-shadow: 
                0 20px 50px rgba(0, 0, 0, 0.9) !important, 
                0 0 0 3px rgba(0, 128, 102, 0.5) !important, 
                inset 0 0 0 2px rgba(255, 255, 255, 0.6) !important; 
            
            z-index: 10;
        }

        /* 4. TIPOGRAFI & INPUT FIELD */
        h1 {
            color: var(--uns-accent); 
            text-shadow: 0 2px 8px rgba(0, 0, 0, 1.0); 
            font-size: 2.2rem;
            margin-bottom: 0.3rem !important; 
        }
        p.text-muted {
            color: #fff !important; 
            text-shadow: 0 2px 5px rgba(0, 0, 0, 1.0); 
            font-size: 0.95rem; 
            margin-bottom: 2rem !important; 
        }
        
        .form-signin img {
            width: 100px; 
            height: auto;
            margin-bottom: 1.5rem !important; 
        }

        /* INPUT FIELD STYLES */
        .form-floating input {
            background-color: rgba(255, 255, 255, 0.95) !important; 
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: #333 !important;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.3); 
            height: calc(3.0rem + 2px); 
            border-radius: 0 !important; 
        }
        .form-floating > label {
            color: rgba(0, 0, 0, 0.7); 
            text-shadow: none; 
            padding: 0.75rem 1rem; 
        }
        .form-control:focus {
            border-color: var(--uns-secondary); 
            box-shadow: 0 0 0 0.2rem rgba(0, 128, 102, 0.3); 
            background-color: #fff !important; 
            border-radius: 0 !important;
        }

        /* Tombol & Link */
        .btn-primary {
            --bs-btn-bg: var(--uns-primary);
            --bs-btn-border-color: var(--uns-primary);
            --bs-btn-hover-bg: var(--uns-secondary);
            --bs-btn-hover-border-color: var(--uns-secondary);
            --bs-btn-focus-shadow-rgb: 0,77,64;
            padding: 12px; 
            letter-spacing: 1px;
            font-weight: bold; 
            text-shadow: 0 1px 3px rgba(0,0,0,0.5); 
        }
        .text-link {
            color: var(--uns-accent) !important;
            font-weight: 700; 
            text-shadow: 0 1px 3px rgba(0,0,0,0.8); 
            transition: color 0.2s;
        }
        .text-link:hover {
            color: #fff !important; 
        }

        /* FOOTER COPYRIGHT DI LUAR CARD */
        .footer-copyright {
            color: #fff !important; 
            text-shadow: 0 1px 3px rgba(0,0,0,0.8);
            margin-top: 1rem; /* Jarak dari card di atasnya */
            opacity: 0.9;
            text-align: center; /* Pastikan di tengah */
        }
        
        /* ALERT/STATUS MESSAGES */
        .alert-success {
             background-color: rgba(0, 128, 102, 0.3) !important; /* Warna hijau UNS transparan */
             color: #fff;
             border: 1px solid rgba(255, 255, 255, 0.2);
             backdrop-filter: blur(10px);
             text-shadow: 0 1px 2px rgba(0,0,0,0.8);
        }
    </style>
</head>
<body class="text-center">
    
<main class="form-signin w-100">
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        
        <img class="mb-3" src="{{ asset('images/uns-campus-removebg.png') }}" alt="Logo UNS" width="80" height="auto"> 
        <h1 class="h3 mb-1 fw-bold">LUPA PASSWORD?</h1>
        <p class="text-muted mb-4">Masukkan Email Anda untuk menerima tautan reset password.</p>

        {{-- STATUS MESSAGE (Link telah terkirim) --}}
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{-- INPUT EMAIL --}}
        <div class="form-floating mb-4">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autofocus>
            <label for="floatingEmail">Email</label>
        </div>
        
        {{-- TOMBOL SUBMIT --}}
        <button class="btn btn-lg btn-primary shadow-lg fw-bold w-100 mb-5" type="submit">
            KIRIM LINK RESET PASSWORD
        </button>

        {{-- LINK KEMBALI KE LOGIN --}}
        <div class="text-center mt-3">
            <a class="text-decoration-none text-link fw-bold" href="{{ route('login') }}">
                &larr; Kembali ke Halaman Login
            </a>
        </div>

    </form>
</main>

{{-- PENTING: COPYRIGHT DIPINDAHKAN KELUAR CARD --}}
<p class="footer-copyright">
    &copy; 2025 Universitas Sebelas Maret
</p>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4j5L4y5Q6l5M5I5D5C5M5W5F5K5L5U5T5R5P5O5N5A5B5C5D5E5F5G5H5J5K5L5M5N5O5P5Q5R5S5T5U5V5W5X5Y5Z5a5b5c5d5e5f5g5h5i5j5k5l5m5n5o5p5q5r5s5t5u5v5w5x5y5z" crossorigin="anonymous"></script>

</body>
</html>