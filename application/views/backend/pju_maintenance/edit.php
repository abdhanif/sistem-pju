<!-- modal update -->
<!DOCTYPE HTML>
<html>
<body>
    <?php
    foreach ($pju_maintenance as $mt) {
    ?>
    <div class="example-modal">
        <div id="updatepjumaintenance<?php echo $mt->ID ?>" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header font-weight-bold">
                        <h5 class="font-weight-bold">EDIT DATA MAINTENANCE PJU</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="user" method="post" action="<?= base_url('C_pju_maintenance/update') ?>">
                            <input type="hidden" class="form-control" name="ID"
                                value="<?php echo $mt->ID; ?>">
                            <div class="row g-3">
                                <div class="col-md">
                                    <label class="font-weight-bold form-label">Kode PJU </label>
                                    <input type="text" class="form-control" id="kodepju" name="kodepju"
                                        value="<?php echo $mt->kode_pju; ?>" readyonly>
                                </div>
                            </div>

                            <select class="form-control" id="maintenance" name="maintenance"
                                value="<?php echo $data_pju->kode_kelompok; ?>">
                                <option value="">-Pilih Satu-</option>
                                <?php
                                foreach ($data_kelompok as $d) {
                                ?>
                                <?php if ($d->kode_kelompok == $data_pju->kode_kelompok) : ?>

                                <option value="<?php echo $d->kode_kelompok ?>" selected><?php echo $d->nama_kelompok ?>
                                </option>

                                <?php else : ?>
                                <option value="<?php echo $d->kode_kelompok ?>"><?php echo $d->nama_kelompok ?></option>
                                <?php endif; ?>
                                <?php
                                }
                                ?>
                            </select>

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