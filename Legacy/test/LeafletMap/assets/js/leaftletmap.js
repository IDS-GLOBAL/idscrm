//  var map = L.map('leafMap').setView([51.505, -0.09], 13);
var map = L.map('leafMap').setView([28.25255, 83.97669], 8);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

L.Control.geocoder().addTo(map);
