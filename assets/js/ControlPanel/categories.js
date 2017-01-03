'use strict';

var $info;

$(document).ready(function() {
	$info = $('#info');
	$("#category-add-form").on('submit', addCategory);
});

/**
 * Add a new category.
 */
function addCategory(e) {
	e.preventDefault();
	$info.empty();

	// Get the data.
	var data = {
		name: $('#name').val(),
	};

	// Do the request.
	$.ajax({
		type: 'POST',
		url: '/ControlPanel/Category/create',
		data: data,
		dataType: 'json',
		success: showResult
	});
}

/**
 * Show the result of adding a category.
 */
function showResult(json) {
	$info.toggleClass('error', !json.success);
	$info.text(json.message);

	if (json.success)
		refreshContent();
}