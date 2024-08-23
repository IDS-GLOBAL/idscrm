<?php
$bigphoto5 = $row_qryURLvehicle['vthubmnail_file'];
$climgsrc5 = "<img border='8' src='http://craigslist.autocitymag.com/$did/$vid/$bigphoto5' width='350' height='263' style='border: 3 solid #000000; '> ";
?>
<table border="0" width="750" id="table1" cellspacing="0" cellpadding="0"><tr><td align="left">
<table border="0" cellpadding="5" width="100%" id="table2" cellspacing="5" height="10"><tr><td bgcolor="<?php $colorBG = $row_dlrSlctBySsnDid['craigslist_bg_ad_color']; if($colorBG == NULL){echo '#D0E1FB';} else{echo $colorBG;} ?>" align="left"><font face="Tahoma" size="5"><b><?php echo $vtitle; ?></b></font></td></tr></table>
<table align="center" border="0" width="750" id="table1" cellspacing="0" cellpadding="0"><tr><td align="center">
<table border="0" cellpadding="5" width="100%" id="table2" cellspacing="5" height="10">
<tr><td align="left" width="100%" bgcolor="<?php if($colorBG == NULL){echo '#FFFDCC';} else{echo $colorBG;} ?>">
<table border="0" width="100%" id="table3" cellspacing="0" cellpadding="0">
<tr><td width="33%" align="left" valign="top"><font face="Tahoma" size="2"><b>VIN #:</b><br><br><?php $vmiles1 = $row_qryURLvehicle['vmileage']; if($vmiles1 == NULL){echo '';} elseif($showhidemiles == 0){ echo '';} else{echo '<b>Mileage:</b><br><br>';} ?>
<b>Exterior Color: </b><br>
<br><b>Interior Color: </b><br><br><b>Transmission: </b><br><br>
<?php $iprice1 = $row_qryURLvehicle['vspecialprice']; if($iprice1 == NULL){echo '';} elseif($showhideprice == 0){ echo '';} else{echo '<b>SPECIAL PRICE: </b>';} ?>
</font></td><td width="33%" valign="top" align="left"><font face="Tahoma" size="2"><?php echo $vin; ?><br><br>
    <?php $vmiles2 = $row_qryURLvehicle['vmileage']; if($vmiles1 == NULL){echo '';} elseif($showhidemiles == 0){ echo '';} else{echo $vmiles2.'<br><br>';} ?>

    <?php echo $row_qryURLvehicle['vecolor_txt']; ?><br><br>
    <?php echo $row_qryURLvehicle['vicolor_txt']; ?><br><br>
    <?php echo $row_qryURLvehicle['vtransm']; ?><br><br>
<?php $iprice1 = $row_qryURLvehicle['vspecialprice']; if($iprice1 == NULL){echo '';} elseif($showhideprice == 0){ echo '';} else{echo '$'.$iprice1;} ?>
</font></td><td width="33%" valign="top"><?php echo $climgsrc5; ?></a></td></tr></table></td></tr>
<tr><td align="left" width="100%" bgcolor="<?php $colorBG1 = $row_dlrSlctBySsnDid['craigslist_bg_ad_color']; if($colorBG1 == NULL){echo '#FFFDCC';} else{echo $colorBG1;} ?>"><h2><?php $askfor1 = $row_dlrSlctBySsnDid['craigslist_nickname']; if($askfor1 == NULL){echo '';} else{echo '<p><b>ASK FOR: </b>'.$askfor1.' '."<b>Call:</b> $dstorephone".'</p>';} ?>
<b>Additional Information: </b></h2><?php echo $vdescription; ?></td></tr>
<tr><td align="center" width="100%" height="20" bgcolor="<?php $colorBG1 = $row_dlrSlctBySsnDid['craigslist_bg_ad_color']; if($colorBG1 == NULL){echo '#FFFDCC';} else{echo $colorBG1;} ?>"><p align="center"><br>
<?php
//////////////////////////////////////////Starts The Photoloop
do {
?>
<?php
$vtphoto5 = $row_showVehiclePhotos5['photo_thumb_fname'];
$clvtimgsrc5 = "<img border='15' src='http://craigslist.autocitymag.com/$did/$vid/$vtphoto5' width='300' hspace='3' vspace='10' />";
?>
<a href="#">
<?php echo $clvtimgsrc5; ?>
</a>
<?php 
////////////////////////////////////////////Ends The Photo Loop
} while ($row_showVehiclePhotos5 = mysqli_fetch_assoc($showVehiclePhotos5)); 
?><br><br>

<p></p><font size="3" face="Tahoma"><b>Contact Information</b><br></font></b><font size="2" face="Tahoma"><?php echo $company; ?><br><?php echo $dstorephone; ?><br><a href="<?php echo $websturl; ?>"><?php echo $websturl; ?></a></font>
<p><a href="#" target="_blank"><font face="Tahoma" style="font-size: 8pt; font-weight: 700" color="#0000FF"></font></a></p>
</td></tr></table></td></tr></table></td></tr></table>
