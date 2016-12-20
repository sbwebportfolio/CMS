<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html">
		
		<title>Control panel</title>
		
		<!-- Stylesheets -->
		<link href="<?= base_url() ?>assets/css/controlpanel.css" rel="stylesheet" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

		<!-- Scripts -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/controlpanel.js"></script>
	</head>
	<body>
		<div id="container">
			<header>
				<h3>Hello, <?= $user->first_name ? $user->first_name : $user->email ?></h3>
			</header>
			<div id="content-wrapper" class="row">
				<div id="menu">
					<div menu="pages">Pages</div>
					<div menu="categories">Categories</div>
					<div menu="media">Media</div>
					<div menu="menus">Menus</div>
					<div menu="users">Users</div>
					<div menu="profile">My profile</div>
				</div>
				<div id="content-row">
					<div id="content">
						Something something content
					</div>
					<div id="loading">
						<img src="<?= base_url() ?>assets/img/loading.gif">
					</div>
				</div>
			</div>
			<footer>
				<h3>Control panel made by Scorpiac</h3>
			</footer>
		</div>
	</body>
</html>