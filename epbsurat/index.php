<?php
//$dir=glob("pages/{*.jpg}",GLOB_BRACE);
//print_r($dir); die();
		$Id=$_REQUEST['LoginName'];
		$Password=$_REQUEST['UserPassword'];
		//echo $Id."<br/>";//echo $Password."<br/>";
		$url = "http://43.240.65.33/EPBSurat/ImageList.aspx?LoginName=".$Id."&UserPassword=".$Password;
		$json=file_get_contents($url);
		$json=str_replace("{\"URL\":\"",'http://',$json);
		$json=str_replace(array('[',']',"\"",'{','}'),'',$json);		
		$row=explode(',',$json);
		?>

<!doctype html>
<html lang="en">

<head>
<script type="text/javascript" src="extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="extras/modernizr.2.5.3.min.js"></script>
</head>
<body>
<p id="demo"></p>
<div class="flipbook-viewport">
	<div class="container">
		<div id="flipbook" class="flipbook" style="left:-600">
			<?php
				for($k=1;$k<count($row)-1;$k++)
				{
					if($k==1||$k==count($row)-2)
					{
						echo("<div class='page' style='background-image:url(".$row[$k].")'></div>"."\n");	
					}
					else
					{
						echo("<div class='double' style='background-image:url(".$row[$k]."); width:'></div>"."\n");		
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
window.addEventListener('resize', function (e) {
    var size = resize('#flipbook');
    $('#flipbook').turn('size', size.width, size.height);
});

function resize(el) {
    // reset the width and height to the css defaults
    el.style.width = '100%';
    el.style.height = 'auto';

    var width = el.clientWidth,
        height = Math.round(width / this.ratio),
        padded = Math.round(document.body.clientHeight * 0.9);

    // if the height is too big for the window, constrain it
    if (height > padded) {
        height = padded;
        width = Math.round(height * this.ratio);
    }

    // set the width and height matching the aspect ratio
    el.style.width ='100%'; //width + 'px';
    el.style.height = 'auto'; // height + 'px';

    return {
        width: width,
        height: height
    };
}

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
