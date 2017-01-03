'use strict';

$(document).ready(function() {
	$('#remove').on('click', () => $('#remove-dialog').visible());

	// Remove user events.
	$('#confirm-remove').on('click', remove);
	$('#cancel-remove').on('click', () => $('#remove-dialog').invisible());
});

/**
 * Remove the user.
 */
function remove() {
	$.ajax({
		type: 'GET',
		url: './User/remove?id=' + $('#user-id').val(),
		success: () => showMenu('users')
	});
}