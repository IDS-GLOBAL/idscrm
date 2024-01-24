<?php
$vstock=$_GET["vstock"];

$vcon = mysql_connect('localhost', 'idsids_faith', 'benjamin2831');
if (!$vcon)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("idsids_idsdms", $vcon);

$sql="SELECT * FROM vehicles WHERE did = 19 AND vstockno = '".$vstock."'";

$vresult = mysqli_query($idsconnection_mysqli, $sql);

	
		echo "<table border='0' cellpadding='3' cellspacing='3'>
		<tr>
		<th align='center'>Stock</th>
		<th align='center'>Condition</th>
		<th align='center'>VIN</th>
		<th align='center'>Year</th>
		<th align='center'>Make</th>
		<th align='center'>Model</th>
		<th align='center'>Trim</th>
		<th align='center'>Retail Price</th>
		<th align='center'>DownPayment Price</th>
		<th align='center'>Internet Price</th>
		</tr>";
	
	
			while($vrow = mysql_fetch_array($vresult))
			  {
			  echo "<tr>";
			  echo "<td>" . $vrow['vstockno'] . "</td>";
			  echo "<td align='center'>" . $vrow['vcondition'] . "</td>";
			  echo "<td>" . $vrow['vvin'] . "</td>";
			  echo "<td>" . $vrow['vyear'] . "</td>";
			  echo "<td>" . $vrow['vmake'] . "</td>";
			  echo "<td>" . $vrow['vmodel'] . "</td>";
			  echo "<td>" . $vrow['vtrim'] . "</td>";
			  echo "<td>" . $vrow['vrprice'] . "</td>";
			  echo "<td>" . $vrow['vdprice'] . "</td>";  
			  echo "<td>" . $vrow['vspecialprice'] . "</td>";    
			  echo "</tr>";
			  }
			echo "</table>";

	
mysql_close($vcon);
?>