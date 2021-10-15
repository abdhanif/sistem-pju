<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 text-info font-weight-bold">KARYAWAN / DATA KARYAWAN</h5>
        </div>

        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div class="row col-md-4 text-right">
                        <form action="<?= base_url('C_karyawan/search'); ?>" method="post">
                            <div class=" input-group mb">
                                <input type="text" class="form-control" placeholder="Keyword..." name="keyword"
                                    autocomplete="off" autofocus>
                                <button class="btn btn-primary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col text-right">

                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahkaryawan"></i>
                            Tambah Data</a>
                        <a href="<?= base_url('C_karyawan/cetak') ?>" class="btn btn-success" target="_blank">Export
                            PDF</a>
                    </div>
                </div>
            </div>
            </br>

            <div class="table-responsive">
                <table class="table table-bordered" id="table-datatables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Gender</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($karyawan as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row->nik; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->gender; ?></td>
                            <td><?php echo $row->tgl_lahir; ?></td>
                            <td><?php echo character_limiter($row->alamat, 10); ?></td>
                            <td><?php echo $row->no_tlpn; ?></td>
                            <td><?php echo $row->jabatan; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td><?php echo $row->status_karyawan; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>C_karyawan/edit/<?php echo $row->id_karyawan; ?>"
                                    class="badge badge-warning" data-toggle="modal"
                                    data-target="#updatekaryawan<?php echo $row->id_karyawan; ?>"></i> Edit</a>
                                <a href="<?php echo base_url(); ?>C_karyawan/hapus/<?php echo $row->id_karyawan; ?>"
                                    class="badge badge-danger" data-toggle="modal"
                                    data-target="#delete<?php echo $row->id_karyawan; ?>"></i> Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div> -->
    </div>

</div>
</div>

</div>
</div>
<!-- End of Main Content -->

<!-- modal hapus -->
<?php
foreach ($karyawan as $kr) {
?>
<div class="modal fade" id="delete<?php echo $kr->id_karyawan; ?>" role="dialog" style="display: none;">
    <div class="modal-dialog" style="margin-top: 260.5px;">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5>Anda yakin mau menghapus karyawan <b><?php echo $kr->nama; ?></b> ?</h5>
            </div>
            <form role="form" method="post" id="delete_data"
                action="<?php echo base_url(); ?>C_karyawan/hapus/<?php echo $kr->id_karyawan; ?>">
                <input type="hidden" id="delete_item_id" name="id" value="<?php echo $kr->id_karyawan; ?>">
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