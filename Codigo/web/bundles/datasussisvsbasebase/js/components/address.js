Address = {

    config: {
        cep: $('#cep'),
        pais: $('#pais'),
        estado: $('#estado'),
        municipio: $('#municipio'),
        municipio_hidden: $('#comunicipio_hidden'),
        bairro: $('#bairro'),
        endereco: $('#endereco'),
        numero: $('#numero'),
        complemento: $('#complemento'),
        regiao: $('#regiao')
    },

    init: function (cep, pais, estado, municipio, bairro, endereco, numero, complemento, regiao,municipio_hidden) {
        Address.config.cep = cep;
        Address.config.pais = pais;
        Address.config.estado = estado;
        Address.config.municipio = municipio;
        Address.config.municipio_hidden = municipio;
        Address.config.bairro = bairro;
        Address.config.endereco = endereco;
        Address.config.numero = numero;
        Address.config.complemento = complemento;
        Address.config.regiao = regiao;

        Address.initFields();
    },

    initFields: function () {
        Address.config.cep.blur(function () {
            if ($(this).val()) {
                Address.populateFromCep($(this).val());
            }
        });

        Address.config.pais.change(function () {
            if ($(this).val()) {
                Address.populateEstadoFromPais($(this).val());
            }
        });

        Address.config.estado.change(function () {
            if ($(this).val()) {
                Address.populateMunicipioFromEstado($(this).val());
            }
        });
    },

    populateFromCep: function () {
        var data = {
            sqMunicipio: ''
        };

        $.post('/administrativo/endereco/search-cep', {
                cep: Address.config.cep.val()
            },
            function (result) {
                data = result;

                if (result.length === 0) {

                   Message.addMessage('CEP não encontrado.', 'error');

                    Address.config.cep.val('');
                    Address.config.estado.val('').change();
                    Address.config.municipio.val('').change();
                    Address.config.bairro.val('');
                    Address.config.endereco.val('');
                    Address.config.numero.val('');
                    Address.config.complemento.val('');
                    Address.config.municipio_hidden.val('');
                    Address.config.regiao.val('');

                    return false;
                }

                Address.config.bairro.val(result.noBairro);
                Address.config.endereco.val(result.noLogradouro);
                Address.config.numero.val(result.nuEndereco);
                Address.config.complemento.val(result.txComplemento);
                Address.config.regiao.val(result.regiao);
                Address.config.municipio_hidden.val(result.sqMunicipio);

                Address.populateEstadoFromPais(result.sqPais, result.sqEstado);
            });

        $(document).ajaxStop(function () {
            Address.config.municipio.val(data.sqMunicipio).change();
        });
    },

    populateEstadoFromPais: function (pais, selectedValue) {
        $.post('/administrativo/endereco/combo-estado', {
                pais: pais
            },
            function (data) {
                Address.loadCombo(data, Address.config.estado, selectedValue);
            });
    },

    populateMunicipioFromEstado: function (estado, selectedValue) {
        $.post('/administrativo/endereco/combo-municipio', {
                estado: estado
            },
            function (data) {
                Address.loadCombo(data, Address.config.municipio, selectedValue);
            });
    },

    populateEstadoFromRegiao: function (regiao, selectedValue) {
        $.post('/administrativo/endereco/combo-estado-regiao', {
                coRegiao: regiao
            },
            function (data) {
                Address.loadCombo(data, Address.config.estado, selectedValue);
            });
    },

    loadCombo: function (data, combo, selectedValue) {
        combo.html(data);

        if (selectedValue) {
            combo.val(selectedValue).change();
        }

        $(document).ajaxStop(function () {
            var ids = '#' + Address.config.cep.attr('id');
            ids = ids + ', #' + Address.config.estado.attr('id');
            ids = ids + ', #' + Address.config.municipio.attr('id');
            ids = ids + ', #' + Address.config.regiao.attr('id');

            $(ids).each(function () {
                if ($(this).val()) {
                    $(this).parent('div').parent('div').removeClass('error');
                }

                $(this).parent('div').find('p').remove();
            });
        });
    },

    clearFields: function () {

        var data = {
            '': 'Selecione...'
        };

        Address.loadCombo(data, Address.config.municipio);
    }
}