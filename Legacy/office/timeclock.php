<?php require_once('db_admin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>IDSCRM | <?php echo $row_userDudes['dudes_firstname']; ?> <?php echo $row_userDudes['dudes_lname']; ?> </title>

<?php include("inc.head.php"); ?>
<style type="text/css">
	.account-content .stoppy_watch{
		background: #2d2d2d;
		color: #f6f6f6;
		display: flex;
		/*
		flext-direction: column;
		align-items: center;
		justify-content: center;
		height:100vh;*/
	}
	
	.stopwatch{
		font-size:5em;
		font-family:"Lucida Console", Monaco, monospace;
	}
	
	.stoppy_watch ul.laps{
		margin: 0;
		padding:0;
	}
	
	.stoppy_watch ul.laps li{
		list-style:none;
		padding: 10px 0;
	}
    </style>

</head>
<body>
<?php include("analyticstracking.php"); ?>
    <div id="wrapper">

        <?php include("_sidebar.dudes.php"); ?>

        <div id="page-wrapper" class="gray-bg">
        <?php include("_nav_top.php"); ?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Time Clock</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="#">Time Clock page</a>
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



               <!-- ==========================
    	MY ACCOUNT - START 
    =========================== -->
    <section class="content components">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="components-content">
                        
                        <div id="mystop_watch" align="center" class="stoppy_watch">
                          <div class="row">
                            <div class="controls">
                                <button class="btn btn-primary" onClick="start()">Start</button>
                                <button class="btn btn-primary"  onClick="pause()">Pause</button>
                                <button class="btn btn-primary"  onClick="stop()">Stop</button>
                                <button class="btn btn-primary"  onClick="restart()">Restart</button>
                                <button class="btn btn-primary"  onClick="lap()">Lap</button>
                                <button class="btn btn-primary"  onClick="resetLaps()">Reset Laps</button>
                            </div>
                          </div>
                          <div class="row">
                            <div class="stopwatch">00:00:00</div>
                          </div>
                          <div class="row">
                        	<ul class="laps"></ul>
                          </div>
                        </div>
                        
                        <script>
                        
                        
                        </script>
                        
                        

                    </article>
                </div>
            </div> 
        </div>
    </section>
    <!-- ==========================
    	MY ACCOUNT - END 
    =========================== -->

    
    <!-- ==========================
    	MY ACCOUNT - START 
    =========================== -->
    <section class="content account">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <article class="account-content">
                        
                        
                        <table class="container timer" cellpadding="5px">
                        	<tr class="info">
                            	<td id="days"></td>
                            	<td id="hrs"></td>
                            	<td id="minute"></td>
                            	<td id="sec"></td>
                            </tr>
                            <tr>
                            	<td>Days</td>
                                <td>Hours</td>
                                <td>Minutes</td>
                                <td>Seconds</td>
                            </tr>
                        </table>

                    </article>
                </div>
            </div> 
        </div>
    </section>
    <!-- ==========================
    	MY ACCOUNT - END 
    =========================== -->



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
            


            
            
        
        
        </div><!-- End wrapper wrapper-content animated fadeInRight -->
        
        
        
        
        
        
     
        
        
        
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
