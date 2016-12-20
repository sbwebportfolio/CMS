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
		$('#info').addClass('error');
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
		url: 'ControlPanel/User/register',
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
	if (json.error != null) {
		$('#info').addClass('error');
		$('#info').text(json.error);
	}
	else
		refreshContent(() => $('#info').text('The user was added successfully.'));
}