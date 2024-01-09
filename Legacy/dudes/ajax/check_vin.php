<?php require_once('db_admin.php'); ?>
<?php



$dudes_public_token  = $row_userDudes['dudes_public_token'];
$dudes_facebook_id = $row_userDudes['dudes_facebook_id'];

$dudes_facebook_deny  = $row_userDudes['dudes_facebook_deny'];
$dudes_facebook_email  = $row_userDudes['dudes_facebook_email'];
$dudes_facebook_name  = $row_userDudes['dudes_facebook_name'];

$dudes_dob = $row_userDudes['dudes_dob'];

$dudes_prefix_name  = $row_userDudes['dudes_prefix_name'];
$myfname = $row_userDudes['dudes_firstname'];
$mylname = $row_userDudes['dudes_lname'];
$myname = "$myfname $mylname";

$dealerTimezone = $row_userDudes['dudes_Timezone'];


$dudes_dob  = $row_userDudes['dudes_dob'];
$dudes_status  = $row_userDudes['dudes_status'];


$dudes_access_level  = $row_userDudes['dudes_access_level'];
$dudes_skillset_id = $row_userDudes['dudes_skillset_id'];

$dudes_email_internal = $row_userDudes['dudes_email_internal'];

$dudes_email_internal_verified  = $row_userDudes['dudes_email_internal_verified'];
$dudes_email_internal_active  = $row_userDudes['dudes_email_internal_active'];
$dudes_home_state = $row_userDudes['dudes_home_state'];
$dudes_email_personal = $row_userDudes['dudes_email_personal'];
$dudes_email_personal_verified  = $row_userDudes['dudes_email_personal_verified'];
$dudes_jobposition_title  = $row_userDudes['dudes_jobposition_title'];
$dudes_jobposition_shift  = $row_userDudes['dudes_jobposition_shift'];
$dudes_team_id  = $row_userDudes['dudes_team_id'];
$dudes_team_name  = $row_userDudes['dudes_team_name'];
$dudes_dma_id  = $row_userDudes['dudes_dma_id'];
$dudes_dma_name  = $row_userDudes['dudes_dma_name'];
$dudes_market_id = $row_userDudes['dudes_market_id'];
$dudes_market_id  = $row_userDudes['dudes_market_id'];
$dudes_market_name  = $row_userDudes['dudes_market_name'];
$dudes_submarket_id  = $row_userDudes['dudes_submarket_id'];
$dudes_submarket_name  = $row_userDudes['dudes_submarket_name'];
$dudes_department_id  = $row_userDudes['dudes_department_id'];
$dudes_department_name  = $row_userDudes['dudes_department_name'];
$dudes_salespitch_template_id  = $row_userDudes['dudes_salespitch_template_id'];
$dudes_cellphone  = $row_userDudes['dudes_cellphone'];
$dudes_workphone_active  = $row_userDudes['dudes_workphone_active'];

$dudes_Timezone = $row_userDudes['dudes_Timezone'];

if($dudes_skillset_id != '9'){
  //header("Location: $MM_restrictGoTo");
}


if($dealerTimezone){
$zone_from ='America/Chicago';
$zone_to= $dealerTimezone;
}else{
$zone_from ='America/Chicago';
$zone_to='America/New_York';
}
//date_default_timezone_set($zone_from);

//  $convert_date="2016-04-09 19:51:03";

//  echo $finalDate=zone_conversion_date($convert_date, $zone_from, $zone_to);


function zone_conversion_date($time, $cur_zone, $req_zone)
{   
	global $zone_from;
	global $zone_to;

    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d H:i:s");

    date_default_timezone_set($zone_from);
    $local = date("Y-m-d H:i:s");

    date_default_timezone_set($zone_to);
    $required = date("Y-m-d H:i:s");

    /* return $required; */
    $diff1 = (strtotime($gmt) - strtotime($local));
    $diff2 = (strtotime($required) - strtotime($gmt));

    $date = new DateTime($time);
    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");

    return $timestamp = $date->format("Y-m-d H:i:s");
}

function get_Datetime_Now() {
	
	global $zone_to;
	
	$tz_object = new DateTimeZone($zone_to);
	//date_default_timezone_set('America/New_York');
	$datetime = new DateTime();
	$datetime->setTimezone($tz_object);
	//return $datetime->format('m\-d\-Y\ h:i:s');		//06-18-2014 08:49:34
	return $datetime->format('Y\-m\-d\ h:i:s');  	//2014-06-18 08:47:46
	//return $datetime->format('Y\/m\/d\ ');  		//2014/06/18

}

$timevar = get_Datetime_Now();




$server_time = zone_conversion_date($timevar, $zone_from, $zone_to);


if(!$_POST) exit();

if(isset($_POST['vvin'])):

//print_r($_POST);
$VinNum = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vvin']));
$VinNumber = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vvin']));

if(isset($_POST['did'])){
$did = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['did']));
}


if(isset($_POST['prospctdlrid'])){
$prospctdlrid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospctdlrid']));
}


if(strlen($VinNum) != "17")
{
        //echo "The number of characters you have entered (".strlen($VinNum).") does not match a valid VIN number.";
		$showcreate_inventory = "$('div#add_vehicle_view_box').hide();";
		echo "
		<script type='text/javascript'>  

				if($('div#vin_highlight').hasClass('has-success')) {
					
					$('div#vin_highlight').addClass('has-error').removeClass('has-success');
					
				}else{
					$('div#vin_highlight').addClass('has-error');
				}

			
			$('input#pass_vin_good').val('N');
			$('input#vvin').prop('disabled', false);
			
			$showcreate_inventory
			
		</script>";

        exit;
}
 
$VinNum = strtoupper($VinNum);
$Model = array("A", "B", "C", "D", "E", "F", "G", "H", "J", "K", "L", "M", "N", "P", "R", "S", "T", "V", "W", "X", "Y");
$Weight = array("8", "7", "6", "5", "4", "3", "2", "10", "9", "8", "7", "6", "5", "4", "3", "2");
$Char = array("A", "B", "C", "D", "E", "F", "G", "H", "J", "K", "L", "M", "N", "P", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$CharVals = array("1", "2", "3", "4", "5", "6", "7", "8", "1", "2", "3", "4", "5", "7", "9", "2", "3", "4", "5", "6", "7", "8", "9", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
$VinChars = array();
 
$Counter = 0;
foreach ($Char as $CurrChar)
{
        $VinChars[$CurrChar] = $CharVals[$Counter];
        $Counter++;
}
 
$CheckDigits = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "X");
$Counter = 0;
$VinArray = array();
for ($i = 0; $i < 17; $i++)
{
        if ($i!=8)
        {
                $VinArray[$Counter] = substr($VinNum, $i, 1);
                $Counter++;
        }
}
 
$Total = 0;
for ($i = 0; $i < 16; $i++)
{
        $ThisDigit = $VinArray[$i];
        @$ThisTotal = $Weight[$i] * $VinChars[$ThisDigit];
        $Total = $Total + $ThisTotal;
}
 
$Remainder = fmod($Total, 11);
if (substr($VinNum, 8, 1)!= $CheckDigits[$Remainder])
{
        //echo "<div class='danger'>VIN: $VinNumber is not a valid vin.</div>";
		$showcreate_inventory = "$('div#add_vehicle_view_box').hide();";
		echo "
		<script>

				if($('div#vin_highlight').hasClass('has-success')) {
					
					$('div#vin_highlight').addClass('has-error').removeClass('has-success');
					
				}else{
					$('div#vin_highlight').addClass('has-error');
				}


			
			$('input#pass_vin_good').val('N');
			$('input#vvin').prop('disabled', false);
			

			
		</script>";
		
		
}
else
{
        
		$showcreate_inventory = "$('div#add_vehicle_view_box').show();";
		
		echo "
		<script>  
			

				if($('div#vin_highlight').hasClass('has-error')) {
					
					$('div#vin_highlight').addClass('has-success').removeClass('has-error');
					
				}else{
					$('div#vin_highlight').addClass('has-success');
				}

			$('input#pass_vin_good').val('Y');
			
			$('input#vvin').prop('disabled', true);
		
				
				
				

				
		</script>";
		//echo "<div class='safe'>VIN: $VinNumber is a valid vin.</div>";
}

endif;
?>	
<?php include("inc.end.phpmsyql.php"); ?>