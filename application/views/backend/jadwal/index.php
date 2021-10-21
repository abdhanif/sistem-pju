<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 text-info font-weight-bold">PENGELOLAAN / JADWAL</h5>
        </div>
        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div class="row col-md-4 text-right">
                        <form action="<?= base_url('C_jadwal/search'); ?>" method="post">
                            <div class=" input-group mb">
                                <input type="text" class="form-control" placeholder="Keyword..." name="keyword"
                                    autocomplete="off" autofocus>
                                <button class="btn btn-primary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col text-right">
                        <?php if ($this->session->userdata('access') == 'Administrator') { ?>

                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahjadwal"></i> Tambah
                            Data</a>

                        <?php } ?>

                        <a href="<?= base_url('C_jadwal/cetak') ?>" class="btn btn-success" data-toggle="modal"
                            data-target="#filterjadwal">Export PDF</a>
                    </div>
                </div>
            </div>
            </br>

            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Kode Jadwal</th>
                            <th>Kelompok</th>
                            <th>Kode PJU</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                            <?php if ($this->session->userdata('access') == 'Administrator') { ?>
                            <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>


                    <?php
                    $no = 1;
                    foreach ($jadwal as $row) {
                    ?>

                    <tbody>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->kode_jadwal; ?></td>
                            <td><?php echo $row->nama_kelompok; ?></td>
                            <td><?php echo $row->kode_pju; ?></td>
                            <td class="font-weight-bold"><?php echo $row->status; ?></td>
                            <td><?php echo $row->create_at; ?></td>
                            <?php if ($this->session->userdata('access') == 'Administrator') { ?>
                            <td>
                                <a href="<?= base_url(); ?>C_jadwal/edit/<?php echo $row->id_jadwal; ?>"
                                    class="badge badge-warning" data-toggle="modal"
                                    data-target="#updatejadwal<?php echo $row->id_jadwal ?>"></i> Edit</a>
                                <a href="<?php echo base_url(); ?>C_jadwal/hapus/<?php echo $row->id_jadwal; ?>"
                                    class="badge badge-danger" data-toggle="modal"
                                    data-target="#delete<?php echo $row->id_jadwal; ?>"></i> Hapus</a>
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
<!-- End of Main Content -->

<!-- modal hapus -->
<?php
foreach ($jadwal as $jdwl) {
?>
<div class="modal fade" id="delete<?php echo $jdwl->id_jadwal; ?>" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5>Anda yakin mau menghapus jadwal dengan kode <b><?php echo $jdwl->id_jadwal; ?></b> ?</h5>
            </div>
            <form role="form" method="post" id="delete_data"
                action="<?php echo base_url(); ?>C_jadwal/hapus/<?php echo $jdwl->id_jadwal; ?>">
                <input type="hidden" id="delete_item_id" name="id" value="<?php echo $jdwl->id_jadwal; ?>">
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