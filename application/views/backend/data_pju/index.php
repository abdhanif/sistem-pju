<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 text-info font-weight-bold">PENGELOLAAN / DATA PJU</h5>
        </div>

        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div class="row col-md-4 text-right">
                        <form action="<?= base_url('C_data_pju/search'); ?>" method="post">
                            <div class=" input-group mb">
                                <input type="text" class="form-control" placeholder="Keyword..." name="keyword"
                                    autocomplete="off" autofocus>
                                <button class="btn btn-primary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>

                    <?php if ($this->session->userdata('access') == 'Administrator') { ?>

                    <div class="col text-right">
                        <a href="<?= base_url('C_data_pju/tambah'); ?>" class="btn btn-primary"></i> Tambah Data</a>
                        <a href="<?= base_url('C_data_pju/cetak') ?>" class="btn btn-success" target="_blank">Export
                            PDF</a>
                    </div>

                    <?php } ?>

                </div>
            </div>
            </br>

            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" style="vertical-align: middle;" width="5%">No</th>
                            <th class="text-center" style="vertical-align: middle;">Kelompok</th>
                            <th class="text-center" style="vertical-align: middle;">Kode</th>
                            <th class="text-center" style="vertical-align: middle;">Alamat</th>
                            <th class="text-center" style="vertical-align: middle;">Latitude</th>
                            <th class="text-center" style="vertical-align: middle;">Longitude</th>
                            <?php if ($this->session->userdata('access') == 'Administrator') { ?>
                            <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($data_pju as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;"><?php echo $no++; ?></td>
                            <td><?php echo $row->nama_kelompok; ?></td>
                            <td class="text-center"><?php echo $row->kode_pju; ?></td>
                            <td><?php echo $row->alamat_pju; ?></td>
                            <td class="text-center"><?php echo $row->lat; ?></td>
                            <td class="text-center"><?php echo $row->lng; ?></td>

                            <?php if ($this->session->userdata('access') == 'Administrator') { ?>
                            <td class="text-center">
                                <a href="<?php echo base_url(); ?>C_data_pju/edit/<?php echo $row->id_pju; ?>"
                                    class="badge badge-warning">Edit</a>
                                <a href="<?php echo base_url(); ?>C_data_pju/hapus/<?php echo $row->id_pju; ?>"
                                    class="badge badge-danger" data-toggle="modal"
                                    data-target="#delete<?php echo $row->id_pju; ?>"></i> Hapus</a>
                            </td>
                            <?php } ?>
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
</div>
<!-- End of Main Content -->

<!-- modal hapus -->
<?php
foreach ($data_pju as $dt) {
?>
<div class="modal fade" id="delete<?php echo $dt->id_pju; ?>" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5>Anda yakin mau menghapus data PJU dengan nomor meter <b><?php echo $dt->kode_pju; ?></b> ?</h5>
            </div>
            <form role="form" method="post" id="delete_data"
                action="<?php echo base_url(); ?>C_data_pju/hapus/<?php echo $dt->id_pju; ?>">
                <input type="hidden" id="delete_item_id" name="id" value="<?php echo $dt->id_pju; ?>">
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
?>
<!-- end modal hapus -->