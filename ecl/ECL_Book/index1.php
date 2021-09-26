<?php
$dir=glob("pages/{*.jpg}",GLOB_BRACE);
//print_r($dir); die();
?>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
<meta name="viewport" content="width = 1050, user-scalable = no" />
<script type="text/javascript" src="extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="extras/modernizr.2.5.3.min.js"></script>
</head>
<body>

<div class="flipbook-viewport">
	<div class="container">
		<div class="flipbook">
			<div class="page" style="background-image:url(pages/1.jpg)"></div>
			<div class="double" style="background-image:url(pages/2.jpg)"></div>
			<div class="double" style="background-image:url(pages/3.jpg)"></div>
			<div class="double" style="background-image:url(pages/4.jpg)"></div>
			<div class="double" style="background-image:url(pages/5.jpg)"></div>
			<div class="double" style="background-image:url(pages/6.jpg)"></div>
			<div class="page" style="background-image:url(pages/7.jpg)"></div>
		</div>
	</div>
</div>


<script type="text/javascript">

function loadApp() {

	var flipbook = $('.flipbook');

 	// Check if the CSS was already loaded
	
	if (flipbook.width()==0 || flipbook.height()==0) {
		setTimeout(loadApp, 10);
		return;
	}

	$('.flipbook .double').scissor();

	// Create the flipbook

	$('.flipbook').turn({
			// Elevation

			elevation: 50,
			
			// Enable gradients

			gradients: true,
			
			// Auto center this flipbook

			autoCenter: true

	});
}

// Load the HTML4 version if there's not CSS transform

yepnope({
	test : Modernizr.csstransforms,
	yep: ['lib/turn.min.js'],
	nope: ['lib/turn.html4.min.js'],
	both: ['lib/scissor.min.js', 'css/double-page.css'],
	complete: loadApp
});

</script>

</body>
</html>
