<!-- modal update -->
<?php
foreach ($deteksi_pju as $mc) {
?>
<div class="example-modal">
    <div id="update<?php echo $mc->id_deteksi ?>" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="font-weight-bold" style="color: #5777ba">VERIFIKASI LAPORAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form class="user" method="post" action="<?= base_url('C_deteksi/update') ?>">
                        <input type="hidden" class="form-control" name="id_deteksi"
                            value="<?php echo $mc->id_deteksi; ?>">
                        <div class="row g-3">
                            <div class="col-md text-center">
                                <button id="nosave" type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Batal</button>
                                <button tye="submit" class="btn btn-primary">Verifikasi</button>
                            </div>
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