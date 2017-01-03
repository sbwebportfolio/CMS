<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html">
		
		<title>Reset password</title>
		
		<!-- Stylesheets -->
		<link href="<?= base_url() ?>assets/css/controlpanel.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

		<!-- Scripts -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/reset.js"></script>
	</head>
	<body>
		<div id="login-container">
			<div id="login-content">
				<!-- Reset password -->
				<form id="reset-form">
					<h3>Reset password</h3>
					<input id="code" type="hidden" value="<?= $code ?>">
					<p>
						<label for="pass">New password</label><br>
						<input id="pass" type="password" required>
					</p>
					<p>
						<label for="pass2">Repeat password</label><br>
						<input id="pass2" type="password" required>
					</p>
					<p>
						<button class="blue">Reset password</button>
						<button type="button" id="to-login">Back to login</button>
					</p>
				</form>
				<!-- Information -->
				<p id="info"></p>
			</div>
		</div>
	</body>
</html>