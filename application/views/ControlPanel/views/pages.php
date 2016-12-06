<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to edit or delete pages. -->
<script type="text/javascript" src="assets/js/ControlPanel/pages.js"></script>

<h3>Pages</h3>

<!-- Pages table. -->
<table id="pages-table">
    <tr>
        <th>Title</th>
        <th>Actions</th>
        <th>Last updated</th>
        <th>Created</th>
    </tr>
    <?php
        foreach ($pages as $page)
        {
            echo(
            "<tr>
                <td>$page->title</td>
                <td><span page='$page->id' class='link edit-page'>edit</span> | <span page='$page->id' class='link remove-page'>remove</span></td>
                <td>$page->updated</td>
                <td>$page->created</td>
            </tr>"
            );
        }
    ?>
</table>