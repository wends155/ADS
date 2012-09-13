<?php
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: ../login.php"); 
    exit();
}
?>
<?php 
if (isset($_GET['id'])) {
	// Connect to the MySQL database  
    include "../config/connect_to_mysql.php"; 
	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	$sql = mysql_query("SELECT * FROM users WHERE id='$id' LIMIT 1");
	$userCount = mysql_num_rows($sql); // count the output amount
    if ($userCount > 0) {
		// get all the product details
		while($row = mysql_fetch_array($sql)){ 
			 $id = $row["id"];
			 $fullname = $row["name"];
			 $username = $row["username"];
			 $gender = $row["gender"];
			 $date = date ("Y-m-d");
			 $street = $row["street"];
			 $city = $row["city"];
			 $province = $row["province"];
			 $cnum = $row["cnum"];
			 $nationality = $row["nationality"];
			 $bio = $row["bio"];
			 $status = $row["status"];
         }
		 
	} else {
		echo "That item does not exist.";
	    exit();
	}
		
} else {
	echo "Data to render this page is missing.";
	exit();
}
mysql_close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ADSell</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
	<link href="/ADS/css/datepicker.css" rel="stylesheet">
    <link href="/ADS/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="/ADS/css/lightbox.css" type="text/css" media="screen" />
    <style type="text/css"> 
      body {
        padding-top: 50px;
        padding-bottom: 0px;
		
      }
      .sidebar-nav {
        padding: 30px 0;
      }
    </style>
    
	

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

   <body background="/ADS/img/grain.jpg" bgcolor="#333333"> 
   <br>
   <br>
  
   
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
		  <div class="nav-collapse">
            <ul class="nav">			  
			  <li><a class="brand" href="../index.php"><img src="/ADS/img/ADSELL_png.png" height="35" width="80"></a></li>
			  <li><a href="../category/index.php"><img src="../img/catalog.png"> Catalog</a></li>
			  <li><a href="../orders/index.php"><img src="../img/cart.png"> Orders</a></li>
			  <li class="active"><a href="index.php"><img src="../img/user.png"> Dealers</a></li>
			  <li><a href="../report/index.php"><img src="../img/report.png"> Reports</a></li>
			  <li><a href="../custom/view.php"><img src="../img/conf.png"> Configuration</a></li>
			  <li><a href="#contact"><img src="../img/sms.png"> SMS</a></li>
            </ul>
			<p class="navbar-text pull-right">Howdy! <?php echo $_SESSION['manager']; ?>&nbsp;<a href="../logout.php">Sign Out</a></p>
		  </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
	    <div class="span2">
		  <div class="well sidebar-nav">
            <ul class="nav nav-list">
				<li class="nav-header"><h4>Dealer Account Information</h4></li><br>
				<?php
					echo "<a href='/ADS/user_image/$id.jpg' rel='lightbox'><img src='/ADS/user_image/$id.jpg' width='100' height='100'/></a><br>";
				?>
            </ul>
		  </div>
		</div>
		<div class="span5">
				<table class="table table-striped">				
					<h2><br><small>(Personal Information)</small></h2>
					  <tr>
						<th><h4>Dealer ID :</h4></th>
						<td><?php echo $id; ?></td>					   
					  </tr>
					  <tr>
						<th><h4>Fullname :</h4></th>
						<td><?php echo $fullname; ?></td>
					  </tr>
					  <tr>
						<th><h4>Username :</h4></th>
						<td><?php echo $username; ?></td>
					  </tr>
					  <tr>
						<th><h4>Gender :</h4></th>
						<td><?php echo $gender; ?></td>
					  </tr>
					  <tr>
						<th><h4>Status :</h4></th>
						<td><?php echo $status; ?></td>
					  </tr>
					  <tr>
						<th><h4>Date Joined :</h4></th>
						<td><?php echo $date; ?></td>
					  </tr>
					<br>
					
			</table>		
		</div>
        <div class="span5">
			<table class="table table-striped">				
					<h2><br><small>(Extended Information)</small></h2>
					  <tr>
						<th><h4>Street :</h4></th>
						<td><?php echo $street; ?></td>					   
					  </tr>
					  <tr>
						<th><h4>City :</h4></th>
						<td><?php echo $city; ?></td>
					  </tr>
					  <tr>
						<th><h4>Province :</h4></th>
						<td><?php echo $province; ?></td>
					  </tr>
					  <tr>
						<th><h4>Mobile Phone Number :</h4></th>
						<td><?php echo $cnum; ?></td>
					  </tr>
					  <tr>
						<th><h4>Nationality :</h4></th>
						<td><?php echo $nationality; ?></td>
					  </tr>
					  <tr>
						<th><h4>Bio :</h4></th>
						<td><?php echo $bio; ?></td>
					  </tr>
					<br>					
			</table>		
		</div>
      </div><!--/row fluid outside-->
	  
	  
	  <br>
	  <br>
	  <br>
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
    <script src="/ADS/js/bootstrap-dropdown.js"></script>
	<script src="/ADS/js/lightbox.js"></script>
	<script src="/ADS/js/jquery-1.7.2.min.js"></script>
	<script src="/ADS/js/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="/ADS/js/jquery.smooth-scroll.min.js"></script>
  </body>
</html>
