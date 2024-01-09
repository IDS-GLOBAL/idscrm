<?php
mysqli_select_db($tracking_mysqli, $database_tracking);
$query_pullscript_options = "SELECT * FROM `idsids_tracking_idsvehicles`.`dudes_salespitch` WHERE `dudes_salespitch_status` = '1'";
$pullscript_options = mysqli_query($tracking_mysqli, $query_pullscript_options);
$row_pullscript_options = mysqli_fetch_array($pullscript_options);
$totalRows_pullscript_options = mysqli_num_rows($pullscript_options);
?>
<!-- START Pitch Modal -->
<div class="modal inmodal" id="pitchProspectDlrModal" tabindex="-1" role="dialog" aria-hidden="true">



<div class="modal-dialog">
	<div class="modal-content animated flipInY">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title">Script View</h4>
<select name="dudes_script_options" id="dudes_script_options" class="form-control">
    <?php
do {  
?>
    <option value="<?php echo $row_pullscript_options['dudes_salespitch_id']?>"<?php if (!(strcmp($row_pullscript_options['dudes_salespitch_id'], 99))) {echo "selected=\"selected\"";} ?>>
	<?php echo $row_pullscript_options['dudes_salespitch_name']?>
	</option>
    <?php
} while ($row_pullscript_options = mysqli_fetch_array($pullscript_options));
  $rows = mysqli_num_rows($pullscript_options);
  if($rows > 0) {
      mysqli_data_seek($pullscript_options, 0);
	  $row_pullscript_options = mysqli_fetch_array($pullscript_options);
  }
?>
  </select>
  

		</div>
		<div id="script_ajax_modal_results" class="modal-body">
			<p><strong>Choose The Drop Down Below To Populate Your Script To Read.</strong></p>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Close This Window</button>
		</div>
	</div>
</div>



</div>

<!-- END Pitch Modal -->