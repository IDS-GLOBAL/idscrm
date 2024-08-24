<?php require_once('../db_admin.php'); ?>
<?php

if(!$_POST) exit();




if (isset($_POST['inputNewSystemYear'])) {


    $inputNewSystemYear  = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['inputNewSystemYear']));

    echo $inputNewSystemYear;

    $query_find_dealer_prospects = "
        INSERT INTO `idsids_idsdms`.`auto_years` SET
         `year` = '$inputNewSystemYear'

    ";

    $run_update_toinvoices_recurring = mysqli_query($idsconnection_mysqli, $query_find_dealer_prospects);
    $new_year_id = mysqli_insert_id($idsconnection_mysqli);


    echo "<script>
        
        $('input#inputNewSystemYear').val('');

    </script>";

}

?>