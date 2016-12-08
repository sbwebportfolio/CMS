<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to add a new user. -->
<script type="text/javascript" src="<?= base_url() ?>assets/js/ControlPanel/add-user.js"></script>

<h3>Add a user</h3>

<!-- New user form. -->
<form id="user-add-form">
    <p>
        <label for="email">E-mail address</label><br>
        <input id="email" type="text">
    </p>
    <p>
        <label for="pass">Password</label><br>
        <input id="pass" type="password">
    </p>
    <p>
        <label for="pass2">Repeat password</label><br>
        <input id="pass2" type="password">
    </p>
    <p>
        <button>Add user</button>
    </p>
</form>
<p id="info"></p>