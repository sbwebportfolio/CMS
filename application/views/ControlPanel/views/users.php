<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<h3>Users</h3>
<table id="users-table">
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>E-mail address</th>
    </tr>
    <?php
        foreach ($users as $user)
        {
            echo(
            "<tr>
                <td>$user->first_name</td>
                <td>$user->last_name</td>
                <td>$user->email</td>
            </tr>"
            );
        }
    ?>
</table>