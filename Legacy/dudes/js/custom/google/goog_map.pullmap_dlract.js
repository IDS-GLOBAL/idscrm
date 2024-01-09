// JavaScript Document
// https://stackoverflow.com/questions/38669434/reading-json-data-from-google-geocoding-api-with-jquery/38669462
// https://stackoverflow.com/questions/4013606/google-maps-how-to-get-country-state-province-region-city-given-a-lat-long-va
// Static Function To Set Initialize for dynamic latitude and logitude.
var lat;
var long;

function initialize(lat, long) {

 	geocoder = new google.maps.Geocoder();
 
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







		  function processJSON(json) {
			// Do stuff here
			console.log(json);
			
			
			//alert("Postal Code:" + json.results[0].address_components[1].long_name);
			
			var status = json.status;
			console.log('status: '+status);
			
			if(json.status == 'OK'){
				
						$('input#dlr_ok_googlemp').val(json.status);
			
						var  this_length =  json.results.length;
						console.log('Length Of Results: '+this_length);
			
						for (var i=0; i < this_length; i++)
						{
						    console.log('Addy Componet Static: '+json.results[0].address_components[1].long_name);

							console.log('Address Comp Dynamic: '+json.results[i].address_components[i].long_name);
							
							
						}
			






						// https://stackoverflow.com/questions/4390872/implementing-an-address-lookup-with-google-geocoding-api-or-similar/54041902#54041902
						// Format/Find Address Fields
						var address = json.results[0].address_components;
						// Loop through each of the address components to set the correct address field
						$.each(address, function () {
							var address_type = this.types[0];
							switch (address_type) {
								case 'route':
									var address_1 = ' ' + this.long_name;
									console.log('route'+address_1);
									break;
								case 'locality':
									var address_2 = this.long_name;
									console.log('locality'+address_2);
									break;
								case 'political':
									var locality = this.short_name;
									console.log('city: '+locality);
									break;
								case 'administrative_area_level_2':
									var county = this.long_name;
									console.log('administrative_area_level_2'+county);
									$('input#county').val(county);
									break;
								case 'administrative_area_level_1':
									var region = this.long_name;
									console.log('administrative_area_level_1'+region);
									break;
								case 'country':
									var country = this.long_name;
									break;
							}
						});
						// Sometimes the county is set to the postal town so set to empty if that is the case
						
						// Display the results
						
						
						
						




			
						
						var listing_address = json.results[0].address_components[1].formatted_address;
						if(listing_address){
							//$('input#address').val(listing_address);
						}
						
						
						var listing_city = json.results[0].address_components[3].long_name;
						if(listing_city){
							//$('input#city').val(listing_city);
						}
						
						var listing_county = json.results[0].address_components[5].short_name;
						console.log('county: '+listing_county);
						if(listing_county){
							//$('select#state').val(listing_county);
						}
						
						var listing_state = json.results[0].address_components[5].short_name;
						console.log('state: '+listing_state);
						if(listing_state){
							//$('select#state').val(listing_state);
						}
						
						var listing_latitude = json.results[0].geometry.location.lat;
						if(listing_latitude){
							$('input#dlr_geo_latitude').val(listing_latitude);
						}
						var listing_longitude = json.results[0].geometry.location.lng;
						if(listing_longitude){
							$('input#dlr_geo_longitude').val(listing_longitude);
						}
						
						
			
				}else{
					
					$('input#dlr_ok_googlemp').val('NO');
					alert('There Was A Problem With The Address To Geo Decode Sorry Try Again!!!');
			}
			
			
			
			

		  }

		$("button#pull_dlr_map").on('click', function(event) {
			
				//var uri = "https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,
				//            +Mountain+View,+CA&key=YOUR_API_KEY";

				//var geocoder;
				
				//if (navigator.geolocation) {
					//navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
				//} 
				
				console.log('Clicked pull_dlr_map ');
				
				var this_address = $('input#address').val();
				var this_city = $('input#city').val();

				var this_zip = $('input#zip').val();
				
				var combined_string = this_address + ',+' + this_city +  ',+' + this_zip;
				
				
				var address = encodeURIComponent(''+combined_string);
				console.log('address: '+address);
				console.log('address combined_string: '+combined_string);
				
				  $.ajax({
							type: "GET",
							url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + address + "&sensor=false&key=" + 'AIzaSyCHtiyM7Z3wOJ34Qp-BoFIZzcvVOILPfPo',
							dataType: "json",
							success: processJSON,
                            error: function()
							{
								console.log('error on request');
							}
				         }).done(function(data)
						 	{
								console.log('data: '+data);
								processJSON(data);
						  	});
		});












	$('button#pull_dlr_mapX').click(function(){
		
		
		
		console.log('Clicked Form Map');
		
		
		var address = $('input#address').val();
		
		var slct_state = document.getElementById("state");
		var state = slct_state.options[slct_state.selectedIndex].value;

		var city = $('input#city').val();

		var zip = $('input#zip').val();

		//var slct_street_country = document.getElementById("street_country");
		//var street_country= slct_street_country.options[slct_street_country.selectedIndex].value;
		var street_country= 'USA';

		var pc = address+' '+city+' '+state+' '+zip+' '+street_country;

		console.log(pc);
		
		//var pc = $('#post_code').val();
		
		if (pc != '') {

		console.log('Pulling Json');

			$.getJSON('mod/goog.php?pc='+pc, function(data) {
			
			console.log('Pulling Json Back');
				console.log('Data: '+data);
				street_no = data.results[0].address_components[0].long_name;
				route = data.results[0].address_components[1].long_name;

				//neighborhood = data.results[0].address_components[2].long_name;
				//city = data.results[0].address_components[3].long_name;
				//county = data.results[0].address_components[4].long_name;
				//state = data.results[0].address_components[5].short_name;
				

				
				address =  data.results[0].formatted_address;
				status = data.status;

				lat = data.results[0].geometry.location.lat;
				long = data.results[0].geometry.location.lng;

				//string = 'Status: <span id="map_status">' + status + '</span><br />Street No.: <span id="map_streetno">'+ street_no +'</span><br /><span id="map_route">' + route + '</span><br />Suggested Address: <span id="map_formatted">' + address + '</span><br />'+'County: <span id="map_county">' + county + '</span><br /> neighborhood: <span id="map_neighborhood">' + neighborhood + '</span><br />City: <span id="map_city">' + city + '</span><br />State: <span id="map_state">'+ state +'</span><br />Zip: <span id="map_zip">'+ zip + '</span><br />Country: <span id="map_country">' + country +'</span><br /><span id="entered_address">' + pc + '</span><br />Latitude: <span id="new_latitude">'+lat+'</span> <br />Longitude: <span id="new_longitude">' + long + '</span>';

string = 'Status: <span id="map_status">' + status + '</span><br />Address: <span id="address">'+ address +'</span><br /><br />Latitude: <span id="new_latitude">'+lat+'</span> <br />Longitude: <span id="new_longitude">' + long + '</span>';
				$('#api_result').html(string);
				$.getScript('http://maps.google.com/maps/api/js?key=AIzaSyBbYYY54ZOHlFuHK7v-Fq3kWQYgwim8xec&sensor=false&callback=initialize');				
				// update hidden fields for lead saving and later intilization.
				if(status == 'OK'){ 

					$('input#dlr_geo_latitude').val(lat);
					
					$('input#dlr_geo_longitude').val(long);
					
					$('input#dlr_ok_googlemp').val('OK');
					
					//$('input#cust_home_county').val(county);

					//$('input#cust_home_okgoogle').val('OK');

					//$('input#cust_home_okgoogle').parent('.icheckbox_square-green').removeClass( "disabled" );

					//$('input#cust_home_okgoogle').removeAttr( "disabled" );
					
					//$('input#cust_home_okgoogle').attr( "checked" );
					
					//$('input#cust_home_okgoogle').attr( "disabled","disabled" );
					
					//$('input#cust_home_okgoogle').parent('.icheckbox_square-green').addClass( "checked" );

					//$('input#cust_home_okgoogle').parent('.icheckbox_square-green').addClass( "disabled" );

					
					
					
				}
				
				
				
				
			});
		}
		
		
		//$('div#see_mapcord').show();
		//$('div#see_mapview').show();
		
		return false;
	});











});  // End Document Ready


