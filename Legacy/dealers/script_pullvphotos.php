<?php include("db_loggedin.php"); ?>
<?php
?>






  <?php do { ?>
  
    <p>
		<?php echo $row_find_vehicle_photos['photo_file_name']; ?>
    	<?php echo $row_find_vehicle_photos['photo_file_path']; ?>
    </p>
    
	<?php } while ($row_find_vehicle_photos = mysqli_fetch_array($find_vehicle_photos)); ?>
