<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/tenutso/tenutso-leadership
 * @since      1.0.0
 *
 * @package    Tenutso_Leadership_Plugin
 * @subpackage Tenutso_Leadership_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tenutso_Leadership_Plugin
 * @subpackage Tenutso_Leadership_Plugin/public
 * @author     Tenutso <tenutso@yahoo.com>
 */
class Tenutso_Leadership_Plugin_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tenutso_Leadership_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tenutso_Leadership_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tenutso-leadership-plugin-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . "-font-awesome", '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tenutso_Leadership_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tenutso_Leadership_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tenutso-leadership-plugin-public.js', array( 'jquery' ), $this->version, false );

	}
	
	public function include_template_function( $template_path ) {
		//print_r($template_path); exit();
		if ( get_post_type() == 'leadership' ) {
			
			$term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy') );
			
			if ( is_single() ) {
				// checks if template file exists in the theme folder first,
				// otherwise serve the template file from the plugin's template folder
				if ( $theme_file = locate_template( array ( 'leadership-'. $term->slug .'.php' ) ) ) {
					$template_path = $theme_file;
				}
				else if ( $theme_file = locate_template( array ( 'leadership-single-profile.php' ) ) ) {
					$template_path = $theme_file;
				}
				else {
					$template_path = plugin_dir_path( __FILE__ ) . 'templates/leadership-single-profile.php';
					//print_r($template_path); exit();
				}
			}
			if ( is_archive() ) {
				// checks if template file exists in the theme folder first,
				// otherwise serve the template file from the plugin's template folder
				if ( $theme_file = locate_template( array ( 'leadership-'. $term->slug .'.php' ) ) ) {
					$template_path = $theme_file;
				}
				else if ( $theme_file = locate_template( array ( 'leadership-archive-directory.php' ) ) ) {
					$template_path = $theme_file;
				}
				else {
					$template_path = plugin_dir_path( __FILE__ ) . 'templates/leadership-archive-directory.php';
					//print_r($template_path); exit();
				}
				
			}
			
		}
		return $template_path;	
	 
	}

}
