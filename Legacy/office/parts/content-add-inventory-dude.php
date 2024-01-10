<script type="text/javascript">
<!--
function WA_ClientSideReplace(theval,findvar,repvar)     {
  var retval = "";
  while (theval.indexOf(findvar) >= 0)    {
    retval += theval.substring(0,theval.indexOf(findvar));
    retval += repvar;
    theval = theval.substring(theval.indexOf(findvar) + String(findvar).length);
  }
  retval += theval;
  if (retval == "" && theval.indexOf(findvar) < 0)    {
    retval = theval;
  }
  return retval;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function WA_UnloadList(thelist,leavevals,bottomnum)    {
  while (thelist.options.length > leavevals+bottomnum)     {
    if (thelist.options[leavevals])     {
      thelist.options[leavevals] = null;
    }
  }
  return leavevals;
}

function WA_FilterAndPopulateSubList(thearray,sourceselect,targetselect,leaveval,bottomleave,usesource,delimiter)     {
  if (bottomleave > 0)     {
    leaveArray = new Array(bottomleave);
    if (targetselect.options.length >= bottomleave)     {
      for (var m=0; m<bottomleave; m++)     {
        leavetext = targetselect.options[(targetselect.options.length - bottomleave + m)].text;
        leavevalue  = targetselect.options[(targetselect.options.length - bottomleave + m)].value;
        leaveArray[m] = new Array(leavevalue,leavetext);
      }
    }
    else     {
      for (var m=0; m<bottomleave; m++)     {
        leavetext = "";
        leavevalue  = "";
        leaveArray[m] = new Array(leavevalue,leavetext);
      }
    }
  }  
  startid = WA_UnloadList(targetselect,leaveval,0);
  mainids = new Array();
  if (usesource)    maintext = new Array();
  for (var j=0; j<sourceselect.options.length; j++)     {
    if (sourceselect.options[j].selected)     {
      mainids[mainids.length] = sourceselect.options[j].value;
      if (usesource)     maintext[maintext.length] = sourceselect.options[j].text + delimiter;
    }
  }
  for (var i=0; i<thearray.length; i++)     {
    goodid = false;
    for (var h=0; h<mainids.length; h++)     {
      if (thearray[i][0] == mainids[h])     {
        goodid = true;
        break;
      }
    }
    if (goodid)     {
      theBox = targetselect;
      theLength = parseInt(theBox.options.length);
      theServices = thearray[i].length + startid;
      var l=1;
      for (var k=startid; k<theServices; k++)     {
        if (l == thearray[i].length)     break;
        theBox.options[k] = new Option();
        theBox.options[k].value = thearray[i][l][0];
        if (usesource)     theBox.options[k].text = maintext[h] + WA_ClientSideReplace(thearray[i][l][1],"|WA|","'");
        else               theBox.options[k].text = WA_ClientSideReplace(thearray[i][l][1],"|WA|","'");
        l++;
      }
      startid = k;
    }
  }
  if (bottomleave > 0)     {
    for (var n=0; n<leaveArray.length; n++)     {
      targetselect.options[startid+n] = new Option();
      targetselect.options[startid+n].value = leaveArray[n][0];
      targetselect.options[startid+n].text  = leaveArray[n][1];
    }
  }
  for (var l=0; l < targetselect.options.length; l++)    {
    targetselect.options[l].selected = false;
  }
  if (targetselect.options.length > 0)     {
    targetselect.options[0].selected = true;
  }
}
//-->
</script>

<div class="content">
    <div class="content_res">

      <!-- LEFT BLOCK -->
      
      <div class="leftblock vertsortable">
      
      <?php include('modules/top-left-module.php'); ?>
      
      </div>
      
      <!-- End LEFT BLOCK -->

      <!-- RIGHT BLOCK -->
      <div class="rightblock vertsortable">

        <!-- gadget left 1 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Form Example 1</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
<p>You Are About To Add Inventory Into <strong>"<?php echo $row_query_dealer['company']; ?>"</strong> Account...</p>
			<p>
            <strong>Company Name:</strong> <?php echo $row_query_dealer['company']; ?>  | <strong>Dealer ID: </strong> <?php echo  $colname_query_dealer; ?> 

            </p>

<hr />

<form id="addVehicleymkmd" name="addVehicleymkmd" method="POST" action="<?php echo $editFormAction; ?>">
                    
<table width="100%">
                   	                    
                    <tr>
                        	
                        <td>
            	        				<table width="100%" border="0" cellpadding="5" cellspacing="5">
                      <tr>
                        <td colspan="2" align="left">
                        
                            
                            <label><strong>Enter Stock Number:</strong>
                              <input type="text" name="vstockno" id="vstockno" />
                            </label>
                            
                   	  
                        </td>
                        
                        <td colspan="2" align="left">
                        <label><strong>Enter Vehicle Mileage:</strong>
                              <input type="text" name="vmileage" id="vmileage" />
                            </label>
                        
                        </td>
                        </tr>
                      <tr onchange="WA_FilterAndPopulateSubList(**** no fields found *****************\n        _WAJA,MM_findObj('undefined'),MM_findObj('undefined'),0,0,false,': ')">
                        <td align="left" width="150"><h3>&nbsp;Select Year</h3></td>
                        <td align="left" width="150"><h3>&nbsp;Select Make</h3></td>
                        <td align="left"><h3>Select Model</h3></td>
                        <td align="center">&nbsp;</td>
                        
                      </tr>
                      <tr>
                        <td>
                          <label>
                            <select name="vyearid" size="10" id="vyearid">
                              <option value="">Select Year</option>
                              <?php
do {  
?>
                              <option value="<?php echo $row_carYears['year']?>"><?php echo $row_carYears['year']?></option>
                              <?php
} while ($row_carYears = mysqli_fetch_array($carYears));
  $rows = mysqli_num_rows($carYears);
  if($rows > 0) {
      mysqli_data_seek($carYears, 0);
	  $row_carYears = mysqli_fetch_array($carYears);
  }
?>
                            </select>
                          </label>
                        </td>
                        
                        
                        <td>
                          <label>
                            <select name="vmakeid" size="10" id="vmakeid" onchange="WA_FilterAndPopulateSubList(vmodels_WAJA,MM_findObj('vmakeid'),MM_findObj('vmodelid'),0,0,false,': ')">
                              <option value="">Makes</option>
                              <?php
do {  
?>
                              <option value="<?php echo $row_vmakes['make_id']?>"><?php echo $row_vmakes['car_make']?></option>
                              <?php
} while ($row_vmakes = mysqli_fetch_array($vmakes));
  $rows = mysqli_num_rows($vmakes);
  if($rows > 0) {
      mysqli_data_seek($vmakes, 0);
	  $row_vmakes = mysqli_fetch_array($vmakes);
  }
?>
                            </select>
                          </label>
                        </td>
                        
                        
                        
                        
                        <td>
                          <label>
                            <select name="vmodelid" size="10" id="vmodelid" onchange="WA_FilterAndPopulateSubList(**** no fields found *****************\n        _WAJA,MM_findObj('vmakeid'),MM_findObj('vmodelid'),0,0,false,': ')">
                              <option value="">Models Appear</option>
                            </select>
                          </label>
                        </td>
                        <td>
                        
                        	<table>
                                 	<tr>
                              	<td valign="top">
                              	  <label><h4><b>Exterior Color:</b></h4><br  />
                              	    <select name="vexterior_color" id="vexterior_color">
                              	      <option value="">Select Color</option>
                              	      <?php
do {  
?>
                              	      <option value="<?php echo $row_colors_hex['color_id']?>"> <?php echo $row_colors_hex['color_name']; ?> </option>
                              	      <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
                           	        </select>
                       	      </label>
                              	  <</td>
                                    </tr>

                                 	<tr>
                              	<td>
                        		<br /><br />
                        		
                        		<label><h4><b>Interior Color:</b></h4><br />
                        		  <select name="vinterior_color" id="vinterior_color">
                        		    <option value="">Select Color</option>
                        		    <?php
do {  
?>
                        		    <option value="<?php echo $row_colors_hex['color_id']?>"><?php echo $row_colors_hex['color_name']?></option>
                        		    <?php
} while ($row_colors_hex = mysqli_fetch_array($colors_hex));
  $rows = mysqli_num_rows($colors_hex);
  if($rows > 0) {
      mysqli_data_seek($colors_hex, 0);
	  $row_colors_hex = mysqli_fetch_array($colors_hex);
  }
?>
                      		    </select>
                      		  </label>
                        		</td>
                                    </tr>

			                            </table>
                        
                        </td>
                        
                      </tr>
                      <tr>
                        <td><label for="vdprice"><strong>Down Payment:</strong></label>
                        <input type="text" name="vdprice" id="vdprice" /></td>
                        <td><label for="vspecialprice"><strong>Internet Price:</strong></label>
                        <input type="text" name="vspecialprice" id="vspecialprice" /></td>
                        <td><label for="vrprice"><strong>Retail Price:</strong></label>
                        <input type="text" name="vrprice" id="vrprice" /></td>
                        <td><label for="vlivestatus"><strong>Vehicle Status:</strong></label>
                          <select name="vlivestatus2" id="vlivestatus">
                            <option value="2">Hold</option>
                            <option value="1">Live</option>
                        </select></td>
                      </tr>
                      <tr>
                        <td><input name="did" type="hidden" id="did" value="<?php echo $row_query_dealer['id']; ?>" /></td>
                        <td><br />
                        <label>
                          <button class="ui-state-default ui-corner-all ui-button" type="submit">Start Vehicle Process</button>
                          <!-- <input type="submit" name="submit" id="submit" value="Enter Vehicle" /> -->
                        </label>
                        &nbsp;
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                  		</td>
                         	
                    	
                   </tr>
                  </table>
                   <input type="hidden" name="MM_insert" value="addVehicleymkmd" />
</form>



              <p>&nbsp;</p>
            </div>
          </div>
        </div>
        
        <!-- gadget right 5 -->
        <div class="gadget">
          <div class="gadget_title gradient37 vertsortable_head">
            <a href="#" class="hidegadget" rel="hide_block"><img src="images/spacer.gif" alt="picture" width="19" height="33" /></a>
            <h3>Live Inventory By Last Created:</h3>
          </div>
          <div class="gadget_content">
            <div class="subblock">
              <form action="" method="post" id="form_userstable">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="gwlines">


              <tr>
                <th width="40"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Stock No.</th>
                <th width="100">Year</th>
                <th width="90">Make</th>
                <th width="120">Model</th>
                <th colspan="2">Actions</th>
              </tr>

<?php do { ?>    
     

              <tr>
                <td><input name="utc1" id="utc2" type="checkbox" class="utc" /></td>
                <td><?php echo $row_vehicles_bystock['vstockno']; ?></td>
                <td><?php echo $row_vehicles_bystock['vyear']; ?></td>
                <td><?php echo $row_vehicles_bystock['vmake']; ?></td>
                <td><?php echo $row_vehicles_bystock['vmodel']; ?></td>
                <td width="28">
                	<a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a>
                </td>
                <td width="28">
                	<a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a>
                </td>
              </tr>
<?php } while ($row_vehicles_bystock = mysqli_fetch_array($vehicles_bystock)); ?>

              <tr>
                <td><input name="utc1" id="utc3" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              <tr class="last">
                <td><input name="utc1" id="utc4" type="checkbox" class="utc" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="#"><img src="images/pimpa_yes.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
                <td><a href="#"><img src="images/pimpa_no.gif" alt="picture" width="15" height="15" class="tabpimpa" /></a></td>
              </tr>
              </table>
              </form>
            </div>
          </div>
        </div>
        
      </div>

      <div class="clr"></div>
    </div>
  </div>