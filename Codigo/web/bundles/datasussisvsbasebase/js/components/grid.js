$.extend($.fn, {
    grid: function (options) {
        if (undefined == options.url) {
            return;
        }

        return new $.componentGrid(this, options);
    }
});

$.componentGrid = function (element, options) {
    this.init(element, options);
};

$.extend($.componentGrid, {
    grid: null,
    form: null,
    options: {
        datatype: "json",
        height: '400',
        scrollOffset: 0,
        forceFit: true,
        hidegrid: false,
        pager: '#pager',
        viewrecords: true,
        sortorder: "asc",
        rowNum: 20,
        loadtext: 'Carregando...',
        emptyrecords: 'Registro(s) não encontrado(s).',
        autowidth: true,
        loadComplete: function () {
            if ($.componentGrid.grid.getGridParam("records") == 0 && $.componentGrid.grid.is(':visible')) {
                Message.addMessage('Registro(s) não encontrado(s).');
            }
        }
    },
    buttonSearch: function () {
        $.componentGrid.options.buttonSearch.click(function () {
            if ($.componentGrid.options.form.valid()) {
                $('.grid').removeClass('hide');
                $.componentGrid.grid.setGridWidth($.componentGrid.options.form.width());

                $.componentGrid.grid.jqGrid('clearGridData');
                $.componentGrid.grid.jqGrid('setGridParam', {postData: {data: $.componentGrid.options.form.serialize()}});
                $.componentGrid.grid.trigger('reloadGrid');

                Message.clearMessage();
            }
        });
    },

    formSubmit: function () {
        $.componentGrid.options.form.submit(function () {
            $.componentGrid.options.buttonSearch.click();

            return false;
        });
    },

    prototype: {
        init: function (element, options) {
            $.componentGrid.grid = element;
            $.extend($.componentGrid.options, options);
            $(element).jqGrid($.componentGrid.options);

            $.componentGrid.buttonSearch();
            $.componentGrid.formSubmit();
        }
    }
});