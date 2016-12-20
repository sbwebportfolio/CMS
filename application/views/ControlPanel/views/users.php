<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to add a new user. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/add-user.js"></script>

<h2>Users</h2>

<!-- Users table. -->
<table>
	<tr>
		<th>First name</th>
		<th>Last name</th>
		<th>E-mail address</th>
		<th>Date added</th>
	</tr>
	<!-- Create a row for each user. -->
	<?php
	foreach ($users as $user)
	{
	?>
		<tr onclick="location.hash = '#edit-user:<?= $user->id ?>';">
			<td><?= $user->first_name ?></td>
			<td><?= $user->last_name ?></td>
			<td><?= $user->email ?></td>
			<td><?= date('Y-m-d', $user->created_on) ?></td>
		</tr>
	<?php
	}
	?>
</table>

<h2>Add a user</h2>

<!-- New user form. -->
<form id="user-add-form">
	<p>
		<label for="email">E-mail address</label><br>
		<input id="email" type="text">
	</p>
	<p>
		<label for="pass">Password</label><br>
		<input id="pass" type="password">
	</p>
	<p>
		<label for="pass2">Repeat password</label><br>
		<input id="pass2" type="password">
	</p>
	<p>
		<button class="blue">Add user</button>
	</p>
</form>
<p id="info"></p>