<?php
/**
 * REDUX - Захват опций темы
 */
$redux = get_option( 'redux_sdstudio_page_speed_tolls' );

/**
 * Кнопка "Черновик (*)" в панели админа на внешней части сайта
 */
global $ENABLE_Font_Awesome_5_sdstudio_page_speed_tolls;
$ENABLE_Font_Awesome_5_sdstudio_page_speed_tolls = $redux['ENABLE_Font_Awesome_5_sdstudio-page-speed-tolls'];



if ($ENABLE_Font_Awesome_5_sdstudio_page_speed_tolls == 1){

    /**
    * Добавляем стили
    */
    // https://xenforo.info/resources/font-awesome-5-%D0%9B%D0%BE%D0%BA%D0%B0%D0%BB%D1%8C%D0%BD%D0%B0%D1%8F-%D1%83%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B0-%D0%B8-%D0%BF%D0%BE%D0%B4%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%BD%D0%B8%D0%B5.6085/
    function utm_user_scripts() {
    //    dd('Вхождение есть');
    $plugin_url = plugin_dir_url( __FILE__ );

    //wp_enqueue_style( 'fonts-custom', plugin_dir_url( __FILE__ ) . 'public/css/fonts.css');

    wp_enqueue_style( 'Font_Awesome_5_11_2', plugin_dir_url( __FILE__ ) . '_Font_Awesome/5.11.2/css/all.css');
    wp_enqueue_style( 'v4-shims_Font_Awesome_5_11_2', plugin_dir_url( __FILE__ ) . '_Font_Awesome/5.11.2/css/v4-shims.css');
    // WoodMart theme
    //wp_enqueue_style( 'woodmart-style', plugin_dir_url( __FILE__ ) . '_theme/woodmart/css/styles.css');

    }
    add_action( 'wp_enqueue_scripts', 'utm_user_scripts' );


    add_action('wp_head', 'SDstudio_ENABLE_Fonts_Awesome_5_LOCAL', 100);
    function SDstudio_ENABLE_Fonts_Awesome_5_LOCAL(){

        echo "
        <style>    
        @font-face {
          font-family: 'Font Awesome 5 Brands';
          font-style: normal;
          font-weight: normal;
          font-display: swap;
          src: url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-brands-400.eot\");
          src: local(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-brands-400.woff2\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-brands-400.eot?#iefix\") format(\"embedded-opentype\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-brands-400.woff2\") format(\"woff2\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-brands-400.woff\") format(\"woff\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-brands-400.ttf\") format(\"truetype\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-brands-400.svg#fontawesome\") format(\"svg\"); 
           
            }
        
        .fab {
          font-family: 'Font Awesome 5 Brands'; }
        @font-face {
          font-family: 'Font Awesome 5 Free';
          font-style: normal;
          font-weight: 400;
          font-display: swap;
          src: url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-regular-400.eot\");
          src: loacal(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-regular-400.woff2\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-regular-400.woff2\") format(\"woff2\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-regular-400.eot?#iefix\") format(\"embedded-opentype\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-regular-400.woff\") format(\"woff\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-regular-400.ttf\") format(\"truetype\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-regular-400.svg#fontawesome\") format(\"svg\");
             }
        
        .far {
          font-family: 'Font Awesome 5 Free';
          font-weight: 400; }
        @font-face {
          font-family: 'Font Awesome 5 Free';
          font-style: normal;
          font-weight: 900;
          src: url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-solid-900.eot\");
          src: local(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-solid-900.woff2\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-solid-900.eot?#iefix\") format(\"embedded-opentype\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-solid-900.woff2\") format(\"woff2\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-solid-900.woff\") format(\"woff\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-solid-900.ttf\") format(\"truetype\"), url(\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-solid-900.svg#fontawesome\") format(\"svg\"); 
          font-display: swap;
          }
          
        
        .fa,
        .fas {
          font-family: 'Font Awesome 5 Free';
          font-weight: 900; 
          }

        i.fa {
        font-family: \"Font Awesome 5 Free\" !important;
        }
        .fa:before{
            font-family: \"Font Awesome 5 Free\" !important;
        }
        </style>
        
        
        <link rel=\"preload\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-solid-900.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>
        <link rel=\"preload\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-regular-400.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>";

    }

    add_action( 'wp_enqueue_scripts', 'custom_load_font_awesome' );
    /**
     * Enqueue Font Awesome.
     */
    function custom_load_font_awesome() {

        wp_enqueue_style( 'font-awesome-free', '//wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/css/all.css' );

    }
}