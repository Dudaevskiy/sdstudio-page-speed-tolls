<?php


/**
 * Elementor FIX SPEED
 */

/**
 * Проверка активности плагина на странице плагинов.
 */
include_once(ABSPATH.'wp-admin/includes/plugin.php');
//if ( is_plugin_active( 'elementor/elementor.php' ) ) {
if ( !function_exists('is_plugin_active') || !is_plugin_active('elementor/elementor.php')) {

//    dd('Плагин активен');

    require_once plugin_dir_path( __FILE__ ) . '_Elementor/elementor-fix.php';
    add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );



} else {
//    dd('Плагин не активен');
}
