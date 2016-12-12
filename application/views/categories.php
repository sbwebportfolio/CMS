<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html">
		
		<title>Pages</title>
	</head>
	<body>
		<h2>Categories:</h2>
		<ul>
		<?php
		foreach ($categories as $category)
		{
		?>
			<li><?= $category->name ?></li>
		<?php	
		}
		?>
		</ul>
	</body>
</html>