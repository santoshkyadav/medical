<?PHP
		$Id=$_REQUEST['LoginName'];
		$Password=$_REQUEST['UserPassword'];
		//echo $Id."<br/>";//echo $Password."<br/>";
		$url = "http://43.240.65.33/ECL/ImageList.aspx?LoginName=".$Id."&UserPassword=".$Password;
		$json=file_get_contents($url);
		$json=str_replace("{\"URL\":\"",'http://',$json);
		$json=str_replace(array('[',']',"\"",'{','}'),'',$json);		
		$row=explode(',',$json);
		?>

<!DOCTYPE html>
<html>
<head>
	<title>Slider</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Japware Techno Lab, Elation Softnet P Ltd." />
	
	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page --> 
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->



</head>
<body style="background-color:#060A0A;margin:0;align:center" align="center">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">	
	<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container1">
	
	<div class="ws_images"><ul>
		<?php
	
		for($k=0;$k<count($row)-1;$k++)
		{
			echo("<li><img src='".$row[$k]."' alt='' title='' id='wows1_".($k)."' height='500px'/></li>"."\n");
		}
	?>
	</ul></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
</div>
</div>

<div class="row">
<div class="col-sm-12">
</div>
</div>
</body>
</html>
