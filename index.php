<?php 
$suc="";
$err="";
$res="";
$matches=array();
	if ($_POST!="") {
		if($txt = @file_get_contents("https://www.weather-forecast.com/locations/".$_POST['ville']."/forecasts/latest"))
			{
				//echo $txt;
		preg_match('/<div class="b-metar__table-container columns">(.*)<\/div>/', $txt, $matches);
		$res=$matches[0];
				$suc = "<b>"."Weather Loaded Successfully ! "."</b>";
			}
		else
		{
			$err = "<b>"."There was something wrong ! please verify the town name !"."</b>";
		}
		
	}
$_POST=array();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Weather !</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style>
	body{background-image:url(bg.jpg);}
	fieldset{margin-top:25px;}
	input[name="ville"]{width: 100%;}

	.b-metar-table {
    width: 100%;
    margin-bottom: 1em;
    border: none;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.2;
    border-collapse: collapse;
    border-spacing: 5px;
}
	tr{}
	</style>
</head>
<body>
<div class="container">
	<div id="result" class="alert alert-primary"><?php echo $res; ?></div>
	<form method="post">
	<fieldset class="form-group">
	<label for="ville">Entrez votre ville !</label>
		<input type="text" class="form-control-lg" name="ville" placeholder="Entrez le nom de votre ville :"><br><br>
		<input type="submit" class="btn btn-primary">
		</fieldset>
		<div class="alert alert-success" id="succes"><?php echo $suc; ?></div>
		<div class="alert alert-danger" id="error"><?php echo $err; ?></div>
	</form>
</div>
<script src="jquery.min.js"></script>
<script type="text/javascript">

		if ($("#result").html()=="") {
			$("#result").css("display","none");
		}
		if ($("#error").html()=="") {
			$("#error").css("display","none");
		}
		if ($("#succes").html()=="") {
			$("#succes").css("display","none");
		}
</script>
</body>
</html>