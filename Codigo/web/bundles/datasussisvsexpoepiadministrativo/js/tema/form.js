TemaForm = {
    up: function (coSeqTema) {
        $.get('/administrativo/tema/change-order', {
            coSeqTema: coSeqTema,
            order: 'up'
        }, function (data) {
            if (data.success) {
                $.componentGrid.grid.trigger('reloadGrid');
                Message.clearMessage();
                Message.addMessage('Ordem alterada com sucesso');
            }
        });
    },

    down: function (coSeqTema) {
        $.get('/administrativo/tema/change-order', {
            coSeqTema: coSeqTema,
            order: 'down'
        }, function (data) {
            if (data.success) {
                $.componentGrid.grid.trigger('reloadGrid');
                Message.clearMessage();
                Message.addMessage('Ordem alterada com sucesso');
            }
        });
    },

    canchgeLabel: function () {
        $('#datasus_sisvs_expoepi_administrativobundle_temaentity_coTipoClassificacao').change(function () {
            if ($(this).val() == 1) {
                $('.codigo, .grupo').removeClass('hide');
                $('label[for=datasus_sisvs_expoepi_administrativobundle_temaentity_noTema]').html('Tema: <font color="red"><b>*</b></font>');
                $('#datasus_sisvs_expoepi_administrativobundle_temaentity_noTema').attr('placeholder', 'Tema');
                $('#datasus_sisvs_expoepi_administrativobundle_temaentity_noTema').attr('maxlength', '300');
            } else {
                $('label[for=datasus_sisvs_expoepi_administrativobundle_temaentity_noTema]').html('Categoria: <font color="red"><b>*</b></font>');
                $('#datasus_sisvs_expoepi_administrativobundle_temaentity_noTema').attr('placeholder', 'Categoria');
                $('#datasus_sisvs_expoepi_administrativobundle_temaentity_noTema').attr('maxlength', '100');

                $('.tipo-classificacao, .grupo').removeClass('hide');
            }

            $(this).attr('disabled', true);
        });
    },

    reset: function () {
        if (!$("#datasus_sisvs_expoepi_administrativobundle_temaentity_coSeqTema").val()) {
            $('#limpar').click(function () {
                $('#datasus_sisvs_expoepi_administrativobundle_temaentity_coTipoClassificacao').attr('disabled', false);
                $('.codigo, .grupo, .grau').addClass('hide');
            });
        }
    },

    initialize: function () {
        this.canchgeLabel();

        if ($("#datasus_sisvs_expoepi_administrativobundle_temaentity_coSeqTema").val()) {
            $('#datasus_sisvs_expoepi_administrativobundle_temaentity_coTipoClassificacao').change().attr('disabled', true);
        }

        if ($('#datasus_sisvs_expoepi_administrativobundle_temaentity_coSeqTema').val()
            || $('.message div').size() == 1) {
            $('#datasus_sisvs_expoepi_administrativobundle_temaentity_coTipoClassificacao').change();

            $('#datasus_sisvs_expoepi_administrativobundle_temaentity_nuTema').attr('disabled', true);
        }

        if (!$('#datasus_sisvs_expoepi_administrativobundle_temaentity_coSeqTema').val()){
            $('#datasus_sisvs_expoepi_administrativobundle_temaentity_nuTema').attr('disabled', false);
        }

        $('form').submit(function () {
            $('#datasus_sisvs_expoepi_administrativobundle_temaentity_coTipoClassificacao').attr('disabled', false);
        });
    }
};

$(document).ready(function () {
    TemaForm.initialize();
    TemaForm.reset();
});