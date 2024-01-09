<div class="header">
    <div class="header_res">
      <a href="index.php"><img src="images/logo.png" alt="Logo" class="logo" /></a>
      
      <?php include('navigation/dudes-navigation.php'); ?>
      
      <div class="clr"></div>
      
      
      
      <ul class="menuicon">
        <li><a href="dashboard.php"><img src="images/icon_h1.gif" alt="picture" width="32" height="29" /></a><br /><a href="#" class="mini">Dashboard</a></li>
        <li><a href="#"><img src="images/icon_h2.gif" alt="picture" width="32" height="29" /></a><br /><a href="profile.php" class="mini">Profile</a></li>
        <li><a href="#"><img src="images/icon_h3.gif" alt="picture" width="32" height="29" /></a><br /><a href="#" class="mini">Messages</a></li>
      </ul>
      <p class="aright rightelems">Logged in as <a href="#" class="black"><?php echo $row_userDudes['dudes_username']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="gradient37">
          <a href="#"><img src="images/email.gif" alt="picture" width="16" height="12" class="email" /></a><a href="#"><strong>37</strong></a> incoming messages &nbsp;&nbsp;
          <a href="script-logout.php"><img src="images/button_logout.gif" alt="picture" width="16" height="16" class="logout" /></a><a href="script-logout.php" class="black">logout</a>
        </span>&nbsp;&nbsp;
        <a href="#dialog1" class="gradient37" name="modal">IDS Wizard</a>&nbsp;&nbsp;
        <!-- a href="#dialog2" class="gradient37" name="modal">Login Box</a -->
      </p>
      <div class="clr"></div>
    </div>
  </div>