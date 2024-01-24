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

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_dlr = "SELECT * FROM dealers WHERE id = 23";
$slct_dlr = mysqli_query($idsconnection_mysqli, $query_slct_dlr);
$row_slct_dlr = mysqli_fetch_assoc($slct_dlr);
$totalRows_slct_dlr = mysqli_num_rows($slct_dlr);
$did = $row_slct_dlr['id'];

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_slct_vehicles = "SELECT * FROM vehicles WHERE vehicles.did = 23  AND  vehicles.vlivestatus = 1";
$slct_vehicles = mysqli_query($idsconnection_mysqli, $query_slct_vehicles);
$row_slct_vehicles = mysqli_fetch_assoc($slct_vehicles);
$totalRows_slct_vehicles = mysqli_num_rows($slct_vehicles);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Row Look</title>

<link href="css/envy.css" type="text/css" rel="stylesheet"></link>
<!-- -->
<link href="css/ids-dealer-style.css" type="text/css" rel="stylesheet"></link>


		<script language="javascript" type="text/javascript" src="js/plusesome.js"></script>

		

		<script language="javascript" type="text/javascript" src="js/jquery.js"></script>

		<script language="javascript" type="text/javascript" src="js/hotglobal.js"></script>

</head>

<body>

<div id="main">
 <div id="container">


<?php do { ?>

<div align="center">



          <?php
			$vdid = $row_slct_vehicles['did']; 
			$vid = $row_slct_vehicles['vid']; 
			$thumbs = 'thumbs'; 
			$file = $row_slct_vehicles['vthubmnail_file']; 
			$image = "<img src='http://idscrm.com/vehicles/photos/$vdid/$vid/$thumbs/$file' />";
			$year = $row_slct_vehicles['vyear'];
			$make = $row_slct_vehicles['vmake'];
			$model = $row_slct_vehicles['vmodel'];
			$trim = $row_slct_vehicles['vtrim'];
			$stock = $row_slct_vehicles['vstockno'];
			$vtitle = "$year $make $model $trim";
			$trans = $row_slct_vehicles['vtransm'];
			$ecolor = $row_slct_vehicles['vecolor_txt'];
			$icolor = $row_slct_vehicles['vicolor_txt'];
			$engine = $row_slct_vehicles['vengine'];
			$mileage = $row_slct_vehicles['vmileage'];
			$price = $row_slct_vehicles['vspecialprice'];
			
			
          ?>

		<table width="100%">
			<tr>
				<td style="vertical-align:top; border: solid 2px #c3040f; width:100%">

					<div class='itemHeader' style='color:#294372; background-color:#c3040f; '>

						<strong>Internet Special</strong>

					</div>







<div>

	<table style="width:100%;" cellpadding="0" cellspacing="0" class="fs11">

		<tr> 

		

			<td class="itemCb0">
	
					

			</td>

		

			<td class="itemDescTdWidth">

				<div style="padding-bottom: 3px;">

					

					<a class="fBold attention fs16" href="#" title="#"  target="_self"  >
                    <?php echo $vtitle; ?>
                    </a>

				</div>	        

				

		<div style="overflow:hidden;height:15px;">
        	<strong>&nbsp;</strong>
        </div>

				

				<table border="0" cellpadding="0" cellspacing="0" class="itemPhotoInfo0" style="margin-top:5px;" >

					<tr>

						<td class="itemPhotoBox0">

							<div class="itemPhoto">
                            <a title="" href="#" target="_self"  >
                            <?php echo $image; ?>  
                            </a>
                            </div>

							

						</td>

						<td class="itemInfo0">

							<p>
                            	<strong>Engine:</strong> <?php echo $engine; ?>
                            </p>
                            	<p><strong>Trans: </strong><?php echo $trans; ?></p>
                                <p><strong>Mileage:</strong>&nbsp;<?php echo $mileage; ?> Miles</p>

									<div style="height:17px">

										<div class="itemColorT">Exterior:</div>

										<div class="itemColorB">
										
	   										<div class="HexColorBox floatLeft" style="background-color:<?php echo $ecolor; ?>;">
	   											<b></b>
	                                         </div>

										</div>	

										<div class="itemColor"><?php echo $ecolor; ?></div>

										<div style="clear:both"></div>

									</div>

								

									<p><strong>Interior: </strong><?php echo $ecolor; ?></p>

								

						</td>

						

							<td class="itemHistImg" >

								
		<div>
        <a class="textLink" href="#"> 

			<img src='http://idscrm.com/images/safe/carfax.jpg' width="70" height="80" alt='Get a CARFAX Report' title='View FREE CARFAX' style='border:none;'/>
            <br />

		</a>

	<br /><br />

        </div>

		
							</td>

						

					</tr>

				</table>

			</td>

		

			<td class="PriceBox0" >

		<div>
			<a href="#" class="P" rel="nofollow" >
            
    
            $ <?php echo $price; ?>
            
            </a>
		</div>
		
        <div>
        
        
        <img src="http://www.idscrm.com/autostarfinance.com/images/autostar-logo.jpg" />
        
        
        
        </div>
		
        
        
        	</td>

		  </tr>

		

			<tr>

				

					<td style="width:20px; padding:0;"></td>

				

				<td class="itemLinks fs11" colspan="2">

			

							<div class="stockNumForItem">

								Stock#<span class="fBold"> <?php echo $stock; ?></span>

							</div>

							

									<div class="quoteLinkForItem1" >

<a class="link attention fBold" style="text-decoration:underline" href="javascript:OpenWindowCenter('','_ContactUs',600,552,false,'Request More Info',false);" rel="nofollow">
Apply Here
</a>

									</div>

								

						<div class="ButtonLink">

							<a class="textLink" href="javascript:_mediaViewerUrl = '#'; OpenMediaViewer(0);" rel="nofollow"  target="_self"  >

					<img src="http://images.ebizautos.com/gallery/photo.png" alt="" />View: <?php echo $row_slct_vehicles['vphoto_count']; ?> Photos

							</a>

						</div>

					

						<div class="ButtonLink">


	<img src="http://images.ebizautos.com/gallery/notes.png" alt="2004 Chevrolet Express RV HIGH TOP LIMITED CONVERSIONS AWD Van Gold - View histoty report" />
    <a href="">
    CARFAX&nbsp;Report

							</a>

						</div>

					

					<div style="clear:both"></div>

				</td>

			

			</tr>

			

	</table>

</div>



		 

					

					</td>

				

				</tr>
</table>
</div>
<?php } while ($row_slct_vehicles = mysqli_fetch_assoc($slct_vehicles)); ?>


	</div><!--Container -->
</div><!--Main -->

</body>
</html>
