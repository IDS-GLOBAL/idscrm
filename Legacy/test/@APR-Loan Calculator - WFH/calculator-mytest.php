<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>

<script src="http://code.jquery.com/jquery-1.4.2.min.js" type="text/javascript"></script>

<script Language='JavaScript'>

function getPrin(form) {

	//alert('ok');
   var i = document.calc.interest.value;
   //alert(i);
   if (i >= 1.0) {
      i = i / 100.0;
   }
   i /= 12;

   var noMonths = document.calc.payments.value;
   alert(noMonths);
   var pow = 1;

   for (var m = 0; m < noMonths; m++) {
      pow = pow * (1 + i);
   }

   var Vpayment = document.calc.payment.value;
	alert(Vpayment);

   var Rprincipal = ((pow - 1) * Vpayment) / (pow * i);
	//alert(Rprincipal);
   document.calc.termAmt.value = Rprincipal.toFixed(2);
   document.calc.termName.value = "Principal Balance:";

}


</script>
</head>

<body>

<form name="calc" method="post" action="#">

<table border='0' width='90%' cellpadding='6' cellspacing='0' bgcolor='#FFFFFF'>
<tbody>

<tr bgcolor='#FFFFFF'>
<td colspan="3">

<p>If you know any 3 of a loan's 4 terms (principal, interest rate, payments remaining, and payment amount), this calculator will help you to find the missing term. For example, if you know the interest rate, the payments remaining, and the payment amount, this calculator will compute the current payoff amount of the loan. All results should be interpreted as close approximations (testing to date has shown results to be accurate within .002% of the actual).</p>

<p>Enter the 3 known loan terms in the appropiate entry fields and click on "Compute." Note that when trying to find the interest rate, please select a "guess" from the pull-down menu by the same name. The closer your guess is to the actual interest rate, the faster the calculator will arrive at a result. If you don't select a "guess" the calculator automatically starts out at a 10% guess and works up or down until it finds a close approximation. If it turns out the actual rate is 19.95% it could take the calculator as many 56,000 iterations to find the answer. On the other hand if you had "guessed" 19% the calculator's iterations will be reduced significantly.</p>

</td>
</tr>

<tr bgcolor='#ffffff'>
<td bgcolor='#ffffff'>
<font face='arial' size='2' color='#333333'>
Principal (current payoff amount)
</font>
</td>
<td align="center" bgcolor='#ffffff'>
<input type="text" name="principal" size="15" onKeyUp="clear_results(this.form)" />
</td>
<td align="center" bgcolor='#FFFFFF'>
<input type="button" value="Clear" onClick="clearPrin(this.form)" />
</td>
</tr>

<tr bgcolor='#FFFFFF'>
<td bgcolor='#FFFFFF'>
<font face='arial' size='2' color='#333333'>
Interest Rate
<select name="intGuess" size="1" onChange="clear_results(this.form)">
<option value="0">Guess</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
</select>
</font>
</td>
<td align="center" bgcolor='#FFFFFF'>
<input name="interest" type="text" onKeyUp="clear_results(this.form)" value="12.0" size="15" />
</td>
<td align="center" bgcolor='#FFFFFF'>
<input type="button" value="Clear" onClick="clearInt(this.form)" />
</td>
</tr>

<tr bgcolor='#ffffff'>
<td bgcolor='#ffffff'>
<font face='arial' size='2' color='#333333'>
# of Payments Remaining
</font>
</td>
<td align="center" bgcolor='#ffffff'>
<input name="payments" type="text" onKeyUp="clear_results(this.form)" value="60" size="15" />
</td>
<td align="center" bgcolor='#FFFFFF'>
<input type="button" value="Clear" onClick="clearPmts(this.form)" />
</td>
</tr>

<tr bgcolor='#FFFFFF'>
<td bgcolor='#FFFFFF'>
<font face='arial' size='2' color='#333333'>
Payment Amount
</font>
</td>
<td align="center" bgcolor='#FFFFFF'>
<input name="payment" type="text" onKeyUp="clear_results(this.form)" value="400" size="15" />
</td>
<td align="center" bgcolor='#FFFFFF'>
<input type="button" value="Clear" onClick="clearPmt(this.form)" />
</td>
</tr>

<tr>
<td align="center" bgcolor='#FFFFFF' colspan="3" >
<input type="button" value="Compute" onClick="getPrin(this.form)" />
<input type="reset" value="Reset" />
</td>
</tr>

<tr bgcolor='#ffffff'>
<td bgcolor='#ffffff'>
<font face='arial' size='2' color='#333333'>
<input type="text" name="termName" size="25" />
</font>
</td>
<td align="center" bgcolor='#ffffff'>
<input type="text" name="termAmt" size="15" />
</td>
<td align="center" bgcolor='#FFFFFF'>
<input type="button" value="Clear" onClick="clear_results(this.form)" />
</td>
</tr>



</tbody>
</table>
</form>
</body>
</html>