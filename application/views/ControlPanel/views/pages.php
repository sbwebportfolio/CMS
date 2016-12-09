<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to edit or delete pages. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/pages.js"></script>

<h2>Pages</h2>

<!-- Pages table. -->
<table id="pages-table">
	<tr>
		<th>Title</th>
		<th>Actions</th>
		<th>Categories</th>
		<th>Last updated</th>
		<th>Created</th>
	</tr>
	<?php
		foreach ($pages as $page)
		{
			$categories = implode(', ', $page->categories);
			echo("
			<tr>
				<td>$page->title</td>
				<td><span page='$page->id' class='link' action='edit-page'>edit</span> | <span page='$page->id' class='link' action='remove-page'>remove</span></td>
				<td>$categories</td>
				<td>$page->updated</td>
				<td>$page->created</td>
			</tr>
			");
		}
	?>
</table>