$(document).ready(function() {
    $('#remove').on('click', remove);
    $('#cancel').on('click', function() { showMenu('posts'); });
});

/**
 * Remove a page.
 */
function remove() {
    $.ajax({
        type: 'GET',
        url: 'ControlPanel/Post/remove?post=' + $(this).attr('post'),
        success: function(data) {
            showMenu('posts');
        }
    });
}