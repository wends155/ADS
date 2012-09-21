<?php
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: /ADS/index.php"); 
    exit();
}
include "../../db_con/connect_to_mysql.php"; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ADSell / Dealers</title>
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
			  <li class="active"><a href="index.php"><img src="../img/user.png"><b> Dealers</b></a></li>
			  <li><a href="../report/index.php"><img src="../img/report.png"><b> Reports</b></a></li>
			  <!--<li><a href="../custom/view.php"><img src="../img/conf.png"> Configuration</a></li>-->
			  <li><a href="#contact"><img src="../img/sms.png"><b> SMS</b></a></li>
            </ul>
			<p class="navbar-text pull-right"><b>Howdy! <?php echo $_SESSION['manager']; ?></b>&nbsp;<a href="../logout.php">Sign Out</a></p>
		  </div><!--/.nav-collapse -->			
        </div>
      </div>
    </div>
    <div class="container-fluid">
		<form class="form-search pull-right" action='search.php' method='GET'>        
			<div class="clearfix">
				<input class="input-xlarge" name='search' type="text" placeholder="Find Dealer">
				<input type='submit' class="btn btn-primary" name='submit' value='Search'>
			</div>
		</form>
      <div class="row-fluid">
		 <div class="span12">
		  <div class="well">
			<table class="table table-striped">	
					<th class="id">Dealer ID</th>
					<th class="name">Name</th>
					<th>Username</th>	
					<th>Date Joined</th>
					<th>More Details</th>
					<th>Action</th>
					<br>
				<?php 
					// DELETE DEALER QUESTION
					if (isset($_GET['deleteid'])) {
						echo '<div class="alert alert-block alert-error fade in">
												<a class="close" data-dismiss="alert" href="index.php">&times;</a>
												<h4 class="alert-heading">Are you sure you want to delete the dealer account?</h4><br>
												  <a class="btn btn-danger small" href="index.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a>&nbsp; <a class="btn small" href="index.php">No</a>
							   </div>';				
									echo "";
									exit();
								}
					if (isset($_GET['yesdelete'])) {
						$id_to_delete = $_GET['yesdelete'];
						$sql = mysql_query("DELETE FROM users WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
						$pictodelete = ("ADS/user_image/$id_to_delete.jpg");
						if (file_exists($pictodelete)) {
									unlink($pictodelete);
						}
					}
				?>
				<?php 
						// whole list of viewing the products stored on the database
						$user_list = "";
						$sql = mysql_query("SELECT * FROM users ORDER BY id DESC");
						$userCount = mysql_num_rows($sql); // count the output amount
						if ($userCount > 0) {
							while($row = mysql_fetch_array($sql)){ 
									 $id = $row["id"];
									 $name = $row["name"];
									 $username = $row["username"];
									 $date = strftime("%b %d, %Y", strtotime($row["date"]));
									echo "<tr>";
									echo "<td>$id</td>";
									echo "<td>$name</td>";
									echo "<td>$username</td>";
									echo "<td>$date</td>";
									echo "<td><a class='btn btn-small btn-info' href='view.php?id=$id'> More Info</a></td>";
									echo "<td><a class='btn btn-small btn-danger' href='index.php?deleteid=$id'> Delete</a></td>";
									echo "</tr>";
							}
						} else {
							$user_list = "You have no products listed in your store yet";
						}
				?>				
			</table>
		  </div>
		</div>
      </div><!--/row fluid outside-->
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
	<script src="/ADS/js/bootstrap-modal.js"></script>
	<script src="/ADS/js/bootstrap-transition.js"></script>
  </body>
</html>
