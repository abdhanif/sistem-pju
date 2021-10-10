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
            <h5 class="m-0 text-info font-weight-bold">ADMINISTRATOR / PETA LOKASI PJU</h5>
        </div>
        <div class="card-body">
            <div class="container col-md">
                <div class="row">
                    <div id="map"></div>
                </div>
            </div>
        </div>


        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
        <link rel="stylesheet"
            href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
        <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <script>
        var map = L.map('map', {
            center: [-7.260520077866812, 112.75429319352317, 12],
            zoom: 15
        });

        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibmFiaWxjaGVuIiwiYSI6ImNrOWZzeXh5bzA1eTQzZGxpZTQ0cjIxZ2UifQ.1YMI-9pZhxALpQ_7x2MxHw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'your.mapbox.access.token'

            }).addTo(map);

        var MIcon = L.icon({
            iconUrl: 'assets/img/maps.png',
            iconSize: [25, 35],
        });

        // var marker = L.marker([-6.2008024, 106.830451, 12], {
        //     icon: MIcon
        // }).bindPopup('Belajar Leaflet JS di DosenIT.com').addTo(map);

        <?php for ($i = 0; $i < count($markerdata); $i++) { ?>
        var marker = L.marker([<?php echo $markerdata[$i]->lat ?>, <?php echo $markerdata[$i]->lng ?>], {
                icon: MIcon
            }).bindPopup('<?php echo $markerdata[$i]->kode ?>' + '<br>' + '<?php echo $markerdata[$i]->alamat ?>')
            .addTo(map);
        <?php } ?>
        </script>
    </div>
</div>
</div>