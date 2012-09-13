<?php 
 session_start();
 if (!isset($_SESSION["username"])) {
    header("location: ../index.php"); 
    exit();
}
include "../db_con/connect_to_mysql.php"; 
$id = $_SESSION['id'];
?>
<?php 
//if user attempts to add something to the cart from the product page
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } 
		      } 
	       }
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	header("location: cart.php"); 
    exit();
}
?>
<?php 
//if user chooses to empty their shopping cart
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}
?>
<?php 
//if user chooses to adjust item quantity
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
    // execute some code
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity); 
	if ($quantity >= 100) { $quantity = 99; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  } 
		      } 
	} 
}
?>
<?php 
//if user wants to remove an item from cart
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}
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
			  <li><a href="../catalog/index.php"><img src="../img/catalog.png"> Catalog</a></li>
			  <li class="active"><a href="../order/index.php"><img src="../img/cart.png"> Orders</a></li>
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
 <p>
 </p>
  <div class="container-fluid">
    <div class="row-fluid">
	 <div class="span3">
		<div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header"><h4>Order Menu</h4></li>	
			   <li class="active"><a href="cart.php"><i class="icon-shopping-cart"></i> My Cart</a></li>
			   <li><a href="../catalog/index.php"><i class="icon-ok"></i> Order Item</a></li>
               <li class=""><a href="#"><i class="icon-share-alt"></i> Return / Exchange of Item</a></li>
			   <li class=""><a href="#"><i class="icon-calendar"></i> Due Date of Item</a></li>
            </ul>
		</div>
	 </div>
	 <div class="span9">
		<table class="table table-striped">	
					<th width="3%">Product Name</th>
					<th width="2%">Unit Price</th>	
					<th width="1%">Quantity</th>
					<th width="2%">Total</th>
					<th width="1%">Remove</th>
					<br>
					<?php 
						//render the cart for the user to view on the page
						$cartOutput = "";
						$cartTotal = "";
						$pp_checkout_btn = '';
						$product_id_array = '';
						if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
							$cartOutput = "<div class='alert alert-info'><strong>Heads up!</strong> Your Shopping Cart is Empty.</div>";	
						} else {
							// Start PayPal Checkout Button
							$pp_checkout_btn .= '<form action="" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
							<input type="hidden" name="business">';
							// Start the For Each loop
							$i = 0; 
							foreach ($_SESSION["cart_array"] as $each_item) { 
								$item_id = $each_item['item_id'];
								$sql = mysql_query("SELECT * FROM product WHERE id='$item_id' LIMIT 1");
								while ($row = mysql_fetch_array($sql)) {
									$product_name = $row["product_name"];
									$price = $row["price"];
								}
								$pricetotal = $price * $each_item['quantity'];
								$cartTotal = $pricetotal + $cartTotal;
								$pricetotal = ($pricetotal);
								// Dynamic Checkout Btn Assembly
								$x = $i + 1;
								$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
								<input type="hidden" name="amount_' . $x . '" value="' . $price . '">
								<input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';
								// Create the product array variable
								$product_id_array .= "$item_id-".$each_item['quantity'].","; 
								// Dynamic table row assembly
								$cartOutput .= "<tr>";
								$cartOutput .= '<td><a href="../catalog/product.php?id=' . $item_id . '">' . $product_name . '</a><br /></td>';
								$cartOutput .= '<td>P ' . $price . '</td>';
								$cartOutput .= 
								'<td><form action="cart.php" method="post">
								<input class="input-small" name="quantity" type="text" value="' . $each_item['quantity'] . '" />
								<input name="adjustBtn' . $item_id . '" type="submit" class="btn btn-info" value="Update" />
								<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
								</form></td>';
								//$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
								$cartOutput .= '<td>P ' . $pricetotal . '</td>';
								$cartOutput .= '<td><form action="cart.php" method="post"><input name="' . $item_id . '" type="submit" class="btn btn-danger" value="Delete" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
								$cartOutput .= '</tr>';
								$i++; 
							} 
							$cartTotal = ($cartTotal);
							$cartTotal = "<div style='font-size:18px; margin-top:12px;' align='right'>Order Total : Php ".$cartTotal." </div>";
							// Finish the Paypal Checkout Btn
							$pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '">
							</form>';
						}
						?>
					<?php echo $cartOutput; ?>
		</table>
		<?php echo $cartTotal; ?>
		<br><br>
		<p class="navbar-text pull-right"><a href="cart.php?cmd=emptycart">Click Here to Empty Your Shopping Cart</a></p>
		<br><br><br>
		<p class="navbar-text pull-right"><a class='btn btn-warning btn-medium' href='#'>Proceed to Order the Item!</a></p>
	 </div>
  
		
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
  </body>
</html>