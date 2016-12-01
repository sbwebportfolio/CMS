<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html">
		
		<title>Log in to control panel</title>
		
        <!-- Stylesheets -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/login.css" rel="stylesheet" type="text/css" />

        <!-- Scripts -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="assets/js/login.js"></script>
	</head>
    <body>
        <div id="container">
            <div id="content">
                <!-- Login -->
                <form id="login-form">
                    <h3>Log in</h3>
                    <p>
                        <label for="user">E-mail address</label><br>
                        <input id="user" name="user" type="text">
                    </p>
                    <p>
                        <label for="pass">Password</label><br>
                        <input id="pass" name="pass" type="password">
                    </p>
                    <p>
                        <input id="remember" name="remember" type="checkbox">
                        <label for="remember">Remember me</label>
                    </p>
                    <p>
                        <button id="login-submit">Log in</button>
                        <button type="button" id="recover-button">Forgot password?</button>
                    </p>
                </form>
                <!-- Recover -->
                <form id="recover-form">
                    <h3>Recover account</h3>
                    <p>
                        <label for="email">E-mail address</label><br>
                        <input id="email" name="email" type="text">
                    </p>
                    <p>
                        <button type="button" id="back-button">Go back</button>
                        <button type="button" id="recover-submit">Send recovery email</button>
                    </p>
                </form>
                <!-- Information -->
                <p id="info" class="error"></p>
            </div>
        </div>
    </body>
</html>