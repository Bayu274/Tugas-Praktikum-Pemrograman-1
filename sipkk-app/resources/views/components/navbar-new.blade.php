  <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-graduation-cap"></i> 
                </div>
                <div class="sidebar-brand-text mx-3">SIPKK</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.kegiatan.index') }}">
                        <i class="fas fa-fw fa-list-alt"></i>
                        <span>Daftar Kegiatan</span></a>
                </li> 
            @endif

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

</ul>

