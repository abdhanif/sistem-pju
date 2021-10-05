<!-- modal insert -->
<div class="example-modal">
    <div id="tambahkaryawan" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="font-weight-bold">TAMBAH DATA KARYAWAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <form class="user" method="post" action="<?= base_url('C_Karyawan/tambah') ?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="font-weight-bold form-label">NIK</label>
                                <input type="text" class="form-control form-control" id="nik" name="nik" value="<?= set_value('nik'); ?>">
                                <?= form_error('nik', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="font-weight-bold form-label">Nama</label>
                                <input type="text" class="form-control form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        </br>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="font-weight-bold">Jenis Kelamin</label>
                                <select class="form-control" id="gender" name="gender" value="<?= set_value('gender'); ?>">
                                    <option>-Pilih-</option>
                                    <option value='Lakilaki'>Laki-Laki</option>
                                    <option value='Perempuan'>Perempuan</option>
                                </select>
                            </div>

                            <div class=" col-md-6">
                                <label class="font-weight-bold form-label">Tanggal Lahir</label>
                                <input type="text" class="form-control form-control" id="tgl_lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                                <?= form_error('tgl_lahir', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        </br>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="font-weight-bold form-label">No.Tlpn</label>
                                <input type="text" class="form-control form-control" id="no_tlpn" name="no_tlpn" value="<?= set_value('no_tlpn'); ?>">
                                <?= form_error('no_tlpn', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="font-weight-bold form-label">Email</label>
                                <input type="text" class="form-control form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        </br>

                        <div class="row">
                            <div class="col-md">
                                <label class="font-weight-bold form-label">Alamat</label>
                                <input type="text" class="form-control form-control" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        </br>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="font-weight-bold form-label">Jabatan</label>
                                <input type="text" class="form-control form-control" id="jabatan" name="jabatan" value="<?= set_value('jabatan'); ?>">
                                <?= form_error('jabatan', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="font-weight-bold form-label">Status</label>
                                <select class="form-control" id="status_karyawan" name="status_karyawan" value="<?= set_value('status_karyawan'); ?>">
                                    <option>-Pilih-</option>
                                    <option value='Tetap'>Tetap</option>
                                    <option value='Kontrak'>Kontrak</option>
                                    <option value='Resign'>Resign</option>
                                </select>
                            </div>
                        </div>

                        <br>

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