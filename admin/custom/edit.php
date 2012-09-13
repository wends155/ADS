<?php 
session_start();
if (!isset($_SESSION["manager"])) {
   header("location: /ADS/index.php"); 
    exit();
}
include "../config/connect_to_mysql.php"; 
?>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['username'])) {	
	$pid = mysql_real_escape_string($_POST['thisID']);
    $username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$sql = mysql_query("UPDATE admin SET username='$username', password='$password' WHERE id='$pid'");
	header("location: index.php"); 
    exit();
}
?>
<?php 
// Gather this product's full information for inserting automatically into the edit form below on page
if (isset($_GET['pid'])) {
	$targetID = $_GET['pid'];
    $sql = mysql_query("SELECT * FROM admin WHERE id='$targetID' LIMIT 1");
    $userCount = mysql_num_rows($sql); // count the output amount
    if ($userCount > 0) {
	    while($row = mysql_fetch_array($sql)){            
			 $username = $row["username"];
			 $password = $row["password"];
			 $date = strftime("%b %d, %Y", strtotime($row["date"]));
        }
    } else {
	    echo "Sorry that crap dont exist.";
		exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ADSell </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/ADS/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 50px;
        padding-bottom: 0px;
		padding-bottom: 1px;
		
      }
      .sidebar-nav {
        padding: 30px 0;
      }
    </style>
    <link href="/ADS/css/bootstrap-responsive.css" rel="stylesheet">
	

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/img/ico/adsell.png">
  </head>

   <body background="img/grain.jpg" bgcolor="#333333"> 
   <br>
   <br>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
		  <div class="nav-collapse">
            <ul class="nav">	
			  <li>
				<a class="brand" href="../index.php"><img src="/ADS/img/ADSELL_png.png" height="35" width="80"></a>
			  </li>
			  <li><a href="../category/index.php"><img src="../img/catalog.png"> Catalog</a></li>
			  <li><a href="../orders/index.php"><img src="../img/cart.png"> Orders</a></li>
			  <li><a href="../user/index.php"><img src="../img/user.png"> Dealers</a></li>
			  <li><a href="../report/index.php"><img src="../img/report.png"> Reports</a></li>
			  <li class="active"><a href="../custom/edit.php"><img src="../img/conf.png"> Configuration</a></li>
			  <li><a href="#contact"><img src="../img/sms.png"> SMS</a></li>
            </ul>
			<p class="navbar-text pull-right">Howdy! <?php echo $_SESSION['manager']; ?>&nbsp;<a href="../logout.php">Sign Out</a></p>
		  </div><!--/.nav-collapse -->		
        </div>
      </div>
    </div>

     <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
		  <div class="well sidebar-nav"> <!-- other side bar start here-->
            <ul class="nav nav-list">
			   <li class="nav-header"><h4>Configuration Menu</h4></li>
			   <li class=""><a href="view.php"><i class="icon-search"></i> View User</a></li>
			   <li class="active"><a href="#"><i class="icon-edit"></i> Change Password</a></li>
            </ul>
          </div><!-- other side bar end here! -->
        </div><!--/span4 end here!-->
		<div class="span9">			   
				   <form class="form-horizontal" action="edit.php" name="myForm" id="myform" method="post">
					<fieldset>
					  <legend>Change Password</legend><br>
					  <p><code>Note:</code> All field mark with <code>*</code> are required.</p>
					  <br>
					  <div class="control-group">
						<label class="control-label" for="disabledInput">Username*:</label>
						<div class="controls">
						  <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="<?php echo $username; ?>" disabled>
						</div>
					  </div>
					  <div class="control-group">
						<label>Password*:</label>
						<div class="controls">
						  <input class="input-xlarge" text="password" id="password" rows="3" name="password" value="<?php echo $password; ?>"/>
						</div>
					  </div>
					  <div>
					  <div class="form-actions">
						<button type="submit" class="btn btn-large btn-warning" name="thisID" value="<?php echo $targetID; ?>">Update Item</button>
						<button type="reset" class="btn btn-large btn-danger" onClick="window.location.href='view.php'">Cancel</button>
					  </div>					 
					</fieldset>
				  </form>
	  </div>
	</div>
	  <div class="wrapper">
	  </div class="push"></div>
	  
     <div class="footer">
				<div class="container-fluid">
					<div class="pull-right">
						<div class="span4">
							<dl>
								<dt><font color="gray">Phone</font></dt>
								<dd>
								<p><font color="white">09306673054</font></p>
								</dd>
								<dt><font color="gray">Email</font></dt>
								<dd>
								<a href="mailto:ariesmanian1990@gmail.com"><font color="white">adsell2012@gmail.com</font></a>
								</dd>
							</dl>
						</div>
						
						<div class="span4">
							<address>
								<dl>
								<dt><font color="gray">Address</font></dt>
									<dd>
										<a href="http://adsell.tk"><font color="white">
											Cadelina Bldg., Quezon Street
											<br>
											New Pandan, Panabo City, 
											<br>
											Davao del Norte, Philippines
											</font>
										</a>
									</dd>
								</dl>
							</address>
						</div>
					</div>
					<div id="plusone">
					<div class="g-plusone" data-size="tall"></div>
					</div>
					<p>
					<a href="http://twitter.com">
					<img alt="Twitter" height="64" src="/ADS/img/twitter-logo.png" width="64">
					</a>
					<a href="http://www.facebook.com">
					<img alt="Facebook" height="64" src="/ADS/img/fb.png" width="64">
					</a>
					<a href="http://www.plus.google.com">
					<img alt="Google" height="64" src="/ADS/img/googleplus.png" width="64">
					</a>
					<a href="http://www.pinterest.com">
					<img alt="Google" height="64" src="/ADS/img/pin.png" width="64">
					</a>
					
					</p>
					<p><font color="gray">
								&#169; 2012 Alima Direct Selling -</font>
					<a href="/legal"><font color="white">Legal &amp; privacy stuff</font></a>
					</p>
				</div>	
		</div>
    </div><!--/.fluid-container-->
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/ADS/js/jquery.js"></script>
    <script src="/ADS/js/bootstrap-alert.js"></script>
    <script src="/ADS/js/bootstrap-modal.js"></script>
	<script src="/ADS/js/bootstrap-transition.js"></script>
    <script src="/ADS/js/bootstrap-dropdown.js"></script>
	<script src="/ADS/js/bootstrap-carousel.js"></script>
    
</body>
</html>