<?php
session_start();
 if (!isset($_SESSION["username"])) {
    header("location: ../index.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ADSell / Terms of Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="/ADS/css/bootstrap.css" rel="stylesheet">
	<link href="/ADS/css/docs.css" rel="stylesheet">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/img/ico/adsell.png">
	 <style type="text/css">
      body {
        padding-top: 70px;
        padding-bottom: 0px;
		padding-left: 0px;
		padding-right: 0px;
		
      }
      .sidebar-nav {
        padding: 30px 0;
      }
	  ul.nav li.dropdown:hover ul.dropdown-menu{
        display: block;    
      }
	  a.menu:after, .dropdown-toggle:after {
		content: none;
	  }
    </style>
  </head>

  <body background="/ADS/img/grain.jpg" bgcolor="#333333"> 


  <!-- Navbar
    ================================================== -->
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
                <a class="brand" href="../user/profile.php"><img src="../img/ADSELL_png.png" height="35" width="80"></a>
              </li>
            </ul>	
          </div>
        </div>
      </div>
    </div>

    <div class="container">  

<!-- Masthead
================================================== -->
 <br>
  <div class="container">
    <div class="row-fluid">
			<div class="span11">
				  <h1>ADSell Terms of Service</h1>
				  <br>
				  <p>ADSell, a direct selling service center registered in Panabo City, Davao del Norte, we only offers services limited to the people/dealers who work with us through our domain and store, particularly located in the city.</p>
				  ADSell is a web application project that allows the dealer to process any transaction related to their needs, through an online web application. 
				  <hr class="soften">
				  <h3>Our Objectives:</h3><br>
          <ul>
            <li>To primarily cater the services of Direct Selling Service Center.</li>
			<li>To serve as an online place between dealer and franchiser.</li>
          </ul>
				  <br>
				  <br>
				  <br>
			</div><!--/row-->
  
  
			<br>
			<br>
			<br>
			
	  </div> <!-- /.row -->
   </div> <!-- /.container fluid -->

     <!-- Footer
      ================================================== -->
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
					<img alt="Twitter" height="64" src="../img/twitter-logo.png" width="64">
					</a>
					<a href="http://www.facebook.com">
					<img alt="Facebook" height="64" src="../img/fb.png" width="64">
					</a>
					<a href="http://www.plus.google.com">
					<img alt="Google" height="64" src="../img/googleplus.png" width="64">
					</a>
					<a href="http://www.pinterest.com">
					<img alt="Google" height="64" src="../img/pin.png" width="64">
					</a>
					
					</p>
					<p><font color="gray">
								&#169; 2012 Alima Direct Selling -</font>
					<a href="/legal"><font color="white">Legal &amp; privacy stuff</font></a>
					</p>
				</div>	
				<div>
					<center><br><br><br><br>
						<p><dt><font color="gray">{Made in Philippines} </font><a href="index.php"><font color="gray">Home</font></a> | <a href="about.php"><font color="gray">About Us</font></a> | <a href="contact.php"><font color="gray">Contact Us</font></a> | <a href="privacypolicy.php"><font color="gray">Privacy Policy</font></a> | <a href=""><font color="gray">&copy; ADSell 2012</font></p>
					</center>
				</div>
		</div>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
