<?php include('db_sales-functions.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coming Soon</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="style-moz.css" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
<link href="style_ie.css" rel="stylesheet" type="text/css" media="all" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="js/jsi.js"></script>
<script type="text/javascript" src="js/js.js"></script>
</head>
<body>
<div class="container">
  <!-- HEADER -->
  
  <?php include('parts/top-header.php') ?>
<!-- CONTENT -->
  <div class="content">

    <!-- GREAT BLOCK -->
    <div class="block_gr2 vertsortable">

      <!-- gadget left 1 -->
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Page Coming Soon <span>Not Available Yet...</span></h3>
          <div class="gadget_content">
            <h3>Choose One Of The Options  Below</h3>
            <p>This Page Coming Very Soon - Please Bare With Us.
            </p>
          </div>
        </div>
      </div>
      








      <!-- gadget usertable -->
<!--
      <div class="gadget jsi_gv">
        <div class="gadget_border">
          <h3>Customers <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <form action="" method="post" id="form_userstable">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="glines">
              <tr>
                <th width="40" class="taleft"><input name="utc1" id="utc1" type="checkbox" /></th>
                <th width="100">Name</th>
                <th width="100">Username</th>
                <th width="90">Date</th>
                <th width="120">Location</th>
                <th>E-mail</th>
                <th width="50">Actions</th>
              </tr>
              <tr>
                <td><input name="utc2" id="utc2" type="checkbox" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mwwweefail@yahoo.com">mwwweefail@yahoo.com</a></td>
                <td width="28"><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
              <tr>
                <td><input name="utc3" id="utc3" type="checkbox" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:mail@yahoo.com">mail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
              <tr class="last">
                <td><input name="utc4" id="utc4" type="checkbox" /></td>
                <td>John Smith</td>
                <td>jonnysmi</td>
                <td>12.24.1980</td>
                <td>San Francisco, CA</td>
                <td><a href="mailto:m13dail@yahoo.com">m13dail@yahoo.com</a></td>
                <td><a href="#"><img src="images/pimpa_tabs.gif" alt="picture" width="16" height="16" class="tabpimpa" /></a></td>
              </tr>
            </table>
            </form>
          </div>
        </div>
      </div>
-->
    </div>

    <!-- SMALLER BLOCK -->

    <?php //include('parts/inventory-tower.php') ?>
<div class="clr"></div>
  </div>
  
  <!-- FOOTER -->

	
	<?php include('parts/sales_footer.php') ?>

  
  <!-- DIALOGS -->
  <div id="dialogboxes">
    <!-- dialog 1 -->
    <div id="dialog1" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
          <h3>Thank you for <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's standard dummy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.<br /><br /></p>
            <p><a href="#" class="bg_grey">Start Demo - Login Now</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- dialog 2 -->
    <div id="dialog2" class="window">
      <div class="gadget jsi_gd">
        <div class="gadget_border">
          <h3>Welcome to Admin Area <span>Lorem ipsum dolor sit amet</span></h3>
          <div class="gadget_content">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's standard dummy text</strong> ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make.</p>
            <div class="gadget jsi_msg jsi_msg_yellow"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#">Lorem Ipsum has been the industry</a></p></div>
            <div class="gadget jsi_msg jsi_msg_red"><p><strong>Lorem Ipsum is simply dummy text</strong> of the printing and typesetting industry. <a href="#">Lorem Ipsum has been the industry</a></p></div>
            <form action="" method="post" id="loginform" class="form_login">
            <ol><li>
              <label for="login">Your Login:</label>
              <input id="login" name="login" class="text" />
              <div class="clr"></div>
            </li><li>
              <label for="pwd">Your Password:</label>
              <input id="pwd" name="pwd" class="text" type="password" />
              <div class="clr"></div>
            </li></ol>
            </form>
            <p class="bot24px"><a href="#" class="blackbutton">Start Demo - Login Now</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Mask to cover the whole screen -->
    <div id="mask"></div>
  </div>
  
</div>

</body>
</html>
<?php
mysqli_free_result($userSets);

mysqli_free_result($salespersoninventory);
?>
