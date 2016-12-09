<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to save pages. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/edit-page.js"></script>

<h2>Edit page</h2>

<input id="page-id" type="hidden" value="<?= $page->id ?>">
<div class="row">
	<!-- Editor -->
	<div class="col wide">
		<p><input id="title" class="full-width" type="text" maxlength="255" value="<?= $page->title ?>" required></p>
		<p>
			Slug: <input id="slug" type="text" maxlength="255" placeholder="e.g.: my-page" value="<?= $page->slug ?>" required>
			<button id="suggest-slug">Suggest a slug</button>
		</p>
		<p><textarea id="editor" class="full-width"><?= $page->content ?></textarea></p>
	</div>
	<div class="col big-margin">
		<!-- About this page -->
		<div class="box">
			<p class="bold">About this page</p>
			<hr>
			<p>Created on: <?= $page->created ?></p>
			<p>Last updated on: <?= $page->updated ?></p>
			<p><button id="save" class="blue">Save</button></p>
		</div>
		<!-- Page attributes -->
		<div class="box">
			<p class="bold">Page attributes</p>
			<hr>
			<p><input id="hidden" type="checkbox"><label for="hidden">Hidden</label></p>
			<p>Categories:</p>
			<?php
				foreach ($categories as $category)
				{
					$name = $category->name;
					$checked = in_array($name, $page->categories) ? 'checked' : '';
					echo("
					<p>
						<input id='cat-$name' type='checkbox' $checked>
						<label for='cat-$name'>$name</label>
					</p>
					");
				}
			?>
		</div>
	</div>
</div>
<p id="info"></p>