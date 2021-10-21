<!-- modal update -->
<?php
foreach ($deteksi_pju as $dt) {
?>
<div class="example-modal">
    <div id="detail<?php echo $dt->id_deteksi ?>" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="font-weight-bold">DETAIL LAPORAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="font-weight-bold">
                                <label for="inputNama">Nama</label>
                            </div>
                            <input type="text" class="form-control" readonly placeholder="<?php echo $dt->nama; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="font-weight-bold">
                                <label for="inputWA">Whatsapp</label>
                            </div>
                            <input type="text" class="form-control" readonly placeholder="<?php echo $dt->whatsapp; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="font-weight-bold">
                                <label for="inputNama">Kecamatan</label>
                            </div>
                            <input type="text" class="form-control" readonly
                                placeholder="<?php echo $dt->kecamatan; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="font-weight-bold">
                                <label for="inputWA">Kelurahan</label>
                            </div>
                            <input type="text" class="form-control" readonly
                                placeholder="<?php echo $dt->kelurahan; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="font-weight-bold">
                            <label for="laporan">Alamat</label>
                        </div>
                        <textarea type="text" class="form-control" readonly rows="1"
                            placeholder="<?php echo $dt->alamat; ?>"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="font-weight-bold">
                            <label for="laporan">Laporan Anda</label>
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

                    <div class="form-group">
                        <div class="font-weight-bold">
                            <label for="laporan">Gambar</label>
                        </div>
                        <img width="150px" src="<?php echo base_url(); ?>upload_dir/<?php echo $dt->gambar; ?>">
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