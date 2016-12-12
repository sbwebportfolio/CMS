<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html">
		
		<title><?= $page->title ?></title>
	</head>
	<body>
		<h2><?= $page->title ?></h2>
		<p>Created: <?= $page->created ?>, last updated: <?= $page->updated ?></p>
		<p>Categories: <?= implode(', ', $page->categories) ?></p>
		<?= $page->content ?>
	</body>
</html>