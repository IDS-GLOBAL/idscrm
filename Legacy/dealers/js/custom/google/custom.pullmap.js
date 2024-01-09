// JavaScript Document

// Static Function To Set Initialize for dynamic latitude and logitude.
var lat;
var long;

function initialize() {

	var myLatlng = new google.maps.LatLng(lat, long);
	var myOptions = {
		zoom: 15,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	
	$('#map_canvas').fadeOut(300, function() {
		
		var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
		
		var marker = new google.maps.Marker({
			position: myLatlng
		});
		
		marker.setMap(map);
		$(this).fadeIn(300);
		
	});

}


$(document).ready(function() {

	$('#form_map').submit(function() {
		var street_name = $('input#street_name').val();
		var street_number = $('input#street_number').val();
		
		var slct_street_type = document.getElementById("street_type");
		var street_type = slct_street_type.options[slct_street_type.selectedIndex].value;

		var street_city = $('input#street_city').val();
		
		var slct_street_state = document.getElementById("street_state");
		var street_state = slct_street_state.options[slct_street_state.selectedIndex].value;

		var slct_street_country = document.getElementById("street_country");
		var street_country= slct_street_country.options[slct_street_country.selectedIndex].value;

		var pc = street_number+' '+street_name+' '+street_type+' '+street_city+' '+street_state+' '+street_country;

		console.log(pc);
		
		//var pc = $('#post_code').val();
		
		if (pc != '') {

		console.log('Pulling Json');

			$.getJSON('/dealers/mod/goog.php?pc='+pc, function(data) {
			
			console.log('Pulling Json Back');
				console.log('Data: '+data);
				street_no = data.results[0].address_components[0].long_name;
				route = data.results[0].address_components[1].long_name;

				neighborhood = data.results[0].address_components[2].long_name;
				city = data.results[0].address_components[3].long_name;
				county = data.results[0].address_components[4].long_name;
				state = data.results[0].address_components[5].short_name;
				country = data.results[0].address_components[6].long_name;
				zip = data.results[0].address_components[7].long_name;
				

				
				address =  data.results[0].formatted_address;
				status = data.status;

				lat = data.results[0].geometry.location.lat;
				long = data.results[0].geometry.location.lng;

				string = 'Status: <span id="map_status">' + status + '</span><br />Street No.: <span id="map_streetno">'+ street_no +'</span><br /><span id="map_route">' + route + '</span><br />Suggested Address: <span id="map_formatted">' + address + '</span><br />'+'County: <span id="map_county">' + county + '</span><br /> neighborhood: <span id="map_neighborhood">' + neighborhood + '</span><br />City: <span id="map_city">' + city + '</span><br />State: <span id="map_state">'+ state +'</span><br />Zip: <span id="map_zip">'+ zip + '</span><br />Country: <span id="map_country">' + country +'</span><br /><span id="entered_address">' + pc + '</span><br />Latitude: <span id="new_latitude">'+lat+'</span> <br />Longitude: <span id="new_longitude">' + long + '</span>';
				
				$('#result').html(string);
				$.getScript('http://maps.google.com/maps/api/js?sensor=false&callback=initialize');
			});
		}
		
		
		//$('div#see_mapcord').show();
		//$('div#see_mapview').show();
		
		return false;
	});

});