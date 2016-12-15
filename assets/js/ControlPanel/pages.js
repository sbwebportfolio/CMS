$(document).ready(function() {
	// Find all page links.
	$('[page]').each(function() {
		var $this = $(this);

		$this.on('click', function() {
			showMenu('edit-page', false, {id: $this.attr('page')});
		});
	});
});