<?php require_once('db.php');  ?>
<?php




$markTheseVehicles = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['markTheseVehicles']));

if(!$markTheseVehicles){return false;}


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_compareVehicles = "SELECT vthubmnail_file, did, vid  FROM  `idsids_idsdms`.`vehicles` WHERE vehicles.`vid` IN ($markTheseVehicles)";
//echo $query_compareVehicles;
$compareVehicles = mysqli_query($idsconnection_mysqli, $query_compareVehicles);
$row_compareVehicles = mysqli_fetch_assoc($compareVehicles);
$totalRows_compareVehicles = mysqli_num_rows($compareVehicles);

if (isset($_POST['markTheseVehicles']) ){


	do {
	
	$thisvid = $row_compareVehicles['vid'];
	
	echo $UPDATE_VEHICLE_SQL = "UPDATE `idsids_idsdms`.`vehicles` SET `vlivestatus` = '1' WHERE `vehicles`.`vid` = '$thisvid'";
	$UPDATE_VEHICLE_LiveVehicles = mysqli_query($idsconnection_mysqli, $UPDATE_VEHICLE_SQL);
	//$row_UPDATE_VEHICLE_LiveVehicles = mysqli_fetch_assoc($UPDATE_VEHICLE_LiveVehicles);
	//$totalRows_UPDATE_VEHICLE_LiveVehicles = mysqli_num_rows($UPDATE_VEHICLE_LiveVehicles);
	
		
		
	} while ($row_compareVehicles = mysqli_fetch_assoc($compareVehicles));



}


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_LiveVehicles = "SELECT * FROM  `idsids_idsdms`.`vehicles` WHERE `vehicles`.`did` = '$did' AND `vehicles`.`vlivestatus` = '1' ORDER BY `vehicles`.`created_at` DESC ";
$LiveVehicles = mysqli_query($idsconnection_mysqli, $query_LiveVehicles);
$row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles);
$totalRows_LiveVehicles = mysqli_num_rows($LiveVehicles);

?>


<script type='text/javascript' src="js/idsinventory_markstatus.js"></script>


<script type="text/javascript" src="js/tablesorter.js"></script>
<script type="text/javascript" src="js/tablesorter-pager.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	/* Table Sorter */
	$("#sort-table")
	.tablesorter({
		widgets: ['zebra'],
		headers: { 
		            // assign the secound column (we start counting zero) 
		            0: { 
		                // disable it by setting the property sorter to false 
		                sorter: false 
		            }, 
		            // assign the third column (we start counting zero) 
		            6: { 
		                // disable it by setting the property sorter to false 
		                sorter: false 
		            } 
		        } 
	})
	
	.tablesorterPager({container: $("#pager")}); 

	$(".header").append('<span class="ui-icon ui-icon-carat-2-n-s"></span>');

	
});

 	/* Check all table rows */

var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
return "check_all"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
return "check_none"; }
}


</script>






<script type='text/javascript' src='javawindow/scripts/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='javawindow/scripts/jquery.dataTables.columnFilter.js'></script>
<script type='text/javascript' src='javawindow/scripts/jquery.dataTables.pagination.js'></script>

<link type='text/css' href='javawindow/css/demo_table_jui.css' rel='stylesheet'/>

<style type="text/css">
	#dataTable {padding: 0;margin:0;width:100%;}
	#dataTable_wrapper{width:100%;}
	#dataTable_wrapper th {cursor:pointer} 
	#dataTable_wrapper tr.odd {color:#000000; background-color:#3399cc}
	#dataTable_wrapper tr.odd:hover {color:#ffffff; background-color:#ffcc33}
	#dataTable_wrapper tr.odd td.sorting_1 {color:#000000; background-color:#ffffff}
	#dataTable_wrapper tr.odd:hover td.sorting_1 {color:#000000; background-color:#3399ff}
	#dataTable_wrapper tr.even {color:#000000; background-color:#fcb040}
	#dataTable_wrapper tr.even:hover, tr.even td.highlighted{color:#eeeeee; background-color:#ffcc33}
	#dataTable_wrapper tr.even td.sorting_1 {color:#000000; background-color:#9e9e9e}
	#dataTable_wrapper tr.even:hover td.sorting_1 {color:#ffffff; background-color:#ffcc33}
</style>
<script type="text/javascript">
$(document).ready(function() {
	oTable = $('#dataTable').dataTable({
		"bJQueryUI": true,
		"bScrollCollapse": false,
		"sScrollY": "100%",
		"bAutoWidth": true,
		"bPaginate": true,
		"sPaginationType": "full_numbers", //full_numbers,two_button
		"bStateSave": true,
		"bInfo": true,
		"bFilter": true,
		"iDisplayLength": 25,
		"bLengthChange": true,
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
	});
} );
</script>



<div id="live_inventory">
                    <form name="myform" class="pager-form" method="post" action="">
<table cellpadding="0" cellspacing="0" border="0" id="dataTable">
						<thead> 
						<tr>
							<th><input type="checkbox" value="check_none" onClick="this.value=check(this.form.list)" class="submit"/></th>
							<th title="Vehicle Thumbnail">Photos</th>
							<th>Type</th>
							<th>Stock No.</th>
						    <th>Year</th> 
						    <th>Make</th>
						    <th>Model</th> 
						    <th>VIN Number</th> 
						    <th>Cost</th>
						    <th>Down Pymt</th>
						    <th>Retail Price</th> 
						    <th>Live Preview</th>
							<th style="width:128px">Vehicle Options</th> 
						</tr> 
						</thead> 
						
                        <tbody> 
						
                        
                        
                        
                        <?php do { ?>
                            
							<?php if ($totalRows_LiveVehicles > 0) { // Show if recordset not empty ?>
                            
								
                                <tr>
    <td class="center">
    	<input type="checkbox" value="<?php echo $row_LiveVehicles['vid']; ?>" name="list" class="checkbox"/>
    </td>
    
    <td>
 
     <div align="center">

<a href="inventory-video-upload.php?vid=<?php echo $row_LiveVehicles['vid']; ?>" />

<?php
		$video = $row_LiveVehicles['video_on_off_status'];
	
		$vicon = "http://idscrm.com/images/icons/vyoutube-video.png";
		
		$vyoutube = "<img src='$vicon' />";

		if($video == 1){echo "<img src='http://idscrm.com/images/icons/vyoutube-video.png' /><br />";}

		else {echo "";}

?>   
</a>
     
<a class="btn_no_text btn ui-state-default ui-corner-all tooltip" href="vehicle-photo-gallery.php?vid=<?php echo $row_LiveVehicles['vid']; ?>" >
	
    <?php

		$pic = $row_LiveVehicles['vthubmnail_file_path'];
	    $titlea = "title='Photo Available'";
	    $titleu = "title='Photo Un-Available'";		
		
		if ($pic == NULL){
		echo "<span $titleu class='ui-icon ui-icon-image'></span>";
		}
		
		else {
		echo "<img $titlea src='$pic' width='80px'>";
		}

	?>

       </a>
	 </div>
    </td>
    <td><?php echo $row_LiveVehicles['vcondition']; ?></td>
    <td><?php echo $row_LiveVehicles['vstockno']; ?></td> 
    <td title="Vehicle Added On: <?php echo $row_LiveVehicles['created_at']; ?>">
      <?php echo $row_LiveVehicles['vyear']; ?>
    </td> 
    <td><?php echo $row_LiveVehicles['vmake']; ?></td>
    <td title="Exterior: <?php echo $row_LiveVehicles['vecolor_txt']; ?> &nbsp;&amp;&nbsp; Interior: <?php echo $row_LiveVehicles['vicolor_txt']; ?>"><?php echo $row_LiveVehicles['vmodel']; ?></td> 
    <td><a href="#" title="test"><?php echo $row_LiveVehicles['vvin']; ?></a></td> 
    <td>$<?php echo $row_LiveVehicles['vpurchasecost']; ?></td>
    <td>$<?php echo $row_LiveVehicles['vdprice']; ?></td>
    <td>$<?php echo $row_LiveVehicles['vrprice']; ?></td> 
    <td>
      <a href="preview/inventory-details.php?vid=<?php echo $row_LiveVehicles['vid']; ?>" target="_blank">
        Preview LIVE!
        </a>
    </td> 
    <td>
      <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit this vehicle" href="inventory-edit.php?vid=<?php echo $row_LiveVehicles['vid']; ?>">
        <span class="ui-icon ui-icon-pencil"></span>
        </a>
      <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Craiglist Market This Vehicle" href="marketing-craigslist-vcode.php?vid=<?php echo $row_LiveVehicles['vid']; ?>">
        <span class="ui-icon ui-icon-transferthick-e-w"></span>
        </a>       
        
      <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Work A Deal On This Vehicle" href="sales-desk.php?vehicle=<?php echo $row_LiveVehicles['vid']; ?>">
        <span class="ui-icon ui-icon-tag"></span>
        </a>       
        
	  <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Vehicle Video" href="inventory-video-upload.php?vid=<?php echo $row_LiveVehicles['vid']; ?>">
        <span class="ui-icon ui-icon-video"></span>
        </a>
    </td>
  </tr>


							<?php } // Show if recordset not empty ?>
					
					<?php } while ($row_LiveVehicles = mysqli_fetch_assoc($LiveVehicles)); ?>
                    
                   <?php if ($totalRows_LiveVehicles == 0) { // Show if recordset empty ?>
  <tr>
    <td class="center"><input type="checkbox" value="1" name="list" class="checkbox"/></td>
    <td>No Photo</t8d>
    <td>Used Or New Uknown</td>
    <td>Stock No Unknown</td> 
    <td>Year Unknown</td> 
    <td>Make Unknown</td>
    <td>Model Uknown</td> 
    <td>No Vin Input</td> 
    <td>No Cost To Add up</td>
    <td>Unknown</td>
    <td>Unknown</td> 
    <td>Not Available</td> 
    <td>
      <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Edit This vehicle Not Working" href="#">
        <span class="ui-icon ui-icon-pencil"></span>
        </a>
      <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Work A Deal Not Working" href="#">
        <span class="ui-icon ui-icon-print"></span>
        </a>
      <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Enhance This Vehicle Not Working" href="#">
        <span class="ui-icon ui-icon-wrench"></span>
        </a>
	  <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Vehicle Video" href="">
        <span class="ui-icon ui-icon-video"></span>
        </a>
    </td>
  </tr>
  					<?php } // Show if recordset empty ?>
						
						</tbody>
						</table>
                        <br  />
						
<!-- Start Paging Inventory Main View -->                        
                          
<!-- End Paging Inventory Main View -->					
                    
                    </form>
                   </div>



<?php
mysqli_free_result($LiveVehicles);
?>