/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
//    'anexo': '<a class='btn multi-upload' title='Anexar Arquivo'><i class='icon-arrow-up'></i></a>;

    config.extraPlugins = 'doksoft_stat' + 'image';
    config.doksoft_stat = {

        // Whether or not you want to show the Word Count
        showWordCount: false,
        showSelectedCount: true,
        // Whether or not you want to show the Char Count
        maxCharCount: -1,
        doksoft_table_gui_width: 5,
        doksoft_table_gui_height: 5
        //charLimit: 'unlimited',
        // Whether or not to include Html chars in the Char Count
        //countHTML: false
    };
};
