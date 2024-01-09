<?php require_once("db_loggedin.php"); ?>
<?php
$colname_query_Salesperson = "-1";
if (isset($_GET['sid'])) {
  $colname_query_Salesperson = $_GET['sid'];
}
mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_query_Salesperson =  "SELECT * FROM `sales_person` WHERE `sales_person`.`salesperson_id` = '$colname_query_Salesperson' AND `sales_person`.`main_dealerid` = '$did' ";
$query_Salesperson = mysqli_query($idsconnection_mysqli, $query_query_Salesperson);
$row_query_Salesperson = mysqli_fetch_assoc($query_Salesperson);
$totalRows_query_Salesperson = mysqli_num_rows($query_Salesperson);
$salesperson_team_id = $row_query_Salesperson['team_id'];


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sales_person_appointments = "SELECT * FROM dealers_appointments, sales_person WHERE dealers_appointments.dlr_appt_sid = sales_person.salesperson_id AND sales_person.main_dealerid = '$did'";
$sales_person_appointments = mysqli_query($idsconnection_mysqli, $query_sales_person_appointments);
$row_sales_person_appointments = mysqli_fetch_assoc($sales_person_appointments);
$totalRows_sales_person_appointments = mysqli_num_rows($sales_person_appointments);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sales_team_appointments = "SELECT * FROM dealers_appointments, sales_person WHERE dealers_appointments.dlr_appt_sid = sales_person.salesperson_id AND sales_person.main_dealerid = '$did'";
$sales_team_appointments = mysqli_query($idsconnection_mysqli, $query_sales_team_appointments);
$row_sales_team_appointments = mysqli_fetch_assoc($sales_team_appointments);
$totalRows_sales_team_appointments = mysqli_num_rows($sales_team_appointments);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_dealer_teams = "SELECT * FROM dealers_teams WHERE dlr_team_did = '$did' ORDER BY dlr_team_id DESC";
$dealer_teams = mysqli_query($idsconnection_mysqli, $query_dealer_teams);
$row_dealer_teams = mysqli_fetch_assoc($dealer_teams);
$totalRows_dealer_teams = mysqli_num_rows($dealer_teams);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sales_person_photos = "
SELECT *
FROM `idsids_idsdms`.`sales_person_photos` 
WHERE  `sales_person_photos`.`sid_photo_sid` = '$sid' 
AND  `sales_person_photos`.`sid_photo_did` = '$did' 
ORDER BY `sales_person_photos`.`sid_photo_sort_orderno` ASC,  `sales_person_photos`.`sid_photo_created_at` DESC LIMIT 10";
$sales_person_photos = mysqli_query($idsconnection_mysqli, $query_sales_person_photos);
$row_sales_person_photos = mysqli_fetch_assoc($sales_person_photos);
$totalRows_sales_person_photos = mysqli_num_rows($sales_person_photos);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_distinct_sales_person_albums = "
SELECT DISTINCT 
`sales_person_photos`.`sid_photo_albumname`,
`sales_person_photos`.`sid_photo_albumcomments`,
`sales_person_photos`.`sid_photo_caption`,
`sales_person_photos`.`sid_photo_file_path`,
`sales_person_photos`.`sid_photo_thumb_fpath`
FROM `sales_person_photos` 
WHERE  `sales_person_photos`.`sid_photo_sid` = '$sid' 
AND  `sales_person_photos`.`sid_photo_did` = '$did' 
ORDER BY `sales_person_photos`.`sid_photo_sort_orderno` ASC,  `sales_person_photos`.`sid_photo_created_at` DESC
";
$distinct_sales_person_albums = mysqli_query($idsconnection_mysqli, $query_distinct_sales_person_albums);
$row_distinct_sales_person_albums = mysqli_fetch_assoc($distinct_sales_person_albums);
$totalRows_distinct_sales_person_albums = mysqli_num_rows($distinct_sales_person_albums);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sales_person_team = "
	SELECT 
	`sales_person`.`profile_image` AS `profile_image`,
	`sales_person`.`salesperson_id` AS `salesperson_id`,
	`dealers_teams`.`dlr_team_name`, 
	`dealers_teams`.`dlr_team_did`, 
	`dealers_teams`.`dlr_team_status`, 
	`dealers_teams`.`dlr_team_id`,
	`sales_person`.`team_id`, 
	`sales_person`.`acct_status`,
	`sales_person`.`salesperson_firstname`, 
	`sales_person`.`salesperson_lastname`,
	`sales_person`.`position_title`
	FROM  `idsids_idsdms`.`dealers_teams`, `idsids_idsdms`.`sales_person`
	WHERE  `dealers_teams`.`dlr_team_did` = '$did'
	AND `sales_person`.`team_id` = '$salesperson_team_id'
	AND `sales_person`.`salesperson_id` = '$sid'
	AND `sales_person`.`acct_status` = '1'
	AND `dealers_teams`.`dlr_team_status` = '1'
	ORDER BY `sales_person`.`salesperson_firstname` ASC
";
$sales_person_team = mysqli_query($idsconnection_mysqli, $query_sales_person_team);
$row_sales_person_team = mysqli_fetch_assoc($sales_person_team);
$totalRows_sales_person_team = mysqli_num_rows($sales_person_team);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_sales_person_team_albums = "
SELECT DISTINCT 
sid_photo_sid, sid_photo_albumname, sid_photo_file_path
FROM sales_person_photos, sales_person 
WHERE sales_person_photos.sid_photo_status = '1' 
AND sales_person_photos.sid_photo_did = '$did'  
AND sales_person.team_id = '$salesperson_team_id'
";
$sales_person_team_albums = mysqli_query($idsconnection_mysqli, $query_sales_person_team_albums);
$row_sales_person_team_albums = mysqli_fetch_assoc($sales_person_team_albums);
$totalRows_sales_person_team_albums = mysqli_num_rows($sales_person_team_albums);


mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_fetch_sales_person_news = "					
					SELECT 
					 dealers.id, dealers.company, sales_person.salesperson_firstname, sales_person.salesperson_lastname,
					 sales_person.salesperson_email, sales_person.salesperson_id AS salesperson_id, 
					 dealers_news.dlr_news_id, dealers_news.dlr_news_creatd_at,
					 COUNT(dealers_news.dlr_news_id) AS news,
					 
					 
					 dealers_news.dlr_news_body as body
					 FROM dealers
					 INNER JOIN sales_person
					 ON dealers.id = sales_person.main_dealerid
					 LEFT JOIN dealers_news
					 ON dealers.id = dealers_news.dlr_news_did
					 GROUP BY dealers_news.dlr_news_id
					 ORDER BY dealers_news.dlr_news_id ASC
";
$fetch_sales_person_news = mysqli_query($idsconnection_mysqli, $query_fetch_sales_person_news);
$row_fetch_sales_person_news = mysqli_fetch_assoc($fetch_sales_person_news);
$totalRows_fetch_sales_person_news = mysqli_num_rows($fetch_sales_person_news);

mysqli_select_db($idsconnection_mysqli, $database_idsconnection);
$query_pull_dealer_news = "
	SELECT 
dealers_news.dlr_news_id, dealers_news.dlr_news_did, dealers_news.dlr_news_team_id, 
dealers_news.dlr_news_status, dealers_news.dlr_news_email, dealers_news.dlr_news_body, 
dealers_news.dlr_news_created_at_milli, dealers_news.dlr_news_creatd_at,
	(select count(*) 
				  	FROM dealers_news_response 
					WHERE dealers_news_response.dlr_news_response_news_id = dealers_news.dlr_news_id 
	) AS NewsChildCount
	FROM dealers_news 
	ORDER BY dealers_news.dlr_news_id DESC


";
$pull_dealer_news = mysqli_query($idsconnection_mysqli, $query_pull_dealer_news);
$row_pull_dealer_news = mysqli_fetch_assoc($pull_dealer_news);
$totalRows_pull_dealer_news = mysqli_num_rows($pull_dealer_news);

?>
<?php

$salesperson_id = $row_query_Salesperson['salesperson_id'];
if(!$salesperson_id){ header('Location: salespeople.php'); }




?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | Sales Person <?php echo $row_query_Salesperson['salesperson_firstname']; ?> <?php echo $row_query_Salesperson['salesperson_lastname']; ?></title>

<?php include("inc.head.php"); ?>

	<!-- Camera Css Devices Maybe -->
	<link rel="stylesheet" href="css/camera.css">

    <link href="css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
    
	<!-- Fancy Box Css -->
    <link href="js/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <?php include("_sidebar.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        
        
        <?php include("_nav_top.php"); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Sales Person <?php echo $row_query_Salesperson['salesperson_firstname']; ?> <?php echo $row_query_Salesperson['salesperson_lastname']; ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="salespeople.php">Sales People</a>
                        </li>
                        <li>
                            <a href="team.php?dlr_team_id=<?php echo $row_query_Salesperson['team_id']; ?>">Sales Team</a>
                        </li>
                        <li class="active">
                            <a href="salesperson.php?sid=<?php echo $salesperson_id; ?>"><strong>Sales Person "<?php echo $row_query_Salesperson['salesperson_firstname']; ?> <?php echo $row_query_Salesperson['salesperson_lastname']; ?>"</strong></a>
                        </li>

                        
                        <li>
                            <a href="salesperson.edit.php?sid=<?php echo $salesperson_id; ?>">Update <?php echo $row_query_Salesperson['salesperson_firstname']; ?> <?php echo $row_query_Salesperson['salesperson_lastname']; ?></a>
                        </li>
                    </ol>
    </div>
</div>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-12">
        <div class="title-action">
            <a class="btn btn-warning btn-lg">Sales Person</a>                    
            <a href="salesperson.add.php" class="btn btn-primary btn-lg">Add A Sales Person</a>
        </div>
    </div>
</div>
        




        

        <?php include("content/body.salesperson.upload.php"); ?>






















<!-- Begin Header -->        
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">


<?php if($totalRows_sales_person_photos != 0): ?>
<!-- Start Big Carsousel Header -->

                            <div class="carousel slide" id="carousel2">
                                <ol class="carousel-indicators">
                                    <?php

$count_salespersonphotos = 0;
$sales_person_photos = mysqli_query($idsconnection_mysqli, $query_sales_person_photos);
$row_sales_person_photos = mysqli_fetch_assoc($sales_person_photos);
									
									?>
                                    <?php do{ ?>
                                    <li data-slide-to="<?php echo $count_salespersonphotos; //0 ?>" data-target="#carousel2"  class="<?php if($count_salespersonphotos == 0){ echo 'active'; } ?>"></li>
                                    
									<?php $count_salespersonphotos++; ?>
                                    
                           			<?php } while ($row_sales_person_photos = mysqli_fetch_assoc($sales_person_photos)); ?>
                                                                        
                                </ol>
                                <div class="carousel-inner">
                                        <?php 
$count_salespersonphotos_again = 0;
$sales_person_photos = mysqli_query($idsconnection_mysqli, $query_sales_person_photos);
$row_sales_person_photos = mysqli_fetch_assoc($sales_person_photos);

										do{ 
										?>
                                
                                    <div class="item <?php if($count_salespersonphotos_again == 0){ echo 'active'; } ?>">
                                        <img alt="image"  class="img-responsive" src="<?php echo $row_sales_person_photos['sid_photo_file_path']; ?>">
                                        <div class="carousel-caption">
                                            <p><?php echo $row_sales_person_photos['sid_photo_albumcomments']; ?></p>
                                        </div>
                                    </div>
<?php $count_salespersonphotos_again++; } while ($row_sales_person_photos = mysqli_fetch_assoc($sales_person_photos)); ?>   
                                 
                                </div>
                                <a data-slide="prev" href="#carousel2" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel2" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div>

<!-- End Big Carsousel -->
<?php endif; ?>                
                
                
                <div class="hr-line-dashed"></div>
                
                    <h2>Sales Person</h2>
                    
                    
                    
                </div>
            </div>        
        
<!-- End Header -->
        
        
<div class="row">
        
            <!-- Start First Tower -->
            <div class="col-lg-10">
			<?php include("inc.salesperson.body.left-tower.php"); ?>
            </div>
            <!-- End First Tower -->
            
            
            
            
            <div class="col-lg-2">
            
			
			<?php include("inc.salesperson.body.right-tower.php"); ?>
            
            </div>
            <!-- End Of Second Tower -->
        
        





        
        
        </div><!-- End Main  View -->
        
        
        
        
		<?php include("footer.php"); ?>

        </div>
        </div>
    </div>

    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

    <script>
        $(document).ready(function(){

            $('#loading-example-btn').click(function () {
                btn = $(this);
                simpleLoad(btn, true)

                // Ajax example
//                $.ajax().always(function () {
//                    simpleLoad($(this), false)
//                });

                simpleLoad(btn, false)
            });
        });

        function simpleLoad(btn, state) {
            if (state) {
                btn.children().addClass('fa-spin');
                btn.contents().last().replaceWith(" Loading");
            } else {
                setTimeout(function () {
                    btn.children().removeClass('fa-spin');
                    btn.contents().last().replaceWith(" Refresh");
                }, 2000);
            }
        }
    </script>

    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>
    
	<!--script src="js/customdropzone.upload.js" language="javascript"></script -->
	<!-- script src="js/custom/page/custom.salesperson.js" language="javascript"></script -->
	<script src="js/custom/page/custom.upload.salesperson.js" language="javascript"></script>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker99').datetimepicker({
					
					
					format: 'YYYY-MM-DD HH:mm:ss a'
					
				});


              $('#datetimepicker99').data('DateTimePicker').format('YYYY-MM-DD HH:mm').minDate(moment()).defaultDate(moment());




            });
        </script>

    <!-- Fancy box -->
    <script src="js/plugins/fancybox/jquery.fancybox.js"></script>



    <script src="js/wysiwyg.salesperson.js"></script>

    
    

</body>

</html>
<?php include("inc.end.phpmsyql.php"); ?>
<?php
mysqli_free_result($query_Salesperson);

mysqli_free_result($sales_person_appointments);

mysqli_free_result($sales_team_appointments);

mysqli_free_result($dealer_teams);


mysqli_free_result($sales_person_photos);

mysqli_free_result($distinct_sales_person_albums);


mysqli_free_result($sales_person_team);

mysqli_free_result($sales_person_team_albums);
?>