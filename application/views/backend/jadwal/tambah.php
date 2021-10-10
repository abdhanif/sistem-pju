<!DOCTYPE html>

<body>
    <!-- modal insert -->
    <div class="example-modal">
        <div id="tambahjadwal" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="font-weight-bold">TAMBAH JADWAL</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <form class="user" method="post" action="<?= base_url('C_jadwal/tambah') ?>">
                            <div class="row g-3">



                            </div>

                            </br>

                            <div class="modal-footer">
                                <button id="nosave" type="button" class="btn btn-danger pull-left"
                                    data-dismiss="modal">Batal</button>
                                <button tye="submit" class="btn btn-primary">Create</button>
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

        $('#kode_kelompok').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('C_jadwal/get_kode_pju'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].kode_pju + '>' + data[i]
                            .kode_pju + '</option>';
                    }
                    $('#kode_pju').html(html);

                }
            });
            return false;
        });

    });
    </script>
</body>

</html>

<!-- modal insert close -->