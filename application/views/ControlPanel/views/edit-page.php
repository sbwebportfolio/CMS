<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to save pages. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/edit-page.js"></script>

<h3>Edit page</h3>

<input id="page-id" type="hidden" value="<?= $page->id ?>">
<p><input id="title" type="text" value="<?= $page->title ?>"></p>
<p><textarea id="editor" rows="10" cols="50"><?= $page->content ?></textarea></p>
<p><button id="save">Save</button></p>
<p id="info"></p>