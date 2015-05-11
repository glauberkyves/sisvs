var utils = {
    toogleStatus: function (id, stAtivo) {
        var url = window.location.pathname + '/toogle-status?id=' + id;

        if (stAtivo == 'active') {
            $('#modal-toogle-status .modal-body h4').html('Confirma Inativação?');
        } else {
            $('#modal-toogle-status .modal-body h4').html('Confirma Ativação?');
        }

        $('#modal-toogle-status').modal({
            keyboard: false,
            backdrop: 'static'
        });

        $('#modal-toogle-status .toogle-status-yes').unbind('click').click(function () {
            utils.send();
            window.location = url;
        });
    },

    view: function (id, url) {
        if (undefined == url) {
            url = window.location.pathname + '/view?id=' + id;
        } else {
            url = url + '?id=' + id;
        }

        $.get(url, function (data) {
            $('#modal-view').html(data);

            $('#modal-view').modal({
                keyboard: false,
                backdrop: 'static'
            });
        });
    },

    getCombo: function (url, targetElement, callback) {
        $.getJSON(url, function (data) {
            $(targetElement + ' option').remove();
            $(targetElement).append(new Option('Selecione uma opção', ''));

            $.each(data, function (key, val) {
                $(targetElement).append(new Option(val, key));
            });
        });
    },

    send: function () {
        $(".toogle-status-yes").attr("disabled", "disabled");
    }
};
$(document).ajaxStart(function () {
    $('#modal-loading')
        .html('<img src="/bundles/datasussisvsbasebase/images/lgo/ajax-loader.gif" />')
        .css('text-align', 'center')
        .css('top', '75%')
        .css('width', '14%')
        .css('left', '57%')
        .modal({
            keyboard: false,
            backdrop: 'static'
        });
}).ajaxStop(function () {
    $('#modal-loading').modal('toggle')
});


