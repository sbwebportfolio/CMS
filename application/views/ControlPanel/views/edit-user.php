<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to update the profile. -->
<script type="text/javascript" src="/assets/js/ControlPanel/edit-user.js"></script>

<h2>User profile</h2>

<!-- User information. -->
<input id="user-id" type="hidden" value="<?= $user->id ?>">
<p>First name: <?= $user->first_name ?></p>
<p>Last name: <?= $user->last_name ?></p>
<p>E-mail address: <?= $user->email ?></p>

<h2>Remove this user</h2>
<p><button id="remove">Remove</button></p>

<!-- Remove user overlay. -->
<div id="remove-dialog" class="overlay">
	<div>
		<h2>Are you sure you want to remove "<?= $user->first_name . ' ' . $user->last_name . ' (' . $user->email . ')' ?>"?</h2>
		<p>This action is permanent and cannot be undone.</p>
		<p>
			<button id="confirm-remove" class="blue">Yes, remove them</button>
			<button id="cancel-remove">Cancel</button>
		</p>
	</div>
</div>