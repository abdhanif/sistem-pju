<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 text-info font-weight-bold">PENGELOLAAN / DATA KELOMPOK</h5>
        </div>

        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div class="row col-md-4 text-right">
                        <form action="<?= base_url('C_kelompok/search'); ?>" method="post">
                            <div class=" input-group mb">
                                <input type="text" class="form-control" placeholder="Keyword..." name="keyword"
                                    autocomplete="off" autofocus>
                                <button class="btn btn-primary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <?php if ($this->session->userdata('access') == 'Administrator') { ?>
                    <div class="col text-right">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser"></i> Tambah
                            Data</a>
                        <a href="<?= base_url('C_kelompok/cetak') ?>" class="btn btn-success" target="_blank">Export
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
                            <th width="5%">No</th>
                            <th>Kode Kelompok</th>
                            <th>Nama Kelompok</th>
                            <?php if ($this->session->userdata('access') == 'Administrator') { ?>
                            <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($kelompok as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->kode_kelompok; ?></td>
                            <td><?php echo $row->nama_kelompok; ?></td>
                            <?php if ($this->session->userdata('access') == 'Administrator') { ?>
                            <td>
                                <a href="<?= base_url(); ?>C_kelompok/edit/<?php echo $row->id_kelompok; ?>"
                                    class="badge badge-warning" data-toggle="modal"
                                    data-target="#update<?php echo $row->id_kelompok; ?>"></i> Edit</a>
                                <a href="<?php echo base_url(); ?>C_kelompok/hapus/<?php echo $row->id_kelompok; ?>"
                                    class="badge badge-danger" data-toggle="modal"
                                    data-target="#delete<?php echo $row->id_kelompok; ?>"></i> Hapus</a>
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
</div>
<!-- End of Main Content -->

<!-- modal hapus -->
<?php
foreach ($kelompok as $klpk) {
?>
<div class="modal fade" id="delete<?php echo $klpk->id_kelompok; ?>" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5>Anda yakin mau menghapus kelompok <b><?php echo $klpk->nama_kelompok; ?></b> ?</h5>
            </div>
            <form role="form" method="post" id="delete_data"
                action="<?php echo base_url(); ?>C_kelompok/hapus/<?php echo $klpk->id_kelompok; ?>">
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
?>
</div>
<!-- end modal hapus -->