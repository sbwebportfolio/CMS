// Menu item properties.
const menuHighlightClass = 'highlight';
var currentMenu;
var menuItems = {};

/**
 * The document ready event.
 */
$(document).ready(function() {
    // Set up the menu.
    $('#menu').children().each(function(i, e) {
        var $this = $(this);
        var menuString = $this.attr('menu');
        $this.on('click', function() { showMenu(menuString); });
        menuItems[menuString] = $this;
    });

    // Hook into the hash change event.
    menuFromHash();
    $(window).bind('hashchange', menuFromHash);
});

/**
 * Load the correct menu from the url hash.
 * 
 * TODO: read extra info from hash.
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
    var prevMenu = menuItems[currentMenu];
    var menu = menuItems[menuString];

    // Un-highlight the previous menu, highlight the current one.
    if (prevMenu)
        prevMenu.removeClass(menuHighlightClass);
    currentMenu = menuString;
    if (menu)
        menu.addClass(menuHighlightClass);

    // Set the hash.
    if (updateHash != false)
        history.pushState(null, null, '#' + menuString);

    // Get the menu content.
    $.ajax({
        type: 'GET',
        url: 'ControlPanel/show?menu=' + menuString,
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