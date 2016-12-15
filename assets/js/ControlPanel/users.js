$(document).ready(function() {
	// Find all user links.
	$('[user]').each(function() {
		var $this = $(this);

		$this.on('click', function() {
			showMenu('edit-user', false, {id: $this.attr('user')});
		});
	});
});