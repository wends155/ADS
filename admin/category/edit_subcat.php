<?php 
session_start();
if (!isset($_SESSION["manager"])) {
   header("location: /ADS/index.php"); 
    exit();
}
// Connect to the MySQL database  
include "../config/connect_to_mysql.php"; 
?>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['name'])) {	
	$sub_id = mysql_real_escape_string($_POST['thisID']);
    $name = mysql_real_escape_string($_POST['name']);
	$sql = mysql_query("UPDATE subcategory SET name='$name' WHERE sub_id='$sub_id'");
	header("location: index.php"); 
    exit();
}
?>
<?php 
if (isset($_GET['id'])) {
	$targetID = $_GET['id'];
    $sql = mysql_query("SELECT * FROM subcategory WHERE sub_id='$targetID' LIMIT 1");
    $subcatCount = mysql_num_rows($sql); // count the output amount
    if ($subcatCount > 0) {
	    while($row = mysql_fetch_array($sql)){            
			 $name = $row["name"];
        }
    } else {
	    echo "Sorry that crap dont exist.";
		exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ADSell / Edit Sub-Category</title>
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
    <link rel="shortcut icon" href="/ADS/img/ico/adsell.png">
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
			  <li class="active"><a href="../category/index.php"><img src="../img/catalog.png"><b> Catalog</b></a></li>
			  <li><a href="../orders/index.php"><img src="../img/cart.png"><b> Orders</b></a></li>
			  <li><a href="../user/index.php"><img src="../img/user.png"><b> Dealers</b></a></li>
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
      <div class="row-fluid">
        <div class="span3">
		  <div class="well sidebar-nav">
			<ul class="nav nav-list">
			  <li class="nav-header"><h3>Search Product</h3></li><br>
				<div class="controls">
					<form class="form-search" action='search.php' method='GET'>        
							<div class="clearfix">
								<input class="input-small" name='search' type="text" placeholder="Find Product">&nbsp;
								<input type='submit' class="btn btn-primary" name='submit' value='Go'>
							</div>
					</form>
				</div>
            </ul>
          </div><!--/.well -->
        </div><!--/span4 end here!-->
		<div class="span9">
				<ul class="breadcrumb">
					<li><a href="index.php">Catalog</a> <span class="divider">/</span></li>
					<li class="active"><h4>Edit Category</h4></li>
				</ul>
				<div class="well">
				   <form class="form-horizontal" action="edit_subcat.php" name="myForm" id="myform" method="post">
					<fieldset>
					  <h2>Edit Category</h2><hr>
					  <p><code>Note:</code> All field mark with <code>*</code> are required.</p><br>
					  <div class="control-group">
						<label class="control-label">Category  Name*:</label>
						<div class="controls">
						  <input name="name" type="text" id="name" value="<?php echo $name; ?>"/>
						</div>
					  </div>
					  <div class="form-actions">
						<button type="submit" class="btn btn-medium btn-primary" name="thisID" value="<?php echo $targetID; ?>"><b>Update Category </b></button>
						<button type="reset" class="btn btn-medium btn-danger" onClick="window.location.href='index.php'"><b>Cancel</b></button>
					  </div>					 
					</fieldset>
				  </form>
				</div>
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
    <script src="/ADS/js/bootstrap-dropdown.js"></script>
	<script src="/ADS/js/bootstrap-carousel.js"></script>
    
</body>
</html>