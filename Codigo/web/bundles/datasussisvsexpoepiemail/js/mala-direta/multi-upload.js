MultiUpload = {
    nameFiles: new Array(),
    config: {
        list: '',
        msg: 'Upload não permitido. Permitido apenas upload de arquivos com as extensões: .pdf, .doc, .odt, .xls, .xlsx, .jpg, .png, .gif, .ppt, .zip.'
    },

    setConfig: function (config) {
        $.extend(this.config, config);
    },

    add: function (elementList) {
        var that = this;
        var id = this.generateId();
        var newInput = this.createInputFile(id);

        $(newInput).appendTo($(elementList).parent('div')).change(function () {
            var name = $(this).val().replace(/C:\\fakepath\\/i, '');
            var exAnexo = name.substring(name.length - 4).toLowerCase();

            if (exAnexo != '.pdf'
                && exAnexo != '.doc'
                && exAnexo != '.docx'
                && exAnexo != '.odt'
                && exAnexo != '.xls'
                && exAnexo != '.xlsx'
                && exAnexo != '.jpg'
                && exAnexo != '.png'
                && exAnexo != '.gif'
                && exAnexo != '.ppt'
                && exAnexo != '.zip'
                ) {

                Message.addMessage(that.config.msg, 'error', 'error-upload');
                $(this).remove();

            } else {
                $('.items').append(that.createButton(id, name));
                that.nameFiles.push(name);
                Message.remove('error-upload');
            }
        }).click().hide();
    },

    createInputFile: function (id) {
        var index = this.nameFiles.length + 1;

        return '<input type="file" name="multi-upload[' + index + ']" id="' + id + '" />';
    },

    createButton: function (id, name) {
        return '<button type="button" id="' + id + '" class="btn btn-small remove-upload" onClick="MultiUpload.remove(this);">' + name + ' <b>[x]</b></button>';
    },

    generateId: function () {
        return Math.floor((Math.random() * 100) + 1);
    },

    remove: function (element) {
        $('input[id=' + $(element).attr('id') + ']').remove();
        $(element).remove();
    },

    clear: function () {
        $('#list-files button').each(function () {
            $(this).click();
        });
    }
}