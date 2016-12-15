$(document).ready(function() {
	$('#remove').on('click', remove);
	$('#cancel').on('click', function() { showMenu('users'); });
});

/**
 * Remove a user.
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