$(document).ready(function() {
    $('#remove').on('click', remove);
    $('#cancel').on('click', function() { showMenu('pages'); });
});

/**
 * Remove a page.
 */
function remove() {
    $.ajax({
        type: 'GET',
        url: 'ControlPanel/Page/remove?page=' + $(this).attr('page'),
        success: function(data) {
            showMenu('pages');
        }
    });
}