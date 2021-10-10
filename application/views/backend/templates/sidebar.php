<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="accordion navbar-nav sidebar sidebar-dark" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SISTEM PJU</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administrator
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_dashboard') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_profile') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengelolaan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_deteksi') ?>">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Deteksi PJU</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_kelompok') ?>">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Data Kelompok</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_data_pju') ?>">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Data PJU</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_jadwal') ?>">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Jadwal Pengerjaan</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_rute') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Cari Rute</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Karyawan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_karyawan') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Karyawan</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="far fa-fw fa-clipboard"></i>
                    <span>Jadwal Pemeliharaan</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->