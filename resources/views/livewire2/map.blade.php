<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaflet Map in Tailwind Card</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
  <style>
    /* Ensure the map takes the full height of its container */
    .map-container {
      height: 400px; /* Adjust the height as needed */
    }
  </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="max-w-lg mx-auto p-4 bg-white shadow-lg rounded-lg">
   
    <div id="map" class="map-container"></div>
  </div>

  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
          integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
          crossorigin=""></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Initialize the map centered on Malawi
      var map = L.map('map').setView([-13.5, 34.0], 7);

      // Add tile layer
      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      }).addTo(map);

      // Add markers for different locations in Malawi
      var locations = [
        { coords: [-13.9833, 34.4075], popup: 'Lilongwe - Capital City' },
        { coords: [-14.0115, 35.3031], popup: 'Blantyre - Major City' },
        { coords: [-12.5397, 34.2357], popup: 'Zomba - Former Capital' },
        { coords: [-13.6000, 34.0500], popup: 'Mwanza - City in Malawi' }
      ];

      locations.forEach(function(location) {
        L.marker(location.coords).addTo(map)
          .bindPopup(location.popup);
      });

      // Handle map click event
      var popup = L.popup();

      function onMapClick(e) {
        popup
          .setLatLng(e.latlng)
          .setContent('You clicked the map at ' + e.latlng.toString())
          .openOn(map);
      }

      map.on('click', onMapClick);
    });
  </script>
</body>
</html>
