$(document).ready(function () {
    $('#emailForm').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '../composer/send_email.php',
            data: formData,
            success: function (response) {
                if (response.startsWith('Your')) {
                    $('#response').html(response);
                    $('#response').addClass('success-message');
                    $('#emailForm')[0].reset();
                }
                else {
                    $('#response').html('An error occurred. Please try again later.');
                    $('#response').addClass('error-message');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                $('#response').html('An error occurred. Please try again later.');
                $('#response').addClass('error-message');
            }
        });
    });
});
