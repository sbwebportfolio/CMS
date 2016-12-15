<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h2>Pages</h2>

<!-- Pages table. -->
<table id="pages-table">
	<tr>
		<th>Title</th>
		<th>Categories</th>
		<th>Last updated</th>
		<th>Created</th>
	</tr>
	<!-- Create a row for each page. -->
	<?php
	foreach ($pages as $page)
	{
	?>
		<tr onclick="location.hash = '#edit-page:<?= $page->id ?>';">
			<td><?= $page->title ?></td>
			<td><?= implode(', ', $page->categories) ?></td>
			<td><?= $page->updated ?></td>
			<td><?= $page->created ?></td>
		</tr>
	<?php
	}
	?>
</table>