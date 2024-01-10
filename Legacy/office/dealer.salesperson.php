<?php require_once('db_admin.php'); ?>
<?php


$colname_sid_query = "-1";
if (isset($_GET['sid'])) {
  $colname_sid_query = $_GET['sid'];
} 
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sidmaindid = "SELECT * FROM sales_person, dealers WHERE sales_person.main_dealerid = dealers.id AND sales_person.salesperson_id = $colname_sid_query LIMIT 1";
$sidmaindid = mysqli_query($idsconnection_mysqli, $query_sidmaindid);
$row_sidmaindid = mysqli_fetch_array($sidmaindid);
$totalRows_sidmaindid = mysqli_num_rows($sidmaindid);

if($totalRows_sidmaindid == 0){ header("Location: dealer.salespeople.php"); }

$sid = $row_sidmaindid['salesperson_id'];
$did = $row_sidmaindid['id'];



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>

</head>

<body>
<?php include("analyticstracking.php"); ?>
    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Dealer Sales Person</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="dealer.salespeople.php">Sales People</a>
                    </li>
                    <li>
                        <a href="#">Sales Person</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    
                    
                    	
                    
                    
                    

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Latest Saved Activity <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    

                    </div>
                </div>
              </div>
            </div>



            
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        
        
        
        
        
        
        
        
        <div class="wrapper wrapper-content animated fadeInRight">
        	
            
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
                	<div class="<?php if($row_sidmaindid['salesperson_mobile_dnc'] == 1){ echo ' has-error '; }else if($row_sidmaindid['salesperson_email_verified'] == 0){ echo ' has-warning '; }else{ echo ' has-success '; }  ?> ">
                    
                    
                    <div class="text-center">
                    <?php if($row_sidmaindid['salesperson_mobile_dnc'] == 1){ echo ' <h2>DO NOT CONTACT</h2> '; }else if($row_sidmaindid['salesperson_email_verified'] == 0){ echo ' <h2>EMAIL NOT VERIFIED</h2> '; }else{ echo '<h2>Active User OK STATUS</h2>'; }  ?>
                    </div>
                    
                    </div>
                
                
                </div>
            </div>
           
            <div class="row">
                <div class="col-lg-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Action This Sales Person</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <div class="form-inline">
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                
                                </div>
                                <div class="checkbox m-l m-r-xs">
                                
                                <label class="i-checks"> 
                                	<input type="checkbox"><i class="fa fa-arrow-circle-o-left"></i> Confirmation 
                                </label>
                                
                                </div>
                                <button class="btn btn-white" type="button">Sign in</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Email Salesperson <small>send this salesperson an email</small></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form"><i class="fa fa-envelope-square fa-5x"></i> Send Email</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">Send An Email</h3>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                                    <p>Sign in today for more expirience.</p>

                                                        <div class="form-group"><label>Email</label> <input id="toemail" type="email" placeholder="To email" class="form-control" value="<?php echo $row_sidmaindid['salesperson_email']; ?>"></div>
                                                        <div class="form-group"><label>Reply To</label> <input id="frmemail" type="email" placeholder="Return email" class="form-control" value="<?php echo $dudes_email_internal; ?>"></div>
                                                        <div class="form-group"><label>Subject</label> <input id="subjectemail" type="text" placeholder="Email Subject" class="form-control" value=""></div>
                                                </div>
                                                <div class="col-sm-12">
                                                <h4>Email Body</h4>
                                                        <div class="text-center">
                                                            
                                                            <textarea id="dealer_salesperson_emailbody" class="note-dropzone-message"></textarea>
                                                            
                                                            
                                                        </div>
                                                </div>                                                
                                                <div class="col-sm-12"><h4>Send Email</h4>
                                                    <p>Send email now:</p>
                                                    <p class="text-center">
                                                        <button id="send_email_to_salesperson" class="btn btn-primary"><i class="fa fa-envelope-square big-icon"></i></button>
                                                    </p>
                                            	</div>
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
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dealer Sales Person <small>Account Information And Dealer Profile</small></h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Dealer Sales Person</h3>
                                <p>Account Information Below.</p>
                                <form role="form">
                                    <div class="form-group"><label>First Name</label> <input id="salesperson_firstname" placeholder="First Name" class="form-control" value="<?php echo $row_sidmaindid['salesperson_firstname']; ?>"></div>
                                    <div class="form-group"><label>Last Name</label> <input id="salesperson_lastname" type="text" placeholder="Last Name" class="form-control" value="<?php echo $row_sidmaindid['salesperson_lastname']; ?>"></div>
                                    <div class="form-group"><label>Nick Name</label> <input id="salesperson_nickname" type="text" placeholder="Nick Name" class="form-control" value="<?php echo $row_sidmaindid['salesperson_nickname']; ?>"></div>

                                    <div class="form-group"><label>User Name</label> <input id="salesperson_username" type="text" placeholder="User Name" class="form-control" value="<?php echo $row_sidmaindid['salesperson_username']; ?>"></div>
                                    <div class="form-group"><label>Mobile Number</label> <input type="text" placeholder="Mobile Number" class="form-control" value="<?php echo $row_sidmaindid['salesperson_mobilephone_number']; ?>"></div>

                      <div>
                                        <button id="save_dealer_salespersonprofile" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="button"><i class="fa fa-floppy-o"></i> <strong>Save</strong></button>
                                        <label> <input <?php if (!(strcmp($row_sidmaindid['salesperson_mobile_optin'],1))) {echo "checked=\"checked\"";} ?> name="salesperson_mobile_optin" type="checkbox" class="i-checks" id="salesperson_mobile_optin" value="1" disabled="disabled"> Mobile Optin? <?php echo $row_sidmaindid['salesperson_mobile_optindate']; ?><br /><?php echo $row_sidmaindid['salesperson_mobile_carrier'] ?></label>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6"><h4>Dealer Profile</h4>
                                <p class="text-center">
                                    
                                    
                                    <ul class="m-b-none">
                                    	<li><strong>Dealer:</strong> <?php echo $row_sidmaindid['company']; ?></li>
                                    	<li><strong>Legal Name:</strong> <?php echo $row_sidmaindid['company_legalname']; ?></li>
                                    	<li><strong>Time Zone:</strong> <?php echo $row_sidmaindid['dealerTimezone']; ?></li>
                                    	<li><strong>Phone:</strong> <?php echo $row_sidmaindid['phone']; ?></li>
                                    	<li><strong>Fax:</strong> <?php echo $row_sidmaindid['fax']; ?></li>
                                    	<li><strong>Address:</strong> <?php echo $row_sidmaindid['address']; ?> <br />
                                    	<?php echo $row_sidmaindid['city']; ?> <?php echo $row_sidmaindid['state']; ?> <?php echo $row_sidmaindid['zip']; ?>
                                        </li>
                                    	<li><strong>Website:</strong> <a id="website" target="_blank" href="http://<?php echo $row_sidmaindid['website']; ?>"><?php echo $row_sidmaindid['website']; ?></a> </li>
                                    	<li>Country: <?php echo $row_sidmaindid['country']; ?></li>
                                        <li>Email: <?php echo $row_sidmaindid['email']; ?></li>

                                    </ul>
                                    
                                    
                                </p>

                                <p class="text-center">
                                    
                                    
                                    <a href="#"><i class="fa fa-sign-in big-icon"></i></a>
                                    
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Login Information</h5>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal">
                                <p>Sign in using these creditionals for an instant access for a more direct user experience.</p>
                                <div class="form-group"><label class="col-lg-2 control-label">Email</label>

                                    <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control" value="<?php echo $row_sidmaindid['salesperson_email']; ?>"> <span class="help-block m-b-none">Example block-level help text here.</span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Password</label>

                                    <div class="col-lg-10"><input type="text" placeholder="Password" class="form-control" value="<?php echo $row_sidmaindid['salesperson_password']; ?>"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <div class="checkbox i-checks"><label> <input name="salesperson_email_verified" type="checkbox" class="btn btn-sm btn-primary pull-right m-t-n-xs" id="salesperson_email_verified" value="1" <?php if (!(strcmp($row_sidmaindid['salesperson_email_verified'],1))) {echo "checked=\"checked\"";} ?>><i></i> Email Verified? </label></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button id="sign_inas_dealersalesperson" class="btn btn-sm btn-primary m-t-n-xs" type="button"><i class="fa fa-user-circle-o"></i> Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
           
            
            
    
                        <div class="row animated fadeInDown">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Needs Resolution</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <div id='external-events'>
                                <p>Unresolved Appointments</p>
                                <div class='external-event navy-bg'>Customer 1</div>
                                <div class='external-event navy-bg'>Customer 2</div>
                                <div class='external-event navy-bg'>Customer 3</div>
                                <div class='external-event navy-bg'>Customer 4</div>
                                <div class='external-event navy-bg'>Customer 5</div>
                                <p class="m-t">
                                    <!--input type='checkbox' id='drop-remove' class="i-checks" checked /> <label for='drop-remove'>remove after drop</label-->
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="ibox float-e-margins">
                        

                    </div>


                </div>


                <div class="col-lg-9">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Appointment Calendar </h5>
                        </div>
                        <div class="ibox-content">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                
                
                
                
                

<div id="modal-appointmentview" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">View Sales Person Appointment</h3>
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                                    <p>View Edit This Appointment.</p>
                                                    

                                                        
  
                                                </div>
                                                <div class="col-sm-12">
                                                <h4>Appointment</h4>
                                                        <div id="modal_salesperson_appointment_bodyview" class="text-center">
                                                            
                                                            
                                                            
                                                            
                                                        </div>
                                                </div>                                                
                                                <div class="col-sm-12"><h4>BDC Edit This Appointment</h4>
                                                    <p>Edit Appointment Now:</p>
                                                    <p class="text-center">
                                                        <button id="send_email_to_salesperson" class="btn btn-primary"><i class="fa fa-envelope-square big-icon"></i></button>
                                                    </p>
                                            	</div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>                
                
                
            </div>

            

        
            
            
        </div>

        
        
        
        
        <?php include("_footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

<script type="text/javascript" src="js/custom/page/custom.dealer.salesperson.js"></script>

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	


	
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
    <script src="js/plugins/fullcalendar/fullcalendar.min.js"></script>

    <script>

        $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            /* initialize the external events
             -----------------------------------------------------------------*/

            $('#external-events div.external-event').each(function() {

                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                };

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject);

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });


            /* initialize the calendar
             -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({

					eventClick: function(event) {
						if (event.url) {
							
							

							 $('div#modal-appointmentview').modal('show');
							
								var win = event.url;
							
							 $.post(win, {win:win}, function(data){
							
									$('div#modal_salesperson_appointment_bodyview').html(data);
							  });
							
							 
							
							  //window.open(event.url);
						  return false;
						}
				},				
				dayClick: function() {
					

					
					
					alert('a day has been clicked! ');
					
                },
                header: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: false,
                droppable: false, // this allows things to be dropped onto the calendar !!!

				eventSources: 
				[
					
					<?php include("inc.json_dealer.salesperson_fullcalendar.php"); ?>
					
					{events:[
						{
							id: 993,
							title: 'End Of The Year',
							start: new Date(2016, 11, 31, 00, 01),
							end: new Date(2016, 11, 31, 23, 59),
							allDay: true,
							color: '#17F06C',
							className: 'idsRobot',
							url: ''
						}

							]
					}
					

				]
            });


        });

    </script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>