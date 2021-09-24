<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="container col-md">
                <div class="row">
                    <div class="row col-md-4 text-right">
                        <h3 class="m-0 font-weight-bold text-dark">Dashboard</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        foreach ($dashboard as $row) {
                        ?>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card border-left-info shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xl font-weight-bold text-info text-uppercase mb-1"><?php echo $row->banyak_dntr; ?> Donatur</div>
                                                <div class="row no-gutters align-items-center">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white d-flex align-items justify-content-between">
                                        <a class="small text-info" href="<?= base_url('C_Transaksi'); ?>">View Details</a>
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card border-left-success shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xl font-weight-bold text-success text-uppercase mb-1"><?php echo $row->banyak_transaksi; ?> Transaksi </div>
                                                <div class="row no-gutters align-items-center">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-chart-line fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white d-flex align-items justify-content-between">
                                        <a class="small text-success" href="<?= base_url('C_Transaksi'); ?>">View Details</a>
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card border-left-danger shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xl font-weight-bold text-danger text-uppercase mb-1"><?php echo $row->total_transaksi ?> Rupiah </div>
                                                <div class="row no-gutters align-items-center">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white d-flex align-items justify-content-between">
                                        <a class="small text-danger" href="<?= base_url('C_Transaksi'); ?>">View Details</a>
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    </br>

                    <div class="row">
                        <?php
                        foreach ($allDonatur as $allD) {
                        ?>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card border-left-info shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xl font-weight-bold text-info text-uppercase mb-1"><?php echo $allD->donatur ?> Donatur </div>
                                                <div class="row no-gutters align-items-center">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white d-flex align-items justify-content-between">
                                        <a class="small text-info">Jumlah Donatur Merchant <?php echo $allD->merchant ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    </br>

                    <div class="row">
                        <?php
                        foreach ($all as $all) {
                        ?>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card border-left-success shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xl font-weight-bold text-success text-uppercase mb-1"><?php echo $all->transaksi ?> Transaksi </div>
                                                <div class="row no-gutters align-items-center">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-chart-line fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white d-flex align-items justify-content-between">
                                        <a class="small text-success"> Jumlah Transaksi Merchant <?php echo $all->name_merchant ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    </br>

                    <div class="row">
                        <?php
                        foreach ($allNominal as $allN) {
                        ?>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card border-left-danger shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xl font-weight-bold text-danger text-uppercase mb-1"><?php echo $allN->nominal ?> Rupiah</div>
                                                <div class="row no-gutters align-items-center">
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-fw fa-coins fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white d-flex align-items justify-content-between">
                                        <a class="small text-danger"> Jumlah Nominal Merchant <?php echo $allN->name_merchant ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
        </br>
    </div>
</div>
</div>