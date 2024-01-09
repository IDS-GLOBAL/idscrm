<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM `idsids_idsdms`.`deals_bydealer` WHERE `deals_bydealer`.`deal_dealerID` = '$did' ORDER BY `deal_number` DESC, `deal_created_at` DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Create New Ticket For <?php echo $row_userDets['company']; ?></title>

 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Tell Us, What Happend?</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Creating Ticket</a>
							      <input name="status_dudes" type="hidden" id="status_dudes" value="Pending" />
								  <input name="ticket_token" type="hidden" id="ticket_token" value="<?php echo $tkey; ?>" />

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
                        <div class="ibox-content">
                            <div class="form-horizontal">


                            
                                <div class="form-group"><label for="contact_name" class="col-sm-2 control-label">Your Name:</label>
                                    <div class="col-sm-10"><input id="contact_name" type="text" class="form-control" value="<?php echo $row_userDets['contact']; ?>" maxlength="255"> <span class="help-block m-b-none">(Change If Necessary)</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="contact_phone" class="col-sm-2 control-label">Phone Number:</label>

                                    <div class="col-sm-10"><input id="contact_phone" type="text" class="form-control" value="<?php echo $row_userDets['contact_phone']; ?>"><span class="help-block m-b-none">(Direct Number To Reach You)</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>                                
                                
                                
                                
                                <div class="form-group">
                                <label for="contact_email" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="contact_email" value="<?php echo $row_userDets['email']; ?>">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                
                                
                                <div class="form-group">
                                	<label for="what_happened" class="col-sm-2 control-label">What Happened?</label>

                                    <div class="col-sm-10">
                                    	<textarea id="what_happened" cols="50" rows="5" placeholder="What Happened?" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                
                                <div class="form-group">
                                	<label class="col-lg-2 control-label">From What Happened, What Did You Expect To Happen?</label>

                                    <div class="col-lg-10">
                                    	<textarea id="what_you_want_to_happen"  cols="50" rows="5" placeholder="From What Happened, What Did You Expect To Happen?" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                <div class="form-group">
                                	<label for="comments_bydlr" class="col-lg-2 control-label">Please Make Any Additional Comments Necessary:</label>

                                    <div class="col-lg-10">
                                    	<textarea id="comments_bydlr" cols="50" rows="5" placeholder="Additional Comments" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Set Ticket Priority</label>

                                    <div class="col-sm-10"><select class="form-control m-b" id="priority">
										<option value="Low">
											Low
										</option>
										<option value="Medium">
											Medium
										</option>
										<option value="High">
											High
										</option>
									</select>
                                    </div>
                                    
                                 
                                </div>
                                <div class="hr-line-dashed"></div>














<div class="form-group"><label for="accept_terms" class="col-sm-2 control-label">Accept Terms And Conditions</label>

                                    <div class="col-sm-10"><label class="checkbox-inline"> <input id="accept_terms" type="checkbox" value="1"> I accpet terms and conditions <a>Terms &amp; Condition</a></label></div>
                                </div>



                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        
                                        <button id="create_ticket" class="btn btn-primary" type="button">Submit</button>
                                    </div>
                                </div>
                            </div><!-- End Horizontal Form  -->
                            
                            
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

<script type="text/javascript" language="javascript" src="js/custom/page/custom.ticket.create.js"></script>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>