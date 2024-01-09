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
	$sql_query = "SELECT `vehicles`.`vid` AS record_id, `vehicles`.`vvin` AS vin, `vehicles`.`vstockno` AS stock_number, CONCAT(`vehicles`.`vyear`, ' ', `vehicles`.`vmake`, ' ', `vehicles`.`vmodel`, ' ', `vehicles`.`vtrim`) AS title,  CONCAT('www.', `dealers`.`website`, '/vehicle.php?vid=', `vehicles`.`vid`) AS url, NULL AS category, `vehicles`.`export_vast_photourls` AS images, `dealers`.`address` AS address, `dealers`.`city` AS city, `dealers`.`state` AS state, `dealers`.`zip` AS zip, 'USA' AS country, NULL AS seller_type, `dealers`.`company` AS dealer_name, `dealers`.`id` AS dealer_id, `dealers`.`leadsidsemail` AS dealer_email, `dealers`.`phone` AS dealer_phone, CONCAT('www.', `dealers`.`website`) AS dealer_website, NULL AS dealer_fee, `vehicles`.`vmake` AS make, `vehicles`.`vmodel` AS model, `vehicles`.`vtrim` AS trim, `vehicles`.`vbody` AS body, `vehicles`.`vmileage` AS mileage, `vehicles`.`vyear` AS year, 'USD' AS currency, `vehicles`.`vspecialprice` AS price, `vehicles`.`vecolor_txt` AS exterior_color, `vehicles`.`vicolor_txt` AS interior_color, NULL AS interior_material, `vehicles`.`vdoors` AS doors, `vehicles`.`vcylinders` AS cylinders, `vehicles`.`vengine` AS engine_size, `vehicles`.`vtransm` AS drive_type, `vehicles`.`vtransm` AS transmission, NULL AS cpo, NULL AS description, NULL AS standard_features, NULL AS optional_features, `vehicles`.`vcomments` AS seller_comments, `vehicles`.`vcondition` AS vehicle_condition, `vehicles`.`export_vast_listing_time` AS listing_time, `vehicles`.`export_vast_expire_time` AS expire_time  FROM $table";
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

//rename($root.$pathHere.$dealerfolder_file, $root.$pathHere.$company);


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