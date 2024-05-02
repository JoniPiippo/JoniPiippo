$(document).ready(function () {
    $('#emailForm').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '../composer/sahkoposti.php',
            data: formData,
            success: function (response) {
                if (response.startsWith('Sähköposti')) {
                    $('#response').html(response);
                    $('#response').addClass('success-message');
                    $('#emailForm')[0].reset();
                }
                else {
                    $('#response').html('Virhe: kokeile myöhemmin uudestaan.');
                    $('#response').addClass('error-message');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                $('#response').html('Virhe: kokeile myöhemmin uudestaan.');
                $('#response').addClass('error-message');
            }
        });
    });
});
