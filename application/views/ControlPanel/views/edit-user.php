<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to update the profile. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/edit-user.js"></script>

<h2>User profile</h2>

<!-- User information. -->
<input id="user-id" type="hidden" value="<?= $user->id ?>">
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

<p class="bold">Remove this user</p>
<p>
	<button id="remove">Remove</button>
</p>