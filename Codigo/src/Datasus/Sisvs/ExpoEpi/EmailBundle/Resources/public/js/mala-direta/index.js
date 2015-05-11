MalaDreita = {
    getModalidades: function() {
        $ ('#coEvento').change (function() {
            if ($ (this).val ()) {
                $ ('#coModalidade, #coArea, #coTema').val ('').change ();
                var url = '/administrativo/modalidade/combo-box?coEvento=' + $ (this).val ();
                utils.getCombo (url, '#coModalidade');
            } else {
                $ ('#coModalidade, #coArea, #coTema').html ('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getAreas: function() {
        $ ('#coModalidade').change (function() {
            if ($ (this).val ()) {
                $ ('#coArea, #coTema').val ('').change ();
                var url = '/administrativo/area/combo-box?coModalidade=' + $ (this).val ();
                utils.getCombo (url, '#coArea');
            } else {
                $ ('#coArea, #coTema').html ('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getTemas: function() {
        $ ('#coArea').change (function() {
            if ($ (this).val ()) {
                $ ('#coTema').val ('').change ();
                var url = '/administrativo/tema/combo-box?coArea=' + $ (this).val ();
                utils.getCombo (url, '#coTema');
            } else {
                $ ('#coTema').html ('<option value="">Selecione uma opção</option>');
            }
        });
    },

    getSituacao: function() {
        $ ('#envolvidos').change (function() {
            if ($ (this).val ()) {
                var url = '/email/mala-direta/combo-box?envolvido=' + $ (this).val ();
                utils.getCombo (url, '#dsSituacao');
            }
        });
        $ ('#pesquisar').click (function() {
            $ ('.grid').removeClass ('hide');
        });
    },

    checkInscricao: function() {
        $ ('.grid form').on ('click', 'input[id=check]', function() {
            if ($ (this).is (':checked')) {
                $ (this).parent ('td').next ('td').find ('input').removeAttr ('disabled');
            } else {
                $ (this).parent ('td').next ('td').find ('input').attr ('disabled', true);
            }
        });
    },

    checkAnexo: function() {
        $ ('.grid form').on ('click', 'input[id=anexo]', function() {
            var form = encodeURIComponent ($ ('form').serialize ());
            var url = '/email/mala-direta/view';
            if ($ (this).is (':checked')) {
                MalaDreita.view ($ (this).val (), form, url);
            }
        });
    },

    multiUpload: function() {
        $ ('.multi-upload').click (function() {
            MultiUpload.add ('#list-files');
        });

        $ ('#limpar').click (function() {
            MultiUpload.clear ();
        });
    },

    view: function(id, form, url) {
        if (undefined == url) {
            url = window.location.pathname + '/view?id=' + id + '&data=' + form;
        } else {
            url = url + '?id=' + id + '&data=' + form;
        }

        $.get (url, function(data) {
            $ ('#modal-view').html (data);

            $ ('#modal-view').modal ({
                keyboard: false,
                backdrop: 'static'
            }).css ({
                'width': function() {
                    return ($ (document).width () * .8) + 'px';
                },
                'margin-left': function() {
                    return -($ (this).width () / 2);
                }
            });
        });
    },

    init: function() {
        MalaDreita.getModalidades ();
        MalaDreita.getAreas ();
        MalaDreita.getTemas ();
        MalaDreita.getSituacao ();
        MalaDreita.checkInscricao ();
        MalaDreita.checkAnexo ();
        MalaDreita.multiUpload ();
    }
};

$ (document).ready (function() {
    MalaDreita.init ();
});