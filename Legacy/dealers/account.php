<?php require_once("db_loggedin.php"); ?>
<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_qry_dlrtypes = "SELECT * FROM dealer_types ORDER BY dtype_id ASC";
$qry_dlrtypes = mysqli_query($idsconnection_mysqli, $query_qry_dlrtypes);
$row_qry_dlrtypes = mysqli_fetch_assoc($qry_dlrtypes);
$totalRows_qry_dlrtypes = mysqli_num_rows($qry_dlrtypes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_states = "SELECT * FROM states";
$states = mysqli_query($idsconnection_mysqli, $query_states);
$row_states = mysqli_fetch_assoc($states);
$totalRows_states = mysqli_num_rows($states);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_timezones = "SELECT * FROM `calendar|timezones` ORDER BY TimeZone ASC";
$dlr_timezones = mysqli_query($idsconnection_mysqli, $query_dlr_timezones);
$row_dlr_timezones = mysqli_fetch_assoc($dlr_timezones);
$totalRows_dlr_timezones = mysqli_num_rows($dlr_timezones);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Account Information</title>


<?php include("inc.head.php"); ?>

    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
<style type="text/css">
textarea#dealer_disclaimer.form-control {
height: auto !important;
}

div#map_canvas {
    height: 400px;
}

</style>

</head>

<body>

    <div id="wrapper">


<!-- Start Single Profile Photo Modal -->    
                            <div class="modal inmodal" id="salepersonUploadModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-laptop modal-icon"></i>
                                            <h4 class="modal-title">Upload Store Photos</h4>
                                            <small class="font-bold">Upload Store photos for publishing online for places like autocity magazine.</small>
                                        </div>
                                        <div class="modal-body">
                                           <div class="row">

                                           		<div class="col-sm-12">
                                                
                                            <div class="form-group">
											<label>Photo Comments: </label>
											<input id="store_photo_albumcomments" class="form-control" type="text" value="" />
                                            </div>
                                            <div class="form-group">
											<input id="store_photo_datetaken" class="form-control" type="hidden" value="<?php echo date('Y-m-d'); ?>" />

                                           	<input id="changestorephoto_final" type="hidden" value="1" />
                                            </div>
                                                
                                                </div>
                                           
                                           </div>
                                           <div class="row">
                                           
                                           		<div class="col-sm-12">
                                                
			                                           <div id="store_photo_onedropbox" class="dropzone">	                                                
                                                
                                                </div>
                                           </div>

                                           
                                           </div>
                                           
                                           
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button id="clearall_one" type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            
                                            <button id="savestorephoto" type="button" class="btn btn-primary">Save And Change Profile</button>
                                            <button id="savestorephotoonly" type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!-- End Single Profile Photo Modal -->    

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        
        <?php include("_nav_top.php"); ?>
            
<!-- Bread Crumbs -->            
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>My Account</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>My Account</a>
                        </li>
                        <li class="active">
                            <strong>Viewing My Account</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">




            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                    
                        <div class="ibox-title">
                            <h5>Dealership Store &amp; Account Information <small>This section also displays google map of your store address be sure latitude and longitude is saved.</small></h5>
                        </div>
                        <div class="ibox-content">
                        
                        <div class="form-horizontal">
                        
                        
                        
                        
        
						<div class="row white-bg">
                                <div class="col-lg-12">
                                
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                            <a href="#tab-1" data-toggle="tab">Account Information</a></li>
                                            <li class=""><a href="#tab-2" data-toggle="tab">Store Information</a></li>
                                            <li><a href="#tab-3" data-toggle="tab">Financial Information</a></li>
                                            <li><a href="#tab-4" data-toggle="tab">Notification Settings</a></li>
                                            <li><a href="#tab-5" data-toggle="tab">Widget Activation</a></li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                <div class="tab-content">
                                <div class="tab-pane active" id="tab-1">





                                <div class="form-group"><label class="col-sm-2 control-label">Company Name:</label>

                                    <div class="col-sm-10"><input id="company" type="text" class="form-control" value="<?php echo $row_userDets['company']; ?>"><span class="help-block m-b-none">May be public to advertisement, website and etc.</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">Dealership Legal Name:</label>

                                    <div class="col-sm-10"><input id="company_legalname" type="text" class="form-control" value="<?php echo $row_userDets['company_legalname']; ?>"><span class="help-block m-b-none">Internal not public information mainly for billing purposes.</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label">Primary Business Model:</label>

                                    <div class="col-sm-10">
    <select id="dealer_type_id" class="form-control">
      <option value="" <?php if (!(strcmp("", $row_userDets['dealer_type_id']))) {echo "selected=\"selected\"";} ?>>Select Dealer Type</option>
      <?php do {  ?>
			<option value="<?php echo $row_qry_dlrtypes['dtype_id']?>"<?php if (!(strcmp($row_qry_dlrtypes['dtype_id'], $row_userDets['dealer_type_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_qry_dlrtypes['dtype_label']?></option>
      	<?php
			} while ($row_qry_dlrtypes = mysqli_fetch_assoc($qry_dlrtypes));
			  $rows = mysqli_num_rows($qry_dlrtypes);
			  if($rows > 0) {
				  mysqli_data_seek($qry_dlrtypes, 0);
				  $row_qry_dlrtypes = mysqli_fetch_assoc($qry_dlrtypes);
			  }
		?>
    </select>
                                    <span class="help-block m-b-none">Best description of your finance model.</span>
                                  </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">1st. Point Of Contact: (Name)</label>

                                    <div class="col-sm-10">
                                    <input class="form-control" id="contact" value="<?php echo $row_userDets['contact']; ?>">
                                    <span class="help-block m-b-none">Name Of Primary Account Holder, decision maker of this account the owner.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                              <div class="form-group"><label class="col-sm-2 control-label">1st. Point Of Contact: (Title)</label>

                                    <div class="col-sm-10">
                                    <select class="form-control" id="contact_title">
                                      <option value="Owner/CEO" <?php if (!(strcmp("Owner/CEO", $row_userDets['contact_title']))) {echo "selected=\"selected\"";} ?>>Owner/CEO</option>
                                      <option value="GM" <?php if (!(strcmp("GM", $row_userDets['contact_title']))) {echo "selected=\"selected\"";} ?>>GM</option>
                                      <option value="Other" <?php if (!(strcmp("Other", $row_userDets['contact_title']))) {echo "selected=\"selected\"";} ?>>Other</option>
                                    </select>
                                    
                                    <span class="help-block m-b-none">Main Account, decision maker title of this account the owner.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">2nd Point Of Contact: Decision Maker:</label>

                                    <div class="col-sm-10"><input id="dmcontact2" type="text" class="form-control" value="<?php echo $row_userDets['dmcontact2']; ?>"><span class="help-block m-b-none">Main Account, decision maker of this account the owner.</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">2nd Point Of Contact: (Title)</label>

                                    <div class="col-sm-10"><input id="dmcontact2_title" type="text" class="form-control" value="<?php echo $row_userDets['dmcontact2_title']; ?>"><span class="help-block m-b-none">Main Account, decision maker of this account the owner.</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label">Store Address:</label>

                                    <div class="col-sm-10"><input id="address" type="text" class="form-control" value="<?php echo $row_userDets['address']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">City:</label>

                                    <div class="col-sm-10"><input id="city" type="text" class="form-control" value="<?php echo $row_userDets['city']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">State:</label>

                                    <div class="col-sm-10">
  <select class="form-control m-b" name="state" id="state">
    <?php
do {  
?>
    <option value="<?php echo $row_states['state_abrv']?>"<?php if (!(strcmp($row_states['state_abrv'], $row_userDets['state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_states['state_name']?></option>
    <?php
} while ($row_states = mysqli_fetch_assoc($states));
  $rows = mysqli_num_rows($states);
  if($rows > 0) {
      mysqli_data_seek($states, 0);
	  $row_states = mysqli_fetch_assoc($states);
  }
?>
  </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label for="zip" class="col-sm-2 control-label">Zip:</label>

                                    <div class="col-sm-10"><input id="zip" type="text" class="form-control" value="<?php echo $row_userDets['zip']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>




                                <div class="form-group">
                                <label class="col-sm-2 control-label">Country:</label>

                                    <div class="col-sm-10">
									<select class="form-control m-b"id="country">
                                        <option value="USA" selected="selected">United States of America: USA</option>
                                    </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Time Zones:</label>
                                    <div class="col-sm-10">
<select class="form-control m-b" id="dealerTimezone" name="dealerTimezone">
  <option value="America/New_York" selected="selected" <?php if (!(strcmp("America/New_York", $row_userDets['dealerTimezone']))) {echo "selected=\"selected\"";} ?>>America/New_York</option>
  <?php
do {  
?>
  <option value="<?php echo $row_dlr_timezones['TimeZone']?>"<?php if (!(strcmp($row_dlr_timezones['TimeZone'], $row_userDets['dealerTimezone']))) {echo "selected=\"selected\"";} ?>><?php echo $row_dlr_timezones['TimeZone']?>  | <?php echo $row_dlr_timezones['CountryCode']; ?> | <?php echo $row_dlr_timezones['UTC offset']; ?> | <?php echo $row_dlr_timezones['UTC DST offset']; ?> | <?php echo $row_dlr_timezones['Notes']; ?></option>
  <?php
} while ($row_dlr_timezones = mysqli_fetch_assoc($dlr_timezones));
  $rows = mysqli_num_rows($dlr_timezones);
  if($rows > 0) {
      mysqli_data_seek($dlr_timezones, 0);
	  $row_dlr_timezones = mysqli_fetch_assoc($dlr_timezones);
  }
?>
</select>
                                        <span class="help-block">i.e. "America/New_York, America/Chicago, America/Knox_IN, America/Los_Angeles"</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                <label class="col-sm-2 control-label">Pull Map</label>
                                <input id="dlr_ok_googlemp" type="hidden" value="<?php echo $row_userDets['dlr_ok_googlemp']; ?>">

                                    <div class="col-sm-10">
											<button id="pull_dlr_map" class="btn btn-primary btn-lg btn-outline">Pull Map</button>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group">
                                <label class="col-sm-2 control-label">Geo Latitude</label>

                                    <div class="col-sm-10">
<input id="dlr_geo_latitude" type="text" class="form-control" value="<?php echo $row_userDets['dlr_geo_latitude']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                <label for="dlr_geo_longitude" class="col-sm-2 control-label">Geo Longitude</label>

                                    <div class="col-sm-10">
<input id="dlr_geo_longitude" type="text" class="form-control" value="<?php echo $row_userDets['dlr_geo_longitude']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>





                                </div>
                                <div class="tab-pane" id="tab-2">



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Main Phone Number:</label>
                                    <div class="col-sm-10">
                                        <input id="phone" type="text" class="form-control" data-mask="1(999) 999-9999" placeholder="" value="<?php echo $row_userDets['phone']; ?>">
                                        <span class="help-block">1(999) 999-9999</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Main Fax Number:</label>
                                    <div class="col-sm-10">
                                        <input id="fax" type="text" class="form-control" data-mask="1(999) 999-9999" placeholder="" value="<?php echo $row_userDets['fax']; ?>">
                                        <span class="help-block">1(999) 999-9999</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Main Email: (Login Purposes)</label>
                                    <div class="col-sm-10">
                                        <p class="form-control-static"><?php echo $row_userDets['email']; ?></p>
                                        <span class="help-block">Main email address this will be used for main communications and also login credentials to main dealer account.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Website Url:</label>
                                    <div class="col-sm-10">
                                        <input id="website_url" class="form-control" value="<?php echo $row_userDets['website']; ?>" disabled="disabled">
                                        <span class="help-block">This url should not have http:// nor www.</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Accounts Payable Name:</label>
                                    <div class="col-sm-10">
                                        <input id="accts_payables_name" name="accts_payables_name" type="text" class="form-control" placeholder="" value="<?php echo $row_userDets['accts_payables_name']; ?>">
                                        <span class="help-block">Will be CC on invoices and bills</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Accounts Payable Email:</label>
                                    <div class="col-sm-10">
                                        <input id="accts_payables_email" type="text" class="form-control" placeholder="" value="<?php echo $row_userDets['accts_payables_email']; ?>">
                                        <span class="help-block">Will be CC on invoices and bills</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>






                                </div>


                                <div class="tab-pane" id="tab-3">
                                	<h2>Financial Information</h2>

                                <div class="form-group"><label class="col-sm-2 control-label">Currency Accepted:</label>

                                    <div class="col-sm-10">
									<select class="form-control m-b" id="settingCurrency" name="settingCurrency">
                                        <option value="USD" selected="selected">USD</option>
                                    </select>

                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>









                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>

                                </div>

                                <div class="tab-pane" id="tab-4">
                                	<h2>Notification Settings</h2>
                                
                                
                                
                                
                                
                                
                                
                                </div>
                                <div class="tab-pane" id="tab-5">
                                	<h2>Widget Activation</h2>
                            
                            	
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                </div><!-- End tab-5 -->
                               </div><!-- End tab-contnet -->
        						
                                
                                
                                </div>
								</div>


								</div>
						</div>
            
            
                        
                        
                        
                        
                        
                        
                        
                        </div>
                        
                        
                        </div>

					</div>
               </div>
           </div>

 
             <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Save Account Information</h5>
                    </div>
                    <div class="ibox-content" align="center">





							<button id="save_account_settings" class="ladda-button ladda-button-demo btn btn-primary btn-lg btn-rounded" data-style="zoom-in">Save Account Information</button>




                    </div>
                </div>
            </div>
            </div>
       
        
            
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Map <small>viewing map from entered address</small></h5>
                    </div>
                    <div class="ibox-content">


					<div class="row">
			         <div class="col-lg-12">

                        <div id="api_result">
                        
                        
                        </div>
                     </div>
                    </div>

					<div class="row">
                      <div class="col-lg-12">
						<div id="map_canvas">
                    
                    
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



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>
    <!-- Ladda -->
    <script src="js/plugins/ladda/spin.min.js"></script>
    <script src="js/plugins/ladda/ladda.min.js"></script>
    <script src="js/plugins/ladda/ladda.jquery.min.js"></script>

<script>

    $(document).ready(function (){

        // Bind normal buttons
        $( '.ladda-button' ).ladda( 'bind', { timeout: 2000 } );

        // Bind progress buttons and simulate loading progress
        Ladda.bind( '.progress-demo .ladda-button',{
            callback: function( instance ){
                var progress = 0;
                var interval = setInterval( function(){
                    progress = Math.min( progress + Math.random() * 0.1, 1 );
                    instance.setProgress( progress );

                    if( progress === 1 ){
                        instance.stop();
                        clearInterval( interval );
                    }
                }, 200 );
            }
        });


        var l = $( '.ladda-button-demo' ).ladda();

        l.click(function(){
            // Start loading
            l.ladda( 'start' );

            // Timeout example
            // Do something in backend and then stop ladda
            setTimeout(function(){
                l.ladda('stop');
            },12000)


        });

    });

</script>


   	<script src="js/custom/page/custom.account.js"></script>
<script src="js/custom/google/goog_map.pullmap_dlract.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>