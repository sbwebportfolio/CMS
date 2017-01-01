$(document).ready(function() {
	$('#remove').on('click', () => $('#remove-dialog').visible());
	$("#update-category-form").on('submit', updateCategory);

	// Remove category events.
	$('#confirm-remove').on('click', remove);
	$('#cancel-remove').on('click', () => $('#remove-dialog').invisible());
});

/**
 * Update the category information.
 */
function updateCategory(e) {
	e.preventDefault();

	// Get the category data.
	var data = {
		id: $('#category-id').val(),
		name: $('#name').val()
	};

	// Do the request.
	$.ajax({
		type: 'POST',
		url: 'ControlPanel/Category/update',
		data: data,
		dataType: 'json',
		success: function(json) {
			// Check for errors.
			$('#update-info').toggleClass('error', json.error != null);
			$('#update-info').text(json.error ? json.error : 'The category was saved successfully.');
		}
	});
}

/**
 * Remove the category.
 */
function remove() {
	$.ajax({
		type: 'GET',
		url: 'ControlPanel/Category/remove?id=' + $('#category-id').val(),
		success: () => showMenu('categories')
	});
}