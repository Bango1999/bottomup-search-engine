<?php
$hasQuery = false;
if (isset($_POST['query']) && !empty($_POST['query']))
$hasQuery=true;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>BottomUp Results</title>
		<link href="style.css" rel="stylesheet" />
	</head>
	<body>
		<div id="container">
		<?php include_once('header.php');?>
		
		<form method="post" action="results.php" style="width:auto;margin:0;height:50px;margin-top:10px;">
			<a href="http://csce.uark.edu/~lbswango/search.php"><img src="bottomup.jpg" style="width:100px;height:28px;margin:0;padding:0;display:inline" /></a>
			<input type="text" style="width:600px" name="query" <?php if ($hasQuery) {?>value="<?=$_POST['query']?>"<?php }//endif?> />
			<button type="submit" style="display:inline">Search</button>
		</form>

		<?php
			if ($hasQuery) {
				$query = explode(' ',$_POST['query']);
				$output = array();

				$run = './hw4.sh';
				foreach ($query as $q)
					$run .= ' ' . $q;

				chdir('../query/');	
				exec($run,$output);

				$urls = array();
				foreach ($output as $o) {
					$o = explode(' ',$o);
					//echo $o[0].'<br/>';
					exec("sed -n '" . ($o[0]+1) . "p' map",$urls);
				}
				
				if (isset($_POST['lucky']) && !empty($_POST['lucky'])) {
					$page = explode('//',$urls[0]);
					$link = 'http://www.csce.uark.edu/~sgauch/4013-IR/files/' . $page[1];
					header('Location:'.$link);
				}
		?>
		<h1>Search Results for <?=$_POST['query'];?>:</h1>
		
		<div id="linkHolder">
		
			<?php
				if (empty($urls)) {
			?>
				<p>No results</p>
			<?php
				} else {
			
				foreach ($urls as $url) {
					$link = 'http://www.csce.uark.edu/~sgauch/4013-IR/files/';
					$page = explode('//',$url);
					$link .= $page[1];
			?>
			<a href="<?=$link;?>"><?=$link;?></a><br/>
			<?php }//endforeach}
			}//endif ?>
			
		</div>
		
		<?php
			} else {
		?>
			<h1>Please enter a query</h1>
		<?php }//endelse
			include_once('footer.php');
		?>
		</div>
	</body>
</html>