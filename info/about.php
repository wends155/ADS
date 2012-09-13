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
    <title>ADSell / About Us</title>
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
              <li class="active">
                <a class="brand" href="../user/index.php"><img src="../img/ADSELL_png.png" height="35" width="80"></a>
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
			<div class="span9">
				  <h1>We're a small team ...</h1>
				  <br>
				  <p>We believe the internet is an incredible force for good and should be harnessed to enrich peoples lives. Our goal is to shine a light on direct selling products and connect dealers with their franchiser. We're here in the part of Davao del Norte.
				  </p>
				  
					<ul class="thumbnails">
						<li class="span4">
							<div class="thumbnail"> 
							<img src="../img/mari.jpg" alt="Team ADSell - Mari" width="290px" height="190px">
							<h4>Mari</h4>
							</div> 
						</li>
						<li class="span4">
							<div class="thumbnail"> 
							<img src="../img/jela.jpg" alt="Team ADSell  - Jela" width="290px" height="190px">
							<h4>Jelai</h4>
							</div> 
						</li>
						<li class="span4">
							<div class="thumbnail"> 
							<img src="../img/flor.jpg" alt="Team ADSell - Flor" width="290px" height="190px">
							<h4>Flor</h4>
							</div> 
						</li>
					</ul>
					 <div class="row">
						<div class="span4">
							<h2>We believe in:</h2>
						</div>
						<div class="span8">
							<p>Sustainability &amp; building relationships through commerce.</p>
							<p>Artistic integrity &amp; individuality. Quality over quantity.</p>
							<p>Disrupting the status-quo. Being radical &amp; brave.</p>
							<p>Empowerment &amp; self actualization. We all exist for a purpose.</p>
							<p>Championing the underdog. Taking on the establishment.</p>
							<p>Transforming mundane into exquisite. Banal into mind-blowing.</p>
						</div>
					</div>
				  
				  <br>
				  <h1 id="tagline">The fastest, simplest way to stay close to everything you care about.</h1>
				  <br>
				  <h3>A service center</h3>
				  <p>ADSell is a direct selling service center that connects you to the latest products which is interesting and cater the number of dealers who sell products for their living and additional income as investors.</p>
				  <p>
				  <br>
				  <h3>ADSell serves...</h3>
				  ADSell primarily supervise and monitor our valued dealers respectively, the service center help the people to economize and treasure the importance of being a dealer.</p>
				  <br>
				  <h3>ADSell for SMS</h3>
				  <p>ADSell for SMS is an instant infrastructure for mobile communications of dealers and franchiser. The franchiser and dealers can use SMS to connect directly.
				  ADSell share the trust, love and respect through their valued dealers all over the country.
				  </p>
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
						<p><dt><font color="gray">{Made in Philippines} </font><a href="../user/index.php"><font color="gray">Home</font></a> | <a href="about.php"><font color="gray">About Us</font></a> | <a href="contact.php"><font color="gray">Contact Us</font></a> | <a href="privacypolicy.php"><font color="gray">Privacy Policy</font></a> | <a href="../user/index.php"><font color="gray">&copy; ADSell 2012</font></p>
					</center>
				</div>
		</div>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
