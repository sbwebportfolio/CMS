$(document).ready(function() {
    $("#user-add-form").on('submit', addUser);
});


/**
 * Add a new user.
 */
function addUser(e) {
    e.preventDefault();

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
        success: function(data) {
            var json = $.parseJSON(data);

            if (json.error)
                $('#info').html(json.error);
            else
                refreshContent();
        }
    });
}