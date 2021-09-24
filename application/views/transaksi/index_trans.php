<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-dark">Data Transaksi</h3>
        </div>

        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div class="row col-md-4 text-right">
                        <form action="<?= base_url('C_transaksi/search'); ?>" method="post">
                            <div class=" input-group mb">
                                <input type="text" class="form-control" placeholder="Keyword..." name="keyword" autocomplete="off" autofocus>
                                <button class="btn btn-primary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col text-right">
                        <a href="<?= base_url('C_transaksi/tambah') ?>" class="btn btn-primary" data-toggle="modal" data-target="#tambahtransaksi"></i> Tambah Data</a>
                    </div>
                </div>
            </div>
            </br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Donatur</th>
                            <th>Jenis Transaksi</th>
                            <th>Nominal</th>
                            <th>Payment Gateway</th>
                            <th>Nama Merchant</th>
                            <th>Tanggal Transaksi</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($transaksi as $row) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->jenis_transaksi; ?></td>
                                <td><?php echo $row->nominal; ?></td>
                                <td><?php echo $row->payment_gateway; ?></td>
                                <td><?php echo character_limiter($row->name_merchant, 14); ?></td>
                                <td><?php echo $row->tanggal_transaksi; ?></td>
                                <td><?php echo character_limiter($row->keterangan, 14); ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>C_transaksi/edit/<?php echo $row->id_transaksi; ?>" class="badge badge-warning" data-toggle="modal" data-target="#updatetransaksi<?php echo $row->id_transaksi; ?>"></i> Edit</a>

                                    <a href="<?php echo base_url(); ?>C_transaksi/hapus/<?php echo $row->id_transaksi; ?>" class="badge badge-danger" data-toggle="modal" data-target="#deletetransaksi<?php echo $row->id_transaksi; ?>"></i> Hapus</a>
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
<!-- /.container-fluid -->

<!-- modal hapus -->
<?php
foreach ($transaksi as $tr) {
?>
    <div class="modal fade" id="deletetransaksi<?php echo $tr->id_transaksi; ?>" role="dialog" style="display: none;">
        <div class="modal-dialog" style="margin-top: 260.5px;">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5>Anda yakin mau menghapus transaksi <b><?php echo $tr->name; ?></b> ?</h5>
                </div>
                <form role="form" method="post" id="delete_data" action="<?php echo base_url(); ?>C_transaksi/hapus/<?php echo $tr->id_transaksi; ?>">
                    <input type="hidden" id="delete_item_id" name="id" value="<?php echo $tr->id_transaksi; ?>">
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