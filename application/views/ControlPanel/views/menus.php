<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h2>Menus</h2>
<!-- Menus table. -->
<table>
	<tr><th>Name</th></tr>
<?php
foreach ($menus as $name => $items)
{
?>
	<tr onclick="location.hash = '#edit-menu:<?= $name ?>';">
		<td><?= $name ?></td>
	</tr>
<?php
}
?>
</table>