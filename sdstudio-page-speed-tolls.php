<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sdstudio.top
 * @since             1.0.0
 * @package           Sdstudio_Page_Speed_Tolls
 *
 * @wordpress-plugin
 * Plugin Name:       SDStudio Page Speed tolls
 * Plugin URI:        https://techblog.sdstudio.top/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Serhii Dudchenko
 * Author URI:        https://sdstudio.top
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sdstudio-page-speed-tolls
 * Domain Path:       /languages
 
// Yandex Metrika
 https://prometriki.ru/kak-pravilno-vnedrit-yndeks-metriku-cherez-google-tag-manager/
 
 // jQuery перенесен в общее тело скриптов
 В Autoptimize удалена часть строки:
 , js/jquery/jquery.js
 
 // Плагин для подключения метрик:
 // https://github.com/kagg-design/kagg-pagespeed-optimization
 //Плагин требует, чтобы функция php proc_open была включена на сервере.
 */

// Добавляем нестандартные типы файлов в медиатеку
// https://wp-kama.ru/id_8643/spisok-rasshirenij-fajlov-i-ih-mime-tipov.html
//
// Список типов: https://wp-kama.ru/id_8643/spisok-rasshirenij-fajlov-i-ih-mime-tipov.html
// В начале включаем загрузку любого типа фалов для администратора сайта:
// define( 'ALLOW_UNFILTERED_UPLOADS', true );

add_filter( 'upload_mimes', 'upload_allow_types' );
 function upload_allow_types( $mimes ) {
 // разрешаем новые типы
 $mimes['svg']  = 'image/svg+xml'; // image/svg+xml
 $mimes['doc']  = 'application/msword';
 $mimes['woff']  = 'application/x-font-woff';
 $mimes['woff2'] = 'application/x-font-woff2';
 $mimes['ttf']   = 'application/x-font-ttf';
 $mimes['eot']   = 'application/vnd.ms-fontobject';
 $mimes['psd']  = 'image/vnd.adobe.photoshop';
 $mimes['djv']  = 'image/vnd.djvu';
 $mimes['djvu'] = 'image/vnd.djvu';

 // отключаем имеющиеся
// unset( $mimes['mp4a'] );

 return $mimes;
 }


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SDSTUDIO_PAGE_SPEED_TOLLS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sdstudio-page-speed-tolls-activator.php
 */
function activate_sdstudio_page_speed_tolls() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sdstudio-page-speed-tolls-activator.php';
	Sdstudio_Page_Speed_Tolls_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sdstudio-page-speed-tolls-deactivator.php
 */
function deactivate_sdstudio_page_speed_tolls() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sdstudio-page-speed-tolls-deactivator.php';
	Sdstudio_Page_Speed_Tolls_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sdstudio_page_speed_tolls' );
register_deactivation_hook( __FILE__, 'deactivate_sdstudio_page_speed_tolls' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sdstudio-page-speed-tolls.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sdstudio_page_speed_tolls() {

	$plugin = new Sdstudio_Page_Speed_Tolls();
	$plugin->run();

}
run_sdstudio_page_speed_tolls();



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

add_action( 'wp_print_styles', 'deregister_my_styles', 100 );
function deregister_my_styles() {
    wp_deregister_style( 'xts-google-fonts' );
//    wp_deregister_style( 'contactus.fa.css' );
//    wp_deregister_style( 'font-awesome' );
//    wp_deregister_style( 'font-awesome-css' );
//    wp_deregister_style( 'yit_font_awesome_list' );
}

/**
 * @param $buffer
 * @return Удаление из тела
 */
function callback($buffer) {
    $buffer = str_replace('<link rel="preload" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">',' ',$buffer);
    $buffer = preg_replace('<link rel="preload" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">',' ',$buffer);
//    $buffer = str_replace('<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">',' ',$buffer);
    $buffer = str_replace('https://use.fontawesome.com/releases/v5.8.1/css/all.css','',$buffer);
//    /wp-content/plugins/sdstudio-page-speed-tolls/_Font Awesome/5.11.2/css/all.css
    $buffer = str_replace('https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css','',$buffer);
    $buffer = str_replace('<link rel=\'stylesheet\' id=\'contactus.fa.css-css\'  href=\'?ver=1.6.9\' type=\'text/css\' media=\'all\' />','',$buffer);
    $buffer = str_replace('<link rel=\'stylesheet\' id=\'woodmart-style-css\'  href=\'https://top-podarok.by/wp-content/themes/woodmart/style.min.css\' type=\'text/css\' media=\'all\' />','',$buffer);
    // $buffer = str_replace('https://top-podarok.by/wp-content/themes/woodmart/style.min.css','/wp-content/plugins/sdstudio-page-speed-tolls/_theme/woodmart/css/styles.css',$buffer);
//    dd($buffer);
    return $buffer;
}

function buffer_start() { ob_start("callback"); }
function buffer_end() { ob_end_flush(); }

add_action('after_setup_theme', 'buffer_start');
add_action('shutdown', 'buffer_end');


// https://xenforo.info/resources/font-awesome-5-%D0%9B%D0%BE%D0%BA%D0%B0%D0%BB%D1%8C%D0%BD%D0%B0%D1%8F-%D1%83%D1%81%D1%82%D0%B0%D0%BD%D0%BE%D0%B2%D0%BA%D0%B0-%D0%B8-%D0%BF%D0%BE%D0%B4%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%BD%D0%B8%D0%B5.6085/

//function utm_user_scripts() {
////    $plugin_url = plugin_dir_url( __FILE__ );
//
//    wp_enqueue_style( 'fonts-custom', plugin_dir_url( __FILE__ ) . 'public/css/fonts.css');
//
//    wp_enqueue_style( 'Font_Awesome_5_11_2', plugin_dir_url( __FILE__ ) . '_Font Awesome/5.11.2/css/all.css');
//
//}

// add_action( 'admin_print_styles', 'utm_user_scripts' );

/**
* Отключаем
*
*/
function dequeue_dequeue_plugin_style(){
    // wp_dequeue_style( 'woodmart-style' ); //Name of Style ID.
	// wp_deregister_style('woodmart-style');
}
// add_action( 'wp_enqueue_scripts', 'dequeue_dequeue_plugin_style', 100 );
add_action( 'wp_enqueue_scripts', 'dequeue_dequeue_plugin_style', 9999 );
add_action( 'wp_head', 'dequeue_dequeue_plugin_style', 9999 );

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
	wp_enqueue_style( 'woodmart-style', plugin_dir_url( __FILE__ ) . '_theme/woodmart/css/styles.css');

}
add_action( 'wp_enqueue_scripts', 'utm_user_scripts' );





/**
 * Печатаем css в теле страницы
 *
 */

add_action('wp_head', 'my_custom_styles', 100);
function my_custom_styles()
{
    echo "<script>
	
	     (function () {
    			var done = false;
    			var script = document.createElement(\"script\"),
    			head = document.getElementsByTagName(\"head\")[0] || document.documentElement;
    			//script.src = 'https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.26/webfontloader.js';
    			script.src = '/wp-content/plugins/sdstudio-page-speed-tolls/public/js/webfontloader.js';
    			script.async = true;
    			script.onload = script.onreadystatechange = function() {
    				if ( ! done && ( ! this.readyState || this.readyState === \"loaded\" || this.readyState === \"complete\" ) ) {
    					done = true;
    					WebFont.load({
							
							/* SDStudio Google Fonts */
							/**/
							google: {
    							families: ['Poppins','Lato','Roboto']
    						}
							/**/
							
							/* SDStudio CUSTOM */
							/*
    						 custom: {
								families: ['Lato','Poppins','Roboto'],
								urls: ['/wp-content/plugins/sdstudio-page-speed-tolls/_fonts.css']
							  },
							  loading: function () { console.log(\"Loading fonts..\"); },
							  //active: function () { mutexFontsLoaded.fire(); },
							  fontinactive: function (font, fvd) { console.log(\"Could'nt load \" + font + \" font\"); },
							  inactive: function () { console.log(\"All fonts failed loading..Trying to load site anyway..\"); 
								//mutexFontsLoaded.fire(); 
							  }
							*/
    					});
    					script.onload = script.onreadystatechange = null; 
    				}
    			};
    			head.insertBefore(script, head.firstChild);
    		})();
			</script>
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
  font-weight: 900; }



i.fa {
font-family: Font Awesome 5 Free !important;
}
.fa:before{
    font-family: Font Awesome 5 Free !important;
}

@font-face {
			font-weight: normal ;
			font-style: normal ;
			font-family: \"woodmart-font\";
			src: url(\"/wp-content/themes/woodmart/fonts/woodmart-font.eot\") !important;
			src: url(\"/wp-content/themes/woodmart/fonts/woodmart-font.eot?#iefix\") format(\"embedded-opentype\"),
			url(\"/wp-content/themes/woodmart/fonts/woodmart-font.woff\") format(\"woff\"),
			url(\"/wp-content/themes/woodmart/fonts/woodmart-font.woff2\") format(\"woff2\"),
			url(\"/wp-content/themes/woodmart/fonts/woodmart-font.ttf\") format(\"truetype\"),
			url(\"/wp-content/themes/woodmart/fonts/woodmart-font.svg#woodmart-font\") format(\"svg\");
			font-display: swap;
			}

</style>

<link rel=\"prefetch\" href=\"/wp-content/themes/woodmart/fonts/woodmart-font.woff\" as=\"font\" type=\"font/woff\" crossorigin>
<link rel=\"prefetch\" href=\"/wp-content/themes/woodmart/fonts/woodmart-font.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>

<link rel=\"preload\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-solid-900.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>
<link rel=\"preload\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/_Font_Awesome/5.11.2/webfonts/fa-regular-400.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>

<!--
<link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/lato-v16-latin_latin-ext-regular.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
<link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/poppins-v9-latin_devanagari_latin-ext-600.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
<link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/lato-v16-latin_latin-ext-700.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
<link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/poppins-v9-latin_devanagari_latin-ext-900italic.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
<link rel=\"prefetch\" href=\"/wp-content/plugins/sdstudio-page-speed-tolls/__FONTS/poppins-v9-latin_devanagari_latin-ext-700.woff2\" as=\"font\" type=\"font/woff2\" crossorigin=\"anonymous\">
-->

<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXHPDGK');</script>

<!-- End Google Tag Manager -->
";
}

//https://webkato.ru/vstavit-kod-posle-otkrytija-tega-body-v-wordpress-stalo-proshhe/
function webkato_google_tag_manager_after_body_open() {
	?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXHPDGK" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php
}
add_action( 'wp_body_open', 'webkato_google_tag_manager_after_body_open' );



function custom_admin_title( $admin_title ) {
    return str_replace( ' &#8212; WordPress', '', $admin_title );
}

add_filter( 'admin_title', 'custom_admin_title' );


// add_filter('autoptimize_filter_css_tagmedia','check_mediatype',10,2);
// function check_mediatype($media,$tag) {
  // if ( strpos($tag,"okab/bbpress-styles.css") !== false ) {
	// $media=array("screen");
	// print($tag);
  // }
  // return $media;
// }
