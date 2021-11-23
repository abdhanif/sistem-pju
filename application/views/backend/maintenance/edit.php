<!-- modal update -->
<!DOCTYPE HTML>
<html>

<body>
    <?php
    foreach ($maintenance as $mt) {
    ?>
    <div class="example-modal">
        <div id="updatemaintenance<?php echo $mt->ID ?>" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header font-weight-bold">
                        <h5 class="font-weight-bold" style="color: #5777ba;">EDIT DATA MAINTENANCE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="user" method="post" action="<?= base_url('C_maintenance/update') ?>">
                            <input type="hidden" class="form-control" name="ID" value="<?php echo $mt->ID; ?>">

                            <div class="row g-3">
                                <div class="col-md">
                                    <label class="font-weight-bold form-label">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                        value="<?php echo $mt->deskripsi; ?>">
                                    <?= form_error('deskripsi', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button id="nosave" type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Batal</button>
                                <button tye="submit" class="btn btn-primary">Update</button>
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
</body>

</html>