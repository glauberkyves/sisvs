ProrrogarPrazo = {

    getModalidades: function () {
        $('#coEvento').val(function () {
            if ($(this).val()) {
                $('#coModalidade, #coArea').val('');

                var url = '/administrativo/modalidade/combo-box?coEvento=' + $(this).val();

                utils.getCombo(url, '#coModalidade');
            } else {
                $('#coModalidade, #coArea ').html('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getAreas: function () {
        $('#coModalidade').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/area/combo-box?coModalidade=' + $(this).val();
                utils.getCombo(url, '#coArea');

            }else{
                $(' #coArea ').html('<option value="">Selecione uma opção</option>');
            }
        });
    }
}

$(document).ready(function () {
    ProrrogarPrazo.getModalidades();
    ProrrogarPrazo.getAreas();
});