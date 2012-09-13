<?php
if ($_POST['username']) {
//Connect to the database through our include 
include_once "db_con/connect_to_mysql.php";
$username = stripslashes($_POST['username']);
$username = strip_tags($username);
$username = mysql_real_escape_string($username);
$password = ereg_replace(":[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
$password = md5($password);
$sql = mysql_query("SELECT * FROM users WHERE password='$password'"); 
$login_check = mysql_num_rows($sql);
if($login_check > 0){ 
    while($row = mysql_fetch_array($sql)){ 
        // Get member ID into a session variable
        $id = $row["id"];   
        session_register('id'); 
        $_SESSION['id'] = $id;
        // Get member username into a session variable
	    $username = $row["username"];   
        session_register('username'); 
        $_SESSION['username'] = $username;
        // Update last_log_date field for this member now
        mysql_query("UPDATE users SET lastlogin=now() WHERE id='$id'"); 
        // Print success message here if all went well then exit the script
		header("location: user/index.php?id=$id"); 
		exit();
    } // close while
} else {
  header("location: index.php");
  exit();
}
}// close if post
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome to ADSell</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="/ADS/css/welcome.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 0px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
	  .card-two,.card-three {display:none;}
      .modal-body {min-height:260px;} /* To keep the next/back buttons in the same place */
    </style>
    <link href="/ADS/css/bootstrap.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="/ADS/js/others/animate.min.css" />
	<script src="/ADS/js/others/modernizr-2.5.3.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	
  </head>

  <body background="img/m.jpg" bgcolor="#333333"> 
  
		<!--<div class="modal animated flipInX" id="myModal">
		  <div class="modal-header">
			<a class="close" data-dismiss="modal">x</a>
			<h3>Welcome to ADSell</h3>
		  </div>
		  <div class="modal-body">
			<h4 class="card-one">Getting Started</h4>
			<h4 class="card-two">Advanced Usage</h4>
			<h4 class="card-three">Moving on</h4>
			<div class="progress progress-step">
			  <div class="step-full first">1</div>
			  <div class="step-empty second" style="left:50%">2</div>
			  <div class="step-empty third" style="left:100%">3</div>
			  <div class="bar" style="width: 0%;"></div>
			</div>
			<p class="card-one">Check out our products in ADSell, to see how our service center serves you as our valued dealers.</p>
			<p class="card-one"><center></center></p>
			
			<p class="card-two">In an effort to make ADSell run as smoothly and quickly as a regular site of dealers, we've made some goodies which is more interesting!</p>
			<p class="card-two">This is also a good time to start earning money as a direct seller through our site. 
			
			<p class="card-three">The site makes your way out.</p>
			<p class="card-three">(1) This should not be used for production, only our valued dealers who registered can access the site.</p>
			<p class="card-three">(2) I want to hear <a href="http://twitter.com/yourwebsitesux"><i class="icomoon-twitter"></i> Feedback</a> from developers to make this as useful and bug free as possible.</p>
			<p class="card-three">Thanks for checking this out.</p>
			<p class="card-three"><strong>Enjoy!</strong></p>
		  </div>
		  <div class="modal-footer">
			<a href="#" class="btn btn-primary next">Next</a>
			<a href="#" class="btn btn-success finish">Finish</a>
			<a href="#" class="btn back">Back</a>
		  </div>
		</div>-->
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
                <a class="brand" href="index.php"><img src="img/ADSELL_png.png" height="40" width="90"></a>
              </li>
            </ul>	
          </div>
        </div>
      </div>
    </div>
	<br><br>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
             <h3><center><font color="gray">Sign in to ADSell</font></center><h3><br>
					<form action="index.php" method="POST" name="logform" id="logform" onsubmit="return validate_form ( );"> 
					<center>
						<input type='text' class='input-medium' name='username' placeholder='Username'>
						<input type='password' class='input-medium' name='password' placeholder='Password'><br>
						<button type='submit' class='btn btn-primary btn-medium' OnClick="show_alert()">Sign in</a></button><br><br>
						<h4><a href="">Forget Password?</a></h4>
					</center>
						<hr><center><font color="gray">New to ADSell</font></center>
					<center>
					</form>
					<a class='btn btn-warning btn-medium' href='register.php'>Register to ADSell</a>
					</center>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
		
		
		 <div class="span6">
					<div id="myCarousel" class="carousel slide">
					<div class="carousel-inner">
					  <div class="item active">
						<div class="thumbnail">
							<img src="/ADS/img/e.jpg" alt="">
						</div>
					  </div>
					  <div class="item">
						<div class="thumbnail">
							<img src="/ADS/img/ds.jpg" alt="">
						</div>
					  </div>
					  <div class="item">
						<div class="thumbnail">
							<img src="/ADS/img/d.jpg" alt="">
						</div>
					  </div>
					  <div class="item">
						<div class="thumbnail">
							<img src="/ADS/img/ADSELL.png" alt="">
						</div>
					  </div>
					</div>
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
				  </div>
				  
			</div><!--/row-->
		
		  <div class="span3">
		    <div class="well sidebar-nav">
				<div class="item">
						<img src="/ADS/img/tw.png" alt="">
						<img src="/ADS/img/fbook.png" alt="">
				</div>
			 <h3><font color="gray">ADSell</font></h3><br>
					<p>
					ADSell is a direct selling service company which cater the number of dealers who sell products for their living and additional income as investors.</p>
					<p>
					ADSell primarily supervise and monitor our valued dealers respectively, the service center help the people to economize and treasure the importance of being a dealer.</p>
					</button>
					</text>
					
			</div>

		  </div><!--/row-->
  
      </div><!--/row-->
      <footer>
		<center>
			<p><dt><font color="gray">{Made in Philippines} </font><a href="index.php"><font color="gray">Home</font></a> | <a href="about.php"><font color="gray">About Us</font></a> | <a href="contact.php"><font color="gray">Contact Us</font></a> | <a href="privacypolicy.php"><font color="gray">Privacy Policy</font></a> | <a href=""><font color="gray">&copy; ADSell 2012</font></p>
		</center>
      </footer>

    </div><!--/.fluid-container-->
    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="/ADS/js/jquery.js"></script>
    <script src="/ADS/js/bootstrap-transition.js"></script>
    <script src="/ADS/js/bootstrap-tooltip.js"></script>
    <script src="/ADS/js/bootstrap-popover.js"></script>
    <script src="/ADS/js/bootstrap-carousel.js"></script>
	<script src="/ADS/js/application.js"></script>
	<script src="/ADS/js/jquery-1.7.2.min.js"></script>
	<script src="/ADS/js/others/plugins.js"></script>
	<script src="/ADS/js/others/script.js"></script>
	<script src="/ADS/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script src="/ADS/js/others/jquery.jgrowl.min.js"></script>
	<script type="text/javascript">
	<!-- Form Validation -->
	function validate_form ( ) { 
	valid = true; 
	if ( document.logform.username.value == "" ) { 
	alert ( "Please enter your Username and Password!" ); 
	valid = false;
	}
	if ( document.logform.pass.value == "" ) { 
	alert ( "Please enter your password" ); 
	valid = false;
	}
	return valid;
	}
	<!-- Form Validation -->
	</script>
	  <script type="text/javascript">
    $(document).ready (function() {
      var step = 1;
      $('.modal, .finish').hide();
      $('.next').click(function() {
      //This all could probably be shorter. Let me know if you have idears -Adam
        if (step < 3) {step++;}
        console.log(step);
        updateStep();
      });
      $('.back').click(function() {
        if(step > 1) {step--;}
        console.log(step);
        updateStep();
      });
      $('.close').click(function(){
        $('#myModal').hide();
      });
      function updateStep() {
        switch(step) {
          case 1:
            $('.card-one').show();
            $('.card-two, .card-three').hide();
            $('.second').removeClass('step-full');
            $('.bar').css('width','0');
          break;
          
          case 2:
            $('.card-one, .card-three, .finish').hide();
            $('.card-two, .next').show();
            $('.second').addClass('step-full');
            $('.third').removeClass('step-full');
            $('.bar').css('width','50%');
          break;
          
          case 3:
            $('.card-one, .card-two, .next').hide();
            $('.card-three, .finish').show();
            $('.third').addClass('step-full');
            $('.bar').css('width','100%');
          break;
        }
      }
      $(".finish").on("click", function(event){ 
        $('#myModal').addClass('flipOutX');
      });
    });
    $(document).ready().delay(20).queue(function() {
       $('.modal').show().addClass('flipInX');
    });
  </script>
  <script src="/ADS/js/others/chosen.jquery.min.js"></script>
  <!-- Activate Chosen js -->
  <script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
  </body>
</html>
