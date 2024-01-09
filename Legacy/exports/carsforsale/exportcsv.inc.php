<?php
 
function exportMysqlToCsv($table,$Rfilename = "inventory.txt")
{
	global $ddid;
	global $dealerfolder;
	global $dealerfolder_file;
	global $truefilename;
	global $company;
	global $table;

	$csv_terminated = "\n";
	$csv_separator = ",";
	$csv_empty = '""';
	$csv_enclosed = '"';
	$csv_escaped = "\\";
	$sql_query = "SELECT vehicles.vid, vehicles.vcondition, vehicles.vvin, vehicles.vstockno, vehicles.vmake, vehicles.vmodel, vehicles.vyear, vehicles.vtrim, vehicles.vbody, vehicles.vmileage, vehicles.vengine, vehicles.vcylinders, vehicles.vfueltype, vehicles.vtransm, vehicles.vrprice, vehicles.vecolor_txt, vehicles.vicolor_txt, vehicles.vehicleOptionsBulk, vehicles.vcomments, vehicles.export_cfs_photourls FROM vehicles $table";
	//$sql_query = "$query_cfs_exportquery";
 
 //echo $sql_query;
	// Gets the data from the database
	$result = mysqli_query($idsconnection_mysqli, $sql_query);
	$fields_cnt = mysql_num_fields($result);
 
 
	$schema_insert = '';
 
	for ($i = 0; $i < $fields_cnt; $i++)
	{
		$l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
			stripslashes(mysql_field_name($result, $i))) . $csv_enclosed;
		$schema_insert .= $l;
		$schema_insert .= $csv_separator;
	} // end for
 
	$out = trim(substr($schema_insert, 0, -1));
	$out .= $csv_terminated;
 
	// Format the data
	while ($row = mysql_fetch_array($result))
	{
		$schema_insert = '';
		for ($j = 0; $j < $fields_cnt; $j++)
		{
			if ($row[$j] == '0' || $row[$j] != '')
			{
 
				if ($csv_enclosed == '')
				{
					$schema_insert .= $row[$j];
				} else
				{
					$schema_insert .= $csv_enclosed .
					str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
				}
			} else
			{
				$schema_insert .= '""';
			}
 
			if ($j < $fields_cnt - 1)
			{
				$schema_insert .= $csv_separator;
			}
		} // end for
 
		$out .= $schema_insert;
		$out .= $csv_terminated;
	} // end while


$myfile = fopen($truefilename, "w") or die("Unable to open file!");

fwrite($myfile, $out);
fclose($myfile);

copy($root.$pathHere.$truefilename, $root.$pathHere.$dealerfolder_file);

/*
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Content-Length: " . strlen($out));
	// Output to browser with appropriate mime type, you choose ;)
	header("Content-type: text/x-csv");
	//header("Content-type: text/csv");
	//header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=$filename");
	echo $out;
	exit;

*/

}
 
?>