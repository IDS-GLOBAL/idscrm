<?php require_once("db_loggedin.php"); ?>
<?php
$colname_query_Salesperson = "-1";
if (isset($_GET['sid'])) {
  $colname_query_Salesperson = $_GET['sid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_Salesperson =  sprintf("SELECT * FROM `sales_person` WHERE `sales_person`.`salesperson_id` = %s AND `sales_person`.`main_dealerid` = '$did' ", GetSQLValueString($colname_query_Salesperson, "int"));
$query_Salesperson = mysqli_query($idsconnection_mysqli, $query_query_Salesperson);
$row_query_Salesperson = mysqli_fetch_assoc($query_Salesperson);
$totalRows_query_Salesperson = mysqli_num_rows($query_Salesperson);
$salesperson_id = $row_query_Salesperson['salesperson_id'];

if(!$salesperson_id){ header('Location: salespeople.php'); }

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Salesperson Edit</title>

<?php include("inc.head.php"); ?>
</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Sales Person Edit</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a>Sales Team</a>
                        </li>
                        <li class="active">
                            <strong>Sales Person Edit</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>



                     <div class="ibox-content">
                            <form method="get" class="form-horizontal">
                                
                                <div class="form-group"><label class="col-sm-2 control-label">First Name:</label>

                                    <div class="col-sm-10"><input id="salesperson_firstname" name="salesperson_firstname" type="text" class="form-control" value="<?php echo $row_query_Salesperson['salesperson_firstname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Last Name:</label>

                                    <div class="col-sm-10"><input id="salesperson_lastname" name="salesperson_lastname" type="text" class="form-control" value="<?php echo $row_query_Salesperson['salesperson_lastname']; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>


                                <div class="form-group"><label class="col-sm-2 control-label">Email:</label>

                                    <div class="col-sm-10"><input name="salesperson_email" type="text" class="form-control" id="salesperson_email" value="<?php echo $row_query_Salesperson['salesperson_email']; ?>"></div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>

                                <div class="form-group"><label class="col-sm-2 control-label">Password</label>

                                    <div class="col-sm-10">
                                   <input name="salesperson_password" type="text" class="form-control" id="salesperson_password" value="<?php echo $row_query_Salesperson['salesperson_password']; ?>"></div>
                                    
                                </div>
                                

                                
                                <div class="hr-line-dashed"></div>



                                <div class="form-group"><label class="col-sm-2 control-label">Mobile Phone Number:</label>

                                    <div class="col-sm-10">
                                   <input name="salesperson_mobilephone_number" type="text" class="form-control" id="salesperson_mobilephone_number" value="<?php echo $row_query_Salesperson['salesperson_mobilephone_number']; ?>"></div>
                                    
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Account Status:</label>
                                	<div class="col-sm-10">
                                    	<select class="form-control m-b" name="acct_status" id="acct_status">
                                        	<option value="1">ON</option>
                                        	<option value="0">OFF</option>
                                        </select>
                                    	
                                    </div>
                                </div>
                                
                                <div class="hr-line-dashed"></div>
                                </form>
                                </div>





        <div class="wrapper wrapper-content">

            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sales Pitch Editor</h5>
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
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content no-padding">

                        <div class="summernote">
                                <?php echo $row_query_Salesperson['sales_pitch']; ?>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">

                        <div class="ibox-content">

                                        <button class="btn btn-white" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="button">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            

            </div>


        <?php include("footer.php"); ?>

        </div>
        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote();

       });
        var edit = function() {
            $('.click2edit').summernote({focus: true});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };
    </script>

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>