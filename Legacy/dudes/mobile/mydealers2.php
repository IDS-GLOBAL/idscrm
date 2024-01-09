<?php include("function_mobiledudes.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>jQuery Mobile Template Form Gallery Local : Sales Person Theme</title>
<link type='text/css' href='../jquery.mobile-1.0b1/jquery.mobile-1.0b1.min2.css' rel='stylesheet'/>
<link type='text/css' href='../css/jqm-docs2.css' rel='stylesheet'/>
<script type='text/javascript' src='../js/jquery-1.6.1.min2.js'></script>
<script type='text/javascript' src='../jquery.mobile-1.0b1/jquery.mobile-1.0b1.min2.js'></script>


<style>
.ui-content {
	padding:5px;
}
</style>
</head>

<body>
<div data-role="page">




				<div id="jqm-homeheader" class="ui-mobile">
						
                        <?php include("inc/dues-mobile-navigation.php"); ?>

				</div>



				<div data-role="content" data-theme="a">
					

					<div id="table">
                    
                    
						<table width="780px" border="2" cellspacing="3" cellpadding="3">
  <tr>
    <th scope="col">Dealer ID:</th>
    <th scope="col">Dealer Name:</th>
    <th scope="col">Dealer Phone#:</th>
    <th scope="col">Dealer City:</th>
    <th scope="col">Dealer Status:</th>
    <th scope="col">Billing</th>
    <th scope="col">Actions!</th>
    </tr>
<?php do { ?>
  <tr>
    <td><?php echo $row_mydealers['id']; ?></td>
    <td><?php echo $row_mydealers['company']; ?></td>
    <td><?php echo $row_mydealers['phone']; ?></td>
    <td> <?php echo $row_mydealers['city']; ?> <br />
      <?php echo $row_mydealers['state']; ?> <br />
      <?php echo $row_mydealers['zip']; ?>
    </td>
    <td><?php echo $row_mydealers['status']; ?></td>
    <td><a href="mydealerInvoice-view.php?dealerid=<?php echo $row_mydealers['id']; ?>">Billing</a></td>
    <td>Something</td>
    </tr>

  <?php } while ($row_mydealers = mysqli_fetch_array($mydealers)); ?>    

</table>

                    
                    
                    </div>
		
								
  </div>
                
</div>
