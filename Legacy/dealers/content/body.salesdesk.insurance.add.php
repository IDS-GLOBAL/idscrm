                                
  <div class="row">
  		<div class="col-sm-6">
        
                            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Insurance <small><a href="creditapps.php" target="_blank">I Box</a></small></h5>
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
                            <h3>
                                IBox
                            </h3>
                            <p>
                            	I Box Example For Sales desk.
                            </p>
                            
                            <div class="form-horizontal m-t-md">



								<div class="form-group">
                                    <label class="col-sm-3 control-label">Insurance Company Name:</label>
                                    <div class="col-sm-9">
									<input id="vInsurCompNm" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Insurance Company Address:</label>
                                    <div class="col-sm-9">
									<input id="vInsurCompAddr" class="form-control" value=""/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Insurance Company Address 2:</label>
                                    <div class="col-sm-9">
									<input id="vInsurCompAddr2" class="form-control" value=""/>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Insurance Company City:</label>
                                    <div class="col-sm-9">
									<input id="vInsurCompCity" class="form-control" value=""/>
                                    </div>
                                </div>


                                <div class="hr-line-dashed"></div>


								<div class="form-group">
                                    <label class="col-sm-3 control-label">Insurance Company State:</label>
                                    <div class="col-sm-9">
                                        <select id="vInsurCompState" class="form-control">
                                    	<option>Select State</option>
										<?php do {  ?>
                                        <option value="<?php echo $row_states['state_abrv']?>"><?php echo $row_states['state_abrv']?></option>
                                        <?php } while ($row_states = mysqli_fetch_array($states));
                                          $rows = mysqli_num_rows($states);
                                          if($rows > 0) {
                                              mysqli_data_seek($states, 0);
                                              $row_states = mysqli_fetch_array($states);
                                          }
                                        ?>
                                    </select>
                                    </div>
                                </div>                            
                                <div class="hr-line-dashed"></div>
								<div class="form-group">
                                    <label class="col-sm-3 control-label">Insurance Company Zip:</label>
                                    <div class="col-sm-9">
									<input id="vInsurCompZip"class="form-control" value="" />
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>


                                
                            </div>
                        
                        
                        </div>
                    </div>

        </div>
        
        <div class="col-sm-6">
        
                            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Insurance <small></small></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="form-horizontal m-t-md">

								<div class="form-group">
                                    <label class="col-sm-3 control-label">Choose Insurance Company:</label>
                                    <div class="col-sm-9">
                                        <select id="vInsurComp_slct" class="form-control">
                                                      <option value="">Select</option>
                                        </select>
                                        <span class="help-block">Use Loaded Insurance Companies</span>
                                    </div>
                                </div>                            

                                <div class="hr-line-dashed"></div>
                        
                        
                        </div>
                    </div>

                </div>
                
        </div>
  </div>                                  
