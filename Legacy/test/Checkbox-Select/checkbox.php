<?php
//****************************************************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
// Read the Disclaimer  at http://www.plus2net.com/terms.html  before using this script ////
/// You can use it at your own risk. /////
///////////////////////  Visit www.plus2net.com for more such script and codes.
////////                    Read the readme file before using             /////////////////////
//////////////////////////
//*****************************************************************************
?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Plus2net.com Checkbox script in PHP</title>
</head>

<body >
<?php
require "config.php";           // All database details will be included here 

// updating the record if form is submitted ////////
// This section will come into picture if the form is submitted // 
@$todo=$_POST['todo']; // take care of register global if off
if(isset($todo) and $todo=="submit_form"){
$days_array=$_POST['days_array'];
$tag_string="";
while (list ($key,$val) = @each ($days_array)) {
//echo "$val,";
$tag_string.=$val.",";
}
$tag_string=substr($tag_string,0,(strLen($tag_string)-1));
if(mysqli_query($idsconnection_mysqli, "update plus_week set days='$tag_string' where  userid='smo' ")){
echo "Data Updated<br>"; 
}else{echo mysql_error();}

}
// End of updating the record ////

//////// Displaying the days ///////////
$query="select days from plus_week where userid='smo' ";
$row=mysql_fetch_object(mysqli_query($idsconnection_mysqli, $query));
$days_array=split(",",$row->days);
$qt=mysqli_query($idsconnection_mysqli, "select * from plus_weekdays ");

echo "<form method=post action=''><input type=hidden name=todo value=submit_form>";
 echo "<table border='0' width='50%' cellspacing='0' cellpadding='0' align=center>";
$st="";
while($noticia=mysql_fetch_array($qt)){

if(@$bgcolor=='#f1f1f1'){$bgcolor='#ffffff';}
else{$bgcolor='#f1f1f1';}
if(in_array($noticia['day_no'],$days_array)){$st="checked";}
else{$st="";}
 echo "<tr bgcolor='$bgcolor'>
<td class='data'><input type=checkbox name=days_array[] value='$noticia[day_no]' $st> $noticia[days]</td></tr>";
 
}
echo  "</table>
<input type=submit value=update></form>
</center>";


?>
