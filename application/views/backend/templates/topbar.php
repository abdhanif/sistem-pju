<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar topbar mb-4 static-top shadow" style="background: #5777ba;">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">

                        <span
                            class="mr-2 d-none d-lg-inline text-white small"><?php echo $this->session->userdata('name'); ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/') ?>img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>

                        <?php if ($this->session->userdata('access') == 'Administrator') { ?>

                        <a class="dropdown-item" href="<?= base_url('C_Profile') ?>">
                            <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                            Setting
                        </a>

                        <a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>" data-toggle="modal"
                            data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>

                        <?php }
                        if ($this->session->userdata('access') == 'Teknisi') { ?>

                        <a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>" data-toggle="modal"
                            data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>

                        <?php }; ?>

                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->