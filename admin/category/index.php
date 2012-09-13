<?php 
//if tama ang username ug pwd, execute ang baba nga code...if mali redirect to admin_login.php
session_start();
if (!isset($_SESSION["manager"])) {
    header("location: ../login.php"); 
    exit();
}
// Connect to the MySQL database  
include "../config/connect_to_mysql.php"; 
?>
<?php 
// ADD CATEGORY
if (isset($_POST['category_name'])) {
	
    $category_name = mysql_real_escape_string($_POST['category_name']);
	$details = mysql_real_escape_string($_POST['details']);
	// See if that category name is an identical match to another category in the system
	$sql = mysql_query("SELECT cat_id FROM category WHERE category_name='$category_name' LIMIT 1");
	$categoryMatch = mysql_num_rows($sql); // count the output amount
    if ($categoryMatch > 0) {
		echo 'Sorry you tried to place a duplicate "Category Name" into the system, <a href="index.php">click here</a>';
		exit();
	}
	$sql = mysql_query("INSERT INTO category (category_name, details, date_added) 
        VALUES('$category_name','$details',now())") or die (mysql_error());
    $pid = mysql_insert_id();
	$newname = "$pid.jpg";
	move_uploaded_file( $_FILES['fileField']['tmp_name'], "category_images/$newname");
	header("location: index.php"); 
    exit();
}
?>
<?php 
// ADD SUB-CATEGORY
if (isset($_POST['name'])) {	
    $name = mysql_real_escape_string($_POST['name']);
	$brandName = $_POST['brandName'];
	//query
	$brandId = mysql_query("SELECT category_id FROM subcategory WHERE id='$brandName'");	
	$sql = mysql_query("SELECT id FROM subcategory WHERE name='$name'");	
	$subcatMatch = mysql_num_rows($sql);
    if ($subcatMatch > 0) {
		echo 'Sorry you tried to place a duplicate "Sub-category Name" into the system, <a href="index.php">click here</a>';
		exit();
	}
	$sql = mysql_query("INSERT INTO subcategory (name, category_id) 
        VALUES('$name',(SELECT cat_id FROM category WHERE category_name = '".$_POST['brand_name']."'))") or die (mysql_error());
	header("location: index.php"); 
    exit();
}
?>
<?php 
// Parse the form data and add inventory product to the system
if (isset($_POST['details'])) {
    $product_name = mysql_real_escape_string($_POST['product_name']);
	$price = mysql_real_escape_string($_POST['price']);
	$qty = mysql_real_escape_string($_POST['qty']);
	$details = mysql_real_escape_string($_POST['details']);
	$subcatName = $_POST['subcatName'];
	// query
	$subcatId = mysql_query("SELECT subcategory_id FROM product WHERE id='$subcatName'");		
	$sql = mysql_query("SELECT id FROM product WHERE product_name='$product_name'");
	$productMatch = mysql_num_rows($sql); // count the output amount
    if ($productMatch < 0) {
		echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="index.php">click here</a>';
		exit();
	}
	// Add this product into the database now
	$sql = mysql_query("INSERT INTO product (product_name, price, qty, details, subcategory_id) 
        VALUES('$product_name','$price', '$qty', '$details',(SELECT id FROM subcategory WHERE name = '".$_POST['subcat_name']."'))") or die (mysql_error());		
	header("location: index.php"); 
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

    <!-- Le styles -->
    <link href="/ADS/css/bootstrap.css" rel="stylesheet">
	<link href="/ADS/css/bootstrap-responsive.css" rel="stylesheet">
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
			  <li class="active"><a href="category/index.php"><img src="../img/catalog.png"> Catalog</a></li>
			  <li><a href="../orders/index.php"><img src="../img/cart.png"> Orders</a></li>
			  <li><a href="../user/index.php"><img src="../img/user.png"> Dealers</a></li>
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
        <div class="span3">
          <div class="well sidebar-nav">
			<ul class="nav nav-list">
			  <li class="nav-header"><h3>Catalog Menu</h3></li><br>
			  <li><a data-toggle="modal" href="#inventoryForm"><i class="icon-plus-sign"></i> Add Brand</a></li>
			  <li><a data-toggle="modal" href="#subcatForm"><i class="icon-plus-sign"></i> Add Category</a></li>
			  <li><a data-toggle="modal" href="#productForm"><i class="icon-plus-sign"></i> Add Product</a></li><br>			 
            </ul>
          </div><!--/.well -->
		  <div class="well sidebar-nav">
			<ul class="nav nav-list">
			  <li class="nav-header"><h3>Search Product</h3></li>
			    <br>
				<label>Product  Name: </label>
				<div class="controls">
					<form class="form-search" action='search.php' method='GET'>        
							<div class="input-prepend">
								<input class="input-small" name='search' type="text" placeholder="Find Product">&nbsp;
								<input type='submit' class="btn" name='submit' value='Go'>
							</div>
					</form>
				</div>
            </ul>
          </div><!--/.well -->
        </div><!--/span3 end here!-->
		
		<!-- MODAL ADD CATEGORY -->
		<div id="inventoryForm" class="modal hide fade">	
		
             <form class="form-horizontal" action="index.php" name="myForm" enctype="multipart/form-data" id="myform" method="post">
			  <br>
				<div class="modal-header">
				  <a class="close" data-dismiss="modal" >&times;</a>
				  <h3>Add New Brand</h3>
				</div>
				 <div class="modal-body">
					  <p><code>Note:</code> All field mark with <code>*</code> are required.</p>
					  <br>
					  <div class="control-group">
						<label>Brand  Name*:</label>
						<div class="controls">
						  <input name="category_name" type="text" id="category_name"/>
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="fileField">Image Input*: </label>
						<div class="controls">
						  <input class="input-file" name="fileField" id="fileField" type="file" />
						</div>
					  </div>
					  <div class="control-group">
						<label>Brand Details*:</label>
						<div class="controls">
						  <textarea class="input-xlarge" id="details" rows="3" name="details"></textarea>
						</div>
					  </div>
				 </div>
					  <div class="form-actions">
						<button type="submit" class="btn btn-success">Add Brand</button>&nbsp;
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					  </div>
				  </form>			
        </div>
		
		<!-- MODAL ADD SUB-CATEGORY -->
		<div id="subcatForm" class="modal hide fade">	
		
             <form class="form-horizontal" action="index.php" name="myForm" enctype="multipart/form-data" id="myform" method="post">
			  <br>
				<div class="modal-header">
				  <a class="close" data-dismiss="modal" >&times;</a>
				  <h3>Add New Category</h3>
				</div>
				 <div class="modal-body">
					  <p><code>Note:</code> All field mark with <code>*</code> are required.</p>
					  <br>
					  <div class="control-group">
						<label class="control-label" for="input01">Brand Name*:</label>
							<div class="controls">
								<select name = "brand_name">
								<option value="">-Select Brand-</option>
									<?php
										$category_list = mysql_query("select * from category order by category_name asc");
										while($row_list=mysql_fetch_assoc($category_list)){
									?>
								<option value="<?php echo $row_list['category_name']; ?>"<?php if($row_list['category_name']==$select){ echo "selected"; } ?>><?php echo $row_list['category_name']; ?></option>
									<?php
									// End while loop.
									}
									?>
								</select> 
							</div>
					  </div>
					  <div class="control-group">
						<label>Category  Name*:</label>
						<div class="controls">
						  <input name="name" type="text" id="name"/>
						</div>
					  </div>
				 </div>
					  <div class="form-actions">
						<button type="submit" class="btn btn-success">Add Category</button>&nbsp;
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					  </div>
			</form>
				<?php
					if(isset($_POST['select']))
						{
							$category_name=mysql_real_escape_string($_POST['select']);
							$result=mysql_query("SELECT cat_id FROM category WHERE category_name='".$category_name."'");
								while ($row=mysql_fetch_assoc($result)) {
								echo '<strong>Category Name: </strong>'; echo $row['cat_id']; echo '<br />';
								}
						}
				?>
        </div>
		
		<!-- MODAL ADD PRODUCT -->
		<div id="productForm" class="modal hide fade">	
             <form class="form-horizontal" action="index.php" name="myForm" id="myform" method="post">
			  <br>
				<div class="modal-header">
				  <a class="close" data-dismiss="modal" >&times;</a>
				  <h3>Add New Product</h3>
				</div>
				 <div class="modal-body">
					  <p><code>Note:</code> All field mark with <code>*</code> are required.</p>
					  <br>
					  <div class="control-group">
						<label class="control-label" for="input01">Category*:</label>
							<div class="controls">
								<select name="subcat_name">
								<option value="">-Select Category-</option>
									<?php
										$subcat_list = mysql_query("select * from subcategory order by name asc");
										while($row_list=mysql_fetch_assoc($subcat_list)){
									?>
								<option value="<?php echo $row_list['name']; ?>"<?php if($row_list['name']==$select){ echo "selected"; } ?>><?php echo $row_list['name']; ?></option>
									<?php
									// End while loop.
									}
									?>
								</select>
							</div>
					  </div>
					  <div class="control-group">
						<label>Product  Name*:</label>
						<div class="controls">
						  <input name="product_name" type="text" id="product_name"/>
						</div>
					  </div>
					  <div class="control-group">
						<label>Product Description*:</label>
						<div class="controls">
						  <textarea class="input-xlarge" id="details" rows="3" name="details"></textarea>
						</div>
					  </div>
					  <div class="control-group">
						<label>Price*:</label>
						<div class="controls">
						  <input class="input-small" name="price" type="text" id="price"/>
						</div>
					  </div>
					  <div class="control-group">
						<label>Quantity in Stock*:</label>
						<div class="controls">
						  <input class="input-small" name="qty" type="text" id="qty"/>
						</div>
					  </div>
				 </div>
					  <div class="form-actions">
						<button type="submit" class="btn btn-success">Add Item</button>&nbsp;
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					  </div>
				  </form>			
        </div>
	  
      <!-- for category list and product list tab -->	  
	  <div class="span9">
	  
		<?php 
			// DELETE CATEGORY QUESTION
			if (isset($_GET['deletecat_id'])) {
				echo '<div class="alert alert-block alert-error fade in">
										<a class="close" data-dismiss="alert" href="index.php">&times;</a>
										<h4 class="alert-heading">Do you want to delete the category?</h4><br>
										  <a class="btn btn-danger small" href="index.php?yesdelete=' . $_GET['deletecat_id'] . '">Yes</a>&nbsp; <a class="btn small" href="index.php">No</a>
					   </div>';				
							echo "";
							exit();
						}
			if (isset($_GET['yesdelete'])) {
				$cat_id_to_delete = $_GET['yesdelete'];
				$sql = mysql_query("DELETE FROM category WHERE cat_id='$cat_id_to_delete' LIMIT 1") or die (mysql_error());
				$pictodelete = ("category_images/$cat_id_to_delete.jpg");
				if (file_exists($pictodelete)) {
							unlink($pictodelete);
				}
			}
		?>
		
		<?php 
			// DELETE PRODUCT QUESTION
			if (isset($_GET['deleteid'])) {
				echo '<div class="alert alert-block alert-error fade in">
						<a class="close" data-dismiss="alert" href="index.php">&times;</a>
						<h4 class="alert-heading">Do you want to delete the product?</h4><br>
						<a class="btn btn-danger small" href="index.php?delete=' . $_GET['deleteid'] . '">Yes</a>&nbsp; <a class="btn small" href="index.php">No</a>
						</p>
					   </div>';
					
					exit();
				}
				if (isset($_GET['delete'])) {
					$id_to_delete = $_GET['delete'];
					$sql = mysql_query("DELETE FROM product WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
				}		
		?>
	  
          <ul id="tab" class="nav nav-tabs">
            <li class="active"><a href="#cat" data-toggle="tab">Brand List</a></li>
            <li><a href="#list" data-toggle="tab">Product List</a></li>
          </ul> 
          <div id="myTabContent" class="tab-content">
		  
		    <!-- for CATEGORY / BRAND list tab -->				
            <div class="tab-pane fade in active" id="cat">
              <table class="table table-striped table-bordered table-condensed">	
				<thead>
				  <tr>
					<th width="3%">Brand Name</th>
					<th width="4%">Description</th>
					<th width="3%">Thumbnail</th>
					<th width="3%">Date Added</th>
					<th width="1%">Action</th>	
				  </tr>
				</thead>
					<?php 
						// whole list of viewing the category stored on the database
						$category_list = "";
						$sql = mysql_query("SELECT * FROM category ORDER BY cat_id DESC");
						$categoryCount = mysql_num_rows($sql); // count the output amount
						if ($categoryCount > 0) {
							while($row = mysql_fetch_array($sql)){ 
									 $cat_id = $row["cat_id"];
									 $category_name = $row["category_name"];
									 $details = $row["details"];
									 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
									echo "<tbody>";
									echo "<tr>";
									echo "<td>$category_name</td>";
									echo "<td>$details</td>";
									echo "<td><a href='category_images/$cat_id.jpg' rel='lightbox' title='Click on the right side of the image to move forward.'><img src='category_images/$cat_id.jpg' width='150' height='150'/></a></td>";
									echo "<td>$date_added</td>";
									echo "<td><a href='index.php?deletecat_id=$cat_id'><img src='/ADS/img/trash.png' /></a>&nbsp; &nbsp;<a href='edit_cat.php?pid=$cat_id'><img src='/ADS/img/edit.png' /></a></td>";
									echo "</tr>";
									echo "</tbody>";
							}
						} else {
							echo "No Brand yet.";
						}
				?>		
			  </table>	
            </div>
			
			
			 <!-- for product list tab -->	
            <div class="tab-pane fade" id="list">
			<!--<div class="control-group">
					<label class="control-label" for="input01">View products in:</label>
						<div class="controls">
							<select class="input-medium" name='' id='' >
							  <option value="">All Category</option>
								<?php 
									/*$category_list = "";
									$sql = mysql_query("SELECT * FROM category ORDER BY cat_id DESC");
									$categoryCount = mysql_num_rows($sql); // count the output amount
										if ($categoryCount > 0) {
										while($row = mysql_fetch_array($sql)){ 
											$category_name = $row["category_name"];
											echo "<option>";
											echo "<td>$category_name</td>";
											echo "</option>";
										}
									} */
								?>
							</select>
						</div>
			</div>-->
			<table class="table table-striped table-bordered table-condensed">	
				<thead>
				  <tr>
					<th class="id">ID</th>
					<th class="category_name">Product Name</th>
					<th class="details">Description</th>
					<th class="subcategory_id">Category</th>
					<th class="price">Price</th>
					<!--<th class="date_added">Date Added</th>-->
					<th>Action</th>	
				  </tr>
				</thead>
					<?php 
						// whole list of viewing the products stored on the database
						$product_list = "";
						$sql = mysql_query("SELECT * FROM product ORDER BY id DESC");					
						$productCount = mysql_num_rows($sql); // count the output amount
						if ($productCount > 0) {
							while($row = mysql_fetch_array($sql)){ 
									 $id = $row["id"];
									 $product_name = $row["product_name"];
									 $details = $row["details"];
									 $subcategory_id = $row["subcategory_id"];
									 $category = $row["category"];
									 $price = $row["price"];
									 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
									echo "<tr>";
									echo "<td>$id</td>";
									echo "<td>$product_name</td>";
									echo "<td>$details</td>";
									echo "<td>$subcategory_id</td>";
									echo "<td>$price</td>";
									//echo "<td>$date_added</td>";
									echo "<td><a href='index.php?deleteid=$id'><img src='/ADS/img/trash.png' /></a>&nbsp; &nbsp;<a href='edit_prod.php?pid=$id'><img src='/ADS/img/edit.png' /></a></td>";
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
    <script src="/ADS/js/bootstrap-alert.js"></script>
    <script src="/ADS/js/bootstrap-modal.js"></script>
    <script src="/ADS/js/bootstrap-tab.js"></script>
    <script src="/ADS/js/bootstrap-tooltip.js"></script>
    <script src="/ADS/js/bootstrap-popover.js"></script>
    <script src="/ADS/js/bootstrap-carousel.js"></script>
	<script src="/ADS/js/bootbox.min.js"></script>
	<script src="/ADS/js/bootbox.js"></script>
	<script src="/ADS/js/lightbox.js"></script>
	<script src="/ADS/js/jquery-1.7.2.min.js"></script>
	<script src="/ADS/js/jquery-ui-1.8.18.custom.min.js"></script>
	<script src="/ADS/js/jquery.smooth-scroll.min.js"></script>
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