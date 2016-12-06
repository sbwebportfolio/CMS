$(document).ready(function() {
    // Find all page action links.
    $('#pages-table').find('span.link').each(function() {
        var $this = $(this);
        var data = {page: $this.attr('page')};

        // Set the link actions.
        if ($this.hasClass('edit-page'))
            $this.on('click', function() { showMenu('edit-page', false, data); });
        else if ($this.hasClass('remove-page'))
            $this.on('click', function() { showMenu('remove-page', false, data); });
    });
});