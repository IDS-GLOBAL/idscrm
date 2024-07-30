<div class="header">
    <p class="logged">
    	
        Logged in as:  
        <a href="myacct.php" title="<?php echo $row_userSets['salesperson_firstname']; ?> <?php echo $row_userSets['salesperson_lastname']; ?>">
        <?php echo $row_userSets['salesperson_firstname']; ?> <?php echo $row_userSets['salesperson_lastname']; ?>
			
    	</a> 
        | 
    	<?php echo $row_userSets['salesperson_email']; ?>
        
        
        
        <span>
        	<a href="#" class="mail_msg">15</a> <?php echo salespersontop($sid, $did); ?>notifications <a href="logout.php" class="logout">logout</a>
        </span>
        
        <br />
        
    </p>
    <p class="minimenu"><a href="coming-soon.php">Billing</a> <a href="coming-soon.php" class="obord">Settings</a> <a href="#">Contact us</a></p>
    <div class="clr"></div>
    <form id="formsearch" name="formsearch" method="post" action="" class="formsearch">
    
      <input name="button_search" src="images/button_search.gif" class="button_search" type="image" />
      <span>
      	<input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Type your search query here..." type="text" />
        </span>
    </form>
    
    <a href="dashboard.php">
    		<img src="images/idslogo.png" alt="Logo" class="logo" /></a>
    
    <div class="clr"></div>
    
    <?php include('parts/sales_navigation.php') ?>
    
  </div>