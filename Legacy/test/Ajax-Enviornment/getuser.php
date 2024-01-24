<?php
$appid=$_GET["appid"];

//$ajxdid=$did;

$con = mysql_connect('localhost', 'idsids_faith', 'benjamin2831');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("idsids_idsdms", $con);

$sql="SELECT * FROM credit_app_fullblown WHERE applicant_did = 19 AND credit_app_fullblown_id = '".$appid."'";

$result = mysqli_query($idsconnection_mysqli, $sql);

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Employer</th>
<th>City</th>
<th>State</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['applicant_fname'] . "</td>";
  echo "<td>" . $row['applicant_lname'] . "</td>";
  echo "<td>" . $row['applicant_employer1_name'] . "</td>";
  echo "<td>" . $row['applicant_present_addr_city'] . "</td>";
  echo "<td>" . $row['applicant_present_addr_state'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>