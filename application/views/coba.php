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
            <h5 class="m-0 text-info font-weight-bold">PENGELOLAAN / CARI RUTE</h5>
        </div>
        <div class="card-body">
            <div class="container col-md">
                <div>
                    <form class="row" action="<?= base_url('C_rute/search'); ?>" method="post">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label class="mr-sm-2 sr-only" for="kelompok">Preference</label>
                                <select class="custom-select mr-sm-2" id="kelompok" name="kelompok">
                                    <option selected>Pilih Kelompok...</option>
                                    <?php
                                    foreach ($rute as $rt) {
                                    ?>
                                    <option value="<?php echo $rt->kode_kelompok ?>"><?php echo $rt->nama_kelompok ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-auto my-1">
                                <button type="submit" class="btn btn-primary">Cari Rute</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="container col-md">
                <div class="row">
                    <div id="map"></div>
                </div>
            </div>
        </div>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css">
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css">
        <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

        <script>
        let map = L.map('map').setView([-7.260520077866812, 112.75429319352317], 5);

        // let latLng1 = L.latLng(-7.2373039632982525, 112.75540898723467);
        // let latLng2 = L.latLng(-7.253538340531229, 112.7417619077669);
        // let latLng3 = L.latLng(-7.26047750662601, 112.7510101690341);
        // let wp1 = new L.Routing.Waypoint(latLng1);
        // let wp2 = new L.Routing.Waypoint(latLng2);
        // let wp3 = new L.Routing.Waypoint(latLng3);
        var obj = [];
        var obj2 = [];
        let latLang;
        let wp;
        let latLangDKRTH = L.latLng(-7.2805328, 112.7518904);
        let wpDKRTH = new L.Routing.Waypoint(latLangDKRTH);
        obj.push(latLangDKRTH);
        obj2.push(wpDKRTH);

        <?php for ($i = 0; $i < count($arre); $i++) { ?>
        latLang = L.latLng(<?php echo $arre[$i]->lat ?>, <?php echo $arre[$i]->lang ?>);
        wp = new L.Routing.Waypoint(latLang);
        obj.push(latLang);
        obj2.push(wp);

        <?php if (($i + 1) == count($arre)) { ?> //Biar balik ke titik start lagi

        obj2.push(wpDKRTH);
        <?php } ?>

        <?php } ?>

        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'your.mapbox.access.token'

            }).addTo(map);

        L.Routing.control({
            waypoints: obj
        }).addTo(map);

        let routeUs = L.Routing.osrmv1();
        routeUs.route(obj2, (err, routes) => {
            if (!err) {
                let best = 10000000000000000;
                let bestRoute = 0;
                for (i in routes) {
                    if (routes[i].summary.totalDistance < best) {
                        bestRoute = i;
                        best = routes[i].summary.totalDistance;
                    }
                }
                console.log('best route', routes[bestRoute]);
                L.Routing.line(routes[bestRoute], {
                    styles: [{
                        color: 'red',
                        opacity: '0.3',
                        weight: '5'
                    }]
                }).addTo(map);
            }
        });

        var popup = L.popup();

        // buat fungsi popup saat map diklik
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("koordinatnya adalah " + e.latlng
                    .toString()
                ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
                .openOn(map);
        }
        map.on('click', onMapClick); //jalankan fungsi
        </script>
    </div>
</div>
</div>