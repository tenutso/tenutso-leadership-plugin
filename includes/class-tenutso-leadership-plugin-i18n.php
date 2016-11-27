<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/tenutso/tenutso-leadership
 * @since      1.0.0
 *
 * @package    Tenutso_Leadership_Plugin
 * @subpackage Tenutso_Leadership_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Tenutso_Leadership_Plugin
 * @subpackage Tenutso_Leadership_Plugin/includes
 * @author     Tenutso <tenutso@yahoo.com>
 */
class Tenutso_Leadership_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'tenutso-leadership-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
