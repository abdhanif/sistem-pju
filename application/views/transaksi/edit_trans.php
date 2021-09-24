<!-- modal update -->
<?php
foreach ($transaksi as $trsk) {
?>
    <div class="example-modal">
        <div id="updatetransaksi<?php echo $trsk->id_transaksi; ?>" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Data Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form class="user" method="post" action="<?= base_url('C_transaksi/update/') ?><?php echo $trsk->id_transaksi; ?>">
                            <input type="hidden" class="form-control" name="id_transaksi" value="<?php echo $trsk->id_transaksi; ?>">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Nama Donatur</label>
                                    <select class="form-control" id="id_donatur" name="id_donatur" value="<?php echo $trsk->id_donatur; ?>">
                                        <?php
                                        foreach ($donatur as $d) {
                                        ?>
                                            <?php if ($d->id_donatur == $trsk->id_donatur) : ?>

                                                <option value="<?php echo $d->id_donatur ?>" selected><?php echo $d->name ?></option>

                                            <?php else : ?>
                                                <option value="<?php echo $d->id_donatur ?>"><?php echo $d->name ?></option>
                                            <?php endif; ?>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="exampleFormControlSelect1">Name Merchant</label>
                                    <select class="form-control" id="id_merchant" name="id_merchant">
                                        <?php
                                        $merchant;
                                        foreach ($merchant as $m) {
                                        ?>
                                            <?php if ($m->id_merchant == $trsk->id_merchant) : ?>
                                                <option value="<?php echo $m->id_merchant ?>" selected><?php echo $m->name_merchant ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $m->id_merchant ?>"><?php echo $m->name_merchant ?></option>
                                            <?php endif; ?>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            </br>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nominal</label>
                                    <input type="text" class="form-control" id="nominal" name="nominal" value="<?php echo $trsk->nominal; ?>">
                                    <?= form_error('nominal', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Payment Gateway</label>
                                    <input type="text" class="form-control" id="payment_gateway" name="payment_gateway" value="<?php echo $trsk->payment_gateway; ?>">
                                    <?= form_error('payment_gateway', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            </br>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Transaksi</label>
                                    <input type="text" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="<?php echo $trsk->tanggal_transaksi; ?>">
                                    <?= form_error('tanggal_transaksi', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jenis transaksi</label>
                                    <input type="text" class="form-control" id="jenis_transaksi" name="jenis_transaksi" value="<?php echo $trsk->jenis_transaksi; ?>">
                                    <?= form_error('jenis_transaksi', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            </br>

                            <div class="row g-3">
                                <div class="col-md">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $trsk->keterangan; ?>">
                                    <?= form_error('keterangan', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            </br>

                            <div class="modal-footer">
                                <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
    </div>
<?php
}
?>
<!-- modal update close -->