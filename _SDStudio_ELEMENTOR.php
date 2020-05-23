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

if ($ENABLE_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1){
//
/**
 * Elementor FIX SPEED
 */

    /**
     * ENABLE_FIXES_ELEMENTOR
     */
//    dd($DISABLE_Google_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls);
    if ($DISABLE_Google_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1){
        add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
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