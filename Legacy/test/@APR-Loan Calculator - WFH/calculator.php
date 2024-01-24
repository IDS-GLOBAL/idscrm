<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>

<script src="http://code.jquery.com/jquery-1.4.2.min.js" type="text/javascript"></script>

<script Language='JavaScript'>
//*******************************************
//DO NOT REMOVE THIS COPYWRITE INFO!
//Missing Loan-Term Calculator V1
//2000 Daniel C. Peterson ALL RIGHTS RESERVED
//Created: 01/12/2000
//Last Modified: 07/14/2009
//This script may not be copied, edited, distributed or reproduced
//without express written permission from
//Daniel C. Peterson of Web Winder Website Services
//For commercial use rates, contact:
//Dan Peterson:
//Web Winder Website Services
//P.O. Box 11
//Bemidji, MN  56619
//dan@webwinder.com
//http://www.webwinder.com
//Commercial User Licence #:6965-1447-59-1396
//Commercial Licence Date:2010-09-16
//*******************************************



function computeIntRate(myNumPmts, myPrin, myPmtAmt, myGuess) {

var myDecRate = 0;

if(myGuess.length == 0 || myGuess == 0) {
   var myDecGuess = 10;
   } else {
   var myDecGuess = myGuess;
   if(myDecGuess >= 1) {
      myDecGuess = myDecGuess /100;
      }
   }

var myDecRate = myDecGuess / 12;
var myNewPmtAmt = 0;
var pow = 1;
var j = 0;

for (j = 0; j < myNumPmts; j++) {
   pow = pow * (eval(1) + eval(myDecRate));
}

myNewPmtAmt = (myPrin * pow * myDecRate) / (pow - 1);

//2 DEC PLACE AMOUNT
var decPlace2Rate = (eval(myDecGuess) + eval(.01)) / 12;
var decPlace2Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNumPmts; j++) {
   pow = pow * (eval(1) + eval(decPlace2Rate));
}
var decPlace2PmtAmt = (myPrin * pow * decPlace2Rate) / (pow - 1);
decPlace2Amt = eval(decPlace2PmtAmt) - eval(myNewPmtAmt);

//3 DEC PLACE AMOUNT
var decPlace3Rate = (eval(myDecGuess) + eval(.001)) / 12;
var decPlace3Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNumPmts; j++) {
   pow = pow * (eval(1) + eval(decPlace3Rate));
}
var decPlace3PmtAmt = (myPrin * pow * decPlace3Rate) / (pow - 1);
decPlace3Amt = eval(decPlace3PmtAmt) - eval(myNewPmtAmt);

//4 DEC PLACE AMOUNT
var decPlace4Rate = (eval(myDecGuess) + eval(.0001)) / 12;
var decPlace4Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNumPmts; j++) {
   pow = pow * (eval(1) + eval(decPlace4Rate));
}
var decPlace4PmtAmt = (myPrin * pow * decPlace4Rate) / (pow - 1);
decPlace4Amt = eval(decPlace4PmtAmt) - eval(myNewPmtAmt);

//5 DEC PLACE AMOUNT
var decPlace5Rate = (eval(myDecGuess) + eval(.00001)) / 12;
var decPlace5Amt = 0;
pow = 1;
j=0;
for (j = 0; j < myNumPmts; j++) {
   pow = pow * (eval(1) + eval(decPlace5Rate));
}
var decPlace5PmtAmt = (myPrin * pow * decPlace5Rate) / (pow - 1);
decPlace5Amt = eval(decPlace5PmtAmt) - eval(myNewPmtAmt);

var myPmtDiff = 0;

if(myNewPmtAmt < myPmtAmt) {

   while(myNewPmtAmt < myPmtAmt) {

      myPmtDiff = eval(myPmtAmt) - eval(myNewPmtAmt);
      if(myPmtDiff > decPlace2Amt) {
         myDecRate = eval(myDecRate) + eval(.01 / 12);
      } else
      if(myPmtDiff > decPlace3Amt) {
         myDecRate = eval(myDecRate) + eval(.001 / 12);
      } else
      if(myPmtDiff > decPlace4Amt) {
         myDecRate = eval(myDecRate) + eval(.0001 / 12);
      } else
      if(myPmtDiff > decPlace5Amt) {
         myDecRate = eval(myDecRate) + eval(.00001 / 12);
      } else {
         myDecRate = eval(myDecRate) + eval(.000001 / 12);
      }

      pow = 1
      j = 0;
      
      for (j = 0; j < myNumPmts; j++) {
         pow = pow * (eval(1) + eval(myDecRate));
      }
      myNewPmtAmt = (myPrin * pow * myDecRate) / (pow - 1);
   }

} else {


   while(myNewPmtAmt > myPmtAmt) {

      myPmtDiff = eval(myNewPmtAmt) - eval(myPmtAmt);
      if(myPmtDiff > decPlace2Amt) {
         myDecRate = eval(myDecRate) - eval(.01 / 12);
      } else
      if(myPmtDiff > decPlace3Amt) {
         myDecRate = eval(myDecRate) - eval(.001 / 12);
      } else
      if(myPmtDiff > decPlace4Amt) {
         myDecRate = eval(myDecRate) - eval(.0001 / 12);
      } else
      if(myPmtDiff > decPlace5Amt) {
         myDecRate = eval(myDecRate) - eval(.00001 / 12);
      } else {
         myDecRate = eval(myDecRate) - eval(.000001 / 12);
      }

      pow = 1
      j = 0;
      
      for (j = 0; j < myNumPmts; j++) {
         pow = pow * (eval(1) + eval(myDecRate));
      }
      myNewPmtAmt = (myPrin * pow * myDecRate) / (pow - 1);
   }


}

myDecRate = myDecRate * 12 * 100;

return myDecRate;

}



function sn(num) {

   num=num.toString();


   var len = num.length;
   var rnum = "";
   var test = "";
   var j = 0;

   var b = num.substring(0,1);
   if(b == "-") {
      rnum = "-";
   }

   for(i = 0; i <= len; i++) {

      b = num.substring(i,i+1);

      if(b == "0" || b == "1" || b == "2" || b == "3" || b == "4" || b == "5" || b == "6" || b == "7" || b == "8" || b == "9" || b == ".") {
         rnum = rnum + "" + b;

      }

   }

   if(rnum == "" || rnum == "-") {
      rnum = 0;
   }

   rnum = Number(rnum);

   return rnum;

}



function fns(num, places, comma, type, show) {

    var sym_1 = "$";
    var sym_2 = ""; 

    var isNeg=0;

    if(num < 0) {
       num=num*-1;
       isNeg=1;
    }

    var myDecFact = 1;
    var myPlaces = 0;
    var myZeros = "";
    while(myPlaces < places) {
       myDecFact = myDecFact * 10;
       myPlaces = Number(myPlaces) + Number(1);
       myZeros = myZeros + "0";
    }
    
	onum=Math.round(num*myDecFact)/myDecFact;
		
	integer=Math.floor(onum);

	if (Math.ceil(onum) == integer) {
		decimal=myZeros;
	} else{
		decimal=Math.round((onum-integer)* myDecFact)
	}
	decimal=decimal.toString();
	if (decimal.length<places) {
        fillZeroes = places - decimal.length;
	   for (z=0;z<fillZeroes;z++) {
        decimal="0"+decimal;
        }
     }

   if(places > 0) {
      decimal = "." + decimal;
   }

   if(comma == 1) {
	integer=integer.toString();
	var tmpnum="";
	var tmpinteger="";
	var y=0;

	for (x=integer.length;x>0;x--) {
		tmpnum=tmpnum+integer.charAt(x-1);
		y=y+1;
		if (y==3 & x>1) {
			tmpnum=tmpnum+",";
			y=0;
		}
	}

	for (x=tmpnum.length;x>0;x--) {
		tmpinteger=tmpinteger+tmpnum.charAt(x-1);
	}


	finNum=tmpinteger+""+decimal;
   } else {
      finNum=integer+""+decimal;
   }

    if(isNeg == 1) {
       if(type == 1 && show == 1) {
          finNum = "-" + sym_1 + "" + finNum + "" + sym_2;
       } else {
          finNum = "-" + finNum;
       }
    } else {
       if(show == 1) {
          if(type == 1) {
             finNum = sym_1 + "" + finNum + "" + sym_2;
          } else
          if(type == 2) {
             finNum = finNum + "%";
          }

       }

    }

	return finNum;
}


function getMissing(form) {

   var filled = 0;

   if(document.calc.principal.value.length > 0) {
      filled = filled + 1;
   }
   if(document.calc.interest.value.length > 0) {
      filled = filled + 1;
   }
   if(document.calc.payments.value.length > 0) {
      filled = filled + 1;
   }
   if(document.calc.payment.value.length > 0) {
      filled = filled + 1;
   }
   if(filled < 3) {
      alert("Three of the four fields must contain a value in order to calculate the missing loan term.");
      clear_results(document.calc);
   } else {

      if(document.calc.principal.value.length > 0) {
         Vprincipal = sn(document.calc.principal.value);
      } else {
         Vprincipal = 0;
      }
      if(document.calc.interest.value.length > 0) {
         Vinterest = sn(document.calc.interest.value);
      } else {
         Vinterest = 0;
      }
      if(document.calc.payments.value.length > 0) {
         Vpayments = sn(document.calc.payments.value);
      } else {
         Vpayments = 0;
      }
      if(document.calc.payment.value.length > 0) {
         Vpayment =sn(document.calc.payment.value);
      } else {
         Vpayment = 0;
      }

      if(Vprincipal > 0 && Vinterest > 0 && Vpayments > 0 && Vpayment > 0) {
         alert("One empty field please.");
      } else
      if(document.calc.payment.value == "" || document.calc.payment.value == 0) {
         getPmt(document.calc);
      } else
      if(document.calc.principal.value == "" || document.calc.principal.value == 0) {
         getPrin(document.calc);
      } else
      if(document.calc.payments.value == "" || document.calc.payments.value == 0) {
        getPmts(document.calc);
      } else
      if(document.calc.interest.value == "" || document.calc.interest.value == 0) {
        getInt(document.calc);
      }

   }

}


function getPmt(form) {

   var i = sn(document.calc.interest.value);
   if (i >= 1.0) {
      i = i / 100.0;
   }
   i /= 12;

   var noMonths = sn(document.calc.payments.value);
   var pow = 1;

   for (var j = 0; j < noMonths; j++) {
      pow = pow * (1 + i);
   }

   var Rpayment = (Vprincipal * pow * i) / (pow - 1);

   document.calc.termAmt.value = fns(Rpayment,2,1,1,1);
   document.calc.termName.value = "Monthly Payment:";

}


function getPrin(form) {

   var i = sn(document.calc.interest.value);
   if (i >= 1.0) {
      i = i / 100.0;
   }
   i /= 12;

   var noMonths = sn(document.calc.payments.value);
   var pow = 1;

   for (var j = 0; j < noMonths; j++) {
      pow = pow * (1 + i);
   }

   var Rprincipal = ((pow - 1) * Vpayment) / (pow * i);

   document.calc.termAmt.value = fns(Rprincipal,2,1,1,1);
   document.calc.termName.value = "Principal Balance:";

}

function getPmts(form) {

   var i = sn(document.calc.interest.value);
   if (i >= 1.0) {
      i = i / 100.0;
   }
   i /= 12;

   var prin = sn(document.calc.principal.value);
   var count = 0;
   var prinPort = 0;
   var intPort = 0;
   var pmt = sn(document.calc.payment.value);

   while(Number(prin) > Number(pmt)) {
      intPort = prin * i;
      prinPort = pmt - intPort;
      prin = prin - prinPort;
      count = count +1;
   }

   var Rcount = count;
   var pmtPart = parseInt(prin / pmt * 100, 10);

   document.calc.termAmt.value = Rcount + "." + pmtPart;
   document.calc.termName.value = "Payments Remaining:";

}

function getInt(form) {

   var prin = sn(document.calc.principal.value);
   var pmt = sn(document.calc.payment.value);
   var nPer = sn(document.calc.payments.value);
   var guess = 10;
   if(document.calc.intGuess.selectedIndex == 0) {
      guess = 10;
   } else {
      guess = document.calc.intGuess.options[document.calc.intGuess.selectedIndex].value;
   }

   var i = computeIntRate(nPer, prin, pmt, guess);

   document.calc.termAmt.value = fns(i,2,0,2,1);

   //document.calc.termAmt.value = iterate;
   document.calc.termName.value = "Interest Rate:";

}

function clearPrin(form) {
   document.calc.principal.value = "";
}

function clearInt(form) {
   document.calc.interest.value = "";
}

function clearPmts(form) {
   document.calc.payments.value = "";
}

function clearPmt(form) {
   document.calc.payment.value = "";
}

function clear_results(form) {
    document.calc.termAmt.value = "";
    document.calc.termName.value = "";
}
</script>
</head>

<body>

<h2>Missing Loan-Term</h2>

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
<input type="text" name="interest" size="15" onKeyUp="clear_results(this.form)" />
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
<input type="text" name="payments" size="15" onKeyUp="clear_results(this.form)" />
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
<input type="text" name="payment" size="15" onKeyUp="clear_results(this.form)" />
</td>
<td align="center" bgcolor='#FFFFFF'>
<input type="button" value="Clear" onClick="clearPmt(this.form)" />
</td>
</tr>

<tr>
<td align="center" bgcolor='#FFFFFF' colspan="3" >
<input type="button" value="Compute" onClick="getMissing(this.form)" />
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