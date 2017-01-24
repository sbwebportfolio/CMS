'use strict';

var $dragging;

$(document).ready(function() {
	// Hook into button events.
	$('#save').on('click', save);
	$('.remove-button').on('click', remove);

	// Events for dragging rows.
	$('.menu-item').on('mouseenter', mouseEnter);
	$('.menu-item').on('mousedown', startDrag);
	$(document).on('mouseup', () => $dragging = null);

	// Events for adding pages.
	$('#search-pages').on('input', searchPages);
	$('.add-page').on('click', addPage);
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
 * Remove a page.
 */
function remove() {
	$(this).parents('.menu-item').remove();
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

/**
 * Filter the pages list.
 */
function searchPages() {
	var text = $(this).val().toLowerCase();

	$('.add-page').each(function() {
		var $this = $(this);
		var contains = $this.text().toLowerCase().includes(text) || $this.attr('page').toLowerCase().includes(text);
		contains ? $this.slideDown() : $this.slideUp();
	});
}

/**
 * Add a page.
 */
function addPage() {
	var $this = $(this);

	// Create and add the new item.
	var $newItem = $(
		'<tr class="menu-item draggable">'
		+ '<td>' + $this.text() + '</td>'
		+ '<td class="page-slug">' + $this.attr('page') + '</td>'
		+ '<td><button class="remove-button">Remove</button></td>'
		+ '</tr>'
	).appendTo($('#items-table'));
	
	// Hook into the necessary events.
	$newItem.find('.remove-button').on('click', remove);
	$newItem.on('mouseenter', mouseEnter);
	$newItem.on('mousedown', startDrag);
}