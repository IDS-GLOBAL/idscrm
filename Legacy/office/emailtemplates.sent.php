<?php require_once('db_admin.php'); ?>
<?php

mysqli_select_db($tracking_mysqli, $database_tracking);
$query_emailstoprospects = "SELECT * FROM `idsids_tracking_idsvehicles`.`emails_senthtml_prospectdlrs` ORDER BY `senthtml_prospect_created_at` DESC";
$emailstoprospects = mysqli_query($tracking_mysqli, $query_emailstoprospects);
$row_emailstoprospects = mysqli_fetch_array($emailstoprospects);
$totalRows_emailstoprospects = mysqli_num_rows($emailstoprospects);



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

 <?php include("inc.head.php"); ?>
 
    <link href="css/plugins/codemirror/codemirror.css" rel="stylesheet">
    <link href="css/plugins/codemirror/ambiance.css" rel="stylesheet">

</head>

<body class="fixed-sidebar no-skin-config full-height-layout">

    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Emails Sent</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Sent Emails</a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div><!-- End row wrapper border-bottom white-bg page-heading -->
        
        
<div class="fh-breadcrumb">

                <div class="fh-column">
                    <div class="full-height-scroll">
                        <ul class="list-group elements-list">
                            <li class="list-group-item active">
                                <a data-toggle="tab" href="#tab-robot">
                                    <small class="pull-right text-muted"> <?php echo date('m'); ?>.<?php echo date('d'); ?>.<?php echo date('Y'); ?> ></small>
                                    <strong>IDS Robot</strong>
                                    <div class="small m-t-xs">
                                        <p class="m-b-xs">
                                            Below are the emails I have sent to you on your behalf.
                                            <br/>
                                        </p>
                                        <p class="m-b-none">

                                            <span class="label pull-right label-primary">SPECIAL</span>
                                            <i class="fa fa-map-marker"></i> California 10F/32
                                        </p>
                                    </div>
                                </a>
                            </li>
                            
                            
                            

<?php do { ?>
  
                            
                            <li class="list-group-item">
                                <a data-toggle="tab" href="#tab-<?php echo $row_emailstoprospects['senthtml_prospect_id']; ?>">
                                    <small class="pull-right text-muted"><?php echo $row_emailstoprospects['senthtml_prospect_created_at']; ?></small>
                                    <strong><?php  echo $row_emailstoprospects['senthtml_prospect_email_from']; ?></strong>
                                    <div class="small m-t-xs">
                                        <p class="m-b-xs">
                                            <?php echo $row_emailstoprospects['senthtml_prospect_email_subject_post']; ?>
                                        </p>
                                        <p class="m-b-none">
                                        
                                        <?php if($row_emailstoprospects['senthtml_prospect_dudesid'] == $dudesid){ ?>
                                        <span class="label pull-right label-primary">From Me</span>
                                        <?php } ?>
                                        
                                            <i class="fa fa-map-marker"></i> <?php  echo $row_emailstoprospects['senthtml_prospect_email_to']; ?>
                                        </p>
                                    </div>
                                </a>
                            </li>



<?php } while ($row_emailstoprospects = mysqli_fetch_array($emailstoprospects)); 
  $totalRows_emailstoprospects = mysqli_num_rows($emailstoprospects);
  if($totalRows_emailstoprospects > 0) {
      mysqli_data_seek($emailstoprospects, 0);
	  $row_emailstoprospects = mysqli_fetch_array($emailstoprospects);
  }

?>

                        </ul>

                    </div>
                </div>

                <div class="full-height">
                    <div class="full-height-scroll white-bg border-left">

                        <div class="element-detail-box">

                            <div class="tab-content">
                                <div id="tab-robot" class="tab-pane">

                                    <div class="pull-right">
                                        <div class="tooltip-demo">
                                            <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="left" title="Plug this message"><i class="fa fa-plug"></i> Plug it</button>
                                            <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                                            <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                                            <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>

                                        </div>
                                    </div>
                                    <div class="small text-muted">
                                        <i class="fa fa-clock-o"></i> Friday, 12 April 2014, 12:32 am
                                    </div>

                                    <h1>
                                         Below are the emails I have sent to you on your behalf.
                                    </h1>

                                    <p>
                                    	One of the best things you can have me do is email your prospects.
                                    </p>
                                    <p class="small">
                                        <strong>Best regards, IDS ROBOT </strong>
                                    </p>

                                    <div class="m-t-lg">
                                        <p>
                                            <span><i class="fa fa-paperclip"></i> 2 attachments - </span>
                                            <a href="#">Download all</a>
                                            |
                                            <a href="#">View all images</a>
                                        </p>

                                        <div class="attachment">
                                            <div class="file-box">
                                                <div class="file">
                                                    <a href="#">
                                                        <span class="corner"></span>

                                                        <div class="icon">
                                                            <i class="fa fa-file"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            Document_2014.doc
                                                            <br>
                                                            <small>Added: Jan 11, 2014</small>
                                                        </div>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="file-box">
                                                <div class="file">
                                                    <a href="#">
                                                        <span class="corner"></span>

                                                        <div class="icon">
                                                            <i class="fa fa-line-chart"></i>
                                                        </div>
                                                        <div class="file-name">
                                                            Seels_2015.xls
                                                            <br>
                                                            <small>Added: May 13, 2015</small>
                                                        </div>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>

                                </div>

                                
                                
                            
                            
<?php do { ?>
                            
                                
                                <div id="tab-<?php echo $row_emailstoprospects['senthtml_prospect_id']; ?>" class="tab-pane">
                                    <div class="pull-right">
                                        <div class="tooltip-demo">
                                            <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="left" title="Plug this message"><i class="fa fa-plug"></i> Plug it</button>
                                            <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="Mark as read"><i class="fa fa-eye"></i> </button>
                                            <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important"><i class="fa fa-exclamation"></i> </button>
                                            <button class="btn btn-white btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Move to trash"><i class="fa fa-trash-o"></i> </button>

                                        </div>
                                    </div>
                                    <div class="small text-muted">
                                        <i class="fa fa-clock-o"></i> <?php echo $row_emailstoprospects['senthtml_prospect_created_at']; ?>
                                    </div>

                                    <h1>
                                       <?php echo $row_emailstoprospects['senthtml_prospect_email_from']; ?>
                                    </h1>
									<div id="email_systm_templates_body" class="row">
                                    	<div class="col-sm-12">
                                        <?php echo $row_emailstoprospects['senthtml_prospect_email_systm_templates_body']; ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            
<?php } while ($row_emailstoprospects = mysqli_fetch_array($emailstoprospects)); ?>
                            
                            
                            
                            
                            
                            
                            
                            </div>

                        </div>

                    </div>
                </div>



            </div>




            
            
            
        
        
        <?php include("_footer.php"); ?>

        </div>
        </div>



    <!-- Mainly scripts -->
	<?php include("inc.end.body.php"); ?>

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