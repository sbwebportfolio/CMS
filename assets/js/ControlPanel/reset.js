'use strict';

var $info;

$(document).ready(function() {
	$info = $('#info');

	$('#reset-form').on('submit', reset);
	$('#to-login').on('click', () => location.href = '/ControlPanel/Login');
});

/**
 * Reset the password.
 */
function reset(e) {
	e.preventDefault();

	// Check if the passwords match.
	var pass = $('#pass').val();
	var pass2 = $('#pass2').val();
	if (pass != pass2) {
		$info.addClass('error');
		$info.text('The passwords do not match.');
		return;
	}

	// Get the data.
	var data = {
		code: $('#code').val(),
		pass: $('#pass').val()
	};

	// Do the request.
	$.ajax({
		type: 'POST',
		url: '/ControlPanel/User/passwordReset',
		data: data,
		dataType: 'json',
		success: function(json) {
			$info.toggleClass('error', !json.success);
			$info.text(json.message);
		}
	});
}