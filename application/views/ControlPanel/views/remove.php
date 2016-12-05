<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to remove the page. -->
<script type="text/javascript" src="assets/js/remove.js"></script>

<h3>Are you sure you want to remove "<?= $page->title ?>"?</h3>
<p>This action is permanent and cannot be undone.</p>
<p>
    <button page="<?= $page->id ?>" id="remove">Yes, remove it</button><button id="cancel">Cancel</button>
</p>