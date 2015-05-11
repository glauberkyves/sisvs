AcompanharEvento = {
    getModalidades: function () {
        $('#coEvento').change(function () {
            if ($(this).val()) {
                $('#coModalidade, #coArea, #coTema').val('').change();

                var url = '/administrativo/modalidade/combo-box?coEvento=' + $(this).val();

                utils.getCombo(url, '#coModalidade');
            } else {
                $('#coModalidade, #coArea, #coTema').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getAreas: function () {
        $('#coModalidade').change(function () {
            if ($(this).val()) {
                $('#coArea, #coTema').val('').change();

                var url = '/administrativo/area/combo-box?coModalidade=' + $(this).val();

                utils.getCombo(url, '#coArea');
            } else {
                $('#coArea, #coTema').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getTemas: function () {
        $('#coArea').change(function () {
            if ($(this).val()) {
                $('#coTema').val('').change();

                var url = '/administrativo/tema/combo-box?coArea=' + $(this).val();

                utils.getCombo(url, '#coTema');
            } else {
                $('#coTema').html('<option value="">Selecione uma opção</option>');
            }
        });
    }
}

$(document).ready(function () {
    AcompanharEvento.getModalidades();
    AcompanharEvento.getAreas();
    AcompanharEvento.getTemas();
    $('select').prop('selectedIndex', 0);
});