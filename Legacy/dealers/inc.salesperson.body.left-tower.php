            
            
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">






                                    <div class="m-b-md">
                                        <a href="salesperson.edit.php?sid=<?php echo $salesperson_id; ?>" class="btn btn-white btn-xs pull-right">Edit Sales Person</a>
                                        <h2><?php echo $row_query_Salesperson['position_title']; ?> @<?php echo $row_userDets['company']; ?></h2>
                                    </div>
                                    
                                    
<dl class="dl-horizontal">
    <dt>Status: <?php if($row_query_Salesperson['acct_status'] == 1){ echo 'Active'; }elseif($row_query_Salesperson['acct_status'] == 0){ echo 'InActive'; } ?></dt> 
        <dd>
            <a id="external_upload_salesperson_photos"><span class="label label-primary">Upload Photos</span></a>
            <a><span class="label label-primary">Send Message To Sales Person</span></a>
            <a data-toggle="modal" data-target="#upmyphotosModal"><span class="label label-primary">Create An Album</span></a>
            <a><span class="label label-primary">Change Profile Photo</span></a>


        </dd>

</dl>
                                    
                                    
                                    
                                </div>
                            </div>





                            <div class="row">
                                <div class="col-lg-4" align="center">
                                    <dl class="dl-horizontal">
                                    <?php if(!$row_query_Salesperson['profile_image']): ?>
                                    
                                    <img src="img/no-pic-avatar.png" width="221px" />
                                    
                                    <?php else: ?>

                                        <a><img alt="image" class="img-circle" src="<?php echo $row_query_Salesperson['profile_image']; ?>" width="221px"></a>


                                    <?php endif; ?>
                                    </dl>
                                </div>






                                <div class="col-lg-8" align="center">
                                
                                
                                    <dl class="dl-horizontal">

                                        <dt>Motto: </dt> <dd>  <?php echo $row_query_Salesperson['prof_motto']; ?> </dd>

                                        <dt>Hometown: </dt> <dd>  <?php echo $row_query_Salesperson['prof_hometown']; ?> </dd>

                                        <dt>Favorite Sports Team: </dt> <dd>  <?php echo $row_query_Salesperson['prof_sportsteam']; ?> </dd>

                                        <dt>Dream Vacation: </dt> <dd>  <?php echo $row_query_Salesperson['prof_dreamvact']; ?> </dd>
                                        
                                        <dt>Favorite Food: </dt> <dd>  <?php echo $row_query_Salesperson['prof_favfood']; ?></dd>
                                        
                                        <dt>Favorite TV Show: </dt> <dd>  <?php echo $row_query_Salesperson['prof_favtvshow']; ?></dd>

                                        <dt>Created Since: </dt> <dd> <?php echo $row_query_Salesperson['salesperson_firstname']; ?> <?php echo $row_query_Salesperson['salesperson_lastname']; ?></dd>
                                        <dt>Appointments Served: </dt> <dd>  162</dd>
                                        <dt>Email: m</dt> <dd><a href="#" class="text-navy"> <?php echo $row_query_Salesperson['salesperson_email']; ?></a> </dd>
                                        <dt>Team Name: </dt> <dd> 	<?php echo $row_query_Salesperson['team_name']; ?> </dd>
                                    </dl>
                                
                                
                                </div>



                            </div>
                            

                            <div class="row">


                                <div class="col-lg-12" align="center" id="cluster_info">
                                    <dl class="dl-horizontal" align="center" >

                                        <dt>Last Updated:</dt> <dd>16.08.2014 12:15:57</dd>
                                        <dt>Created:</dt> <dd> 	<?php echo $row_query_Salesperson['created_at']; ?></dd>
                                        <dt>Team Members:</dt>
                               
                                        <dd class="project-people" align="center">
        <?php 
		if($totalRows_sales_person_team != 0):

		$sales_person_team = mysqli_query($idsconnection_mysqli, $query_sales_person_team);
		$row_sales_person_team = mysqli_fetch_assoc($sales_person_team);

		//mysqli_data_seek($sales_person_team, 0);	
		
		do { 
		?>
          


            
                               <a href="#" >
                               <?php if(!$row_sales_person_team['profile_image']){ ?>
							   
                               <img title="<?php echo $row_sales_person_team['salesperson_firstname']; ?> <?php echo $row_sales_person_team['salesperson_lastname']; ?>" alt="image" class="chat-avatar" src="img/logo.png" width="32px">
                               <?php }else{ ?>
                               
 <img alt="image" class="chat-avatar" src="<?php echo $row_sales_person_team['profile_image']; ?>" width="32px">

                               <?php } ?>
                               </a>
          <?php 
		  
		  } while ($row_sales_person_team = mysqli_fetch_assoc($sales_person_team)); 
		  
		  endif;
		  
		  ?>                               
                               
                               
                               
                               
                                                             
                                        </dd>
                                    </dl>
                                </div>

									</dl>
							</div>





<!-- Start Progress -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Completed:</dt>
                                        <dd>
                                            <div class="progress progress-striped active m-b-sm">
                                                <div style="width: 60%;" class="progress-bar"></div>
                                            </div>
                                            <small>Project completed in <strong>60%</strong>. Remaining close the project, sign a contract and invoice.</small>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
<!-- End Progress -->

















                        </div>
                    </div>
                </div>






        



<!-- Main Block Person Photos -->


        <div class="wrapper wrapper-content">
        
        
        
        
<!-- >Section 1 -->


     
            <div class="row">
                
<!-- Start Outter Left Wall -->
            <div class="col-lg-4">
            
            
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?Php echo $totalRows_sales_person_team_albums; ?> Team Photos <small>Teams/</small></h5>
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



  <?php 
  if($totalRows_sales_person_team_albums != 0):
  do { 
  ?>

            <a id="these" class="fancybox" href="<?php echo $row_sales_person_team_albums['sid_photo_file_path']; ?>" title="<?php echo $row_sales_person_team_albums['sid_photo_albumname']; ?>">
                <img alt="image"  src="<?php echo $row_sales_person_team_albums['sid_photo_file_path']; ?>" />
            </a>

    <?php } while ($row_sales_person_team_albums = mysqli_fetch_assoc($sales_person_team_albums)); ?>
<?php endif; ?>        



                    </div>
                
                
                
                </div>



<!-- Start Sales Person Album Photos -->                
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sales Person Album Photos <small><?php echo $totalRows_distinct_sales_person_albums; ?></small></h5>
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



  <?php 
  if($totalRows_distinct_sales_person_albums != 0):
  do { 
  ?>

            <a id="these" class="fancybox" href="<?php echo  $row_distinct_sales_person_albums['sid_photo_file_path']; ?>" title="<?php echo  $row_distinct_sales_person_albums['sid_photo_albumcomments']; ?>">
                <img alt="image"  src="<?php echo  $row_distinct_sales_person_albums['sid_photo_thumb_fpath']; ?>" />
            </a>

  <?php } while ($row_distinct_sales_person_albums = mysqli_fetch_assoc($distinct_sales_person_albums)); ?>
    
<?php endif; ?>        



                    </div>
                </div>
                


                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Sales Person Photos <small><?Php echo $totalRows_sales_person_photos; ?></small></h5>
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



  <?php 
  if($totalRows_sales_person_photos != 0):
  do { 
  ?>

            <a id="these" class="fancybox" href="<?php echo $row_sales_person_photos['sid_photo_file_path']; ?>" title="<?php echo $row_sales_person_photos['sid_photo_caption']; ?>">
                <img alt="image"  src="<?php echo $row_sales_person_photos['sid_photo_file_path']; ?>" />
            </a>

    <?php } while ($row_sales_person_photos = mysqli_fetch_assoc($sales_person_photos)); ?>
<?php endif; ?>        



                    </div>
                </div>


                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><span class="team_year_Post">2015</span> Team Members <small>Post/</small></h5>
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




		<?php 
		//echo '$totalRows: '.$totalRows_sales_person_team;
		if($totalRows_sales_person_team != 0):
		
		$sales_person_team = mysqli_query($idsconnection_mysqli, $query_sales_person_team);
		$row_sales_person_team = mysqli_fetch_assoc($sales_person_team);

		
		//mysqli_data_seek($sales_person_team, 0); 
		?>
        <?php do { ?>

            <a id="these" class="fancybox" href="<?php echo $row_sales_person_team['profile_image']; ?>" title="<?php echo $row_sales_person_team['salesperson_firstname']; ?> <?php echo $row_sales_person_team['salesperson_lastname']; ?>">
                <img alt="image"  src="<?php echo $row_sales_person_team['profile_image']; ?>" />
            </a>

          <?php } while ($row_sales_person_team = mysqli_fetch_assoc($sales_person_team)); ?>                               

<?php endif; ?>



                    </div>
                </div>
                
                
            </div>
<!-- End Outter Left Wall -->


<!-- Start Innser Right Wall -->
            <div class="col-lg-8">


    <div class="row">
        <div class="col-lg-12">

                <div class="ibox chat-view">

<?php
$now = date('Y-m-d H:i:s');
$date = date_create($now, timezone_open('America/Jamaica'));
$datenow = date_format($date, 'F j, Y, h:i:s') . "\n";
?>
                    <div class="ibox-title">
                        <small class="pull-right text-muted">The Time: <?php echo $datenow; ?> </small>
                        <h5>Write On this Sales Persons Wall</h5>
                    </div>


                    <div class="ibox-content">




<div class="row">

   <div class="col-md-12 ">


                            <div id="sales_person_post" class="">
                                        
                            </div>
                


        <div>
            <div class="input-group m-b">

<button id="post-news" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Post News">
<i class="fa fa-envelope-o"></i> Post</button>


			</div>

			<div class="clearfix"></div>                    
		</div>                    


   </div>

</div>
                        


     </div>

   </div>
        </div>

    </div>


<hr />
<div id="load_lastposted_news"></div>



  <?php do { ?>
<!-- Start Wall Post -->
            
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Dealer News Posts <small>http://fancybox.net/</small></h5>
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



<div id="news_id_<?php echo $row_pull_dealer_news['dlr_news_id']; ?>" class="news_body">
<img alt="image" class="img-circle" src="img/logo.png" width="72px">

        <div class="well">
            <?php echo $row_pull_dealer_news['dlr_news_body']; ?>
            <?php //print_r($row_pull_dealer_news); ?>
        </div>
        <div class="actions">
            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
            <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
        </div>
</div>




	<div id="responses">
    <a id="<?php echo $row_pull_dealer_news['dlr_news_id']; ?>" class="pull_news_response"><?php echo $row_pull_dealer_news['NewsChildCount']; ?> Responses</a>
    
                    <div class="btn-group pull-right">
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>
                    </div>
						<div class="clearfix"></div>
    </div>
    
    
    <div id="load_<?php echo $row_pull_dealer_news['dlr_news_id']; ?>"></div>
    

<div>
    <div class="input-group m-b">
        <span class="input-group-addon">
        <img alt="image" class="img-circle" src="img/logo.png" width="32px">
        </span> 
    <textarea id="<?php echo $row_pull_dealer_news['dlr_news_id']; ?>" class="form-control post-response-msg" name="message" placeholder="Make A Response"></textarea>
    </div>




                    <div class="btn-group pull-left">
                    <button id="post-response" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-envelope-o"></i> Post</button>

                    </div>
                    

                    

</div>
<div class="clearfix"></div>

                    </div>
                </div>
<!-- End Wall Post -->            
    <?php } while ($row_pull_dealer_news = mysqli_fetch_assoc($pull_dealer_news)); ?>




<!-- Start More Wall Post -->
            
                <div class="ibox float-e-margins" style="display:none;">
                    <div class="ibox-title">
                        <h5>More News Posts <small>http://fancybox.net/</small></h5>
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


                    </div>
                </div>

<!-- End More Wall Post -->






<!-- Start What Ever I Want -->
            
                <div class="ibox float-e-margins" style="display:none;">
                    <div class="ibox-title">
                        <h5>More Posts <small></small></h5>
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


                    </div>
                </div>

<!-- End What Ever I Want -->




            
            </div>
<!-- End Innser Right Wall -->            

            </div>



<!-- /End Section 1 -->        
        
        
        
        
        
        
        
        
        
        </div>
<!-- End Main BlockPerson Photos -->

















            

<!-- Start Sales Person Photos -->








<!--Start Blank Realestate -->
        <div class="wrapper wrapper-content" style="display:none;">
            <div class="row">
            
            
            
            
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Animation without caption</h5>
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
                            <div class="carousel slide" id="carousel1">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img alt="image" class="img-responsive" src="img/p_big3.jpg">
                                    </div>
                                    <div class="item">
                                        <img alt="image"  class="img-responsive" src="img/p_big1.jpg">
                                    </div>
                                    <div class="item ">
                                        <img alt="image" class="img-responsive" src="img/p_big2.jpg">
                                    </div>

                                </div>
                                <a data-slide="prev" href="#carousel1" class="left carousel-control">
                                    <span class="icon-prev"></span>
                                </a>
                                <a data-slide="next" href="#carousel1" class="right carousel-control">
                                    <span class="icon-next"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-lg-7">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Animation and Caption</h5>
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
                        <div class="ibox-content ">
                        
                        no photo block no more
                        </div>
                    </div>
                </div>





            </div>
        </div>
<!--End Blank Realestate -->

        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $totalRows_sales_person_appointments; ?> Appointment <small>http://fancybox.net/</small></h5>
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

                            
<!-- Start Panel -->

                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab-1" data-toggle="tab"><?php echo $totalRows_sales_person_appointments; ?> Latest Appointments</a></li>
                                            <li class=""><a href="#tab-2" data-toggle="tab">Last Team activity</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                <div class="tab-content">
                                <div class="tab-pane active" id="tab-1">


                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Title</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Comments</th>
                                        </tr>
                                        </thead>
                                        <tbody>

<?php do { ?>

                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i> Sent</span>
                                            </td>
                                            <td>
												<?php echo $row_sales_team_appointments['dlr_appt_salesname_txt']; ?>
											</td>
                                            <td>
                                                Starting: <?php echo $row_sales_team_appointments['dlr_appt_startunixtime_milli']; ?>                                            
                                            </td>
                                            <td>
                                                Ending: <?php echo $row_sales_team_appointments['dlr_appt_endunixtime_milli']; ?>                                            
                                            </td>
                                            <td>
                                                <p class="small">
                                                    <?php echo $row_sales_team_appointments['dlr_appt_notes']; ?>
                                                </p>
                                            </td>

                                        </tr>
  <?php } while ($row_sales_person_appointments = mysqli_fetch_assoc($sales_person_appointments)); ?>

                                        </tbody>
                                    </table>

                                </div><!-- End 1 -->
                                <div class="tab-pane" id="tab-2">
                                
                                

                                    <div class="feed-activity-list">
                                                                                                            
										<div class="feed-element">
                                            <a href="#" class="pull-left">
                                                <img alt="image" class="img-circle" src="img/a5.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">2h ago</small>
                                                <strong>Kim Smith</strong> posted message on <strong>Monica Smith</strong> site. <br>
                                                <small class="text-muted">Yesterday 5:20 pm - 12.06.2014</small>
                                                <div class="well">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                    Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                                                </div>
                                                <div class="actions">
                                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                                                    <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                
                                
                                
                                
                                
                                </div><!-- End 2 -->
                                </div>

                                </div>

                                </div>
                                </div>
                            </div>


<!-- End Panel -->

                    </div>
                </div>
            </div>

            </div>
        </div>
<!-- End Sales Person Photos -->



<!-- Start Top Wall Post  -->
            <div class="col-lg-12" style="display:none;">
            
            
                <div class="ibox float-e-margins">
                
                
                
                    <div class="ibox-title">
                        <h5>Say Something Make Some News</h5>
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
                        </div>
                    </div>
                   
                   
                   
                   
                    <div class="ibox-content">

                    
                    
<!--Start post_towall -->


            
            
            
                
                
                
                </div>
            
            
            
            
            </div>

            </div>
<!-- End Top Wall Post  -->

<!-- Start Nothing -->


        <div class="wrapper wrapper-content" style="display:none;">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Photos <small>http://fancybox.net/</small></h5>
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






                    </div>
                </div>
            </div>

            </div>
        </div>
<!-- End Nothing -->





<div class="wrapper wrapper-content animated fadeInRight" style="display:none;">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                    <strong>Chat room v.1</strong> can be used to create chat room in your app. In first version there is a html template.
                    In next versions of Inspinia we will add more design options. Feel free to write to us on <span class="text-navy">support@webapplayer.com</span>  if you need any help with implemnetation.

                            <div>
                                <div class="chat-users">


                                    <div class="users-list">
                                        <div class="chat-user">
                                            <img class="chat-avatar" src="img/a4.jpg" alt="" >
                                            <div class="chat-user-name">
                                                <a href="#">Karl Jordan</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <img class="chat-avatar" src="img/a1.jpg" alt="" >
                                            <div class="chat-user-name">
                                                <a href="#">Monica Smith</a>
                                            </div>
                                        </div>
                                        <div class="chat-user">
                                            <span class="pull-right label label-primary">Online</span>
                                            <img class="chat-avatar" src="img/a2.jpg" alt="" >
                                            <div class="chat-user-name">
                                                <a href="#">Michael Smith</a>
                                            </div>
                                        </div>





                                    </div>

                                </div>
                            </div>

                </div>
            </div>
        </div>
    </div>


</div>


<div class="wrapper wrapper-content" style="display:none;">


    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Wyswig Summernote Editor</h5>
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
            <div class="ibox-content no-padding">

                <div class="summernote">
                    <h3>Lorem Ipsum is simply</h3>
                    dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                    <br/>
                    <br/>
                    <ul>
                        <li>Remaining essentially unchanged</li>
                        <li>Make a type specimen book</li>
                        <li>Unknown printer</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <h2>
                        Summernote
                    </h2>
                    <p>
                        Super Simple WYSIWYG Editor on Bootstrap
                    </p>

                    <div class="alert alert-warning">
                        Full documentation for Summernote.js, including examples and API calls, keybored shortcuts, PHP Examples, Django installation, and Rails (gem) integration can be found at:
                        <a href="http://hackerwins.github.io/summernote/features.html#api">http://hackerwins.github.io/summernote/features.html#api</a>
                        <!--<div class="summernote">summernote 2</div>-->

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Example of Edit by click and save as a html</h5>
                    <button id="edit" class="btn btn-primary btn-sm m-l-sm" onclick="edit()" type="button">Edit</button>
                    <button id="save" class="btn btn-primary  btn-sm" onclick="save()" type="button">Save</button>
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
                <div class="ibox-content no-padding">

                    <div class="click2edit wrapper">
                        <h3>Lorem Ipsum is simply</h3>
                        dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                        <br/>
                        <br/>
                        <ul>
                            <li>Remaining essentially unchanged</li>
                            <li>Make a type specimen book</li>
                            <li>Unknown printer</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
            
