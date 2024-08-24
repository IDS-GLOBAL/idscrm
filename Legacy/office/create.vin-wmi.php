<?php require_once('db_admin.php'); ?>
<?php



mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_carYears = "SELECT * FROM auto_years ORDER BY `year` DESC";
$carYears = mysqli_query($idsconnection_mysqli, $query_carYears);
$row_carYears = mysqli_fetch_array($carYears);
$totalRows_carYears = mysqli_num_rows($carYears);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmakes = "SELECT * FROM car_make ORDER BY car_make ASC";
$vmakes = mysqli_query($idsconnection_mysqli, $query_vmakes);
$row_vmakes = mysqli_fetch_array($vmakes);
$totalRows_vmakes = mysqli_num_rows($vmakes);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_vmodels = "SELECT * FROM car_model ORDER BY model ASC";
$vmodels = mysqli_query($idsconnection_mysqli, $query_vmodels);
$row_vmodels = mysqli_fetch_array($vmodels);
$totalRows_vmodels = mysqli_num_rows($vmodels);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_bodystyles = "SELECT * FROM body_styles ORDER BY body_style_name ASC";
$query_bodystyles = mysqli_query($idsconnection_mysqli, $query_query_bodystyles);
$row_query_bodystyles = mysqli_fetch_array($query_bodystyles);
$totalRows_query_bodystyles = mysqli_num_rows($query_bodystyles);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_vvinwmi_onetwothree = "SELECT * FROM `idsids_idsdms`.`vvin_wmionetwothree` ORDER BY `vvin_wmi_code` ASC";
$query_vvinwmi_onetwothree = mysqli_query($idsconnection_mysqli, $query_query_vvinwmi_onetwothree);
$row_query_vvinwmi_onetwothree = mysqli_fetch_array($query_vvinwmi_onetwothree);
$totalRows_query_vvinwmi_onetwothree = mysqli_num_rows($query_vvinwmi_onetwothree);

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
                <h2>Create VIN WMI For Manufacturer</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="inventory.php">Vehicles</a>
                    </li>
                    <li>
                        <a href="#">Create Make &amp; Models</a>
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
                        <h5>Reference List of all manufactures <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">

                        Visit: <a target="_blank" href="https://en.wikibooks.org/wiki/Vehicle_Identification_Numbers_(VIN_codes)/World_Manufacturer_Identifier_(WMI)">
                            https://en.wikibooks.org/wiki/Vehicle_Identification_Numbers_(VIN_codes)/World_Manufacturer_Identifier_(WMI)
                        </a>

                    </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create VIN WMI <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">
                            <div class="form-horizontal">
                                
                                
                                <div class="hr-line-dashed"></div>
                                <div class="row">
                                <div class="col-sm-6">

                                <div class="form-group"><label class="col-sm-2 control-label">Enter WMI</label>

                                    <div class="col-sm-10"><input type="text" id="car_wmi_code_123" name="car_wmi_code_123" class="form-control"></div>
                                </div>
                                
                                </div>
                                <div class="col-sm-6">

	                                <div class="form-group"><label class="col-sm-2 control-label">Choose Manufaturer</label>

                                    <div class="col-sm-10"><select class="form-control m-b" id="car_make" name="car_make">
                                                    <option value="">Select Make</option>
                                                    <?php
                                                do {  
                                                ?>
                                                    <option value="<?php echo $row_vmakes['make_id']?>"><?php echo $row_vmakes['car_make']?></option>
                                                    <?php
                                                } while ($row_vmakes = mysqli_fetch_array($vmakes));
                                                  $rows = mysqli_num_rows($vmakes);
                                                  if($rows > 0) {
                                                      mysqli_data_seek($vmakes, 0);
                                                      $row_vmakes = mysqli_fetch_array($vmakes);
                                                  }
                                                ?>
                                                  </select>

                                    </div>
                                </div>
                                

                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="col-sm-12">
                                    <div class="text-center">
                                    <button id="create_newwmi_code_123" type="button" class="btn btn-primary">Create New WMI Code / Save</button>
                                    </div>                                
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
                        <h5>Manufacturer list that are in the system and exist <small>ajax feature</small></h5>
                    </div>
                    <div class="ibox-content">
                    
                    <div class="row">
                    	<div class="col-sm-6">

                            <div id="script_ajax_exist_manuf_results">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="ibox float-e-margins">
                                            <div class="ibox-title">
                                                <h5>Existing WMI Table </h5>
                                                
                                            </div>
                                            <div class="ibox-content">

                                                <table class="table table-bordered">
                                                    <thead>
                                                    
                                                    <tr>
                                                        <th>vvin_wmi_id </th>
                                                        <th>vvin_wmi_code</th>
                                                        <th>vvin_wmi_manuf</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php do {   ?>
                                                            
                                                        <tr>
                                                            <td><?php echo $row_query_vvinwmi_onetwothree['vvin_wmi_id']; ?></td>
                                                            <td><?php echo $row_query_vvinwmi_onetwothree['vvin_wmi_code']; ?></td>
                                                            <td><?php echo $row_query_vvinwmi_onetwothree['vvin_wmi_manuf']; ?></td>
                                                        </tr>
                                                            
                                                <?php } while ($row_query_vvinwmi_onetwothree  = mysqli_fetch_array($query_vvinwmi_onetwothree)); ?>
                                                    
                                                    <tr>
                                                        <td>0</td>
                                                        <td>Na</td>
                                                        <td>Na</td>
                                                        <td>Na</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            
                            </div>
                        
                        </div>
                    	<div class="col-sm-6">

                            <div id="script_ajax_justadded_manuf_results">
                            
                            </div>
                        
                        </div>
                    </div>

                    

                    </div>
                </div>
              </div>
            </div>


            <div class="modal inmodal fade" id="myCreateYearModal" tabindex="-1" role="dialog"  aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title">Create New Year</h4>
                                                            <small class="font-bold">This year will be added to the system</small>
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="ibox ">
                                                                        <div class="ibox-title">
                                                                            <h5>System Year Creation</h5>
                                                                            
                                                                        </div>
                                                                        <div class="ibox-content">
                                                                            <form>
                                                                                
                                                                                <div class="form-group row"><label class="col-lg-2 col-form-label">New System Year</label>
    
                                                                                    <div class="col-lg-10">
                                                                                        <input id="inputNewSystemYear" name="inputNewSystemYear" type="text" placeholder="Year" class="form-control"> <span class="form-text text-danger m-b-none">only numbers only enter the year to be added to system.</span>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                
                                                                                <div class="form-group row">
                                                                                    <div class="col-lg-offset-2 col-lg-10">
                                                                                        <button id="actionCreateAutoYearBtn" class="btn btn-sm btn-primary" type="button">Create A New Year</button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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

<script src="js/custom/page/custom.create.vin-wmi.js"></script>

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