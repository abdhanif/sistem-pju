<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow">
            <div class="card-body">

                <form class="user" method="post" action="<?= base_url('C_data_pju/tambah') ?>">

                    <div class="col-md">
                        <label class="form-label">Nomor Meter PJU</label>
                        <input type="text" class="form-control" id="no_meter" name="no_meter" value="<?= set_value('nomor_meter'); ?>" autocomplete="off" autofocus>
                        <?= form_error('no_meter', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Divpider -->
                    <hr class="sidebar-divider">

                    <div class="col-md">
                        <label class="form-label">Alamat PJU</label>
                        <input type="text" class="form-control" id="alamat_pju" name="alamat_pju" value="<?= set_value('alamat_pju'); ?>" autocomplete="off" autofocus>
                        <?= form_error('alamat_pju', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Divpider -->
                    <hr class="sidebar-divider">

                    <div class="col-md">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= set_value('kecamatan'); ?>" autocomplete="off" autofocus>
                        <?= form_error('kecamatan', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Divpider -->
                    <hr class="sidebar-divider">

                    <div class="col-md">
                        <label class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?= set_value('kelurahan'); ?>" autocomplete="off" autofocus>
                        <?= form_error('kelurahan', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Divpider -->
                    <hr class="sidebar-divider">

                    <div class="col-md">
                        <label class="form-label">RT</label>
                        <input type="text" class="form-control" id="rt" name="rt" value="<?= set_value('rt'); ?>" autocomplete="off" autofocus>
                        <?= form_error('rt', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Divpider -->
                    <hr class="sidebar-divider">

                    <div class="col-md">
                        <label class="form-label">RW</label>
                        <input type="text" class="form-control" id="rw" name="rw" value="<?= set_value('rw'); ?>" autocomplete="off" autofocus>
                        <?= form_error('rw', ' <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- Divpider -->
                    <hr class="sidebar-divider">

                    <div class="col-md">
                        <label class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= set_value('keterangan'); ?>" autocomplete="off" autofocus>
                        <?= form_error('keterangan', ' <small class="text-danger pl-3">', '</small>'); ?>
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
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->