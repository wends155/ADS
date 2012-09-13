
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
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
    <link href="/ADS/js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/ADS/ico/favicon.ico">
    <link rel="apple-touch-icon" href="/ADS/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/ADS/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/ADS/ico/apple-touch-icon-114x114.png">
  </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="50" >


  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner header">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
            <div class="nav-collapse">
            <ul class="nav">
              <li class="active">
                <a class="brand" href="../user/index.php">Adsell</a>
              </li>
			  <li><a href="../catalog/index.php">Catalog</a></li>
			  <li><a href="../order/index.php">Orders</a></li>
            </ul>	
			<ul class="nav pull-right">
                  <li id="fat-menu" class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><b class="caret"></b></a>
                    <ul class="dropdown-menu">
					  <li><a href="profile.php"><i class="icon-user"></i> Profile</a></li>
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
<script>
var $win = $(window)
, $nav = $('.subnav')
, navHeight = $('.navbar').first().height()
, navTop = $('.subnav').length && $('.subnav').offset().top - navHeight
, isFixed = 6
processScroll()
$win.on('scroll', processScroll)
function processScroll() {
var i, scrollTop = $win.scrollTop()
if (scrollTop >= navTop && !isFixed) {
isFixed = 1
$nav.addClass('subnav-fixed')
} else if (scrollTop <= navTop && isFixed) {
isFixed = 0
$nav.removeClass('subnav-fixed')
}
}
</script>
  <div class="subnav">
    <ul class="nav nav-pills">
      <li><a href="#typography">Typography</a></li>
      <li><a href="#code">Code</a></li>
      <li><a href="#tables">Tables</a></li>
      <li><a href="#buttons">Buttons</a></li>
      <li><a href="#icons">Icons by Glyphicons</a></li>
    </ul>
  </div>

  <br>

  <h2>Horizontal forms</h2>
  <div class="row">
    <div class="span8">
      <form class="form-horizontal">
        <fieldset>
          <div class="control-group">
            <label class="control-label" for="fileInput">File input</label>
            <div class="controls">
              <input class="input-file" id="fileInput" type="file">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="textarea">Textarea</label>
            <div class="controls">
              <textarea class="input-xlarge" id="textarea" rows="3"></textarea>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>

  <br>

  </div>

  <br>



     <!-- Footer
      ================================================== -->
      <footer class="footer">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>Designed and built with all the love in the world <a href="http://twitter.com/twitter" target="_blank">@twitter</a> by <a href="http://twitter.com/mdo" target="_blank">@mdo</a> and <a href="http://twitter.com/fat" target="_blank">@fat</a>.</p>
        <p>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>. Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
        <p>Icons from <a href="http://glyphicons.com">Glyphicons Free</a>, licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
      </footer>




    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="/ADS/js/jquery.js"></script>
    <script src="/ADS/js/google-code-prettify/prettify.js"></script>
    <script src="/ADS/js/bootstrap-transition.js"></script>
    <script src="/ADS/js/bootstrap-alert.js"></script>
    <script src="/ADS/js/bootstrap-modal.js"></script>
    <script src="/ADS/js/bootstrap-dropdown.js"></script>
    <script src="/ADS/js/bootstrap-scrollspy.js"></script>
    <script src="/ADS/js/bootstrap-tab.js"></script>
    <script src="/ADS/js/bootstrap-tooltip.js"></script>
    <script src="/ADS/js/bootstrap-popover.js"></script>
    <script src="/ADS/js/bootstrap-button.js"></script>
    <script src="/ADS/js/bootstrap-collapse.js"></script>
    <script src="/ADS/js/bootstrap-carousel.js"></script>
    <script src="/ADS/js/bootstrap-typeahead.js"></script>
    <script src="/ADS/js/application.js"></script>


  </body>
</html>
