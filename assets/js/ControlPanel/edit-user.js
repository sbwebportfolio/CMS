$(document).ready(function() {
	$('#remove').on('click', remove);
});

/**
 * Remove the user.
 */
function remove() {
	showMenu('remove-user', $('#user-id').val());
}