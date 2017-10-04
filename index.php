<?PHP

	require 'config.php';
	
	$pack_sizes_desc = implode(', ', $pack_sizes);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
<link rel="apple-touch-icon" href="assets/icons/icon-152.png">
<meta name="mobile-web-app-capable" content="yes">
<link rel="shortcut icon" sizes="196x196" href="assets/icons/icon-196.png">
<meta name="apple-mobile-web-app-title" content="Banana Pack Calc">
<meta name="application-name" content="Banana Pack Calc">
<title>Brucie's Banana Bazaar - Pack Calculator</title>
<link href="https://fonts.googleapis.com/css?family=Kavoon" rel="stylesheet">
<link href="css/default.css" rel="stylesheet" type="text/css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

    <div id="container" class="container">
		<div class="header clearfix">
			<h1 class="pageHeader">Brucie's Banana Bazaar</h1>
		</div>

		<div class="jumbotron">
			<div class="navbar-form">
				<div id="packSizeInfo">Bananas are available in the following pack sizes: <?PHP echo $pack_sizes_desc; ?></div>
				<div id="banana">How many bananas do you need?</div>
				<div class="form-group form-group-lg">
					
					<input class="form-control" 
						name="num_bananas" 
						id="num_bananas" 
						type="text" 
						value="" 
						maxlength="6" 
						onfocus="this.select()" 
					/>
				</div>
				<div class="form-group form-group-lg">
					<input 
						class="form-control btn-success" 
						id="btnCalc" 
						name="btnCalc" 
						type="button" 
						value=" Calculate " 
					/>
				</div>
			</div>

			<div id="displayResults"></div>
		</div>
	</div>
	
	<div class="banoogle">
		Like looking at bananas? 
		<a href="https://www.google.co.uk/search?q=bananas&tbm=isch" target="blank">Click here</a> 
		to try our new Banoogle&trade; image search
	</div>
	
	<script src="js/pack_calculator.js"></script>
	
</body>
</html>

