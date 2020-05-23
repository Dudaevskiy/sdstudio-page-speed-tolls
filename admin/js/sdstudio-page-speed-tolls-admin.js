(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );

/**
 *
 */
jQuery(document).ready(function ($) {
	// When the DOM is ready.
	// Все классы body
//     var classes = $('body').attr('class');

// И выдергиваем ID страницы из SDStudio-ID
//     var PageID = classes.split('SDStudio-ID-');
//     var PageID = PageID[1].split(' ');
//     var PageID = PageID[0];

	$(function() {
		var file_frame; // variable for the wp.media file_frame

		// attach a click event (or whatever you want) to some element on your page
		// https://dev.to/kelin1003/utilising-wordpress-media-library-for-uploading-files-2b01
		// $( '#sdstudio-editor-tools-image-post' ).on( 'click', function( event ) {
		$( 'body' ).on( 'click', 'fieldset#redux_sdstudio_page_speed_tolls-opt-slides [id^="opt-slides-url_"]',function( event ) {
//             event.preventDefault();
			$(this).addClass('ThisWorkInputForInsertFont');
			console.log('Начинаем вставку');

			// if the file_frame has already been created, just reuse it
			if ( file_frame ) {
				file_frame.open();
				return;
			}

			file_frame = wp.media.frames.file_frame = wp.media({
				// title: $( this ).data( 'uploader_title' ),
				title: 'Выбрать изображение записи',
				frame      : 'select',
				// frame      : 'post',
				displaySettings: true,
				button: {
					text: $( this ).data( 'uploader_button_text' ),
				},
				multiple: false // set this to true for multiple file selection
			});

			file_frame.on( 'select', function() {

				var selection = file_frame.state().get( 'selection' );

				var ID_Attach_IMG = selection.map( function( attachment ) {
					attachment.toJSON();
					return attachment.id;
				});
				var ID_Attach_IMG_URL = selection.map( function( attachment ) {
					attachment.toJSON();
					return attachment.attributes.url;
				});


				var ID_Attach_IMG_URL = ID_Attach_IMG_URL[0];
				console.log(ID_Attach_IMG_URL);
// Вставляем имя шрифта
// Получаем имя файла из сссылки
				function fileNameFromUrl(url) {
					var matches = url.match(/\/([^\/?#]+)[^\/]*$/);
					if (matches.length > 1) {
						return matches[1];
					}
					return null;
				}

				var FontName = fileNameFromUrl(ID_Attach_IMG_URL);
// Делаем имя с заглавной
				FontName = FontName.charAt(0).toUpperCase() + FontName.substr(1).toLowerCase();
				console.log(FontName);
// Вставляем имя шрифта
				$('body').find('.ThisWorkInputForInsertFont').closest('ul#opt-slides-ul').find('.slide-title').val(FontName);

// Вставляем URL шрифта
				$('body').find('.ThisWorkInputForInsertFont').val(ID_Attach_IMG_URL).removeClass('ThisWorkInputForInsertFont');
				console.log('Вставляем ссылку');

//                    console.log('ID POST -'+ PageID);

				/////////////////////////////
				/// sweetalert2 IF START
				var ChangeIMGPost = ID_Attach_IMG;


			});

			file_frame.open();
		});
	});

});