<?php require_once('../db_admin.php'); ?>
<?php
if(!$_POST) exit();


$prospctdlrid = mysqli_real_escape_string($_POST['prospctdlrid']);

$query_prospctdlrid = mysqli_query($tracking_mysqli, "SELECT * FROM `idsids_tracking_idsvehicles`.`dealer_prospects` WHERE `id` = '$prospctdlrid'");
$row_prspct_dealers = mysqli_fetch_array($query_prospctdlrid);
$total_num_rows = mysqli_num_rows($query_prospctdlrid);

?>
<div id="loading_container">


                    	 <h1><?php echo $row_prspct_dealers['company']; ?></h1>
                        
                        
                        
                        
                        <div class="row">
                        	<div class="col-sm-12">
                            
                            
                            
                           
                            
                            
                                                        
                            </div>
                        </div>                        
                        
                        <div class="row">
                        	<div class="col-md-6 col-sm-3">
                            
                            
                       <a id="gsearch_dealer_store" class="btn btn-block btn-social btn-google">
                            <span class="fa fa-google"></span> Google Search <?php echo $row_prspct_dealers['company']; ?>
                       </a>







<?php if($row_prspct_dealers['phone']){ ?>


                       <a id="call_dealer_store" class="btn btn-block btn-social btn-soundcloud dim btn-medium-dim" href="tel:<?php echo $row_prspct_dealers['phone']; ?>" role="button">
                            <span class="fa fa-phone-square"></span>  Call Store
                       </a>


<?php }else{ ?>


                       <a id="call_dealer_store_no_phone" class="btn btn-block btn-social btn-pinterest dim btn-medium-dim" role="button">
                            <span class="fa fa-phone-square"></span>  No Phone
                       </a>


<?php } ?>



                       <a id="sendemail_dealer_store" class="btn btn-block btn-social btn-google dim">
                            <span class="fa fa-envelope-square"></span> Email : <?php echo $row_prspct_dealers['email']; ?>
                       </a>




                       <a id="viewinventory_dealer_store" class="btn btn-block btn-social btn-yahoo btn-medium-dim">
                            <span class="fa fa-car"></span> Inventory 
                       </a>




                       <a id="addinventory_dealer_store" class="btn btn-block btn-social btn-openid dim btn-small-dim">
                            <span class="fa fa-plus-square-o"></span> <span class="fa fa-car"></span> Add Inventory 
                       </a>




                       <a id="seeemails_dealer_store" class="btn btn-block btn-social btn-tumblr dim btn-medium-dim">
                            <span class="fa fa-envelope-open"></span>  View Emails
                       </a>
                   


<?php if($row_prspct_dealers['website']){ ?>


						<a id="website_dealer_store" href="http://<?php echo $row_prspct_dealers['website'];  ?>" class="btn btn-block btn-social btn-vk btn-medium-dim" target="_blank">
                            <span class="fa fa-globe"></span> View Website
                        </a>

<?php }else{ ?>


						<a id="website_dealer_store" class="btn btn-block btn-social btn-pinterest btn-medium-dim">
                            <span class="fa fa-globe"></span> No Website
                        </a>


<?php } ?>

                                                        

                            </div>
                        	<div class="col-md-6 col-sm-3">
                                <ul>
                                <?php if($row_prspct_dealers['dlr_ok_googlemp'] == 'OK'){ ?>
                                    <li>Map Status: <?php if($row_prspct_dealers['dlr_ok_googlemp']){ echo $row_prspct_dealers['dlr_ok_googlemp']; }else{ echo 'None'; } ?></li>


                                    <li>
                                    Latitude: <?php echo $row_prspct_dealers['dlr_geo_latitude'];  ?>
                                    
                                    </li>

                                    <li>
                                    Longitutde: <?php echo $row_prspct_dealers['dlr_geo_longitude'];  ?>
                                    
                                    </li>

                                <?php } ?>
                                    <li>
                                    Email Status: 
                                    <?php
                                    if($row_prspct_dealers['email']){
										echo 'Available';
									}else{
										echo 'Missing';
									}
									
									?>
                                    </li>
                                    <li>Rep 1: <?php echo $row_prspct_dealers['dudes_id']; ?>
                                    </li>
                                    <li>Rep 2: <?php echo $row_prspct_dealers['dudes2_id']; ?>
                                    </li>
                                    <li>
                                    <a id="view_dlrprospect_notes" href="#">View Notes:</a>
                                    
                                    </li>
                                    <li>
                                    <a id="edit_prospect_dlr" rel="<?php echo $row_prspct_dealers['id']; ?>" href="#">Edit Prospect:</a>
                                    
                                    </li>

                                </ul>
                                
                                

                       <a id="edit_dealer_store" class="btn btn-block btn-social btn-tumblr dim btn-medium-dim">
                            <span class="fa fa-pencil-square-o"></span>  Edit
                       </a>


                       <a class="btn btn-block btn-social btn-tumblr dim btn-medium-dim" href="prospect.dealer.php?prospctdlrid=<?php echo $row_prspct_dealers['id']; ?>" target="_blank">
                            <span class="fa fa-pencil-square-o"></span>  Full Edit
                       </a>

                            </div>
                        </div>

						<div id="data_google_maps_view" class="row">


<div class="col-md-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Google Map View <span id="show_propctdlrgooglemap">Show Map</span></h5>
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
                            
                            
<script type="text/javascript">

$('a#edit_dealer_store').on('click', function(){

			
			//var propspect_id = $(this).attr('id');
			var propspect_id = <?php echo $row_prspct_dealers['id']; ?>;
			
			console.log('prospect_link clicked: '+propspect_id);
			
			

			var propspect_link = 'prospect.dealer.php?prospctdlrid='+propspect_id;

			console.log('showing: '+propspect_link);
			
			$("div#work_aprospect_instate").load('' + propspect_link + " #dealer_box", function() {
				$.getScript("js/custom/prospect.dealer.js");
				$.getScript("js/plugins/dropzone/dropzone.js");
				$.getScript("js/custom/page/dropzone.vehicleuploads.js");


				$('div#pick_aprospect_instate').hide();
				$('div#pick_aprospectdlr_towork').hide();
				$('div#work_aprospect_instate').show();
				$('div#sendtoregistered_que').show();
				$('button#bringup_finalactions').on('click', function(){
						$('div#work_aprospect_instate').show();
						$('div#pick_aprospectdlr_towork').show();
						$('div#sendtoregistered_que').hide();
				});
				
				//$("div#dealer_box .ibox-title h5").append("<button id='inside_prspctvwflp'>Show Prospect View</button>");

				//$("div#view_aprospect_instate .ibox-title h5").append("<button id='inside_prspctwkflp'>Show Prospect Work</button>");

			}).show();








	
});




</script>
                  
<script>
$(document).on('click', 'button#inside_prspctvwflp', function(){
                  console.log('showprospectview()');
	$('div#work_aprospect_instate').hide();
	$('div#view_aprospect_instate').show();




});
</script>

<script>
$(document).on('click', 'button#inside_prspctwkflp', function(){
                  console.log('showprospectwork()');
	$('div#work_aprospect_instate').show();
	$('div#view_aprospect_instate').hide();



});
</script>

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
<?php include("../inc.end.phpmsyql.php"); ?>