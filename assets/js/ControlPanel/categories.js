$(document).ready(function() {
	$("#category-add-form").on('submit', addCategory);
});


/**
 * Add a new category.
 */
function addCategory(e) {
	e.preventDefault();
	$('#info').empty();

	// Get the data.
	var data = {
		name: $('#name').val(),
	};

	// Do the request.
	$.ajax({
		type: 'POST',
		url: 'ControlPanel/Category/create',
		data: data,
		dataType: 'json',
		success: showResult
	});
}

/**
 * Show the result of adding a category.
 */
function showResult(json) {
	// Check for errors.
	if (json.error != null) {
		$('#info').addClass('error');
		$('#info').text(json.error);
	}
	else
		refreshContent(() => $('#info').text('The category was added successfully.'));
}