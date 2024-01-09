<?php
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_chats = "SELECT `dealer_chat`, `dealer_chat_display` FROM `idsids_idsdms`.`dealers`";
$dealer_chats = mysqli_query($idsconnection_mysqli, $query_dealer_chats);
$row_dealer_chats = mysqli_fetch_assoc($dealer_chats);
$totalRows_dealer_chats = mysqli_num_rows($dealer_chats);

mysqli_select_db($idschatconnection_mysqli, $database_idschatconnection);
$query_find_craftydealer = "SELECT * FROM `idsids_idschat`.`livehelp_users` WHERE `email` = '$dealer_email'";
$find_craftydealer = mysqli_query($idschatconnection_mysqli, $query_find_craftydealer);
$row_find_craftydealer = mysqli_fetch_assoc($find_craftydealer);
$totalRows_find_craftydealer = mysqli_num_rows($find_craftydealer);
$chat_user_id = $row_find_craftydealer['user_id'];

?>
<link href="css/custom.ids.chat.css" rel="stylesheet">
<div class="quick-slide hidden-xs">
      
      <?php if(!$chat_user_id): ?>
        
        	<?php include("_inc.chatwindow_off.php"); ?>
        
      <?php else: ?>
      
      
      		<?php include("_inc.chatwindow.php"); ?>
            
      <?php endif; ?>
</div>
<?php
mysqli_free_result($dealer_chats);

mysqli_free_result($find_craftydealer); 
?>

