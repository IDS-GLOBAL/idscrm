<?php require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dlrdeals = "SELECT * FROM deals_bydealer WHERE deal_dealerID = '$did' ORDER BY deal_number DESC, deal_created_at DESC";
$find_dlrdeals = mysqli_query($idsconnection_mysqli, $query_find_dlrdeals);
$row_find_dlrdeals = mysqli_fetch_assoc($find_dlrdeals);
$totalRows_find_dlrdeals = mysqli_num_rows($find_dlrdeals);

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Deal Matrix: <?php echo $row_userDets['company']; ?></title>

 <?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Deal Matrix</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Deal Matrix Settings</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">


            <div class="row">
                <div class="col-sm-6">
                
                	<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Used Cars <small></small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">


                    <h4>On Used Cars <small></small></h4>
                    <p>Enter your rates so that IDS Robot can virtualize your deals.</p>

                    
                    <div class="form-group">
                    	<label>Very Good Credit (720 - 850) - Used Car</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="usedmatrixcredit_vgoodcredit" type="text" value="<?php echo $row_userDets['usedmatrixcredit_vgoodcredit']; ?>" placeholder="Apr Rate" data-mask="99.99" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>Very Good Credit</p>
                            </div>
                        </div>
                    </div>


                    
                    <div class="form-group">
                    	<label>Good Credit (675 - 719) - Used Car</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="usedmatrixcredit_jgoodcredit" type="text" value="<?php echo $row_userDets['usedmatrixcredit_jgoodcredit']; ?>" placeholder="Apr Rate" data-mask="99.99" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>**Good Credit**</p>
                            </div>
                        </div>
                    </div>


                    
                    <div class="form-group">
                    	<label>Fair Credit: (621-674) - Used Car</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="usedmatrixcredit_faircredit" type="text" value="<?php echo $row_userDets['usedmatrixcredit_faircredit']; ?>" placeholder="Apr Rate" data-mask="99.99" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>**Fair Credit**</p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                    	<label>Poor Credit: (575- 620) - Used Car</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="usedmatrixcredit_poorcredit" type="text" value="<?php echo $row_userDets['usedmatrixcredit_poorcredit']; ?>" placeholder="Apr Rate" data-mask="99.99" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p> **Poor Credit**</p>
                            </div>
                        </div>
                    </div>


                    
                    <div class="form-group">
                    	<label>Sub Prime: (Below - 575) - Used Car</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="usedmatrixcredit_subprime" type="text" value="<?php echo $row_userDets['usedmatrixcredit_subprime']; ?>" placeholder="Apr Rate" data-mask="99.99" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>Very Good Credit</p>
                            </div>
                        </div>
                    </div>


                    
                    <div class="form-group">
                    	<label>I am not Sure - No Credit: (0 - ?) - Used Car</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="usedmatrixcredit_unknown" type="text" value="<?php echo $row_userDets['usedmatrixcredit_unknown']; ?>" placeholder="Apr Rate" data-mask="99.99" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>**0 To Unknown**</p>
                            </div>
                        </div>
                    </div>

					<div class="hr-line-dashed"></div>

                    <div class="form-group">
                    	<label>Used Car Minimum Frontend Profit:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="usedmatrixcredit_fminimumprofit" type="text" value="<?php echo $row_userDets['usedmatrixcredit_fminimumprofit']; ?>" placeholder="Dollar Amount" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>**ie 1500.00**</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    	<label>Used Car Minimum Backend Profit:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="usedmatrixcredit_bminimumprofit" type="text" value="<?php echo $row_userDets['usedmatrixcredit_bminimumprofit']; ?>" placeholder="Dollar Amount" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>**ie 3000.00**</p>
                            </div>
                        </div>
                    </div>




                    </div>
                </div>
            	
                
                
                </div>
                <div class="col-sm-6">
                
                	<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>New Cars <small></small></h5>
                        
                    </div>
                    <div class="ibox-content">

                    <h4>On New Cars <small></small></h4>
                    <p>Enter your rates so that IDS Robot can virtualize your deals.</p>
                    
                    
                    <div class="form-group">
                    	<label>Very Good Credit (720 - 850) - New Car:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="newmatrixcredit_vgoodcredit" type="text" value="<?php echo $row_userDets['newmatrixcredit_vgoodcredit']; ?>" data-mask="99.99" placeholder="Apr Rate" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>Very Good Credit</p>
                            </div>
                        </div>
                    </div>


                    
                    <div class="form-group">
                    	<label>Good Credit (675 - 719) - New Car:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="newmatrixcredit_jgoodcredit" type="text" value="<?php echo $row_userDets['newmatrixcredit_jgoodcredit']; ?>" data-mask="99.99" placeholder="Apr Rate" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>**Good Credit**</p>
                            </div>
                        </div>
                    </div>


                    
                    <div class="form-group">
                    	<label>Fair Credit: (621-674) - New Car:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="newmatrixcredit_faircredit" type="text" value="<?php echo $row_userDets['newmatrixcredit_faircredit']; ?>" data-mask="99.99" placeholder="Apr Rate" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>**Fair Credit**</p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                    	<label>Poor Credit: (575- 620) - New Car:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="newmatrixcredit_poorcredit" type="text" value="<?php echo $row_userDets['newmatrixcredit_poorcredit']; ?>" data-mask="99.99" placeholder="Apr Rate" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p> **Poor Credit**</p>
                            </div>
                        </div>
                    </div>


                    
                    <div class="form-group">
                    	<label>Sub Prime: (Below - 575) - New Car:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="newmatrixcredit_subprime" type="text" value="<?php echo $row_userDets['newmatrixcredit_subprime']; ?>" data-mask="99.99" placeholder="Apr Rate" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>Very Good Credit</p>
                            </div>
                        </div>
                    </div>


                    
                    <div class="form-group">
                    	<label>I am not Sure - No Credit: (0 - ?) - New Car:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="newmatrixcredit_unknown" type="text" value="<?php echo $row_userDets['newmatrixcredit_unknown']; ?>" data-mask="99.99" placeholder="Apr Rate" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>**0 To Unknown**</p>
                            </div>
                        </div>
                    </div>

					<div class="hr-line-dashed"></div>

                    <div class="form-group">
                    	<label>New Car Minimum Frontend Profit:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="newmatrixcredit_fminimumprofit" type="text" value="<?php echo $row_userDets['newmatrixcredit_fminimumprofit']; ?>" placeholder="Dollar Amount" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>**ie. 1500.00**</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    	<label>New Car Minimum Backend Profit:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="newmatrixcredit_bminimumprofit" value="<?php echo $row_userDets['newmatrixcredit_bminimumprofit']; ?>"  placeholder="Dollar Amount">
                            </div>
                            <div class="col-sm-6">
                                <p>**ie. 300.00**</p>
                            </div>
                        </div>
                    </div>






                    </div>
                </div>
            	
                
                
                </div>
            </div>









            <div class="row">
                <div class="col-sm-6">
                
                	<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Deal Settings <small></small></h5>
                    </div>
                    <div class="ibox-content">

                    <h5>Important Settinggs <small>These settings will also be used for desking deals.</small></h5>



                    

                    
                    <div class="form-group">
                    	<label>My Default Monthly Term: </label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="settingDefaultTerm" type="text" data-mask="99" value="<?php echo $settingDefaultTerm; ?>" placeholder="36" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p> **Term** ie (24,48,72 Months)</p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                    	<label>Default Apr:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="settingDefaultAPR" type="text" data-mask="99.99" placeholder="18.00" value="<?php echo $settingDefaultAPR; ?>" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p> **Intrest Rate** ie 18.00</p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                    	<label>My State Sales Tax:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="settingSateSlsTax" type="text" data-mask="99.99" placeholder="06.0" value="<?php echo $settingSateSlsTax;  ?>" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p> **Sales Tax** ie 06.0 </p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                    	<label>My Doc/Service Fee:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="settingDocDlvryFee" type="text" placeholder="175.00" value="<?php echo $settingDocDlvryFee; ?>" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p> **Doc Fee** ie 270.00 </p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                    	<label>My Title Fee:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="settingTitleFee" type="text" value="<?php echo $settingTitleFee; ?>" placeholder="10.00" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p>  **Title Fee** ie 10.00</p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                    	<label>My State Inspection Fee:</label> 
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="settingStateInspectnFee" type="text" value="<?php echo $settingStateInspectnFee; ?>"  placeholder="5.00" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <p> **State Fee** ie 5.00</p>
                            </div>
                        </div>
                    </div>




                    </div>
                </div>
            	
                
                
                </div>
                <div class="col-sm-6">
                
                	<div class="ibox float-e-margins" style="display:none;">
                    <div class="ibox-title">
                        <h5>Deal Settings Example <small>Sort, search</small></h5>
                    </div>


<div class="">
                            <div class="ibox-content">
                                <div>
                                    <div>
                                        <span>Amount On</span>
                                        <small class="pull-right">$10000</small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: 60%;" class="progress-bar"></div>
                                    </div>

                                    <div>
                                        <span>Tax Amount</span>
                                        <small class="pull-right">20 GB</small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: 50%;" class="progress-bar"></div>
                                    </div>

                                    <div>
                                        <span>Tax Alone</span>
                                        <small class="pull-right">73%</small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: 40%;" class="progress-bar"></div>
                                    </div>

                                    <div>
                                        <span>FTP</span>
                                        <small class="pull-right">Tax Alone</small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: 20%;" class="progress-bar progress-bar-danger"></div>
                                    </div>
                                
                                
                                    <div>
                                        <span>Total:</span>
                                        <small class="pull-right">73%</small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: 40%;" class="progress-bar"></div>
                                    </div>
                                
                                
                                
                                
                                
                                
                                </div>
                            </div>
                        </div>                    
                    
                </div>
            	
                
                
                </div>
            </div>
            
 

            <div class="row">
                <div class="col-sm-12">
                
                	<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Approval Signature <small>Write your approval Signature below.</small></h5>
                        
                    </div>
                    <div class="ibox-content">

                    <h2>Dealer Signature <small>Sign your name below to have it populate on your signed documents.</small></h2>
                    
                    <div class="row">
                    	<div class="form-group">
                    		<canvas id="imageView" width="600" height="300" style="border:2px solid;"></canvas>
                    	</div>
                    </div>
                    
                    <div class="row">
                    	<div class="form-group">
                    		<button id="save_signature_btn" type="button" disabled="disabled" class="btn btn-outline-info" >Save Dealer Signature Only</button>
                    	</div>
                    </div>
                    

                    </div>
                </div>
            	
                
                
                </div>
            </div>
            
 
            
            <div class="row">
                <div class="col-sm-12">
                
                	<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Save Settings <small>Sort, search</small></h5>
                        
                    </div>
                    <div class="ibox-content" align="center">

                    <h2>Save Your Settings <small></small></h2>
                    
                    <button id="save_dealmatrix_settings" class="btn btn-lg btn-primary">Save Settings</button>

                    </div>
                </div>
            	
                
                
                </div>
            </div>




        
        
        
        
        
        
        
        







        </div>
        <?php include("footer.php"); ?>


    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>



        </div>
        </div>


    </div>

	<script src="js/custom/page/custom.dealmatrix.js"></script>
    	<script src="js/demo/canvas-painting.js"></script>
    
</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>