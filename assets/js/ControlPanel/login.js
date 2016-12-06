$(document).ready(function() {
    // Set up the form and events.
    $('#recover-form').hide();
    $('#recover-button').on('click', showRecoverForm);
    $('#back-button').on('click', showLoginForm);
    $("#login-form").on('submit', login);
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

/**
 * Log the user in.
 */
function login(e) {
    e.preventDefault();

    // Get the login data.
    var data = {
        user: $('#user').val(),
        pass: $('#pass').val(),
        remember: $('#remember').is(':checked')
    };

    // Do the request.
    $.ajax({
        type: 'POST',
        url: 'ControlPanel/User/login',
        data: data,
        success: function(data) {
            var json = $.parseJSON(data);

            if (json.error)
                $('#info').html(json.error);
            else
                location.reload(true);
        }
    });
}