<?php
//open database
include "db_con/connect_to_mysql.php"; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ADSell / Registration Form</title>
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
    <style>
      body {
        padding-top: 20px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
	<link href="css/style.css" rel="stylesheet">
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/img/ico/adsell.png">
  </head>

<body>
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
					<a class="brand" href="index.php"><img src="img/ADSELL_png.png" height="35" width="80"></a>
				  </li>
				</ul>	
			  </div>
			</div>
		  </div>
	</div>
<div class="container">
<?php
$submit = $_POST['submit'];
//form data
$fullname = strip_tags($_POST['fullname']);
$username = strtolower(strip_tags($_POST['username']));
$password = strip_tags($_POST['password']);
$confirmpassword = strip_tags($_POST['confirmpassword']);
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$birthday = $year."-".$month."-".$day;
$date = date ("Y-m-d");
$street = strip_tags($_POST['street']);
$city = strip_tags($_POST['city']);
$province = strip_tags($_POST['province']);
$cnum = strip_tags($_POST['cnum']);
$gender = strip_tags($_POST['gender']);
$nationality = strip_tags($_POST['nationality']);
$bio = strip_tags($_POST['bio']);
$status = strip_tags($_POST['status']);
if ($submit)
{
//to check the username
$namecheck = mysql_query("SELECT username FROM users WHERE username='$username'");
$count = mysql_num_rows($namecheck);
if($count!=0)
{
	echo '<script type="text/javascript" >
		  window.alert("Username is already taken!");
		  </script>';
}

//check for existence
	if($fullname&&$username&&$password&&$confirmpassword&&$birthday&&$street&&$city&&$province&&$cnum&&$gender&&$nationality&&$bio&&$status)
	{
		if ($password==$confirmpassword)
		{
				{
				//register the new user!
				//encrypt
				$password = md5($password);
				$confirmpassword = md5($confirmpassword);			
				$queryreg = mysql_query("INSERT INTO users VALUES ('','$fullname','$username','$password','$birthday','$date','$street','$city','$province','$cnum','$gender','$nationality','$bio','$status')");
				// Place image in the folder 
				$pid = mysql_insert_id();
				$newname = "$pid.jpg";
				move_uploaded_file( $_FILES['fileField']['tmp_name'], "user_image/$newname");
				die ("<br><div class='span12'><br><br>	  
						 <div class='alert alert-block alert-info fade in'>
									<a class='close' data-dismiss='alert' href='index.php'>&times;</a>
									<h4 class='alert-heading'>Hey! You have been successfully registered!</h4>
									<p></p>
									<p><br>
									  <a class='btn btn-info small' href='index.php'>Login my Account</a>
									</p>
						 </div>
					  </div>");
				}
		}
		else
			echo "<div class='alert alert-block alert-error fade in'>
							<a class='close' data-dismiss='alert' href='register.php'>&times;</a>
							<h4 class='alert-heading'>You got an error!</h4>
							<p>Sorry, password do not match.</p>
						  </div>";
	}
}
?>
		<br><br>
<div class="span12">
	<div class="alert alert-info">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>Good Day!</strong> Please fill-up the form with all your valid information. Thanks!
	</div>
	<h2>Signing Up...</h2>
	<hr>
   <form class="form-horizontal" enctype="multipart/form-data" action="register.php" id="contact-form" method="POST">
		  <div class="control-group">
		   <legend>Basic Information:</legend>
            <label class="control-label" for="name">Fullname:</label>
            <div class="controls">
              <input type="text" name='fullname' value='<?php echo $fullname; ?>'>
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="input01">Username:</label>
            <div class="controls">
              <input type='text' name='username' value='<?php echo $username; ?>'>
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="input01">Password:</label>
            <div class="controls">
              <input type='password' name='password'>
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="input01">Confirm Password:</label>
            <div class="controls">
              <input type='password' class='input-large' name='confirmpassword'>
            </div>
          </div>	
		  <div class="control-group">
			<label class="control-label" for="fileField">Image Input*: </label>
			<div class="controls">
				 <input class="input-file" name="fileField" id="fileField" type="file" />
			</div>
		  </div>
		  
		  <legend>Personal Information:</legend>
          <div class="control-group">
            <label class="control-label" name='birthday'>Birthday:</label>
            <div class="controls">
		
			  <select class="span2" name='month'>
				<option value="">-Month-</option>
					<option value="1">January</option> 
					<option value="2">February</option> 
					<option value="3">March</option> 
					<option value="4">April</option> 
					<option value="5">May</option> 
					<option value="6">June</option> 
					<option value="7">July</option> 
					<option value="8">August</option> 
					<option value="9">September</option> 
					<option value="10">October</option> 
					<option value="11">November</option> 
					<option value="12">December</option>
			  </select>
              <select class="span2" name='day'>
                <option value="">-Date-</option> 
					<option value="1">1</option> 
					<option value="2">2</option> 
					<option value="3">3</option> 
					<option value="4">4</option> 
					<option value="5">5</option> 
					<option value="6">6</option> 
					<option value="7">7</option> 
					<option value="8">8</option> 
					<option value="9">9</option> 
					<option value="10">10</option> 
					<option value="11">11</option> 
					<option value="12">12</option> 
					<option value="13">13</option> 
					<option value="14">14</option> 
					<option value="15">15</option> 
					<option value="16">16</option> 
					<option value="17">17</option> 
					<option value="18">18</option> 
					<option value="19">19</option> 
					<option value="20">20</option> 
					<option value="21">21</option> 
					<option value="22">22</option> 
					<option value="23">23</option> 
					<option value="24">24</option> 
					<option value="25">25</option> 
					<option value="26">26</option> 
					<option value="27">27</option> 
					<option value="28">28</option> 
					<option value="29">29</option> 
					<option value="30">30</option> 
					<option value="31">31</option>
              </select>
              <select class="span2" name='year'>
					<option>-Year-</option>
					<option>1940</option>
					<option>1941</option>
					<option>1942</option>
					<option>1943</option>
					<option>1944</option>
					<option>1945</option>
					<option>1946</option>
					<option>1947</option>
					<option>1948</option>
					<option>1949</option>
					<option>1950</option>
					<option>1951</option>
					<option>1952</option>
					<option>1953</option>
					<option>1954</option>
					<option>1955</option>
					<option>1956</option>
					<option>1957</option>
					<option>1958</option>
					<option>1959</option>
					<option>1960</option>
					<option>1961</option>
					<option>1962</option>
					<option>1963</option>
					<option>1964</option>
					<option>1965</option>
					<option>1966</option>
					<option>1967</option>
					<option>1968</option>
					<option>1969</option>
					<option>1970</option>
					<option>1971</option>
					<option>1972</option>
					<option>1973</option>
					<option>1974</option>
					<option>1975</option>
					<option>1976</option>
					<option>1977</option>
					<option>1978</option>
					<option>1979</option>
					<option>1980</option>
					<option>1981</option>
					<option>1982</option>
					<option>1983</option>
					<option>1984</option>
					<option>1985</option>
					<option>1986</option>
					<option>1987</option>
					<option>1988</option>
					<option>1989</option>
					<option>1990</option>
					<option>1991</option>
					<option>1992</option>
					<option>1993</option>
					<option>1994</option>
					<option>1995</option>
					<option>1996</option>
					<option>1997</option>
					<option>1998</option>
					<option>1999</option>
					<option>2000</option>					
					<option>2001</option>
					<option>2002</option>
					<option>2003</option>
					<option>2004</option>
					<option>2005</option>
					<option>2006</option>
					<option>2007</option>
					<option>2008</option>
					<option>2009</option>
					<option>2010</option>					
              </select>
            </div>
          </div>
		  <div class="control-group">
				<label class="control-label" for="input01">Street:</label>
				<div class="controls">
				  <input type='text' class="input-xlarge" name='street' value='<?php echo $street; ?>'>
				</div>
		  </div>
		  <div class="control-group">
				<label class="control-label" for="input01">City:</label>
				<div class="controls">
				  <input type='text' class="input-xlarge" name='city' value='<?php echo $city; ?>'>
				</div>
		  </div>
		  <div class="control-group">
				<label class="control-label" for="input01">Province:</label>
				<div class="controls">
				  <input type='text' class="input-xlarge" name='province' value='<?php echo $province; ?>'>
				</div>
		  </div>
		  <div class="control-group">
				<label class="control-label" for="input01">Contact Number:</label>
				<div class="controls">
				  <input type='text' class="input-xlarge" name='cnum' value='<?php echo $cnum; ?>'>
				</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="input01">Gender:</label>
				<div class="controls">
					<select name='gender' id='gender' >
						<option value="">-Select-</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
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
				<label class="control-label" for="input01">Nationality:</label>
				<div class="controls">
				  <input type='text' class="input-medium" name='nationality' value='<?php echo $nationality; ?>'>
				</div>
		  </div>
		  <div class="control-group">
            <label class="control-label" for="textarea">Bio:</label>
            <div class="controls">
              <textarea class="input-xlarge" name='bio' rows='3' value='<?php echo $bio; ?>'></textarea>
            </div>
          </div><br>
		  <div class="control-group">
            <div class="controls">
              <label class="radio">
			    I agree on the <a href="tos.php">Terms and Conditions</a> of ADSell. 
                <input type="radio" name="term" id="term" value="option1">
              </label>
            </div>
          </div>
	
		  <hr>
		 
		  
		 <p align="center"> 
			<input name="submit" type="submit" value="Create my Account" class="btn btn-primary btn-large">
			&nbsp;&nbsp;
			<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php'" class="btn btn-danger btn-large">  
		 </p>
  </form>
 </div>
	  <footer>
		<center>
			<p><dt><font color="gray">{Made in Philippines} </font><a href="index.php"><font color="gray">Home</font></a> | <a href="about.php"><font color="gray">About Us</font></a> | <a href="contact.php"><font color="gray">Contact Us</font></a> | <a href="privacypolicy.php"><font color="gray">Privacy Policy</font></a> | <a href=""><font color="gray">&copy; ADSell 2012</font></p>
		</center>
      </footer>
</div>


			  <script src="/ADS/js/jquery.js"></script>
			  <script src="/ADS/js/bootstrap-alert.js"></script>
			  <script src="/ADS/js/jquery.validate.min.js"></script>
			  <script src="/ADS/js/script.js"></script>
			  
			  
</body>
</html>