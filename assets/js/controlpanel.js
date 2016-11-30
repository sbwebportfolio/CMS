$(document).ready(function() {
    // Set up the menu events.
    $('#menu').children().each(function(i, e) {
        $(this).on('click', function() { showMenu($(this)); });
    });
});

// Menu item properties.
const menuHighlightClass = 'highlight';
var menuItem;

/**
 * Show a control panel menu.
 */
function showMenu(menu) {
    // Set the menu item and highlight class.
    if (menuItem != null)
        menuItem.removeClass(menuHighlightClass);
    menuItem = menu;
    menuItem.addClass(menuHighlightClass);

    // Get the menu content.
    $.ajax({
        type: 'GET',
        url: 'ControlPanel/show?menu=' + menu.attr('menu'),
        success: function(data) {
            $('#content').html(data);
        }
    });
}