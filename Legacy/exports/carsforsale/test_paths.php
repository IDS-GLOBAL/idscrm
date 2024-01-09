<?php



chdir(dirname(__FILE__));

echo $_SERVER['DOCUMENT_ROOT']; 
echo '<br />';
echo 'Dirname($_SERVER[PHP_SELF]: ' . dirname($_SERVER['PHP_SELF']) . '<br>';
echo '<br />';



//file_exists(realpath(dirname(__FILE__).'exports/carsforsale/60/inventory.txt'));
$filename = '60/inventory.txt';

if (file_exists($filename)) {
    echo "The file $filename exists";
} else {
    echo "The file $filename does not exist";
}







?>