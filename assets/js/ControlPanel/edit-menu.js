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

	// Events for adding items.
	$('#search-pages').on('input', searchPages);
	$('.add-page').on('click', addPageClick);
	$('#new-add').on('click', addItemClick);
});

/**
 * Save the menu.
 */
function save() {
	// Get all menu items.
	var items = [];
	$('.menu-item').each((i, item) => {
		var $item = $(item);
		items.push({
			title: $item.children('.title').text(),
			url: $item.children('.url').text()
		});
	});

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
		var contains = $this.text().toLowerCase().includes(text);
		contains ? $this.slideDown() : $this.slideUp();
	});
}

/**
 * Add page click event.
 */
function addPageClick() {
	var $this = $(this);
	addItem($this.text(), '/Page/id/' + $this.attr('page'));
}

/**
 * Add item click event.
 */
function addItemClick() {
	// Get the url, check if it is relative or has a protocol.
	var url = $('#new-url').val();
	if (!url.startsWith('/') && url.indexOf('://') === -1)
		url = 'http://' + url;

	addItem($('#new-title').val(), url);

	// Clear the input.
	$('#new-title').val('');
	$('#new-url').val('');
}

/**
 * Add a menu item to the list.
 */
function addItem(title, url) {
	var $newItem = $(
		'<tr class="menu-item draggable">'
		+ '<td class="title">' + title + '</td>'
		+ '<td class="url"><a href="' + url + '">' + url + '</a></td>'
		+ '<td><button class="remove-button">Remove</button></td>'
		+ '</tr>'
	).appendTo($('#items-table'));
	
	// Hook into the necessary events.
	$newItem.find('.remove-button').on('click', remove);
	$newItem.on('mouseenter', mouseEnter);
	$newItem.on('mousedown', startDrag);
}