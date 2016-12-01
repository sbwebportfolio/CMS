$(document).ready(function() {
    $("#update-user-form").on('submit', updateUser);
    $("#change-password-form").on('submit', changePass);
});


/**
 * Update the user's information.
 */
function updateUser(e) {
    e.preventDefault();

    // Get the user data.
    var data = {
        email: $('#email').val(),
        first: $('#first-name').val(),
        last: $('#last-name').val()
    };

    // Do the request.
    $.ajax({
        type: 'POST',
        url: 'User/update',
        data: data,
        success: function(data) {
            var json = $.parseJSON(data);

            if (json.error)
                $('#update-info').html(json.error);
        }
    });
}

/**
 * Change the user's password.
 */
function changePass(e) {
    e.preventDefault();
    $('#pass-info').empty();

    // Check if the passwords match.
    var pass = $('#pass').val();
    var pass2 = $('#pass2').val();
    if (pass != pass2) {
        $('#pass-info').text('The passwords do not match.');
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
        url: 'User/changePassword',
        data: data,
        success: function(data) {
            var json = $.parseJSON(data);

            if (json.error)
                $('#pass-info').html(json.error);
            else {
                $('#pass').val('');
                $('#pass2').val('');
            }
        }
    });
}