<table border="0" cellpadding="10" width="640" cellspacing="5">
<tr><td align="center" width="100%" bgcolor="#EEEEEE">
<?php
$bigphoto = $row_qryURLvehicle['vthubmnail_file'];
$climgsrc = "<img border='8' src='http://craigslist.autocitymag.com/$did/$vid/$bigphoto' width='640' height='480' />";
?>
<?php echo $climgsrc; ?>

</td></tr><tr><td bgcolor="#EEEEEE"><h1><?php echo $row_qryURLvehicle['vyear']; ?> <?php echo $row_qryURLvehicle['vmake']; ?> <?php echo $row_qryURLvehicle['vmodel']; ?></h1>
<p><?php echo $row_qryURLvehicle['vcomments']; ?></p></td></tr>
<tr><td align="center" bgcolor="#EEEEEE">

<?php
//////////////////////////////////////////Starts The Photoloop
do {
?>
<?php
$vtphoto = $row_showVehiclePhotos['photo_thumb_fname'];
$clvtimgsrc = "<img border='8' src='http://craigslist.autocitymag.com/$did/$vid/thumbs/$vtphoto' width='250' height='188' />";
?>
<?php echo $clvtimgsrc; ?>
<?php 
////////////////////////////////////////////Ends The Photo Loop
} while ($row_showVehiclePhotos = mysqli_fetch_assoc($showVehiclePhotos)); 
?>

</td></tr><tr><td bgcolor="#EEEEEE" align="center"><h2><?php echo $company; ?><br><?php echo $phone; ?><br><a href="<?php echo $website; ?>"><?php echo $website; ?></a></h2><p><a href="#" target="_blank">Won't Last Long</font></a></td></tr></table>