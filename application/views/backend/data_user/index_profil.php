<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold" style="color: #5777ba;">ADMINISTRATOR / DATA USER</h5>
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
                            <th scope="row" class="text-center" width="5%">No</th>
                            <th scope="row" class="text-center">Nama</th>
                            <th scope="row" class="text-center">Email</th>
                            <th scope="row" class="text-center">Hak Akses</th>
                            <th scope="row" class="text-center">Status</th>
                            <th scope="row" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($profile as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <td class="text-center"><?php echo ++$no; ?></td>
                            <td><?php echo $row->user_name; ?></td>
                            <td class="text-center"><?php echo $row->user_email; ?></td>
                            <td class="text-center"><?php echo $row->user_akses; ?></td>
                            <td class="text-center"><?php echo $row->user_status; ?></td>



                            <td class="text-center">
                                <a href="<?= base_url(); ?>C_profile/edit/<?php echo $row->user_id; ?>"
                                    class="badge badge-warning" data-toggle="modal"
                                    data-target="#update<?php echo $row->user_id; ?>"></i>Edit</a>

                                <a href="<?= base_url(); ?>C_profile/hapus/<?php echo $row->user_id; ?>"
                                    class="badge badge-danger" data-toggle="modal"
                                    data-target="#delete<?php echo $row->user_id; ?>"></i>Hapus</a>
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
<?php
foreach ($profile as $prf) {
?>
<div class="modal fade" id="delete<?php echo $prf->user_id; ?>" akses="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5>Anda yakin mau menghapus <b><?php echo $prf->user_name; ?></b> ?</h5>
            </div>
            <form akses="form" method="post" id="delete_data"
                action="<?php echo base_url(); ?>C_profile/hapus/<?php echo $prf->user_id; ?>">
                <input type="hidden" id="delete_item_id" name="id" value="<?php echo $prf->user_id; ?>">
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