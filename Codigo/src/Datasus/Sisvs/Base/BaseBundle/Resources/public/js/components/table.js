/**
 * Usage
 *
 * $(document).ready(function () {
 *   var options = {
 *       inseretAfter: $('#holder'),
 *       namePost: 'coAutor',
 *       columns: {
 *           'Co-Autor': null,
 *           'Instituição': null
 *       },
 *
 *       data: [
 *           {"autor": "coautor", "institucia": "insit"},
 *           {"autor": "coautor123", "institucia": "insit123"}
 *       ]
 *   }
 *
 *   var coAutor = dynamicTable.handler(options);

 *  $('#gerarRelatorio').click(function () {
 *       coAutor.setData({"autor": $('#coEvento').val(), "institucia": $('#coDuplicadas').val()});
 *   });
 * });
 *
 */
function DynamicTable() {
    var element = $('<table class="table table-bordered ui-widget-content dynamic-table"></table>'),
        options = {
            name: null,
            inseretAfter: $(''),
            data: [],
            columns: {
            }
        };

    this.getData = function () {
        return options.data;
    };

    this.setData = function (data) {
        options.data.push(data);
        this.load();
    };

    this.load = function () {
        var that = this;

        element.find('tr:not(":first")').remove();

        $.each(options.data, function (i, v) {
            var tr = '<tr>';

            $.each(v, function (ind, val) {
                var value = val;
                var label = val;

                if (val instanceof Array) {
                    value = val['blob'];
                    label = val['name'];
                    ind = val['name'];
                }

                var td = '<td>';
                var namePost = options.namePost;
                var input = '<input type="hidden" name="' + namePost + '[' + i + '][' + ind + ']" value="' + value + '" />';

                td = td + label + input;
                td = td + '</td>';
                tr = tr + td;
            });

            tr = tr + '<td>' + that.buttonRemove(i) + '</td>';
            tr = tr + '</tr>';

            element.append(tr);
        });

        this.refresh();
    };

    this.buttonRemove = function (index) {
        return '<a class="icon-trash ' + element.attr('id') + '" id="' + index + '"></a>';
    };

    this.remove = function (index) {
        delete options.data.splice(index, 1);
        this.load()
    };

    this.render = function () {
        this.mountColumns();
        this.load();

        options.inseretAfter.append(element);
    };

    this.clear = function () {
        options.data = [];
        this.load();
    }

    this.mountColumns = function () {
        var tr = '<tr>';

        $.each(options.columns, function (i, v) {
            tr = tr + '<th>' + i + '</th>';
        });

        tr = tr + '<th width="45px">' + 'Opções' + '</th>';
        tr = tr + '</tr>';

        var id = 'table_' + $('.dynamic-table').size();

        if ($(id).data()) {
            element = $(id);
        } else {
            element.attr('id', id);
        }

        element.append(tr);
    };

    this.refresh = function () {
        if (element.find('tr').size() == 1) {
            var colspan = element.find('tr:first th').size();
            var tr = '<tr><td colspan="' + colspan + '">Não há registros</td></tr>';
            element.append(tr);
        }
    };

    this.handler = function (params) {
        $.extend(options, params);

        this.render();

        return this;
    };
}