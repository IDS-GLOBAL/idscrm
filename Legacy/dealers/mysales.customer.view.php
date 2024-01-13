<?php require_once("db_sales_loggedin.php"); ?>
<?php

$colname_view_thiscustomer = "-1";
if (isset($_GET['customer_id'])) {
  $colname_view_thiscustomer = $_GET['customer_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_view_thiscustomer =  sprintf("SELECT * FROM customers WHERE customer_id = %s", GetSQLValueString($colname_view_thiscustomer, "int"));
$view_thiscustomer = mysqli_query($idsconnection_mysqli, $query_view_thiscustomer);
$row_view_thiscustomer = mysqli_fetch_assoc($view_thiscustomer);
$totalRows_view_thiscustomer = mysqli_num_rows($view_thiscustomer);

$customer_id = $row_view_thiscustomer['customer_id'];
$customer_dealer_id =  $row_view_thiscustomer['customer_dealer_id'];


if($customer_dealer_id != $did){
  header('Location: mysales.customers.php');
}

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_customer_leadnotes = "SELECT * FROM customer_notes WHERE note_customerid	 = '$customer_id' ORDER BY note_created DESC";
$query_customer_leadnotes = mysqli_query($idsconnection_mysqli, $query_query_customer_leadnotes);
$row_query_customer_leadnotes = mysqli_fetch_assoc($query_customer_leadnotes);
$totalRows_query_customer_leadnotes = mysqli_num_rows($query_customer_leadnotes);


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Customer View <?php echo $row_userDets['company']; ?></title>

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

        <?php include("_sidebar.sales.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.sales.php"); ?>
        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Customer View</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="mysales.dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="mysales.customers.php" target="_parent">Customers</a>
                        </li>
                        <li>
                            <a><strong>Customer View</strong></a>
                            <input id="customer_id" type="hidden" value="<?php echo $row_view_thiscustomer['customer_id']; ?>"> 
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
                        <h5>Viewing Customer</h5>
                    </div>
                    <div class="ibox-content">
                        <p>
                            Choose And Click Your Options Below.
                        </p>
                        <h3 class="font-bold">Lead Options</h3>
                <!-- a class="btn btn-primary  dim btn-large-dim" type="button"><i class="fa fa-smile-o fa-3x"></i></a -->

                <a class="btn btn-info  dim btn-large-dim btn-outline" target="_parent" href="mysales.customer.edit.php?customer_id=<?php echo $row_view_thiscustomer['customer_id']; ?>"><i class="fa fa-pencil-square-o fa-3x"></i></a>
                
                <a class="btn btn-default dim btn-large-dim" type="button"><i class="fa fa-envelope-o fa-3x"></i><br></a>                        


                <!--a class="btn btn-danger  dim btn-large-dim" type="button"><i class="fa fa fa-frown-o fa-3x"></i></a -->

                <a class="btn btn-warning dim btn-large-dim" type="button"><i class="fa fa-print fa-3x"></i></a>


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
                           <strong> Name: </strong><?php echo $row_view_thiscustomer['customer_title']; ?> <?php echo $row_view_thiscustomer['customer_fname']; ?><?php echo $row_view_thiscustomer['customer_mname']; ?><?php echo $row_view_thiscustomer['customer_lname']; ?><?php echo $row_view_thiscustomer['customer_suffix']; ?> <br />
                            <strong>Nick Name: </strong><?php echo $row_view_thiscustomer['customer_nickname']; ?> <br />
                            <strong>Sex:  </strong><?php echo $row_view_thiscustomer['customer_sex']; ?> <br />

                        </address>


                        <address>
                            <strong><u><em>Phone Numbers</em></u></strong><br><br>
                           <strong>Home Phone: </strong> <?php echo $row_view_thiscustomer['customer_phoneno']; ?><br /><br />
                            <strong>Mobile Phone:</strong> <a href="tel: <?php echo $row_view_thiscustomer['customer_cellphone']; ?>"> <?php echo $row_view_thiscustomer['customer_phoneno']; ?></a><br><br>
                            <strong>Work Phone:</strong> <a href="tel: <?php echo $row_view_thiscustomer['customer_work_phone']; ?>"> <?php echo $row_view_thiscustomer['customer_work_phone']; ?></a>
                        </address>


						<address>
                        	<strong>Email:</strong> <?php echo $row_view_thiscustomer['customer_email']; ?>
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
                            <strong>Address 1: </strong> <?php echo $row_view_thiscustomer['customer_home_addr1']; ?><br /><br />
                            <strong>Address 2: <?php echo $row_view_thiscustomer['customer_home_addr2']; ?></strong> <br /><br />
                            <strong>City, State Zip: </strong> <?php echo $row_view_thiscustomer['customer_home_city']; ?>, <?php echo $row_view_thiscustomer['customer_home_state']; ?> <?php echo $row_view_thiscustomer['customer_home_zip']; ?> <?php echo $row_view_thiscustomer['customer_home_county']; ?><br>
                        </address>


                        <address>
                            <strong>Move In Date: </strong> <?php echo $row_view_thiscustomer['customer_home_live_movindate']; ?><br><br>


                            <strong>Live Years: </strong>
                            <a><?php echo $row_view_thiscustomer['customer_home_live_years']; ?></a><br><br>

                            <strong>Live Months: </strong>
                            <a><?php echo $row_view_thiscustomer['customer_home_live_months']; ?></a><br>
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
                               <strong>Sold?</strong> <?php echo $row_view_thiscustomer['customer_status_sold']; ?>
                            </li>

                            <li class="list-group-item">
                               <strong>Sales Person 1:</strong> <?php echo $row_view_thiscustomer['customer_sales_person_id']; ?>
                               <input id="customer_sales_person_id" type="hidden" value="<?php echo $row_view_thiscustomer['customer_sales_person_id']; ?>">
                            </li>
                            <li class="list-group-item">
                               <strong>Sales Person 2:</strong> <?php echo $row_view_thiscustomer['customer_sales_person2_id']; ?>
                               <input id="customer_sales_person2_id" type="hidden" value="<?php echo $row_view_thiscustomer['customer_sales_person2_id']; ?>">
                            </li>

                            <li class="list-group-item">
                               <strong>Finance Type:</strong> <?php echo $row_view_thiscustomer['customer_finance_type']; ?>
                            </li>
                            <li class="list-group-item">
                               <strong>Lost Code:</strong> <?php echo $row_view_thiscustomer['customer_lostcode']; ?>
                            </li>
                            <li class="list-group-item">
                               <strong>Map Pulled:</strong> <?php echo $row_view_thiscustomer['customer_home_okgoogle']; ?>
                            </li>
                            <li class="list-group-item ">
                               <strong>Status:</strong> <?php echo $row_view_thiscustomer['customer_status']; ?> 
                            </li>
                            <li class="list-group-item">
                               
                              <strong>Buying Cycle:</strong> <?php echo $row_view_thiscustomer['customer_dayhunt']; ?> 
                            </li>
                            <li class="list-group-item">
                                <span class="badge badge-success">10</span>
                               <strong>Temperature:</strong> <?php echo $row_view_thiscustomer['customer_lead_temperature']; ?>
                            </li>
                            <li class="list-group-item">
                               <strong>Perferred:</strong> <?php echo $row_view_thiscustomer['customer_perf_commun']; ?>
                            </li>
                            <li class="list-group-item">
                            	<strong>Magic Payment:</strong> <?php echo $row_view_thiscustomer['customer_desired_mo_payment']; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            
            
            </div>

</div>





<div id="current_work_section" class="row">

            <div class="col-lg-12">
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Employer</h5>
                    </div>
<div class="ibox-content">
                        <address>
                            <strong>Employer Name: </strong> <?php echo $row_view_thiscustomer['customer_employer_name']; ?><br>
                            <strong>Address 1: <?php echo $row_view_thiscustomer['customer_employer_addr1']; ?></strong> <br>
                            <strong>Address 2: <?php echo $row_view_thiscustomer['customer_employer_addr2']; ?></strong> <br>
                            <strong>City, State Zip: </strong><?php echo $row_view_thiscustomer['customer_employer_city']; ?>, <?php echo $row_view_thiscustomer['customer_employer_state']; ?> <?php echo $row_view_thiscustomer['customer_employer_zip']; ?><br />
                        </address>


                        <address>
                            <strong>Employer Phone: </strong> 
                            <a href="tel: <?php echo $row_view_thiscustomer['customer_employer_phone']; ?>"> <?php echo $row_view_thiscustomer['customer_employer_phone']; ?></a><br>

                            <strong>Supervisor Name: </strong> 
                            <a href="tel: <?php echo $row_view_thiscustomer['customer_supervisors_name']; ?>"> <?php echo $row_view_thiscustomer['customer_supervisors_name']; ?></a><br>

                            <strong>Supervisor Phone: </strong> 
                            <a href="tel: <?php echo $row_view_thiscustomer['customer_supervisors_phone']; ?>"> <?php echo $row_view_thiscustomer['customer_supervisors_phone']; ?> Ext: <?php if($row_view_thiscustomer['customer_supervisors_phone_ext']){ echo 'Ext: '.$row_view_thiscustomer['customer_supervisors_phone_ext']; } ?></a><br>
                            
                        </address>




                        <address>
						<strong>Hire Date: </strong> <?php echo $row_view_thiscustomer['customer_employer_hiredate']; ?><br />

                            <strong>Work Years: </strong> <?php echo $row_view_thiscustomer['customer_employer_years']; ?><br />
                           
                            <strong>Work Months: </strong> <?php echo $row_view_thiscustomer['customer_employer_months']; ?><br />
                            
                        </address>

                    <address>
                            <strong>Gross Income: </strong>  <?php echo $row_view_thiscustomer['customer_gross_income']; ?> <br />
							<strong>Frequency: </strong><?php echo $row_view_thiscustomer['customer_income_frequency']; ?><br>
                      </address>


                    <address>
                            <strong>Other Income: </strong>  <?php echo $row_view_thiscustomer['customer_income_other']; ?> <br />
                            <strong>Other I. Amount: </strong>  <?php echo $row_view_thiscustomer['customer_income_other_amount']; ?> <br />

							<strong>Frequency: </strong><?php echo $row_view_thiscustomer['customer_income_other_frequency']; ?><br>
                      </address>


 
                    </div>
                   
                   </div>
            
            
            </div>

</div>













            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Customer Information<small>Hard Display Of Customer</small></h5>
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
                        	<textarea class="left-float" id="customer_bodynote" rows="4" cols="50"></textarea>
                        </div>
                        
                        <div class="row">
                        
                        	<div class="col-lg-12" align="center">
                            	<button id="save_customer_notes" class="btn btn-w-m btn-success" type="button">Save Notes</button>
                        		<div class="hr-line-dashed"></div>

                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-lg-12">
                            
                            
                            

<p>Note History</p>
<p>  </p>
  
<div id="master_customer_notes_layout" class="table-responsive">


                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th></th>
                                        <th>Project </th>
                                        <th>Comment</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>

<?php if($row_query_customer_leadnotes['note_id'] > 0):  do { ?>

                    <tr id="notes_view_<?php echo $row_query_customer_leadnotes['note_id']; ?>">
                        <td>
                        	
                        </td>
                        <td>
                        	By: <small><?php echo $row_query_customer_leadnotes['note_nametext']; ?></small>
                        </td>
                        <td>
							
                            <p><?php echo $row_query_customer_leadnotes['note_body']; ?></p>

                        </td>
                        <td>
                        	 <?php echo $row_query_customer_leadnotes['note_created']; ?>
                        </td>
                    </tr>







<?php } while ($row_query_customer_leadnotes = mysqli_fetch_assoc($query_customer_leadnotes)); endif; ?>
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
	<?php include("inc.end.mysales.body.php"); ?>

<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#mydataTable').dataTable({
        "scrollX": true,
        "scrollCollapse": true,
        "paging":         true
    });
} );

</script>
<script src="js/custom/page/custom.customer.view.js"></script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($view_thiscustomer);

?>