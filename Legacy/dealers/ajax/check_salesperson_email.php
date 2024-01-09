<?php require_once("db.php"); ?>
<?php


//print_r($_POST);


$colname_check_salesperson_email = "-1";
if (isset($_POST['salesperson_email'])) {
  $colname_check_salesperson_email = $_POST['salesperson_email'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_check_salesperson_email =  "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE `sales_person`.`salesperson_email` = '$colname_check_salesperson_email'";
$check_salesperson_email = mysqli_query($idsconnection_mysqli, $query_check_salesperson_email);
$row_check_salesperson_email = mysqli_fetch_assoc($check_salesperson_email);
$totalRows_check_salesperson_email = mysqli_num_rows($check_salesperson_email);

if($totalRows_check_salesperson_email == 0){
echo "
<small class='safe'>This Email Address Is Okay To Use</small>
<script> 
$('input#pass_salesperson_email').prop( 'checked', true );
$('#sales_person_email_okaybox').addClass('has-success');
$('input#pass_salesperson_email').val(1);
</script>";
}else{
echo "
<small class='danger'>Sorry This Email Address Is Not Okay To Use</small>
<script> 
$('input#pass_salesperson_email').prop( 'checked', false );
$('input#pass_salesperson_email').val(0);
$('#sales_person_email_okaybox').addClass('has-error');

</script>
";
}
?>