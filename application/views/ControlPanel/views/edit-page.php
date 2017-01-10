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
		<p><textarea name='editor' id="editor" class="full-width"><?= $page->content ?></textarea></p>
	</div>
	<div class="col big-margin">
		<!-- About this page -->
		<div class="box">
			<p class="bold">About this page</p>
			<hr>
			<p>Created on: <?= $page->created ?></p>
			<p>Last updated on: <?= $page->updated ?></p>
			<p>
				<button id="save" class="blue">Save</button>
				<button id="remove">Remove</button>
			</p>
		</div>
		<!-- Page attributes -->
		<div class="box">
			<p class="bold">Page attributes</p>
			<hr>
			<p>
				<input id="hidden" type="checkbox" <?= $page->hidden ? 'checked' : '' ?>>
				<label for="hidden">Hidden</label>
			</p>
			<p>
				<label>Template:</label>
				<select id="template">
					<?php
					foreach ($templates as $template)
					{
						$selected = $page->template === $template ? 'selected="selected"' : '';
					?>
						<option value="<?= $template ?>" <?= $selected ?>><?= $template ?></option>
					<?php
					}
					?>
				</select>
			</p>
			<p>Categories:</p>
			<!-- Create a checkbox for each category. -->
			<?php
			foreach ($categories as $category)
			{
				$checked = in_array($category->name, $page->categories) ? 'checked' : '';
			?>
				<p>
					<input type='checkbox' id='category:<?= $category->name ?>' category-id='<?= $category->id ?>' class='category' <?= $checked ?>>
					<label for='category:<?= $category->name ?>'><?= $category->name ?></label>
				</p>
			<?php
			}
			?>
		</div>
	</div>
</div>
<p id="info"></p>

<!-- Remove page overlay. -->
<div id="remove-dialog" class="overlay">
	<div>
		<h2>Are you sure you want to remove "<?= $page->title ?>"?</h2>
		<p>This action is permanent and cannot be undone.</p>
		<p>
			<button id="confirm-remove" class="blue">Yes, remove it</button>
			<button id="cancel-remove">Cancel</button>
		</p>
	</div>
</div>