<?php


echo '<br /><br /><br /><br /><br /><br />';

function calcPmt( $amount_tofinance , $interest_rate, $finance_months ) {

$int = $interest_rate/1200;
$int1 = 1+$int;
$r1 = pow($int1, $finance_months);

$pmt = $amount_tofinance*($int*$r1)/($r1-1);

    return $pmt;

}

echo round(calcPmt( 12995, 23.0, 72 ), 2 );

?>