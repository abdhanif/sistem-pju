<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold" style="color: #5777ba;">KARYAWAN / DATA KARYAWAN</h5>
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
                            <th scope="row" class="text-center" width="5%">No</th>
                            <th scope="row" class="text-center">NIK</th>
                            <th scope="row" class="text-center">Nama</th>
                            <th scope="row" class="text-center">Gender</th>
                            <th scope="row" class="text-center">TTL</th>
                            <th scope="row" class="text-center">Alamat</th>
                            <th scope="row" class="text-center">Telepon</th>
                            <th scope="row" class="text-center">Jabatan</th>
                            <th scope="row" class="text-center">Email</th>
                            <th scope="row" class="text-center">Status</th>
                            <th scope="row" class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($data->result() as $row) {
                    ?>
                    <tbody>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $row->nik; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td class="text-center"><?php echo $row->gender; ?></td>
                            <td class="text-center"><?php echo $row->tgl_lahir; ?></td>
                            <td><?php echo character_limiter($row->alamat, 10); ?></td>
                            <td class="text-center"><?php echo $row->no_tlpn; ?></td>
                            <td class="text-center"><?php echo $row->jabatan; ?></td>
                            <td><?php echo $row->email; ?></td>
                            <td class="text-center"><?php echo $row->status_karyawan; ?></td>
                            <td class="text-center">
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
                <div class="row">
                    <div class="col">
                        <!--Tampilkan pagination-->
                        <?php echo $pagination; ?>
                    </div>
                </div>
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