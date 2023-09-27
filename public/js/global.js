function handleAjaxError(errors) {
    $.each(errors, function (index, item) {
        let input = $('#'+index);

        input.addClass('invalid-input');

        let toolTip = '<div class="tooltip-bar">' + item + '</div>';

        input.closest('.form-group').append(toolTip);
    });
}

function clearInputsError() {
    $('input, select, textarea').removeClass('invalid-input');
    $('.tooltip-bar').remove();
}

//$('#birth-date').mask('00/00/0000');
//$('#phone-number').mask('0000-0000');
