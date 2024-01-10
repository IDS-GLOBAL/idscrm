<?php require_once('db_admin.php'); ?>
<?php
if(!$_POST)exit();


print_r($_POST);





if(isset($_POST['dudesid'], $_POST['car_year'], $_POST['car_makeid'], $_POST['car_make_text'], $_POST['car_model'], $_POST['car_trim'])){
	
	
	
	
	$dudesid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['dudesid']));
	$car_year = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['car_year']));
	$car_makeid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['car_makeid']));
	$car_make_text = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['car_make_text']));
	$car_model = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['car_model']));
	$car_trim = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['car_trim']));





	$sql_create_make_model = "
		INSERT INTO `idsids_idsdms`.`car_model` SET
			`make_id` = '$car_makeid',
			`make` = '$car_make_text',
			`model` = '$car_model',
			`vyear` = '$car_year'

			
	";
	
		$run_create_make_model_sql = mysqli_query($idsconnection_mysqli, $sql_create_make_model);

	
	
	echo '<i>Created: '."<strong> $car_year $car_make_text $car_model $car_trim </strong> </i>".'<br />';
	
	
	echo "<script>
	
	setTimeout( window.location.assign('create.make-models.php'), 7000);
	
	</script>";
}

?>