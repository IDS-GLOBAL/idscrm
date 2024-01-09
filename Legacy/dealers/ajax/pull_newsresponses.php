<?php include("db.php"); ?>
<?php


$colname_fetch_dealer_news_responses = "-1";
if (isset($_GET['news_id'])) {
  $colname_fetch_dealer_news_responses = $_GET['news_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fetch_dealer_news_responses =  "SELECT * FROM `idsids_idsdms`.`dealers_news_response` WHERE `dealers_news_response`.`dlr_news_response_news_id` = '$colname_fetch_dealer_news_responses' ORDER BY `dealers_news_response`.`dlr_news_response_created_at` ASC";
$fetch_dealer_news_responses = mysqli_query($idsconnection_mysqli, $query_fetch_dealer_news_responses);
$row_fetch_dealer_news_responses = mysqli_fetch_assoc($fetch_dealer_news_responses);
$totalRows_fetch_dealer_news_responses = mysqli_num_rows($fetch_dealer_news_responses);


?>
<script type="text/javascript" src="js/custom/ajax_reloadresponses.js"></script>
            
            <div>
            	<div>
<?php if($totalRows_fetch_dealer_news_responses != 0): ?>
                                <div class="chat-discussion">

<?php do { ?>
                                    <div class="chat-message">
                                        
						<?php if($row_fetch_dealer_news_responses['dlr_news_response_profile_pic']){ ?>
                        
<img class="message-avatar" src="<?php echo $row_fetch_dealer_news_responses['dlr_news_response_profile_pic']; ?>" >

                         
                        <?php }else{  ?>
						
<img class="message-avatar" src="img/a2.jpg" width="48px" alt="" >
						
						<?php } ?>


                                        
                                        
                                        
                                        
                                        <div class="message">
                                            <a class="message-author" href="#"><?php echo $row_fetch_dealer_news_responses['dlr_news_response_name']; ?> </a>
                                            <span class="message-date">  <?php echo $row_fetch_dealer_news_responses['dlr_news_response_created_at']; ?> </span>
                                            <span class="message-content">
												<?php echo $row_fetch_dealer_news_responses['dlr_news_response_body']; ?>
                                            </span>
                                            
                                       </div>
                                       
                                       
                                       
                                  </div>
     <?php } while ($row_fetch_dealer_news_responses = mysqli_fetch_assoc($fetch_dealer_news_responses)); ?>
                                   

                                </div>
            
<?php endif; ?>
				</div>
			</div>

<div class="mail-box-header">
                
</div>
