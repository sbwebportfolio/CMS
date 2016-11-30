<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html">
		
		<title>Control panel</title>
		
		<!-- Stylesheets -->
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/controlpanel.css" rel="stylesheet" type="text/css" />

		<!-- Scripts -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="assets/js/controlpanel.js"></script>
	</head>
	<body>
		<div id="container">
			<div class="row">
				<h3>Hello, user<h3>
			</div>
			<div id="content-wrapper">
				<div id="menu">
					<div id="menu-pages" menu="pages" class="menu-item">Pages</div>
					<div id="menu-posts" menu="posts" class="menu-item">Posts</div>
					<div id="menu-menus" menu="menus" class="menu-item">Menus</div>
					<div id="menu-users" menu="users" class="menu-item">Users</div>
				</div>
				<div id="content">
					Something something content
				</div>
			</div>
			<div class="row">
				<h3>Control panel made by Scorpiac</h3>
			</div>
		</div>
	</body>
</html>