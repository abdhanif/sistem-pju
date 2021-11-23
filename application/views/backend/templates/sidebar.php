<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="accordion navbar-nav sidebar sidebar-dark" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-laptop-house"></i>
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

            <?php if ($this->session->userdata('access') == 'Administrator') { ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Management
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('C_deteksi') ?>">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Cek Pengaduan</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#maintenance" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Maintenance</span>
                </a>
                <div id="maintenance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded" style="background-color: #f7f7f7;">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="nav-link" href="#">Data Maintenance</a>
                        <a class="nav-link" href="<?= base_url('C_mst_mt') ?>">Jenis Maintenance</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#datapju" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>PJU</span>
                </a>
                <div id="datapju" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded" style="background-color: #f7f7f7;">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="nav-link" href="<?= base_url('C_kelompok') ?>">Data Kelompok</a>
                        <a class="nav-link" href="<?= base_url('C_data_pju') ?>">Data PJU</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#jadwal" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Penjadwalan</span>
                </a>
                <div id="jadwal" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded" style="background-color: #f7f7f7;">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="nav-link" href="<?= base_url('C_jadwal') ?>">Jadwal Pengerjaan</a>
                        <a class="nav-link" href="<?= base_url('C_rute') ?>">Cari Rute</a>
                    </div>
                </div>
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

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengelolaan
            </div>

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