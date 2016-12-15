<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to show users. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/users.js"></script>

<h2>Users</h2>

<!-- Users table. -->
<table id="users-table">
	<tr>
		<th>First name</th>
		<th>Last name</th>
		<th>E-mail address</th>
		<th>Date added</th>
	</tr>
	<?php
		foreach ($users as $user)
		{
			$created = date('Y-m-d', $user->created_on);
			echo("
			<tr class='link' user='$user->id'>
				<td>$user->first_name</td>
				<td>$user->last_name</td>
				<td>$user->email</td>
				<td>$created</td>
			</tr>
			");
		}
	?>
</table>