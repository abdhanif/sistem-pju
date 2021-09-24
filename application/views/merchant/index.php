<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-dark">Data Merchant</h3>
        </div>
        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div class="row col-md-4 text-right">
                        <form action="<?= base_url('C_merchant/search'); ?>" method="post">
                            <div class=" input-group mb">
                                <input type="text" class="form-control" placeholder="Keyword..." name="keyword" autocomplete="off" autofocus>
                                <button class="btn btn-primary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col text-right">

                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser"></i> Tambah Data</a>
                    </div>
                </div>
            </div>
            </br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Merchant</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($merchant as $row) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->name_merchant; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>C_merchant/edit/<?php echo $row->id_merchant; ?>" class="badge badge-warning" data-toggle="modal" data-target="#update<?php echo $row->id_merchant; ?>"></i> edit</a>
                                    <a href="<?php echo base_url(); ?>C_merchant/hapus/<?php echo $row->id_merchant; ?>" class="badge badge-danger" data-toggle="modal" data-target="#delete<?php echo $row->id_merchant; ?>"></i> Hapus</a>
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
foreach ($merchant as $mr) {
?>
    <div class="modal fade" id="delete<?php echo $mr->id_merchant; ?>" role="dialog" style="display: none;">
        <div class="modal-dialog" style="margin-top: 260.5px;">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5>Anda yakin mau menghapus merchant <b><?php echo $mr->name_merchant; ?></b> ?</h5>
                </div>
                <form role="form" method="post" id="delete_data" action="<?php echo base_url(); ?>C_merchant/hapus/<?php echo $mr->id_merchant; ?>">
                    <input type="hidden" id="delete_item_id" name="id" value="<?php echo $mr->id_merchant; ?>">
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