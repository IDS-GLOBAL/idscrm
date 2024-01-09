<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>



                            
            <div class="row">

<div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="wefinacehere_cardealrate" class="col-sm-2 control-label">Car Deal Rate</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Discount Value" id="wefinacehere_cardealrate" name="wefinacehere_cardealrate" class="form-control" value="<?php if(!$row_inVoice_chargestoinvoice['wefinacehere_cardealrate']) { echo '100.00'; }else{echo $row_inVoice_chargestoinvoice['wefinacehere_cardealrate'];} ?>">
                                            </div>
                                        </div>

</div>
<div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="wefinacehere_onornot" class="col-sm-2 control-label">WeFinanceHere On</label>
                                            <div class="col-sm-10">
                                            
                                            <select class="form-control m-b" id="wefinacehere_onornot" name="wefinacehere_onornot">
                                        <?php $wefinacehere_onornot = $row_inVoice_chargestoinvoice['wefinacehere_onornot']; ?>
                                        <option value="on" <?php if (!(strcmp("on", "$wefinacehere_onornot"))) {echo "selected=\"selected\"";} ?>>On</option>
                                        <option value="off" <?php if (!(strcmp("off", "$wefinacehere_onornot"))) {echo "selected=\"selected\"";} ?>>Off</option>
                                        </select>
                                            </div>
                                        </div>

</div>

</div>






<div class="row">

<div class="col-sm-6">

                                    <div class="form-group">
                                    <label for="autocitymag_mo_rate" class="col-sm-2 control-label">Monthly Rate</label>
                                    <div class="col-sm-10">
                                    <input name="autocitymag_mo_rate" type="text" placeholder="Wfh Lead Rate" id="autocitymag_mo_rate" class="form-control" value="<?php if(!$row_inVoice_chargestoinvoice['autocitymag_mo_rate']) { echo '100.00'; }else{echo $row_inVoice_chargestoinvoice['autocitymag_mo_rate'];} ?>">
                                    </div>
                                    </div>

</div>
<div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="discount_dollarorpercn" class="col-sm-2 control-label">AutoCityMag Or Not</label>
                                            <div class="col-sm-10">
                                            
                                            <select class="form-control m-b" id="autocitymag_onornot" name="autocitymag_onornot">
                                        <?php $autocitymag_onornot = $row_inVoice_chargestoinvoice['autocitymag_onornot']; ?>
                                        <option value="on" <?php if (!(strcmp("on", "$autocitymag_onornot"))) {echo "selected=\"selected\"";} ?>>On</option>
                                        <option value="off" <?php if (!(strcmp("off", "$autocitymag_onornot"))) {echo "selected=\"selected\"";} ?>>Off</option>
                                        </select>
                                            </div>
                                        </div>

</div>

</div>





<div class="row">

<div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="bhphus_mo_rate" class="col-sm-2 control-label">BHPH Mo Rate</label>
                                            <div class="col-sm-10">
                                            <input name="bhphus_mo_rate" type="text" placeholder="BhPh Monthly Rate" id="bhphus_mo_rate" class="form-control" value="<?php if(!$row_inVoice_chargestoinvoice['bhphus_mo_rate']) { echo '100.00'; }else{echo $row_inVoice_chargestoinvoice['bhphus_mo_rate'];} ?>">
                                            </div>
                                        </div>

</div>
<div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="bhphus_onornot" class="col-sm-2 control-label">BuyHerePayHereUs.com</label>
                                            <div class="col-sm-10">
                                            
                                            <select class="form-control m-b" id="bhphus_onornot" name="bhphus_onornot">
                                        <?php $bhphus_onornot = $row_inVoice_chargestoinvoice['bhphus_onornot']; ?>
                                        <option value="on" <?php if (!(strcmp("bhphus_onornot", "$bhphus_onornot"))) {echo "selected=\"selected\"";} ?>>On</option>
                                        <option value="off" <?php if (!(strcmp("off", "$bhphus_onornot"))) {echo "selected=\"selected\"";} ?>>Off</option>
                                        </select>
                                            </div>
                                        </div>

</div>

</div>





<div class="row">

<div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="discount_value" class="col-sm-2 control-label">Discount Value</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Discount Value" id="editLive_discount_value" class="form-control" value="<?php if(!$row_inVoice_chargestoinvoice['discount_value']) { echo '0.00'; }else{echo $row_inVoice_chargestoinvoice['discount_value'];} ?>">
                                            </div>
                                        </div>

</div>
<div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="discount_dollarorpercn" class="col-sm-2 control-label">Discount Dollar or %</label>
                                            <div class="col-sm-10">
                                            
                                            <select class="form-control m-b" id="editLive_discount_dollarorpercn" name="editLive_discount_dollarorpercn">
                                        <?php $discount_dollarorpercn = $row_inVoice_chargestoinvoice['discount_dollarorpercn']; ?>
                                        <option value="dollars" <?php if (!(strcmp("dollars", "$discount_dollarorpercn"))) {echo "selected=\"selected\"";} ?>>$ Dollars</option>
                                        <option value="percentage" <?php if (!(strcmp("percentage", "$discount_dollarorpercn"))) {echo "selected=\"selected\"";} ?>>% Percentage</option>
                                        </select>
                                            </div>
                                        </div>

</div>

</div>




<div class="row">

<div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="discount_value" class="col-sm-2 control-label">Discount Value</label>
                                            <div class="col-sm-10">
                                            <input type="text" placeholder="Discount Value" id="editLive_discount_value" class="form-control" value="<?php if(!$row_inVoice_chargestoinvoice['discount_value']) { echo '0.00'; }else{echo $row_inVoice_chargestoinvoice['discount_value'];} ?>">
                                            </div>
                                        </div>

</div>
<div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="discount_dollarorpercn" class="col-sm-2 control-label">Discount Dollar or %</label>
                                            <div class="col-sm-10">
                                            
                                            <select class="form-control m-b" id="editLive_discount_dollarorpercn" name="editLive_discount_dollarorpercn">
                                        <?php $discount_dollarorpercn = $row_inVoice_chargestoinvoice['discount_dollarorpercn']; ?>
                                        <option value="dollars" <?php if (!(strcmp("dollars", "$discount_dollarorpercn"))) {echo "selected=\"selected\"";} ?>>$ Dollars</option>
                                        <option value="percentage" <?php if (!(strcmp("percentage", "$discount_dollarorpercn"))) {echo "selected=\"selected\"";} ?>>% Percentage</option>
                                        </select>
                                            </div>
                                        </div>

</div>

</div>






</body>
</html>
