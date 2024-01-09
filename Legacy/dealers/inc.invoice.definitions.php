<?php
$mylimit = '15';  // Maximum number value to be set here

$InvoiceID = $row_queryInvoice['invoice_id'];
$InvoiceTotal = $row_queryInvoice['invoice_total'];


	$invoice_id = $row_queryInvoice['invoice_id'];
	$invoice_typeid = $row_queryInvoice['invoice_typeid'];
	$invoice_number = $row_queryInvoice['invoice_number'];
	$invoice_tokenid = $row_queryInvoice['invoice_tokenid'];
	$invoice_dealerid = $row_queryInvoice['invoice_dealerid'];
	$invoice_status = $row_queryInvoice['invoice_status'];
	$invoice_date = $row_queryInvoice['invoice_date'];
	$invoice_terms = $row_queryInvoice['invoice_terms'];
	$invoice_duedate = $row_queryInvoice['invoice_duedate'];
	$invoice_sendtoclient = $row_queryInvoice['invoice_sendtoclient'];
	$invoice_senttoclient = $row_queryInvoice['invoice_senttoclient'];
	$dealer_email_recipients = $row_queryInvoice['dealer_email_recipients'];
	$invoice_senttoclient_date = $row_queryInvoice['invoice_senttoclient_date'];
	$invoice_currency = $row_queryInvoice['invoice_currency'];
	
/*
 	for($a=1; $a<=$mylimit; $a++){

	$fee_id.$a = $row_queryInvoice["fee_id$a"];
	$lineitem.$a = $row_queryInvoice["lineitem$a"];
	$fee_description.$a = $row_queryInvoice["fee_description$a"];
	$quantity.$a = $row_queryInvoice["quantity$a"];
	$fee_price.$a = $row_queryInvoice["fee_price$a"];
	$fee_amount.$a = $row_queryInvoice["fee_amount$a"];
	$tax.$a = $row_queryInvoice["tax$a"];

	}
*/	


	$fee_id1 = $row_queryInvoice['fee_id1'];
	$lineitem1 = $row_queryInvoice['lineitem1'];
	$fee_description1 = $row_queryInvoice['fee_description1'];
	$quantity1 = $row_queryInvoice['quantity1'];
	$fee_price1 = $row_queryInvoice['fee_price1'];
	$fee_amount1 = $row_queryInvoice['fee_amount1'];
	$tax1 = $row_queryInvoice['tax1'];




	$fee_id2 = $row_queryInvoice['fee_id2'];
	$lineitem2 = $row_queryInvoice['lineitem2'];
	$fee_description2 = $row_queryInvoice['fee_description2'];
	$quantity2 = $row_queryInvoice['quantity2'];
	$fee_price2 = $row_queryInvoice['fee_price2'];
	$fee_amount2 = $row_queryInvoice['fee_amount2'];
	$tax2 = $row_queryInvoice['tax2'];


	$fee_id3 = $row_queryInvoice['fee_id3'];
	$lineitem3 = $row_queryInvoice['lineitem3'];
	$fee_description3 = $row_queryInvoice['fee_description3'];
	$quantity3 = $row_queryInvoice['quantity3'];
	$fee_price3 = $row_queryInvoice['fee_price3'];
	$fee_amount3 = $row_queryInvoice['fee_amount3'];
	$tax3 = $row_queryInvoice['tax3'];



	$fee_id4 = $row_queryInvoice['fee_id4'];
	$lineitem4 = $row_queryInvoice['lineitem4'];
	$fee_description4 = $row_queryInvoice['fee_description4'];
	$quantity4 = $row_queryInvoice['quantity4'];
	$fee_price4 = $row_queryInvoice['fee_price4'];
	$fee_amount4 = $row_queryInvoice['fee_amount4'];
	$tax4 = $row_queryInvoice['tax4'];



	$fee_id5 = $row_queryInvoice['fee_id5'];
	$lineitem5 = $row_queryInvoice['lineitem5'];
	$fee_description5 = $row_queryInvoice['fee_description5'];
	$quantity5 = $row_queryInvoice['quantity5'];
	$fee_price5 = $row_queryInvoice['fee_price5'];
	$fee_amount5 = $row_queryInvoice['fee_amount5'];
	$tax5 = $row_queryInvoice['tax5'];



	$fee_id6 = $row_queryInvoice['fee_id6'];
	$lineitem6 = $row_queryInvoice['lineitem6'];
	$fee_description6 = $row_queryInvoice['fee_description6'];
	$quantity6 = $row_queryInvoice['quantity6'];
	$fee_price6 = $row_queryInvoice['fee_price6'];
	$fee_amount6 = $row_queryInvoice['fee_amount6'];
	$tax6 = $row_queryInvoice['tax6'];


	$fee_id7 = $row_queryInvoice['fee_id7'];
	$lineitem7 = $row_queryInvoice['lineitem7'];
	$fee_description7 = $row_queryInvoice['fee_description7'];
	$quantity7 = $row_queryInvoice['quantity7'];
	$fee_price7 = $row_queryInvoice['fee_price7'];
	$fee_amount7 = $row_queryInvoice['fee_amount7'];
	$tax7 = $row_queryInvoice['tax7'];



	$fee_id8 = $row_queryInvoice['fee_id8'];
	$lineitem8 = $row_queryInvoice['lineitem8'];
	$fee_description8 = $row_queryInvoice['fee_description8'];
	$quantity8 = $row_queryInvoice['quantity8'];
	$fee_price8 = $row_queryInvoice['fee_price8'];
	$fee_amount8 = $row_queryInvoice['fee_amount8'];
	$tax8 = $row_queryInvoice['tax8'];


	$fee_id9 = $row_queryInvoice['fee_id9'];
	$lineitem9 = $row_queryInvoice['lineitem9'];
	$fee_description9 = $row_queryInvoice['fee_description9'];
	$quantity9 = $row_queryInvoice['quantity9'];
	$fee_price9 = $row_queryInvoice['fee_price9'];
	$fee_amount9 = $row_queryInvoice['fee_amount9'];
	$tax9 = $row_queryInvoice['tax9'];


	$fee_id10 = $row_queryInvoice['fee_id10'];
	$lineitem10 = $row_queryInvoice['lineitem10'];
	$fee_description10 = $row_queryInvoice['fee_description10'];
	$quantity10 = $row_queryInvoice['quantity10'];
	$fee_price10 = $row_queryInvoice['fee_price10'];
	$fee_amount10 = $row_queryInvoice['fee_amount10'];
	$tax10 = $row_queryInvoice['tax10'];


	$fee_id11 = $row_queryInvoice['fee_id11'];
	$lineitem11 = $row_queryInvoice['lineitem11'];
	$fee_description11 = $row_queryInvoice['fee_description11'];
	$quantity11 = $row_queryInvoice['quantity11'];
	$fee_price11 = $row_queryInvoice['fee_price11'];
	$fee_amount11 = $row_queryInvoice['fee_amount11'];
	$tax11 = $row_queryInvoice['tax11'];


	$fee_id12 = $row_queryInvoice['fee_id12'];
	$lineitem12 = $row_queryInvoice['lineitem12'];
	$fee_description12 = $row_queryInvoice['fee_description12'];
	$quantity12 = $row_queryInvoice['quantity12'];
	$fee_price12 = $row_queryInvoice['fee_price12'];
	$fee_amount12 = $row_queryInvoice['fee_amount12'];
	$tax12 = $row_queryInvoice['tax12'];


	$fee_id13 = $row_queryInvoice['fee_id13'];
	$lineitem13 = $row_queryInvoice['lineitem13'];
	$fee_description13 = $row_queryInvoice['fee_description13'];
	$quantity13 = $row_queryInvoice['quantity13'];
	$fee_price13 = $row_queryInvoice['fee_price13'];
	$fee_amount13 = $row_queryInvoice['fee_amount13'];
	$tax13 = $row_queryInvoice['tax13'];


	$fee_id14 = $row_queryInvoice['fee_id14'];
	$lineitem14 = $row_queryInvoice['lineitem14'];
	$fee_description14 = $row_queryInvoice['fee_description14'];
	$quantity14 = $row_queryInvoice['quantity14'];
	$fee_price14 = $row_queryInvoice['fee_price14'];
	$fee_amount14 = $row_queryInvoice['fee_amount14'];
	$tax14 = $row_queryInvoice['tax14'];


	$fee_id15 = $row_queryInvoice['fee_id15'];
	$lineitem15 = $row_queryInvoice['lineitem15'];
	$fee_description15 = $row_queryInvoice['fee_description15'];
	$quantity15 = $row_queryInvoice['quantity15'];
	$fee_price15 = $row_queryInvoice['fee_price15'];
	$fee_amount15 = $row_queryInvoice['fee_amount15'];
	$tax15 = $row_queryInvoice['tax15'];



	
	$sales_taxrate = $row_queryInvoice['sales_taxrate'];
	$tax_total = $row_queryInvoice['tax_total'];
	$discount_value = $row_queryInvoice['discount_value'];
	$discount_dollarorpercn = $row_queryInvoice['discount_dollarorpercn'];
	$invoice_shippinghanding = $row_queryInvoice['invoice_shippinghanding'];
	$invoice_subtotal = $row_queryInvoice['invoice_subtotal'];
	$tax_shipping = $row_queryInvoice['tax_shipping'];
	$tax_arrival_fee = $row_queryInvoice['tax_arrival_fee'];
	$invoice_comments = $row_queryInvoice['invoice_comments'];
	$terms_conditions = $row_queryInvoice['terms_conditions'];
	$invoice_taxtotal = $row_queryInvoice['invoice_taxtotal'];
	$invoice_total = $row_queryInvoice['invoice_total'];
	$applied_payment = $row_queryInvoice['applied_payment'];
	$invoice_amount_due = $row_queryInvoice['invoice_amount_due'];
	$dudes_id_lastmodified = $row_queryInvoice['dudes_id_lastmodified'];
	$invoice_lastmodified = $row_queryInvoice['invoice_lastmodified'];
	$invoice_harddatetime = $row_queryInvoice['invoice_harddatetime'];
	$invoice_created_at = $row_queryInvoice['invoice_created_at'];
	$payment_typeid = $row_queryInvoice['payment_typeid'];
	$payment_type = $row_queryInvoice['payment_type'];
	$creditCardslct = $row_queryInvoice['creditCardslct'];
	$creditCardnumber = $row_queryInvoice['creditCardnumber'];
	$check_number = $row_queryInvoice['check_number'];
	$paid_amount = $row_queryInvoice['paid_amount'];
	$credit_amount = $row_queryInvoice['credit_amount'];
	$paymentBalance = $row_queryInvoice['paymentBalance'];
	$payment_status = $row_queryInvoice['payment_status'];
	$paymentNotes = $row_queryInvoice['paymentNotes'];
	$dudes_id_rcvdpymt = $row_queryInvoice['dudes_id_rcvdpymt'];
	$dudes_id_rcvdpymtwhn = $row_queryInvoice['dudes_id_rcvdpymtwhn'];

?>