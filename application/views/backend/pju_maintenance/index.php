<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold" style="color: #5777ba;">PENGELOLAAN / DATA MAINTENANCE PJU</h5>
        </div>
        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div class="row col-md-4 text-right">
                        <form action="<?= base_url('C_pju_maintenance/search'); ?>" method="post">
                            <div class=" input-group mb">
                                <input type="text" class="form-control" placeholder="Keyword..." name="keyword"
                                    autocomplete="off" autofocus>
                                <button class="btn btn-primary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col text-right">

                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahpjumaintenance"></i>
                            Tambah
                            Data</a>

                        <a href="<?= base_url('C_pju_maintenance/cetak') ?>" class="btn btn-success" data-toggle="modal"
                            data-target="#filterpjumaintenance">Export PDF</a>
                    </div>
                </div>
            </div>
            </br>

            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="row" class="text-center" width="5%">No</th>
                            <th scope="row" class="text-center">Kode PJU</th>
                            <th scope="row" class="text-center">Deskripsi Maintenance</th>
                            <th scope="row" class="text-center">Tanggal Terakhir Maintenance</th>
                            <th scope="row" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($pju_maintenance as $row) {
                    ?>

                    <tbody>
                        <tr>
                            <td class="text-center"><?php echo ++$no; ?></td>
                            <td class="text-center"><?php echo $row->kode_pju; ?></td>
                            <td class="text-center"><?php echo $row->deskripsi; ?></td>
                            <td class="text-center"><?php echo $row->tgl_terakhir_maintenance; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url(); ?>C_pju_maintenance/edit/<?php echo $row->ID; ?>"
                                    class="badge badge-warning" data-toggle="modal"
                                    data-target="#updatepjumaintenance<?php echo $row->ID ?>"></i> Edit</a>

                                <a href="<?php echo base_url(); ?>C_pju_maintenance/hapus/<?php echo $row->ID; ?>"
                                    class="badge badge-danger" data-toggle="modal"
                                    data-target="#delete<?php echo $row->ID; ?>"></i> Hapus</a>
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
<!-- End of Main Content -->

<!-- modal hapus -->
<?php
foreach ($pju_maintenance as $pju_mt) {
?>
<div class="modal fade" id="delete<?php echo $pju_mt->ID; ?>" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5>Anda yakin mau menghapus data pju maintenance <b><?php echo $pju_mt->deskripsi; ?></b> ?</h5>
            </div>
            <form role="form" method="post" id="delete_data"
                action="<?php echo base_url(); ?>C_pju_maintenance/hapus/<?php echo $pju_mt->ID; ?>">
                <input type="hidden" id="delete_item_id" name="id" value="<?php echo $pju_mt->ID; ?>">
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