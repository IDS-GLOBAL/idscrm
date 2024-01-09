<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection, $database_idsconnection); 



$colname_queryDealer = "-1";
if (isset($_GET['id'])) {
  $colname_queryDealer = $_GET['id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryDealer =  "SELECT * FROM dealers WHERE id = '$colname_queryDealer'";
$queryDealer = mysqli_query($idsconnection_mysqli, $query_queryDealer);
$row_queryDealer = mysqli_fetch_array($queryDealer);
$totalRows_queryDealer = mysqli_num_rows($queryDealer);

$colname_queryInvoice = "-1";
if (isset($_GET['invoice_id'])) {
  $colname_queryInvoice = $_GET['invoice_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryInvoice =  "SELECT * FROM `idsids_idsdms`.`ids_toinvoices`, `idsids_idsdms`.`dealers` WHERE ids_toinvoices.invoice_dealerid = dealers.id AND ids_toinvoices.invoice_id = $colname_queryInvoice";
$queryInvoice = mysqli_query($idsconnection_mysqli, $query_queryInvoice);
$row_queryInvoice = mysqli_fetch_array($queryInvoice);
$totalRows_queryInvoice = mysqli_num_rows($queryInvoice);

$invoice_id = $row_queryInvoice['invoice_id'];
$invoice_dealerid = $row_queryInvoice['invoice_dealerid'];
$invoice_number = $row_queryInvoice['invoice_number'];
$invoice_tokenid = $row_queryInvoice['invoice_tokenid'];
$invoice_dealerid = $row_queryInvoice['invoice_dealerid'];
$invoice_created_at = $row_queryInvoice['invoice_created_at'];


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_queryInvoices = "
SELECT * 
FROM 
	`idsids_idsdms`.`ids_toinvoices`, 
	`idsids_idsdms`.`dealers` 
WHERE 
	`ids_toinvoices`.`invoice_dealerid` = `dealers`.`id` 
ORDER BY 
`ids_toinvoices`.`invoice_status` ASC,
`ids_toinvoices`.`invoice_id` DESC
";
$queryInvoices = mysqli_query($idsconnection_mysqli, $query_queryInvoices);
$row_queryInvoices = mysqli_fetch_array($queryInvoices);
$totalRows_queryInvoices = mysqli_num_rows($queryInvoices);




mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_inVoice_chargestoinvoice = "
SELECT * FROM 
`idsids_idsdms`.`ids_chargestoinvoice`
LEFT JOIN `idsids_idsdms`.`ids_toinvoices`
    ON `ids_chargestoinvoice`.`charges_invoiceToken` = `ids_toinvoices`.`invoice_tokenid`  
     WHERE 
     `ids_toinvoices`.`payment_status` = 'UnPaid' 
     AND 
     `ids_toinvoices`.`invoice_status` = 'Active' 
     AND 
     `ids_toinvoices`.`payment_status` NOT IN ('Paid') 
     GROUP BY
    `ids_chargestoinvoice`.`charges_id`
    ORDER BY 
		`ids_chargestoinvoice`.`charges_created_at` DESC
		LIMIT 100
     ";
$inVoice_chargestoinvoice = mysqli_query($idsconnection_mysqli, $query_inVoice_chargestoinvoice);
$row_inVoice_chargestoinvoice = mysqli_fetch_array($inVoice_chargestoinvoice);
$totalRows_inVoice_chargestoinvoice = mysqli_num_rows($inVoice_chargestoinvoice);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fees = "SELECT * FROM `idsids_idsdms`.`ids_fees` ORDER BY `ids_fees`.`fee_type` ASC ";
$fees = mysqli_query($idsconnection_mysqli, $query_fees);
$row_fees = mysqli_fetch_array($fees);
$totalRows_fees = mysqli_num_rows($fees);


// update-recurring-invoice.php?invoice_id=11

$nextme = $colname_queryInvoice;
$nextme++;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div class="subblock">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines2">
              <tr>
                <th width="60px">Actions</th>
                <th width="220px">Fee Select </th>
                <th width="180px">&amp; Description <a href="/idscrm/dudes/test/rip_live_invoices_from_main_table.php?invoice_id=<?php echo $nextme++; ?>">Next Me</a></th>
                <th width="80px">Qty.</th>
                <th width="90px">Price</th>
                <th width="52px">Total</th>
                <th>Taxable</th>
              </tr>
              
				
                
                
                
                              
              
<?php //include("invoice-line-items-update.php"); ?>


<tr>
                <td><img src='images/pimpa_no.gif' alt='picture' width='15' height='15' class='tabpimpa' /></td>
                <td>
                  <select name='fee_id1' id='fee_id' onchange='showFee1(this.value)'>
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id1']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id1']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem1">
                
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem1" type="hidden" value="1">
                <input type='text' name='fee_description1' id='fee_description' size='25' value='<?php echo $row_queryInvoice['fee_description1']; ?>' /></td>
				<td><input name='quantity1' type='text' id='quantity1' onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity1']; ?>" size='4' /></td>
				<td><input name='fee_price1' type='text' id='fee_price1' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price1']; ?>"  size='4' /></td>
				<td><input name='fee_amount1' type='text' id='fee_amount1' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount1']; ?>"  onFocus="" onBlur="sumForm()" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax1'],"Y"))) {echo "checked=\"checked\"";} ?> <?php if (!(strcmp($row_queryInvoice['tax1'],1))) {echo "checked=\"checked\"";} ?> name='tax1' id='tax1' type='checkbox' onchange='sumForm()' value="<?php echo $row_queryInvoice['tax1']; ?>" class='utc' /></td>
			  </tr>
			</table>
                    <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '1';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = mysqli_real_escape_string($idsconnection_mysqli, trim($row_queryInvoice['fee_id1']));
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description1']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity1'];
						
						$recur_charges_fee_price = mysqli_real_escape_string($idsconnection_mysqli, trim($row_queryInvoice['fee_price1']));
						$recur_charges_amount = mysqli_real_escape_string($idsconnection_mysqli, trim($row_queryInvoice['fee_amount1']));
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_1_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_1 = mysqli_query($idsconnection_mysqli, $check_1_sql);
					$row_check_1 = mysqli_fetch_array($query_check_1);
					$totalRows_check_1 = mysqli_num_rows($query_check_1);
			
					if($totalRows_check_1 == 0){
					
						echo $query_insert_1charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '1',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
						
						 $run_1_sql =  mysqli_query($idsconnection_mysqli, $query_insert_1charge_sql);
					
						if(!$recur_charges_fee_description){
							echo 'Wrote';
						 
						}else{
							echo 'Did Not Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id2" id="fee_id" onchange="showFee2(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id2']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id2']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem2">
                
                
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem2" type="hidden" value="2">
                <input type='text' name='fee_description2' id='fee_description' size='25' value='<?php echo $row_queryInvoice['fee_description2']; ?>' /></td>
				<td><input name='quantity2' type='text' id='quantity2'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity2']; ?>" size='4' /></td>

				<td><input name='fee_price2' type='text' id='fee_price2' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price2']; ?>" size='4' /></td>
				<td><input name='fee_amount2' type='text' id='fee_amount2' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount2']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax2'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax2' type='checkbox' class='utc' id='tax2' value="<?php echo $row_queryInvoice['tax2']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '2';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id2'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description1']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity2'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price2'];
						$recur_charges_amount = $row_queryInvoice['fee_amount2'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_2_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_2 = mysqli_query($idsconnection_mysqli, $check_2_sql);
					$row_check_2 = mysqli_fetch_array($query_check_2);
					$totalRows_check_2 = mysqli_num_rows($query_check_2);
			
					if($totalRows_check_2 == 0){
					
						echo $query_insert_2charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '2',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					
					$run_2_sql =  mysqli_query($idsconnection_mysqli, $query_insert_2charge_sql);	
						//
						if(!$recur_charges_fee_description){
							echo 'Did Not Write';
						
						  //	
						}else{
							
							
							echo 'Wrote';
								
						}
						
					}
				
				
				?>
                
                
                
				</div>
                  
                

                
                
                </td>
                
                
                </tr>


              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id3" id="fee_id" onchange="showFee3(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id3']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id3']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem3">
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem3" type="hidden" value="<?php echo $row_queryInvoice['lineitem3']; ?>">
                <input name='fee_description3' type='text' id='fee_description' value='<?php echo $row_queryInvoice['fee_description3']; ?>' size='25' /></td>
				<td><input name='quantity3' type='text' id='quantity3' onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity3']; ?>" size='4' /></td>
				<td><input name='fee_price3' type='text' id='fee_price3'  onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price3']; ?>" size='4' /></td>
				<td><input name='fee_amount3' type='text' id='fee_amount3' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount3']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax3'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax3' type='checkbox' class='utc' id='tax3' value="<?php echo $row_queryInvoice['tax3']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                     <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '3';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id3'];
						
						$recur_charges_fee_description = mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description3']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity3'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price3'];
						$recur_charges_amount = $row_queryInvoice['fee_amount3'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_3_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_3 = mysqli_query($idsconnection_mysqli, $check_3_sql);
					$row_check_3 = mysqli_fetch_array($query_check_3);
					$totalRows_check_3 = mysqli_num_rows($query_check_3);
			
					if($totalRows_check_3 == 0){
					
						echo $query_insert_3charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '3',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
						
						//
					
						if(!$recur_charges_fee_description){
							echo 'Did not Write';
						  //	
						}else{
						
							$run_3_sql =  mysqli_query($idsconnection_mysqli, $query_insert_3charge_sql);	
							echo 'Wrote';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>



              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id4" id="fee_id" onchange="showFee4(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id4']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id4']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);

  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem4">
                
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem4" type="hidden" value="<?php echo $row_queryInvoice['lineitem4']; ?>">
                <input type='text' name='fee_description4' id='fee_description4' size='25' value='<?php echo $row_queryInvoice['fee_description4']; ?>' /></td>
				<td><input name='quantity4' type='text' id='quantity4'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity4']; ?>" size='4' /></td>
				<td><input name='fee_price4' type='text' id='fee_price4' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price4']; ?>" size='4' /></td>
				<td><input name='fee_amount4' type='text' id='fee_amount4' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount4']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax4'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax4' type='checkbox' class='utc' id='tax4' value="<?php echo $row_queryInvoice['tax4']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                     <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '4';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id4'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description4']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity4'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price4'];
						$recur_charges_amount = $row_queryInvoice['fee_amount4'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_4_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_4 = mysqli_query($idsconnection_mysqli, $check_4_sql);
					$row_check_4 = mysqli_fetch_array($query_check_4);
					$totalRows_check_4 = mysqli_num_rows($query_check_4);
			
					if($totalRows_check_4 == 0){
					
						echo $query_insert_4charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '4',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					
					//
					
							
						if(!$recur_charges_fee_description){
							echo 'No Wrote';
						  //
						}else{
							$run_4_sql =  mysqli_query($idsconnection_mysqli, $query_insert_4charge_sql);	
							echo 'Yes  Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>



              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id5" id="fee_id" onchange="showFee5(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id5']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id5']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem5">
                
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem5" type="hidden" value="<?php echo $row_queryInvoice['lineitem5']; ?>">
                <input type='text' name='fee_description5' id='fee_description5' size='25' value='<?php echo $row_queryInvoice['fee_description5']; ?>' /></td>
				<td><input name='quantity5' type='text' id='quantity5'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity5']; ?>" size='4' /></td>
				<td><input name='fee_price5' type='text' id='fee_price5' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price5']; ?>" size='4' /></td>
				<td><input name='fee_amount5' type='text' id='fee_amount5' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount5']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax5'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax5' type='checkbox' class='utc' id='tax5' value="<?php echo $row_queryInvoice['tax5']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                     <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '5';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id5'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description5']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity5'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price5'];
						$recur_charges_amount = $row_queryInvoice['fee_amount5'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_5_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_5 = mysqli_query($idsconnection_mysqli, $check_5_sql);
					$row_check_5 = mysqli_fetch_array($query_check_5);
					$totalRows_check_5 = mysqli_num_rows($query_check_5);
			
					if($totalRows_check_5 == 0){
					
						echo $query_insert_5charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '5',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					
					//
					 
					
						if(!$recur_charges_fee_description){
							echo 'Wrote';
						  
						}else{
							
							$run_5_sql =  mysqli_query($idsconnection_mysqli, $query_insert_5charge_sql);	
							 
							echo 'Did Not Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>



              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id6" id="fee_id" onchange="showFee6(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id6']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id6']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem6">
                
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem6" type="hidden" value="<?php echo $row_queryInvoice['lineitem6']; ?>">
                <input type='text' name='fee_description6' id='fee_description6' size='25' value='<?php echo $row_queryInvoice['fee_description6']; ?>' /></td>
				<td><input name='quantity6' type='text' id='quantity6'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity6']; ?>" size='4' /></td>
				<td><input name='fee_price6' type='text' id='fee_price6' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price6']; ?>" size='4' /></td>
				<td><input name='fee_amount6' type='text' id='fee_amount6' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount6']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax6'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax6' type='checkbox' class='utc' id='tax6' value="<?php echo $row_queryInvoice['tax6']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                     <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '6';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id6'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description6']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity6'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price6'];
						$recur_charges_amount = $row_queryInvoice['fee_amount6'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_6_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_6 = mysqli_query($idsconnection_mysqli, $check_6_sql);
					$row_check_6 = mysqli_fetch_array($query_check_6);
					$totalRows_check_6 = mysqli_num_rows($query_check_6);
			
					if($totalRows_check_6 == 0){
					
						echo $query_insert_6charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '1',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					
				
					
						if(!$recur_charges_fee_description){
							echo 'No Write';
						  
						}else{
								$run_6_sql =  mysqli_query($idsconnection_mysqli, $query_insert_6charge_sql);	
							
							echo 'Yes Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>



              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id7" id="fee_id" onchange="showFee7(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id7']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id7']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem7">
                
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem7" type="hidden" value="<?php echo $row_queryInvoice['lineitem7']; ?>">
                <input type='text' name='fee_description7' id='fee_description7' size='25' value='<?php echo $row_queryInvoice['fee_description7']; ?>' /></td>
				<td><input name='quantity7' type='text' id='quantity7'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity7']; ?>" size='4' /></td>
				<td><input name='fee_price7' type='text' id='fee_price7' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price7']; ?>" size='4' /></td>
				<td><input name='fee_amount7' type='text' id='fee_amount7' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount7']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax7'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax7' type='checkbox' class='utc' id='tax7' value="<?php echo $row_queryInvoice['tax7']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '7';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id7'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description7']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity7'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price7'];
						$recur_charges_amount = $row_queryInvoice['fee_amount7'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_7_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_7 = mysqli_query($idsconnection_mysqli, $check_7_sql);
					$row_check_7 = mysqli_fetch_array($query_check_7);
					$totalRows_check_7 = mysqli_num_rows($query_check_7);
			
					if($totalRows_check_7 == 0){
					
						echo $query_insert_7charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '1',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					//
					
					
							
						if(!$recur_charges_fee_description){
							echo 'Wrote';
						  //
						}else{
							$run_7_sql =  mysqli_query($idsconnection_mysqli, $query_insert_7charge_sql);	
							echo 'Did Not Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>


              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id8" id="fee_id" onchange="showFee8(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id8']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id8']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem8">
                
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem8" type="hidden" value="<?php echo $row_queryInvoice['lineitem8']; ?>">
                <input type='text' name='fee_description8' id='fee_description8' size='25' value='<?php echo $row_queryInvoice['fee_description8']; ?>' /></td>
				<td><input name='quantity8' type='text' id='quantity8'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity8']; ?>" size='4' /></td>
				<td><input name='fee_price8' type='text' id='fee_price8' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price8']; ?>" size='4' /></td>
				<td><input name='fee_amount8' type='text' id='fee_amount8' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount8']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax8'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax8' type='checkbox' class='utc' id='tax8' value="<?php echo $row_queryInvoice['tax8']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '8';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id8'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description8']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity8'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price8'];
						$recur_charges_amount = $row_queryInvoice['fee_amount8'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_8_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_8 = mysqli_query($idsconnection_mysqli, $check_8_sql);
					$row_check_8 = mysqli_fetch_array($query_check_8);
					$totalRows_check_8 = mysqli_num_rows($query_check_8);
			
					if($totalRows_check_8 == 0){
					
						echo $query_insert_8charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '1',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					//
					
					
					
					
						if(!$recur_charges_fee_description){
							echo 'Wrote';
						  //
						}else{
							
							$run_8_sql =  mysqli_query($idsconnection_mysqli, $query_insert_8charge_sql);	
							
							echo 'Did Not Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id9" id="fee_id" onchange="showFee9(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id9']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id9']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem9">
                
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem9" type="hidden" value="<?php echo $row_queryInvoice['lineitem9']; ?>">
                <input type='text' name='fee_description9' id='fee_description9' size='25' value='<?php echo $row_queryInvoice['fee_description9']; ?>' /></td>
				<td><input name='quantity9' type='text' id='quantity9'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity9']; ?>" size='4' /></td>
				<td><input name='fee_price9' type='text' id='fee_price9' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price9']; ?>" size='4' /></td>
				<td><input name='fee_amount9' type='text' id='fee_amount9' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount9']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax9'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax9' type='checkbox' class='utc' id='tax9' value="<?php echo $row_queryInvoice['tax9']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '9';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id9'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description9']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity9'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price9'];
						$recur_charges_amount = $row_queryInvoice['fee_amount9'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_9_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_9 = mysqli_query($idsconnection_mysqli, $check_9_sql);
					$row_check_9 = mysqli_fetch_array($query_check_9);
					$totalRows_check_9 = mysqli_num_rows($query_check_9);
			
					if($totalRows_check_9 == 0){
					
						echo $query_insert_9charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '9',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					//
						if(!$recur_charges_fee_description){
							echo 'Wrote';
						  //	
						}else{
							$run_9_sql =  mysqli_query($idsconnection_mysqli, $query_insert_9charge_sql);
							
							echo 'Did Not Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id10" id="fee_id" onchange="showFee10(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id10']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id10']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem10">
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem10" type="hidden" value="<?php echo $row_queryInvoice['lineitem10']; ?>">
                <input type='text' name='fee_description10' id='fee_description10' size='25' value='<?php echo $row_queryInvoice['fee_description10']; ?>' /></td>
				<td><input name='quantity10' type='text' id='quantity10'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity10']; ?>" size='4' /></td>
				<td><input name='fee_price10' type='text' id='fee_price10' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price10']; ?>" size='4' /></td>
				<td><input name='fee_amount10' type='text' id='fee_amount10' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount10']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax10'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax10' type='checkbox' class='utc' id='tax10' value="<?php echo $row_queryInvoice['tax10']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '10';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id10'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description10']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity10'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price10'];
						$recur_charges_amount = $row_queryInvoice['fee_amount10'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_10_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_10 = mysqli_query($idsconnection_mysqli, $check_10_sql);
					$row_check_10 = mysqli_fetch_array($query_check_10);
					$totalRows_check_10 = mysqli_num_rows($query_check_10);
			
					if($totalRows_check_10 == 0){
					
						echo $query_insert_10charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '10',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					//
						if(!$recur_charges_fee_description){
							echo 'Wrote';
						  //
						}else{
							
							$run_10_sql =  mysqli_query($idsconnection_mysqli, $query_insert_10charge_sql);	
							echo 'Did Not Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id11" id="fee_id" onchange="showFee11(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id11']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id11']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>

                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem11">
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem11" type="hidden" value="<?php echo $row_queryInvoice['lineitem11']; ?>">
                <input type='text' name='fee_description11' id='fee_description11' size='25' value='<?php echo $row_queryInvoice['fee_description11']; ?>' /></td>
				<td><input name='quantity11' type='text' id='quantity11'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity11']; ?>" size='4' /></td>
				<td><input name='fee_price11' type='text' id='fee_price11' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price11']; ?>" size='4' /></td>
				<td><input name='fee_amount11' type='text' id='fee_amount11' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount11']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax11'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax11' type='checkbox' class='utc' id='tax11' value="<?php echo $row_queryInvoice['tax11']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '11';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id11'];
						
						$recur_charges_fee_description = mysqli_real_escape_string($idsconnection_mysqli, trim($row_queryInvoice['fee_description11']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity11'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price11'];
						$recur_charges_amount = $row_queryInvoice['fee_amount11'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_11_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_11 = mysqli_query($idsconnection_mysqli, $check_11_sql);
					$row_check_11 = mysqli_fetch_array($query_check_11);
					$totalRows_check_11 = mysqli_num_rows($query_check_11);
			
					if($totalRows_check_11 == 0){
					
						echo $query_insert_11charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '11',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					//
					
						if(!$recur_charges_fee_description){
							echo 'Wrote';
						  //
						}else{
							
							$run_11_sql =  mysqli_query($idsconnection_mysqli, $query_insert_11charge_sql);
							
							echo 'Did Not Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id12" id="fee_id" onchange="showFee12(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id12']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id12']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem12">
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem12" type="hidden" value="<?php echo $row_queryInvoice['lineitem12']; ?>">
                <input type='text' name='fee_description12' id='fee_description12' size='25' value='<?php echo $row_queryInvoice['fee_description12']; ?>' /></td>
				<td><input name='quantity12' type='text' id='quantity12'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity12']; ?>" size='4' /></td>
				<td><input name='fee_price12' type='text' id='fee_price12' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price12']; ?>" size='4' /></td>
				<td><input name='fee_amount12' type='text' id='fee_amount12' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount12']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax12'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax12' type='checkbox' class='utc' id='tax12' value="<?php echo $row_queryInvoice['tax12']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
               <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '12';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id12'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description12']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity12'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price12'];
						$recur_charges_amount = $row_queryInvoice['fee_amount12'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_12_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_12 = mysqli_query($idsconnection_mysqli, $check_12_sql);
					$row_check_12 = mysqli_fetch_array($query_check_12);
					$totalRows_check_12 = mysqli_num_rows($query_check_12);
			
					if($totalRows_check_12 == 0){
					
						echo $query_insert_12charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '12',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					//
						if(!$recur_charges_fee_description){
							echo 'Wrote';
						  //
						}else{
							
							$run_12_sql =  mysqli_query($idsconnection_mysqli, $query_insert_12charge_sql);	
							echo 'yes Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id13" id="fee_id" onchange="showFee13(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id13']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id13']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem13">
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem13" type="hidden" value="<?php echo $row_queryInvoice['lineitem13']; ?>">
                <input type='text' name='fee_description13' id='fee_description13' size='25' value='<?php echo $row_queryInvoice['fee_description13']; ?>' /></td>
				<td><input name='quantity13' type='text' id='quantity13'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity13']; ?>" size='4' /></td>
				<td><input name='fee_price13' type='text' id='fee_price13' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price13']; ?>" size='4' /></td>
				<td><input name='fee_amount13' type='text' id='fee_amount13' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount13']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax13'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax13' type='checkbox' class='utc' id='tax13' value="<?php echo $row_queryInvoice['tax13']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '13';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id13'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description13']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity13'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price13'];
						$recur_charges_amount = $row_queryInvoice['fee_amount13'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_13_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_13 = mysqli_query($idsconnection_mysqli, $check_13_sql);
					$row_check_13 = mysqli_fetch_array($query_check_13);
					$totalRows_check_13 = mysqli_num_rows($query_check_13);
			
					if($totalRows_check_13 == 0){
					
						echo $query_insert_13charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '13',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					
						if(!$recur_charges_fee_description){
							echo 'No Wrote';
						  //
						}else{
							
							$run_13_sql =  mysqli_query($idsconnection_mysqli, $query_insert_13charge_sql);	
							echo 'Yes Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>

              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id14" id="fee_id" onchange="showFee14(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id14']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id14']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem14">
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem14" type="hidden" value="<?php echo $row_queryInvoice['lineitem14']; ?>">
                <input name='fee_description14' type='text' id='fee_description14' value="<?php echo $row_queryInvoice['fee_description14']; ?>" size='25' /></td>
				<td><input name='quantity14' type='text' id='quantity14'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity14']; ?>" size='4' /></td>
				<td><input name='fee_price14' type='text' id='fee_price14' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price14']; ?>" size='4' /></td>
				<td><input name='fee_amount14' type='text' id='fee_amount14' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount14']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax14'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax14' type='checkbox' class='utc' id='tax14' value="<?php echo $row_queryInvoice['tax14']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                <?php
				
				
				
				 //echo @$itemline; 
				 
				 
				 
				
			
						$recur_charges_lineitem = '14';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id14'];
						
						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim( $row_queryInvoice['fee_description14']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity14'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price14'];
						$recur_charges_amount = $row_queryInvoice['fee_amount14'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_14_sql = "SELECT * FROM `idsids_idsdms`.`ids_chargestoinvoice`
							WHERE
								`ids_chargestoinvoice`.`charges_toinvoice_id` = '$colname_queryInvoice'
								AND
								`charges_fee_id` = '$recur_charges_fee_id'
							
							 ";
				 	$query_check_14 = mysqli_query($idsconnection_mysqli, $check_14_sql);
					$row_check_14 = mysqli_fetch_array($query_check_14);
					$totalRows_check_14 = mysqli_num_rows($query_check_14);
			
					if($totalRows_check_14 == 0){
					
						echo $query_insert_14charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '14',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					//
						if(!$recur_charges_fee_description){
							echo 'No Wrote';
						  //
						}else{
							
							$run_14_sql =  mysqli_query($idsconnection_mysqli, $query_insert_14charge_sql);	
							
							echo 'YEs Write';
						}
						
					}
				
				
				?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>



              <tr>
                <td><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></td>
                <td>
                  <select name="fee_id15" id="fee_id" onchange="showFee15(this.value)">
                    <option value='NULL' <?php if (!(strcmp("", $row_queryInvoice['fee_id15']))) {echo "selected=\"selected\"";} ?>>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"<?php if (!(strcmp($row_fees['fee_id'], $row_queryInvoice['fee_id15']))) {echo "selected=\"selected\"";} ?>><?php echo $row_fees['fee_description']?></option>
                    <?php
} while ($row_fees = mysqli_fetch_array($fees));
  $rows = mysqli_num_rows($fees);
  if($rows > 0) {
      mysqli_data_seek($fees, 0);
	  $row_fees = mysqli_fetch_array($fees);
  }
?>
                  </select></td>
                
                
                  
                <td colspan="5">
                
                <div id="lineitem15">
                <table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines2'>
			  <tr>
				<td width='70px'>
                <input name="lineitem15" type="hidden" value="<?php echo $row_queryInvoice['lineitem15']; ?>">
                <input type='text' name='fee_description15' id='fee_description15' size='25' value='<?php echo $row_queryInvoice['fee_description15']; ?>' /></td>
				<td><input name='quantity15' type='text' id='quantity15'  onchange='sumForm()' value="<?php echo $row_queryInvoice['quantity15']; ?>" size='4' /></td>
				<td><input name='fee_price15' type='text' id='fee_price15' onchange='sumForm()' value="<?php echo $row_queryInvoice['fee_price15']; ?>" size='4' /></td>
				<td><input name='fee_amount15' type='text' id='fee_amount15' readonly='readonly' size='4' value="<?php echo $row_queryInvoice['fee_amount15']; ?>" onclick='sumForm()' /></td>
				<td><input <?php if (!(strcmp($row_queryInvoice['tax15'],"Y"))) {echo "checked=\"checked\"";} ?> name='tax15' type='checkbox' class='utc' id='tax15' value="<?php echo $row_queryInvoice['tax15']; ?>" onchange="sumForm()" /></td>
			  </tr>
			</table>
                <?php //echo @$itemline; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>


			<?php
			
						$recur_charges_lineitem = '15';
						$recur_charges_dealerid = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_dealerid));
						$recur_charges_toinvoicenumber = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_number));
						$recur_charges_invoiceToken = mysqli_real_escape_string($idsconnection_mysqli, trim($invoice_tokenid));
						$recur_charges_fee_id = $row_queryInvoice['fee_id15'];

						$recur_charges_fee_description= mysqli_real_escape_string($idsconnection_mysqli, trim($row_queryInvoice['fee_description15']));
						$recur_charges_fee_qty = $row_queryInvoice['quantity15'];
						
						$recur_charges_fee_price = $row_queryInvoice['fee_price15'];
						$recur_charges_amount = $row_queryInvoice['fee_amount15'];
						$recur_charges_source_id = '1';
						$recur_charges_dealerid = $invoice_dealerid;
					    $recur_charges_source_name = 'idsrobot System Creation';
						$recur_charges_hardtime = $invoice_created_at;
						
						
			echo 	$check_15_sql = "SELECT * FROM `idsids_idsdms`.`ids_toinvoices`
							WHERE
								`ids_toinvoices`.`invoice_id` = '$colname_queryInvoice'
							
							 ";
				 	$query_check_15 = mysqli_query($idsconnection_mysqli, $check_15_sql);
					$row_check_15 = mysqli_fetch_array($query_check_15);
					$totalRows_check_15 = mysqli_num_rows($query_check_15);
			
					if($totalRows_check_15 == 0){
					
						echo $query_insert_charge_sql = "
						INSERT INTO `idsids_idsdms`.`ids_chargestoinvoice` SET
						`charges_dealerid` = '$recur_charges_dealerid',
						`charges_toinvoice_id` = '$colname_queryInvoice',
						`charges_toinvoicenumber` = '$recur_charges_toinvoicenumber',
						`charges_invoiceToken` = '$recur_charges_invoiceToken',
						`charges_lineitem` = '$recur_charges_lineitem',
						`charges_fee_id` = '$recur_charges_fee_id',
						
						`charges_fee_description` = '$recur_charges_fee_description',
						`charges_fee_qty` = '$recur_charges_fee_qty',
						`charges_fee_taxed` = 'N',
						`charges_fee_price` = '$recur_charges_fee_price',
						`charges_amount` = '$recur_charges_amount',
						`charges_source_id` = '$recur_charges_source_id',
						`charges_source_name` = '$recur_charges_source_name',
						`charges_hardtime` = '$recur_charges_hardtime'
						";
					 
					
						if(!$recur_charges_fee_description){
							echo 'No Wrote';
						  
						}else{
							
							$run_15_sql =  mysqli_query($idsconnection_mysqli, $query_insert_15charge_sql);
							
							echo 'Write';
						}
						
					}
			?>







                
                
                
                
                
                
                
                
                
                
                
                
                
       






















                
                
              </table>
            </div>




<?php do {  ?>
<p>
<?php echo $row_inVoice_chargestoinvoice['charges_id']; ?> | 
<?php echo $row_inVoice_chargestoinvoice['charges_dealerid']; ?> |
<?php echo $row_inVoice_chargestoinvoice['charges_lineitem']; ?>  | 
<?php echo $row_inVoice_chargestoinvoice['charges_fee_qty']; ?>  |  
<?php echo $row_inVoice_chargestoinvoice['charges_fee_description']; ?>  |  
<?php echo $row_inVoice_chargestoinvoice['charges_amount']; ?> | 
<?php echo $row_inVoice_chargestoinvoice['charges_fee_taxed']; ?> | 
<?php echo $row_inVoice_chargestoinvoice['charges_fee_price']; ?> | 

<br />
<hr />
</p>
<?php } while ($row_inVoice_chargestoinvoic = mysqli_fetch_array($inVoice_chargestoinvoice)); ?>


<?php //mysqli_data_seek($row_queryInvoice, 0); ?>

<?php do {  ?>
<p>
<?php echo $row_queryInvoices['invoice_id']; ?> | 
<?php echo $row_queryInvoices['invoice_dealerid']; ?> |
<?php echo $row_queryInvoices['invoice_dealerid']; ?>  | 
<?php echo $row_queryInvoices['invoice_dealerid']; ?>  |  
<?php echo $row_queryInvoices['invoice_dealerid']; ?>  |  
<?php echo $row_queryInvoices['invoice_dealerid']; ?> | 
<?php echo $row_queryInvoices['invoice_dealerid']; ?> | 
<?php echo $row_queryInvoices['invoice_dealerid']; ?> | 

<br />
<hr />
</p>
<?php } while ($row_queryInvoices = mysqli_fetch_array($queryInvoices)); ?>


</body>
</html>