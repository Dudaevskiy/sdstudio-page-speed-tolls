<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://sdstudio.top
 * @since      1.0.0
 *
 * @package    Sdstudio_Page_Speed_Tolls
 * @subpackage Sdstudio_Page_Speed_Tolls/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Sdstudio_Page_Speed_Tolls
 * @subpackage Sdstudio_Page_Speed_Tolls/includes
 * @author     Serhii Dudchenko <sergeydydchenko@gmail.com>
 */
class Sdstudio_Page_Speed_Tolls_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'sdstudio-page-speed-tolls',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
