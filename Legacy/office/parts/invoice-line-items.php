<tr>
                <td><img src='images/pimpa_no.gif' alt='picture' width='15' height='15' class='tabpimpa' /></td>
                <td>
                  <select name='fee_id1' id='fee_id' onchange='showFee1(this.value)'>
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input type='text' name='fee_description1' id='fee_description' size='25' value='' /></td>
				<td><input name='quantity1' type='text' id='quantity1' size='4' onchange='sumForm()' /></td>
				<td><input name='fee_price1' type='text' id='fee_price1' onchange='sumForm()'  size='4' /></td>
				<td><input name='fee_amount1' type='text' id='fee_amount1' readonly='readonly' size='4' value=""  onFocus="" onBlur="sumForm()" onclick='sumForm()' /></td>
				<td><input name='tax1' id='tax1' type='checkbox' onchange='sumForm()' value="1" class='utc' /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input type='text' name='fee_description2' id='fee_description' size='25' value='' /></td>
				<td><input name='quantity2' type='text' id='quantity2'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price2' type='text' id='fee_price2' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount2' type='text' id='fee_amount2' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax2' id='tax2' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem3" type="hidden" value="3">
                <input type='text' name='fee_description3' id='fee_description' size='25' value='' /></td>
				<td><input name='quantity3' type='text' id='quantity3' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price3' type='text' id='fee_price3'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount3' type='text' id='fee_amount3' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax3' id='tax3' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem4" type="hidden" value="4">
                <input type='text' name='fee_description4' id='fee_description4' size='25' value='' /></td>
				<td><input name='quantity4' type='text' id='quantity4'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price4' type='text' id='fee_price4' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount4' type='text' id='fee_amount4' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax4' id='tax4' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem5" type="hidden" value="5">
                <input type='text' name='fee_description5' id='fee_description5' size='25' value='' /></td>
				<td><input name='quantity5' type='text' id='quantity5'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price5' type='text' id='fee_price5' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount5' type='text' id='fee_amount5' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax5' id='tax5' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem6" type="hidden" value="6">
                <input type='text' name='fee_description6' id='fee_description6' size='25' value='' /></td>
				<td><input name='quantity6' type='text' id='quantity6'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price6' type='text' id='fee_price6' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount6' type='text' id='fee_amount6' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax6' id='tax6' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem7" type="hidden" value="7">
                <input type='text' name='fee_description7' id='fee_description7' size='25' value='' /></td>
				<td><input name='quantity7' type='text' id='quantity7'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price7' type='text' id='fee_price7' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount7' type='text' id='fee_amount7' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax7' id='tax7' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem8" type="hidden" value="8">
                <input type='text' name='fee_description8' id='fee_description8' size='25' value='' /></td>
				<td><input name='quantity8' type='text' id='quantity8'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price8' type='text' id='fee_price8' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount8' type='text' id='fee_amount8' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax8' id='tax8' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem9" type="hidden" value="9">
                <input type='text' name='fee_description9' id='fee_description9' size='25' value='' /></td>
				<td><input name='quantity9' type='text' id='quantity9'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price9' type='text' id='fee_price9' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount9' type='text' id='fee_amount9' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax9' id='tax9' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem10" type="hidden" value="10">
                <input type='text' name='fee_description10' id='fee_description10' size='25' value='' /></td>
				<td><input name='quantity10' type='text' id='quantity10'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price10' type='text' id='fee_price10' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount10' type='text' id='fee_amount10' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax10' id='tax10' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem11" type="hidden" value="11">
                <input type='text' name='fee_description11' id='fee_description11' size='25' value='' /></td>
				<td><input name='quantity11' type='text' id='quantity11'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price11' type='text' id='fee_price11' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount11' type='text' id='fee_amount11' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax11' id='tax11' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem12" type="hidden" value="12">
                <input type='text' name='fee_description12' id='fee_description12' size='25' value='' /></td>
				<td><input name='quantity12' type='text' id='quantity12' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price12' type='text' id='fee_price12' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount12' type='text' id='fee_amount12' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax12' id='tax12' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem13" type="hidden" value="13">
                <input type='text' name='fee_description13' id='fee_description13' size='25' value='' /></td>
				<td><input name='quantity13' type='text' id='quantity13'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price13' type='text' id='fee_price13' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount13' type='text' id='fee_amount13' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax13' id='tax13' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem14" type="hidden" value="14">
                <input type='text' name='fee_description14' id='fee_description14' size='25' /></td>
				<td><input name='quantity14' type='text' id='quantity14'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price14' type='text' id='fee_price14' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount14' type='text' id='fee_amount14' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax14' id='tax14' type='checkbox' class='utc' onchange="sumForm()" /></td>
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
                    <option value='NULL'>Select Fee</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_fees['fee_id']?>"><?php echo $row_fees['fee_description']?></option>
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
                <input name="lineitem15" type="hidden" value="15">
                <input type='text' name='fee_description15' id='fee_description15' size='25' value='' /></td>
				<td><input name='quantity15' type='text' id='quantity15'  onchange='sumForm()' size='4' /></td>
				<td><input name='fee_price15' type='text' id='fee_price15' onchange='sumForm()' size='4' /></td>
				<td><input name='fee_amount15' type='text' id='fee_amount15' readonly='readonly' size='4' value="" onclick='sumForm()' /></td>
				<td><input name='tax15' type='checkbox' class='utc' id='tax15' onchange="sumForm()" /></td>
			  </tr>
			</table>
                <?php //echo @$itemline; ?>
				</div>
                  
                

                
                
                </td>
                
                
                </tr>
