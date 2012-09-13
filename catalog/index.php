<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: ../index.php"); 
    exit();
}
include_once "../db_con/connect_to_mysql.php";
$id = $_SESSION['id'];
?>
<?php 
// whole list of viewing the category stored on the database
/*$category_list = "";
$sql = mysql_query("SELECT * FROM category ORDER BY cat_id DESC");
$categoryCount = mysql_num_rows($sql); // count the output amount
	if ($categoryCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
		$cat_id = $row["cat_id"];
		$category_name = $row["category_name"];
		$details = $row["details"];		
		$category_list .= 
		'<table width="100%" border="0" cellspacing="0" cellpadding="6">
			<tr>
				<td width="83%" valign="top"><a href="view.php?cat_id=' . $cat_id . '">' . $category_name . '<br /></a></td>
			</tr>
		</table>';
		}
} else {
echo "No categories yet.";
}*/
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
    <link href="/ADS/css/bootstrap.css" rel="stylesheet">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/ico/favicon.ico">
    <link rel="apple-touch-icon" href="/ADS/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/ADS/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/ADS/ico/apple-touch-icon-114x114.png">
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
                <a class="brand" href="../user/index.php"><img src="../img/ADSELL_png.png" height="35" width="80"></a>
              </li>
			  <li class="active"><a href="../catalog/index.php"><img src="../img/catalog.png"> Catalog</a></li>
			  <li><a href="../order/index.php"><img src="../img/cart.png"> Orders</a></li>
            </ul>	
			<ul class="nav pull-right">
                  <li id="fat-menu" class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/user.png"><b class="caret"></b></a>
                    <ul class="dropdown-menu">
					  <li>					  
					  <?php
						echo "<a href='../user/profile.php'><img src='../user_image/$id.jpg' width='30px' height='30px'> View my profile page</a>";
					  ?>
					  </li>
                      <li><a href="../user/profile.php"><i class="icon-cog"></i> Settings</a></li>
					  <li><a href="../logout.php"><i class="icon-off"></i> Sign Out</a></li>
                    </ul>
                  </li>
            </ul>
				<p class="navbar-text pull-right">Welcome! <?php echo $_SESSION['username']; ?>&nbsp;</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">  

<!-- Masthead
================================================== -->
  <div class="container-fluid">
    <div class="row-fluid">
	 <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><h3>All Category</h3></li>				
               <?php
					try{
						require_once "../db_con/config.php";
						$stmt = $conn->query("select * from category");
						$res = $stmt->fetchall(PDO::FETCH_ASSOC);						
						foreach($res as $cat){
						echo "<li><h3><br>" . $cat['category_name'] . "</h3></li><br>";
						$subcat = "select * from subcategory where category_id=".$cat['cat_id'];
						$sub = $conn->query($subcat);
						$subres = $sub->fetchall(PDO::FETCH_ASSOC);									
						foreach ($subres as $subcateg){
							echo "<li><a href=product.php?id=" . $subcateg['id'] . ">&nbsp;&nbsp;".$subcateg['name'] . "</a></li>";
								}		
							}									
						} catch (Exception $e){
							echo $e->getMessage();
						}
				?>
            </ul>
		  </div>
     </div><!--/.well -->
	 <div class="span9">
		<form class="form-search" action='search.php' method='GET'>        
			<div class="input-prepend">				
				<input class="input-xlarge" name='search' type="text" placeholder="Find Product">
				<input type='submit' class="btn" name='submit' value='Search'>
			</div>
		</form>
		<table class="table table-striped table-bordered table-condensed">	
				<thead>
				  <tr>
					<th>Product Name</th>
					<th>Description</th>
					<th>Price</th>
				  </tr>
				</thead>
					<?php
					require_once "../db_con/connect_to_mysql.php";
					$dynamicList = "";
					$sql = mysql_query("SELECT * FROM product ORDER BY id DESC LIMIT 30");
					$productCount = mysql_num_rows($sql); // count the output amount
						if ($productCount > 0) {
						while($row = mysql_fetch_array($sql)){ 
							$id = $row["id"];
							$product_name = $row["product_name"];
							$price = $row["price"];
							$details = $row["details"];
								echo "<tr>";
								echo "<td><a href='order.php?id=$id'>$product_name</a></td>";
								echo "<td>$details</td>";
								echo "<td>P $price.00</td>";
								echo "</tr>";
								echo "</tbody>";
							}
						} else {
						$dynamicList = "You have no products listed in your store yet";
						}
						
						/*require_once "../db_con/config.php";
						$sql = "select * from product order by id desc ";
						$statement = $conn->query($sql);
						$result = $statement->fetch();
						echo "<td />";
						echo "<a href=product.php?id=$id>" .$result['product_name'] . "<td />";
						echo $result['details'] . "<td />";
						echo $result['price'];
						*/
					?>	
		</table>		
	 </div>
	 <!--<div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><h3>Product Updates</h3></li>				
               	
            </ul>
		  </div>
     </div>.well -->
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
						<p><dt><font color="gray">{Made in Philippines} </font><a href="../user/index.php"><font color="gray">Home</font></a> | <a href="../info/about.php"><font color="gray">About Us</font></a> | <a href="../info/contact.php"><font color="gray">Contact Us</font></a> | <a href="../info/privacypolicy.php"><font color="gray">Privacy Policy</font></a> | <a href=""><font color="gray">&copy; ADSell 2012</font></p>
					</center>
				</div>
		</div>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/ADS/js/jquery.js"></script>
    <script src="/ADS/js/application.js"></script>
  </body>
</html>
