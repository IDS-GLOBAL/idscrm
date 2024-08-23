<?php
$bigphoto = $row_qryURLvehicle['vthubmnail_file'];
$climgsrc = "<img border='8' src='http://craigslist.autocitymag.com/$did/$vid/$bigphoto' width='640' height='480' />";
?>
<table border="0" cellpadding="10" width="750" cellspacing="5">
<tr><td align="center" width="100%" bgcolor="<?php $colorBG1 = $row_dlrSlctBySsnDid['craigslist_bg_ad_color']; if($colorBG1 == NULL){echo '#EEEEEE';} else{echo $colorBG1;} ?>">
<?php echo $climgsrc; ?>
</td></tr><tr><td bgcolor="<?php $colorBG1 = $row_dlrSlctBySsnDid['craigslist_bg_ad_color']; if($colorBG1 == NULL){echo '#EEEEEE';} else{echo $colorBG1;} ?>"><h1><?php echo $vtitle; ?></h1>
<?php $iprice1 = $row_qryURLvehicle['vspecialprice']; if($iprice1 == NULL){echo '';} elseif($showhideprice == 0){ echo '';} else{echo '<p><b>SPECIAL PRICE: </b>$'.$iprice1.'</p>';} ?>
<?php $vmiles1 = $row_qryURLvehicle['vmileage']; if($vmiles1 == NULL){echo '';} elseif($showhidemiles == 0){ echo '';} else{echo '<p><b>MILES: </b>'."$vmiles1".'</p>';} ?>
<?php $askfor1 = $row_dlrSlctBySsnDid['craigslist_nickname']; if($askfor1 == NULL){echo '';} else{echo '<p><b>ASK FOR: </b>'.$askfor1.' '."<b>Call:</b> $dstorephone".'</p>';} ?>
<p><?php echo $row_qryURLvehicle['vcomments']; ?></p></td></tr>
<tr><td align="center" bgcolor="<?php $colorBG1 = $row_dlrSlctBySsnDid['craigslist_bg_ad_color']; if($colorBG1 == NULL){echo '#EEEEEE';} else{echo $colorBG1;} ?>">
<?php
//////////////////////////////////////////Starts The Photoloop
do {
?>
<?php
$vtphoto = $row_showVehiclePhotos['photo_thumb_fname'];
$clvtimgsrc = "<img border='15' src='http://craigslist.autocitymag.com/$did/$vid/thumbs/$vtphoto' width='120' height='90' />";
?>
<?php echo $clvtimgsrc; ?>
<?php 
////////////////////////////////////////////Ends The Photo Loop
} while ($row_showVehiclePhotos = mysqli_fetch_assoc($showVehiclePhotos)); 
?>

</td></tr><tr><td bgcolor="<?php $colorBG1 = $row_dlrSlctBySsnDid['craigslist_bg_ad_color']; if($colorBG1 == NULL){echo '#EEEEEE';} else{echo $colorBG1;} ?>" align="center"><h1><?php echo $company; ?></h1><h2><?php echo $city; ?>, <?php echo $state; ?>&nbsp;&nbsp;&nbsp; <?php echo $dzip; ?><br>Call Us Today: <?php echo $dstorephone; ?><br><a href="<?php echo $website; ?>"><?php echo $website; ?></a></h2><p><b>*** Please Contact Us For More Details ***</font></b></td></tr></table>