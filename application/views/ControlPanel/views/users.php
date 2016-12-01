<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to add a new user. -->
<script type="text/javascript" src="assets/js/users.js"></script>

<!-- Users table. -->
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

<!-- New user form. -->
<h3>Add a user</h3>
<form id="user-add-form">
    <p>
        <label for="email">E-mail address</label><br>
        <input id="email" name="email" type="text">
    </p>
    <p>
        <label for="pass">Password</label><br>
        <input id="pass" name="pass" type="password">
    </p>
    <p>
        <label for="pass2">Repeat password</label><br>
        <input id="pass2" name="pass2" type="password">
    </p>
    <p>
        <button id="add-submit">Add user</button>
    </p>
</form>
<p id="info"></p>