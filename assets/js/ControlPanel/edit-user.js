$(document).ready(function() {
	$('#remove').on('click', remove);
});

/**
 * Remove the user.
 */
function remove() {
	showMenu('remove-user', false, {id: $('#user-id').val()});
}