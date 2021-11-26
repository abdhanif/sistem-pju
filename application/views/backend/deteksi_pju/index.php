<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold" style="color: #5777ba;">PENGELOLAAN / DETEKSI PJU</h5>
        </div>

        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div class="col text-right">
                        <a href="<?= base_url('C_deteksi/cetak') ?>" class="btn btn-success" target="_blank">Export
                            PDF</a>
                    </div>
                </div>
            </div>
            </br>

            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row" class="text-center" style="vertical-align: middle;" width="5%">No</th>
                            <th scope="row" class="text-center" style="vertical-align: middle;">Nama Pengadu</th>
                            <th scope="row" class="text-center" style="vertical-align: middle;">PJU Diadukan</th>
                            <th scope="row" class="text-center" style="vertical-align: middle;">Laporan</th>
                            <th scope="row" class="text-center" style="vertical-align: middle;">Status</th>
                            <th scope="row" class="text-center" style="vertical-align: middle;">Aksi</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($deteksi_pju as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;"><?php echo ++$no; ?></td>
                            <td><?php echo $row->user_name; ?></td>
                            <td class="text-center"><?php echo $row->kode_pju_box; ?></td>
                            <td><?php echo character_limiter($row->laporan, 20); ?></td>
                            <td class="font-weight-bold text-center"><?php echo $row->verifikasi; ?></td>

                            <td class="text-center">
                                <?php if ($row->verifikasi != "DISETUJUI") { ?>
                                <a href="<?= base_url(); ?>C_deteksi/edit/<?php echo $row->id_deteksi; ?>"
                                    class="badge badge-secondary" data-toggle="modal"
                                    data-target="#update<?php echo $row->id_deteksi; ?>"></i> Verifikasi</a>
                                <?php } ?>

                                <a href="<?= base_url(); ?>C_deteksi/detail/<?php echo $row->id_deteksi; ?>"
                                    class="badge badge-info" data-toggle="modal"
                                    data-target="#detail<?php echo $row->id_deteksi; ?>"></i> Detail</a>

                                <!-- <a href="<?php echo base_url(); ?>C_kelompok/hapus/<?php echo $row->id_kelompok; ?>" class="badge badge-danger" data-toggle="modal" data-target="#delete<?php echo $row->id_kelompok; ?>"></i> Hapus</a> -->
                            </td>
                        </tr>
                    </tbody>

                    <?php
                    }
                    ?>
                </table>
                
                <?php $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->

<!-- modal hapus -->
<!-- <?php
        foreach ($kelompok as $klpk) {
        ?>
    <div class="modal fade" id="delete<?php echo $klpk->id_kelompok; ?>" role="dialog" style="display: none;">
        <div class="modal-dialog" style="margin-top: 260.5px;">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5>Anda yakin mau menghapus kelompok <b><?php echo $klpk->nama_kelompok; ?></b> ?</h5>
                </div>
                <form role="form" method="post" id="delete_data" action="<?php echo base_url(); ?>C_kelompok/hapus/<?php echo $klpk->id_kelompok; ?>">
                    <input type="hidden" id="delete_item_id" name="id" value="<?php echo $klpk->id_kelompok; ?>">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
        }
?> -->
<!-- end modal hapus -->