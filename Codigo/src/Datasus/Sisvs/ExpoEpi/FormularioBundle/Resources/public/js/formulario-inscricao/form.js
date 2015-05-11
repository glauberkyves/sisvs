Form = {
    initDatePicker: function () {
        //if (!$('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_coSeqFormularioInscricao').val()) {
            $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_dtInicio').datepicker();
            $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_dtFim').datepicker();
        //}
    },

    getModalidades: function () {
        $('#coEvento').change(function () {
            if ($(this).val()) {
                var url = '/formulario/formulario-inscricao/combo-box?coEvento=' + $(this).val();
                utils.getCombo(url, '#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_coModalidade');
            } else {
                $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_coModalidade').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    initAjaxGetNoTipoModalidade: function () {
        $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_coModalidade').change(function () {
            Form.fillNoTipoModalidade($('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_coModalidade').val());
        });
    },

    initAjaxGetNoTipoModalidadeEdit: function () {
        Form.fillNoTipoModalidade($('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_coModalidade').val());
    },

    fillNoTipoModalidade: function (coSeqTipoModalidade) {
        $.ajax({
            type: "POST",
            url: '/formulario/formulario-inscricao/ajax-get-no-tipo-modalidade',
            data: {
                coModalidade: coSeqTipoModalidade
            },
            dataType: "json",
            success: function (res) {
                $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_noTipoModalidade').val(res)
            }
        });
    }
}

$(document).ready(function () {
    Form.initDatePicker();
    Form.getModalidades();
    Form.initAjaxGetNoTipoModalidade();
    Form.initAjaxGetNoTipoModalidadeEdit();
    $('form').submit(function(){
        var  inicio =  $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_dtInicio').val().split('/');
        var fim = $('#datasus_sisvs_expoepi_formulariobundle_formularioinscricaoentity_dtFim').val().split('/');
        if(inicio[2]+inicio[1]+inicio[0] > fim[2]+fim[1]+fim[0]) {
            Message.addMessage('A data final não pode ser menor que a data de início.', 'error');
            $('html, body').animate({scrollTop: 0}, 300);
            $('.alert-error').fadeIn().delay(5000).fadeOut('slow');
        }
    });
});