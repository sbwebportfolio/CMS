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
		url: 'ControlPanel/User/update',
		data: data,
		dataType: 'json',
		success: function(json) {
			// Check for errors.
			$('#update-info').toggleClass('error', json.error != null);
			$('#update-info').text(json.error ? json.error : 'Your information is saved.');
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
	var oldPass = $('#old-pass').val();
	var pass = $('#pass').val();
	var pass2 = $('#pass2').val();
	if (pass != pass2) {
		$('#pass-info').text('The passwords do not match.');
		return;
	}

	// Get the user data.
	var data = {
		email: $('#email').val(),
		pass: pass,
		oldPass: oldPass
	};

	// Do the request.
	$.ajax({
		type: 'POST',
		url: 'ControlPanel/User/changePassword',
		data: data,
		dataType: 'json',
		success: function(json) {
			// Check for errors.
			$('#pass-info').toggleClass('error', json.error != null);
			$('#pass-info').text(json.error ? json.error : 'Your password is changed.');

			// Empty the password inputs on success.
			if (!json.error) {
				$('#old-pass').val('');
				$('#pass').val('');
				$('#pass2').val('');
			}
		}
	});
}