<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); ?>">

<div class="example-modal">
    <div id="filterjadwal" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="font-weight-bold">CETAK DATA JADWAL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <form class="user" method="post" action="<?= base_url('C_jadwal/cetak') ?>" target="_blank">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="font-weight-bold form-label">Mulai Bulan</label>
                                <input type="text" class="form-control datepicker" id="datepicker"
                                    data-date-format="yyyy-mm-dd" name="mulai">
                            </div>

                            <div class="col-md-6">
                                <label class="font-weight-bold form-label">Sampai Bulan</label>
                                <input type="text" class="form-control datepicker" id="datepicker" name="sampai"
                                    data-date-format="yyyy-mm-dd">
                            </div>

                            </br>

                            <div class="modal-footer">
                                <button id="nosave" type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" target="_blank">Cetak</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/jQuery-2.1.4.min.js'); ?>"></script>
<script type="text/javascript"
    src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<script>
$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
    });
});
</script>