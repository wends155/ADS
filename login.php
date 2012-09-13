<?php 
session_start();
if (isset($_SESSION["manager"])) {
    header("location: admin/index.php"); 
    exit();
}
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Sign In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
	
    // Connect to the MySQL database  
    include "db_con/connect_to_mysql.php"; 
    $sql = mysql_query("SELECT id FROM admin WHERE username='$manager' AND password='$password' LIMIT 5"); // query the person
	
    // ------- if the user exist in the database ---------
    $existCount = mysql_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["manager"] = $manager;
		 $_SESSION["password"] = $password;
		 header("location: admin/index.php");
         exit();
    } else {
		header ('Location: admin/index.php'); 
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome to ADSell</title>
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
      <div class="row-fluid">
			<div class="span7">
					<div id="myCarousel" class="carousel slide">
					<div class="carousel-inner">
					  <div class="item active">
						<div class="thumbnail">
							<img src="/ADS/img/e.jpg" alt="">
						</div>
					  </div>
					  <div class="item">
						<div class="thumbnail">
							<img src="/ADS/img/ds.jpg" alt="">
						</div>
					  </div>
					  <div class="item">
						<div class="thumbnail">
							<img src="/ADS/img/d.jpg" alt="">
						</div>
					  </div>
					  <div class="item">
						<div class="thumbnail">
							<img src="/ADS/img/ADSELL.png" alt="">
						</div>
					  </div>
					</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
				  </div>
				  <div>
				    <blockquote>
					<p>ADSell is a direct selling service company which cater the number of dealers who sell products for their living and additional income as investors.</p>
					<p>ADSell primarily supervise and monitor our valued dealers respectively, the service center help the people to economize and treasure the importance of being a dealer.</p>
				    </blockquote>
				  </div>
			</div><!--/row-->
			<div class="span5">				
					<center>
					<img src="img/ADSELL_png.png" height="70" width="130"><br><br>
					<h3>Awesome inspiring products from selected direct selling store.</h3><br>
					<a href="register.php" class="btn btn-large btn-primary"><b>Join Now!</b></a></p><hr>
					</center>
					<div class="thumbnail">
					  <br><strong><h4><center>Sign in as Franchiser or Dealer </center></strong></h4>
						<hr>
						<form action="login.php" method="POST"><br> 
							<center><input type="text" class="input-large" name="username" placeholder="Username">
							<br>
							<input type="password" class="input-large" name="password" placeholder="Password">
							<br><br>
							<button type="submit" class="btn btn-primary btn-large"><b>Sign in</b></a></button><br><br>
						</form>
					</div>
			</div>
		  

	  </div><!--/row-->
  
    </div><!--/row-->
    <hr>
    <footer>
		<center>
			<p><dt><font color="gray">{Made in Philippines} </font><a href="index.php"><font color="gray">Home</font></a> | <a href="about.php"><font color="gray">About Us</font></a> | <a href="contact.php"><font color="gray">Contact Us</font></a> | <a href="privacypolicy.php"><font color="gray">Privacy Policy</font></a> | <a href=""><font color="gray">&copy; ADSell 2012</font></p>
		</center>
    </footer>

    </div><!--/.fluid-container-->
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="/ADS/js/jquery.js"></script>
	<script src="/ADS/js/bootstrap-modal.js"></script>
    <script src="/ADS/js/bootstrap-transition.js"></script>
    <script src="/ADS/js/bootstrap-tooltip.js"></script>
    <script src="/ADS/js/bootstrap-popover.js"></script>
    <script src="/ADS/js/bootstrap-carousel.js"></script>
	<script src="/ADS/js/application.js"></script>
	<script src="/ADS/js/jquery-1.7.2.min.js"></script>
	<script src="/ADS/js/others/plugins.js"></script>
	<script src="/ADS/js/others/script.js"></script>
	<script src="/ADS/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	</script>
  </body>
</html>
