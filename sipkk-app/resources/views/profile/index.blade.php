<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profil Saya - SIPKK UNS</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <style>
        :root {
            --uns-primary: #004d40; /* Hijau Tua UNS */
            --uns-accent: #fcd34d; /* Kuning/Emas UNS */
            --primary: var(--uns-primary); /* Override primary color for SB Admin */
        }
        .sidebar, .btn-primary, .text-primary {
            background-color: var(--uns-primary) !important;
            border-color: var(--uns-primary) !important;
        }
        .btn-primary:hover {
            background-color: #003e33 !important;
            border-color: #003e33 !important;
        }
        .text-success {
            color: var(--uns-primary) !important; 
        }
        .btn-warning {
            background-color: var(--uns-accent) !important;
            border-color: var(--uns-accent) !important;
            color: #333; /* Teks gelap */
            font-weight: 700;
        }
        .btn-warning:hover {
            background-color: #ffc73b !important; 
        }
        .card-header {
            border-bottom: 3px solid var(--uns-primary);
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIPKK UNS</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Menu
            </div>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('riwayat.pendaftaran.index') }}"> 
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Riwayat Pendaftaran</span>
                </a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('profile.index') }}"> 
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil Saya</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            @if (auth()->user()->role == 'admin')
            <div class="sidebar-heading">
                Admin Panel
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.kegiatan.index') }}"> 
                    <i class="fas fa-fw fa-calendar-check"></i>
                    <span>Manajemen Kegiatan</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pendaftar.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pendaftar</span>
                </a>
            </li>
            @endif
            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ str_replace(' User', '', auth()->user()->name) }}</span>
                                <i class="fas fa-user-circle fa-2x"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
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
                        <h1 class="h3 mb-0 text-gray-800">Profil Saya</h1>
                    </div>
                    
                    <p class="lead">Selamat Datang, {{ str_replace(' User', '', $user->name) }}. Kelola informasi akun Anda.</p>
                    <hr class="my-4">
                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-success">Informasi Dasar Akun</h6>
                        </div>
                        <div class="card-body">
                            
                            <div class="row mb-3">
                                <div class="col-md-3"><strong>Nama Lengkap:</strong></div>
                                <div class="col-md-9">{{ $user->name }}</div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-3"><strong>Email:</strong></div>
                                <div class="col-md-9">{{ $user->email }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3"><strong>Peran (Role):</strong></div>
                                <div class="col-md-9 text-capitalize">{{ $user->role }}</div>
                            </div>
                            
                            @if ($user->created_at)
                            <div class="row mb-3">
                                <div class="col-md-3"><strong>Akun Dibuat:</strong></div>
                                <div class="col-md-9">{{ $user->created_at->format('d F Y \j\a\m H:i') }}</div>
                            </div>
                            @endif

                            <hr>
                            {{-- Tombol Edit Profil mengarah ke route edit bawaan --}}
                            <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit fa-sm"></i> Ubah Data Profil
                            </a>

                        </div>
                    </div>

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