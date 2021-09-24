<!-- modal insert -->
<div class="example-modal">
    <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Data Merchant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <form class="user" method="post" action="<?= base_url('C_merchant/tambah') ?>">

                        <div class="col-md">
                            <label class="form-label">Nama Merchant</label>
                            <input type="text" class="form-control" id="name_merchant" name="name_merchant" value="<?= set_value('name_merchant'); ?>" autocomplete="off" autofocus>
                            <?= form_error('name_merchant', ' <small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <!-- Divpider -->
                        <hr class="sidebar-divider">

                        <div class="modal-footer">
                            <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                            <button tye="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal insert close -->