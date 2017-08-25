<!DOCTYPE html>
<html>

	<head>
		<title>BottomUp Search Engine</title>
		<link href="style.css" rel="stylesheet" />
	</head>

	<body>
		<div id="container">
			<?php include_once('header.php');?>
			<img src="bottomup.jpg" />
			<form method="post" action="results.php">
				<input type="text" name="query" />
				<button type="submit">Search</button>
				<button type="submit" name="lucky" value="1">Woo Pig!</button>
			</form>
			<?php include_once('footer.php');?>
		</div>
	</body>
</html>
