$(document).ready(function () {
    $('#emailForm').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'send_email.php', // PHP script URL
            data: formData,
            success: function (response) {
                // Update HTML based on response
                $('#response').html(response);
                $('#response').addClass('success-message');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                $('#response').html('An error occurred. Please try again later.');
                $('#response').addClass('error-message');
            }
        });
    });
});
