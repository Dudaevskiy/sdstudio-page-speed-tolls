<?php
/**
 * REDUX - Захват опций темы
 */
$redux = get_option( 'redux_sdstudio_page_speed_tolls' );

/**
 * ENABLE_FIXES_ELEMENTOR
 */
global $ENABLE_FIXES_ELEMENTOR_sdstudio_page_speed_tolls;
$ENABLE_FIXES_ELEMENTOR_sdstudio_page_speed_tolls = $redux['ENABLE_FIXES_ELEMENTOR_sdstudio-page-speed-tolls'];

/**
 * $DISABLE_Google_Fonts
 */
global $DISABLE_Google_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls;
$DISABLE_Google_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls = $redux['DISABLE_Google_Fonts_FIXES_ELEMENTOR_sdstudio-page-speed-tolls'];

/**
 * $DISABLE_Font_Awesome
 */
global $DISABLE_Font_Awesome_FIXES_ELEMENTOR_sdstudio_page_speed_tolls;
$DISABLE_Font_Awesome_FIXES_ELEMENTOR_sdstudio_page_speed_tolls = $redux['DISABLE_Font_Awesome_FIXES_ELEMENTOR_sdstudio-page-speed-tolls'];

/**
 * $DISABLE_Eicons
 */
global $DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio_page_speed_tolls;
$DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio_page_speed_tolls = $redux['DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio-page-speed-tolls'];

//dd($DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio_page_speed_tolls);

if ($ENABLE_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1){
//
/**
 * Elementor FIX SPEED
 */

    /**
     * DISABLE_Google_Fonts
     */
    if ($DISABLE_Google_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1){
        add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
    }

    /**
     * DISABLE_Font_Awesome
     */
    if ($DISABLE_Font_Awesome_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1){
        // Старый вариант
        //add_action( 'wp_enqueue_scripts', function() { wp_dequeue_style( 'font-awesome' ); }, 50 );
        //add_action( 'elementor/frontend/after_enqueue_styles', function() { wp_dequeue_style( 'font-awesome' ); } );

        add_action( 'elementor/frontend/after_enqueue_styles', function () { wp_dequeue_style( 'font-awesome' ); } );
        add_action( 'wp_enqueue_scripts', 'replace_font_awesome', 3 );

        function replace_font_awesome() {
            // Получаем URL сайта
            wp_enqueue_style( 'font-awesome', sdstudio_page_speed_tolls__PLUGIN_URL.'sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/css/all.css' );
            //wp_enqueue_style( 'font-awesome', $SiteURL.'/wp-content/fonts/swift-performance/fontawesome/webfont.css' );
        }
    }

    /**
     * $DISABLE_Eicons
     */
    if ($DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1){
// Deactivate Eicons at Elementor
        add_action( 'elementor/frontend/after_enqueue_styles', 'js_dequeue_eicons' );
        function js_dequeue_eicons() {

            // Don't remove it in the backend
            if ( is_admin() || current_user_can( 'manage_options' ) ) {
                return;
            }
            wp_dequeue_style( 'elementor-icons' );
        }
    }

///**
// * Проверка активности плагина на странице плагинов.
// */
//include_once(ABSPATH.'wp-admin/includes/plugin.php');
////if ( is_plugin_active( 'elementor/elementor.php' ) ) {
//if ( !function_exists('is_plugin_active') || !is_plugin_active('elementor/elementor.php')) {
//
////    dd('Плагин активен');
//
//    require_once plugin_dir_path( __FILE__ ) . '_Elementor/elementor-fix.php';
//    add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
//
//
//
//} else {
////    dd('Плагин не активен');
//}



}