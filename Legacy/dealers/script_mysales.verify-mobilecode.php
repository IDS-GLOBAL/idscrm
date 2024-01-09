<?php require_once("db_sales_loggedin.php"); ?>
<?php

//print_r($_POST);


if(!$_POST) exit();




if(isset($_POST['mobile_number_verifycode'])){
	
	
			$mobile_number_verifycode = mysqli_real_escape_string($idsconnection_mysqli,trim($_POST['mobile_number_verifycode']));
			$user_token = mysqli_real_escape_string($idsconnection_mysqli,trim($tkey));
			
			
			$salesperson_mobile_tempcode  = $row_userDets['salesperson_mobile_tempcode'];
			
			$reason = "NO";
			
			if($salesperson_mobile_tempcode == $_POST['mobile_number_verifycode']){

						$sid = mysqli_real_escape_string($idsconnection_mysqli,trim($row_userDets['salesperson_id'])); //Hackishere
			
						$query_salespersonmobile_update_sql = "
							UPDATE `idsids_idsdms`.`sales_person` SET
							`salesperson_mobile_optin` = '1',
							`salesperson_mobile_optindate` = '$timevar'
							WHERE
							`salesperson_id` = '$sid'
						";
							
						$ran_salespersonmobile_update_sql = mysqli_query($idsconnection_mysqli, $query_salespersonmobile_update_sql);
			$reason = "YES";						
			}



if($reason == 'YES'){

echo "
<script>

 	mobile_workedyes();
 
	$('div#mobilesettingsviewerModal').modal({backdrop:'static',keyboard:false, show:true});
	
	console.log('YES Matched To Run: ');

</script>
";


}else if($reason == 'NO') {

echo "
<script>

 	mobile_workedno();
 
	$('div#mobilesettingsviewerModal').modal({backdrop:'static',keyboard:false, show:true});
	
	console.log('No Matched Ran: ');
	
</script>
";

}




	
	
}

?>