Prazo = {
    initDatePicker: function () {
        $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_dtInicio').datepicker();
        $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_dtFim').datepicker();
    }
}

$(document).ready(function () {
    Prazo.initDatePicker();

    $('#btn-prorrogar-prazo').click(function () {
        if ($('form').valid()) {
            var valid = true;

            var data_inicio = $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_dtInicio').val();
            var data_fim = $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_dtFim').val();
            var inicio = parseInt(data_inicio.split("/")[2].toString() + data_inicio.split("/")[1].toString() + data_inicio.split("/")[0].toString());
            var fim = parseInt(data_fim.split("/")[2].toString() + data_fim.split("/")[1].toString() + data_fim.split("/")[0].toString());


            if (fim <= inicio) {
                Message.addMessage('A data final não pode ser menor que a data de início.', 'error');
                valid = false;
            }

            if (valid) {
                $('form').submit();
            }
        }
    });

});

