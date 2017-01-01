<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to update the category. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/edit-category.js"></script>

<h2>Category</h2>

<!-- Category information. -->
<input id="category-id" type="hidden" value="<?= $category->id ?>">

<form id="update-category-form">
	<p>
		<label for="name">Name</label><br>
		<input id="name" type="text" value="<?= $category->name ?>">
	</p>
	<p>
		<button class="blue">Save</button>
	</p>
</form>
<p id="update-info"></p>

<h2>Remove this category</h2>
<p><button id="remove">Remove</button></p>

<!-- Remove category overlay. -->
<div id="remove-dialog" class="overlay">
	<div>
		<h2>Are you sure you want to remove "<?= $category->name ?>"?</h2>
		<p>This action is permanent and cannot be undone.</p>
		<p>
			<button id="confirm-remove" class="blue">Yes, remove it</button>
			<button id="cancel-remove">Cancel</button>
		</p>
	</div>
</div>