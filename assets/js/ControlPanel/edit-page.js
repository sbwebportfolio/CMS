$(document).ready(function() {
	$('#save').on('click', save);
	$('#suggest-slug').on('click', suggestSlug);
});

/**
 * Save the page.
 */
function save() {
	// Get the data
	var data = {
		id: $('#page-id').val(),
		title: $('#title').val(),
		content: $('#editor').val(),
		slug: $('#slug').val(),
		hidden: $('#hidden').is(':checked')
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
		}
	});
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