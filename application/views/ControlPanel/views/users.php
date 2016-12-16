<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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