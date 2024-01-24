<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Google Maps : New York</title>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=true'></script>

	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	
</head>

<body>
<div id="mapCanvas" style="width:640px; height:480px; min-width:300px; min-height:300px"></div>
<script type="text/javascript">
// initialize the google Maps 	
	
     function initializeGoogleMap() {
		// set latitude and longitude to center the map around
		var latlng = new google.maps.LatLng(33.789705, 
											-84.269943);
		
		// set up the default options
		var myOptions = {
		  zoom: 10,
		  center: latlng,
		  navigationControl: true,
		  navigationControlOptions: 
		  	{style: google.maps.NavigationControlStyle.DEFAULT,
			 position: google.maps.ControlPosition.RIGHT },
		  mapTypeControl: true,
		  mapTypeControlOptions: 
		  	{style: google.maps.MapTypeControlStyle.DEFAULT,
			 position: google.maps.ControlPosition.TOP_LEFT },

		  scaleControl: true,
		   scaleControlOptions: {
        		position: google.maps.ControlPosition.BOTTOM_RIGHT
    	  }, 
		  mapTypeId: google.maps.MapTypeId.ROADMAP,
		  draggable: false,
		  disableDoubleClickZoom: false,
		  keyboardShortcuts: true
		};
		var map = new google.maps.Map(document.getElementById("mapCanvas"), myOptions);
		if (false) {
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(map);
		}
		if (false) {
			var bikeLayer = new google.maps.BicyclingLayer();
			bikeLayer.setMap(map);
		}
		if (false) {
			addMarker(map,0.159499,0.338173,"We are here");
		}
	  }

	  window.onload = initializeGoogleMap();

	 // Add a marker to the map at specified latitude and longitude with tooltip
	 function addMarker(map,lat,long,titleText) {
	  	var markerLatlng = new google.maps.LatLng(lat,long);
	 	var marker = new google.maps.Marker({
      		position: markerLatlng, 
      		map: map, 
      		title:"We are here",
			icon: ""});   
	 }
</script>
</body>
</html>

http://maps.google.com/maps?hl=en&ll=34.002581,-84.578247&spn=2.545448,5.410767&t=m&z=8&vpsrc=6

http://maps.google.com/maps?hl=en&ll=33.789705,-84.269943&spn=0.159499,0.338173&t=m&z=12&vpsrc=6