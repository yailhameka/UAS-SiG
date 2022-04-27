<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Futsal Pontianak Utara</title>
    <h1>Lokasi Futsal yang ada di Kecamatan Pontianak Utara</h1> 
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""
    />
   <script src="leaflet.ajax.js"></script>

    <style type="text/css">
        #map {
            height: 550px;
            margin-top: 10px;
        }

        .margin {
            margin-top: 5px;
        }
    </style>
  </head>
  <body>
    <div id="map"></div>
  </body>
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script
    src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""
  ></script>

  <script src="leaflet.ajax.js"></script>

  <script>
    var map = L.map("map").setView(
      [0.012702838988885135, 109.33008550075503],
      13
    );
    L.tileLayer(
      "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
      {
        attribution:
          'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: "mapbox/streets-v11",
        tileSize: 512,
        zoomOffset: -1,
        accessToken:
          "pk.eyJ1IjoieWFpbGhhbWVrYSIsImEiOiJja3l3NWhiMzkwM2p2Mm90YjhvZGQyMnU1In0.-gzzuWKJRND-m6V2QzHQTA",
      }
    ).addTo(map);
    function popUp(f, l) {
      var out = [];
      if (f.properties) {
        for (key in f.properties) {
          out.push(key + ": " + f.properties[key]);
        }
        l.bindPopup(out.join("<br />"));
      }
    }
    // var point = new L.GeoJSON.AJAX(
    //   ["Nama dan Lokasi Futsal.geojson"],
    //   {
    //     onEachFeature: popUp,
    //   }
    // ).addTo(map);
    var polygon = new L.GeoJSON.AJAX(
      ["Kelurahan Pontianak Utara.geojson"],
      {
        onEachFeature: popUp,
      }
    ).addTo(map);
    var entitas = new L.GeoJSON.AJAX(
      ["polygon di sekitar entitas.geojson"],
      {
        onEachFeature: popUp,
      }
    ).addTo(map);
    var polyline = new L.GeoJSON.AJAX(
      ["polyline rute dari rumah saya ke futsal.geojson"],
      {
        onEachFeature: popUp,
      }
    ).addTo(map);
    var polygonrumah = new L.GeoJSON.AJAX(
      ["polygon rumah saya.geojson"],
      {
        onEachFeature: popUp,
      }
    ).addTo(map);
    // var rumahsaya = new L.GeoJSON.AJAX(
    //   ["rumah saya.geojson"],
    //   {
    //     onEachFeature: popUp,
    //   }
    // ).addTo(map);
    var tLS = new L.GeoJSON.AJAX(["Nama dan Lokasi Futsal.geojson"], {
            pointToLayer: function(feature, latlng) {
                var smallIcon = new L.Icon({
                    iconSize: [30, 30],
                    iconAnchor: [13, 27],
                    popupAnchor: [1, -24],
                    iconUrl: 'img/futsal.png'
                });
                return L.marker(latlng, {
                    icon: smallIcon
                });
            },
            onEachFeature: popUp,
        }).addTo(map)

        var tLS = new L.GeoJSON.AJAX(["rumah saya.geojson"], {
            pointToLayer: function(feature, latlng) {
                var smallIcon = new L.Icon({
                    iconSize: [30, 30],
                    iconAnchor: [13, 27],
                    popupAnchor: [1, -24],
                    iconUrl: 'img/rumah.png'
                });
                return L.marker(latlng, {
                    icon: smallIcon
                });
            },
            onEachFeature: popUp,
        }).addTo(map)
  </script>
</html>
