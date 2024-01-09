<?php require_once('db_admin.php'); ?>
<?php

/***
sorry To Late to rename it to ajax
but we are going to write and load a new category at the same time below.


**/

if(!$_POST) exit();

print_r($_POST);


if(isset($_POST['sys_template_cat_type_label'], $_POST['sys_template_cat_id'])){



$sys_template_cat_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sys_template_cat_id']));
$sys_template_cat_type_label = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['sys_template_cat_type_label']));







echo $update_system_category_sql = "
UPDATE `idsids_tracking_idsvehicles`.`dudes_sys_template_cats` SET
	`sys_template_cat_dudes_id` = '$dudesid',
	`sys_template_cat_type_label` = '$sys_template_cat_type_label'
	WHERE
	`sys_template_cat_id` = '$sys_template_cat_id'
";



$ran_updated_system_category_sql = mysqli_query($tracking_mysqli, $update_system_category_sql);
$sys_template_cat_id = mysqli_insert_id($tracking_mysqli);


exit();


mysql_select_db($tracking_mysqli, $database_tracking);
$sys_template_cats_sql = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_sys_template_cats` ORDER BY `sys_template_cat_type_label` ASC";
$query_sys_template_cats = mysqli_query($idsconnection_mysqli, $sys_template_cats_sql, $tracking);
$row_sys_template_cats = mysqli_fetch_array($query_sys_template_cats);
$totalRows_sys_template_cats  = mysqli_num_rows($query_sys_template_cats);


 echo '<option value="">'.'Select One'.'</option>';
 do {
  echo "<option value='".$row_sys_template_cats['sys_template_cat_id']."'>".$row_sys_template_cats['sys_template_cat_type_label']."</option>";
  
} while ($row_sys_template_cats = mysqli_fetch_array($query_sys_template_cats));  
 echo '<option value="Other">'.'Other'.'</option>';



}
?>