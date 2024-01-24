<?php



echo "<h1>http://www.w3schools.com/php/php_looping_for.asp</h1>";


echo '<h2>for_foreachloop.php</h2>';

//////////////////////// This is the start of the Inside LOOP ////////////////////////////////////
echo '<br />'."===========================================".'<br />';


/*

for (init counter; test counter; increment counter) {
    code to be executed;
}




*/

//////////////////////// This is the start of the Inside LOOP ////////////////////////////////////
echo '<br />'."===========================================".'<br />';



for ($x = 1; $x <= 15; $x++) {
    echo "The number is: $x <br>";
} 



//////////////////////// This is the start of the Inside LOOP ////////////////////////////////////
echo '<br />'."===========================================".'<br />';




//  The foreach loop works only on arrays, and is used to loop through each key/value pair in an array.

$colors = array("red", "green", "blue", "yellow"); 

foreach ($colors as $value) {
    echo "$value <br>";
}




?>