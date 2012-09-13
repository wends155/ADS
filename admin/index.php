<?php
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: login.php"); 
    exit();
}
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); 
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); 
$password = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); 
// Connect to the MySQL database  
include "config/connect_to_mysql.php"; 
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1"); // query the person

// ------- if the user exist in the database ---------
$existCount = mysql_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
	 echo "Your login session data is not on record in the database.";
     exit();
}
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
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>		  
          <div class="nav-collapse">
            <ul class="nav">	
			  <li class="active"><a class="brand" href="index.php"><img src="/ADS/img/ADSELL_png.png" height="35" width="80"></a></li>
			  <li><a href="category/index.php"><img src="img/catalog.png"> Catalog</a></li>
			  <li><a href="orders/index.php"><img src="img/cart.png"> Orders</a></li>
			  <li><a href="user/index.php"><img src="img/user.png"> Dealers</a></li>
			  <li><a href="report/index.php"><img src="img/report.png"> Reports</a></li>
			  <li><a href="custom/view.php"><img src="img/conf.png"> Configuration</a></li>
			  <li><a href="#contact"><img src="img/sms.png"> SMS</a></li>
            </ul>
			<p class="navbar-text pull-right">Howdy! <?php echo $_SESSION['manager']; ?>&nbsp;<a href="logout.php">Sign Out</a></p>
		  </div><!--/.nav-collapse -->			
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
		<div class="well sidebar-nav"> 
            <ul class="nav nav-list">
			 <li class="nav-header"><h3>Find it here!</h3></li>
			    <br>
				<label>Dealer  Name: </label>
				<div class="controls">
					<form class="form-search" action='user/search.php' method='GET'>        
							<div class="input-prepend">
								<input class="input-small" name='search' type="text" placeholder="Find Dealer">
								<input type='submit' class="btn" name='submit' value='Go'>
							</div>
					</form>
				</div>
				<label>Product  Name: </label>
				<div class="controls">
					<form class="form-search" action='category/search.php' method='GET'>        
							<div class="input-prepend">
								<input class="input-small" name='search' type="text" placeholder="Find Product">
								<input type='submit' class="btn" name='submit' value='Go'>
							</div>
					</form>
				</div>
				<label>Date: </label>
				<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
				<input class="input-small" type="text" value="12-02-2012" readonly>
				<span class="add-on"><i class="icon-th"></i></span>
			  </div>
            </ul>
          </div>		  
		  <!-- side bar for share the love -->
		  <div class="well sidebar-nav"> <!-- other side bar start here-->
            <ul class="nav nav-list">
			
              <li class="nav-header"><h3>Share the Love</h3></li>
					<br>
					<center>
					<a href="http://twitter.com">
					<img alt="Twitter" height="64" src="/ADS/img/twitter-logo.png" width="64">
					</a>
					<a href="http://www.facebook.com">
					<img alt="Facebook" height="64" src="/ADS/img/fb.png" width="64">
					</a><br>
					<a href="http://www.plus.google.com">
					<img alt="Google" height="64" src="/ADS/img/googleplus.png" width="64">
					</a>
					<a href="http://www.pinterest.com">
					<img alt="Google" height="64" src="/ADS/img/pin.png" width="64">
					</a>
					</center>           
            </ul>
          </div><!-- other side bar end here! -->
		  
		  
		  <!-- side bar for ticker -->
		  
        </div><!--/span4 end here!-->
      
		 <div class="span9">
		    <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
              <div class="item active">
				<div class="thumbnail">
					<img src="/ADS/img/e.jpg" alt="">
				</div>
              </div>
              <div class="item">
				<div class="thumbnail">
					<img src="/ADS/img/d.jpg" alt="">
				</div>
              </div>
              <div class="item">
				<div class="thumbnail">
					<img src="/ADS/img/ds.jpg" alt="">
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
          </div><br>
				  <h1>To our valued dealers...</h1><br>
				  <p>ADSell is a direct selling service company which cater the number of dealers who sell products for their living and additional income as investors.</p>
				  <p>
				  ADSell primarily supervise and monitor our valued dealers respectively, the service center help the people to economize and treasure the importance of being a dealer.</p>
				  <p>
				  ADSell share the trust, love and respect through their valued dealers all over the country.
				  </p>
		  </div><!--/row-->
		
       
		
      </div><!--/row fluid outside-->
	  
	  
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
	<script src="/ADS/js/bootstrap-transition.js"></script>
	<script src="/ADS/js/bootstrap-carousel.js"></script>
	<script src="/ADS/js/bootstrap-datepicker.js"></script>
    <script src="/ADS/js/bootstrap-tooltip.js"></script>
    <script src="/ADS/js/bootstrap-popover.js"></script>
	<script src="/ADS/js/application.js"></script>
	<script>
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'mm-dd-yyyy'
			});
			$('#dp2').datepicker();
			$('#dp3').datepicker();
			
			
			var startDate = new Date(2012,1,20);
			var endDate = new Date(2012,1,25);
			$('#dp4').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() > endDate.valueOf()){
						$('#alert').show().find('strong').text('The start date can not be greater then the end date');
					} else {
						$('#alert').hide();
						startDate = new Date(ev.date);
						$('#startDate').text($('#dp4').data('date'));
					}
					$('#dp4').datepicker('hide');
				});
			$('#dp5').datepicker()
				.on('changeDate', function(ev){
					if (ev.date.valueOf() < startDate.valueOf()){
						$('#alert').show().find('strong').text('The end date can not be less then the start date');
					} else {
						$('#alert').hide();
						endDate = new Date(ev.date);
						$('#endDate').text($('#dp5').data('date'));
					}
					$('#dp5').datepicker('hide');
				});
		});
	</script>
    
    
    
    
  </body>
</html>
