<head>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
    $(function() {
        $("#date").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
    </script>
</head>

<body>
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
                                    <input type="text" id="date">
                                </div>

                                <div class="col-md-6">
                                    <label class="font-weight-bold form-label">Sampai Bulan</label>
                                    <input type="text" id="date">
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
</body>