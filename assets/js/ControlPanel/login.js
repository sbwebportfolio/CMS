'use strict';

$(document).ready(function() {
	$('#recover-button').on('click', () => location.href = '/ControlPanel/ForgotPassword');
	$("#login-form").on('submit', login);
});

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
		url: '/ControlPanel/User/login',
		data: data,
		dataType: 'json',
		success: function(json) {
			if (json.error)
				$('#info').html(json.error);
			else
				location.href = '/ControlPanel/ControlPanel';
		}
	});
}