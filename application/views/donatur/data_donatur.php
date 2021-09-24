<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-dark">Data Donatur</h3>
        </div>
        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div class="row col-md-4 text-right">
                        <form action="<?= base_url('C_donatur/search'); ?>" method="post">
                            <div class=" input-group mb">
                                <input type="text" class="form-control" placeholder="Keyword..." name="keyword" autocomplete="off" autofocus>
                                <button class="btn btn-primary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col text-right">
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahdonatur"></i> Tambah Data</a>
                    </div>
                </div>
            </div>

            </br>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>No.KTP</th>
                            <th>Gender</th>
                            <th>Tgl.Lahir</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Hobi</th>
                            <th>Status</th>
                            <th>Pekerjaan</th>
                            <th>Email</th>
                            <th>Status Donatur</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($donatur as $row) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->nik; ?></td>
                                <td><?php echo $row->gender; ?></td>
                                <td><?php echo $row->tgl_lahir; ?></td>
                                <td><?php echo character_limiter($row->alamat, 14); ?></td>
                                <td><?php echo $row->no_tlpn; ?></td>
                                <td><?php echo $row->hobi; ?></td>
                                <td><?php echo $row->status; ?></td>
                                <td><?php echo $row->pekerjaan; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->status_donatur; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>C_donatur/hapus/<?php echo $row->id_donatur; ?>" class="badge badge-warning" data-toggle="modal" data-target="#updatedonatur<?php echo $row->id_donatur; ?>"></i> Edit</a>
                                    <a href="<?php echo base_url(); ?>C_donatur/hapus/<?php echo $row->id_donatur; ?>" class="badge badge-danger" data-toggle="modal" data-target="#deletedonatur<?php echo $row->id_donatur; ?>"></i> Hapus</a>
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
<!-- End of Main Content -->

<!-- modal hapus -->
<?php
foreach ($donatur as $dr) {
?>
    <div class="modal fade" id="deletedonatur<?php echo $dr->id_donatur; ?>" role="dialog" style="display: none;">
        <div class="modal-dialog" style="margin-top: 260.5px;">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5>Anda yakin mau menghapus <b><?php echo $dr->name; ?></b> ?</h5>
                </div>
                <form role="form" method="post" id="delete_data" action="<?php echo base_url(); ?>C_donatur/hapus/<?php echo $dr->id_donatur; ?>">
                    <input type="hidden" id="delete_item_id" name="id" value="<?php echo $dr->id_donatur; ?>">
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