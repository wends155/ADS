<?php
 session_start();
 if (!isset($_SESSION['id'])) {
    header("location: ../index.php"); 
    exit();
}
//Connect to the database through our include 
include_once "../db_con/connect_to_mysql.php";
// Place Session variable 'id' into local variable
$id = $_SESSION['id'];
// Process the form if it is submitted
if ($_POST['street']) {
    $username = $_POST['username'];
	$status = $_POST['status'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
	$cnum = $_POST['cnum'];
	$nationality = $_POST['nationality'];
	$bio = $_POST['bio'];
    $sql = mysql_query("UPDATE users SET username='$username', status='$status', street='$street', city='$city', province='$province', cnum='$cnum', nationality='$nationality', bio='$bio' WHERE id='$id'"); 
    header("location: index.php");
exit();
}
?>
<?php 
$sql = mysql_query("SELECT * FROM users WHERE id='$id' LIMIT 1");
while($row = mysql_fetch_array($sql)){ 
			 $id = $row["id"];
			 $fullname = $row["name"];
			 $username = $row["username"];
			 $gender = $row["gender"];
			 $status = $row["status"];
			 $date = date ("Y-m-d");
			 $street = $row["street"];
			 $city = $row["city"];
			 $province = $row["province"];
			 $cnum = $row["cnum"];
			 $nationality = $row["nationality"];
			 $bio = $row["bio"];
			 $status = $row["status"];
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
    <link href="/ADS/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="/ADS/css/lightbox.css" type="text/css" media="screen" />
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/ico/favicon.ico">
    <link rel="apple-touch-icon" href="/ADS/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/ADS/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/ADS/ico/apple-touch-icon-114x114.png">
	 <style type="text/css">
      body {
        padding-top: 50px;
        padding-bottom: 0px;
		
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

  <body background="/ADS/img/grain.jpg" bgcolor="#333333" data-spy="scroll" data-target=".subnav" data-offset="50"> 
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
			  <li><a href="../catalog/index.php"><img src="../img/catalog.png"> Catalog</a></li>
			  <li><a href="../order/index.php"><img src="../img/cart.png"> Orders</a></li>
            </ul>	
			<ul class="nav pull-right">
                  <li id="fat-menu" class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/user.png"><b class="caret"></b></a>
                    <ul class="dropdown-menu">
					  <li>					  
					  <?php
						echo "<a href='profile.php'><img src='../user_image/$id.jpg' width='30px' height='30px'> View my profile page</a>";
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
  <br>
  <div class="container-fluid">  
    <div class="row-fluid">
		<div class="span4">
		  <div class="well">
			  <div class="content">
					<?php
						echo "<li class='span5'>
								<div class='thumbnail'> 
									<a href='../user_image/$id.jpg' rel='lightbox'>
									<img src='../user_image/$id.jpg' width='100px' height='100px'></a>
								</div>
							  </li><br><br>";
					?>
					<br>
					<li class="span7"><h4><a href="profile.php"><?php echo $fullname; ?></a></h4><p>View my profile page</p></li>
					<br><br><br>
			  </div>
			  <br><br>
			  <ul id="tab" class="nav nav-tabs">
				<li class="active"><a href="#balance" data-toggle="tab">Balance</a></li>
				<li><a href="#due" data-toggle="tab">Dues</a></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Updates <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="#new" data-toggle="tab"><i class="icon-check"></i> New Items</a></li>
					<li><a href="#discounted" data-toggle="tab"><i class="icon-arrow-down"></i> Discounted Items</a></li>
				  </ul>
				</li>
			  </ul> 
			  <div id="myTabContent" class="tab-content">
				<div class="tab-pane fade in active" id="balance">
				  <p>Dealer's Credit</p>
				</div>
				<div class="tab-pane fade" id="due">
				  <p>Dealer's Due Date</p>
				</div>
				<div class="tab-pane fade" id="new">
				  <table class="table table-striped table-bordered table-condensed">	
						<thead>
						  <tr>
							<th width="6%">Product Name</th>
							<th width="3%">Price</th>
						  </tr>
						</thead>
							<?php 
								// whole list of viewing the products stored on the database
								$dynamicList = "";
								$sql = mysql_query("SELECT * FROM product ORDER BY id DESC LIMIT 7");
								$productCount = mysql_num_rows($sql); // count the output amount
								if ($productCount > 0) {
									while($row = mysql_fetch_array($sql)){ 
											 $id = $row["id"];
											 $product_name = $row["product_name"];
											 $price = $row["price"];
											echo "<tr>";
											echo "<td><a href='../catalog/order.php?id=$id'>$product_name</a></td>";
											echo "<td>P $price</td>";
											echo "</tr>";
											echo "</tbody>";
									}
								} else {
									$dynamicList = "You have no products listed in your store yet";
								}
							?>			
				   </table>	
				   <p align="right"><a href="../catalog/index.php">More Items >></a></p>
				</div>
				<div class="tab-pane fade" id="discounted">
				  <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
				</div>
			  </div>
		  </div>
		<div class="well sidebar-nav"> 
            <ul class="nav nav-list">
			 <li class="nav-header"><h3>Search Product</h3></li>
			    <br>
				<div class="controls">
					<form class="form-search" action='../catalog/search.php' method='GET'>        
							<div class="input-prepend">
								<input class="input-medium" name='search' type="text" placeholder="Find Product">
								<input type='submit' class="btn btn-primary" name='submit' value='Go'>
							</div>
					</form>
				</div>
				<label>Date: </label>
				<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
				<input class="input-medium" type="text" value="12-02-2012" readonly>
				<span class="add-on"><i class="icon-th"></i></span>
			  </div>
            </ul>
          </div>
        </div><!--/.well -->
         
		<!-- modal to view profile -->
		<div id="prof" class="modal hide fade">	
             <form class="form-horizontal" action="index.php" name="myForm" id="myform" method="post">
			  <br>
				<div class="modal-header">
				  <a class="close" data-dismiss="modal" >&times;</a>
				  <h4><?php echo $_SESSION['username']; ?>'s information</h4>
				</div>
				 <div class="modal-body">
				   <div class="span11">
					<table class="table table-striped">	
					  <tr>
						<?php
					    echo "<img src='user_image/$id.jpg' /><br />
						<a href='user_image/$id.jpg'>View Full Size Image</a>";
						?>
					  </tr>
					  <tr>
						<th><h4>Dealer ID :</h4></th>
						<td><?php echo $id; ?></td>					   
					  </tr>
					  <tr>
						<th><h4>Fullname :</h4></th>
						<td><?php echo $fullname; ?></td>
					  </tr>
					  <tr>
						<th><h4>Username :</h4></th>
						<td><?php echo $username; ?></td>
					  </tr>
					  <tr>
						<th><h4>Gender :</h4></th>
						<td><?php echo $gender; ?></td>
					  </tr>
					  <tr>
						<th><h4>Status :</h4></th>
						<td><?php echo $status; ?></td>
					  </tr>
					  <tr>
						<th><h4>Date Joined :</h4></th>
						<td><?php echo $date; ?></td>
					  </tr>
					   <tr>
						<th><h4>Street :</h4></th>
						<td><?php echo $street; ?></td>					   
					  </tr>
					  <tr>
						<th><h4>City :</h4></th>
						<td><?php echo $city; ?></td>
					  </tr>
					  <tr>
						<th><h4>Province :</h4></th>
						<td><?php echo $province; ?></td>
					  </tr>
					  <tr>
						<th><h4>Contact Number :</h4></th>
						<td><?php echo $cnum; ?></td>
					  </tr>
					  <tr>
						<th><h4>Nationality :</h4></th>
						<td><?php echo $nationality; ?></td>
					  </tr>
					  <tr>
						<th><h4>Bio :</h4></th>
						<td><?php echo $bio; ?></td>
					  </tr>
				    </table>		
				   </div>
				 </div>
			 </form>			
        </div> 
		
		<!-- modal to edit information -->
		<div id="edit" class="modal hide fade">	
             <form class="form-horizontal" action="index.php"  name="myForm" id="myform" method="post">
			  <br>
				<div class="modal-header">
				  <a class="close" data-dismiss="modal" >&times;</a>
				  <h3>Account Information</h3>
				  <p class="help-block">Change your basic account information.</p>
				</div>
				 <div class="modal-body">
				   <div class="span11">
					  <div class="control-group">
						<label class="control-label" for="input01">Username:</label>
						  <div class="controls">
							<input type="text" name="username" id="username" value="<?php echo $_SESSION['username'];?>">
							<p class="help-block">Enter your username, to recognize you.</p>
						  </div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="input01">Status:</label>
						  <div class="controls">
			                <input type='text' class="input-xlarge" name='status' value='<?php echo $status; ?>'>
			                <p class="help-block">What status are you?</p>
			              </div>
		             </div>
				   	 <div class="control-group">
						<label class="control-label" for="input01">Street:</label>
						  <div class="controls">
			                <input type='text' class="input-xlarge" name='street' value='<?php echo $street; ?>'>
			                <p class="help-block">What street are you located?</p>
			              </div>
		             </div>
		             <div class="control-group">
				        <label class="control-label" for="input01">City:</label>
				          <div class="controls">
				           <input type='text' class="input-xlarge" name='city' value='<?php echo $city; ?>'>
				           <p class="help-block">What city are you located?</p>
				          </div>
		             </div>
		             <div class="control-group">
				        <label class="control-label" for="input01">Province:</label>
				          <div class="controls">
				           <input type='text' class="input-xlarge" name='province' value='<?php echo $province; ?>'>
				           <p class="help-block">What province are you located?</p>
				          </div>
		             </div>
					 <div class="control-group">
				        <label class="control-label" for="input01">Contact Number:</label>
				          <div class="controls">
				           <input type='text' class="input-xlarge" name='cnum' value='<?php echo $cnum; ?>'>
				           <p class="help-block">What is your mobile phone number?</p>
				          </div>
		             </div>
		             <div class="control-group">
				        <label class="control-label" for="input01">Nationality:</label>
				          <div class="controls">
				            <input type='text' class="input-xlarge" name='nationality' value='<?php echo $nationality; ?>'>
				            <p class="help-block">What nationality are you?</p>
				          </div>
		             </div>
		             <div class="control-group">
                        <label>Bio:</label>
                          <div class="controls">
                            <textarea class="input-xlarge" name="bio" rows="3"><?php echo $bio; ?></textarea>
			                <p class="help-block">About yourself in fewer than 160 characters.</p>
                          </div>
                     </div>
		  <hr>
		  <p align="center">
			  <input class="btn btn-medium btn-success" type='submit' name='Submit' value='Save Changes'>
			  <input class='btn btn-medium' type='submit' value='Cancel'>
		  </p>
		  <br>
      </form>
				   </div>
				 </div>
					
        </div> 
		  
			<div class="span8">
				<div id="myCarousel" class="carousel slide">
					<div class="carousel-inner">
					  <div class="item active">
							<div class="thumbnail"> 
								<img src="../img/e.jpg" alt="">
							</div> 
					  </div>
					  <div class="item">
							<div class="thumbnail">
								<img src="../img/ds.jpg" alt="">
							</div>
					  </div>
					  <div class="item">
							<div class="thumbnail">
								<img src="../img/d.jpg" alt="">
							</div>
					  </div>
					  <div class="item">
							<div class="thumbnail">
								<img src="../img/ADSELL.png" alt="">
							</div>
					  </div>
					</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
				</div><br>
				<div class="well">
				  <h1>To our valued dealers...</h1><br>
				  <p>ADSell is a direct selling service company which cater the number of dealers who sell products for their living and additional income as investors.</p>
				  <p>
				  ADSell primarily supervise and monitor our valued dealers respectively, the service center help the people to economize and treasure the importance of being a dealer.</p>
				  <p>
				  ADSell share the trust, love and respect through their valued dealers all over the country.
				  </p>
				  <br>
				  <br>
				</div>
			</div><!--/row-->
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
								<a href="mailto:adsell2012@gmail.com"><font color="white">adsell2012@gmail.com</font></a>
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
    <script src="/ADS/js/bootstrap-transition.js"></script>
    <script src="/ADS/js/bootstrap-modal.js"></script>
	<script src="/ADS/js/bootstrap-tab.js"></script>
    <script src="/ADS/js/bootstrap-carousel.js"></script>
    <script src="/ADS/js/application.js"></script>
	<script src="/ADS/js/bootstrap-datepicker.js"></script>
    <script src="/ADS/js/bootstrap-tooltip.js"></script>
    <script src="/ADS/js/bootstrap-popover.js"></script>
	<script src="/ADS/js/lightbox.js"></script>
	<script src="/ADS/js/jquery-1.7.2.min.js"></script>
	<script src="/ADS/js/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="/ADS/js/jquery.smooth-scroll.min.js"></script>
	<script src="/ADS/js/bootstrap-collapse.js"></script>
	<script src="/ADS/js/bootstrap-alert.js"></script>
	<script src="/ADS/js/bootstrap-dropdown.js"></script>
	<script src="/ADS/js/bootstrap-scrollspy.js"></script>
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
