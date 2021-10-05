<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 text-info font-weight-bold">PENGELOLAAN / DATA PJU / EDIT DATA PJU</h5>
        </div>

        <div class="card-body">
            <div class="container col-md">
                <form class="user" method="post" action="<?= base_url('C_data_pju/update') ?>">
                    <input type="hidden" class="form-control" name="id_pju" value="<?php echo $data_pju->id_pju; ?>">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="font-weight-bold">Kode Kelompok</label>

                            <select class="form-control" id="kode_kelompok" name="kode_kelompok" value="<?php echo $data_pju->kode_kelompok; ?>">
                                <option value="">-Pilih Satu-</option>
                                <?php
                                foreach ($data_kelompok as $d) {
                                ?>
                                    <?php if ($d->kode_kelompok == $data_pju->kode_kelompok) : ?>

                                        <option value="<?php echo $d->kode_kelompok ?>" selected><?php echo $d->nama_kelompok ?></option>

                                    <?php else : ?>
                                        <option value="<?php echo $d->kode_kelompok ?>"><?php echo $d->nama_kelompok ?></option>
                                    <?php endif; ?>
                                <?php
                                }
                                ?>
                            </select>

                            </br>

                            <label class="font-weight-bold form-label">Kode</label>
                            <input type="text" class="form-control" id="kode_pju" name="kode_pju" value="<?php echo $data_pju->kode_pju; ?>">
                            <?= form_error('kode_pju', ' <small class="text-danger pl-3">', '</small>'); ?>

                            </br>

                            <label class="font-weight-bold form-label">Alamat</label>
                            <input type="text" class="form-control form-control" id="alamat_pju" name="alamat_pju" value="<?php echo $data_pju->alamat_pju; ?>">
                            <?= form_error('alamat_pju', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </br>

                            <label class="font-weight-bold form-label">Latitude</label>
                            <input type="text" class="form-control form-control" id="lat" name="lat" value="<?php echo $data_pju->lat; ?>">
                            <?= form_error('lat', ' <small class="text-danger pl-3">', '</small>'); ?>

                            </br>

                            <label class="font-weight-bold form-label">Longitude</label>
                            <input type="text" class="form-control form-control" id="lng" name="lng" value="<?php echo $data_pju->lng; ?>">
                            <?= form_error('lng', ' <small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <div class=" card-body bg-light rounded">
                                <div class="row">
                                    <div id="googleMap" style="width:1100px;height:450px;"></div>

                                    <head>
                                        <script src="https://maps.googleapis.com/maps/api/js?key=API_KEY&callback=initialize" async defer></script>
                                        <script type="text/javascript">
                                            // variabel global marker
                                            var marker;

                                            function buatMarker(peta, posisiTitik) {

                                                if (marker) {
                                                    // pindahkan marker
                                                    marker.setPosition(posisiTitik);
                                                } else {
                                                    // buat marker baru
                                                    marker = new google.maps.Marker({
                                                        position: posisiTitik,
                                                        map: peta,
                                                        animation: google.maps.Animation.BOUNCE
                                                    });
                                                }

                                                // even listner ketika peta diklik
                                                google.maps.event.addListener(peta, 'click', function(event) {
                                                    buatMarker(this, event.latLng);
                                                });

                                                // isi nilai koordinat ke form
                                                document.getElementById("lat").value = posisiTitik.lat();
                                                document.getElementById("lng").value = posisiTitik.lng();

                                            }

                                            function initialize() {
                                                var propertiPeta = {
                                                    center: new google.maps.LatLng(-7.260520077866812, 112.75429319352317),
                                                    zoom: 13,
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                };

                                                var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

                                                // even listner ketika peta diklik
                                                google.maps.event.addListener(peta, 'click', function(event) {
                                                    buatMarker(this, event.latLng);
                                                });

                                            }
                                        </script>
                                    </head>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a type="button" href="<?= base_url('C_data_pju') ?>" class="btn btn-danger pull-left">Batal</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
