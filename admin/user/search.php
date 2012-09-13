<?php 
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: ../login.php"); 
    exit();
}
include "../config/connect_to_mysql.php"; 
?>
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
			  <li><a class="brand" href="../index.php"><img src="/ADS/img/ADSELL_png.png" height="35" width="80"></a></li>
			  <li><a href="../category/index.php"><img src="../img/catalog.png"> Catalog</a></li>
			  <li><a href="orders/index.php"><img src="../img/cart.png"> Orders</a></li>
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
		<div class="span12">
		 <?php
			$button = $_GET ['submit'];
			$search = $_GET ['search']; 
				if(!$button)
					echo "<div class='alert alert-block alert-error fade in'>
							<a class='close' data-dismiss='alert' href='index.php'>&times;</a>
							<h4 class='alert-heading'>You got an error!</h4>
							<p>Sorry, you didn't submit any keyword.</p>
						  </div>";
				else
				{
				if(strlen($search)<=1)
					echo "<div class='alert alert-block alert-error fade in'>
							<a class='close' data-dismiss='alert' href='index.php'>&times;</a>
							<h4 class='alert-heading'>You got an error!</h4>
							<p>Sorry, the search term is too short.</p>
						  </div>";
				else{
					include "../config/connect_to_mysql.php"; 
					$search_exploded = explode (" ", $search);
					foreach($search_exploded as $search_each)
						{
							$x++;
							if($x==1)
							$construct .="name LIKE '%$search_each%'";
							else
							$construct .="AND name LIKE '%$search_each%'";
						}
					$construct ="SELECT * FROM users WHERE $construct";
					
				echo "<table class='table table-striped'>";
					echo "<th>Name</th>";
					echo "<th>Date Joined</th>";
						$run = mysql_query($construct);
						$foundnum = mysql_num_rows($run);
						if ($foundnum==0)
						echo "<div class='alert alert-block alert-error fade in'>
								  <a class='close' data-dismiss='alert' href='index.php'>&times;</a>
								  <h4 class='alert-heading'>You got an error!</h4>
								  <p>Sorry, there are no matching dealer record for <b>$search</b>.</br></br>1. 
									Try another name. </br>2. Try different name with similar meaning.</br>3. Please check your spelling.</p>
						      </div>";
						else
					{
						echo "<div class='alert alert-info'><strong>Heads up!</strong> $foundnum results found.</div>";				
					while($runrows = mysql_fetch_assoc($run))
						{
						$id = $runrows ['id'];
						$name = $runrows ['name'];
						$date = $runrows ['date'];		
									echo "<tr><br>";
									echo "<td><a href='view.php?id=$id'>$name</a></td> ";
									echo "<td>$date</td>";
									echo "</tr>";
					
						}
					}
				 echo "</table>";
				}
			}
		?>		
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
  </body>
</html>
