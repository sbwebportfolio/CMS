'use strict';

// Menu item properties.
const menuHighlightClass = 'highlight';
var currentMenu;
var menuData;

// Loader.
const waitBeforeShowing = 200; // Delay before showing the loading image to prevent it from flashing.
var showingLoading = false;

// Elements.
var $loading;
var $content;

/*==== Custom jQuery functions. ====*/

$.fn.visible = function() {
    this.css('visibility', 'visible');
};

$.fn.invisible = function() {
    this.css('visibility', 'hidden');
};

/**
 * The document ready event.
 */
$(document).ready(function() {
	// Get the elements.
	$content = $('#content');
	$loading = $('#loading');

	initializeMenu();
	hideLoading();

	// Hook into the hash change event.
	menuFromHash();
	$(window).bind('hashchange', menuFromHash);
});

/**
 * Show the loading screen.
 */
function showLoading() {
	showingLoading = true;

	// After a small delay show the loading image.
	setTimeout(function() {
		// Check if the loading is not already done.
		if (showingLoading) {
			$content.hide();
			$loading.show();
		}
	}, waitBeforeShowing);
}

/**
 * Hide the loading screen.
 */
function hideLoading() {
	showingLoading = false;
	$content.show();
	$loading.hide();
}

/**
 * Initialize the menu.
 */
function initializeMenu() {
	var $menu = $('#menu');

	// Find each menu item, set the click function, save it.
	$menu.find('[menu]').each(function() {
		var $this = $(this);
		var menuString = $this.attr('menu');

		$this.on('click', () => showMenu(menuString));
	});
}

/**
 * Read the menu name and data from the url hash.
 */
function menuFromHash() {
	var hash = location.hash.substr(1);

	// Get the position of the separator, check if the hash contains menu data.
	var separator = hash.indexOf(':');
	if (separator == -1)
		separator = hash.length;

	// Get the menu name and data.
	var name = hash.substr(0, separator)
	var data = hash.substr(separator + 1);

	// Show the menu.
	if (name)
		showMenu(name, data);
}

/**
 * Show a control panel menu.
 * 
 * @param name The name of the menu.
 * @param data The menu data, typically an id.
 */
function showMenu(name, data) {
	showLoading();

	if (data == '')
		data = null;

	// Save the previous and current menu string.
	var prevMenuString = currentMenu;
	currentMenu = name;
	updateMenu(prevMenuString);

	// Build the hash string.
	var hashString = '#' + currentMenu;
	if (data != null)
		hashString += ':' + data;
	
	// Check if the hash is already set properly, to prevent setting it twice.
	if (location.hash != hashString)
		history.pushState(null, null, hashString);

	// Get the menu content.
	$.ajax({
		type: 'GET',
		url: './ControlPanel/show?menu=' + currentMenu,
		data: data == null ? {} : {id: data},
		dataType: 'html',
		success: data => $content.html(data),
		error: data => $content.html('<h1 class="error">An error occurred: ' + data.status + ' ' + data.statusText + '</h1>'),
		complete: hideLoading
	});
}

/**
 * Update the menu highlight.
 */
function updateMenu(prevMenuString) {
	var prevMenu = $('[menu="' + prevMenuString + '"]');
	var menu = $('[menu="' + currentMenu + '"]');

	// Un-highlight the previous menu, highlight the current one.
	if (prevMenu)
		prevMenu.removeClass(menuHighlightClass);
	if (menu)
		menu.addClass(menuHighlightClass);
}

/**
 * Refresh the current menu content.
 */
function refreshContent(success) {
	showMenu(currentMenu, menuData, success);
}