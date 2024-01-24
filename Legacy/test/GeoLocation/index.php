<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>GeoLocation</title>
</head>

<body>

	<a href="#" id="get_location">Get Location</a>
    <div id="map">
    
    	<iframe id="google_map" width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk?output=embed"></iframe>
    
    </div>

		<script src="js/Modernizr.js"></script>
        
		<script>
		if(!Modernizr.geolocation){
			alert('Geolocation Not Supported');
			
		}else{
		
		var c = function(pos) {
			var lat = pos.coords.latitude,
			long = pos.coords.longitute,
			acc = pos.coords.accuracy,
			coords = lat + ', ' + long;
			
			document.getElementById('google_map').setAttribute('src', 'https://maps.google.com/?q=' + coords + '&z=60&output=embed');
															   
		}
		
		var e = function(error){
			if (error.code === 1){
				alert('Unable To Get Location');
			}
		}
		
		document.getElementById('get_location').onclick = function(){
			 navigator.geolocation.getCurrentPosition(c);
			 return false;
		}	
	}

</body>
</html>