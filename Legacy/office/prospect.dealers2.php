<?php require_once('db_admin.php'); ?>
<?php







mysql_select_db($database_tracking, $tracking);
$query_dstates = "SELECT DISTINCT dealer_prospects.`state` FROM dealer_prospects ORDER BY dealer_prospects.`state` DESC";
$dstates = mysqli_query($idsconnection_mysqli, $query_dstates, $tracking);
$row_dstates = mysqli_fetch_array($dstates);
$totalRows_dstates = mysqli_num_rows($dstates);







$currentPage = $_SERVER["PHP_SELF"];

$maxRows_find_dealer_prospects = 100;
$pageNum_find_dealer_prospects = 0;
if (isset($_GET['pageNum_find_dealer_prospects'])) {
  $pageNum_find_dealer_prospects = $_GET['pageNum_find_dealer_prospects'];
}
$startRow_find_dealer_prospects = $pageNum_find_dealer_prospects * $maxRows_find_dealer_prospects;

$colname_find_dealer_prospects = "-1";
if (isset($_GET['state'])) {
  $colname_find_dealer_prospects = $_GET['state'];
}
mysql_select_db($database_tracking, $tracking);
$query_find_dealer_prospects =  "SELECT * FROM dealer_prospects WHERE `state` = %s ORDER BY company ASC", GetSQLValueString($colname_find_dealer_prospects, "text"));
$query_limit_find_dealer_prospects =  "%s LIMIT %d, %d", $query_find_dealer_prospects, $startRow_find_dealer_prospects, $maxRows_find_dealer_prospects);
$find_dealer_prospects = mysqli_query($idsconnection_mysqli, $query_limit_find_dealer_prospects, $tracking);
$row_find_dealer_prospects = mysqli_fetch_array($find_dealer_prospects);

if (isset($_GET['totalRows_find_dealer_prospects'])) {
  $totalRows_find_dealer_prospects = $_GET['totalRows_find_dealer_prospects'];
} else {
  $all_find_dealer_prospects = mysqli_query($idsconnection_mysqli, $query_find_dealer_prospects);
  $totalRows_find_dealer_prospects = mysqli_num_rows($all_find_dealer_prospects);
}
$totalPages_find_dealer_prospects = ceil($totalRows_find_dealer_prospects/$maxRows_find_dealer_prospects)-1;

$queryString_find_dealer_prospects = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_find_dealer_prospects") == false && 
        stristr($param, "totalRows_find_dealer_prospects") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_find_dealer_prospects = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_find_dealer_prospects =  "&totalRows_find_dealer_prospects=%d%s", $totalRows_find_dealer_prospects, $queryString_find_dealer_prospects);



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>
    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">



<script type="text/javascript">
<!--
function MM_jumpMenuGo(objId,targ,restore){ //v9.0
  var selObj = null;  with (document) { 
  if (getElementById) selObj = getElementById(objId);
  if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0; }
}
//-->
</script>

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Prospect Dealers</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Dealer Prospects</a>
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
                        <h5>Prospects States <small>Sort, search</small></h5>
                        
                        <div id="state_minimenu">
                        
    <form name="form" id="form">
      <select name="jumpMenuState" id="jumpMenuState">
        <option value="" <?php if (!(strcmp("", $row_dstates['state']))) {echo "selected=\"selected\"";} ?>>Select State</option>
        <?php
do {  
?>
        <option value="?state=<?php echo $row_dstates['state'].$queryString_find_dealer_prospects; ?>"<?php if (!(strcmp($row_dstates['state'], $row_dstates['state']))) {echo "selected=\"selected\"";} ?>><?php echo $row_dstates['state']?></option>
        <?php
} while ($row_dstates = mysqli_fetch_array($dstates));
  $rows = mysqli_num_rows($dstates);
  if($rows > 0) {
      mysqli_data_seek($dstates, 0);
	  $row_dstates = mysqli_fetch_array($dstates);
  }
?>
      </select>
      <input type="button" name="go_button" id= "go_button" value="Go" onClick="MM_jumpMenuGo('jumpMenuState','parent',0)" />
    </form>
                        
                        
                        
                        </div>
                        
                        
                    </div>
					<div class="ibox-content">
                <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th data-hide="phone,tablet">Dealer ID</th>
                                    <th>Status</th>
                                    <th>Company Name</th>
                                    <th>City</th>
                                    <th data-hide="phone,tablet">State</th>
                                    <th>Zip</th>
                                    <th data-hide="phone,tablet">Website</th>
                                    <th data-hide="phone,tablet">Email</th>
                                    <th>Phone</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
		<?php do { ?>
		  <tr>
		    <td><a href="?state=<?php echo $row_find_dealer_prospects['state']; ?>&dealer=<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger"><?php echo  $row_find_dealer_prospects['id']; ?></a></td>
    <td><a href="?state=<?php echo $row_find_dealer_prospects['state']; ?>&dealer=<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger">
				<?php 
					$status =  $row_find_dealer_prospects['status'];
					if(!$status){ echo ''; }
					if($status == 0){ echo 'OFF'; }
					if($status == 1){ echo 'ON'; }
				?>
				</a>
            </td>
		    <td><a href="dealer-prospect-update.php?dealer=<?php echo  $row_find_dealer_prospects['id']; ?>?dealer=<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger"><?php echo  $row_find_dealer_prospects['company']; ?></a></td>
		    <td><a href="?state=<?php echo $row_find_dealer_prospects['state']; ?>&dealer=<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger"><?php echo  $row_find_dealer_prospects['city']; ?></a></td>
		    <td><a href="?state=<?php echo $row_find_dealer_prospects['state']; ?>&dealer=<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger"><?php echo  $row_find_dealer_prospects['state']; ?></a></td>
		    <td><a href="dealer-prospect-update.php?dealer=<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger"><?php echo  $row_find_dealer_prospects['zip']; ?></a></td>
		    <td>
            	<a href="dealer-prospect-update.php?dealer=<?php echo  $row_find_dealer_prospects['id']; ?>" target="_blank">
					<?php echo  $row_find_dealer_prospects['website']; ?>
            	</a>
            </td>
		    
		    <td><a href="?state=<?php echo $row_find_dealer_prospects['state']; ?>&dealer=<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger"><?php echo  $row_find_dealer_prospects['email']; ?></a></td>
		    <td><a href="?state=<?php echo $row_find_dealer_prospects['state']; ?>&dealer=<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger"><?php echo  $row_find_dealer_prospects['phone']; ?></a></td>
<td>
<a id="<?php echo $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger" target="_blank">
            		Edit
            	</a>
            </td>
	      </tr>
  <?php } while ($row_find_dealer_prospects = mysqli_fetch_array($find_dealer_prospects)); ?>                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>                    

                    </div>
              </div>
            </div>



            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Blank Page <small>Sort, search</small></h5>
                    </div>
                    <div class="ibox-content">












<div class="row">
<p>&nbsp;
  <a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, 0, $queryString_find_dealer_prospects); ?>">First</a>
<p><a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, max(0, $pageNum_find_dealer_prospects - 1), $queryString_find_dealer_prospects); ?>">Previous</a>
<p><a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, min($totalPages_find_dealer_prospects, $pageNum_find_dealer_prospects + 1), $queryString_find_dealer_prospects); ?>">Next</a>
<p><a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, $totalPages_find_dealer_prospects, $queryString_find_dealer_prospects); ?>">Last</a>
<p>

</div>
<div class="row">

<table border="0">
  <tr>
    <td><?php if ($pageNum_find_dealer_prospects > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, 0, $queryString_find_dealer_prospects); ?>">First</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_find_dealer_prospects > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, max(0, $pageNum_find_dealer_prospects - 1), $queryString_find_dealer_prospects); ?>">Previous</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_find_dealer_prospects < $totalPages_find_dealer_prospects) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, min($totalPages_find_dealer_prospects, $pageNum_find_dealer_prospects + 1), $queryString_find_dealer_prospects); ?>">Next</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_find_dealer_prospects < $totalPages_find_dealer_prospects) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_find_dealer_prospects=%d%s", $currentPage, $totalPages_find_dealer_prospects, $queryString_find_dealer_prospects); ?>">Last</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>

</div>

                    

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
    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

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