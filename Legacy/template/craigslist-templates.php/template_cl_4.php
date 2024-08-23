<table align="center" border="0" width="750" id="table1" cellspacing="0" cellpadding="0" bgcolor="<?php $colorBG1 = $row_dlrSlctBySsnDid['craigslist_bg_ad_color']; if($colorBG1 == NULL){echo '#FFFFFF';} else{echo $colorBG1;} ?>">
<tr><td align="center"><font face="Georgia" size="6"><?php echo $vtitle; ?><br></font>
<table border="0" cellpadding="5" width="100%" id="table2" cellspacing="5" height="10">
<tr><td align="center" width="25%"><font face="Tahoma" size="2"><b><u>VIN #:</u></b><br><?php echo $vin; ?></font></td>
<td align="center" width="25%"><font face="Tahoma" size="2"><b><u>Color:</u></b><br><?php echo $vecolor; ?></font></td>
<td align="center" width="25%"><font face="Tahoma" size="2"><b><u>Transmission:</u></b><br><?php echo $vtrans; ?></font></td>
<td align="center" width="25%"><font face="Tahoma" size="2">
<?php $iprice4 = $row_qryURLvehicle['vspecialprice']; if($iprice4 == NULL){echo '';} elseif($showhideprice == 0){ echo '';} else{echo "<b><u>Price:</u></b><br>$iprice3";} ?>
</font></td>
<td align="center" width="25%"><font face="Tahoma" size="2"><?php $vmiles4 = $row_qryURLvehicle['vmileage']; if($vmiles4 == NULL){echo '';} elseif($showhidemiles == 0){ echo '';} else{echo "<b><u>Mileage:</u></b><br>$mileage";} ?></font></td></tr>
<tr><td align="center" width="100%" colspan="4"><font face="Tahoma" size="2"><b><u>Additional Information:</u></b></font><br />
<font face="Tahoma" size="2"><?php echo $vdescription; ?><br /><?php $askfor1 = $row_dlrSlctBySsnDid['craigslist_nickname']; if($askfor1 == NULL){echo '';} else{echo '<p><b>ASK FOR: </b>'.$askfor1.' '."<b>Call:</b> $dstorephone".'</p>';} ?></font></td></tr>
<tr><td align="center" width="100%" colspan="4" height="20"><br>
<?php
//////////////////////////////////////////Starts The Photoloop
do {
?>
<?php
$vtphoto4 = $row_showVehiclePhotos4['photo_thumb_fname'];
$clvtimgsrc4 = "<img border='8' src='http://craigslist.autocitymag.com/$did/$vid/$vtphoto4' width='400' />";
?>
<a href="#">
<?php echo $clvtimgsrc4; ?>
</a>
<?php 
////////////////////////////////////////////Ends The Photo Loop
} while ($row_showVehiclePhotos4 = mysqli_fetch_assoc($showVehiclePhotos4)); 
?>
<br><br>
<p><font face="Tahoma" size="3"><b><u><br>Contact Information</u></b></font><br>
<h1><?php echo $dcompany; ?></h1><font face="Tahoma"><h2><?php echo $daddr; ?><br /><?php echo $city; ?>, <?php echo $state; ?>&nbsp;&nbsp;&nbsp; <?php echo $dzip; ?></h2><?php echo $dslogan; ?><br>Call Us Today: <?php echo $dstorephone; ?><br><a href="<?php echo $websturl; ?>"><?php echo $websturl; ?></a></font>
<p><a href="#" target="_blank"><font face="Tahoma" style="font-size: 8pt; font-weight: 700" color="#0000FF">Please See Store For Details</font></a></td></tr></table></td></tr></table>
