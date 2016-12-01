<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Pages table. -->
<h3>Pages</h3>
<table id="pages-table">
    <tr>
        <th>Title</th>
        <th>Last updated</th>
        <th>Created</th>
    </tr>
    <?php
        foreach ($pages as $page)
        {
            echo(
            "<tr>
                <td>$page->title</td>
                <td>$page->updated</td>
                <td>$page->created</td>
            </tr>"
            );
        }
    ?>
</table>