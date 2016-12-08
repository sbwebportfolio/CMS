<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to save pages. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/edit-page.js"></script>

<h2>Edit page</h2>

<input id="page-id" type="hidden" value="<?= $page->id ?>">
<div class="row">
    <div class="col">
        <p><input id="title" type="text" value="<?= $page->title ?>"></p>
        <p><textarea id="editor" rows="10" cols="50"><?= $page->content ?></textarea></p>
        <p><button id="save">Save</button></p>
    </div>
    <div class="col big-margin">
        <div class="box">
            <p class="bold">About this page</p>
            <hr>
            <p>Created on: <?= $page->created ?></p>
            <p>Last updated on: <?= $page->updated ?></p>
        </div>
        <div class="box">
            <p class="bold">Page attributes</p>
            <hr>
            <p><input id="hidden" type="checkbox"><label for="hidden">Hidden</label></p>
            <p>Categories:</p>
            <?php
                foreach ($categories as $category)
                {
                    $name = $category->name;
                    $checked = in_array($name, $page->categories) ? 'checked' : '';
                    echo("
                    <p>
                        <input id='cat-$name' type='checkbox' $checked>
                        <label for='cat-$name'>$name</label>
                    </p>
                    ");
                }
            ?>
        </div>
    </div>
</div>
<p id="info"></p>