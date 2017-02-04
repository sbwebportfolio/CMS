<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to update the menu. -->
<script type="text/javascript" src="/assets/js/ControlPanel/edit-menu.js"></script>

<h2>Edit menu</h2>

<p>Name: <span id="name"><?= $name ?></span></p>
<p>Drag and drop the items to reorder them.</p>

<div class="row">
	<div class="col wide">
		<!-- Page items table. -->
		<table id="items-table">
			<tr>
				<th>Title</th>
				<th>Url</th>
				<th>Actions</th>
			</tr>
			<!-- Create a row for each page. -->
			<?php
			foreach ($items as $item)
			{
			?>
				<tr class="menu-item draggable">
					<td class="title"><?= $item->title ?></td>
					<td class="url"><a href="<?= $item->url ?>"><?= $item->url ?></a></td>
					<td><button class="remove-button">Remove</button></td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
	<!-- Pages box. -->
	<div class="col big-margin box">
		<p class="bold">Pages</p>
		<p>Click a page to add it to the menu.</p>
		<hr>
		<input id="search-pages" type="text" placeholder="Type here to search...">
		<?php
		foreach ($pages as $page)
			echo '<p class="link add-page" page="' . $page->id . '">' . $page->title . '</p>';
		?>
	</div>
</div>

<p><button id="save" class="blue">Save</button></p>
<p id="info"></p>