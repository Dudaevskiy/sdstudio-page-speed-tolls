<?php
/**
 * REDUX - Захват опций темы
 */
$redux = get_option( 'redux_sdstudio_page_speed_tolls' );

/**
 * ENABLE_FIXES_PLUGINS_Highlight_and_Share
 */
global $ENABLE_FIXES_PLUGINS_Highlight_and_Share_sdstudio_page_speed_tolls;
$ENABLE_FIXES_PLUGINS_Highlight_and_Share_sdstudio_page_speed_tolls = $redux['ENABLE_FIXES_PLUGINS_Highlight_and_Share_sdstudio-page-speed-tolls'];

/**
 * Highlight_and_Share DISABLE SWEETALERT2
 */
global $ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_SA2_sdstudio_page_speed_tolls;
$ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_SA2_sdstudio_page_speed_tolls = $redux['ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_SA2_sdstudio-page-speed-tolls'];


/**
 * Highlight_and_Share DISABLE Uncaught "SyntaxError: missing ) after argument list"
 */
global $ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_Uncaught_SyntaxError_sdstudio_page_speed_tolls;
$ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_Uncaught_SyntaxError_sdstudio_page_speed_tolls = $redux['ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_Uncaught_SyntaxError_sdstudio-page-speed-tolls'];

//if ($ENABLE_FIXES_PLUGINS_Highlight_and_Share_sdstudio_page_speed_tolls == 1 ){
//    function dequeue_Highlight_and_Share_DISABLE_SA2(){
//        // wp_dequeue_style( 'woodmart-style' ); //Name of Style ID.
//         wp_deregister_script('sweetalert2');
//    }
// add_action( 'wp_enqueue_scripts', 'dequeue_dequeue_plugin_style', 100 );

//    add_action( 'wp_enqueue_scripts', 'dequeue_Highlight_and_Share_DISABLE_SA2', 9999 );


//    add_action( 'wp_head', 'dequeue_dequeue_plugin_style', 9999 );

//s($ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_Uncaught_SyntaxError_sdstudio_page_speed_tolls);

    function Highlight_and_Share_REPLACE_SCRIPT($buffer) {
        global $ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_SA2_sdstudio_page_speed_tolls;
//        s($ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_SA2_sdstudio_page_speed_tolls);
        global $ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_Uncaught_SyntaxError_sdstudio_page_speed_tolls;

        if ($ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_SA2_sdstudio_page_speed_tolls == 1){
            $buffer = str_replace('/wp-content/plugins/highlight-and-share/js/sweetalert2.all.min.js', '/wp-content/plugins/sdstudio-page-speed-tolls/sweetalert2/sweetalert2.min.js', $buffer);
        }

        if ($ENABLE_FIXES_PLUGINS_Highlight_and_Share_DISABLE_Uncaught_SyntaxError_sdstudio_page_speed_tolls == 1){
            $SDStudio_cur_domain = $_SERVER['SERVER_NAME'];
            $fatch =  '( "fetch" in window ) || document.write( "<script data-handle="wp-polyfill" src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-fetch.min.js?ver=3.0.0"></scr" + "ipt>" );( document.contains ) || document.write( "<script data-handle="wp-polyfill" src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-node-contains.min.js?ver=3.42.0"></scr" + "ipt>" );( window.DOMRect ) || document.write( "<script data-handle="wp-polyfill" src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-dom-rect.min.js?ver=3.42.0"></scr" + "ipt>" );( window.URL && window.URL.prototype && window.URLSearchParams ) || document.write( "<script data-handle="wp-polyfill" src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-url.min.js?ver=3.6.4"></scr" + "ipt>" );( window.FormData && window.FormData.prototype.keys ) || document.write( "<script data-handle="wp-polyfill" src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-formdata.min.js?ver=3.0.12"></scr" + "ipt>" );( Element.prototype.matches && Element.prototype.closest ) || document.write( "<script data-handle="wp-polyfill" src="https://devtechblog.sdstudio.top/wp-includes/js/dist/vendor/wp-polyfill-element-closest.min.js?ver=2.0.2"></scr" + "ipt>" );';
//            $fatch =  '( "fetch" in window ) || document.write( "<script src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-fetch.min.js?ver=3.0.0"></scr" + "ipt>" );( document.contains ) || document.write( "<script src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-node-contains.min.js?ver=3.42.0"></scr" + "ipt>" );( window.DOMRect ) || document.write( "<script src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-dom-rect.min.js?ver=3.42.0"></scr" + "ipt>" );( window.URL && window.URL.prototype && window.URLSearchParams ) || document.write( "<script src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-url.min.js?ver=3.6.4"></scr" + "ipt>" );( window.FormData && window.FormData.prototype.keys ) || document.write( "<script src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-formdata.min.js?ver=3.0.12"></scr" + "ipt>" );( Element.prototype.matches && Element.prototype.closest ) || document.write( "<script src="https://'.$SDStudio_cur_domain.'/wp-includes/js/dist/vendor/wp-polyfill-element-closest.min.js?ver=2.0.2"></scr" + "ipt>" );';
            $buffer = str_replace($fatch,'',$buffer);
        }


        return $buffer;


    }

    function buffer_start_Highlight_and_Share_REPLACE_SCRIPT() { ob_start("Highlight_and_Share_REPLACE_SCRIPT"); }
    function buffer_end_Highlight_and_Share_REPLACE_SCRIPT() { ob_end_flush(); }

add_action('after_setup_theme', 'buffer_start_Highlight_and_Share_REPLACE_SCRIPT');
add_action('shutdown', 'buffer_end_Highlight_and_Share_REPLACE_SCRIPT');