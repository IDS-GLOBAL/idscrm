<?php

if(!$_POST) exit();

$con=mysqli_connect("localhost", "idsids_faith", "benjamin2831", "idsids_idsdms");
$db=mysqli_select_db("idsids_idsdms");

$vstockno = mysqli_real_escape_string($con, $_POST['vstockno']);
$vstockno = strtoupper($vstockno);


if(isset($_POST['did'])){

$did = mysqli_query($con, $_POST['did']);

$insert_these_dids = "`did`='$did' AND ";

	}elseif(isset($_POST['prospctdlrid'])){
$prospctdlrid = mysqli_real_escape_string($con, $_POST['prospctdlrid']);
	
$insert_these_dids = "`prospctdlrid`='$prospctdlrid' AND ";	
	
	}else{

$insert_these_dids = "";

	}


$checkstockno = mysqli_query($con, "SELECT `vstockno`, `vid` FROM `idsids_idsdms`.`vehicles` WHERE $insert_these_dids `vstockno` = '$vstockno'");
$check_num_rows = mysqli_num_rows($checkstockno);
//echo $check_num_rows;

if($vstockno == NULL)
echo 'Please Enter Vehicle Stock Number';	
else if(strlen($vstockno) <4)
echo 'Too Short';

else
{
	if($check_num_rows==0){
	echo "<div class='safe'>Yes! This Stock Number '$vstockno' <br /> Is Available To Use. <input id='vinstockpassornot' type='hidden' value='1'></div>";
	
	echo "<script type='text/javascript'>



				if($('div#stock_highlight').hasClass('has-error')) {
					
					$('div#stock_highlight').addClass('has-success').removeClass('has-error');
					
				}else{
					$('div#stock_highlight').addClass('has-success');
				}


		$('input#pass_stock_good').val('Y');
		
	</script>";
	
	
	}elseif($check_num_rows == 1){

	while($vrow = mysqli_fetch_array($checkstockno))
			  {
		$vid=$vrow['vid'];
	
	echo "<div class='danger'>Sorry! Stock Number '$vstockno' <br /> IS Already In USE <a href='inventory.edit.php?vid=$vid' target='_blank'>To View/Edit Vehicle...</a> <br /> or change please.</div>";
	
	echo  "<input id='vinstockpassornot' type='hidden' value='0'>";
	echo "<script type='text/javascript'>

				if($('div#stock_highlight').hasClass('has-success')) {
					
					$('div#stock_highlight').addClass('has-error').removeClass('has-success');
					
				}else{
					$('div#stock_highlight').addClass('has-error');
				}


		$('input#pass_stock_good').val('N');
		
	</script>";

	
			  }

	}
}
mysqli_close($con);
?>