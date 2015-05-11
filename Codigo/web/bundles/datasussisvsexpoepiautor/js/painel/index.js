AcompanharEvento = {
    getModalidades: function () {
        $('#noEvento').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/modalidade/combo-box?coEvento=' + $(this).val();
                utils.getCombo(url, '#noModalidade');
            }
        });
    },

    getAreas: function () {
        $('#noModalidade').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/area/combo-box?coModalidade=' + $(this).val();
                utils.getCombo(url, '#noArea');
            }
        });
    },

    getTemas: function () {
        $('#noArea').change(function () {
            if ($(this).val()) {
                var url = '/administrativo/tema/combo-box?coArea=' + $(this).val();
                utils.getCombo(url, '#noTema');
            }
        });
    }
//    getDuplicatas: function() {
//        $('#grid').click(function (){
//           if($(this).val()) {
//               var url ='/autor/acompanhar-duplicata/toogle';
//               $.getJSON(url, {inscricoes: $("#grid").jqGrid('getGridParam','selarrrow')});
//           }
//        });
//    }

}

$(document).ready(function () {
    AcompanharEvento.getModalidades();
    AcompanharEvento.getAreas();
    AcompanharEvento.getTemas();
//    AcompanharEvento.getDuplicatas();
});