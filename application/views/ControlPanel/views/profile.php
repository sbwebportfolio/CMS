<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Script to update the profile. -->
<script type="text/javascript" src="assets/js/ControlPanel/profile.js"></script>

<h3>My profile</h3>

<!-- Update info form. -->
<h4>Update your information</h4>
<form id="update-user-form">
    <p>
        <label for="first-name">First name</label><br>
        <input id="first-name" name="first-name" type="text" value="<?= $user->first_name ?>">
    </p>
    <p>
        <label for="last-name">Last name</label><br>
        <input id="last-name" name="last-name" type="text" value="<?= $user->last_name ?>">
    </p>
    <p>
        <label for="email">E-mail address</label><br>
        <input id="email" name="email" type="text" required value="<?= $user->email ?>">
    </p>
    <p>
        <button>Save</button>
    </p>
</form>
<p id="update-info" class="error"></p>

<!-- Change password form. -->
<h4>Change your password</h4>
<form id="change-password-form">
    <p>
        <label for="old-pass">Old password</label><br>
        <input id="old-pass" name="old-pass" type="password">
    </p>
    <p>
        <label for="pass">New password</label><br>
        <input id="pass" name="pass" type="password">
    </p>
    <p>
        <label for="pass2">Repeat new password</label><br>
        <input id="pass2" name="pass2" type="password">
    </p>
    <p>
        <button>Change password</button>
    </p>
</form>
<p id="pass-info" class="error"></p>