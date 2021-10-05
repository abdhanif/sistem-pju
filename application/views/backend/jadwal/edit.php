<!-- modal update -->
<!DOCTYPE HTML>
<html>

<body>
    <?php
    foreach ($jadwal as $jd) {
    ?>
        <div class="example-modal">
            <div id="updatejadwal<?php echo $jd->id_jadwal ?>" class="modal fade" role="dialog" style="display:none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header font-weight-bold">
                            <h5 class="font-weight-bold">EDIT JADWAL</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form class="user" method="post" action="<?= base_url('C_jadwal/update') ?>">
                                <input type="hidden" class="form-control" name="id_jadwal" value="<?php echo $jd->id_jadwal; ?>">

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="font-weight-bold">Kelompok</label>
                                        <select class="form-control kode_kelompok" name="kode_kelompok" autofocus>
                                            <option value="">-Pilih Satu-</option>
                                            <!-- <?php foreach ($kode_kelompok as $row) : ?>
                                                <option value="<?php echo $row->kode_kelompok; ?>"><?php echo $row->nama_kelompok; ?></option>
                                            <?php endforeach; ?> -->

                                            <?php
                                            foreach ($data_kelompok as $d) {
                                            ?>
                                                <?php if ($d->kode_kelompok == $jd->kode_kelompok) : ?>

                                                    <option value="<?php echo $d->kode_kelompok ?>" selected><?php echo $d->nama_kelompok ?></option>

                                                <?php else : ?>
                                                    <option value="<?php echo $d->kode_kelompok ?>"><?php echo $d->nama_kelompok ?></option>
                                                <?php endif; ?>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="font-weight-bold">Kode PJU</label>
                                        <select class="form-control kode_pju" name="kode_pju" autofocus>
                                            <!-- <option value="">- Pilih -</option> -->
                                            <?php
                                            foreach ($data_pju as $p) {
                                            ?>
                                                <?php if ($p->kode_pju == $jd->kode_pju) : ?>

                                                    <option value="<?php echo $p->kode_pju ?>" selected><?php echo $p->kode_pju ?></option>

                                                <?php else : ?>
                                                    <option value="<?php echo $p->kode_pju ?>"><?php echo $p->kode_pju ?></option>
                                                <?php endif; ?>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                </br>

                                <div class="row g-3">
                                    <div class=" col-md-6">
                                        <label class="font-weight-bold form-label">Diubah</label>
                                        <input type="text" class="font-weight-boldform-control form-control" id="update_at" name="create_at" value="<?php echo $jd->update_at; ?>">
                                        <?= form_error('update_at', ' <small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="col-md">
                                        <label class="font-weight-bold">Status</label>
                                        <select class="form-control" id="update_at" name="status" value="<?php echo set_value('status'); ?>">
                                            <option value="BELUM" <?php if ($jd->status == "BELUM") {
                                                                        echo "selected";
                                                                    } ?>>BELUM</option>
                                            <option value="SELESAI" <?php if ($jd->status == "SELESAI") {
                                                                        echo "selected";
                                                                    } ?>>SELESAI</option>

                                        </select>
                                    </div>
                                </div>

                                <br>

                                <div class="modal-footer">
                                    <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <button tye="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                //call function get data edit
                get_data_edit();

                $('.kode_kelompok').change(function() {
                    var id = $(this).val();
                    var kode_pju = "<?php echo $jd->kode_pju; ?>";
                    $.ajax({
                        url: "<?php echo site_url('C_jadwal/get_pju_edit'); ?>",
                        method: "POST",
                        data: {
                            id: id
                        },
                        async: true,
                        dataType: 'json',
                        success: function(data) {

                            $('select[name="kode_pju"]').empty();

                            $.each(data, function(key, value) {
                                if (kode_pju == value.kode_pju) {
                                    $('select[name="kode_pju"]').append('<option value="' + value.kode_pju + '" selected>' + value.kode_pju + '</option>').trigger('change');
                                } else {
                                    $('select[name="kode_pju"]').append('<option value="' + value.kode_pju + '">' + value.kode_pju + '</option>');
                                }
                            });

                        }
                    });
                    return false;
                });

                //load data for edit
                function get_data_edit() {
                    var id_jadwal = $('[name="id_jadwal"]').val();
                    $.ajax({
                        url: "<?php echo site_url('C_jadwal/get_data_edit'); ?>",
                        method: "POST",
                        data: {
                            id_jadwal: id_jadwal
                        },
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(i, item) {
                                // $('[name="kode_kelompok"]').val(data[i].kode_kelompok).trigger('change');
                                $('[name="kode_pju"]').val(data[i].kode_pju).trigger('change');
                            });
                        }

                    });
                }

            });
        </script>
    <?php
    }
    ?>
</body>

</html>