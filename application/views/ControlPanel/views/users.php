<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to add a new user. -->
<script type="text/javascript" src="assets/js/users.js"></script>

<h3>Users</h3>

<!-- Users table. -->
<table id="users-table">
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>E-mail address</th>
        <th>Date added</th>
    </tr>
    <?php
        foreach ($users as $user)
        {
            $created = date('Y-m-d', $user->created_on);
            echo(
            "<tr>
                <td>$user->first_name</td>
                <td>$user->last_name</td>
                <td>$user->email</td>
                <td>$created</td>
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
        <input id="email" name="email" type="text" required>
    </p>
    <p>
        <label for="pass">Password</label><br>
        <input id="pass" name="pass" type="password" required>
    </p>
    <p>
        <label for="pass2">Repeat password</label><br>
        <input id="pass2" name="pass2" type="password" required>
    </p>
    <p>
        <button id="add-submit">Add user</button>
    </p>
</form>
<p id="info" class="error"></p>