<?php require_once('db_admin.php'); ?>
<?php

/***
sorry To Late to rename it to ajax
but we are going to write and load a new category at the same time below.


**/

if(!$_POST) exit();

print_r($_POST);


if(isset($_POST['new_category_enter'])){




$sys_template_cat_type_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['new_category_enter']));







echo $insert_system_category_sql = "
INSERT INTO `idsids_tracking_idsvehicles`.`dudes_sys_template_cats` SET
	`sys_template_cat_dudes_id` = '$dudesid',
	`sys_template_cat_type_label` = '$sys_template_cat_type_label'
";



$run_system_category_sql = mysqli_query($tracking_mysqli, $insert_system_category_sql);
$sys_template_cat_id = mysqli_insert_id($tracking_mysqli);





$sys_template_cats_sql = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_sys_template_cats` ORDER BY `sys_template_cat_type_label` ASC";
$query_sys_template_cats = mysqli_query($tracking_mysqli, $sys_template_cats_sql);
$row_sys_template_cats = mysqli_fetch_array($query_sys_template_cats);
$totalRows_sys_template_cats  = mysqli_num_rows($query_sys_template_cats);


 echo '<option value="">'.'Select One'.'</option>';
 do {
  echo "<option value='".$row_sys_template_cats['sys_template_cat_id']."'>".$row_sys_template_cats['sys_template_cat_type_label']."</option>";
  
} while ($row_sys_template_cats = mysqli_fetch_array($query_sys_template_cats));  
 echo '<option value="Other">'.'Other'.'</option>';



}
?>