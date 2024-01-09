<?php require_once("db_loggedin.php"); ?>
<?php

$colname_view_thislead = "-1";
if (isset($_GET['leadid'])) {
  $colname_view_thislead = $_GET['leadid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_view_thislead = "SELECT * FROM `idsids_idsdms`.`cust_leads` WHERE cust_leadid = ' $colname_view_thislead'";
$view_thislead = mysqli_query($idsconnection_mysqli, $query_view_thislead);
$row_view_thislead = mysqli_fetch_assoc($view_thislead);
$totalRows_view_thislead = mysqli_num_rows($view_thislead);

$lead_cust_leadid = $row_view_thislead['cust_leadid'];
$cust_dealer_id =  $row_view_thislead['cust_dealer_id'];


if($cust_dealer_id != $did){
  header('Location: leads.php');
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_cust_leadnotes = "SELECT * FROM `cust_lead_notes` WHERE `lead_cust_leadid` = '$lead_cust_leadid' ORDER BY lead_note_created DESC";
$query_cust_leadnotes = mysqli_query($idsconnection_mysqli, $query_query_cust_leadnotes);
$row_query_cust_leadnotes = mysqli_fetch_assoc($query_cust_leadnotes);
$totalRows_query_cust_leadnotes = mysqli_num_rows($query_cust_leadnotes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_etemplates = "SELECT * FROM email_dealer_templates WHERE email_dealer_templates_did = '$did' ORDER BY email_dealer_templates_subject ASC";
$dealer_etemplates = mysqli_query($idsconnection_mysqli, $query_dealer_etemplates);
$row_dealer_etemplates = mysqli_fetch_assoc($dealer_etemplates);
$totalRows_dealer_etemplates = mysqli_num_rows($dealer_etemplates);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_template_types = "SELECT * FROM email_dealer_templates WHERE email_dealer_templates_did = '$did' ORDER BY email_dealer_templates_subject ASC";
$dealer_template_types = mysqli_query($idsconnection_mysqli, $query_dealer_template_types);
$row_dealer_template_types = mysqli_fetch_assoc($dealer_template_types);
$totalRows_dealer_template_types = mysqli_num_rows($dealer_template_types);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Lead View <?php echo $row_userDets['company']; ?></title>

 <?php include("inc.head.php"); ?>
<style type="text/css">


.btn-large-dim{
  width: auto !important;
  height: auto !important;
  font-size: 42px;
}


</style>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Viewing Lead</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="leads.php">Leads</a>
                        </li>
                        <li>
                            <a>Viewing Lead</a>
                            <input type="hidden" id="cust_leadid" value="<?php echo $lead_cust_leadid; ?>">
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
                        <h5>Lead</h5>
                    </div>
                    <div class="ibox-content">
                        <p>
                            Choose And Click Your Options Below.
                        </p>
                        <h3 class="font-bold">Options</h3>

                <a class="btn btn-info  dim btn-large-dim btn-outline" target="_parent" href="lead.edit.php?leadid=<?php echo $row_view_thislead['cust_leadid']; ?>"><i class="fa fa-pencil-square-o fa-3x"></i></a>




                



<?php if($row_view_thislead['cust_email']){  ?>
                
                <a class="btn btn-primary dim btn-large-dim" data-backdrop="static" data-toggle="modal" data-target="#emailLeadModal"><i class="fa fa-envelope-o fa-3x"></i><br></a>                        
<?php }else{ ?>

                <a class="btn btn-danger dim btn-large-dim" type="button"><i class="fa fa-envelope-o fa-3x"></i><br></a>                        
				


<?php } ?>


				<a class="btn btn-success dim btn-large-dim btn-outline" data-backdrop="static" data-toggle="modal" data-target="#newappointmentModal"><i class="fa fa-book fa-3x"></i></a>


                <!--a class="btn btn-danger  dim btn-large-dim" type="button"><i class="fa fa fa-frown-o fa-3x"></i></a>
                <a class="btn btn-primary  dim btn-large-dim" type="button"><i class="fa fa-smile-o fa-3x"></i></a -->
                
                <a  href="print.lead.pdf.php?leadid=<?php echo $row_view_thislead['cust_leadid']; ?>" class="btn btn-warning dim btn-large-dim" target="_blank"><i class="fa fa-print fa-3x"></i></a>


                    </div>
                </div>
            </div>
	</div>
















<div class="modal inmodal" id="emailLeadModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated fadeIn">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-clock-o modal-icon"></i>
                                            <h4 class="modal-title">Email This Lead</h4>
                                            <small>Select A Template And Email It To This Lead</small>
                                        </div>
                                        <div class="modal-body">




<div class="form-horizontal">
                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">To:</label>
                                            	<div class="col-sm-10">
                                               	  <input id="email_to" type="text" class="form-control" value="<?php echo $row_view_thislead['cust_email']; ?>">
                                                </div>
                                           </div>
                                           
                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">From:</label>
                                            	<div class="col-sm-10">
                                               	  <input id="email_from" type="text" class="form-control" value="<?php echo $row_userDets['email']; ?>" disabled="disabled">
                                                </div>
											</div>

                                            <div class="form-group">
                                            	<label class="col-sm-2 control-label">Templates:</label>
                                            	<div class="col-sm-10">
                                               	  <select id="email_template" name="email_template" class="form-control">
                                               	    <option value="">Select</option>
                                               	    <?php
do {  
?>
                                               	    <option value="<?php echo $row_dealer_etemplates['id']?>"><?php echo $row_dealer_etemplates['email_dealer_templates_subject']?></option>
                                               	    <?php
} while ($row_dealer_etemplates = mysqli_fetch_assoc($dealer_etemplates));
  $rows = mysqli_num_rows($dealer_etemplates);
  if($rows > 0) {
      mysqli_data_seek($dealer_etemplates, 0);
	  $row_dealer_etemplates = mysqli_fetch_assoc($dealer_etemplates);
  }
?>
                                                  </select>
                                                </div>
                                           </div>




                    <div class="mail-text">

                        <div id="lead_email_body" class="summernote">
                            <br/>
                            <br/>

                        </div>
<div class="clearfix"></div>
                        </div>
                    <div class="clearfix"></div>











                                            
                                            
                                        </div>


                                        
                                        
                                                
                                                
                                                
                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            <button id="sendthis_leademail" type="button" class="btn btn-primary">Send Email</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
















<div id="lead_contact_section" class="row">

            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Contact Information</h5>
                    </div>
                    <div class="ibox-content">
                        <address>
                           <strong> Name: </strong><span id="grb_lead_name"><?php echo $row_view_thislead['cust_titlename']; ?> <?php echo $row_view_thislead['cust_fname']; ?> <?php echo $row_view_thislead['cust_mname']; ?> <?php echo $row_view_thislead['cust_lname']; ?> <?php echo $row_view_thislead['cust_name_suffix']; ?></span> <br />
                            <strong>Nick Name: </strong><?php echo $row_view_thislead['cust_nickname']; ?> <br />
                            <strong>Sex:  </strong><?php echo $row_view_thislead['cust_lead_sex']; ?> <br />

                        </address>


                        <address>
                            <strong><u><em>Phone Numbers</em></u></strong><br><br>
                           <strong>Home Phone: </strong> <?php echo $row_view_thislead['cust_phoneno']; ?><br /><br />
                            <strong>Mobile Phone:</strong> <a href="tel: <?php echo $row_view_thislead['cust_mobilephone']; ?>"> <?php echo $row_view_thislead['cust_phoneno']; ?></a><br><br>
                            <strong>Work Phone:</strong> <a href="tel: <?php echo $row_view_thislead['cust_workphone']; ?>"> <?php echo $row_view_thislead['cust_workphone']; ?></a>
                        </address>


						<address>
                        	<strong>Email:</strong> <?php echo $row_view_thislead['cust_email']; ?>
                        </address>





                    </div>
                </div>
            
            
            </div>
            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Name & Address:</h5>
                    </div>
                    <div class="ibox-content">
                        <address>
                            <strong>Address 1: </strong> <?php echo $row_view_thislead['cust_home_address']; ?><br /><br />
                            <strong>Address 2: <?php echo $row_view_thislead['cust_home_address2']; ?></strong> <br /><br />
                            <strong>City, State Zip: </strong> <?php echo $row_view_thislead['cust_home_city']; ?>, <?php echo $row_view_thislead['cust_home_state']; ?> <?php echo $row_view_thislead['cust_home_zip']; ?> <?php echo $row_view_thislead['cust_home_county']; ?><br>
                        </address>


                        <address>
                            <strong>Move In Date: </strong> <?php echo $row_view_thislead['cust_home_live_movindate']; ?><br><br>


                            <strong>Live Years: </strong>
                            <a><?php echo $row_view_thislead['cust_home_live_years']; ?></a><br><br>

                            <strong>Live Months: </strong>
                            <a><?php echo $row_view_thislead['cust_home_live_months']; ?></a><br>
<br>

                        </address>


 
                    </div>

                </div>
            
            
            </div>
            <div class="col-lg-4">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lead Measurements</h5>
                    </div>
                    <div class="ibox-content no-padding">
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                        <ul class="list-group">
                            <li class="list-group-item">
                               <strong>Sales Person 1:</strong> <?php echo $row_view_thislead['sales_person_nametxt']; ?>
                            </li>
                            <li class="list-group-item">
                               <strong>Sales Person 2:</strong> <?php echo $row_view_thislead['sales_person2_nametxt']; ?>
                            </li>

                            <li class="list-group-item">
                               <strong>Finance Type:</strong> <?php echo $row_view_thislead['cust_finance_type']; ?>
                            </li>
                            <li class="list-group-item">
                               <strong>Lost Code:</strong> <?php echo $row_view_thislead['cust_lostcode']; ?>
                            </li>
                            <li class="list-group-item">
                               <strong>Map Pulled:</strong> <?php echo $row_view_thislead['cust_home_okgoogle']; ?>
                            </li>
                            <li class="list-group-item ">
                                <span class="badge badge-info"><?php echo $row_view_thislead['cust_status']; ?></span>
                               <strong>Status:</strong> <?php echo $row_view_thislead['cust_status']; ?> 
                            </li>
                            <li class="list-group-item">
                                <!-- span class="badge badge-danger">10</span -->
                              <strong>Closing Range:</strong> <?php echo $row_view_thislead['cust_close_range']; ?> 
                            </li>
                            <li class="list-group-item">
                                <!-- span class="badge badge-success">10</span -->
                               <strong>Temperature:</strong> <?php echo $row_view_thislead['cust_lead_temperature']; ?>
                            </li>
                            <li class="list-group-item">
                                <!--span class="badge badge-warning">7</span -->
                               <strong>Perferred:</strong> <?php echo $row_view_thislead['cust_perf_commun']; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            
            
            </div>

</div>





<div id="current_work_section" class="row">

            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Employer</h5>
                    </div>
<div class="ibox-content">
                        <address>
                            <strong>Employer Name: </strong> <?php echo $row_view_thislead['cust_employer_name']; ?><br>
                            <strong>Address 1: <?php echo $row_view_thislead['cust_employer_addr1']; ?></strong> <br>
                            <strong>Address 2: <?php echo $row_view_thislead['cust_employer_addr2']; ?></strong> <br>
                            <strong>City, State Zip: </strong><?php echo $row_view_thislead['cust_employer_city']; ?>, <?php echo $row_view_thislead['cust_employer_state']; ?> <?php echo $row_view_thislead['cust_employer_zip']; ?><br />
                        </address>


                        <address>
                            <strong>Employer Phone: </strong> 
                            <a href="tel: <?php echo $row_view_thislead['cust_employer_phone']; ?>"> <?php echo $row_view_thislead['cust_employer_phone']; ?></a><br>

                            <strong>Supervisor Phone: </strong> 
                            <a href="tel: <?php echo $row_view_thislead['cust_supervisors_phone']; ?>"> <?php echo $row_view_thislead['cust_supervisors_phone']; ?> Ext: <?php if($row_view_thislead['cust_supervisors_ext']){ echo 'Ext: '.$row_view_thislead['cust_supervisors_ext']; } ?></a><br>
                            
                        </address>




                        <address>
						<strong>Hire Date: </strong> <?php echo $row_view_thislead['cust_employer_dateohire']; ?><br />

                            <strong>Work Years: </strong> <?php echo $row_view_thislead['cust_employer_years']; ?><br />
                           
                            <strong>Work Months: </strong> <?php echo $row_view_thislead['cust_employer_months']; ?><br />
                            
                        </address>

                    <address>
                            <strong>Gross Income: </strong>  <?php echo $row_view_thislead['cust_gross_income']; ?> <br />
							<strong>Frequency: </strong><?php echo $row_view_thislead['cust_gross_income_frequency']; ?><br>
                      </address>


                    <address>
                            <strong>Other Income: </strong>  <?php echo $row_view_thislead['cust_gross_income']; ?> <br />
                            <strong>Other I. Amount: </strong>  <?php echo $row_view_thislead['cust_other_income_amount']; ?> <br />

							<strong>Frequency: </strong><?php echo $row_view_thislead['cust_gross_other_income_frequency']; ?><br>
                      </address>


 
                    </div>
                   
                   </div>
            
            
            </div>
            <div class="col-lg-6">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Vehicle Trade:</h5>
                    </div>
                  <div class="ibox-content">
                        <address>
                            <strong>Has Trade? </strong> <?php echo $row_view_thislead['tradeYes']; ?><br /><br />
                            <strong>Trade VIN: <?php echo $row_view_thislead['tradeVin']; ?></strong> <br /><br />
                            <strong>Year, Make, &amp; Model: </strong><?php echo $row_view_thislead['tradeYear']; ?>, <?php echo $row_view_thislead['tradeMake']; ?> <?php echo $row_view_thislead['tradeModel']; ?><br /><br />
                            <strong>Miles: <?php echo $row_view_thislead['tradeMiles']; ?></strong> <br /><br />

                            <strong>Trade Payment: <?php echo $row_view_thislead['tradePayment']; ?></strong> <br /><br />

                            <strong>Pay Off Amount: <?php echo $row_view_thislead['tradePayoff']; ?></strong> <br /><br />


                        </address>









 
                    </div>

                </div>
            
            
            </div>

</div>













            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lead Information<small>Hard Display Of Lead</small></h5>
                    </div>
                    <div class="ibox-content">


						<h3>Idle Here Until Tomorrow</h3>



                    </div>
                </div>
            </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Write A Note </h5>
                    </div>
                    <div class="ibox-content">

                        
                        <div class="row">
                        	<div class="col-lg-12">
                            
                            <div class="form-group">
                            
                        <label class="col-sm-2">
                        Notes:
                        </label>
                        
                        <div class="col-sm-10">
                        	<textarea class="form-control left-float" id="lead_notes" rows="4" cols="50"></textarea>                            	
                            <button id="save_cust_notes" class="btn btn-w-m btn-success" type="button">Save Notes</button>

                        </div>
                        
                        
                        <div class="row">
                        	<div class="col-lg-12">
                            
                            
                            

<p>Note History</p>
<p>  </p>
  
<div id="master_cust_notes_layout" class="table-responsive">


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
                        	<span><i class="fa fa-check text-navy"></i></span>
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
                        

                    </div>
                </div>
            </div>
            </div>


            <div class="row" style="display:none;">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    <h2>Blank Form <small>Use this Form When you want to start fresh.</small></h2>

                    </div>
                </div>
            </div>
            </div>





            
            
            
        
        
        </div>
        <?php include("footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php //include("inc.end.body.php"); ?>


    <!-- Mainly scripts -->
	<script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

   <!-- Switchery -->
   <script src="js/plugins/switchery/switchery.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/idscrm.js"></script>

    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });


           

        });
        var edit = function() {
            $('.click2edit').summernote({focus: true});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };

    </script>
    <script type="text/javascript" src="js/plugins/timeago/jquery.timeago.js"></script>

<script>

jQuery(document).ready(function() {
  jQuery("abbr.timeago").timeago();
});

</script>

			<script src="js/moment-with-locales.js"></script>
			<script src="js/plugins/bootstrap-datetime/bootstrap-datetimepicker.js"></script>

           <!-- Data picker
           <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script> -->



   	<script src="js/custom/page/custom.globalappt.js"></script>



<script src="js/custom/page/custom.lead.view.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($view_thislead);

?>