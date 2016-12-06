$(document).ready(function() {
    $('#save').on('click', save);
});

function save() {
    // Get the data
    var data = {
        id: $('#post-id').val(),
        title: $('#title').val(),
        content: $('#editor').val() 
    };

    // Post the request.
    $.ajax({
        type: 'POST',
        url: 'ControlPanel/Post/save',
        data: data,
        success: function(data) {
            var json = $.parseJSON(data);

            $('#info').toggleClass('error', !json.success);
            $('#info').text(json.message);
        }
    });
}