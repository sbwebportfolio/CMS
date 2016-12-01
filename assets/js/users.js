$(document).ready(function() {
    $("#user-add-form").on('submit', addUser);
});


/**
 * Add a new user.
 */
function addUser(e) {
    e.preventDefault();

    var pass = $('#pass').val();
    var pass2

    // Get the user data.
    var data = {
        email: $('#email').val(),
        pass: $('#pass').val()
    };

    // Do the request.
    $.ajax({
        type: 'POST',
        url: 'Auth/register',
        data: data,
        success: function(data) {
            var json = $.parseJSON(data);

            if (json.error)
                $('#info').text(json.error);
            else
                showMenu(menuItem);
        }
    });
}