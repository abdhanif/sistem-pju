<!-- modal update -->
<?php
foreach ($donatur as $dnr) {
?>
    <div class="example-modal">
        <div id="updatedonatur<?php echo $dnr->id_donatur; ?>" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Data Donatur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form class="user" method="post" action="<?= base_url('C_donatur/update') ?>">
                            <input type="hidden" class="form-control" id="id_donatur" name="id_donatur" value="<?php echo $dnr->id_donatur; ?>">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $dnr->nik; ?>">
                                    <?= form_error('nik', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $dnr->name; ?>">
                                    <?= form_error('name', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select class="form-control" id="gender" name="gender" value="<?php echo set_value('gender'); ?>">
                                        <option value="Laki-laki" <?php if ($dnr->gender == "Laki-laki") {
                                                                        echo "selected";
                                                                    } ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($dnr->gender == "Perempuan") {
                                                                        echo "selected";
                                                                    } ?>>Perempuan</option>

                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo $dnr->tgl_lahir; ?>">
                                    <?= form_error('tgl_lahir', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $dnr->alamat; ?>">
                                    <?= form_error('alamat', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">No.Telephon</label>
                                    <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" value="<?php echo $dnr->no_tlpn; ?>">
                                    <?= form_error('no_tlpn', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Hobi</label>
                                    <input type="text" class="form-control" id="hobi" name="hobi" value="<?php echo $dnr->hobi; ?>">
                                    <?= form_error('hobi', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $dnr->status; ?>">
                                    <?= form_error('status', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $dnr->pekerjaan; ?>">
                                    <?= form_error('pekerjaan', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $dnr->email; ?>">
                                    <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Status Donatur</label>
                                    <select class="form-control" id="status_donatur" name="status_donatur" value="<?php echo set_value('status_donatur'); ?>">
                                        <option value="Aktif" <?php if ($dnr->status_donatur == "Aktif") {
                                                                    echo "selected";
                                                                } ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?php if ($dnr->status_donatur == "Tidak Aktif") {
                                                                        echo "selected";
                                                                    } ?>>Tidak Aktif</option>

                                    </select>
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