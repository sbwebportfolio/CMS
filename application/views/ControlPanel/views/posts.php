<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to edit or delete posts. -->
<script type="text/javascript" src="assets/js/ControlPanel/posts.js"></script>

<h3>Posts</h3>

<!-- Posts table. -->
<table id="posts-table">
    <tr>
        <th>Title</th>
        <th>Actions</th>
        <th>Last updated</th>
        <th>Created</th>
    </tr>
    <?php
        foreach ($posts as $post)
        {
            echo(
            "<tr>
                <td>$post->title</td>
                <td><span post='$post->id' class='link edit-post'>edit</span> | <span post='$post->id' class='link remove-post'>remove</span></td>
                <td>$post->updated</td>
                <td>$post->created</td>
            </tr>"
            );
        }
    ?>
</table>