<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to remove the page. -->
<script type="text/javascript" src="assets/js/ControlPanel/remove-content.js"></script>

<h3>Are you sure you want to remove the <?= strtolower($content->type) ?> "<?= $content->title ?>"?</h3>
<p>This action is permanent and cannot be undone.</p>
<p>
    <input id="content-id" type="hidden" value="<?= $content->id ?>">
    <input id="content-type" type="hidden" value="<?= $content->type ?>">
    <button id="remove">Yes, remove it</button><button id="cancel">Cancel</button>
</p>