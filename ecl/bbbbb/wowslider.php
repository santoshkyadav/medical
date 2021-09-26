<?php
$dir=glob("data1/images/{*.jpg}",GLOB_BRACE);
//print_r($dir);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Slider</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Made with WOW Slider - Create beautiful, responsive image sliders in a few clicks. Awesome skins and animations. Slider" />
	
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script type="text/javascript" src="engine1/jquery.js"></script>
	
	<script>
	alert("");
	</script>
	<!-- End WOWSlider.com HEAD section -->

</head>
<body style="background-color:#d7d7d7;margin:0">
	
	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container1">
	<div class="ws_images">
	<ul>
	<?php
	
		foreach($dir as $value)
		{
			
			echo("<li><img src=$value alt='000 TP' title='000 TP' id='wows1_1'/></li>");
		}
	?>
	</ul>
	</div>
	<div class="title" style="position:relative;height:100px;width:300px;margin-left:40%;text-align:center;margin-top:-10%;">
<span  id="span1" style="color:red;font-size:50px;position:relative;padding-top:-20%;">Santosh</span>

</div>
	<div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com/vi">slider</a> by WOWSlider.com v8.6</div>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->

</body>
</html>