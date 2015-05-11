$(document).ready(function () {
    $('.textarea').each(function () {
        CKEDITOR.on('instanceReady', function () {
            $.each(CKEDITOR.instances, function (instance) {
                CKEDITOR.instances[instance].document.on("keyup", CK_jQ);
                CKEDITOR.instances[instance].document.on("keypress", CK_jQ);
                CKEDITOR.instances[instance].document.on("blur", CK_jQ);
                CKEDITOR.instances[instance].document.on("change", CK_jQ);
		            CKEDITOR.instances[instance].document.on("click", CK_jQ);
            });
        });

        function CK_jQ() {
            $('.datepicker').hide();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }

        var maxlength = $(this).attr('maxlength');
        maxlength     = parseInt(maxlength) > 0 ? maxlength : maxlength;

        CKEDITOR.replace($(this).attr('id'), {
            extraPlugins : 'doksoft_stat',
            doksoft_stat : {
                showWordCount: false,
                showSelectedCount: false,
                showSourceCount: false,
                showCharCount: true,
                maxCharCount: maxlength
            },
            toolbar: [
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline' ] },
                { name: 'paragraph', groups: [ 'align', 'list', 'indent', 'blocks' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                { name: 'clipboard', groups: ['undo' ], items: [ 'Undo', 'Redo'] },
                { name: 'browseServer', groups: ['image' ], items: [ 'Image'] }
            ]
        });
    });
});