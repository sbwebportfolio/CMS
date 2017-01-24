<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h2>Edit menu</h2>

<p>Name: <?= $name ?></p>

<!-- Page items table. -->
<table>
	<tr>
		<th>Page</th>
		<th>Slug</th>
	</tr>
	<!-- Create a row for each page. -->
	<?php
	foreach ($items as $page)
	{
	?>
		<tr>
			<td><?= $page->title ?></td>
			<td><?= $page->slug ?></td>
		</tr>
	<?php
	}
	?>
</table>