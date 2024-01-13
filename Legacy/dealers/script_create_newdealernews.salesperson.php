<?php

include("db_loggedin.php");

//print_r($_POST);

if(isset($_POST['thisdid'], $_POST['post_msg'], $_POST['salesperson_id'])){


	$salesperson_id = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['salesperson_id']));
	$post_msg = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['post_msg']));
	$thisdid = mysqli_real_escape_string($idsconnection_mysqli, trim($_POST['thisdid']));
	$dlr_news_profile_pic = 'img/logo.png';
	
	$create_new_dealer_response = "INSERT INTO `idsids_idsdms`.`dealers_news` SET
										`dlr_news_token` = '$tkey',
										`dlr_news_name` = 'Dealer Account',
										`dlr_news_sid` = '$salesperson_id',
										`dlr_news_did` = '$did',
										`dlr_news_body` = '$post_msg',
										`dlr_news_profile_pic` = '$dlr_news_profile_pic'
									";
									
$run_create_new_dealer_responsestring = mysqli_query($idsconnection_mysqli, $create_new_dealer_response);

}




?>
<?php


$colname_fetch_last_sales_person_post = "-1";
if (isset($_GET['salesperson_id'])) {
  $colname_fetch_last_sales_person_post = $_GET['salesperson_id'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fetch_last_sales_person_post =  sprintf("SELECT * FROM dealers_news WHERE dealers_news.dlr_news_sid = '$salesperson_id' AND dealers_news.dlr_news_did = '$did' ORDER BY dealers_news.dlr_news_id DESC LIMIT 1", GetSQLValueString($colname_fetch_last_sales_person_post, "int"));
$fetch_last_sales_person_post = mysqli_query($idsconnection_mysqli, $query_fetch_last_sales_person_post);
$row_fetch_last_sales_person_post = mysqli_fetch_assoc($fetch_last_sales_person_post);
$totalRows_fetch_last_sales_person_post = mysqli_num_rows($fetch_last_sales_person_post);


?>

<?php if(isset($_GET['loadjs'])): ?>

<?php if($_GET['loadjs'] == 'true'){ ?>
<script type="text/javascript" src="js/custom/ajax_reloadlastnewsresponses.js"></script>
<?php } ?>

<?php endif; ?>



  <?php do { ?>
<!-- Start Wall Post -->
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Last User Post <small></small></h5>
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
                    <div class="ibox-content">



<div id="news_id_<?php echo $row_fetch_last_sales_person_post['dlr_news_id']; ?>" class="news_body">
<img alt="image" class="img-circle" src="img/logo.png" width="72px">

        <div class="well">
            <?php echo $row_fetch_last_sales_person_post['dlr_news_body']; ?>
            <?php //print_r($row_fetch_last_sales_person_post); ?>
        </div>
        <div class="actions">
            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
            <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
        </div>
</div>




	<div id="responses">
    <a id="<?php echo $row_fetch_last_sales_person_post['dlr_news_id']; ?>" class="pull_lastnews_response">0 Responses</a>
    
                    <div class="btn-group pull-right">
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>
                    </div>
						<div class="clearfix"></div>
    </div>
    
    
    <div id="load_last_<?php echo $row_fetch_last_sales_person_post['dlr_news_id']; ?>"></div>
    

<div>
    <div class="input-group m-b">
        <span class="input-group-addon">
        <img alt="image" class="img-circle" src="img/logo.png" width="32px">
        </span> 
    <textarea id="<?php echo $row_fetch_last_sales_person_post['dlr_news_id']; ?>" class="form-control post-response-msg" name="message" placeholder="Make A Response"></textarea>
    </div>




                    <div class="btn-group pull-left">
                    <button id="post-last-response" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-envelope-o"></i> Post</button>

                    </div>
                    

                    

</div>
<div class="clearfix"></div>

                    </div>
                </div>
<!-- End Wall Post -->            
    <?php } while ($row_fetch_last_sales_person_post = mysqli_fetch_assoc($fetch_last_sales_person_post)); ?>
