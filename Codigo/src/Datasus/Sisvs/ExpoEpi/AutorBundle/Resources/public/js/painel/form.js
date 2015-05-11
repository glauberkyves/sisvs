Inscricao = {
    initCoAutor: function () {
        $('div.coAutorCheck input').click(function () {
            if ($(this).val() == 'S') {
                $('div.coAutoria').removeClass('hide');
                $('#coAutor, #noInstituicao').addClass('required');
            } else {
                $('div.coAutoria').addClass('hide');
            }
        });

        if ($('div.coAutorCheck input:first').is(':checked')) {
            $('#coAutor, #noInstituicao').addClass('required');
            $('div.coAutoria').removeClass('hide');
        } else {
            $('div.coAutoria').addClass('hide');
        }

        $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_0').addClass('required');
        $('input[name=coTipoInstituicao]:first').addClass('required');
    },

    initCheckTema: function () {
        $('input[id=coTema]').click(function () {
            $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coTema').val($(this).val())
        });

        $('input[id=coTipoInstituicao]').click(function () {
            $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coTipoInstituicao').val($(this).val())
        });

        var msg = 'Tem certeza que deseja enviar a inscrição? <br />Uma vez enviada, não poderá mais realizar nenhuma alteração.';
        $('input[value=Enviar]').click(function () {
            $('#modal-toogle-status .modal-body h4').html(msg);

            $('#modal-toogle-status').modal({
                keyboard: false,
                backdrop: 'static'
            });

            $('.toogle-status-yes').click(function () {
                var id = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coSeqInscricao').val();
                $('form').attr('action', '/autor/painel/send?id=' + id);
                $('#sendForm').click();
            });
        });

        $('input[value=Salvar]').click(function () {
            var msg = false;
		            //if($('#comunicipio_hidden').val() == ""){
				     //       Message.addMessage('O campo CEP é de preenchimento obrigatório.', 'error');
				     //       $('html, body').animate({scrollTop: 0}, 300);
				     //       return false;
		            //}
				        if ($('form:first').valid()) {
						        if($("#datasus_sisvs_expoepi_autorbundle_inscricaoentity_stAutoria_0").is(":checked")) {
								        $('#table_0').each(function(v) {
										        if(($(this).find('tbody:last td').size()) <= 1) {
												        msg = true;
										        }
								        });
								        if(msg == true) {
										        Message.addMessage('O campo Nome do Co-autor é de preenchimento obrigatório.', 'error');
										        return false;
								        }
						        }

						        var url = '/autor/painel/create';

						        if($('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coSeqInscricao').val()) {
								        url = '/autor/painel/edit?id=' + $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coSeqInscricao').val();
						        }

						        //$('form').attr('action', url);
				        }
        });
    },

    send: function (id) {
        var msg = 'Tem certeza que deseja enviar a inscrição? <br />Uma vez enviada, não poderá mais realizar nenhuma alteração.';
        var url = '/autor/painel/send?id=' + id;

        $('#modal-toogle-status .modal-body h4').html(msg);

        $('#modal-toogle-status').modal({
            keyboard: false,
            backdrop: 'static'
        });

        $('#modal-toogle-status .toogle-status-yes').unbind('click').click(function () {
            window.location = url;
            $('.toogle-status-yes').addClass('disabled');
		        $('.close').click();
        });
    },

    initCep: function () {
        $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coUfIbge').change(function () {
            if ($(this).val()) {
                Address.config.municipio = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge');
                Address.config.municipio_hidden = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge');
                Address.populateMunicipioFromEstado($(this).val());
            } else {
                $('#coMunicipioIbge').html('<option value="">Selecione uma opção</option>');
                $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge').html('<option value="">Selecione uma opção</option>');
            }
        });

        $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coUfIbge').blur(function () {
            if ($(this).val()) {
                Address.config.municipio = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge');
                Address.config.municipio_hidden = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge');
                Address.populateMunicipioFromEstado($(this).val());
            } else {
                $('#coMunicipioIbge').html('<option value="">Selecione uma opção</option>');
                $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge').html('<option value="">Selecione uma opção</option>');
            }
        });

        $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_nuCep').blur(function () {
            if ($('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_nuCep').val()) {
                Address.config.cep = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_nuCep');
                Address.config.estado = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coUfIbge');
                Address.config.municipio = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge');
                Address.config.bairro = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_noBairro');
                Address.config.endereco = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_dsEndereco');
                Address.config.complemento = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_dsComplemento');
                Address.config.regiao = $('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_noRegiao');
                Address.populateFromCep($('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_nuCep').val());
            }

        });

    },

    init: function () {
		    //$('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge').attr('disabled',true);
        Inscricao.initCoAutor();
        Inscricao.initCheckTema();
        Inscricao.initCep();
    }
};

$(document).ready(function () {
    Inscricao.init();

    $('#comunicipio_hidden').val($('#datasus_sisvs_expoepi_autorbundle_inscricaoentity_coInstituicao_coMunicipioIbge').val());
});