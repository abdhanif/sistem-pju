<!-- modal update -->
<?php
foreach ($karyawan as $kry) {
?>
    <div class="example-modal">
        <div id="updatekaryawan<?php echo $kry->id_karyawan; ?>" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="font-weight-bold">EDIT DATA KARYAWAN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form class="user" method="post" action="<?= base_url('C_karyawan/update') ?>">
                            <input type="hidden" class="form-control" id="id_karyawan" name="id_karyawan" value="<?php echo $kry->id_karyawan; ?>">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="font-weight-bold form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $kry->nik; ?>">
                                    <?= form_error('nik', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="col-md-6">
                                    <label class="font-weight-bold form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $kry->nama; ?>">
                                    <?= form_error('nama', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <br>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Jenis Kelamin</label>
                                    <select class="form-control" id="gender" name="gender" value="<?php echo set_value('gender'); ?>">
                                        <option value="Laki-laki" <?php if ($kry->gender == "Laki-laki") {
                                                                        echo "selected";
                                                                    } ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($kry->gender == "Perempuan") {
                                                                        echo "selected";
                                                                    } ?>>Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="font-weight-bold form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $kry->tgl_lahir; ?>">
                                    <?= form_error('tgl_lahir', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <br>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="font-weight-bold form-label">No.Telepon</label>
                                    <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" value="<?php echo $kry->no_tlpn; ?>">
                                    <?= form_error('no_tlpn', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="col-md-6">
                                    <label class="font-weight-bold form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $kry->email; ?>">
                                    <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <br>

                            <div class="row g-3">
                                <div class="col-md">
                                    <label class="font-weight-bold form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $kry->alamat; ?>">
                                    <?= form_error('alamat', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <br>

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="font-weight-bold form-label">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $kry->jabatan; ?>">
                                    <?= form_error('jabatan', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="col-md-6">
                                    <label class="font-weight-bold">Status Donatur</label>
                                    <select class="form-control" id="status_karyawan" name="status_karyawan" value="<?php echo set_value('status_karyawan'); ?>">
                                        <option value="Tetap" <?php if ($kry->status_karyawan == "Tetap") {
                                                                    echo "selected";
                                                                } ?>>Tetap</option>
                                        <option value="Kontrak" <?php if ($kry->status_karyawan == "Kontrak") {
                                                                    echo "selected";
                                                                } ?>>Kontrak</option>
                                        <option value="Resign" <?php if ($kry->status_karyawan == "Resign") {
                                                                    echo "selected";
                                                                } ?>>Resign</option>

                                    </select>
                                </div>
                            </div>
                    </div>

                    </br>

                    <div class="modal-footer">
                        <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                        <button tye="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php
}
?>
<!-- modal update close -->