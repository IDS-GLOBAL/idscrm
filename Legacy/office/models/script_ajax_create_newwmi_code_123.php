<?php require_once('../db_admin.php'); ?>
<?php

if(!$_POST) exit();




if (isset($_POST['car_make_text'], $_POST['car_wmi_code_123'])) {


    $car_wmi_code_123  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['car_wmi_code_123']));
    $car_make_text  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['car_make_text']));

    // echo $car_make_text;
    // echo "<br />";
    // echo $car_wmi_code_123;

    $query_find_dealer_prospects = "
        INSERT INTO `idsids_idsdms`.`vvin_wmionetwothree` SET
         `vvin_wmi_code` = '$car_wmi_code_123',
         `vvin_wmi_manuf` = '$car_make_text'

    ";

    $run_update_toinvoices_recurring = mysqli_query($idsconnection_mysqli, $query_find_dealer_prospects);
    $new_year_id = mysqli_insert_id($idsconnection_mysqli);


    echo "<script>
        
        $('input#car_wmi_code_123').val('');
        $('select#select#car_make').val('');

    </script>";
}

?>