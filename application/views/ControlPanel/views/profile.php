<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to update the profile. -->
<script type="text/javascript" src="/assets/js/ControlPanel/profile.js"></script>

<!-- Update info form. -->
<h2>My profile</h2>
<form id="update-user-form">
	<p>
		<label for="first-name">First name</label><br>
		<input id="first-name" type="text" value="<?= $user->first_name ?>">
	</p>
	<p>
		<label for="last-name">Last name</label><br>
		<input id="last-name" type="text" value="<?= $user->last_name ?>">
	</p>
	<p>
		<label for="email">E-mail address</label><br>
		<input id="email" type="text" required value="<?= $user->email ?>">
	</p>
	<p>
		<button class="blue">Save</button>
	</p>
</form>
<p id="update-info"></p>

<!-- Change password form. -->
<h2>Change your password</h2>
<form id="change-password-form">
	<p>
		<label for="old-pass">Old password</label><br>
		<input id="old-pass" type="password">
	</p>
	<p>
		<label for="pass">New password</label><br>
		<input id="pass" type="password">
	</p>
	<p>
		<label for="pass2">Repeat new password</label><br>
		<input id="pass2" type="password">
	</p>
	<p>
		<button class="blue">Change password</button>
	</p>
</form>
<p id="pass-info"></p>