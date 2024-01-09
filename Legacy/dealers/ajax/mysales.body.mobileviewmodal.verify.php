<?php require_once('mysales.db.php'); ?>
<?php


?>


<div id="mobile_verifysend_block" class="row" style="display:block;">
	<div class="col-md-12">
    
    	<div class="widget navy-bg no-padding">
        	<div class="p-m">
            	<h3 class="font-bold no-margins">
                By having us send you a code to your mobile phone, means you authorize us to send your mobile alerts to your mobile device.
                
                </h3>
            
            </div>
        
        </div>
    
    </div>


		<div class="col-md-6">
                <div class="form-group">
                    <label>Mobile Carrier Network:</label>
                
                        <div class="input-group m-b">
                        
                            <h3><?php echo $row_userDets['salesperson_mobile_carrier']; ?></h3>
                            <!--span class="input-group-btn">
                                <button type="button" class="btn btn-primary">Save!</button>
                            </span -->
                        </div>
                
                
                
                
                </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label>Your Mobile Number To Verify?</label>
            
                    <div class="input-group m-b">
                    
                        <input id="mobile_number_verifying" name="mobile_number_verifying" type="text" class="form-control" value="<?php echo $row_userDets['salesperson_mobilephone_number']; ?>" disabled="disabled">
                        <span class="input-group-btn">
                            <button id="send_mobile_codetosalesperson" type="button" class="btn btn-primary"><i class="fa fa-mobile"></i> Send Code!</button>
                        </span>
                    </div>
            
            
            
            
            </div>
        </div>




</div>


<div id="mobile_verifycode_block" class="row" style="display:none;">
	<div class="col-md-12">

		<div class="widget style1 navy-bg">
        	<div class="p-m">
            	<h3 class="font-bold no-margins">
                By having us send you a code to your mobile phone, means you authorize us to send your mobile alerts to your mobile device.
                
                </h3>
            
            </div>
        
        </div>
        
        
            
    </div>

        

		<div class="col-md-6 col-md-offset-3">
        <div class="form-group">
            <label>Enter The Code Sent:</label>
        
                <div class="input-group m-b">
                
                    <input id="mobile_number_verifycode" name="mobile_number_verifycode" type="text" class="form-control" value="" placeholder="Enter Code Sent">
                    <span class="input-group-btn">
                        <button id="save_mobile_codeto" type="button" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Save!</button>
                    </span>
                </div>
        
        
        
        
        </div>
    </div>


</div>