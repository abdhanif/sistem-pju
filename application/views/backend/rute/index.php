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
                <div class="row">
                    <form>
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" autofocus>
                                    <option selected>Pilih Kelompok...</option>
                                    <option value="1">Surabaya Barat</option>
                                    <option value="2">Surabaya Timur</option>
                                    <option value="3">Surabaya Utara</option>
                                    <option value="3">Surabaya Pusat</option>
                                    <option value="3">Surabaya Selatan</option>
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


        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <script>
            let map = L.map('map').setView([-7.260520077866812, 112.75429319352317], 5);
            let latLng1 = L.latLng(-7.2285053684993965, 112.74270604534014);
            let latLng2 = L.latLng(-7.246215914307619, 112.72142003459795);
            let wp1 = new L.Routing.Waypoint(latLng1);
            let wp2 = new L.Routing.Waypoint(latLng2);

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
                waypoints: [latLng1, latLng2]
            }).addTo(map);

            let routeUs = L.Routing.osrmv1();
            routeUs.route([wp1, wp2], (err, routes) => {
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