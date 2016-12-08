$(document).ready(function() {
    $("#user-add-form").on('submit', addUser);
});


/**
 * Add a new user.
 */
function addUser(e) {
    e.preventDefault();
    $('#info').empty();

    // Check if the passwords match.
    var pass = $('#pass').val();
    var pass2 = $('#pass2').val();
    if (pass != pass2) {
        $('#info').text('The passwords do not match.');
        return;
    }

    // Get the user data.
    var data = {
        email: $('#email').val(),
        pass: pass
    };

    // Do the request.
    $.ajax({
        type: 'POST',
        url: 'User/register',
        data: data,
        success: showResult
    });
}

/**
 * Show the result of adding a user.
 */
function showResult(data) {
    var json = $.parseJSON(data);

    // Check for errors.
    $('#info').toggleClass('error', json.error != null);
    $('#info').text(json.error ? json.error : 'The user was added successfully.');

    // Empty the password inputs, show the message.
    $('#pass').val('');
    $('#pass2').val('');
}