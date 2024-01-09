<?php require_once('../Connections/idsconnection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
 require_once("db_loggedin.php"); ?>
<?php

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_find_dealer_teams = "SELECT * FROM dealers_teams WHERE dealers_teams.dlr_team_did AND dealers_teams.dlr_team_status ORDER BY dealers_teams.dlr_team_name";
$find_dealer_teams = mysqli_query($idsconnection_mysqli, $query_find_dealer_teams);
$row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams);
$totalRows_find_dealer_teams = mysqli_num_rows($find_dealer_teams);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_findrepairshopsevenmine = "SELECT * FROM repair_shops ORDER BY repairshops_company_name ASC";
$findrepairshopsevenmine = mysqli_query($idsconnection_mysqli, $query_findrepairshopsevenmine);
$row_findrepairshopsevenmine = mysqli_fetch_assoc($findrepairshopsevenmine);
$totalRows_findrepairshopsevenmine = mysqli_num_rows($findrepairshopsevenmine);
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Repair Shops</title>

<?php include("inc.head.php"); ?>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">

        <?php include("_nav_top.php"); ?>






<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>Repairshop</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            Repairshop View
                        </li>
                        <li class="active">
                            <strong>Repairshops</strong>
                        </li>
                    </ol>
                </div>
            </div>




			<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-12">
                    <div class="title-action">
                    
                        <a href="repairshop.add.php" class="btn btn-primary btn-lg">Add Repair Shop</a>
                    </div>
                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <?php do { ?>
              <div class="col-lg-4">
                <div class="contact-box"> 
                  <div class="col-sm-4">
                    <div class="text-center"> <img alt="image" class="m-t-xs img-responsive" src="img/a2.jpg">
                      <div class="m-t-xs font-bold text-center">
                      <a href="repairshop.edit.php?" target="_parent">
					  <?php 
					  	if($row_find_dealer_teams['dlr_team_status'] == 1){
							echo '<button class="btn btn-primary dim" type="button"><i class="fa fa-check"></i><span class="bold">Active</span></button>';
							
						}elseif($row_find_dealer_teams['dlr_team_status'] == 0){
							echo '<button class="btn btn-warning  dim" type="button"><i class="fa fa-warning"></i><span class="bold">Inactive</span></button>';
						}
					  
					  ?>
                      </a>
                      </div>
                    </div>
                  </div>
                  <div id="team_block" class="col-sm-8 team_block">
                    <h3><strong><?php echo $row_find_dealer_teams['dlr_team_name']; ?></strong></h3>
                    <p><i class="fa fa-map-marker"></i> <?php echo $row_find_dealer_teams['dlr_team_created_at']; ?></p>
                    <p><?php echo $row_find_dealer_teams['dlr_team_description']; ?></p>
                  </div>
                  <div class="clearfix"></div>
                </a> </div>
              </div>
              <?php } while ($row_find_dealer_teams = mysqli_fetch_assoc($find_dealer_teams)); ?>
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
            $('.contact-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>

</body>

</html>
<?php
mysqli_free_result($find_dealer_teams);

mysqli_free_result($findrepairshopsevenmine);
?>
<?php include("inc.end.phpmsyql.php"); ?>
