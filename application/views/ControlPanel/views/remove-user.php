<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to remove the page. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/remove-user.js"></script>

<h2>Are you sure you want to remove the user "<?= $user->first_name . ' ' . $user->last_name . ' (' . $user->email . ')' ?>"?</h2>
<p>This action is permanent and cannot be undone.</p>
<p>
	<input id="user-id" type="hidden" value="<?= $user->id ?>">
	<button id="remove" class="blue">Yes, remove them</button><button id="cancel">Cancel</button>
</p>