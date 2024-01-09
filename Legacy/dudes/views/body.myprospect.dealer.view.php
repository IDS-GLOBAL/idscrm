<div id="loading_container">
                    	<h1>Your Prospect Dealer View Here</h1>
                        
                        
                        
                        <div class="row">
                        	<div class="col-sm-12">
                            
                            
                            
                            <h6>Company Name</h6>
                            
                            
                            
                                <button class="btn btn-danger  dim btn-large-dim" type="button"><i class="fa fa-heart"></i></button>
                            
                            </div>
                        </div>                        
                        
                        <div class="row">
                        	<div class="col-md-6 col-sm-3">
                            
                            
                       <a id="gsearch_dealer_store" class="btn btn-block btn-social btn-google">
                            <span class="fa fa-google"></span> Google Search Company Name
                       </a>


                       <a id="call_dealer_store" class="btn btn-block btn-social btn-soundcloud dim btn-medium-dim" href="tel:4045877007" role="button">
                            <span class="fa fa-phone-square"></span>  Call Store
                       </a>


                       <a id="sendemail_dealer_store" class="btn btn-block btn-social btn-google dim">
                            <span class="fa fa-envelope-square"></span> Email Store
                       </a>




                       <a id="viewinventory_dealer_store" class="btn btn-block btn-social btn-yahoo btn-medium-dim">
                            <span class="fa fa-car"></span> View Inventory 
                       </a>




                       <a id="addinventory_dealer_store" class="btn btn-block btn-social btn-openid dim btn-small-dim">
                            <span class="fa fa-plus-square-o"></span> <span class="fa fa-car"></span> Add Inventory 
                       </a>




                       <a id="seeemails_dealer_store" class="btn btn-block btn-social btn-tumblr dim btn-medium-dim">
                            <span class="fa fa-envelope-open"></span>  View Emails
                       </a>
                   

						<a id="website_dealer_store" class="btn btn-block btn-social btn-vk btn-medium-dim">
                            <span class="fa fa-globe"></span> View Website
                        </a>
                                                        

                            </div>
                        	<div class="col-md-6 col-sm-3">
                                <ul>
                                    <li>Map Status: OK</li>
                                    <li>Email Status</li>
                                    <li>Rep 1: </li>
                                    <li>Rep 2: </li>
                                    <li>View Notes</li>
                                </ul>
                            </div>
                        </div>

						<div id="data_google_maps_view" class="row">


<div class="col-md-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Google Maps Basic example</h5>
                        </div>
                        <div class="ibox-content">
                            <p>
                                With google maps <a href="https://developers.google.com/maps/documentation/javascript/reference#MapOptions">API</a> You can easy customize your map.
                            </p>
                            <div class="google-map" id="map1"></div>
                        </div>
                    </div>
                </div>


 </div>
                            
                            
                  		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbYYY54ZOHlFuHK7v-Fq3kWQYgwim8xec&language=eng&callback=init"></script>
                      
                            
<script type="text/javascript" language="javascript" class="init">

        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Options for Google map
            // More info see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions1 = {
                zoom: 11,
                center: new google.maps.LatLng(33.9075227, -84.2926726),
                // Style for Google Maps
                styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
            };


            // Get all html elements for map
            var mapElement1 = document.getElementById('map1');


            // Create the Google Map using elements
            var map1 = new google.maps.Map(mapElement1, mapOptions1);
        }






</script>                            
                            
</div>