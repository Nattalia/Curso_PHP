<!DOCTYPE html PUBLIC 
	"-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Full Moon Template</title>    
<link href="assets/CSS/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/CSS/main.css" rel="stylesheet" type="text/css"/>

<script type='text/javascript' src='Scripts/jquery-1.3.2.min.js'></script>

<!-- Tooltip -->
<script type="text/javascript" src="Scripts/jquery.tipsy.js"></script>

<!-- fade in/fade out -->
<script type="text/javascript" src="Scripts/jquery.innerfade.js"></script>

<!-- Featured list -->
<script type="text/javascript" src="Scripts/jquery.featureList-1.0.0.js"></script>

</head>
<body>
<?php  require '/assets/js/script_home.js';?>

<div id="wrapper">
  <div id="top">
  	<?php  include 'partials/top.php';?>    
  </div>
  <div>
    <?php  include 'partials/nav.php';?>    
  </div>
  
  <div class="hr"></div>
  
  <div id="preview_wrap">
		<?php  include 'partials/preview.php';?>
		</div>
	<div id="thumbs">
		<?php  include 'partials/thumbs.php';?>		
	</div>
      
  <div id="contentWrap">
    <div class="hr_line"></div>
    <div id="content-two-third">
    	<?php // include 'partials/content.php';?>  
    	<?=$content;?>
    </div>
    <div id="column" class="right">
    	<?php  include 'partials/right.php';?>  
    </div>
  </div>
  <div id="footer">
  	<?php  include 'partials/footer.php';?>  
  </div>
  <div id="social"> <?php  include 'partials/socials.php';?> </div>
</div>

<div class="bottom">
</div>

<!-- twitter -->
<?php  include 'partials/twitter.php';?>

</body>
</html>
