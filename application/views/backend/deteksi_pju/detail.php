<!-- modal update -->
<?php
foreach ($deteksi_pju as $dt) {
?>
<div class="example-modal">
    <div id="detail<?php echo $dt->id_deteksi ?>" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="font-weight-bold" style="color: #5777ba">DETAIL LAPORAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="font-weight-bold">
                                <label for="inputNama">Nama</label>
                            </div>
                            <input type="text" class="form-control" readonly
                                placeholder="<?php echo $dt->user_name; ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <div class="font-weight-bold">
                                <label for="inputWA">No Telephon</label>
                            </div>
                            <input type="text" class="form-control" readonly placeholder="<?php echo $dt->no_tlpn; ?>">
                        </div>

                        <div class="form-group col-md-3">
                            <div class="font-weight-bold">
                                <label for="inputNama">Kode PJU</label>
                            </div>
                            <input type="text" class="form-control" readonly
                                placeholder="<?php echo $dt->kode_pju_box; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="font-weight-bold">
                            <label for="laporan">Alamat Kerusakan</label>
                        </div>
                        <textarea type="text" class="form-control" readonly rows="1"
                            placeholder="<?php echo $dt->alamat; ?>"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="font-weight-bold">
                            <label for="laporan">Laporan</label>
                        </div>
                        <textarea type="text" class="form-control" readonly rows="3"
                            placeholder="<?php echo $dt->laporan; ?>"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="font-weight-bold">
                                <label for="inputNama">Status</label>
                            </div>
                            <input type="text" class="form-control" readonly
                                placeholder="<?php echo $dt->verifikasi; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="font-weight-bold">
                                <label for="inputWA">Dibuat</label>
                            </div>
                            <input type="text" class="form-control" readonly
                                placeholder="<?php echo $dt->create_at; ?>">
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <img width="150px" src="<?php echo base_url(); ?>upload_dir/<?php echo $dt->gambar; ?>">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
}
?>