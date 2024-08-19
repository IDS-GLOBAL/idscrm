<?php require_once('db_admin.php'); ?>
<?php 

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_map_systmdlrs = "
SELECT 
	`dealers`.`id`, 
	`dealers`.`dealer_pending_id`, 
	`dealers`.`dudes_id`, 
	`dealers`.`dudes2_id`, 
	`dealers`.`company`, 
	`dealers`.`company_legalname`, 
	`dealers`.`dealer_type_id`, 
	`dealers`.`status`, 
	`dealers`.`website`, 
	`dealers`.`phone`, 
	`dealers`.`address`, 
	`dealers`.`city`, 
	`dealers`.`state`, `dealers`.`zip`,
	`dealers`.`email`, 
	`dealers`.`verified`, 
	`dealers`.`token`, 
	`dealers`.`dlr_ok_googlemp`,
	`dealers`.`dlr_geo_latitude`, 
	`dealers`.`dlr_geo_longitude`
FROM 
	`idsids_idsdms`.`dealers`
WHERE 
	`dealers`.`dlr_geo_latitude`
AND 
	`dealers`.`dlr_geo_longitude` IS NOT NULL 
ORDER BY 
	`dealers`.`dlr_geo_latitude` ASC";
$map_systmdlrs = mysqli_query($idsconnection_mysqli, $query_map_systmdlrs);
$row_map_systmdlrs = mysqli_fetch_array($map_systmdlrs);
$totalRows_map_systmdlrs = mysqli_num_rows($map_systmdlrs);


mysqli_select_db($tracking_mysqli, $database_tracking);
$query_map_prspctdlrs = "
SELECT 
`dealer_prospects`.`id`, 
`dealer_prospects`.`dlrprospect_locked`,
`dealer_prospects`.`dealer_pending_id`,
`dealer_prospects`.`dudes_id`,
`dealer_prospects`.`dudes2_id`,
`dealer_prospects`.`company`,
`dealer_prospects`.`company_legalname`,
`dealer_prospects`.`dealer_type_id`,
`dealer_prospects`.`dealer_type_label`,
`dealer_prospects`.`dealer_stillopenclose`,
`dealer_prospects`.`website`,
`dealer_prospects`.`phone`,
`dealer_prospects`.`address`,
`dealer_prospects`.`city`,
`dealer_prospects`.`state`,
`dealer_prospects`.`zip`, 
`dealer_prospects`.`email`, 
`dealer_prospects`.`verified`, 
`dealer_prospects`.`token`, 
`dealer_prospects`.`dlr_ok_googlemp`, 
`dealer_prospects`.`dlr_geo_latitude`, 
`dealer_prospects`.`dlr_geo_longitude`
FROM 
	`idsids_tracking_idsvehicles`.`dealer_prospects`
WHERE 
	`dealer_prospects`.`dlr_ok_googlemp` = 'OK' 
ORDER BY 
	`dealer_prospects`.`dlr_geo_latitude` ASC";
$map_prspctdlrs = mysqli_query($tracking_mysqli, $query_map_prspctdlrs);
$row_map_prspctdlrs = mysqli_fetch_array($map_prspctdlrs);
$totalRows_map_prspctdlrs = mysqli_num_rows($map_prspctdlrs);




?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>
<style>
      #map-canvas {
        height: 600px;
        width: 100%;
       }
    </style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbYYY54ZOHlFuHK7v-Fq3kWQYgwim8xec&language=eng"></script>

</head>

<body>
<?php include("analyticstracking.php"); ?>
    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Power Map</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Viewing Power Map</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Nation Wide Google Map <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    <h3>Prospect And System Dealers</h3>
                    
                        <div id="map-canvas"></div>
    



            

  

<script type="text/javascript">
var map;
var Markers = {};
var infowindow;
var locations = [


<?php $counter = 0; ?>
<?php do { ?>



  <?php //echo $row_map_prspctdlrs['dlr_ok_googlemp']; ?>  
  
  

	[
		'<?php echo $row_map_systmdlrs['company']; ?>',
		'<strong><?php echo $row_map_systmdlrs['company']; ?></strong><p><?php echo $row_map_systmdlrs['address']; ?><br> <?php echo $row_map_systmdlrs['city']; ?> <?php echo $row_map_systmdlrs['state']; ?> <?php echo $row_map_systmdlrs['zip']; ?><br><?php if($row_map_systmdlrs['website']){ ?>web site: <a href="http://<?php echo $row_map_systmdlrs['website']; ?>" target="_blank"><?php echo $row_map_systmdlrs['website']; ?></a><?php } ?></p><p><a id="<?php echo $row_map_systmdlrs['id']; ?>" class="dinvtvw map-scroll" rel="dstore_listing_result" href="dstore.php?token=<?php echo $row_map_systmdlrs['token']; ?>&amp;sysdealerid=<?php echo $row_map_systmdlrs['id']; ?>" target="_blank">View Inventory</a>',
		<?php echo $row_map_systmdlrs['dlr_geo_latitude']; ?>,
		<?php echo $row_map_systmdlrs['dlr_geo_longitude']; ?>,
        'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
		<?php echo $counter; ?>
	],

<?php $counter++; ?>

<?php } while ($row_map_systmdlrs = mysqli_fetch_array($map_systmdlrs)); ?>


<?php do { ?>

<?php $lastcounter++; ?>

<?php $counter2 = $counter++; ?>


	[
		'<?php echo $row_map_prspctdlrs['company']; ?>',
		'<strong><?php echo $row_map_prspctdlrs['company']; ?></strong><p><?php echo $row_map_prspctdlrs['address']; ?><br> <?php echo $row_map_prspctdlrs['city']; ?> <?php echo $row_map_prspctdlrs['state']; ?> <?php echo $row_map_prspctdlrs['zip']; ?><br><?php if($row_map_prspctdlrs['website']){ ?>web site: <a href="http://<?php echo $row_map_prspctdlrs['website']; ?>" target="_blank"><?php echo $row_map_prspctdlrs['website']; ?></a><?php } ?></p><p><a id="<?php echo $row_map_prspctdlrs['id']; ?>" class="dpaprvlchk" role="button">Check My Approval</a></p>',
		<?php echo $row_map_prspctdlrs['dlr_geo_latitude']; ?>,
		<?php echo $row_map_prspctdlrs['dlr_geo_longitude']; ?>,
        'https://wefinancehere.com/img/icons/auto-orange-icon.png',
		<?php echo $counter2; ?>
	]<?php if($totalRows_map_prspctdlrs != $lastcounter){ echo ','; }else{ echo ''; } ?>

<?php $counter2++; ?>

<?php } while ($row_map_prspctdlrs = mysqli_fetch_array($map_prspctdlrs)); ?>

/*
<?php /*?>	,[
		'Center US',
		'<strong>Center Of USA</strong><p>No Address<br> Static Location<br>',
		37.09024,
		-100.712891,
        'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
		<?php $counter2++; ?>
	],
	[
		'Laurel Ford Lincoln KIA',
		'<strong>Laurel Ford Lincoln KIA</strong><p>2018 Hwy 15 North<br> Laurel, MS 39440<br>',
		31.7143204,
		 -89.1345316,
         'https://wefinancehere.com/img/icons/auto-blue-market-leader-icon.png',
		<?php $counter2++; ?>
	]
<?php */?>
*/
	
];


var origin = new google.maps.LatLng(37.09024, -100.712891);
//var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);

function initialize() {
  var mapOptions = {
    zoom: 5,
    center: origin,
	gestureHandling: 'cooperative',
	mapTypeControl: true,
    mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.TOP_CENTER
    },
	zoomControl: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.LEFT_CENTER
          },
          scaleControl: true,
          streetViewControl: true,
          streetViewControlOptions: {
              position: google.maps.ControlPosition.LEFT_TOP
          },
    fullscreenControl: false,
	styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
  };

  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	infowindow = new google.maps.InfoWindow();

    for(i=0; i<locations.length; i++) {
    	var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
		var marker = new google.maps.Marker({
			position: position,
			map: map,
			icon: locations[i][4],

		});
		
		marker.addListener('click', function() {
			map.setZoom(14);
			map.setCenter(marker.getPosition());
		  });

		google.maps.event.addListener(marker, 'click', (function(marker, i) {
			return function() {
				infowindow.setContent(locations[i][1]);
				infowindow.setOptions({maxWidth: 200});
				infowindow.open(map, marker);
			}
		}) (marker, i));
		Markers[locations[i][4]] = marker;
	}

	locate(0);

}

function locate(marker_id) {
	var myMarker = Markers[marker_id];
	var markerPosition = myMarker.getPosition();
	map.setCenter(markerPosition);
	google.maps.event.trigger(myMarker, 'click');
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>











                    

                    </div>
                </div>
              </div>
            </div>


			
			
			
			
			
			

            <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Custom theme 1</h5>
                        </div>
                        <div class="ibox-content">
                            <p>
                                This is a custom theme for Google map.
                            </p>
                            <div class="google-map" id="map2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Map Type</h5>
                        </div>
                        <div class="ibox-content">
                            <p>
                                You can also change a map type.
                            </p>
                            <div class="google-map" id="map3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Custom theme 2</h5>
                        </div>
                        <div class="ibox-content">
                            <p>
                                This is a custom theme for Google map.
                            </p>
                            <div class="google-map" id="map4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Street View</h5>
                        </div>
                        <div class="ibox-content">
                            <p>
                                You can also initial turn on Street View in Google maps.
                            </p>
                            <div class="google-map" id="pano" style="height: 500px"></div>
                        </div>
                    </div>
                </div>
            </div>
	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			

            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        <?php include("_footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

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

            var mapOptions2 = {
                zoom: 11,
                center: new google.maps.LatLng(33.9075227, -84.2926726),
                // Style for Google Maps
                styles: [{"featureType":"all","elementType":"all","stylers":[{"invert_lightness":true},{"saturation":10},{"lightness":30},{"gamma":0.5},{"hue":"#435158"}]}]
            };

            var mapOptions3 = {
                center: new google.maps.LatLng(33.9075227, -84.2926726),
                zoom: 18,
                mapTypeId: google.maps.MapTypeId.SATELLITE,
                // Style for Google Maps
                styles: [{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#fffffa"}]},{"featureType":"water","stylers":[{"lightness":50}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"lightness":40}]}]
            };

            var mapOptions4 = {
                zoom: 11,
                center: new google.maps.LatLng(33.9075227, -84.2926726),
                // Style for Google Maps
                styles: [{"stylers":[{"hue":"#18a689"},{"visibility":"on"},{"invert_lightness":true},{"saturation":40},{"lightness":10}]}]
            };

            var fenway = new google.maps.LatLng(33.9075227, -84.2926726);
            var mapOptions5 = {
                zoom: 14,
                center: fenway,
                // Style for Google Maps
                styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]/**/},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}]/**/},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}]
            };

            var panoramaOptions = {
                position: fenway,
                pov: {
                    heading: 10,
                    pitch: 10
                }
            };
            var panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'), panoramaOptions);

            // Get all html elements for map
            var mapElement1 = document.getElementById('map1');
            var mapElement2 = document.getElementById('map2');
            var mapElement3 = document.getElementById('map3');
            var mapElement4 = document.getElementById('map4');

            // Create the Google Map using elements
            var map1 = new google.maps.Map(mapElement1, mapOptions1);
            var map2 = new google.maps.Map(mapElement2, mapOptions2);
            var map3 = new google.maps.Map(mapElement3, mapOptions3);
            var map4 = new google.maps.Map(mapElement4, mapOptions4);
        }


</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>