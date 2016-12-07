$(document).ready(function() {
    $('#remove').on('click', remove);
    $('#cancel').on('click', function() { showMenu('pages'); });
});

/**
 * Remove a page.
 */
function remove() {
    var id = $('#content-id').val();
    var type = $('#content-type').val();

    $.ajax({
        type: 'GET',
        url: 'ControlPanel/' + type + '/remove?id=' + id,
        success: function(data) {
            refreshContent();
        }
    });
}