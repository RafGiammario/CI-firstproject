$(document).ready( function () {
    $(document).on('click', '#delete', function (e) {

        e.preventDefault();

        alert('You are deleting a To Do!');

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
    });

    $(document).on('click', '#check', function (e) {

        e.preventDefault();

        $.ajax({
            'url': $(this).attr('href'),
            'type': 'POST',
            'data': {},
            'success': function (data) {
                if (data) {
                    console.log(data);
                    $('#list').html(data);

                }
            }
        }).done(function () {
            console.log('Ajax Call Done');
        }).fail(function () {
            console.log('Ajax Call Fail');
        });
    });

});