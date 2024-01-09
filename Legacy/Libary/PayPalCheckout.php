<p>


	Safe &amp; Secure You Can Make A Payment Using Pay Pal.



</p>
<p>



<script src="js/paypal-button-minicart.min.js?merchant=billing@idscrm.com" 
    data-button="buynow" 
    data-name="Invoice #<?php echo $row_queryInvoice['invoice_number']; ?>" 
    data-quantity="1" 
    data-amount="<?php echo $row_queryInvoice['invoice_subtotal']; ?>" 
    data-currency="USD" 
    data-shipping="0.00" 
    data-tax="<?php echo $row_queryInvoice['invoice_taxtotal']; ?>" 
    data-callback="http://idscrm.com/dealer/invoice-result.php"
></script>
	

</p>

<p>
Pay Invoice By Clicking The Pay Pal Buy Now Button
</p>
<hr />
