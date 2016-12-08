<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to remove the page. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/remove-page.js"></script>

<h2>Are you sure you want to remove "<?= $page->title ?>"?</h2>
<p>This action is permanent and cannot be undone.</p>
<p>
    <input id="page-id" type="hidden" value="<?= $page->id ?>">
    <button id="remove">Yes, remove it</button><button id="cancel">Cancel</button>
</p>