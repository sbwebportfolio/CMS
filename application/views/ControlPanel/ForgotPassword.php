<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html">
		
		<title>Forgot password</title>
		
		<!-- Stylesheets -->
		<link href="<?= base_url() ?>assets/css/controlpanel.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

		<!-- Scripts -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/forgot.js"></script>
	</head>
	<body>
		<div id="login-container">
			<div id="login-content">
				<!-- Forgot password -->
				<form id="forgot-form">
					<h3>Forgot password</h3>
					<p>
						<label for="email">E-mail address</label><br>
						<input id="email" type="text" required>
					</p>
					<p>
						<button type="button" id="back-button">Back to login</button>
						<button class="blue">Send recovery email</button>
					</p>
				</form>
				<!-- Information -->
				<p id="info"></p>
			</div>
		</div>
	</body>
</html>