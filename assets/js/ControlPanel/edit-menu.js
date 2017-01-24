'use strict';

$(document).ready(function() {
	$('#save').on('click', save);
});

/**
 * Save the menu.
 */
function save() {
	// Get all menu items.
	var items = [];
	$('.menu-item').each((i, item) => items.push($(item).children('.page-slug').text()));

	var data = {
		name: $('#name').text(),
		items: items
	};

	// Post the request.
	$.ajax({
		type: 'POST',
		url: './Menu/save',
		data: data,
		dataType: 'json',
		success: function(json) {
			$('#info').toggleClass('error', !json.success);
			$('#info').text(json.message);
		}
	});
}