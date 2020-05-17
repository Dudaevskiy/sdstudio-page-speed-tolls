<?php



/**
 * Печатаем css в теле страницы
 *
 */

//add_action('wp_head', 'PRELOAD_FONTS_and_FILES', 100);
function PRELOAD_FONTS_and_FILES()
{
    echo "<script>
	
	     (function () {
    			var done = false;
    			var script = document.createElement(\"script\"),
    			head = document.getElementsByTagName(\"head\")[0] || document.documentElement;
    			//script.src = 'https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.26/webfontloader.js';
    			script.src = '/wp-content/plugins/sdstudio-page-speed-tolls/public/js/webfontloader.js';
    			script.async = true;
    			script.onload = script.onreadystatechange = function() {
    				if ( ! done && ( ! this.readyState || this.readyState === \"loaded\" || this.readyState === \"complete\" ) ) {
    					done = true;
    					WebFont.load({
							
							/* SDStudio Google Fonts */
							/**/
							google: {
    							families: ['Poppins','Lato','Roboto']
    						}
							/**/
							
							/* SDStudio CUSTOM */
							/*
    						 custom: {
								families: ['Lato','Poppins','Roboto'],
								urls: ['/wp-content/plugins/sdstudio-page-speed-tolls/_fonts.css']
							  },
							  loading: function () { console.log(\"Loading fonts..\"); },
							  //active: function () { mutexFontsLoaded.fire(); },
							  fontinactive: function (font, fvd) { console.log(\"Could'nt load \" + font + \" font\"); },
							  inactive: function () { console.log(\"All fonts failed loading..Trying to load site anyway..\"); 
								//mutexFontsLoaded.fire(); 
							  }
							*/
    					});
    					script.onload = script.onreadystatechange = null; 
    				}
    			};
    			head.insertBefore(script, head.firstChild);
    		})();
			</script>
	<style>


<!--
<link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/lato-v16-latin_latin-ext-regular.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
<link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/poppins-v9-latin_devanagari_latin-ext-600.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
<link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/lato-v16-latin_latin-ext-700.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
<link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/poppins-v9-latin_devanagari_latin-ext-900italic.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
<link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/poppins-v9-latin_devanagari_latin-ext-700.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
-->


";
}
