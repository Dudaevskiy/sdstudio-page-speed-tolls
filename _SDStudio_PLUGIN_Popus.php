<?php
/**
 * REDUX - Захват опций темы
 */
$redux = get_option( 'redux_sdstudio_page_speed_tolls' );

/**
 * ENABLE_FIXES_ELEMENTOR
 */
$ENABLE_FIXES_PLUGINS_Popups_sdstudio_page_speed_tolls = $redux['ENABLE_FIXES_PLUGINS_Popups_sdstudio-page-speed-tolls'];

if ($ENABLE_FIXES_PLUGINS_Popups_sdstudio_page_speed_tolls == 1){

    if (is_admin()){
        return;
    }

    add_action( 'wp_print_styles', 'deregister_popups_plugin_public', 100 );
    function deregister_popups_plugin_public() {
        wp_deregister_style( 'spu-public-css' );
    }

    function new_styles_popups_plugin_public() {
    //    $plugin_url = plugin_dir_url( __FILE__ );

        wp_enqueue_style( 'fonts-custom', plugin_dir_url( __FILE__ ) . '_SDStudio_PLUGIN_Popus.css');

    //    wp_enqueue_style( 'Font_Awesome_5_11_2', plugin_dir_url( __FILE__ ) . '_Font Awesome/5.11.2/css/all.css');

    }

    add_action( 'wp_enqueue_scripts', 'new_styles_popups_plugin_public' );

}