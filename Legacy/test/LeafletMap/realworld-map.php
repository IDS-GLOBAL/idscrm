
<!DOCTYPE html>
<html>
<head>
	<title>Realworld Map</title>

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet-src.js" integrity="sha512-WXoSHqw/t26DszhdMhOXOkI7qCiv5QWXhH9R7CgvgZMHz1ImlkVQ3uNsiQKu5wwbbxtPzFXd1hK4tzno2VqhpA==" crossorigin=""></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/screen.css" />

	<link rel="stylesheet" href="assets/css/marker-cluster/MarkerCluster.css" />
	<link rel="stylesheet" href="assets/css/marker-cluster/MarkerCluster.Default.css" />
	<script src="assets/js/marker-cluster/leaflet.markercluster-src.js"></script>
	<script src="assets/geojson/realworld.388.js"></script>
	
    <link rel="stylesheet" href="assets/css/map.style.css" />

</head>
<body>

	<div id="leafMap"></div>
	<span>Mouse over a cluster to see the bounds of its children and click a cluster to zoom to those bounds</span>
	<script type="text/javascript">

		var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				maxZoom: 18,
				attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Points &copy 2012 LINZ'
			}),
			latlng = L.latLng(-37.82, 175.24);

		var map = L.map('leafMap', {center: latlng, zoom: 13, layers: [tiles]});

		var markers = L.markerClusterGroup();
		
		for (var i = 0; i < addressPoints.length; i++) {
			var a = addressPoints[i];
			var title = a[2];
			var marker = L.marker(new L.LatLng(a[0], a[1]), { title: title });
			marker.bindPopup(title);
			markers.addLayer(marker);
		}

		map.addLayer(markers);

	</script>
</body>
</html>