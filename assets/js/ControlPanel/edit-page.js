$(document).ready(function() {
	$('#save').on('click', save);
	$('#remove').on('click', remove);
	$('#suggest-slug').on('click', suggestSlug);
});

/**
 * Save the page.
 */
function save() {
	// Get the data.
	var categories = [];
	$('input[type="checkbox"][category-id]:checked').each(function() {
		categories.push($(this).attr('category-id'));
	});

	var data = {
		id: $('#page-id').val(),
		title: $('#title').val(),
		content: $('#editor').val(),
		slug: $('#slug').val(),
		hidden: $('#hidden').is(':checked'),
		categories: categories
	};

	// Post the request.
	$.ajax({
		type: 'POST',
		url: 'ControlPanel/Page/save',
		data: data,
		success: function(data) {
			var json = $.parseJSON(data);

			$('#info').toggleClass('error', !json.success);
			$('#info').text(json.message);

			// Save the new page id.
			if (json.success)
				$('#page-id').val(json.id);
		}
	});
}

/**
 * Remove the page.
 * TODO: properly handle removing a new page.
 */
function remove() {
	var id = $('#page-id').val();
	showMenu(id == -1 ? 'pages' : 'remove-page', $('#page-id').val());
}

/**
 * Suggest a slug based on the page title.
 */
function suggestSlug() {
	var title = $('#title').val().toLowerCase();
	// Replace all whitespaces with a dash, remove non-alphanumeric characters.
	var slug = title.replace(/\s+/g, '-').replace(/[^a-z0-9\-]/g, '');
	$('#slug').val(slug);
}