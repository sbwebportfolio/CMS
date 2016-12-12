<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html">
		
		<title>Pages</title>
	</head>
	<body>
		<?php
		foreach ($pages as $page)
		{
		?>
			<h2><?= $page->title ?></h2>
			<p>Created: <?= $page->created ?>, last updated: <?= $page->updated ?></p>
			<p>Categories: <?= implode(', ', $page->categories) ?></p>
			<?= $page->content ?>
			<hr>
		<?php
		}
		?>
	</body>
</html>