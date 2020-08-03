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
 * $ENABLE_BASE_Awesome_Fonts
 */
global $BASE64_ENABLE_Preload_Awesome_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls;
$BASE64_ENABLE_Preload_Awesome_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls = $redux['BASE64_ENABLE_Preload_Awesome_Fonts_FIXES_ELEMENTOR_sdstudio-page-speed-tolls'];

/**
 * $DISABLE_Eicons
 */
global $DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio_page_speed_tolls;
$DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio_page_speed_tolls = $redux['DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio-page-speed-tolls'];

//dd($DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio_page_speed_tolls);

if ($ENABLE_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1) {
//
    /**
     * Elementor FIX SPEED
     */

    /**
     * DISABLE_Google_Fonts
     */
    if ($DISABLE_Google_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1) {
        add_filter('elementor/frontend/print_google_fonts', '__return_false');
    }



    /**
     * $DISABLE_Eicons
     * https://gist.github.com/julian-stark
     */
    if ($DISABLE_Eicons_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1) {
        // Deactivate Eicons at Elementor
        add_action('elementor/frontend/after_enqueue_styles', 'js_dequeue_eicons');
        function js_dequeue_eicons()
        {

            // Don't remove it in the backend
            if (is_admin() || current_user_can('manage_options')) {
                return;
            }
            wp_dequeue_style('elementor-icons');
        }
    }


}

if ($BASE64_ENABLE_Preload_Awesome_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1){
    /**
     * https://docs.elementor.com/article/286-speed-up-a-slow-site
     *
     * Note: By default, Font Awesome icons will only load on the pages where you've used them, so FA won't load on pages that aren't using any Font Awesome icons. This brings faster performance and faster page speed to your site, which can benefit your SEO and your users' experience. Only the CSS and fonts of the icon family you actually use are loaded. So only dequeue Font Awesome if you truly plan to not use any Font Awesome icons at all. If you dequeue Font Awesome, the icons will no longer show on any of your pages
     *
     */

// Elementor - Remove Font Awesome
    add_action( 'elementor/frontend/after_register_styles',function() {
        foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
            wp_deregister_style( 'elementor-icons-fa-' . $style );
        }
    }, 20 );

// Elementor - Отключаем FontAwesome /plugins/elementor/assets/lib/font-awesome/css/all.min.css
    function SDSTool_global_callback($buffer) {
        /**
         * Elementor - Удаление стиля FontAwesome all.min.css
         */
        $re = '/<link rel=\'stylesheet\' id=\'font-awesome-5-all-css\'  href=\'http(.+?)\/wp-content\/plugins\/elementor\/assets\/lib\/font-awesome\/css\/all\.min\.css\'  media=\'all\' \/>/m';
        $buffer = preg_replace($re,' ',$buffer);
        /**
         * END
         */
        return $buffer;
    }

    function buffer_start() { ob_start("SDSTool_global_callback"); }
    function buffer_end() { ob_end_flush(); }

    add_action('after_setup_theme', 'buffer_start');
    add_action('shutdown', 'buffer_end');

// Elementor - Подключаем наш
add_action('init', 'REGISTER_Reconnect_RemoveElementor_allmincss_dequeue_styles');
function REGISTER_Reconnect_RemoveElementor_allmincss_dequeue_styles() {
//    dd(SDSTUDIO_PAGE_SPEED_TOLLS__PLUGIN_URL . '_Elementor/FontAwesomeForBase64_all.min.css');
    wp_register_style( 'font-awesome-5-all-sdstudio', SDSTUDIO_PAGE_SPEED_TOLLS__PLUGIN_URL . '_Elementor/FontAwesomeForBase64_all.min.css' );
}

function Reconnect_RemoveElementor_allmincss_dequeue_styles() {
    wp_enqueue_style( 'font-awesome-5-all-sdstudio' );
}
add_action( 'wp_enqueue_scripts', 'Reconnect_RemoveElementor_allmincss_dequeue_styles' );


    /**
     * $BASE64__Preload_Awesome_Fonts
     */
    add_action('wp_head', 'BASE64__Awesome_Fonts_SDStudio_page_speed_tools',25);
    function BASE64__Awesome_Fonts_SDStudio_page_speed_tools()
    {
        $FontAwesomeBASE64 = file_get_contents(SDSTUDIO_PAGE_SPEED_TOLLS__PLUGIN_DIR."_SDStudio_PRELOADER_FONTS_and_FILES__BASE64.css"); // Can use single quot as well...
        echo '<style type="text/css">' . $FontAwesomeBASE64 . '</style>'; // All php echo example
    }


}
