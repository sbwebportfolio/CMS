$(document).ready(function() {
    // Find all page action links.
    $('#posts-table').find('span.link').each(function() {
        var $this = $(this);
        var data = {
            id: $this.attr('post'),
            type: 'post'
        };

        // Set the link actions.
        if ($this.hasClass('edit-post'))
            $this.on('click', function() { showMenu('edit-post', false, data); });
        else if ($this.hasClass('remove-post'))
            $this.on('click', function() { showMenu('remove-content', false, data); });
    });
});