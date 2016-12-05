// Menu item properties.
const menuHighlightClass = 'highlight';
var currentMenu;
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
 * Load the correct menu from the url hash.
 * 
 * TODO: read extra info (e.g. for editing pages, so refresh is possible).
 */
function menuFromHash() {
    var hash = window.location.hash.substr(1);
    if (hash)
        showMenu(hash);
}

/**
 * Show a control panel menu.
 * 
 * @param menuString The name of the menu.
 * @param updateHash Whether to update the url hash.
 * @param data The data to send with the request.
 */
function showMenu(menuString, updateHash, data) {
    // Get the previous and current menu item.
    var prevMenuString = currentMenu;
    currentMenu = menuString;

    var prevMenu = menuItems[prevMenuString];
    var menu = menuItems[currentMenu];

    // Un-highlight the previous menu, highlight the current one.
    if (prevMenu)
        prevMenu.removeClass(menuHighlightClass);
    if (menu)
        menu.addClass(menuHighlightClass);

    // Set the hash.
    if (updateHash != false)
        history.pushState(null, null, '#' + currentMenu);

    // Hide the previous group, show the current one.
    var prevGroup = menuGroups[prevMenuString];
    var group = menuGroups[currentMenu];

    if (group != prevGroup) {
        if (prevGroup)
            prevGroup.slideUp();
        if (group)
            group.slideDown();
    }

    // Get the menu content.
    $.ajax({
        type: 'GET',
        url: 'ControlPanel/show?menu=' + currentMenu,
        data: data,
        success: function(data) {
            $('#content').html(data);
        },
        error: function(data) {
            $('#content').html('<h1 class="error">An error occurred: ' + data.status + ' ' + data.statusText + '</h1>');
        }
    });
}

/**
 * Refresh the current menu content.
 */
function refreshContent() {
    showMenu(currentMenu);
}