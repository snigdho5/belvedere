$(document).on('keyup', '.search_arc', function () {
    if ($(this).val()) {
        var _token = $('#csrfT').val();
        $.ajax({
            url: $('#autocompleteUrl').val(),
            method: "POST",
            data: { query: $(this).val(), status: '0', _token: _token },
            success: function (data) {
                $('#suggestionList').fadeIn();
                $('#suggestionList').html(data);
            }
        });
    }
    else {
        $('#suggestionList').html('');
    }
});

$(document).on('click', '#suggestions li', function () {
    $('#search_arc').val($(this).text());
    $('#suggestionList').html('');
    //console.log($(this).text());
    setTimeout(function () { $(".btn-search").trigger("click"); }, 1000);
});