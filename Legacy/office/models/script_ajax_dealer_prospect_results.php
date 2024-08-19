<?php require_once('../db_admin.php'); ?>
<?php

if(!$_POST) exit();


//print_r($_POST);
$colname_find_dealer_prospects = "-1";
if (isset($_POST['prospect_states'], $_POST['prospect_cities'], $_POST['prospect_dlrtypes'], $_POST['prospect_dlr_assigndtome'])) {
	
	
		echo 'Made it passed Post';

		$prospect_states = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospect_states']));
		$prospect_cities = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospect_cities']));
		$prospect_dlrtypes = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospect_dlrtypes']));
		$prospect_dlr_assigndtome = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['prospect_dlr_assigndtome']));
		


		if($prospect_dlrtypes != ''){
			$prospect_dlrtypes_sql = " AND `dealer_type_id` = '$prospect_dlrtypes' ";
		}else{
			$prospect_dlrtypes_sql = "";
		}


		if($_POST['prospect_cities'] != ''){
	
		$prospect_dlrtypes_city_sql =  " AND `dealer_prospects`.`city` = '$prospect_cities' ";
		}else{
		$prospect_dlrtypes_city_sql =  "";
		}

		if($prospect_dlr_assigndtome  == 1){
			//$prospect_dlr_assigndtome_sql = " AND `dudes_id` = '$dudesid' OR `dudes2_id` = '$dudesid' ";
			$prospect_dlr_assigndtome_sql = " AND `dudes_id` = '$dudesid' OR `dudes2_id` = '$dudesid' AND `dealer_prospects`.`state` = '$prospect_states' ".$prospect_dlrtypes_city_sql.$prospect_dlrtypes_sql;
			//$prospect_dlr_assigndtome_sql = " AND `dudes_id` = '$dudesid'";
		}else{
			$prospect_dlr_assigndtome_sql = "";
		}


}
echo $query_find_dealer_prospects = "SELECT * 
FROM 
`idsids_tracking_idsvehicles`.`dealer_prospects`
LEFT JOIN `idsids_tracking_idsvehicles`.`dudes_states`
ON `dealer_prospects`.`state` = `dudes_states`.`state_abrv`
 WHERE 
 `dealer_prospects`.`state` = '$prospect_states' 
 $prospect_dlrtypes_city_sql
 $prospect_dlrtypes_sql
 $prospect_dlr_assigndtome_sql
 GROUP BY 
 	`dealer_prospects`.`id`
 
 ORDER BY `dealer_prospects`.`company` ASC
 ";
$find_dealer_prospects = mysqli_query($tracking_mysqli, $query_find_dealer_prospects);
$row_find_dealer_prospects = mysqli_fetch_array($find_dealer_prospects);
$totalRows_find_dealer_prospects = mysqli_num_rows($find_dealer_prospects);


echo '<br /> After SQL'

?>
<script src="js/custom/page/custom.ajax_dealer_prospect_results.js"></script>
<script src="js/custom/page/custom.inventory.prospectdlr.create.js"></script>






                <input type="text" class="form-control input-sm m-b-xs" id="filter"
                                   placeholder="Search in table">

                            <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="50" data-filter=#filter>
                                <thead>
                                <tr>
                                    <th data-hide="phone,tablet">Dealer ID</th>
                                    <th>Status</th>
                                    <th>Company Name</th>
                                    <th>City</th>
                                    <th data-hide="all">State</th>
                                    <th data-hide="all">Zip</th>
                                    <th data-hide="all">Website</th>
                                    <th data-hide="all">Email</th>
                                    <th data-hide="all">Phone</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
		<?php do { ?>
		  <tr>
		    <td><a id="<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger"  role="button"><?php echo  $row_find_dealer_prospects['id']; ?></a></td>
    <td><a id="<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger" role="button">
				<?php 
					$status =  $row_find_dealer_prospects['status'];
					if(!$status){ echo ''; }
					if($status == 0){ echo 'OFF'; }
					if($status == 1){ echo 'ON'; }
				?>
				</a>
            </td>
		    <td><a id="<?php echo  $row_find_dealer_prospects['id']; ?>" href="prospect.dealer.php?prospctdlrid=<?php echo  $row_find_dealer_prospects['id']; ?>" target="_parent" role="button"><?php echo  $row_find_dealer_prospects['company']; ?></a></td>
		    <td><a id="<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger" role="button"><?php echo  $row_find_dealer_prospects['city']; ?></a></td>
		    <td><a id="<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger" role="button"><?php echo  $row_find_dealer_prospects['state']; ?></a></td>
		    <td><a id="<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger" role="button"><?php echo  $row_find_dealer_prospects['zip']; ?></a></td>
		    <td>
            	<a id="<?php echo  $row_find_dealer_prospects['id']; ?>" href="http://<?php echo  $row_find_dealer_prospects['website']; ?>" target="_blank">
					<?php echo  $row_find_dealer_prospects['website']; ?>
            	</a>
            </td>
		    
		    <td><a id="<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger"><?php echo  $row_find_dealer_prospects['email']; ?></a></td>
		    <td><a  id="<?php echo  $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger"><?php echo  $row_find_dealer_prospects['phone']; ?></a></td>
<td>
<a id="<?php echo $row_find_dealer_prospects['id']; ?>" class="ajaxtrigger">
            		View/Open/Edit
            	</a>
            </td>
	      </tr>
  <?php } while ($row_find_dealer_prospects = mysqli_fetch_array($find_dealer_prospects)); ?>                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="10">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>



    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();

        });

    </script>
<?php include('end.phpmysql.php'); ?>