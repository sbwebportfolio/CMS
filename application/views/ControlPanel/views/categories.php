<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to add a new category. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/categories.js"></script>

<h2>Categories</h2>

<!-- Categories table. -->
<table>
	<tr>
		<th>Name</th>
		<th>Pages</th>
	</tr>
	<!-- Create a row for each category. -->
	<?php
	foreach ($categories as $category)
	{
	?>
		<tr onclick="location.hash = '#edit-category:<?= $category->id ?>';">
			<td><?= $category->name ?></td>
			<td><?= $category->page_count ?></td>
		</tr>
	<?php
	}
	?>
</table>

<h2>Add a category</h2>

<!-- New category form. -->
<form id="category-add-form">
	<input id="name" type="text"><button class="blue">Add category</button>
</form>
<p id="info"></p>