<?php 
session_start();
if (!isset($_SESSION["manager"])) {
   header("location: ../login.php"); 
    exit();
}
?>
<?php
include "../config/connect_to_mysql.php"; 
if (isset($_POST['username'])) {
    $username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$sql = mysql_query("SELECT id FROM admin WHERE username='$username' LIMIT 1");
	$productMatch = mysql_num_rows($sql); // count the output amount
    if ($productMatch > 0) {
		echo 'Sorry you tried to place a duplicate "Username" into the system, <a href="view.php">click here</a>';
		exit();
	}
	// Add this product into the database now
	$sql = mysql_query("INSERT INTO admin (username, password, date) 
        VALUES('$username','$password', now())") or die (mysql_error());
     $id = mysql_insert_id();
	header("location: view.php"); 
    exit();
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
			  <li>
				<a class="brand" href="../index.php"><img src="/ADS/img/ADSELL_png.png" height="35" width="80"></a>
			  </li>
			  <li><a href="../category/index.php"><img src="../img/catalog.png"> Catalog</a></li>
			  <li><a href="../orders/index.php"><img src="../img/cart.png"> Orders</a></li>
			  <li><a href="../user/index.php"><img src="../img/user.png"> Dealers</a></li>
			  <li><a href="../report/index.php"><img src="../img/report.png"> Reports</a></li>
			  <li class="active"><a href="../custom/view.php"><img src="../img/conf.png"> Configuration</a></li>
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
			   <li class="active"><a href="view.php"><i class="icon-search"></i> View User</a></li>
			   <li><a href="edit.php"><i class="icon-edit"></i> Change Password</a></li>
			   <li><a data-toggle="modal" href="#userForm"><i class="icon-user"></i> Add User</a></li>
            </ul>
          </div><!-- other side bar end here! -->
        </div><!--/span4 end here!-->		
		<div class="span6">	
		
		<!-- modal for addidng admin user -->
		<div id="userForm" class="modal hide fade">	
             <form class="form-horizontal" action="view.php" name="myForm" id="myform" method="post">
			  <br>
				<div class="modal-header">
				  <a class="close" data-dismiss="modal" >&times;</a>
				  <h3>Add New Admin User</h3>
				</div>
				 <div class="modal-body">
					  <p><code>Note:</code> All field mark with <code>*</code> are required.</p>
					  <br>
					  <div class="control-group">
						<label>Username*:</label>
						<div class="controls">
						  <input name="username" type="text" id="username"/>
						</div>
					  </div>
					  <div class="control-group">
						<label>Password*:</label>
						<div class="controls">
						  <input name="password" type="password" id="password"/>
						</div>
					  </div>
				 </div>
					  <div class="form-actions">
						<button type="submit" class="btn btn-success">Add User</button>&nbsp;
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					  </div>
				  </form>			
        </div>
		
		<!-- table for viewing admin user -->
		<table class="table table-striped table-bordered table-condensed">	
				<thead>
				  <tr>
					<th>ID</th>
					<th>Username</th>
					<th>Date Joined</th>
					<!-- <th>Action</th> -->
				  </tr>
				</thead>
					<?php 
						// whole list of viewing the products stored on the database
						$admin_list = "";
						$sql = mysql_query("SELECT * FROM admin");
						$adminCount = mysql_num_rows($sql); // count the output amount
						if ($adminCount > 0) {
							while($row = mysql_fetch_array($sql)){ 
									 $id = $row["id"];
									 $username = $row["username"];
									 $date = strftime("%b %d, %Y", strtotime($row["date"]));
									echo "<tr>";
									echo "<td>$id</td>";
									echo "<td>$username</td>";
									echo "<td>$date</td>";
									//echo "<td><a href='index.php?deleteid=$id'><img src='/ADS/img/trash.png' /></a>&nbsp; &nbsp;<a href='edit.php?pid=$id'><img src='/ADS/img/edit.png' /></a></td>";
									echo "</tr>";
									echo "</tbody>";
							}
						} else {
							$product_list = "You have no products listed in your store yet";
						}
				?>			
			  </table>		
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
	
    
</body>
</html>