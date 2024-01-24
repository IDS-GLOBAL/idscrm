<?php
$q=$_GET["q"];

$con = mysql_connect('localhost', 'idsids_faith', 'benjamin2831');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("idsids_idsdms", $con);

$sql="SELECT * FROM car_model WHERE make_id = '".$q."'";

$result = mysqli_query($idsconnection_mysqli, $sql);

echo "<table border='1'>
<tr>
<th>Make ID</th>
<th>Make Name</th>
<th>Model Name</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['make_id'] . "</td>";
  echo "<td>" . $row['make'] . "</td>";
  echo "<td>" . $row['model'] . "</td>";
  //echo "<td>" . $row['Hometown'] . "</td>";
  //echo "<td>" . $row['Job'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>