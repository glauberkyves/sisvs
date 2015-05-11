AcompanharEvento = {
    getModalidades: function () {
        $('#noEvento').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/modalidade/combo-box?coEvento=' + $(this).val();
                utils.getCombo(url, '#noModalidade');
            } else {
                $('#noModalidade, #noArea, #noTema').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getAreas: function () {
        $('#noModalidade').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/area/combo-box?coModalidade=' + $(this).val();
                utils.getCombo(url, '#noArea');
            } else {
                $('#noArea, #noTema').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getTemas: function () {
        $('#noArea').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/tema/combo-box?coArea=' + $(this).val();
                utils.getCombo(url, '#noTema');
            } else {
                $('#noTema').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getDuplicatas: function () {
        $('#grid').click(function () {
            if ($(this).val()) {
                var url = '/acompanhamento/acompanhar-duplicata/toogle';
                $.getJSON(url, {inscricoes: $("#grid").jqGrid('getGridParam', 'selarrrow')});
            }
        });
    },

    changeNameButton: function () {
        $('#pesquisar').click(function () {
            if ($('input[id=tpConsulta]:checked').val() == 'duplicadas') {
                $('#salvar').html('Bloquear');
            } else {
                $('#salvar').html('Desbloquear');
            }
        });

        $('#salvar').click(function () {
		        var checado = false;
		        $('#grid').each(function () {
				        if ($(this).find('tbody:last tr input[type=checkbox]').is(':checked')) {
						        checado = true;
				        }
		        });

		        if (checado) {
				        if ($(this).text() == 'Bloquear') {
						        $('#form-grid').attr('action', '/acompanhamento/acompanhar-duplicata/toogle');
				        } else {
						        $('#form-grid').attr('action', '/acompanhamento/acompanhar-duplicata/toogle-block');
				        }
				        $('#form-grid').submit();
		        }
		        else{
                    $('html, body').animate({scrollTop: 0}, 300);
                    Message.addMessage('Torna-se obrigatório a seleção de pelo menos um registro','error');

		        }
        });
    }
}

$(document).ready(function () {
    AcompanharEvento.getModalidades();
    AcompanharEvento.getAreas();
    AcompanharEvento.getTemas();
    AcompanharEvento.getDuplicatas();
    AcompanharEvento.changeNameButton();
});