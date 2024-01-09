<?php require_once('db_admin.php'); ?>
<?php



$colname_query_dlrprospect = "-1";
if (isset($_GET['dlrid'])) {
  $colname_query_dlrprospect = $_GET['dlrid'];
}
mysql_select_db($idsconnection);
$query_query_dlrprospect =  "SELECT * FROM `dealers` WHERE `id` = %s", GetSQLValueString($colname_query_dlrprospect, "int"));
$query_dlrprospect = mysqli_query($idsconnection_mysqli, $query_query_dlrprospect);
$row_query_dlrprospect = mysqli_fetch_array($query_dlrprospect);
$totalRows_query_dlrprospect = mysqli_num_rows($query_dlrprospect);
$did = $row_query_dlrprospect['id'];



mysql_select_db($database_tracking, $tracking);
$query_qrydlr_prospc_notes = "SELECT * FROM dudes_dlr_prospc_notes WHERE dudes_dlr_notes_did = '$did' ORDER BY dudes_dlr_notes_created_at DESC";
$qrydlr_prospc_notes = mysqli_query($idsconnection_mysqli, $query_qrydlr_prospc_notes, $tracking);
$row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes);
$totalRows_qrydlr_prospc_notes = mysqli_num_rows($qrydlr_prospc_notes);







mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_activsystem_templates = "SELECT * FROM dudes_sys_htmlemail_templates WHERE email_systm_templates_status = '1' ORDER BY email_systm_templates_subject ASC";
$find_activsystem_templates = mysqli_query($idsconnection_mysqli, $query_find_activsystem_templates);
$row_find_activsystem_templates = mysqli_fetch_array($find_activsystem_templates);
$totalRows_find_activsystem_templates = mysqli_num_rows($find_activsystem_templates);





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

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>








        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Dealer Parking Lot</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="myaccountbtn">
                    	<a role="button"><?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?></a>
                        <input id="dudesid" type="hidden" value="<?php echo $dudesid; ?>">
                    </li>
                    <li>
                        <a href="#">My Parking Lot</a>
                    </li>
                    <li>
                        <a href="#">Dealer View</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        <div class="wrapper wrapper-content animated fadeInRight"><!-- Start wrapper wrapper-content animated fadeInRight -->






            <div id="dealer_box" class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Your Dealer Parking Lot <small> dealer_pending_id:  , did: </small></h5>
                    </div>


<input id="prospctdlrid" value="" type="hidden">
                        <div id="email_dlrprospectsent_results">
                        
                        </div>



<div class="ibox-content">


<div class="row" align="center">
                                <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-money fa-3x"></i></button>
                                <button data-backdrop="static" data-toggle="modal" data-target="#emailProspectDlrModal" class="btn btn-outline btn-warning dim" type="button"><i class="fa fa-envelope-o fa-3x"></i></button>
                                
                                
<!--
                                <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-check"></i></button>
                                <button class="btn btn-outline btn-success  dim" type="button"><i class="fa fa-upload"></i></button>
                                <button class="btn btn-outline btn-info  dim" type="button"><i class="fa fa-paste"></i> </button>
                                <button class="btn btn-outline btn-warning  dim" type="button"><i class="fa fa-warning"></i></button>
                                <button class="btn btn-outline btn-danger  dim " type="button"><i class="fa fa-heart"></i></button>

-->


</div>













                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> Dealer Info</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Notes</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">



<div class="form-horizontal">
                            
                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Name:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value=""></div>
                                </div>

                                <div class="hr-line-dashed"></div>




                            
                                <div class="form-group"><label class="col-sm-2 control-label">#1 Decision Makers Phone Number:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="" data-mask="(999) 999-999"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">Phone Type:</label>

                                    <div class="col-sm-10">



<select name="contact_phone_type" id="contact_phone_type" class="form-control">
    <option value="" <?php if (!(strcmp("", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Select Phone Type</option>
    <option value="Mobile" <?php if (!(strcmp("Mobile", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Mobile</option>
    <option value="Work" <?php if (!(strcmp("Work", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Work</option>
    <option value="Other" <?php if (!(strcmp("Other", $row_query_dlrprospect['contact_phone_type']))) {echo "selected=\"selected\"";} ?>>Other</option>
  </select>






                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">Decision Maker Contact 2:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dmcontact2']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">Decision Maker #2 Phone:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dmcontact2_phone']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>








                            
                                <div class="form-group"><label class="col-sm-2 control-label">Decision Maker #2 Phone Type:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dmcontact2_phone_type']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>











                            
                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Website URL <small>i.e yahoo.com</small>:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['website']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>




                            
                                <div class="form-group"><label class="col-sm-2 control-label">Finance Managers Name:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['finance']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">Finance Contact Phone Number:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['finance_contact']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>



                            
                                <div class="form-group"><label class="col-sm-2 control-label">Finance Contact Email Number:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['finance_contact_email']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>





                            
                                <div class="form-group"><label class="col-sm-2 control-label">A Sales Person Name:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['sales']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">A Sales Person Contact:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['sales_contact']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>


                            
                                <div class="form-group"><label class="col-sm-2 control-label">A Sales Person Email:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['sales_email']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>






                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Phone Number:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['phone']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Fax:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['fax']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>




                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Address</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['company']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company City</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['city']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>





                                <div class="form-group"><label class="col-sm-2 control-label">Company State:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['state']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>






                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Zip Code:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['zip']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            




                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Home HTML</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['home']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Home HTML</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['home']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>





                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company About Us HTML</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['about']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>



                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Directions HTML</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['directions']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>










                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Contact Us HTML</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['contactus']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>







                            
                                <div class="form-group"><label class="col-sm-2 control-label">Company Map URL only</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['mapurl']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>








                            
                                <div class="form-group"><label class="col-sm-2 control-label">Google Maps I-Frame</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['mapframe']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>




                            
                                <div class="form-group"><label class="col-sm-2 control-label">Dealer Slogan</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['slogan']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Dealer Disclaimer</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['disclaimer']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Very Good Credit<br /> (720 - 850)</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_vgoodcredit']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Good Credit<br /> (675 - 719)</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_jgoodcredit']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Fair Credit  <br />(621 - 674)</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_faircredit']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Poor Credit <br />(575 - 620)</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_poorcredit']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Slow Credit <br />(575 - 620)</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_subprime']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix New Car Credit Unkown  No Credit <br />(0 - ?) I am not sure</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['newmatrixcredit_unknown']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used Very Good Credit:<br />(720-850)</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_vgoodcredit']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used Good Credit:<br /> (675  - 719)</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_jgoodcredit']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used Fair Credit:<br /> (621  - 674)</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_faircredit']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used Slow Credit:<br /> (575  - 620)</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_subprime']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Deal Matrix Used No Credit:<br /> (0 - ?) I am not sure</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['usedmatrixcredit_unknown']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Google Maps I-Frame</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingDefaultAPR']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Google Maps I-Frame</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingDefaultTerm']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Google Maps I-Frame</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingSateSlsTax']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Doc &amp; Delivery Fee</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingDocDlvryFee']; ?>" data-mask="999.99"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                            
                                <div class="form-group"><label class="col-sm-2 control-label">Title Fee</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingTitleFee']; ?>" data-mask="999.99"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">State Inspection Fee</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['settingStateInspectnFee']; ?>" data-mask="999.99"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Dealer Type ID</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['wfh_dealer_type_id']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Want Live Chat Feature?</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dealer_chat']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Fuel Pump Display Design</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['fuel_pump_display']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">YouTube Or Video Hosting</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dcommercial_youtube_onoff']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Craigslist Nickname Or Bird Dog Name Source:</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['craigslist_nickname']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>




                                <div class="form-group"><label class="col-sm-2 control-label">Meta Description</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['metaDescription']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label">Meta Key Words</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['metaKeywords']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Show Pricing on Website</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['showPricing']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Show Mileage on Website</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['showMileage']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>

                            
                                <div class="form-group"><label class="col-sm-2 control-label">Google Maps I-Frame</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['mapframe']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>




                            
                                <div class="form-group"><label class="col-sm-2 control-label">Show Price On Website?</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" value="<?php echo $row_query_dlrprospect['dealer_listingindex_displayprice']; ?>"></div>
                                </div>

                                <div class="hr-line-dashed"></div>








                                
                                
                                
                                
                                <div class="form-group"><label class="col-sm-2 control-label">Dealers Email & Password</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-btn">
                                            <button type="button" class="btn btn-primary">Go!</button> </span> <input type="text" class="form-control" placeholder="Dealer Email" value="<?php echo $row_query_dlrprospect['email']; ?>">
                                        </div>
                                        <div class="input-group"><input type="text" class="form-control" placeholder="Enter Password" value="<?php echo $row_query_dlrprospect['password']; ?>"> <span class="input-group-btn" > <button type="button" class="btn btn-primary">Go!
                                        </button> </span></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="button">Cancel</button>
                                        <button type="button" id="bringup_finalactions" class="btn btn-success">Final Actions</button>
                                    </div>
                                </div>
                            </div>





                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                  



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enter Your Notes Below Here <small>Log note to complete</small></h5>
                    </div>
                    <div class="ibox-content">

                        <textarea id="prspct_dlr_lognote_body" cols="5" rows="5" class="form-control"></textarea>

                    </div>
                </div>
              </div>
            </div>






            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                                   <div class="row">
									<div class="col-md-12">
                                    	<button id="logg_dealerprospect_note"  class="btn btn-block btn-success" type="button">Log Note</button>
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
                        <h5>History Notes And Activity</h5>
                    </div>
                    <div class="ibox-content">

                                   

                       <div class="row">
                        <h3>Completed</h3>
                            <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>

                        <div id="log_notes_results" class="col-md-12">


                            <ul class="sortable-list connectList agile-list" id="completed">
        
        <?php do { ?>                            
                                <li class="info-element" id="task<?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_id']; ?>">
                                    <?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_body']; ?>
                                    <div class="agile-detail">
                                        <a href="#" class="pull-right btn btn-xs btn-white"><?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_dude_name']; ?></a>
                                        <i class="fa fa-clock-o"></i> <?php echo $row_qrydlr_prospc_notes['dudes_dlr_notes_created_at']; ?>
                                    </div>
                                </li>
        <?php } while ($row_qrydlr_prospc_notes = mysqli_fetch_array($qrydlr_prospc_notes)); ?>
        					</ul>
        
                            










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
                </div>

                            















                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Prospect Last Active <small>Sort, search</small></h5>
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
                        <h5>Prospect Misc Infor <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                    	<h1>None at This Time</h1>

                    </div>
                </div>
              </div>
            </div>
            


            
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        <?php include("_footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

    <script src="js/custom/prospect.dealer.js"></script>


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