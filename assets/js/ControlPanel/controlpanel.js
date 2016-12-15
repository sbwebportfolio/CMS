// Menu item properties.
const menuHighlightClass = 'highlight';
var currentMenu;
var menuData;
var menuItems = {};
var menuGroups = {};

/**
 * The document ready event.
 */
$(document).ready(function() {
	initializeMenu();

	// Hook into the hash change event.
	menuFromHash();
	$(window).bind('hashchange', menuFromHash);
});

/**
 * Initialize the menu.
 */
function initializeMenu() {
	var $menu = $('#menu');

	// Find each menu item, set the click function, save it.
	$menu.find('[menu]').each(function() {
		var $this = $(this);
		var menuString = $this.attr('menu');

		$this.on('click', function() { showMenu(menuString); });
		menuItems[menuString] = $this;
	});

	// Find each menu group, hide it.
	$menu.find('.menu-group-items').each(function() {
		var $group = $(this);
		$group.hide();

		// For each child and sibling, save the group it belongs to.
		function saveGroup() {
			menuGroups[$(this).attr('menu')] = $group;
		}
		$group.children().each(saveGroup);
		$group.siblings().each(saveGroup);
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
	if (data == '')
		data = null;

	// Save the previous and current menu string.
	var prevMenuString = currentMenu;
	currentMenu = name;

	// Build the hash string.
	var hashString = '#' + currentMenu;
	if (data != null)
		hashString += ':' + data;
	
	// Check if the hash is already set properly, to prevent setting it twice.
	if (location.hash != hashString)
		history.pushState(null, null, hashString);
	
	// Update the menu visuals.
	updateMenu(prevMenuString, true);

	// Get the menu content.
	$.ajax({
		type: 'GET',
		url: 'ControlPanel/ControlPanel/show?menu=' + currentMenu,
		data: data == null ? {} : {id: data},
		success: function(data) {
			$('#content').html(data);
		},
		error: function(data) {
			$('#content').html('<h1 class="error">An error occurred: ' + data.status + ' ' + data.statusText + '</h1>');
		}
	});
}

/**
 * Update the menu highlight and groups.
 */
function updateMenu(prevMenuString, updateGroups) {
	var prevMenu = menuItems[prevMenuString];
	var menu = menuItems[currentMenu];

	// Un-highlight the previous menu, highlight the current one.
	if (prevMenu)
		prevMenu.removeClass(menuHighlightClass);
	if (menu)
		menu.addClass(menuHighlightClass);

	if (updateGroups) {
		// Get the previous and current menu group.
		var prevGroup = menuGroups[prevMenuString];
		var group = menuGroups[currentMenu];

		// Hide the previous group, show the current one.
		if (group != prevGroup) {
			if (prevGroup)
				prevGroup.slideUp();
			if (group)
				group.slideDown();
		}
	}
}

/**
 * Refresh the current menu content.
 */
function refreshContent() {
	showMenu(currentMenu);
}