$(document).ready( function () {
    $(document).on('click', '#delete', function (e) {

        e.preventDefault();

        var result = confirm('You are deleting Something!');
        if (result) {
            $.ajax({
                'url': $(this).attr('href'),
                'type': 'POST',
                'data': {},
                'success': function (data) {
                    if (data) {
                        $('#list').html(data);
                    }
                }
            }).done( function () {
                console.log('Ajax Call Done');
            }).fail( function () {
                console.log('Ajax Call Fail');
            });
        }


    });

    $(document).on('click', '#check', function (e) {

        e.preventDefault();

        $.ajax({
            'url': $(this).attr('href'),
            'type': 'POST',
            'data': {},
            'success': function (data) {
                if (data) {
                    $('#list').html(data);

                }
            }
        }).done(function () {
            console.log('Ajax Call Done');
        }).fail(function () {
            console.log('Ajax Call Fail');
        });
    });

    $(document).on('click', '.update_btn', function(element) {
        let id = $(this).data("id");
        $('#update_form_'+id).slideToggle("fast", "swing");
    })
});