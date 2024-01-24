<?php require_once('../../Connections/idsconnection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "vehicle_form")) {
  $insertSQL =  "INSERT INTO cust_leads (cust_fname, cust_lname, cust_email, cust_perf_commun, cust_phoneno, cust_phonetype, cust_comment, cust_dealer_id, cust_date_td, cust_hour_td, cust_min_td, cust_home_address, cust_home_city, cust_home_state, cust_home_zip) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_fname'], "text"),
                       GetSQLValueString($_POST['cust_lname'], "text"),
                       GetSQLValueString($_POST['cust_email'], "text"),
                       GetSQLValueString($_POST['cust_perf_commun'], "text"),
                       GetSQLValueString($_POST['cust_phoneno'], "text"),
                       GetSQLValueString($_POST['cust_phonetype'], "text"),
                       GetSQLValueString($_POST['cust_comment'], "text"),
                       GetSQLValueString($_POST['cust_dealer_id'], "int"),
                       GetSQLValueString($_POST['cust_date_td'], "text"),
                       GetSQLValueString($_POST['cust_hour_td'], "text"),
                       GetSQLValueString($_POST['cust_min_td'], "text"),
                       GetSQLValueString($_POST['cust_home_address'], "text"),
                       GetSQLValueString($_POST['cust_home_city'], "text"),
                       GetSQLValueString($_POST['cust_home_state'], "text"),
                       GetSQLValueString($_POST['cust_home_zip'], "text"));

  mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
  $Result1 = mysqli_query($idsconnection_mysqli, $insertSQL);
}


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_userDets = "SELECT * FROM dealers WHERE id = '85'";
$userDets = mysqli_query($idsconnection_mysqli, $query_userDets);
$row_userDets = mysqli_fetch_assoc($userDets);
$totalRows_userDets = mysqli_num_rows($userDets);


$did = $row_userDets['id']; //$DID
$dchat = $row_userDets['dealer_chat']; //$dchat
$fuelpump = $row_userDets['fuel_pump_display']; //$fuelpump

$colname_slct_vehicle = "-1";
if (isset($_GET['vid'])) {
  $colname_slct_vehicle = $_GET['vid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_vehicle =  "SELECT * FROM vehicles WHERE vehicles.vid = %s  AND  vehicles.did = '$did'", GetSQLValueString($colname_slct_vehicle, "int"));
$slct_vehicle = mysqli_query($idsconnection_mysqli, $query_slct_vehicle);
$row_slct_vehicle = mysqli_fetch_assoc($slct_vehicle);
$totalRows_slct_vehicle = mysqli_num_rows($slct_vehicle);
$vid = $row_slct_vehicle['vid']; //$VID

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_dlr = "SELECT * FROM dealers WHERE id = '$did'";
$slct_dlr = mysqli_query($idsconnection_mysqli, $query_slct_dlr);
$row_slct_dlr = mysqli_fetch_assoc($slct_dlr);
$totalRows_slct_dlr = mysqli_num_rows($slct_dlr);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_bhours = "SELECT * FROM busines_hours";
$bhours = mysqli_query($idsconnection_mysqli, $query_bhours);
$row_bhours = mysqli_fetch_assoc($bhours);
$totalRows_bhours = mysqli_num_rows($bhours);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vecolor = "SELECT vehicles.vid, vehicles.vecolor, colors_hex.color_id, colors_hex.color_name, colors_hex.color_hex FROM vehicles, colors_hex WHERE colors_hex.color_id = vehicles.vecolor AND vehicles.vid = '$vid'";
$vecolor = mysqli_query($idsconnection_mysqli, $query_vecolor);
$row_vecolor = mysqli_fetch_assoc($vecolor);
$totalRows_vecolor = mysqli_num_rows($vecolor);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vicolor = "SELECT vehicles.vid, vehicles.vicolor, colors_hex.color_id, colors_hex.color_name, colors_hex.color_hex FROM vehicles, colors_hex WHERE colors_hex.color_id = vehicles.vicolor AND vehicles.vid = $vid";
$vicolor = mysqli_query($idsconnection_mysqli, $query_vicolor);
$row_vicolor = mysqli_fetch_assoc($vicolor);
$totalRows_vicolor = mysqli_num_rows($vicolor);

$maxRows_vehicle_photos = 15;
$pageNum_vehicle_photos = 0;
if (isset($_GET['pageNum_vehicle_photos'])) {
  $pageNum_vehicle_photos = $_GET['pageNum_vehicle_photos'];
}
$startRow_vehicle_photos = $pageNum_vehicle_photos * $maxRows_vehicle_photos;

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vehicle_photos = "SELECT * FROM vehicle_photos WHERE vehicle_id = $vid ORDER BY photo_file_name ASC";
$query_limit_vehicle_photos =  "%s LIMIT %d, %d", $query_vehicle_photos, $startRow_vehicle_photos, $maxRows_vehicle_photos);
$vehicle_photos = mysqli_query($idsconnection_mysqli, $query_limit_vehicle_photos);
$row_vehicle_photos = mysqli_fetch_assoc($vehicle_photos);

if (isset($_GET['totalRows_vehicle_photos'])) {
  $totalRows_vehicle_photos = $_GET['totalRows_vehicle_photos'];
} else {
  $all_vehicle_photos = mysqli_query($idsconnection_mysqli, $query_vehicle_photos);
  $totalRows_vehicle_photos = mysqli_num_rows($all_vehicle_photos);
}
$totalPages_vehicle_photos = ceil($totalRows_vehicle_photos/$maxRows_vehicle_photos)-1;

$queryString_vehicle_photos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_vehicle_photos") == false && 
        stristr($param, "totalRows_vehicle_photos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_vehicle_photos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_vehicle_photos =  "&totalRows_vehicle_photos=%d%s", $totalRows_vehicle_photos, $queryString_vehicle_photos);





 
$vtitle = "26px";

$root = $_SERVER['DOCUMENT_ROOT'].'internetdealerservices'.'/'.'images'.'/'.'icons'.'/'.'rl_camera_icon.png';

?>
<?php
   			$vdid = $row_slct_vehicle['did']; 
			$vid = $row_slct_vehicle['vid']; 
			$thumbs = 'thumbs'; 
			$file = $row_slct_vehicle['vthubmnail_file']; 
			$timage = "<img src='http://idscrm.com/vehicles/photos/$vdid/$vid/$thumbs/$file' />";
			$bimage = "<img src='http://idscrm.com/vehicles/photos/$vdid/$vid/$file' width='410px' />";
			$year = $row_slct_vehicle['vyear'];
			$make = $row_slct_vehicle['vmake'];
			$model = $row_slct_vehicle['vmodel'];
			$trim = $row_slct_vehicle['vtrim'];
			$stock = $row_slct_vehicle['vstockno'];
			$vtitle = "$year $make $model $trim";
			$trans = $row_slct_vehicle['vtransm'];
			$ecolor = $row_slct_vehicle['vecolor_txt'];
			$icolor = $row_slct_vehicle['vicolor_txt'];
			$engine = $row_slct_vehicle['vengine'];
			$mileage = $row_slct_vehicle['vmileage'];
			$price = $row_slct_vehicle['vspecialprice'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Inventory Details Page</title>
<link href="http://idscrm.com/css/ids-dealer-style.css" rel="stylesheet" type="text/css" />



<script type='text/javascript' src='http://idscrm.com/jQuery/includes/jquery-1.4.2.js'></script>

<script type='text/javascript' src='http://idscrm.com/jQuery/includes/jquery.ui.core.min.js'></script>
<script type='text/javascript' src='http://idscrm.com/jQuery/includes/jquery.ui.widget.min.js'></script>
<script type='text/javascript' src='http://idscrm.com/jQuery/includes/jquery.ui.tabs.min.js'></script>
<link type='text/css' href='http://idscrm.com/jQuery/css/jquery.ui.core.css' rel='stylesheet'/>
<link type='text/css' href='http://idscrm.com/jQuery/css/jquery.ui.tabs.css' rel='stylesheet'/>
<link type='text/css' href='http://idscrm.com/jQuery/css/jquery.ui.theme.css' rel='stylesheet'/>
<style type="text/css">
/* User Custom Colors */

body {
color:#333;
/* Main Whole Page Font Color */
}

#container { 

/*background-color:#F00;
 Main Background Color */
}



</style>




<style type="text/css">
#jQueryTabs.ui-tabs .ui-tabs-panel { 

	display: block; 

	border: 1px hidden #aaaaaa; 

	padding: 1px 5px;

	background: #ffffff; 

	font-family: Arial, Helvetica, sans-serif;

	font-size: 0.8em/*{fsDefault}*/; 

}



/* Component containers

----------------------------------*/

#jQueryTabs .ui-widget { 

	

}

#jQueryTabs .ui-widget-content { 

	border: 1px solid #aaaaaa/*{borderColorContent}*/; 

	background: #ffffff/*{bgColorContent}*/ url(http://idscrm.com/jQuery/css/images/ui-bg_flat_75_ffffff_40x100.png)/*{bgImgUrlContent}*/ 50%/*{bgContentXPos}*/ 50%/*{bgContentYPos}*/ repeat-x/*{bgContentRepeat}*/; 

	color: #222222/*{fcContent}*/; 

}

#jQueryTabs .ui-widget-content a { 

	color: #0000ff/*{fcContent}*/; 

}

#jQueryTabs .ui-widget-header { 

	border: 1px solid #aaaaaa/*{borderColorHeader}*/; 

	background: #cccccc/*{bgColorHeader}*/ url(http://idscrm.com/jQuery/css/images/ui-bg_highlight-soft_75_cccccc_1x100.png)/*{bgImgUrlHeader}*/ 50%/*{bgHeaderXPos}*/ 50%/*{bgHeaderYPos}*/ repeat-x/*{bgHeaderRepeat}*/; 

	color: #222222/*{fcHeader}*/; 

	font-weight: bold; 

	font-family: Arial, Helvetica, sans-serif;

	font-size: 14px/*{fsDefault}*/; 

}



/* Interaction states

----------------------------------*/

#jQueryTabs .ui-state-default, .ui-widget-content .ui-state-default { 

	border: 1px solid #cccccc/*{borderColorDefault}*/; 

	background: #000000/*{bgColorDefault}*/ url(http://idscrm.com/jQuery/css/images/ui-bg_glass_75_e6e6e6_1x400.png)/*{bgImgUrlDefault}*/ 50%/*{bgDefaultXPos}*/ 50%/*{bgDefaultYPos}*/ repeat-x/*{bgDefaultRepeat}*/; 

	font-weight: bold/*{fwDefault}*/; 

	color: #555555 /*{fcDefault}*/; 

	

}

#jQueryTabs .ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited { 

	color: #333333/*{fcDefault}*/; 

	text-decoration: none; 

}

#jQueryTabs .ui-state-hover, .ui-widget-content .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus { 

	border: 1px solid #999999/*{borderColorHover}*/; 

	background: #dadada/*{bgColorHover}*/ url(http://idscrm.com/jQuery/css/images/ui-bg_glass_75_dadada_1x400.png)/*{bgImgUrlHover}*/ 50%/*{bgHoverXPos}*/ 50%/*{bgHoverYPos}*/ repeat-x/*{bgHoverRepeat}*/; 

	font-weight: normal/*{fwDefault}*/; 

	color: #212121 /*{fcHover} #212121*/; 

	font-family: inherit;

	font-size: inherit/*{fsHover}*/; 

}

#jQueryTabs .ui-state-hover a, .ui-state-hover a:hover { 

	color: #212121/*{fcHover}*/; 

	text-decoration: none; 

}

#jQueryTabs .ui-state-active, .ui-widget-content .ui-state-active { 

	border: 1px solid #999999/*{borderColorActive}*/; 

	background: #cccccc/*{bgColorActive}*/ url(http://idscrm.com/jQuery/css/images/ui-bg_glass_65_ffffff_1x400.png)/*{bgImgUrlActive}*/ 50%/*{bgActiveXPos}*/ 50%/*{bgActiveYPos}*/ repeat-x/*{bgActiveRepeat}*/; 

	font-weight: normal/*{fwDefault}*/; 

	color: #212121/*{fcActive}*/; 

	font-family: inherit;

	font-size: inherit/*{fsSelected}*/; 

}

#jQueryTabs .ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited { 

	color: #212121/*{fcActive}*/; 

	text-decoration: none; 

}
</style>

<!--Second JS Style -->
<style>
#jQueryTabs2.ui-tabs .ui-tabs-panel { 

	display: block; 

	border: 1px hidden #aaaaaa; 

	padding: 1px 5px;

	background: #ffffff; 

	font-family: Arial, Helvetica, sans-serif;

	font-size: 0.8em/*{fsDefault}*/; 

}



/* Component containers

----------------------------------*/

#jQueryTabs2 .ui-widget { 

	

}

#jQueryTabs2 .ui-widget-content { 

	border: 1px solid #aaaaaa/*{borderColorContent}*/; 

	background: #ffffff/*{bgColorContent}*/ url(http://idscrm.com/jQuery/css/images/ui-bg_flat_75_ffffff_40x100.png)/*{bgImgUrlContent}*/ 50%/*{bgContentXPos}*/ 50%/*{bgContentYPos}*/ repeat-x/*{bgContentRepeat}*/; 

	color: #222222/*{fcContent}*/; 

}

#jQueryTabs2 .ui-widget-content a { 

	color: #0000ff/*{fcContent}*/; 

}

#jQueryTabs2 .ui-widget-header { 

	border: 1px solid #aaaaaa/*{borderColorHeader}*/; 

	background: #cccccc/*{bgColorHeader}*/ url(http://idscrm.com/jQuery/css/images/ui-bg_highlight-soft_75_cccccc_1x100.png)/*{bgImgUrlHeader}*/ 50%/*{bgHeaderXPos}*/ 50%/*{bgHeaderYPos}*/ repeat-x/*{bgHeaderRepeat}*/; 

	color: #222222/*{fcHeader}*/; 

	font-weight: bold; 

	font-family: Arial, Helvetica, sans-serif;

	font-size: 14px/*{fsDefault}*/; 

}



/* Interaction states

----------------------------------*/

#jQueryTabs2 .ui-state-default, .ui-widget-content .ui-state-default { 

	border: 1px solid #cccccc/*{borderColorDefault}*/; 

	background: #000000/*{bgColorDefault}*/ url(http://idscrm.com/jQuery/css/images/ui-bg_glass_75_e6e6e6_1x400.png)/*{bgImgUrlDefault}*/ 50%/*{bgDefaultXPos}*/ 50%/*{bgDefaultYPos}*/ repeat-x/*{bgDefaultRepeat}*/; 

	font-weight: bold/*{fwDefault}*/; 

	color: #555555 /*{fcDefault}*/; 

	

}

#jQueryTabs2 .ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited { 

	color: #333333/*{fcDefault}*/; 

	text-decoration: none; 
	
	font-weight: bold/*{fwDefault}*/; 

}

#jQueryTabs2 .ui-state-hover, .ui-widget-content .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus { 

	border: 1px solid #999999/*{borderColorHover}*/; 

	background: #dadada/*{bgColorHover}*/ url(http://idscrm.com/jQuery/css/images/ui-bg_glass_75_dadada_1x400.png)/*{bgImgUrlHover}*/ 50%/*{bgHoverXPos}*/ 50%/*{bgHoverYPos}*/ repeat-x/*{bgHoverRepeat}*/; 

	font-weight: normal/*{fwDefault}*/; 

	color: #212121 /*{fcHover} #212121*/; 

	font-family: inherit;

	font-size: inherit/*{fsHover}*/; 

}

#jQueryTabs2 .ui-state-hover a, .ui-state-hover a:hover { 

	color: #212121/*{fcHover}*/; 

	text-decoration: none; 

}

#jQueryTabs2 .ui-state-active, .ui-widget-content .ui-state-active { 

	border: 1px solid #999999/*{borderColorActive}*/; 

	background: #cccccc/*{bgColorActive}*/ url(http://idscrm.com/jQuery/css/images/ui-bg_glass_65_ffffff_1x400.png)/*{bgImgUrlActive}*/ 50%/*{bgActiveXPos}*/ 50%/*{bgActiveYPos}*/ repeat-x/*{bgActiveRepeat}*/; 

	font-weight: normal/*{fwDefault}*/; 

	color: #212121/*{fcActive}*/; 

	font-family: inherit;

	font-size: inherit/*{fsSelected}*/; 

}

#jQueryTabs2 .ui-state-active a, .ui-state-active a:link, .ui-state-active a:visited { 

	color: #212121/*{fcActive}*/; 

	text-decoration: none; 

}
</style>



<!--End Second JS Style -->

</head>

<body>

<script type="text/javascript">
$(function() {

      $("#jQueryTabs").tabs({

		event:"click",

		collapsible: true,

		selected:'3',

		fx: { opacity: 'toggle', duration: 1500 }

        }).tabs( "none" , 800 , false ); 	

	});
</script>
<script type="text/javascript">
$(function() {

      $("#jQueryTabs2").tabs({

		event:"click",

		collapsible: true,

		selected:'3',

		fx: { opacity: 'toggle', duration: 1500 }

        }).tabs( "none" , 800 , false ); 	

	});
</script>
<div id="main">
 <div id="container">
	
    
   
    
    
<div id="header">
    	<table width="100%">
         <tr>
         	<td><img src="http://interstatemotorsinc.com/images/logo.jpg" /></td>
            <td>&nbsp;</td>
         </tr>
         
	      	</table>    
    </div><!-- End Header -->
     
	
 
    
    
    <div id="header1">
    	<table width="100%">
       		<tr>
       			<td align="left"><a href="inventory.php">Back To Search Results</a></td><td align="right"><!-- | Share | Print This Page --></td>
                
               
   		  </tr>
	    </table>
    </div><!-- End Header1 -->
 
<!--
    <div id="animation">
    
    			
                ID=Animation To Be Dynamic
    
    
    
    </div>End Animation -->
    
    


    

	
    
    <br />
    
    
<div id="divId">
    	<table width="100%">
         	<tr>
            	<td width="50">
                
                Used
                
        </td> 
                	<td><div id="vtitle"><?php echo $row_slct_vehicle['vyear']; ?> <?php echo $row_slct_vehicle['vmake']; ?> <?php echo $row_slct_vehicle['vmodel']; ?> <?php echo $row_slct_vehicle['vtrim']; ?></div></td>
                <td align="right"><div id="vcertified">
				<?php 
				$cert = $row_slct_vehicle['vcertified'];
				if($cert == 1){echo 'Certified';}else{echo '';} 
				?>
              </div></td>
            </tr>
        </table>
    </div><!-- End Header2 BGdivId -->

	
    
    <br /> <br />
    
    
    
    <div id="vehiclestats">
       
	    <table width="100%">
        	
            <tr>
            	
                <td valign="top">
                <b>Finance Price:</b> <?php echo $row_slct_vehicle['vdprice']; ?> <br  />
                <b>Internet Special</b> <?php echo $row_slct_vehicle['vspecialprice']; ?><br /><br />
                
                <span id="dealerchat">   
                <?php 
				//	if ($dchat > 0)
				//		{echo 'Dealer Chat Online';} 
				//   else {echo 'Dealer Chat Offline';} 
				?>
                </span>
                
                
                </td>
                				
              <td>     
                
               <?php if ($fuelpump > 1) {
                echo "<div align='center'>
                    <table>
                    	<tr>
                          <td>
                          <span id='vehiclestats_fuelpump'><b>City </b>20</span>
                          </td>
                          <td>
                            <span><img src='http://aux3.iconpedia.net/uploads/53306049202433619.png' title='MPG' /></span><br />
                          </td><td>
                          <span id='vehiclestats_fuelpump'><b>Hwy </b>26</span>
                          </td>
                        </tr>
                    </table>
          		</div>";} else {echo '';}
                ?>
                
                
</td>

                       <td>
   					   <div id="uniquevinfo">
                           <table width="100%">
                            <tr>
                            <th align="left">Dealer Name:</th>
                            <th colspan="3" align="left"><h2><?php echo $row_slct_dlr['company']; ?></h2></th>
                            <th align="left" colspan="2"><?php echo $row_slct_dlr['address']; ?></th>
                            </tr>	
                            
                            <tr>
                             <td><strong>Zip code:</strong></td>
                             <td><?php echo $row_slct_dlr['zip']; ?></td>
                             <td><strong>Transmission:</strong></td>
                             <td><?php echo $row_slct_vehicle['vtransm']; ?></td>
                             <td><strong>Stock #:</strong></td>
                             <td><?php echo $row_slct_vehicle['vstockno']; ?></td>
                            </tr>
                            
                            <tr>
                             <td><strong>Exterior Color:</strong></td>
                             <td><?php echo $row_vecolor['color_name']; ?></td>
                             <td><strong>Doors:</strong></td>
                             <td><?php echo $row_slct_vehicle['vdoors']; ?></td>
                             <td><strong>VIN #:</strong></td>
                             <td><?php echo $row_slct_vehicle['vvin']; ?></td>
                            </tr>
                            
                            <tr>
                             <td><strong>Interior Color:</strong></td>
                             <td><?php echo $row_vicolor['color_name']; ?></td>
                             <td><strong>Body Style:</strong></td>
                             <td><?php echo $row_slct_vehicle['vbody']; ?></td>
                             <td><strong>Mileage #:</strong></td>
                             <td><?php echo $row_slct_vehicle['vmileage']; ?></td>
                            </tr>
                               
                          </table>
						</div>
                    </td>
            </tr>
            
        </table>
        
    </div><!-- End Header3 -->
	
    <br /> <br />
    
	<div id="vehiclefunbox">
      
       
      <br />
     
      <div id="mid-view">
    	
      	<table width="100%" cellpadding="5" cellspacing="10">
        	
            <tr>
            	<td valign="top" width="50%">
                 <div id="photo-box"> 
                             
		          <div id="jQueryTabs2">

					<ul>

						<li>
                        	<div id="rlcameraicon">
                        	<a href="#tabs-4">
                            
                            Photos
                            </a>
                        	</div>
          </li>
						
                        <?php 
						$vvideo = $row_slct_vehicle['video_on_off_status'];
							if ($vvideo == 1){
								echo "<li><a href='#tabs-5'>Video</a></li>";
								}
							if ($vvideo == 0){
								echo " ";
								}

						?>
						
						<?php 
						$dcommercial = $row_userDets['dcommercial_youtube_onoff'];
						
						if ($dcommercial == 1)
						{echo "<li><a href='#tabs-6'>Commercial</a></li>"; }
						if ($dcommercial == 0)
						{echo " ";}
						?>
					</ul>
                    
                  <div id="tabs-4">
                             
                             <br /> <br />          
                    <div align="center">
                    	
                        
                        
                  <?php  
					

					
                        if ($bimage == NULL){
                        	echo "<img src='http://idscrm.com/vehicles/no-photo.png'>";
                        }
						else{
							echo $bimage;
						}
					?>
                        
                        
                        
                        
                      
						
                        <br />
                       
                        
                        <br />
                      
<div id="tgallery" align="center">
<?php do { ?>

             <?php if ($totalRows_vehicle_photos > 0) { // Show if recordset not empty ?>
             
             <img src="<?php echo "http://www.idscrm.com/vehicles/photos/$did/$vid/thumbs/".$row_vehicle_photos['photo_thumb_fname']; ?>" width="120" >
             
             <?php } // Show if recordset not empty ?>
                              
<?php } while ($row_vehicle_photos = mysqli_fetch_assoc($vehicle_photos)); ?>
</div>


<br /> <br /> <br />
<div> <a href="<?php printf("%s?pageNum_vehicle_photos=%d%s", $currentPage, max(0, $pageNum_vehicle_photos - 1), $queryString_vehicle_photos); ?>">&lt;&lt;Previous</a>&nbsp;&nbsp;&nbsp; <a href="<?php printf("%s?pageNum_vehicle_photos=%d%s", $currentPage, min($totalPages_vehicle_photos, $pageNum_vehicle_photos + 1), $queryString_vehicle_photos); ?>"> Next&gt;&gt;</a></div>
                      


                    </div>
                  
                 </div><!--End Tabs4 -->
               	 
                 <div id="tabs-5">
                 
	                 <p>
                     	<br /><br />
                     
	                   <?php echo $row_slct_vehicle['v_video_youtube_link']; ?>
	                   
                   </p>
                   <p><br /><br />
                      
					  <?php echo $row_slct_vehicle['v_youtube_dlr_comment']; ?>
                      
                      <br /> <br /> <br />
                      
                      <?php echo $row_slct_dlr['dcommercial_youtube_description']; ?>
                   </p>
                 </div><!-- End Tabs 5 -->
                 
                 <div id="tabs-6">
                 
				   <p><br /> <br />
				     
               <!-- Dealership Commercial Tab -->

    
    
			<?php echo $row_slct_dlr['dcommercial_youtube_embed']; ?>
    
    
    
               <!-- End Dealership Commercial Tab-->      
			       </p>
                   
                   <p>
                   <?php echo $row_slct_dlr['dcommercial_youtube_description']; ?>
                   </p>

                 </div><!-- End Tabs 5 -->
                 
                 
               </div><!--End JQueryTabs2 -->
              </td>
                
                
                
                <td valign="top">
                	
         <div id="lead-form">
         	
            <div id="jQueryTabs">

				<ul>

					<li><a href="#tabs-1">Test Drive</a></li>

					<li><a href="#tabs-2">Quick Apply</a></li>

					<li></li>

				</ul>

         
                  
                    <div id="tabs-1">
                        <form action="<?php echo $editFormAction; ?>" method="POST" name="vehicle_form" id="vehicle_form">
                          <table width="100%" border="0" cellspacing="1" cellpadding="0">
                            <tr>
                              <td colspan="2"><h5><strong>Set An Appointment Now!</strong></h5></td>
                            </tr>
                             <tr>
                              <td colspan="2"><input name="cust_dealer_id" type="hidden" id="cust_dealer_id" value="<?php echo $did; ?>"></td>
                            </tr>
                             <tr>
                              <td colspan="2">
                              How Would You Perfer To Be Contacted Back? <br />
                                <table width="100%">
                                  <tr>
                                    <td><label>
                                      <input type="radio" name="cust_perf_commun" value="phone" id="customer_method_0">
                                    By Phone</label></td>
                                 
                                    <td><label>
                                      <input type="radio" name="cust_perf_commun" value="email" id="customer_method_1">
                                    By Email</label></td>
                                  
                                    <td><label>
                                      <input type="radio" name="cust_perf_commun" value="text" id="customer_method_2">
                                      By Text</label>
                                    </td>
                                    
                                                                        <td><label>
                                      <input name="cust_perf_commun" type="radio" id="customer_method_3" value="any, email, phone, text" checked>
                                      Any</label>
                                    </td>
                                    
                                  </tr>
                               </table> 
                               <br /> <br />
                               
                               <?php 
							   @$id = $_POST['cust_dealer_id']; 
							   
							   if ($id == $did){
							   echo "<div style='color:#060; font-size:24px;'>Your Message Has been Sent</div>".'<br>';
							   }
												
							   ?>
                               
                               
                               
                               </td>
                            </tr>
                            <tr>
                              <td width="50%">
                              <label>First Name: <br />
                                <input name="cust_fname" type="text" id="cust_fname" size="25" placeholder="First Name">
                              </label>
                              </td>
                              <td width="50%">
                              <label>Last Name: <br />
                                <input name="cust_lname" type="text" id="cust_lname" size="25" placeholder="Last Name">
                              </label>
                              </td>
                            </tr>
                            <tr>
                              <td width="50%"><label>Address: <br />
                                <input name="cust_home_address" type="text" id="cust_home_address" size="25" placeholder="Address 1">
                              </label></td>
                              <td width="50%"><label>Apt or Unit #: <br />
                                <input name="address2" type="text" id="address2" size="25" placeholder="Address 2">
                              </label></td>
                            </tr>
                            <tr>
                              <td width="50%"><label>City: <br />
                                <input name="cust_home_city" type="text" id="cust_home_city" size="25" placeholder="City">
                              </label></td>
                              <td width="50%"><table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><label>State: <br />
                                    <select name="cust_home_state" size="1" id="cust_home_state">
                                    <option>State</option>
                                    <option value="ga">Georgia</option>
                                  </select>
                                  </label>&nbsp;
                                  </td>
                                  <td align="left">
                     <label> Zip Code: <br />
                       	<input name="cust_home_zip" type="text" id="cust_home_zip" size="8" maxlength="5" placeholder="Zip">
                     </label>
                                  </td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td width="50%">
                              <table><tr><td>
                     <label>Phone Number: <br />
                        <input name="cust_phoneno" type="text" id="cust_phoneno" size="14" maxlength="18" placeholder="Phone">
                     </label>
                     </td>
                     <td>
                       <label>
                          Type: <br />
                            <select name="cust_phonetype" id="cust_phonetype">
                           <option value="mobile">Mobile</option>
                           <option value="home">Home</option>
                           <option value="work">Work</option>
                         </select>
                        </label>&nbsp;
                     </td>
                    </tr>
                 </table>

							</td>
                              <td width="50%"><label>Email: <br />
                                <input type="text" name="cust_email" id="cust_email" placeholder="Email">
                              </label></td>
                            </tr>
                            <tr>
                              <td width="50%" rowspan="3">
                              <label>Your Comments: <br />
                              	<textarea name="cust_comment" cols="28" rows="4" id="cust_comment" placeholder="Comments"></textarea>
                              </label>
                              
                              </td>
                              <td width="50%">
                              <br />
                              <label>
                                <input type="checkbox" name="testdrive" id="testdrive">
                                Schedule This Test Drive
                              </label></td>
                            </tr>
                            <tr>
                              <td width="50%">
                              <label>Date: <br />
                              	<input name="cust_date_td" type="text" id="cust_date_td" readonly="readonly" placeholder="Date">
                               </label>
                              </td>
                            </tr>
                            <tr>
                              <td width="50%">
                              
                              <label>Pick A Time Please: <br />
                                <select name="cust_hour_td" id="cust_hour_td">
                                  <option value="">Select Hour</option>
                                  <?php
do {  
?>
                                  <option value="<?php echo $row_bhours['bus_hours_name']?>"><?php echo $row_bhours['bus_hours_name']?></option>
<?php
} while ($row_bhours = mysqli_fetch_assoc($bhours));
  $rows = mysqli_num_rows($bhours);
  if($rows > 0) {
      mysqli_data_seek($bhours, 0);
	  $row_bhours = mysqli_fetch_assoc($bhours);
  }
?>
                                </select>
                              </label>
                                <label>
                                  <select name="cust_min_td" id="cust_min_td">
                                    <option value="00">00</option>
                                    <option value="05">05</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                  </select>
                              </label>
                                </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                              
                              <br />
                              
                              
                              <div id="captcha" align="center">
                              <br />
                              
                                <?php //include('captcha.html') ?>
                              
                              
                              </div>
                              
                              
                              </td>
                            </tr>
                            <tr><td colspan="2"></td></tr>
                            <tr>
                              <td colspan="2">
                              <div align="center">
                              	<label>
                                	<input type="submit" name="submit" id="submit" value="Schedule This">
                              	</label>
                              </div>
                              </td>
                            </tr>
                          </table>
                          <input type="hidden" name="MM_insert" value="vehicle_form">
                        </form>
                	</div><!--Ends tabs-1 -->
                  	
                    <div id="tabs-2">

<form action="" method="post" name="vehicle_form" id="vehicle_form">
                          <table width="100%" border="0" cellspacing="1" cellpadding="0">
                            <tr>
                              <td colspan="2"><h5><strong>Do A Quick Apply!</strong></h5></td>
                            </tr>
                             <tr>
                              <td colspan="2"><input type="hidden" name="cust_dealer_id" id="cust_dealer_id">
                               <input name="cust_vehicle_id" type="hidden" id="cust_vehicle_id" value="<?php echo $vid; ?>"></td>
                            </tr>
                             <tr>
                              <td colspan="2">
                              How Would You Perfer To Be Contacted Back? <br />
                                <table width="100%">
                                  <tr>
                                    <td><label>
                                      <input type="radio" name="cust_perf_commun" value="phone" id="customer_method_0">
                                    By Phone</label></td>
                                 
                                    <td><label>
                                      <input type="radio" name="cust_perf_commun" value="email" id="customer_method_1">
                                    By Email</label></td>
                                  
                                    <td><label>
                                      <input type="radio" name="cust_perf_commun" value="text" id="customer_method_2">
                                      By Text</label>
                                    </td>
                                    
                                                                        <td><label>
                                      <input name="cust_perf_commun" type="radio" id="customer_method_3" value="any, email, phone, text" checked>
                                      Any</label>
                                    </td>
                                    
                                  </tr>
                               </table> 
                               <br />
                               </td>
                            </tr>
                            <tr>
                              <td width="50%">
                              <label>First Name:* <br />
                                <input name="cfirstname" type="text" id="cfirstname" size="25" placeholder="First Name">
                              </label>
                              </td>
                              <td width="50%">
                              <label>Last Name:* <br />
                                <input name="clastname" type="text" id="clastname" size="25" placeholder="Last Name">
                              </label>
                              </td>
                            </tr>
                            <tr>
                              <td width="50%"><label>Address: <br />
                                <input name="address1" type="text" id="address1" size="25" placeholder="Address 1">
                              </label></td>
                              <td width="50%"><label>Apt or Unit #: <br />
                                <input name="address2" type="text" id="address2" size="25" placeholder="Address 2">
                              </label></td>
                            </tr>
                            <tr>
                              <td width="50%"><label>City:* <br />
                                <input name="ccity" type="text" id="ccity" size="25" placeholder="City">
                              </label></td>
                              <td width="50%"><table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><label>State:* <br />
                                    <select name="State" size="1">
                                    <option>State</option>
                                    <option value="ga">Georgia</option>
                                  &nbsp;</select>
                                  </label>
                                  </td>
                                  <td align="left">
                     <label> Zip Code:* <br />
                       	<input name="zip" type="text" id="zip" size="8" maxlength="5" placeholder="Zip">
                     </label>
                                  </td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td width="50%">
                              <table><tr><td>
                     <label>Phone Number:* <br />
                        <input name="phone" type="text" id="phone" size="14" maxlength="18" placeholder="Phone">
                     </label>
                     </td>
                     <td>
                       <label>
                          Type:* <br />
                            <select name="phonetype" id="phonetype">
                           <option value="mobile">Mobile</option>
                           <option value="home">Home</option>
                           <option value="work">Work</option>
                         </select>
                        </label>
                     </td>
                    </tr>
                 </table>

							</td>
                              <td width="50%"><label>Email:* <br />
                                <input type="text" name="email" id="email" placeholder="Email">
                              </label></td>
                            </tr>
                            <tr>
                              <td width="50%" rowspan="3">
                              <label>Your Comments: <br />
                              	<textarea name="comments" cols="28" rows="4" placeholder="Comments"></textarea>
                              </label>
                              
                              </td>
                              <td width="50%">
                              <br />
                              <label>What is your downpayment?*:
                                <input type="input" name="quickapply" id="quickapply">
                                
                              </label></td>
                            </tr>
                            <tr>
                              <td width="50%">
                              <label>Date: <br />
                              	<input name="date" type="text" readonly="readonly" placeholder="Date">
                               </label>
                              </td>
                            </tr>
                            <tr>
                              <td width="50%">
                              
                              <label>Are You Ready To Make This Deal Today? <br />
                              <input type="checkbox" id="makedeal" name="makedeal">
                              Yes!
                              </label></td>
                            </tr>
                            <tr>
                              <td colspan="2">
                              
                              <br />
                              
                              
                              <div id="captcha" align="center">
                              <br />
                              
                               
                              
                              
                              </div>
                              
                              
                              </td>
                            </tr>
                            <tr><td colspan="2"></td></tr>
                            <tr>
                              <td colspan="2">
                              <div align="center">
                              	<label>
                                	<button type="submit" name="submit" id="submit" value="Submit"></button>
                              	</label>
                              </div>
                              </td>
                            </tr>
                          </table>
                      </form>
                      
					</div><!--End tabs-2 -->
                    
                    <div id="tabs-3">
                      <h5></h5>
                      <p>&nbsp;</p>
                    </div><!-- End tabs-3-->


                    
            </div><!--  Ends jQueryTabs -->
          <br />
         </div><!--End Lead Form -->
                    <br />
                    
                    <div id="google-map">
                    
                    <?php echo $row_slct_dlr['mapframe']; ?>
                   
                   
      
                    
                    
                    </div>
                    
                    
                </td>
                
            </tr>
        </table>
    	
   </div><!-- End Midview -->
     
     
        <br />
        
        
  </div><!-- End Header4 -->
	
  	<br /> <br />
    
    
    <div id="storeprofile">
      <p><h3><?php echo $row_slct_dlr['company']; ?></h3></p>
      <p><?php echo $row_slct_dlr['address']; ?><br />
      <?php echo $row_slct_dlr['city']; ?>, <?php echo $row_slct_dlr['state']; ?>&nbsp;&nbsp;&nbsp;<?php echo $row_slct_dlr['zip']; ?><br/>
      <br />
      Phone: <?php echo $row_slct_dlr['phone']; ?><br />
	  Fax: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_slct_dlr['fax']; ?>
      <br /><br />
      
      </p>
    </div>
    
    
    <br /> <br />
    
    
    <div id="storeprofile">
      <p><h2>Disclaimer:</h2></p>
      <p><br />
      <h4><?php echo $row_userDets['disclaimer']; ?></h4><br />
      
      </p>
    </div>
    
    
    <div align="center" id="dealer-vehicle-buttons">
   <br /> 
        <!--Apply For This Vehicle |
	    Make An Offer | Share This With A Friend |
	    Vehicle Brochure | -->
    </div><!--Dealer Vehicle Buttons -->
    
    
    
    
    
    <div id="footer">
     <a href="http://www.internetdealerservices.com" style="text-decoration:none">
     Powered By Internet Dealer Serivces  (IDS)</a> &copy;<?php echo date("Y"); ?>
    </div><!-- End Footer | Header5 -->
    
    
    
  
  
  </div><!--End Container -->
</div><!-- End Main -->

</body>
</html>
<?php
mysqli_free_result($userDets);

mysqli_free_result($slct_vehicle);

mysqli_free_result($slct_dlr);

mysqli_free_result($vehicle_photos);

mysqli_free_result($bhours);

mysqli_free_result($vecolor);

mysqli_free_result($vicolor);
?>
