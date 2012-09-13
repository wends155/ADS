<?php 
session_start();
if (isset($_SESSION["manager"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Sign In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
	
    // Connect to the MySQL database  
    include "config/connect_to_mysql.php"; 
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
		 header("location: index.php");
         exit();
    } else {
		header ('Location: index.php'); 
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
	<link href="/ADS/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 0px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	
  </head>

  <body background="/ADS/img/m.jpg" bgcolor="#333333"> 
  
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
                <a class="brand" href="login.php"><img src="/ADS/img/ADSELL_png.png" height="40" width="90"></a>
              </li>
            </ul>	
          </div>
        </div>
      </div>
    </div>	
	<br><br>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
			<br>
            <ul class="nav nav-list">
             <h3><font color="gray"><center>Sign in to ADSell</font></center></h3><br><br>
					<form action="login.php" method="POST"> 
					<center><input type="text" class="input-medium" name="username" placeholder="Username">
					<br>
					<br>
					<input type="password" class="input-medium" name="password" placeholder="Password">
					<br><br>
					<button type="submit" class="btn btn-primary btn-medium">Sign in</a></button><br><br>
					</form>
					<br>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
		<div class="span6">
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
					</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
				  </div>
			</div><!--/row-->
		
		  <div class="span3">
		    <div class="well sidebar-nav">
			 <h3><font color="gray">ADSell</font></h3><br>
					<p>
					ADSell is a direct selling service company which cater the number of dealers who sell products for their living and additional income as investors.</p>
					<p>
					ADSell primarily supervise and monitor our valued dealers respectively, the service center help the people to economize and treasure the importance of being a dealer.</p>
					<p>
					ADSell share the trust, love and respect through their valued dealers all over the country.
					</p>
					<br>
					</button>
					</text>
					
			</div>

		  </div><!--/row-->
       
      </div><!--/row-->
	  <br>
     <footer>
		<center>
			<p><dt><font color="gray">{Made in Philippines} </font><a href="login.php"><font color="gray">Home</font></a> | <a href="/ADS/about.php"><font color="gray">About Us</font></a> | <a href="/ADS/contact.php"><font color="gray">Contact Us</font></a> | <a href="/ADS/privacypolicy.php"><font color="gray">Privacy Policy</font></a> | <a href="login.php"><font color="gray">&copy; ADSell 2012</font></p>
		</center>
      </footer>

    </div><!--/.fluid-container-->
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="/ADS/js/jquery.js"></script>
    <script src="/ADS/js/bootstrap-transition.js"></script>
    <script src="/ADS/js/bootstrap-tooltip.js"></script>
    <script src="/ADS/js/bootstrap-popover.js"></script>
    <script src="/ADS/js/bootstrap-carousel.js"></script>
	<script src="/ADS/js/application.js"></script>

  </body>
</html>
