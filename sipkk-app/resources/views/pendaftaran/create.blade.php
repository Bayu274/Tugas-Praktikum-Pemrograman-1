<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pendaftaran - SIPKK UNS</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        :root {
            --uns-primary: #004d40; /* Hijau Tua UNS */
            --uns-accent: #fcd34d; /* Kuning/Emas UNS */
            --primary: var(--uns-primary); /* Override primary color for SB Admin */
        }
        /* Mengubah warna Sidebar dan Tombol menjadi Hijau Tua UNS */
        .sidebar, .btn-primary, .text-primary {
            background-color: var(--uns-primary) !important;
            border-color: var(--uns-primary) !important;
        }
        .btn-primary:hover {
            background-color: #003e33 !important;
            border-color: #003e33 !important;
        }
        /* Mengubah warna Aksen pada teks (seperti header tabel) */
        .text-success {
            color: var(--uns-primary) !important; 
        }
        /* Mengubah warna Aksen Tombol Tambah Kegiatan */
        .btn-warning {
             background-color: var(--uns-accent) !important;
             border-color: var(--uns-accent) !important;
             color: #333; /* Teks gelap */
             font-weight: 700;
        }
        .btn-warning:hover {
            background-color: #ffc73b !important; 
        }
        /* Styling tambahan untuk Card Table */
        .card-header {
            border-bottom: 3px solid var(--uns-primary);
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">
        <x-navbar-new></x-navbar-new>
        <div class="container py-4">

            <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">{{ $kegiatan->nama_kegiatan }}</h1>
                <p class="col-md-8 fs-4">{{ $kegiatan->deskripsi }}</p>
                <span class="badge bg-success text-light p-2">Kategori {{ $kegiatan->kategori->nama_kategori }}</span>
                <span class="badge bg-danger text-light p-2">Kuota {{ $kuota }}</span>
                <span class="badge bg-primary text-light p-2">Lokasi {{ $kegiatan->lokasi }}</span>

            </div>
            </div>

            <div class="container-fluid">
              <form action="{{ route('pendaftaran-kegiatan.save',$kegiatan->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="id_kegiatan" value="{{ $kegiatan->id }}">
                    <label for="exampleFormControlInput1" class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" id="exampleFormControlInput1" placeholder="NIM" required> 
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Nama</label>
                        <input type="text" name='nama' class="form-control" id="exampleFormControlInput1" placeholder="Nama" required>
                    </div>
                    <button class="btn btn-primary btn-xl col-12" type="submit">Daftar</button>
              </form>
            </div>
            {{-- <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                <h2>Change the background</h2>
                <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
                <button class="btn btn-outline-light" type="button">Example button</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Add borders</h2>
                <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
                <button class="btn btn-outline-secondary" type="button">Example button</button>
                </div>
            </div>
            </div> --}}
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js"></script>
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js"></script>
    
</body>
</html>