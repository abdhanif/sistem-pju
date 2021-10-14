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
        <script src="https://npmcdn.com/leaflet-geometryutil"></script>
        <script>
        let map = L.map('map').setView([-7.260520077866812, 112.75429319352317], 5);

        // let latLng1 = L.latLng(-7.278330748344206, 112.76267409324646); //DKRTH
        // let latLng2 = L.latLng(-7.253538340531229, 112.7417619077669); //PJU-007
        // let latLng3 = L.latLng(-7.2373039632982525, 112.75540898723467); // PJU-012
        // let wp1 = new L.Routing.Waypoint(latLng1);
        // let wp2 = new L.Routing.Waypoint(latLng2);
        // let wp3 = new L.Routing.Waypoint(latLng3);

        // var obj = [];
        // var obj2 = [];
        // let latLang;
        // let wp;
        // let latLangDKRTH = L.latLng(-7.278330748344206, 112.76267409324646);
        // let wpDKRTH = new L.Routing.Waypoint(latLangDKRTH);
        // obj.push(latLangDKRTH);
        // obj2.push(wpDKRTH);

        //START
        var objDB = []; //Object lat lang dari DB
        let latLangDKRTH = L.latLng(-7.278330748344206, 112.76267409324646);
        let latLang;
        var objPasti = []; //Object yg fix, dipush dulu lat lang kantor
        var objWP = []; //Object WP yg fix
        objPasti.push(latLangDKRTH);
        var jarakPendekTemp = 0; //Nyimpen Temp jarak terpendek
        var objTemp = []; // Nyimpen lat lang temp
        var objTemp2 = []; // Nyimpen lat lang temp rute ke 2 dst

        <?php for ($i = 0; $i < count($arre); $i++) { ?>
        latLang = L.latLng(<?php echo $arre[$i]->lat ?>, <?php echo $arre[$i]->lang ?>);
        objDB.push(latLang);
        <?php } ?>

        for (var i = 0; i < objDB.length; i++) {
            if (i == 0) { //Start Cari Rute Terpendek Dari Kantor
                for (var j = 0; j < objDB.length; j++) { //Loop utk setiap point
                    var jarakDariKantorKeRuteJ = L.GeometryUtil.distance(map, latLangDKRTH, objDB[j]);
                    //Ini Nanti Dari LeafletJS nya hasil nya berapa
                    console.log(objDB[j]);
                    console.log(jarakDariKantorKeRuteJ);

                    if (j == 0) { //Jika Start Dari Kantor ke Rute 1 Maka Simpan dulu ke jarakPendekTemp
                        jarakPendekTemp = jarakDariKantorKeRuteJ;
                        objTemp = objDB[j];
                    } else { //Jika Start Dari Kantor ke Rute 2 dst Maka Cek Apakah Lebih Pendek Dari Rute Temp Sebelumnya
                        if (jarakPendekTemp > jarakDariKantorKeRuteJ) {
                            jarakPendekTemp = jarakDariKantorKeRuteJ // Simpan ke Jarak Temp
                            objTemp = objDB[j];
                        }
                    }
                }
                objPasti.push(objTemp); //Push Rute Tercepat Dari Kantor ke Lokasi 1
                jarakPendekTemp = 0;
            } else { //Start Cari Rute Dari Rute2 Selanjutnya

                for (var j = 0; j < objDB.length; j++) { //Loop Setiap Point
                    var latLangTerakhir = L.latLng(objTemp);
                    var latLangPJu = L.latLng(objDB[j]);
                    var jarakDariRuteTerakhirKeRuteJ = L.GeometryUtil.distance(map, latLangTerakhir,
                        latLangPJu
                    ); //Ini Nanti Dari LeafletJS nya hasil nya berapa (Lat Lang dari Lokasi terakhir disimpen di objTemp)

                    if (j == 0) { //Simpen dulu jarak pertamanya sebagai acuan
                        jarakPendekTemp = jarakDariRuteTerakhirKeRuteJ;
                        objTemp2 = objDB[j];
                    } else { //Cek Apakah Lebih Pendek Dari Rute Pertama
                        if ((jarakPendekTemp > jarakDariRuteTerakhirKeRuteJ) && (jarakDariRuteTerakhirKeRuteJ != 0)) {
                            jarakPendekTemp = jarakDariRuteTerakhirKeRuteJ;
                            objTemp2 = objDB[j];
                        }
                    }
                }

                //Push Rute Terjauh
                var objDiff = [];
                objDiff.push(objTemp2);
                let difference = objDiff.filter(x => !objPasti.includes(x));

                if(difference.length != 0){
                  objPasti.push(objTemp2); //Push Rute Tercepat Dari Rute 1 ke lokasi Selanjutnya
                  jarakPendekTemp = 0;
                  objTemp = objTemp2; // Mengubah Lat Lang Last Rute
                }else {
                  let difference2 = objDB.filter(x => !objPasti.includes(x));
                  if(difference2.length != 0){
                    objPasti.push(difference2[0]);
                  }
                }
                //END Terjauh
            }
        }

        objPasti.push(latLangDKRTH); //Push Lat Lang Kantor lagi utk balik
        console.log(objPasti);

        for (var i = 0; i < objPasti.length; i++) {
            var wayPoint = new L.Routing.Waypoint(objPasti[i]);
            objWP.push(wayPoint);
        }

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
            waypoints: objPasti
        }).addTo(map);

        let routeUs = L.Routing.osrmv1();
        routeUs.route(objWP, (err, routes) => {
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
