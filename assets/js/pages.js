$(document).ready(function() {
    // Find all page action links.
    $('#pages-table').find('span.link').each(function() {
        var $this = $(this);
        var data = {page: $this.attr('page')};

        // Check what the link should do.
        if ($this.hasClass('edit-page'))
            $this.on('click', editPage);
        else if ($this.hasClass('remove-page'))
            $this.on('click', removePage);
    })
});

/**
 * Show the edit page content.
 */
function editPage(page) {
    showMenu('edit', false, {page: $(this).attr('page')});
}

/**
 * Show the remove page content.
 */
function removePage(page) {
    showMenu('remove', false, {page: $(this).attr('page')});
}