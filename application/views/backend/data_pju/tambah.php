<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scal">
    <style>
    body {
        margin: 0;
    }

    #map {
        width: 1100px;
        height: 450px;
    }
    </style>
</head>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 text-info font-weight-bold">PENGELOLAAN / DATA PJU / TAMBAH DATA PJU</h5>
        </div>

        <div class="card-body">
            <div class="container col-md">
                <form class="user" method="post" action="<?= base_url('C_data_pju/tambah') ?>">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="font-weight-bold form-label">Kode</label>
                            <input type="text" class="form-control form-control" id="kode_pju" name="kode_pju"
                                value="<?php echo $kode; ?>" readonly="readonly" autocomplete="off">
                            <?= form_error('kode_pju', ' <small class="text-danger pl-3">', '</small>'); ?>

                            </br>

                            <label class="font-weight-bold form-label">Nama Kelompok</label>
                            <select class="form-control" id="kode_kelompok" name="kode_kelompok" autofocus>
                                <option value="">- Pilih -</option>
                                <?php
                                foreach ($data_kelompok as $kl) {
                                ?>
                                <option value="<?php echo $kl->kode_kelompok ?>"><?php echo $kl->nama_kelompok ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>

                            <label class="font-weight-bold form-label">Alamat</label>
                            <input type="text" class="form-control form-control" id="alamat_pju" name="alamat_pju"
                                autocomplete="off" autofocus>
                            <?= form_error('alamat_pju', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </br>

                            <label class="font-weight-bold form-label">Latitude</label>
                            <input type="text" class="form-control form-control" id="lat" name="lat" autocomplete="off"
                                autofocus>
                            <?= form_error('lat', ' <small class="text-danger pl-3">', '</small>'); ?>

                            </br>

                            <label class="font-weight-bold form-label">Longitude</label>
                            <input type="text" class="form-control form-control" id="lng" name="lng" autocomplete="off"
                                autofocus>
                            <?= form_error('lng', ' <small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="col-md-6">
                            <div class="card-body bg-light rounded">
                                <div class="row">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>

                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css">
                        <link rel="stylesheet"
                            href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css">
                        <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
                        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js">
                        </script>
                        <script src="https://npmcdn.com/leaflet-geometryutil"></script>
                        <script>
                        let map = L.map('map').setView([-7.260520077866812, 112.75429319352317], 13);
                        L.tileLayer(
                            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
                                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                maxZoom: 20,
                                id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
                                tileSize: 512,
                                zoomOffset: -1,
                                accessToken: 'your.mapbox.access.token'

                            }).addTo(map);

                        var latInput = document.querySelector("[name=lat]");
                        var lngInput = document.querySelector("[name=lng]");

                        var curLocation = [-7.260520077866812, 112.75429319352317];

                        map.attributionControl.setPrefix(false);

                        var marker = new L.marker(curLocation, {
                            draggable: 'true',
                        });

                        marker.on('dragend', function(event) {
                            var position = marker.getLatLng();
                            marker.setLatLng(position, {
                                draggable: 'true',
                            }).bindPopup(position).update();
                            $("#lat").val(position.lat);
                            $("#lng").val(position.lng);
                        });
                        map.addLayer(marker);

                        map.on("click", function(e) {
                            var lat = e.latlng.lat;
                            var lng = e.latlng.lng;
                            if (!marker) {
                                marker = L.marker(e.latLng).addTo(map);
                            } else {
                                marker.setLatLng(e.latlng);
                            }
                            latInput.value = lat;
                            lngInput.value = lng;
                        });
                        </script>

                    </div>
                    <a type="button" href="<?= base_url('C_data_pju') ?>" class="btn btn-danger pull-left">Batal</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

</html>