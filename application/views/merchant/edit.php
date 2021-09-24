<!-- modal update -->
<?php
foreach ($merchant as $mc) {
?>
    <div class="example-modal">
        <div id="update<?php echo $mc->id_merchant; ?>" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Data Merchant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="user" method="post" action="<?= base_url('C_merchant/update') ?>">
                            <input type="hidden" class="form-control" name="id_merchant" value="<?php echo $mc->id_merchant; ?>">
                            <div class="row g-3">
                                <div class="col-md">
                                    <label class="form-label">Nama Merchant</label>
                                    <input type="text" class="form-control" id="name_merchant" name="name_merchant" value="<?php echo $mc->name_merchant; ?>">
                                    <?= form_error('name_merchant', ' <small class="text-danger pl-3">', '</small>'); ?>
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