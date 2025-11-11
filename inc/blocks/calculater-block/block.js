jQuery(document).ready(function ($) {
    $('#calculate-btn').click(function () {
        var destinationValue = parseFloat($('#destination option:selected').data('value'));
        var cargoValue = parseFloat($('#cargo option:selected').data('value'));

        if (!isNaN(destinationValue) && !isNaN(cargoValue)) {
            var result = destinationValue + cargoValue;
            $('#result-answer').text(result.toFixed(2) + ' руб.');
            // Записываем значение в скрытое поле
            $('#calculated-price').val(result.toFixed(2));
            $('.calculater-bot').show();
        } else {
            $('#result-answer').text('Пожалуйста, выберите оба варианта');
            $('.calculater-bot').show();
        }
    });

    $('#destination, #cargo').change(function () {
        $('#calculate-btn').click();
    });

    const $checkbox = $('#privacy-policy');
    const $submitButton = $('button[form-send]');

    $submitButton.prop('disabled', !$checkbox.prop('checked'));

    $checkbox.on('change', function () {
        $submitButton.prop('disabled', !$(this).prop('checked'));
    });
});