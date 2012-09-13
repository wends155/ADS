<?php
 session_start();
 if (!isset($_SESSION['id'])) {
    header("location: ../index.php"); 
    exit();
}
include_once "../db_con/connect_to_mysql.php";
$id = $_SESSION['id'];
if ($_POST['street']) {
    $username = $_POST['username'];
	$birthday = $_POST['birthday'];
	$status = $_POST['status'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
	$cnum = $_POST['cnum'];
	$nationality = $_POST['nationality'];
	$bio = $_POST['bio'];
    $sql = mysql_query("UPDATE users SET username='$username',birthday='$birthday', status='$status', street='$street', city='$city', province='$province', cnum='$cnum', nationality='$nationality', bio='$bio' WHERE id='$id'"); 
    header("location: profile.php");
exit();
}
?>
<?php 
$sql = mysql_query("SELECT * FROM users WHERE id='$id' LIMIT 1");
while($row = mysql_fetch_array($sql)){ 
			 $id = $row["id"];
			 $fullname = $row["name"];
			 $username = $row["username"];
			 $birthday = $row["birthday"];
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
    <title><?php echo $fullname; ?></title>
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
	<link rel="stylesheet" href="/ADS/css/lightbox.css" type="text/css" media="screen" />
	
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/img/ico/adsell.png">
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
              <li class="">
                <a class="brand" href="../user/index.php"><img src="../img/ADSELL_png.png" height="35" width="80"></a>
              </li>
			  <li><a href="../catalog/index.php"><img src="../img/catalog.png"><b> Catalog</b></a></li>
			  <li><a href="../order/index.php"><img src="../img/cart.png"><b> Orders</b></a></li>
            </ul>	
			<ul class="nav pull-right">
                  <li id="fat-menu" class="dropdown">
                    <a href="profile.php" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/user.png"><b class="caret"></b></a>
                    <ul class="dropdown-menu">
					  <li>					  
					  <?php
						echo "<a href='profile.php'><img src='../user_image/$id.jpg' width='30px' height='30px'> View my profile page</a>";
					  ?>
					  </li>
                      <li class="divider"></li>
                      <li class="nav-header">Other Menu</li>
					  <li><a href="profile.php"><i class="icon-cog"></i> Settings</a></li>
					  <li><a href="../logout.php"><i class="icon-off"></i> Sign Out</a></li>
                    </ul>
                  </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">  

<!-- Masthead
================================================== -->
 <br><br><br>
  <div class="container-fluid">
    <div class="row-fluid">
		<div class="span4">			
				<ul class="nav nav-list">
					<?php
						echo "<li class='span10'>
									<div class='thumbnail'> 
										<a href='../user_image/$id.jpg' rel='lightbox'>
										<img src='../user_image/$id.jpg' width='205px' height='200px'></a>
									</div>
							  </li>";
					?>			   
				   <li class="nav-header"><h3><?php echo $_SESSION['username']; ?>'s Profile</h3></li>
				   <p><i><font face="georgia"><?php echo $bio; ?></font></i></p>
				   <p><?php echo $street; ?>, <?php echo $city; ?>, <?php echo $province; ?></p>
				</ul>
		  <div>
				<ul class="nav nav-list bs-docs-sidenav">
				  <li><a data-toggle="modal" href="#edit"><i class="icon-edit"></i><i class="icon-chevron-right"></i> Edit Account</a></li>
				  <li><a href="password.php"><i class="icon-asterisk"></i></i><i class="icon-chevron-right"></i> Password</a></li>
				  <li><a href="#"><i class="icon-share-alt"></i><i class="icon-chevron-right"></i> Return and Exchange of Item</a></li>
				  <li><a href="#"><i class="icon-calendar"></i><i class="icon-chevron-right"></i> Due Date of Item</a></li>
				  <li><a href="sms.php"><i class="icon-envelope"></i><i class="icon-chevron-right"></i> Mobile</a></li>
				</ul>
		  </div>
		  <br>
		  <div class="well">
			  <div>		
				  <p>&#169; 2012 ADSell <a href="../catalog/index.php">Catalog</a> <a href="../order/index.php">Order</a> <a href="../info/tos.php">Terms</a><br> 
				   <a href="../info/about.php">About</a> <a href="../info/privacy.php">Privacy</a> <a href="../info/contact.php">Contact</a></p>
			  </div>			
		</div>
        </div><!--/.span -->
        
		<!-- modal to edit information -->
		<div id="edit" class="modal hide fade">	
             <form class="form-horizontal" action="profile.php"  name="myForm" id="myform" method="post">
			  <br>
				<div class="modal-header">
				  <a class="close" data-dismiss="modal" >&times;</a>
				  <h3>Edit Account</h3>
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
								<select name='status' id='status' >
									<option value="">-Select-</option>
									<option value="single">Single</option>
									<option value="married">Married</option>
									<option value="widowed">Widowed</option>
								</select>
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
                        <label class="control-label">Bio:</label>
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
			<div class="well">
			 <div class="accordion" id="accordion2">
				<div class="accordion-group">
				  <div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#info">
					  <h3>Profile</h3>
					</a>
				  </div>
				  <div id="info" class="accordion-body collapse">
					<div class="accordion-inner">
						<form class="form-horizontal" action="index.php" name="myForm" id="myform" method="post">			
								<table class="table table-striped">
								  <thead>
									<tr>
										<th width="1%"></th>
										<th width="4%"></th>
									</tr>
								  </thead>
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
									<th><h4>Birthday :</h4></th>
									<td><?php echo $birthday; ?></td>
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
						</form>
					</div>
				  </div>
				</div>
				<div class="accordion-group">
				  <div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
					  <h3>Balance</h3>
					</a>
				  </div>
				  <div id="collapseOne" class="accordion-body collapse">
					<div class="accordion-inner">
					  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				  </div>
				</div>
				<div class="accordion-group">
				  <div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
						<h3>Due Date</h3>
					</a>
				  </div>
				  <div id="collapseTwo" class="accordion-body collapse">
					<div class="accordion-inner">
					  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				  </div>
				</div>
				<div class="accordion-group">
				  <div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
					  <h3>Checkout</h3>
					</a>
				  </div>
				  <div id="collapseThree" class="accordion-body collapse">
					<div class="accordion-inner">
					  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				  </div>
				</div>
			  </div>
			</div>
		</div><!--/span8-->
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
	<script src="/ADS/js/bootstrap-collapse.js"></script>
    <script src="/ADS/js/bootstrap-popover.js"></script>
	<script src="/ADS/js/lightbox.js"></script>
	<script src="/ADS/js/jquery-1.7.2.min.js"></script>
	<script src="/ADS/js/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="/ADS/js/jquery.smooth-scroll.min.js"></script>
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
