<div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      
      <div class="leftblock vertsortable">
      
      <?php include('modules/top-left-module.php'); ?>
      
      </div>
      
      <!-- End LEFT BLOCK -->

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

        <!-- gadget left 1
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Form Example 1</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>
         -->
         
         
         
         
        <!-- gadget left 2 
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Form Example 2</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">

              <p><a href="#">Learn more &raquo;</a></p>
            </div>
          </div>
        </div>
-->
        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Administration Options Create Dealer Account</h3>
          </div>
        
        
          
          <div class="gadget_content">
            <div class="subblock">
            
              <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Pending Id:</td>
      <td><input type="text" name="id" value="<?php echo $row_dlr_id_pass['id']; ?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Assigned_salesrep:</td>
      <td> 
      <input name="assigned_salesrep" type="text" value="<?php echo $row_userDudes['dudes_id']; ?>" readonly="readonly" />
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Contact:</td>
      <td><input type="text" name="contact" value="<?php echo $row_dlr_id_pass['contact']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Contact_phone:</td>
      <td><input type="text" name="contact_phone" value="<?php echo $row_dlr_id_pass['contact_phone']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Contact_phone_type:</td>
      <td><input type="text" name="contact_phone_type" value="<?php echo $row_dlr_id_pass['contact_phone_type']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dmcontact2:</td>
      <td><input type="text" name="dmcontact2" value="<?php echo $row_dlr_id_pass['dmcontact2']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dmcontact2_phone:</td>
      <td><input type="text" name="dmcontact2_phone" value="<?php echo $row_dlr_id_pass['dmcontact2_phone']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dmcontact2_phone_type:</td>
      <td><input type="text" name="dmcontact2_phone_type" value="<?php echo $row_dlr_id_pass['dmcontact2_phone_type']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Company:</td>
      <td><input type="text" name="company" value="<?php echo $row_dlr_id_pass['company']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Website:</td>
      <td><input type="text" name="website" value="<?php echo $row_dlr_id_pass['website']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Finance:</td>
      <td><input type="text" name="finance" value="<?php echo $row_dlr_id_pass['finance']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Finance_contact:</td>
      <td><input type="text" name="finance_contact" value="<?php echo $row_dlr_id_pass['finance_contact']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sales:</td>
      <td><input type="text" name="sales" value="<?php echo $row_dlr_id_pass['sales']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sales_contact:</td>
      <td><input type="text" name="sales_contact" value="<?php echo $row_dlr_id_pass['sales_contact']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Phone:</td>
      <td><input type="text" name="phone" value="<?php echo $row_dlr_id_pass['phone']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fax:</td>
      <td><input type="text" name="fax" value="<?php echo $row_dlr_id_pass['fax']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Address:</td>
      <td><input type="text" name="address" value="<?php echo $row_dlr_id_pass['address']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">City:</td>
      <td><input type="text" name="city" value="<?php echo $row_dlr_id_pass['city']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">State:</td>
      <td><input type="text" name="state" value="<?php echo $row_dlr_id_pass['state']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Zip:</td>
      <td><input type="text" name="zip" value="<?php echo $row_dlr_id_pass['zip']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td><input type="text" name="email" value="<?php echo $row_dlr_id_pass['email']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Username:</td>
      <td><input type="text" name="username" value="<?php echo $row_dlr_id_pass['username']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><input type="text" name="password" value="<?php echo $row_dlr_id_pass['password']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Verified:</td>
      <td><p>
        <label>
          <input type="radio" name="verified" value="y" id="verified_0" />
          Yes </label>
         |
        
        <label>
          <input type="radio" name="verified" value="n" id="verified_1" />
          No</label>
        <br />
      </p></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Token:</td>
      <td><input type="text" name="token" value="<?php echo if(!$row_dlr_id_pass['token']){echo $tkey;}else{$row_dlr_id_pass['token'];} ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Home:</td>
      <td><input type="text" name="home" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">About:</td>
      <td><input type="text" name="about" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Directions:</td>
      <td><input type="text" name="directions" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mapurl:</td>
      <td><input type="text" name="mapurl" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Mapframe:</td>
      <td><input type="text" name="mapframe" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Slogan:</td>
      <td><input type="text" name="slogan" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Disclaimer:</td>
      <td><input type="text" name="disclaimer" value="" size="32" /></td>
    </tr>
    
    
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Paging:</td>
      <td><input type="text" name="paging" value="" size="32" /></td>
    </tr>
    
    
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Status:</td>
      <td><select name="status" id="status">
        <option value="0">Off (Inactive)</option>
        <option value="1">On (Active)</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dealer_chat:</td>
      <td><input type="text" name="dealer_chat" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fuel_pump_display:</td>
      <td><input type="text" name="fuel_pump_display" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dcommercial_youtube_onoff:</td>
      <td><table width="200">
        <tr>
          <td><label>
            <input <?php if (!(strcmp(((isset($_POST["dcommercial_youtube_onoff"]))?$_POST["dcommercial_youtube_onoff"]:""),"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="dcommercial_youtube_onoff" value="1" id="dcommercial_youtube_onoff_0" />
            On</label></td>
        </tr>
        <tr>
          <td><label>
            <input <?php if (!(strcmp(((isset($_POST["dcommercial_youtube_onoff"]))?$_POST["dcommercial_youtube_onoff"]:""),"0"))) {echo "checked=\"checked\"";} ?> type="radio" name="dcommercial_youtube_onoff" value="0" id="dcommercial_youtube_onoff_1" />
            Off</label></td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dcommercial_youtube_title:</td>
      <td><input type="text" name="dcommercial_youtube_title" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dcommercial_youtube_embed:</td>
      <td><input type="text" name="dcommercial_youtube_embed" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dcommercial_youtube_description:</td>
      <td><input type="text" name="dcommercial_youtube_description" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Craigslist_nickname:</td>
      <td><input type="text" name="craigslist_nickname" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Craigslist_vtb_bordercolor:</td>
      <td><input type="text" name="craigslist_vtb_bordercolor" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Craigslist_bg_ad_color:</td>
      <td><input type="text" name="craigslist_bg_ad_color" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Craigslist_pricing_showhide:</td>
      <td><input type="text" name="craigslist_pricing_showhide" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Craigslist_mileage_showhide:</td>
      <td><input type="text" name="craigslist_mileage_showhide" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Customtitle1:</td>
      <td><input type="text" name="customtitle1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Customcontent1:</td>
      <td><input type="text" name="customcontent1" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">FeedIDCars:</td>
      <td><input type="text" name="feedIDCars" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">FeedIDComcast:</td>
      <td><input type="text" name="feedIDComcast" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Feedidautotrader:</td>
      <td><input type="text" name="feedidautotrader" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Feedidfrazer:</td>
      <td><input type="text" name="feedidfrazer" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Feedidautomart:</td>
      <td><input type="text" name="feedidautomart" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Feedidvehix:</td>
      <td><input type="text" name="feedidvehix" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Feedidove:</td>
      <td><input type="text" name="feedidove" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">MetaDescription:</td>
      <td><input type="text" name="metaDescription" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">MetaKeywords:</td>
      <td><input type="text" name="metaKeywords" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ShowPricing:</td>
      <td><input type="text" name="showPricing" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ShowMileage:</td>
      <td><input type="text" name="showMileage" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sla:</td>
      <td><input type="text" name="sla" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td>
        <?php 
	  $show = $row_userDudes['dudes_access_level'];
	  if($show == 1){echo "<input type='submit' value='Insert record' />";}
	  else{echo 'Sorry Your Not Allowed To Add This Dealer';}
	  ?>
        </td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
            
            </div>
          </div>
        
        
        </div>
        
      </div>

      <div class="clr"></div>
    </div>
  </div>