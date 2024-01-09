<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_idsconnection = "localhost";
$database_idsconnection = "idsids_idsdms";
$username_idsconnection = "idsids_faith";
$password_idsconnection = "benjamin2831";
$idsconnection_mysqli = mysqli_connect($hostname_idsconnection, $username_idsconnection, $password_idsconnection, $database_idsconnection); 



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


?>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title>Untitled Document</title>
</head>

<body>

 $row_fees['charges_fee_type']
 $row_inVoice_chargestoinvoice
 
 row_inVoice_chargestoinvoice
 
 

<br>

<table width='100%' border='0' cellpadding='0' cellspacing='0' class='gwlines'>
  <tr>
    <td><input type='text' name='fee_description' id='fee_description' /></td>
    <td align='center'><input name='quantity' type='text' id='quantity' size='5' /></td>
    <td><input name='fee_price' type='text' id='fee_price' size='10' /></td>
    <td><input name='fee_amount' type='text' id='fee_amount' size='10' /></td>
    <td><input name='utc1' id='utc2' type='checkbox' class='utc' /></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<select>
 <option value="0" <?php if (!(strcmp("0", $row_recurringInvoice['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>Select</option>
<option value="<?php echo $row_fees['fee_id']?>" <?php if (!(strcmp($row_inVoice_chargestoinvoice['charges_fee_id'], $row_inVoice_chargestoinvoice['fee_id']))) {echo "selected=\"selected\"";} ?>>
</option>
</select>
<p>&nbsp;</p>
<p>&nbsp;</p>

<option value="<?php echo $row_fees['fee_id']?>" <?php if (!(strcmp($row_inVoice_chargestoinvoice['charges_fee_id'], $row_inVoice_chargestoinvoice['fee_id']))) {echo "selected=\"selected\"";} ?>>
                                                        <?php echo $row_fees['charges_fee_type']; ?>
                                                    </option>
<p>&nbsp;</p>
<p>&nbsp;</p>





<select name="charges_fee_type" class="form-control" id="charges_fee_type">
                                                <option>Select Fee</option>
                                                <?php do {  ?>
                                                    <option value="<?php echo $row_fees['charges_fee_id']?>" <?php if (!(strcmp("0", $row_inVoice_chargestoinvoic['invoice_typeid']))) {echo "selected=\"selected\"";} ?>>
                                                        <?php echo $row_fees['charges_fee_type']; ?>
                                                    </option>
                                                    <?php } while ($row_fees = mysqli_fetch_array($fees));
                                                        $rows = mysqli_num_rows($fees);
                                                        if($rows > 0) {
                                                            mysqli_data_seek($fees, 0);
                                                            $row_fees = mysqli_fetch_array($fees);
                                                        }
                                                    ?>
                                            </select>
                                            
                                            
                                            
                                            
                                            
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

<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>