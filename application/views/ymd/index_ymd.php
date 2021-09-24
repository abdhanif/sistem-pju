<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-dark">Data YMD</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Treshold</th>
                            <th>Recency</th>
                            <th>Frequency</th>
                            <th>Monetary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0,66</td>
                            <td><?php echo $rb->selisih; ?></td>
                            <td><?php echo $fb->total; ?></td>
                            <td><?php echo $mb->jumlah; ?></td>

                        </tr>
                        <tr>
                            <td>0,33</td>
                            <td><?php echo $ra->selisih; ?></td>
                            <td><?php echo $fa->total; ?></td>
                            <td><?php echo $ma->jumlah; ?></td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Transaksi Terakhir</th>
                            <th>Selisih Tgl</th>
                            <th>Banyak Donasi (x)</th>
                            <th>Nominal</th>
                            <th>R</th>
                            <th>F</th>
                            <th>M</th>
                            <th>LPD</th>
                            <th>CLD</th>

                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($ymd as $row) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->terakhir; ?></td>
                                <td><?php echo $row->selisih; ?></td>
                                <td><?php echo $row->total; ?></td>
                                <td><?php echo $row->jumlah; ?></td>
                                <td>
                                    <?php $R = 0;
                                    if ($row->selisih <= $ra->selisih) {
                                        echo $R = 3;
                                    } else if ($row->selisih <= $ra->selisih && $row->selisih >= $rb->selisih) {
                                        echo $R = 2;
                                    } else {
                                        echo $R = 1;
                                    };
                                    ?>
                                </td>
                                <td>
                                    <?php $F = 0;
                                    if ($row->total <= $fa->total) {
                                        echo $F = 1;
                                    } else if ($row->total <= $fa->total && $row->total >= $fb->total) {
                                        echo $F = 2;
                                    } else {
                                        echo $F = 3;
                                    };
                                    ?>
                                </td>
                                <td>
                                    <?php $M = 0;
                                    if ($row->jumlah <= $ma->jumlah) {
                                        echo $M = 1;
                                    } else if ($row->jumlah <= $ma->jumlah && $row->jumlah >= $mb->jumlah) {
                                        echo $M = 2;
                                    } else {
                                        echo $M = 3;
                                    };
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($R == 3 && $F == 3) {
                                        echo "Loyal";
                                    } else if ($R == 3 && $F == 2) {
                                        echo "Potensial";
                                    } else if ($R == 3 && $F == 1) {
                                        echo "Baru";
                                    } else if ($R == 2 && $F == 3) {
                                        echo "Butuh Perhatian";
                                    } else if ($R == 2 && $F == 2) {
                                        echo "Potential";
                                    } else if ($R == 2 && $F == 1) {
                                        echo "Butuh Perhatian";
                                    } else if ($R == 1 && $F == 3) {
                                        echo "Hilang";
                                    } else if ($R == 1 && $F == 2) {
                                        echo "Hilang";
                                    } else if ($R == 1 && $F == 1) {
                                        echo "Hilang";
                                    } else {
                                        echo "Error";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($F == 3 && $M == 3) {
                                        echo "Sangat Loyal";
                                    } else if ($F == 3 && $M == 2) {
                                        echo "Sangat Bagus";
                                    } else if ($F == 3 && $M == 1) {
                                        echo "Sangat Baik";
                                    } else if ($F == 2 && $M == 3) {
                                        echo "Sangat Bagus";
                                    } else if ($F == 2 && $M == 2) {
                                        echo "Sangat Baik";
                                    } else if ($F == 2 && $M == 1) {
                                        echo "Baik";
                                    } else if ($F == 1 && $M == 3) {
                                        echo "Sangat Baik";
                                    } else if ($F == 1 && $M == 2) {
                                        echo "Baik";
                                    } else if ($F == 1 && $M == 1) {
                                        echo "Baru";
                                    } else {
                                        echo "Error";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </tbody>

                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>