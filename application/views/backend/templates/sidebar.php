<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="accordion navbar-nav sidebar sidebar-dark" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIM PJU</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administrator
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if ($this->session->userdata('access') == 'Administrator') { ?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengelolaan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_deteksi') ?>">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Pengaduan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_kelompok') ?>">
                    <i class="fas fa-fw fa-layer-group"></i>
                    <span>Data Kelompok</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_data_pju') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data PJU</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_jadwal') ?>">
                    <i class="far fa-fw fa-calendar-alt"></i>
                    <span>Maintenance</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_jadwal') ?>">
                    <i class="far fa-fw fa-calendar-alt"></i>
                    <span>Jadwal Pengerjaan</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_rute') ?>">
                    <i class="fas fa-fw fa-map-marked-alt"></i>
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


            <?php }
            if ($this->session->userdata('access') == 'Teknisi') { ?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengelolaan
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_kelompok') ?>">
                    <i class="fas fa-fw fa-layer-group"></i>
                    <span>Data Kelompok</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_data_pju') ?>">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data PJU</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_jadwal') ?>">
                    <i class="far fa-fw fa-calendar-alt"></i>
                    <span>Jadwal Pengerjaan</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_rute') ?>">
                    <i class="fas fa-fw fa-map-marked-alt"></i>
                    <span>Cari Rute</span></a>
            </li>

            <?php }; ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->