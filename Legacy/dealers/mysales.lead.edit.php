<?php require_once("db_sales_loggedin.php"); ?>
<?php

$colname_view_thislead = "-1";
if (isset($_GET['leadid'])) {
  $colname_view_thislead = $_GET['leadid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_view_thislead =  "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE `cust_dealer_id` = '$did' AND cust_leadid = '$colname_view_thislead'";
$view_thislead = mysqli_query($idsconnection_mysqli, $query_view_thislead);
$row_view_thislead = mysqli_fetch_assoc($view_thislead);
$totalRows_view_thislead = mysqli_num_rows($view_thislead);

$lead_cust_leadid = $row_view_thislead['cust_leadid'];
$cust_dealer_id =  $row_view_thislead['cust_dealer_id'];


if($cust_dealer_id != $did){
  //header('Location: mysales.leads.php');
}

// Just To Be On The SafeSide We Assign the new lead to the same function name in db_loggedin.
$cust_lead_id = $row_view_thislead['cust_leadid'];

function update_seenLead($did, $cust_lead_id){

global $database_idsconnection;
global $idsconnection_mysqli;

			//$cvid = $row_customer_leads['customer_vehicles_id'];
			if(!$cust_lead_id || !$did) return;
			mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
			$update_seenlead = "UPDATE `idsids_idsdms`.`cust_leads` SET `cust_seenbydlr` = '1' WHERE `cust_leadid` = '$cust_lead_id'";
			$findmyresult = mysqli_query($idsconnection_mysqli, $update_seenlead);

return;

}

update_seenLead($did, $cust_lead_id);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM `idsids_idsdms`.`states`";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_cust_leadnotes = "SELECT * FROM `idsids_idsdms`.`cust_lead_notes` WHERE `lead_cust_leadid` = '$lead_cust_leadid' ORDER BY lead_note_created DESC";
$query_cust_leadnotes = mysqli_query($idsconnection_mysqli, $query_query_cust_leadnotes);
$row_query_cust_leadnotes = mysqli_fetch_assoc($query_cust_leadnotes);
$totalRows_query_cust_leadnotes = mysqli_num_rows($query_cust_leadnotes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_bodystyles = "SELECT * FROM `idsids_idsdms`.`body_styles` ORDER BY `body_style_name` ASC";
$query_bodystyles = mysqli_query($idsconnection_mysqli, $query_query_bodystyles);
$row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles);
$totalRows_query_bodystyles = mysqli_num_rows($query_bodystyles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_options_months = "SELECT * FROM `idsids_idsdms`.`months_options` ORDER BY `months_options`.`month_id` ASC";
$options_months = mysqli_query($idsconnection_mysqli, $query_options_months);
$row_options_months = mysqli_fetch_assoc($options_months);
$totalRows_options_months = mysqli_num_rows($options_months);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_options_years = "SELECT * FROM `idsids_idsdms`.`year_options` ORDER BY `year_options`.`year_id` ASC";
$options_years = mysqli_query($idsconnection_mysqli, $query_options_years);
$row_options_years = mysqli_fetch_assoc($options_years);
$totalRows_options_years = mysqli_num_rows($options_years);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_paydayType = "SELECT * FROM `idsids_idsdms`.`income_interval_options`";
$paydayType = mysqli_query($idsconnection_mysqli, $query_paydayType);
$row_paydayType = mysqli_fetch_assoc($paydayType);
$totalRows_paydayType = mysqli_num_rows($paydayType);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_true_salesperson = "SELECT * FROM `idsids_idsdms`.`sales_person` WHERE `main_dealerid` = '$did' AND  `acct_status` = '1' ORDER BY `salesperson_firstname` ASC";
$true_salesperson = mysqli_query($idsconnection_mysqli, $query_true_salesperson);
$row_true_salesperson = mysqli_fetch_assoc($true_salesperson);
$totalRows_true_salesperson = mysqli_num_rows($true_salesperson);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Lead View</title>

<?php include("inc.head.php"); ?>

<style type="text/css">

input#cust_name_suffix {
    width: 108% !important;
}
select#cust_titlename{
    width: 108% !important;
}

button#save_lead {
    width: 90%;
}

div#map_canvas {
	width:100%;
	height:500px;
	min-height: 500px !important;
	display:block;
}

textarea#lead_notes
{
  border:1px solid #999999;
  width:100%;
  margin:5px 0;
  padding:3px;
}

textarea#lead_notes {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
}

</style>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.sales.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        
        <?php include("_nav_top.sales.php"); ?>
            
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Lead View</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="mysales.dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="mysales.leads.php">Leads</a>
                        </li>
                        <li class="active">
                            <a href="mysales.lead.view.php?leadid=<?php echo $row_view_thislead['cust_leadid']; ?>"><strong>Lead View</strong></a>
                            <input id="cust_leadid" type="hidden" value="<?php echo $row_view_thislead['cust_leadid']; ?>">
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">


			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                    	<a data-backdrop="static" data-toggle="modal" data-target="#dealMatrixModal" class="btn btn-primary btn-lg">Deal Matrix</a>
                        <a href="mysales.leads.php" class="btn btn-primary btn-lg">Leads</a>                    
                        <a class="btn btn-warning btn-lg">Viewing Lead</a>
                    </div>
                </div>
            </div>




<div class="panel blank-panel">

                        <div class="panel-heading">
                            <div class="panel-title m-b-md">
                            <h4>Lead View/Options</h4>
                            </div>
                            
                            <div class="panel-options">
<ul id="sales_desk_tabs" class="nav nav-tabs">
                                    <li class="active">
                                    	<a data-toggle="tab" href="#tab-4">
                                        <i class="fa fa-pencil fa-3x"></i>View/Edit</a>
                                    </li>
                                    <li class="">
                                    	<a data-toggle="tab" href="#tab-5">
                                        	<i class="fa fa-clipboard fa-3x"></i> Notes</a>
                                    </li>
                                    <li class="">
                                    	<a data-toggle="tab" href="#tab-6">
                                        	<i class="fa fa-car fa-3x"></i>Vehicle &amp; Trade</a>
                                    </li>
                                    <!--li class="">
                                    	<a data-toggle="tab" href="#tab-7">
                                        	<i class="fa fa-list-ol fa-3x"></i> To Do</a>
                                    </li>
                                    <li class="">
                                    	<a data-toggle="tab" href="#tab-8">
                                        	<i class="fa fa-cogs fa-3x"></i> Lead Action(s)</a>
                                    </li -->
                                </ul>
                                
                            
                            
                            </div>
                        
                        
                        
                        </div>

                        <div class="panel-body">

                            <div class="tab-content">
                                <div id="tab-4" class="tab-pane active">

									<?php include("content/body.mysales.lead.view.edit.php"); ?>


                                </div>

                                <div id="tab-5" class="tab-pane">


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Notes <small>This section displays recorded Notes on this lead.</small></h5>
                        </div>
                    <div class="ibox-content">
                        
                        
                        <div class="row">
                        	<div class="col-lg-12">
                            
                            <div class="form-group">
                            
                        <label class="col-sm-2">
                        Notes:
                        </label>
                        
                        <div class="col-sm-10">
                        	<textarea class="left-float" id="cust_bodynote" rows="4" cols="50"></textarea>
                        </div>
                        
                        <div class="row">
                        
                        	<div class="col-lg-12" align="center">
                            	<button id="save_notes" class="btn btn-w-m btn-success" type="button">Save Notes</button>
                        		<div class="hr-line-dashed"></div>

                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-lg-12">
                            
                            
                            

<p>Note History</p>
<p>  </p>
  
<div id="master_notes_layout" class="table-responsive">


                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th></th>
                                        <th>Project </th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

<?php if($row_query_cust_leadnotes['leadnote_id'] > 0):  do { ?>

                    <tr id="notes_view_<?php echo $row_query_cust_leadnotes['leadnote_id']; ?>">
                        <td>
                        	
                        </td>
                        <td>
                        	By: <small><?php echo $row_query_cust_leadnotes['lead_note_nametext']; ?></small>
                        </td>
                        <td>
							
                            <p><?php echo $row_query_cust_leadnotes['lead_note_body']; ?></p>

                        </td>
                        <td>
                        	 <?php echo $row_query_cust_leadnotes['lead_note_created']; ?>
                        </td>
                        <td>
                        	<a href="#"><i class="fa fa-check text-navy"></i></a>
                        </td>
                    </tr>







<?php } while ($row_query_cust_leadnotes = mysqli_fetch_assoc($query_cust_leadnotes)); endif; ?>
                                    </tbody>
                                </table>
                            
</div>


                            
                        		<div class="hr-line-dashed"></div>
                            </div>
                        </div>


                        
                            </div>
                        
                        
                        	</div>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                            
                        </div><!-- End Ibox Content For Notes -->
                    </div>
                </div>
            </div>


                                    
                                </div>
                                <div id="tab-6" class="tab-pane">




            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Selling Vehicle Information <small>This section displays google map of above address</small></h5>
                        </div>
                        <div class="ibox-content">
                        
                        <div class="form-horizontal">
                        
                        
                        		<div class="form-group">
                                	
                                    <div class="col-sm-12">
                                    	<button id="pull_inventory_view" class="btn btn-block btn-lg">Pull Live Inventory View</button>
                                    </div>
                                    
                                </div>
                        
                        
                        
                        
                                                        <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Down Payment Information</label>

                                    <div class="col-sm-10"><input id="cust_downpayment" type="text" placeholder="Down Payment" class="form-control input-lg m-b" value="<?php echo $row_view_thislead['cust_downpayment']; ?>">
                                        
                                        
                                    </div>
                                 
                                 
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Desired Payment</label>
                                 	<div class="col-sm-10"><input id="cust_desiredpymt" class="form-control" value="<?php echo $row_view_thislead['cust_desiredpymt']; ?>" placeholder="Desired Payment">
                                    </div>
                                 
                                 </div>
                                
                                <div class="hr-line-dashed"></div>

<?php 
$vid_present = "";
if($row_view_thislead['cust_vehicle_id']) {
	
	
	$vid_present = "has-success";
}else{

	$vid_present = "has-error";
}
?>
                                
                                <div id="selling_vid_div" class="form-group <?php echo $vid_present; ?>">
                                	<label class="col-sm-2 control-label">Selling Vehicle</label>
                                    
                                    <input id="cust_vehicle_id" type="hidden" value="<?php echo $row_view_thislead['cust_vehicle_id']; ?>">

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><input type="text" id="cust_vstockno" class="form-control" placeholder="Stock No." value="<?php echo $row_view_thislead['cust_vstockno']; ?>"> <span class="input-group-btn"> <button type="button" class="btn btn-primary">Search!
                                        </button> </span></div>



                                        <div class="row">
                                            <div class="col-md-3"><label>Year</label><input id="cust_vyear" type="text" placeholder="Year" value="<?php echo $row_view_thislead['cust_vyear']; ?>" class="form-control" data-mask="9999"></div>
                                            <div class="col-md-3"><label>Make</label><input id="cust_vmake" type="text" placeholder="Make" value="<?php echo $row_view_thislead['cust_vmake']; ?>" class="form-control"></div>
                                            <div class="col-md-3"><label>Model</label><input id="cust_vmodel" type="text" placeholder="Model" value="<?php echo $row_view_thislead['cust_vmodel']; ?>" class="form-control"></div>
                                            <div class="col-md-3"><label>Trim</label><input id="cust_vtrim" type="text" placeholder="Trim"  value="<?php echo $row_view_thislead['cust_vtrim']; ?>" class="form-control"></div>

                                        </div>



                                        <div class="row">
                                          <div class="input-group m-b">
                                            <div class="col-md-6"><label>Miles:</label><input id="cust_vmiles" type="text" placeholder="Miles" class="form-control" value="<?php echo $row_view_thislead['cust_vmiles']; ?>" ></div>
                                            <div class="col-md-6"><label>Body Style:</label>
<select id="cust_vbody" name="cust_vbody" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_view_thislead['cust_vbody']))) {echo "selected=\"selected\"";} ?>>Select Body Style</option>
    <?php
do {  
?>
<option value="<?php echo $row_query_bodystyles['body_style_name']?>"<?php if (!(strcmp($row_query_bodystyles['body_style_name'], $row_view_thislead['cust_vbody']))) {echo "selected=\"selected\"";} ?>><?php echo $row_query_bodystyles['body_style_name']?></option>
    <?php
} while ($row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles));
  $rows = mysqli_num_rows($query_bodystyles);
  if($rows > 0) {
      mysqli_data_seek($query_bodystyles, 0);
	  $row_query_bodystyles = mysqli_fetch_assoc($query_bodystyles);
  }
?>
  </select>
                                              </div>
                                          </div>
                                        </div>
                                    
                                    
                                    
                                    </div>
                                </div>


                                <div class="form-group has-success">
                                <label class="col-sm-2 control-label">Vehicle Selling Price <br /><small>Check Box If Negotiating.</small></label>

                                    <div class="col-sm-10">
<div class="input-group m-b">
    <span class="input-group-addon"> 
        <input type="checkbox"> 
    </span> 
    <input id="cust_vsellingprice" placeholder="Selling Price" class="form-control" type="text" value="<?php echo $row_view_thislead['cust_vsellingprice']; ?>">
</div>



                                    
                                    
                                    </div>
                                </div>


                                <div class="form-group has-success">
                                <label class="col-sm-2 control-label">Customer Counter Offer</label>

                                    <div class="col-sm-10"><input id="counter_offer" class="form-control" type="text" value="<?php echo $row_view_thislead['counter_offer']; ?>"></div>
                                </div>


                                <div class="form-group has-warning">
                                <label class="col-sm-2 control-label">Dealer Final Offer</label>

                                    <div class="col-sm-10"><input id="counter_offer2" class="form-control" type="text" value="<?php echo $row_view_thislead['counter_offer2']; ?>"></div>
                                </div>




                                <div class="hr-line-dashed"></div>
                        
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>






            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Trade Vehicle Information <small>this section belongs to vehicle trade information.</small></h5>
                        </div>
                        
                        <div class="ibox-content">
                        
                        <div class="form-horizontal">
                        
                        
                                <div class="hr-line-dashed"></div>
<div id="trade_info_option" class="row">

                                 <div class="form-group"><label  class="col-sm-2 control-label">Trade Yes</label>
                                 	<div class="col-sm-10"><input <?php if (!(strcmp($row_view_thislead['tradeYes'],"Y"))) {echo "checked=\"checked\"";} ?> id="tradeYes" class="form-control" type="checkbox" value="Y">
                                    </div>
                                 
                                 </div>
</div>
<div id="showhide_tradeinfo" class="row" style="display:none;">
                                 <div class="form-group"><label  class="col-sm-2 control-label">Trade Current Payment</label>
                                 	<div class="col-sm-10"><input id="tradePayment" class="form-control" placeholder="Monthly Payment"type="text" value="<?php echo $row_view_thislead['tradePayment']; ?>">
                                    </div>
                                 
                                 </div>

                                <div class="hr-line-dashed"></div>
                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Trade Pay Off</label>
                                 	<div class="col-sm-10"><input id="tradePayoff" placeholder="Pay Off Amount" class="form-control" type="text" value="<?php echo $row_view_thislead['tradePayoff']; ?>">
                                    </div>
                                 
                                 </div>
                                
                                <div class="hr-line-dashed"></div>

                                
                                <div class="form-group">
                                	<label class="col-sm-2 control-label">Trade VIN:</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><input id="tradeVin" type="text" class="form-control" placeholder="Vin Number" value="<?php echo $row_view_thislead['tradeVin']; ?>"> <span class="input-group-btn"> <button type="button" class="btn btn-primary">Process
                                        </button> </span></div>



                                        <div class="row">
                                            <div class="col-md-3"><label>Trade Year</label><input id="tradeYear" type="text" placeholder="Year" class="form-control" value="<?php echo $row_view_thislead['tradeYear']; ?>"></div>
                                            <div class="col-md-3"><label>Trade Make</label><input id="tradeMake" type="text" placeholder="Make" class="form-control" value="<?php echo $row_view_thislead['tradeMake']; ?>"></div>
                                            <div class="col-md-3"><label>Trade Model</label><input id="tradeModel" type="text" placeholder="Model" class="form-control" value="<?php echo $row_view_thislead['tradeModel']; ?>"></div>
                                            <div class="col-md-3"><label>Trade Trim</label><input id="tradeTrim" type="text" placeholder="Trim" class="form-control" value="<?php echo $row_view_thislead['tradeTrim']; ?>"></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                
                                 <div class="form-group"><label  class="col-sm-2 control-label">Trade Miles</label>
                                 	<div class="col-sm-10"><input id="tradeMiles" type="text" class="form-control" placeholder="Odometer/Miles" value="<?php echo $row_view_thislead['tradeMiles']; ?>">
                                    </div>
                                 
                                 </div>
                                
                                <div class="hr-line-dashed"></div>
</div>                        
                        </div>
                            
                        </div>
                    
                    
                    </div>
                </div>
            </div>







                                </div>
                                
                                <div id="tab-7" class="tab-pane">
                                
                                    <h1>Coming Soon Tab 7</h1>
                                
                                </div>


                                <div id="tab-8" class="tab-pane">
                                	
                                    <h1>Coming Soon Tab 8</h1>
                                    
                                    
	<div class="row">
    	<div class="col-md-12" align="center">
            <button id="convert_to_customer" type="button" class="btn btn-primary btn-lg">Convert To Customer</button>

            <button id="convert_to_credit_app" type="button" class="btn btn-primary btn-lg">Convert To Credit Application</button>
                                    
                                
		</div>
    </div>
                            
                            
                            
                            
                            
                            
                            </div>

                        </div>

                    </div>








        
        
        
            <div id="save_bottom Information" class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Save This Lead </h5>
                        </div>
                        <div class="ibox-content">
                            
                        
                        

<div class="row">


    
    <div class="form-group">
    	<div class="row">
        <div class="col-lg-12" align="center">
        <button id="save_lead" class="btn btn-lg btn-primary m-t-n-xs" type="button"><strong>Save</strong></button>
        </div>
        </div>
    </div>



                        
                        </div>
                        
                        
                        </div>
                    </div>
                </div>
            </div>
        






        
        
        
        </div>
        
        <?php include("footer.php"); ?>

        </div>
        </div>


    </div>
    <!-- Mainly scripts -->
	<?php include("inc.end.mysales.body.php"); ?>
    

    <script src="js/custom/page/custom.mysales.lead.edit.js"></script>

    <script src="js/custom/google/goog_map.pullmap.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($view_thislead);

mysqli_free_result($options_months);

mysqli_free_result($options_years);

?>