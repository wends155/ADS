<?php
if ($_POST['username']) {
//Connect to the database through our include 
include_once "db_con/connect_to_mysql.php";
$username = stripslashes($_POST['username']);
$username = strip_tags($username);
$username = mysql_real_escape_string($username);
$password = ereg_replace(":[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
$password = md5($password);
$sql = mysql_query("SELECT * FROM users WHERE password='$password'"); 
$login_check = mysql_num_rows($sql);
if($login_check > 0){ 
    while($row = mysql_fetch_array($sql)){ 
        // Get member ID into a session variable
        $id = $row["id"];   
        session_register('id'); 
        $_SESSION['id'] = $id;
        // Get member username into a session variable
	    $username = $row["username"];   
        session_register('username'); 
        $_SESSION['username'] = $username;
        // Update last_log_date field for this member now
        mysql_query("UPDATE users SET lastlogin=now() WHERE id='$id'"); 
        // Print success message here if all went well then exit the script
		header("location: user/index.php?id=$id"); 
		exit();
    } // close while
} else {
  header("location: index.php");
  exit();
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in to ADSell</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="/ADS/css/welcome.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 0px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="/ADS/css/bootstrap.css" rel="stylesheet">
	<link href="/ADS/css/docs.css" rel="stylesheet">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/img/ico/adsell.png">
  </head>
  <body> 
	 <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>        
          <div class="nav-collapse">
            <ul class="nav">
              <li>
                <a class="brand" href="index.php"><img src="img/ADSELL_png.png" height="35" width="80"></a>
              </li>
            </ul>
			<ul class="nav pull-right">
              <li><a href="facebook.com"><img src="img/facebook.png"></a></li>
			  <li><a href="twitter.com"><img src="img/twitter.png"></a></li>
			  <li><a href="plus.google.com"><img src="img/gplus.png"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
	<br>
    <div class="container">
	  <div class="row">
		<div class="span1">
		</div>
		<div class="span10">
			<div class="thumbnail">
				<form class="form-horizontal" action="index.php" method="POST" name="logform" id="logform" onsubmit="return validate_form ( );">																
					<div>
						<br><p><h2><b>&nbsp;Sign in to ADSell</b></h2></p><hr>
						<div class="control-group">
							<div class="controls">
							  <input type='text' class='input-large' name='username' placeholder='Username'> 
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
							  <input type='password' class='input-large' name='password' placeholder='Password'> 
							</div>
						</div>
						<div class="form-actions">
															
							<button type='submit' class='btn btn-primary btn-large' OnClick="show_alert()"><b>Sign in</b></a></button>
          <label class="remember">
            <input type="checkbox" value="1" name="remember_me" tabindex="3">
            Remember me
          </label>
							<h4><a href="">Forgot Password?</a></h4>							
						</div>
					</div>
				</form>				
			</div>
		</div>
		<div class="span1">
		</div>
	  </div><!--/row-->
  
    </div><!--/row-->

    </div><!--/.fluid-container-->
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="/ADS/js/jquery.js"></script>
	<script src="/ADS/js/bootstrap-modal.js"></script>
    <script src="/ADS/js/bootstrap-transition.js"></script>
    <script src="/ADS/js/bootstrap-tooltip.js"></script>
	<script src="/ADS/js/bootstrap-alert.js"></script>
    <script src="/ADS/js/bootstrap-popover.js"></script>
    <script src="/ADS/js/bootstrap-carousel.js"></script>
	<script src="/ADS/js/application.js"></script>
	<script src="/ADS/js/jquery-1.7.2.min.js"></script>
	<script src="/ADS/js/others/plugins.js"></script>
	<script src="/ADS/js/others/script.js"></script>
	<script src="/ADS/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	<!-- Form Validation -->
	function validate_form ( ) { 
	valid = true; 
	if ( document.logform.username.value == "" ) { 
	alert ( "Please enter your Username and Password!" ); 
	valid = false;
	}
	if ( document.logform.pass.value == "" ) { 
	alert ( "Please enter your password" ); 
	valid = false;
	}
	return valid;
	}
	<!-- Form Validation -->
	</script>
  </body>
</html>
