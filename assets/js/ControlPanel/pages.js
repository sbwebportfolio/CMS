$(document).ready(function() {
    // Find all page action links.
    $('#pages-table').find('span.link').each(function() {
        var $this = $(this);
        var data = {id: $this.attr('page')};

        // Set the link action.
        $this.on('click', function() {
            showMenu($(this).attr('action'), false, data);
        });
    });
});