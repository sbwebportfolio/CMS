$(document).ready(function() {
	// Find all page action links.
	$('[page]').each(function() {
		var $this = $(this);
		var data = {id: $this.attr('page')};

		// Set the link action.
		$this.on('click', function() {
			showMenu('edit-page', false, data);
		});
	});
});