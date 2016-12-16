$(document).ready(function() {
	$('#remove').on('click', function() { $('#remove-dialog').visible(); });

	// Remove user events.
	$('#confirm-remove').on('click', remove);
	$('#cancel-remove').on('click', function() { $('#remove-dialog').invisible(); });
});

/**
 * Remove the user.
 */
function remove() {
	$.ajax({
		type: 'GET',
		url: 'ControlPanel/User/remove?id=' + $('#user-id').val(),
		success: function(data) {
			showMenu('users');
		}
	});
}