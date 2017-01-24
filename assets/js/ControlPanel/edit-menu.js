'use strict';

var $dragging;

$(document).ready(function() {
	$('#save').on('click', save);
	$('.menu-item').on('mouseenter', mouseEnter);
	$('.menu-item').on('mousedown', startDrag);
	$(document).on('mouseup', () => $dragging = null);
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

/**
 * When the mouse enters a menu item row.
 */
function mouseEnter() {
	if (!$dragging)
		return;
	
	var $this = $(this);

	// Swap the elements.
	$dragging.index() > $this.index() ? $dragging.after($this) : $dragging.before($this);
}

/**
 * Start dragging an item.
 */
function startDrag() {
	$dragging = $(this);
}