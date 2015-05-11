RelatorioInscricao = {

    getUfs: function () {
        $('#coRegiao').change(function () {
            Address.config.estado = $('#coUfIbge');

            if ($(this).val()) {
                Address.populateEstadoFromRegiao($(this).val());
            } else {
                $('#coUfIbge, #coMunicipioIbge').html('<option value="">Selecione uma opção</option>');
            }
        });

        $('#coUfIbge').change(function () {
            Address.config.municipio = $('#coMunicipioIbge');

            if ($(this).val()) {
                Address.populateMunicipioFromEstado($(this).val());
            } else {
                $('#coMunicipioIbge').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getUfsAutor: function () {
        $('#coRegiaoAutor').change(function () {
            Address.config.estado = $('#coUfIbgeAutor');

            if ($(this).val()) {
                Address.populateEstadoFromRegiao($(this).val());
            } else {
                $('#coUfIbgeAutor, #coMunicipioIbgeAutor').html('<option value="">Selecione uma opção</option>');
            }
        });

        $('#coUfIbgeAutor').change(function () {
            Address.config.municipio = $('#coMunicipioIbgeAutor');

            if ($(this).val()) {
                Address.populateMunicipioFromEstado($(this).val());
            } else {
                $('#coMunicipioIbgeAutor').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getModalidades: function () {
        $('#coEvento').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/modalidade/combo-box?coEvento=' + $(this).val();
                utils.getCombo(url, '#coModalidade');
            }else{
                $('#coModalidade, #coArea, #coTema').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getAreas: function () {
        $('#coModalidade').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/area/combo-box?coModalidade=' + $(this).val();
                utils.getCombo(url, '#coArea');
                utils.getCombo(url, '#coTema');

                RelatorioInscricao.getTemas();
            }else{
                $('#coArea, #coTema').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getTemas: function () {
        $('#coArea').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/tema/combo-box?coArea=' + $(this).val();
                utils.getCombo(url, '#coTema');
            }else{
                $(' #coTema').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getPdf: function () {
        $('.gerar-pdf').click(function () {
            var url = '/relatorio/relatorio-inscricao/view-pdf?rows=11&page=1&data=' + encodeURIComponent($('form').serialize());
            window.location = url;
            return false;
        });

        $('.gerar-excel').click(function () {
            var url = '/relatorio/relatorio-inscricao/view-excel?rows=11&page=1&data=' + encodeURIComponent($('form').serialize());

            window.location = url;
            return false;
        });
    },

    colunas: function () {
        $('#gerarRelatorio').click(function () {
            if ($('form:first').valid()) {
                $('select').not('#coEvento, #coModalidade').each(function (i, v) {
                    var name = $(this).attr('name')
                        .replace('co', 'no')
                        .replace('noSeq', 'no')
                        .replace('noUfIbge', 'noUf')
                        .replace('noMunicipioIbge', 'noMunicipio')
                        .replace('noSexo', 'coSexo')
                        .replace('noSituacao', 'dsSituacao')
                        .replace('noInstituicao', 'noTipoInstituicao');

                    if ($(this).val()) {
                        $('#grid').showCol(name);
                    } else {
                        $('#grid').hideCol(name);
                    }
                });

                $('input[type=checkbox]').each(function () {
                    var name = $(this).attr('name').replace('inInstituicao', 'noInstituicao')
                        .replace('InInforDuplicadas', 'duplicata');

                    if ($(this).is(':checked')) {
                        $('#grid').showCol(name);
                    } else {
                        $('#grid').hideCol(name);
                    }
                });
            }
        });
    },

    init: function () {
        RelatorioInscricao.getModalidades();
        RelatorioInscricao.getUfs();
        RelatorioInscricao.getPdf();
        RelatorioInscricao.colunas();
        RelatorioInscricao.getAreas();
        RelatorioInscricao.getUfsAutor();
    }
}

$(document).ready(function () {
    RelatorioInscricao.init();
});