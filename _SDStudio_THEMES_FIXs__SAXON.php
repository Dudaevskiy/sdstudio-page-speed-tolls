<?php
/**
 * REDUX - Захват опций темы
 */
$redux = get_option( 'redux_sdstudio_page_speed_tolls' );

/**
 * Saxon - Перенос icons2.woff2 в тело HTML с preload
 */
global $FIXES_THEMES__SAXON_icons2_woff2_sdstudio_page_speed_tolls;
$FIXES_THEMES__SAXON_icons2_woff2_sdstudio_page_speed_tolls = $redux['FIXES_THEMES__SAXON_icons2_woff2_sdstudio-page-speed-tolls'];


if ($FIXES_THEMES__SAXON_icons2_woff2_sdstudio_page_speed_tolls == 1){

//    add_action('wp_head', 'FIXES_THEMES__SAXON_icons2_woff2_sdstudio_page_speed_tolls', 100);
    function FIXES_THEMES__SAXON_icons2_woff2_sdstudio_page_speed_tolls()
    {
        $SDStudio_cur_domain = $_SERVER['SERVER_NAME'];
        echo "<style>
                @font-face {
                        font-family: \"asppsicons2\";
                        font-weight: normal;
                        font-style: normal;
                        font-display: swap !important;
                        src: local('asppsicons2'), url('https://".$SDStudio_cur_domain."/wp-content/plugins/ajax-search-pro/css/fonts/icons/icons2.woff2') format('woff2');
                        src: url('https://".$SDStudio_cur_domain."/wp-content/plugins/ajax-search-pro/css/fonts/icons/icons2.eot');
                        src: url('https://".$SDStudio_cur_domain."/wp-content/plugins/ajax-search-pro/css/fonts/icons/icons2.eot?#iefix') format('embedded-opentype'),
                        url('https://".$SDStudio_cur_domain."/wp-content/plugins/ajax-search-pro/css/fonts/icons/icons2.woff2') format('woff2'),
                        url('https://".$SDStudio_cur_domain."/wp-content/plugins/ajax-search-pro/css/fonts/icons/icons2.woff') format('woff'),
                        url('https://".$SDStudio_cur_domain."/wp-content/plugins/ajax-search-pro/css/fonts/icons/icons2.ttf') format('truetype'),
                        url('https://".$SDStudio_cur_domain."/wp-content/plugins/ajax-search-pro/css/fonts/icons/icons2.svg#icons') format('svg');
                    }
                    
                     @font-face {
                        font-family: \"FontAwesome\";
                        font-display: swap !important;
                    }
                                         
                     @font-face {
                        font-family: \"spufont\";
                        font-display: swap !important;         
                        font-weight: normal;
                        font-style: normal;               
                      /*src:url('/wp-admin/plugins/popups/public/assets/fonts/spufont.eot');*/
                       /*src:url('../fonts/spufont.eot?#iefixsze5my') format('embedded-opentype'),*/
                        url('/wp-admin/plugins/popups/public/assets/fonts/spufont.woff?sze5my') format('woff'),
                        /*url('../fonts/spufont.ttf?sze5my') format('truetype'),*/
                       /*url('../fonts/spufont.svg?sze5my#spufont') format('svg');*/
                    }
              </style>";

//        echo "<link rel=\"preload\" href=\"https://".$SDStudio_cur_domain."/wp-content/plugins/ajax-search-pro/css/fonts/icons/icons2.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>";
//        echo "<link rel=\"preload\" href=\"https://".$SDStudio_cur_domain."/wp-content/themes/saxon/fonts/fontawesome-webfont.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>";
//        echo "<link rel=\"preload\" href=\"https://".$SDStudio_cur_domain."/wp-content/plugins/popups/public/assets/fonts/spufont.woff\" as=\"font\" type=\"font/woff\" crossorigin>";
//        echo "<link rel=\"preload\" href=\"https://".$SDStudio_cur_domain."/wp-content/plugins/ajax-search-pro/css/fonts/icons/icons2.woff2&display=swap\" as=\"font\" type=\"font/woff2\" crossorigin>";

    }

}