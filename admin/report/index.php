<?php 
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: /ADS/index.php"); 
    exit();
}
// Connect to the MySQL database  
include "../../db_con/connect_to_mysql.php"; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ADSell / Reports</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
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
    <link href="/ADS/css/bootstrap-responsive.css" rel="stylesheet">
	

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/img/ico/adsell.png">
  </head>

<body background="/ADS/img/grain.jpg" bgcolor="#333333"> 
   <br>
   <br>
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
			  <li><a class="brand" href="../index.php"><img src="/ADS/img/ADSELL_png.png" height="35" width="80"></a></li>
			  <li><a href="../category/index.php"><img src="../img/catalog.png"><b> Catalog</b></a></li>
			  <li><a href="../orders/index.php"><img src="../img/cart.png"><b> Orders</b></a></li>
			  <li><a href="../user/index.php"><img src="../img/user.png"><b> Dealers</b></a></li>
			  <li class="active"><a href="../report/index.php"><img src="../img/report.png"><b> Reports</b></a></li>
			  <!--<li><a href="../custom/view.php"><img src="../img/conf.png"> Configuration</a></li>-->
			  <li><a href="#contact"><img src="../img/sms.png"><b> SMS</b></a></li>
           </ul>
		   <p class="navbar-text pull-right"><b>Howdy! <?php echo $_SESSION['manager']; ?></b>&nbsp;<a href="../logout.php">Sign Out</a></p>
		  </div><!--/.nav-collapse -->			
        </div>
      </div>
    </div>

    <div class="container-fluid">
		<form class="form-search pull-right" action='../category/search.php' method='GET'>        
				<div class="clearfix">
					<input class="input-xlarge" name='search' type="text" placeholder="Find Product">&nbsp;
					<input type='submit' class="btn btn-primary" name='submit' value='Search'>
				</div>
		</form><br><br>
		<hr>
      <div class="row-fluid">
        <div class="span12">
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs">
				  <li class="active"><a href="#lA" data-toggle="tab"><h3>Daily</h3></a></li>
				  <li><a href="#lB" data-toggle="tab"><h3>Weekly</h3></a></li>
				  <li><a href="#lC" data-toggle="tab"><h3>Monthly</h3></a></li>
				  <li><a href="#lD" data-toggle="tab"><h3>Annual</h3></a></li>
				</ul>
				<div class="tab-content">
				  <div class="tab-pane active" id="lA">
					<p>I'm in Section A.</p>
				  </div>
				  <div class="tab-pane" id="lB">
					<p>Howdy, I'm in Section B.</p>
				  </div>
				  <div class="tab-pane" id="lC">
					<p>What up girl, this is Section C.</p>
				  </div>
				  <div class="tab-pane" id="lD">
					<p>What up girl, this is Section C.</p>
				  </div>
				</div>
			</div> <!-- /tabbable -->
        </div><!--/span3 end here!-->
	  </div>
      <!-- for category list and product list tab -->	  
	    <div class="span9">
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
    <script src="/ADS/js/bootstrap-transition.js"></script>
    <script src="/ADS/js/bootstrap-modal.js"></script>
    <script src="/ADS/js/bootstrap-tab.js"></script>
    <script src="/ADS/js/bootstrap-carousel.js"></script>
	<script src="/ADS/js/bootbox.js"></script>
	<script src="/ADS/js/jquery-1.7.2.min.js"></script>
	<script src="/ADS/js/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="/ADS/js/jquery.smooth-scroll.min.js"></script>
	<script src="/ADS/js/lightbox.js"></script>
	<script>
	  jQuery(document).ready(function($) {
		  $('a').smoothScroll({
			speed: 1000,
			easing: 'easeInOutCubic'
		  });

		  $('.showOlderChanges').on('click', function(e){
			$('.changelog .old').slideDown('slow');
			$(this).fadeOut();
			e.preventDefault();
		  })
	  });

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-2196019-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
    <!-- bootbox code -->	
    <script>
        $(function() {

            $("a.confirm").click(function(e) {
                e.preventDefault();
                bootbox.confirm("Are you sure?", function(confirmed) {
                    console.log("Confirmed: "+confirmed);
                });
            });
        });
    </script>	
</body>
</html>
