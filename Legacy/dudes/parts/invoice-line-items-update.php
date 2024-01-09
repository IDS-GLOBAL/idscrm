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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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
                <?php //echo @$itemline; ?>
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

                
                
                
                
                
                
                
                
                
                
                
                
                
       