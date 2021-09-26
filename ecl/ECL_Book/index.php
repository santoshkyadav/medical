<?php
//$dir=glob("pages/{*.jpg}",GLOB_BRACE);
//print_r($dir); die();
		$Id=$_REQUEST['LoginName'];
		$Password=$_REQUEST['UserPassword'];
		//echo $Id."<br/>";//echo $Password."<br/>";
		$url = "http://43.240.65.33/ECL/ImageList.aspx?LoginName=".$Id."&UserPassword=".$Password;
		$json=file_get_contents($url);
		$json=str_replace("{\"URL\":\"",'http://',$json);
		$json=str_replace(array('[',']',"\"",'{','}'),'',$json);		
		$row=explode(',',$json);
		//print_r($row);die();
		//$print=explode(':',$row[8]);
		//print_r($print);die();		
		//echo $print[1];
		

		?>

<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>

<script type="text/javascript" src="extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="extras/modernizr.2.5.3.min.js"></script>
</head>
<body>
<p id="demo"></p>
<div class="flipbook-viewport">
	<div class="container">
		<div id="flipbook" class="flipbook">
			<?php
	
		for($k=1;$k<count($row)-1;$k++)
		{
			if($k==1||$k==count($row)-2)
			{
			echo("<div class='page' style='background-image:url(".$row[$k].")'></div>"."\n");	
			}
			else
			{
			echo("<div class='double' style='background-image:url(".$row[$k].")'></div>"."\n");		
			}
		}
			?>
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

<script type="text/javascript">
var myVar;    
function AutoFlip(){
		
    if ( $('#flipbook').turn('page')==$('#flipbook').turn('pages') ) 
	{
		$('#flipbook').turn('page', 1);
	} 
	else 
	{
		$('#flipbook').turn('next');
	} 
}

$(document).ready(function(){
    setInterval("AutoFlip()", 5000);
});
</script>

</body>
</html>
