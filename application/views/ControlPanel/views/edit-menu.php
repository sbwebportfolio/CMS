<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to update the menu. -->
<script type="text/javascript" src="/assets/js/ControlPanel/edit-menu.js"></script>

<h2>Edit menu</h2>

<p>Name: <span id="name"><?= $name ?></span></p>
<p>Drag and drop the items to reorder them.</p>

<!-- Page items table. -->
<table>
	<tr>
		<th>Page</th>
		<th>Slug</th>
		<th>Actions</th>
	</tr>
	<!-- Create a row for each page. -->
	<?php
	foreach ($items as $page)
	{
	?>
		<tr class="menu-item draggable">
			<td><?= $page->title ?></td>
			<td class="page-slug"><?= $page->slug ?></td>
			<td><button>Remove</button></td>
		</tr>
	<?php
	}
	?>
</table>

<p><button id="save" class="blue">Save</button></p>
<p id="info"></p>