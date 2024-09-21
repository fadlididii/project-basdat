<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('karyawan.dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard Karyawan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Profil -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('karyawan.profil') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span>
        </a>
    </li>

    <!-- Nav Item - Absensi -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.absensi') }}">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Absensi</span>
        </a>
    </li>

    <!-- Nav Item - Pengajuan Cuti -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.pengajuan-cuti') }}">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Pengajuan Cuti</span>
        </a>
    </li>

    <!-- Nav Item - Informasi Gaji -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.gaji') }}">
            <i class="fas fa-fw fa-money-bill-wave"></i>
            <span>Informasi Gaji</span>
        </a>
    </li>

    <!-- Nav Item - Penilaian Kinerja -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('karyawan.penilaian') }}">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Penilaian Kinerja</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
