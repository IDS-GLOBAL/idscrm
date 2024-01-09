<?php require_once("db.php"); ?>
<?php


//print_r($_POST);


$colname_check_salesperson_email = "-1";
if (isset($_POST['salesperson_username'])) {
  $colname_check_salesperson_email = $_POST['salesperson_username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_check_salesperson_email =  "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE `sales_person`.`salesperson_username` = '$colname_check_salesperson_email'";
$check_salesperson_email = mysqli_query($idsconnection_mysqli, $query_check_salesperson_email);
$row_check_salesperson_email = mysqli_fetch_assoc($check_salesperson_email);
$totalRows_check_salesperson_email = mysqli_num_rows($check_salesperson_email);

if($totalRows_check_salesperson_email == 0){
echo "
<small class='safe'>This Username Is Okay To Use</small>
<script> 
$('#salesperson_username_okaybox').addClass('has-success');

</script>";
}else{
echo "
<small class='danger'>This Username Is Not Okay To Use</small>
<script> 
$('#salesperson_username_okaybox').addClass('has-error');

</script>
";
}
?>