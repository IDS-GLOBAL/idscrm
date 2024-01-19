<?php
/*
 * This function divides integer value by commas. F.e. 
 * http://php.net/manual/en/function.money-format.php
 * formatMoney($variable , true)
 * echo formatMoney(1050).'<br>'; # 1,050 
 * echo formatMoney(1321435.4, true).'<br>'; # 1,321,435.40 
 * echo formatMoney(10059240.42941, true).'<br>'; # 10,059,240.43 
 * echo formatMoney(13245).'<br>'; # 13,245 

*/



//	US national format, using () for negative numbers
setlocale(LC_MONETARY, 'en_US.UTF-8');


// Function To Calculate Money without commas.
function formatMoney($number, $fractional=false) { 
    if ($fractional) { 
        $number =  '%.2f', $number); 
    } 
    while (true) { 
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
        if ($replaced != $number) { 
            $number = $replaced; 
        } else { 
            break; 
        } 
    } 
    return $number; 
} 


/*
*	The Above Script is necessary for
*	Local and money format
*/


?>