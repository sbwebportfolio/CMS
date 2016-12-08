<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html">
		
		<title>Control panel</title>
		
		<!-- Stylesheets -->
		<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />
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
			<div id="content-wrapper">
				<div id="menu">
					<div class="menu-group">
						<div menu="pages">Pages</div>
						<div class="menu-group-items">
							<div menu="new-page">New page</div>
						</div>
					</div>
					<div menu="media">Media</div>
					<div menu="menus">Menus</div>
					<div class="menu-group">
						<div menu="users">Users</div>
						<div class="menu-group-items">
							<div menu="add-user">Add user</div>
							<div menu="profile">My profile</div>
						</div>
					</div>
				</div>
				<div id="content">
					Something something content
				</div>
			</div>
			<footer>
				<h3>Control panel made by Scorpiac</h3>
			</footer>
		</div>
	</body>
</html>