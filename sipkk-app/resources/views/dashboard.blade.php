<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beranda - SIPKK UNS</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>


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
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <i class="fas fa-user-circle fa-2x"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                    <div class="container-fluid">

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Hello, {{ auth()->user()->name }}</h1>
                            
                            {{-- @if (auth()->user()->role == 'admin')
                                <a href="{{ route('admin.kegiatan.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm fw-bold">
                                    <i class="fas fa-edit fa-sm text-dark"></i> Kelola Kegiatan
                                </a>  
                            @endif --}}
                        </div>
                        
                        <p class="lead">Selamat Datang di Sistem Informasi Pendaftaran Kegiatan Kampus</p>
                        <hr class="my-4">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Selamat</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (auth()->user()->role == 'user')
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-success">Daftar Kegiatan Kampus</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Kategori</th>
                                                    <th scope="col">Kegiatan</th>
                                                    <th scope="col">Lokasi</th>
                                                    <th scope="col">Kuota</th>
                                                    <th scope="col">tanggal</th>
                                                    <th scope="col">#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($kegiatan as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->kategori->nama_kategori }}</td>
                                                    <td>{{ $item->nama_kegiatan }}</td>
                                                    <td>{{ $item->lokasi }}</td>
                                                    <td>{{ $item->kuota - $item->pendaftaran_count }}</td>
                                                    <td>{{ $item->tanggal_mulai}}</td>
                                                    <td><a class="btn btn-primary btn-sm" href="{{ route('pendaftaran-kegiatan.create', $item->id ) }}" role="button">Daftar</a></td>
                                                </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak Ada Data Kegiatan yang Tersedia</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIPKK 2025</span>
                    </div>
                </div>
            </footer>
            </div>
        </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Siap untuk Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-modal').submit();">Logout</a>
                    <form id="logout-form-modal" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js"></script>
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js"></script>
    
</body>
</html>