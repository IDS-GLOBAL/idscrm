<?php require_once('db.php');  ?>
<?php

if(!$_POST) exit;

$themake = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['themake']));

print_r($themake);


$find_makes_sql = "SELECT * FROM `idsids_idsdms`.`car_model` WHERE `car_model`.`make` = '$themake'";
$query = mysqli_query($idsconnection_mysqli, $find_makes_sql);

//echo mysql_error();

$myarray=array();


 echo '<option value="">'.'Select One'.'</option>';
 echo '<option value="Other">'.'Other'.'</option>';

while($row=mysqli_fetch_array($query)){

  echo "<option value='".$row['model']."'>".$row['model']."</option>";
}
  echo "<option value='notlisted'>Not Listed</option>";


//echo $query;
//echo $str;



?>