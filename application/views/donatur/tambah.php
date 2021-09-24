<!-- modal insert -->
<div class="example-modal">
    <div id="tambahdonatur" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Data Donatur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <form class="user" method="post" action="<?= base_url('C_donatur/tambah') ?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control form-control" id="nik" name="nik" value="<?= set_value('nik'); ?>">
                                <?= form_error('nik', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control form-control" id="name" name="name" value="<?= set_value('name'); ?>">
                                <?= form_error('name', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        </br>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                <select class="form-control" id="gender" name="gender" value="<?= set_value('gender'); ?>">
                                    <option>-Pilih-</option>
                                    <option value='lakilaki'>Laki-Laki</option>
                                    <option value='perempuan'>Perempuan</option>
                                </select>
                            </div>

                            <div class=" col-md-6">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                                <?= form_error('tgl_lahir', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        </br>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">No.Tlpn</label>
                                <input type="text" class="form-control form-control" id="no_tlpn" name="no_tlpn" value="<?= set_value('no_tlpn'); ?>">
                                <?= form_error('no_tlpn', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        </br>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Hobi</label>
                                <input type="text" class="form-control form-control" id="hobi" name="hobi" value="<?= set_value('hobi'); ?>">
                                <?= form_error('hobi', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control form-control" id="status" name="status" value="<?= set_value('status'); ?>">
                                <?= form_error('status', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        </br>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control form-control" id="pekerjaan" name="pekerjaan" value="<?= set_value('pekerjaan'); ?>">
                                <?= form_error('pekerjaan', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        </br>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Status Donatur</label>
                                <select class="form-control" id="status_donatur" name="status_donatur">
                                    <option>-Pilih-</option>
                                    <option value='aktif'>Aktif</option>
                                    <option value='tidakaktif'>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>

                        </br>

                        <div class="modal-footer">
                            <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                            <button tye="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal insert close -->