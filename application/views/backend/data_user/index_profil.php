<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 text-info font-weight-bold">ADMINISTRATOR / DATA USER</h5>
        </div>

        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div class="row col-md-4 text-right">
                        <!-- <form action="<?= base_url('C_data_pju/search'); ?>" method="post">
                            <div class=" input-group mb">
                                <input type="text" class="form-control" placeholder="Keyword..." name="keyword" autocomplete="off" autofocus>
                                <button class="btn btn-primary" type="submit" name="submit">Search</button>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
            </br>

            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Hak Akses</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($profile as $row) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->role; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>C_profile/edit/<?php echo $row->id; ?>" class="badge badge-warning" data-toggle="modal" data-target="#update<?php echo $row->id; ?>"></i>Edit</a>

                                    <a href="<?= base_url(); ?>C_profile/hapus/<?php echo $row->id; ?>" class="badge badge-danger" data-toggle="modal" data-target="#delete<?php echo $row->id; ?>"></i>Hapus</a>
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
</div>
<!-- End of Main Content -->

<!-- modal hapus -->
<?php
foreach ($profile as $prf) {
?>
    <div class="modal fade" id="delete<?php echo $prf->id; ?>" role="dialog" style="display: none;">
        <div class="modal-dialog" style="margin-top: 260.5px;">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5>Anda yakin mau menghapus <b><?php echo $prf->name; ?></b> ?</h5>
                </div>
                <form role="form" method="post" id="delete_data" action="<?php echo base_url(); ?>C_profile/hapus/<?php echo $prf->id; ?>">
                    <input type="hidden" id="delete_item_id" name="id" value="<?php echo $prf->id; ?>">
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