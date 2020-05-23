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
 * Version:           1.0.1
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


/**
 * Имя и версия плагина
 */
if( !function_exists('get_plugin_data') ){
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
add_action('admin_init', 'SDStudioPluginName_sdstudio_page_speed_tolls' );
function SDStudioPluginName_sdstudio_page_speed_tolls(){
    $data = get_plugin_data(__FILE__);
    return $data['Name']; // выведет название плагина
}
add_action('admin_init', 'SDStudioPluginVersion_sdstudio_page_speed_tolls' );
function SDStudioPluginVersion_sdstudio_page_speed_tolls(){
    $data = get_plugin_data(__FILE__);
    return  $data['Version']; // выведет название плагина
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

    require_once plugin_dir_path( __FILE__ ) . '_WORKER.php';
//    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_FILE_TYPES_SUPPORT.php';
    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_ELEMENTOR.php';
    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_DEREGISTER_STYLES.php';
//    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_PRELOADER_FONTS_and_FILES.php';
//    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_GOOGLE_TAG_MANAGER.php';
    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_WEBP.php';
//    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_custom_admin_title.php';
//    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_Font_Awesome.php';
    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_PLUGIN_Popus.php';
    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_PLUGIN_Highlight_and_Share.php';
    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_THEMES_FIXs__ASTRA.php';
    require_once plugin_dir_path( __FILE__ ) . '_SDStudio_THEMES_FIXs__SAXON.php';


}
run_sdstudio_page_speed_tolls();