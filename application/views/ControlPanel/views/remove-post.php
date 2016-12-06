<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to remove the page. -->
<script type="text/javascript" src="assets/js/ControlPanel/remove-post.js"></script>

<h3>Are you sure you want to remove "<?= $post->title ?>"?</h3>
<p>This action is permanent and cannot be undone.</p>
<p>
    <button post="<?= $post->id ?>" id="remove">Yes, remove it</button><button id="cancel">Cancel</button>
</p>