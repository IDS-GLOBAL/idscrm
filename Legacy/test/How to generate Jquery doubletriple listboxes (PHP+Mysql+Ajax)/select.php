<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);

include("conndb.php");

function createoptions($table , $id , $field , $condition_field , $value)
{
    $sql =  "select * from $table WHERE $condition_field=%d ORDER BY $field" , $value);
    $res = mysqli_query($idsconnection_mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($a = mysqli_fetch_assoc($res))
        $out[] = "{optionValue: {$a[$id]}, optionDisplay: '$a[$field]'}";
        return "[" . implode("," , $out) . "]";
    } else

        return "[{optionValue: -1 , optionDisplay: 'No result'}]";
}

if (isset($_GET['cheverolet'])) {
    echo createoptions("yukon" , "yukon_id" , "yukon" , "cheverolet_id" , $_GET['cheverolet']);
}


die();
?>