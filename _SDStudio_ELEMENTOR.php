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
 * $ENABLE_Preload_Awesome_Fonts
 */
global $ENABLE_Preload_Awesome_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls;
$ENABLE_Preload_Awesome_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls = $redux['ENABLE_Preload_Awesome_Fonts_FIXES_ELEMENTOR_sdstudio-page-speed-tolls'];

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

//        add_action( 'elementor/frontend/after_enqueue_styles', function () { wp_dequeue_style( 'font-awesome' ); } );

        //https://docs.elementor.com/article/286-speed-up-a-slow-site
        add_action( 'elementor/frontend/after_register_styles',function() {
            foreach( [ 'solid', 'regular', 'brands' ] as $style ) {
                wp_deregister_style( 'elementor-icons-fa-' . $style );
            }
        }, 20 );



        if (!function_exists('replace_font_awesome')){
            add_action( 'wp_enqueue_scripts', 'replace_font_awesome', 3 );
            function replace_font_awesome() {
                // Получаем URL сайта
                wp_enqueue_style( 'sds_page_speed_font-awesome-free', sdstudio_page_speed_tolls__PLUGIN_URL.'_Font_Awesome/5.11.2/css/all.css' );
                //wp_enqueue_style( 'font-awesome', $SiteURL.'/wp-content/fonts/swift-performance/fontawesome/webfont.css' );
            }
        }
    }

    /**
     * $DISABLE_Eicons
     * https://gist.github.com/julian-stark
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

    /**
     * Preload Elementor Awesome Fonts
     */
    if ($ENABLE_Preload_Awesome_Fonts_FIXES_ELEMENTOR_sdstudio_page_speed_tolls == 1){
        add_action('wp_head', 'Preload_Elementor_Awesome_Fonts', 100);
        function Preload_Elementor_Awesome_Fonts()
        {
            function siteURL(){
                $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ||
                    $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol.$domainName;
            }
            $siteURL = siteURL();
            $domainName = $_SERVER['HTTP_HOST'];
//            dd($siteURL);$siteURL
            echo "        
            <style>
            
                .fab {
                  font-family: 'Font Awesome 5 Brands'; 
                 }
                 
                .fa,
                .fas {
                  font-family: \"Font Awesome 5 Free\";
                  font-weight: 900;
                  }
                
                i.fa {
                font-family: \"Font Awesome 5 Free\" !important;
                }
                .fa:before{
                    font-family: \"Font Awesome 5 Free\" !important;
                }
                            
                .far {
                  font-family: 'Font Awesome 5 Free';
                  font-weight: 400; 
                }
              
            @font-face {
              font-family: 'Font Awesome 5 Brands';
              font-display: swap !important;
              src: url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-brands-400.eot\");
              src: local(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-brands-400.woff2\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-brands-400.eot?#iefix\") format(\"embedded-opentype\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-brands-400.woff2\") format(\"woff2\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-brands-400.woff\") format(\"woff\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-brands-400.ttf\") format(\"truetype\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-brands-400.svg#fontawesome\") format(\"svg\");         
              font-style: normal;
              font-weight: normal;
              }
    
            @font-face {
              font-family: 'Font Awesome 5 Free';
              font-display: swap !important;
              src: url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-regular-400.eot\");
              src: loacal(\"".$siteURL."/plugins/elementor/assets/lib/font-awesome/webfonts/fa-regular-400.woff2\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-regular-400.woff2\") format(\"woff2\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-regular-400.eot?#iefix\") format(\"embedded-opentype\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-regular-400.woff\") format(\"woff\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-regular-400.ttf\") format(\"truetype\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-regular-400.svg#fontawesome\") format(\"svg\");          
              font-style: normal;
              font-weight: 400;
              
                 }
    
            @font-face {
              font-family: 'Font Awesome 5 Free';
              font-display: swap !important;
              src: url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.eot\");
              src: local(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.woff2\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.eot?#iefix\") format(\"embedded-opentype\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.woff2\") format(\"woff2\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.woff\") format(\"woff\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.ttf\") format(\"truetype\"), url(\"".$siteURL."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.svg#fontawesome\") format(\"svg\");          
              font-style: normal;
              font-weight: 900;
              
              }
    
            </style>
            
            
    
    
        <link rel=\"preload\" href=\"//".$domainName."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-solid-900.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
        <link rel=\"preload\" href=\"//".$domainName."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-regular-400.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
        <link rel=\"preload\" href=\"//".$domainName."/wp-content/plugins/elementor/assets/lib/font-awesome/webfonts/fa-brands-400.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">";
            //prefetch
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
