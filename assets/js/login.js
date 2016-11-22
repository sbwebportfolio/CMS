$(document).ready(function(){
    // Set up the form and events.
    $('#recover-form').hide();
    $('#recover-button').on('click', showRecoverForm);
    $('#back-button').on('click', showLoginForm);
});

/**
 * Show the password recovery form.
 */
function showRecoverForm() {
    $('#login-form').slideUp();
    $('#recover-form').slideDown();
}

/**
 * Show the normal login form.
 */
function showLoginForm() {
    $('#login-form').slideDown();
    $('#recover-form').slideUp();
}