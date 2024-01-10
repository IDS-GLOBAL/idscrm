<?php require_once('db_admin.php'); ?>
<?php 
$query_searchfordealer = "SELECT * FROM `idsids_tracking_idsvehicles`.`dealer_prospects` ORDER BY `dealer_prospects`.`company` ASC";
$searchfordealer = mysqli_query($tracking_mysqli, $query_searchfordealer);
$row_searchfordealer = mysqli_fetch_array($searchfordealer);
$totalRows_searchfordealer = mysqli_num_rows($searchfordealer);

$colname_prspct_dealer_names = "-1";
if (isset($_POST['state'], $_POST['company'], $_POST['company_legalname'])) {
  
  $prspct_company = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company']));
  $prspct_company_legalname =mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['company_legalname']));
  $prspct_state =  mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['state']));
  
  
}

// Removed temporary I wanna see all the dealers regardless of state.
// concat(`company`,`company_legalname`) LIKE '%$prspct_company%' AND `dealer_prospects`.`state` = '$prspct_state'
$query_prspct_dealer_names = "
SELECT * 
	FROM 
`idsids_tracking_idsvehicles`.`dealer_prospects` 
WHERE
concat(`company`,`company_legalname`) LIKE '%$prspct_company%' 
ORDER BY `dealer_prospects`.`company` ASC";
$prspct_dealer_names = mysqli_query($tracking_mysqli, $query_prspct_dealer_names);
$row_prspct_dealer_names = mysqli_fetch_array($prspct_dealer_names);
$totalRows_prspct_dealer_names = mysqli_num_rows($prspct_dealer_names);
$dlr_prspct_id = $row_prspct_dealer_names['id'];








?>

<script type="text/javascript">
	$('input#howmanyresults').val('<?php echo $totalRows_prspct_dealer_names; ?>');
	$('input#madeprospect_id').val('<?php echo $dlr_prspct_id; ?>');
	$('input#howmanydefinets').val('<?php echo $totalRows_prspct_dealer_names; ?>');
</script>

<h2>Results Found: <?php echo $totalRows_prspct_dealer_names; ?></h2>

<table class="prospectfootable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                <thead>
                                <tr>

                                    <th data-toggle="true">Product Name</th>
                                    <th>ProspectId</th>
                                    <th>Legal Name</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Status</th>
                                    <th class="text-right" data-sort-ignore="true">Action</th>

                                </tr>
                                </thead>
                                <tbody>
<?php do{ ?>


                                <tr>
                                    <td>
                                      <?php echo $row_prspct_dealer_names['company']; ?>
                              </td>
                                    <td>
                                        <?php echo $row_prspct_dealer_names['id']; ?>
                              </td>
                                    <td>
										<?php echo $row_prspct_dealer_names['company_legalname']; ?>
                              </td>
                                    <td>
                                        <?php echo $row_prspct_dealer_names['state']; ?>
                              </td>
                                    <td>
                                       <?php echo $row_prspct_dealer_names['zip']; ?>
                              </td>
                                    <td>
<?php if($row_prspct_dealer_names['dudes_id']) { ?>
                                    
                                        <span class="label label-primary">#1 Rep ID: <?php echo $row_prspct_dealer_names['dudes_id']; ?> Enabled</span><br /><br />


<?php } ?>
<?php if($row_prspct_dealer_names['dudes2_id']) { ?>

                                        <span class="label label-primary">#2 Rep ID: <?php echo $row_prspct_dealer_names['dudes2_id']; ?> Enabled</span>

<?php } ?>
                                    
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <a id="" href="prospect.dealer.php?prospctdlrid=<?php echo $row_prspct_dealer_names['id']; ?>" class="btn-white btn btn-xs">View</a>
                                            <a id="<?php echo $row_prspct_dealer_names['id']; ?>" class="btn-white btn btn-xs" href="prospect.dealer.php?prospctdlrid=<?php echo $row_prspct_dealer_names['id']; ?>">Edit</a>
                                        </div>
                                    </td>
                                </tr>
        <?php } while ($row_prspct_dealer_names = mysqli_fetch_array($prspct_dealer_names)); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <ul class="pagination pull-right"></ul>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

<script>
        $(document).ready(function() {

            $('.prospectfootable').footable();

        });

    </script>
                            <?php
mysqli_free_result($searchfordealer);
?>
