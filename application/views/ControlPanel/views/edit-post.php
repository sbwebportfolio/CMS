<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to save pages. -->
<script type="text/javascript" src="assets/js/ControlPanel/edit-post.js"></script>

<h3>Edit post</h3>

<input id="post-id" type="hidden" value="<?= $post->id ?>">
<p><input id="title" type="text" value="<?= $post->title ?>"></p>
<p><textarea id="editor" rows="10" cols="50"><?= $post->content ?></textarea></p>
<p><button id="save">Save</button></p>
<p id="info"></p>