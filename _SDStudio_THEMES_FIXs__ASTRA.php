<?php
/**
 * DISABLE Loading of Astra’s Default Font
 * https://wpastra.com/docs/disable-loading-astras-default-font-file-astra-woff/?bsf=3947
 */

/**
 * REDUX - Захват опций темы
 */
$redux = get_option( 'redux_sdstudio_page_speed_tolls' );

/**
 * ENABLE_FIXES_ELEMENTOR
 */

$FIXES_THEMES_Disable_astra_font_ASTRA_sdstudio_page_speed_tolls = $redux['FIXES_THEMES_Disable_astra_font_ASTRA_sdstudio-page-speed-tolls'];


if ($FIXES_THEMES_Disable_astra_font_ASTRA_sdstudio_page_speed_tolls == 1){
    if (is_admin()){
        return;
    }
    add_filter( 'astra_enable_default_fonts', '__return_false' );


    add_action( 'wp_enqueue_scripts', 'new_styles_for_astra_plugin_public' );
    function new_styles_for_astra_plugin_public() {
        //    $plugin_url = plugin_dir_url( __FILE__ );

        wp_enqueue_style( 'astra_theme_font_replacer', plugin_dir_url( __FILE__ ) . '_SDStudio_THEMES_FIXs__ASTRA.css');

        //    wp_enqueue_style( 'Font_Awesome_5_11_2', plugin_dir_url( __FILE__ ) . '_Font Awesome/5.11.2/css/all.css');

    }
}
