<?php require_once("db_loggedin.php"); ?>
<?php

$colname_view_thistickettoken = "-1";
if (isset($_GET['ticket_token'])) {
  $colname_view_thistickettoken = $_GET['ticket_token'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dlr_support_ticket =   "SELECT * FROM ticket_submit_dlr WHERE ticket_submit_dlr.did = $did AND ticket_token = %s", GetSQLValueString($colname_view_thistickettoken, "int"));
$dlr_support_ticket = mysqli_query($idsconnection_mysqli, $query_dlr_support_ticket);
$row_dlr_support_ticket = mysqli_fetch_assoc($dlr_support_ticket);
$totalRows_dlr_support_ticket = mysqli_num_rows($dlr_support_ticket);


if($row_dlr_support_ticket['did'] != $did){
	header("Location: ticket.history.php");
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Ticket For <?php echo $row_userDets['company']; ?></title>

 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Viewing Support Ticket</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Support Ticket View</a>
							      <input name="status_dudes" type="hidden" id="status_dudes" value="Pending" />
								  <input name="ticket_token" type="hidden" id="ticket_token" value="<?php echo $row_dlr_support_ticket['ticket_token']; ?>" />

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
                        
                        
                        <div class="row">
                        	<div class="col-sm-6">
                            
                        
                            <div class="form-horizontal">


                            
                                <div class="form-group"><label for="contact_name" class="col-sm-2 control-label">Your Name:</label>
                                    <div class="col-sm-10"><?php echo $row_dlr_support_ticket['contact_name']; ?> <br /><br /><br /><span class="help-block m-b-none">(Change If Necessary)</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label for="contact_phone" class="col-sm-2 control-label">Phone Number:</label>

                                    <div class="col-sm-10"><?php echo $row_dlr_support_ticket['contact_phone']; ?><br /><br /><br />
                                    <span class="help-block m-b-none">(Direct Number To Reach You)</span></div>
                                </div>
                                <div class="hr-line-dashed"></div>                                
                                
                                
                                
                                <div class="form-group">
                                <label for="contact_email" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                    <?php echo $row_dlr_support_ticket['contact_email']; ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                
                                
                                <div class="form-group">
                                	<label for="what_happened" class="col-sm-2 control-label">What Happened?</label>

                                    <div class="col-sm-10">
                                    	<?php echo $row_dlr_support_ticket['what_happened']; ?>
                                        
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                
                                <div class="form-group">
                                	<label class="col-lg-2 control-label">From What Happened, What Did You Expect To Happen?</label>

                                    <div class="col-lg-10">
                                    	<?php echo $row_dlr_support_ticket['what_you_want_to_happen']; ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                <div class="form-group">
                                	<label for="comments_bydlr" class="col-lg-2 control-label">Please Make Any Additional Comments Necessary:</label>

                                    <div class="col-lg-10">
                                        <?php echo $row_dlr_support_ticket['comments_bydlr']; ?>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Set Ticket Priority</label>

                                    <div class="col-sm-10">
                                    <?php echo $row_dlr_support_ticket['priority']; ?>
                                    </div>
                                    
                                 
                                </div>
                                <div class="hr-line-dashed"></div>














<div class="form-group"><label for="accept_terms" class="col-sm-2 control-label">Accept Terms And Conditions</label>

                                    <div class="col-sm-10"><label class="checkbox-inline"> <?php echo $row_dlr_support_ticket['accept_terms']; ?> |  I accpet terms and conditions </label></div>
                                </div>



                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        
                                    </div>
                                </div>
                            </div><!-- End Horizontal Form  -->
                            
                            
                            
                            </div>
                        	<div class="col-sm-6">
                        
                            <div class="form-horizontal">


                                
                                
                                
                                
                                
                                
                                
                                      
                                <div class="form-group"><label class="col-sm-2 control-label">Ticket Status:</label>

                                    <div class="col-sm-10">
                                    <?php echo $row_dlr_support_ticket['status_dudes']; ?>
                                    </div>
                                    
                                 
                                </div>
                                <div class="hr-line-dashed"></div>

                          
                                
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Dudes Response:</label>

                                    <div class="col-sm-10">
                                    <?php echo $row_dlr_support_ticket['dudesResponse']; ?>
                                    </div>
                                    
                                 
                                </div>
                                <div class="hr-line-dashed"></div>



                                
                                <div class="form-group"><label class="col-sm-2 control-label">Dudes Response Last Updated:</label>

                                    <div class="col-sm-10">
                                    <?php echo $row_dlr_support_ticket['dudes_last_modfied']; ?>
                                    </div>
                                    
                                 
                                </div>
                                <div class="hr-line-dashed"></div>













                            </div><!-- End Horizontal Form  -->
                            
                            
                            
                            
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