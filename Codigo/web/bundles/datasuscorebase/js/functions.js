/**
 * Arquivo responsável pelo JS GERAL
 *
 * Copyright(c) Todos os direitos reservados
 */

if (typeof console == 'undefined') console = { log: function() {} };

var app = {
    init: function()
    {
        if( $( ".box_botoes_acessibilidade" ).length )
            app.font_size();

        if( $( ".area_print" ).length )
            app._print();

        if( $( "#myTab" ).length )
            app.aba();

        if( $( ".date" ).length )
            app.date();

        if( $( "#custom-headers" ).length )
            app.selecte();

        if( $( ".dataForm" ).length )
            app.dataAtual();

        if( $( ".modal_perfil" ).length )
            app.modal_perfil();
    },

    font_size: function()
    {
        $.rvFontsize({
            targetSection: '#content',
            store: false, // store.min.js required!
            controllers: {
                appendTo: '#rvfs-controllers',
                showResetButton: true
            }
        });
    },

    _print: function()
    {
        $('.print').click(function()
        {
            window.print();
            return false;
        });
        $('.print2').click(function()
        {
            window.print();
            return false;
        });
    },

    aba: function()
    {
        $('#myTab a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
    },

    date: function()
    {
        $('.date').datepicker();
    },

    selecte: function()
    {
        $('#custom-headers').multiSelect(
        {
            selectableHeader: "<div class='custom-header'>Municípios Disponíveis</div>",
            selectionHeader: "<div class='custom-header'>Municípios da Regional de saúde</div>"
        });
    },

    dataAtual: function()
    {
        $('.dataForm').text( function(indiceArray)
        {
            var f = new Date();
            return f.getDate() + " / " + (f.getMonth() +1) + " / " + f.getFullYear();
        });
    },

    modal_perfil: function()
    {
        $( "#myModal" ).modal( "show" )
    }
};

// Mensageria
(function()
{
    var $ = jQuery;
    window.Message =
	{
	    show: show,
	    init: init
	};

    var htmlRef = null;

    function init()
    {
        htmlRef = jQuery("<div class='message' style='background-color:#ffffff; border:5px solid #D09F00; display:none; left:50%; margin-left:-245px; padding:20px; position:fixed; top:50%; width:450px; z-index:10000;'><p style='color:#535353; display:block; font-size:14px; line-height:1.3em; text-align:center;'></p></div>").appendTo('body');
    };

    function show(message, type)
    {
        type = type == null ? "" : type;
        htmlRef.fadeIn('slow');
        htmlRef.attr("class", "message " + type);
        htmlRef.find( "p" ).html(message);

		if( jQuery.browser.msie && jQuery.browser.version == "6.0" )
			htmlRef.css('top', jQuery(window).scrollTop() + 100);

		jQuery('body').mousemove(startHide);

    };

    function startHide()
    {
        jQuery('body').unbind('mousemove', startHide);
        var htmlRef = htmlRef;
        setTimeout(hide, 1000);
    };

    function hide()
    {
        htmlRef.fadeOut('slow');
    };
})();

jQuery( Message.init );

jQuery(function()
{
    jQuery.fn.resetDefaultValue = function()
    {
        function _clearDefaultValue()
        {
            var _$ = jQuery(this);
            if (_$.val() == this.defaultValue) { _$.val(''); }
        };
        function _resetDefaultValue()
        {
            var _$ = jQuery(this);
            if (_$.val() == '') { _$.val(this.defaultValue); }
        };
        return this.click(_clearDefaultValue).focus(_clearDefaultValue).blur(_resetDefaultValue);
    }
});

$(function()
{
	app.init();

	window.alert = function(msg)
	{
		Message.show(msg.replace(/\n{1}/gi, '<br/>'));
		return null;
	}
})

