<!doctype html>
<html>
<head><title>Query</title></head>
<body>
<h1>Output of query.sh:</h1>
<p>

<?php

	$output = array();
	exec('../query.sh',$output);
	foreach ($output as $o)
		echo $o . "<br/>";

?>
</p>
</body>
</html>
