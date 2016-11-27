<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/tenutso/tenutso-leadership
 * @since             1.0.0
 * @package           Tenutso_Leadership_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Tenuto's Leadership Plugin
 * Plugin URI:        https://github.com/tenutso/tenutso-leadership
 * Description:       Allows you to easily create and display multiple leadership lists using groups wheren individual can be assigned to multiple groups solving the problem of repetition. 
 * Version:           1.0.0
 * Author:            Tenutso
 * Author URI:        https://github.com/tenutso/tenutso-leadership
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tenutso-leadership-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tenutso-leadership-plugin-activator.php
 */
function activate_tenutso_leadership_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tenutso-leadership-plugin-activator.php';
	Tenutso_Leadership_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tenutso-leadership-plugin-deactivator.php
 */
function deactivate_tenutso_leadership_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tenutso-leadership-plugin-deactivator.php';
	Tenutso_Leadership_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tenutso_leadership_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_tenutso_leadership_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tenutso-leadership-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tenutso_leadership_plugin() {

	$plugin = new Tenutso_Leadership_Plugin();
	$plugin->run();

}
run_tenutso_leadership_plugin();
