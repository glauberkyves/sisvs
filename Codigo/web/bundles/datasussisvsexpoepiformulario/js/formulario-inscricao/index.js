var formInsc = {
    activeInactive: function (id, stAtivo) {

        var url = window.location.pathname + '/active-inactive?id=' + id + '&status=' + stAtivo;
        console.log(url);
        if (stAtivo == 'active') {
            $('#modal-toogle-status .modal-body h4').html('Confirma Inativação?');
        } else {
            $('#modal-toogle-status .modal-body h4').html('Confirma Ativação?');
        }

        $('#modal-toogle-status').modal({
            keyboard: false,
            backdrop: 'static'
        });

        $('#modal-toogle-status .toogle-status-yes').click(function () {
            window.location = url;
        });
    }
}

FormInsc = {
    getModalidades: function () {
        $('#coEvento').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/modalidade/combo-box?coEvento=' + $(this).val();
                utils.getCombo(url, '#coModalidade');
            }  else {
            $('#coModalidade').html('<option value="">Selecione uma opção</option>');
        }
        });
    }
}

$(document).ready(function () {
    FormInsc.getModalidades();
});