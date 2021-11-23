<!-- modal update -->
<?php
foreach ($kelompok as $kl) {
?>
<div class="example-modal">
    <div id="update<?php echo $kl->id_kelompok; ?>" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header font-weight-bold">
                    <h5 class="font-weight-bold" style="color: #5777ba">EDIT DATA KELOMPOK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="user" method="post" action="<?= base_url('C_kelompok/update') ?>">
                        <input type="hidden" class="form-control" name="id_kelompok"
                            value="<?php echo $kl->id_kelompok; ?>">

                        <div class="row g-3">
                            <div class="col-md">
                                <label class="font-weight-bold form-label">Nama Kelompok</label>
                                <input type="text" class="form-control" id="nama_kelompok" name="nama_kelompok"
                                    value="<?php echo $kl->nama_kelompok; ?>">
                                <?= form_error('nama_kelompok', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <br>

                        <div class="modal-footer">
                            <button id="nosave" type="button" class="btn btn-danger pull-left"
                                data-dismiss="modal">Batal</button>
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