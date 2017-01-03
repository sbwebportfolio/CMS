var $info;

$(document).ready(function() {
	$info = $('#info');

	$("#forgot-form").on('submit', recover);
	$('#back-button').on('click', () => location.href = '/ControlPanel/Login');
});

/**
 * Start the password recovery procedure.
 */
function recover(e) {
	e.preventDefault();

	// Get the data.
	var data = {
		email: $('#email').val()
	};

	// Do the request.
	$.ajax({
		type: 'POST',
		url: '/ControlPanel/User/passwordRecovery',
		data: data,
		dataType: 'json',
		success: function(json) {
			$info.toggleClass('error', !json.success);
			$info.text(json.message);
		}
	});
}