<?php require_once("db.php"); ?>
<?php


//print_r($_POST);


$colname_check_managerperson_email = "-1";
if (isset($_POST['manager_username'])) {
  $colname_check_managerperson_email = $_POST['manager_username'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_check_managerperson_email =  "SELECT * FROM `idsids_idsdms`.`manager_person` WHERE `manager_person`.`manager_username` = '$colname_check_managerperson_email'";
$check_managerperson_email = mysqli_query($idsconnection_mysqli, $query_check_managerperson_email);
$row_check_managerperson_email = mysqli_fetch_assoc($check_managerperson_email);
$totalRows_check_managerperson_email = mysqli_num_rows($check_managerperson_email);

if($totalRows_check_managerperson_email == 0){
echo "
<small class='safe'>This Username Is Okay To Use</small>
<script> 
$('#managerperson_username_okaybox').addClass('has-success');

</script>";
}else{
echo "
<small class='danger'>This Username Is Not Okay To Use</small>
<script> 
$('#managerperson_username_okaybox').addClass('has-error');

</script>
";
}
?>