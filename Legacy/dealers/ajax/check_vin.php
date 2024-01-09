<?php require_once('db.php');  ?>
<?php

if(isset($_POST['vvin'])):

//print_r($_POST);
$VinNum = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vvin']));
$VinNumber = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['vvin']));



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
