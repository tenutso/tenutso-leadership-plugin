<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/tenutso/tenutso-leadership
 * @since      1.0.0
 *
 * @package    Tenutso_Leadership_Plugin
 * @subpackage Tenutso_Leadership_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tenutso_Leadership_Plugin
 * @subpackage Tenutso_Leadership_Plugin/admin
 * @author     Tenutso <tenutso@yahoo.com>
 */
class Tenutso_Leadership_Plugin_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tenutso-leadership-plugin-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tenutso-leadership-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	public function register_post_types() {
	
		$labels = array(
			'name'                  => _x( 'Leadership', 'Post type general name', 'tenutso-leadership-plugin' ),
			'singular_name'         => _x( 'Profile', 'Post type singular name', 'tenutso-leadership-plugin' ),
			'menu_name'             => _x( 'Leadership', 'Admin Menu text', 'tenutso-leadership-plugin' ),
			'name_admin_bar'        => _x( 'Leadership', 'Add New on Toolbar', 'tenutso-leadership-plugin' ),
			'add_new'               => __( 'Add New', 'tenutso-leadership-plugin' ),
			'add_new_item'          => __( 'Add New Profile', 'tenutso-leadership-plugin' ),
			'new_item'              => __( 'New Profile', 'tenutso-leadership-plugin' ),
			'edit_item'             => __( 'Edit Profile', 'tenutso-leadership-plugin' ),
			'view_item'             => __( 'View Profile', 'tenutso-leadership-plugin' ),
			'all_items'             => __( 'All Profiles', 'tenutso-leadership-plugin' ),
			'search_items'          => __( 'Search Profiles', 'tenutso-leadership-plugin' ),
			'parent_item_colon'     => __( 'Parent Profiles:', 'tenutso-leadership-plugin' ),
			'not_found'             => __( 'No profiles found.', 'tenutso-leadership-plugin' ),
			'not_found_in_trash'    => __( 'No profiles found in Trash.', 'tenutso-leadership-plugin' ),
			'featured_image'        => _x( 'Profile Photo', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'tenutso-leadership-plugin' ),
			'set_featured_image'    => _x( 'Set profile image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'tenutso-leadership-plugin' ),
			'remove_featured_image' => _x( 'Remove profile image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'tenutso-leadership-plugin' ),
			'use_featured_image'    => _x( 'Use as profile image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'tenutso-leadership-plugin' ),
			'archives'              => _x( 'Profile archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'tenutso-leadership-plugin' ),
			'insert_into_item'      => _x( 'Insert into profile', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'tenutso-leadership-plugin' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this profile', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'tenutso-leadership-plugin' ),
			'filter_items_list'     => _x( 'Filter profiles list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'tenutso-leadership-plugin' ),
			'items_list_navigation' => _x( 'Profiles list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'tenutso-leadership-plugin' ),
			'items_list'            => _x( 'Profiles list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'tenutso-leadership-plugin' ),
		);
 
		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'directory' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon' 		 => 'dashicons-businessman',
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
		);
		
		
		register_post_type( 'leadership', $args );
		
		register_taxonomy(
			'leadership-group',
			'leadership',
			array(
				'label' => __( 'Groups' ),
				'rewrite' => array( 'slug' => 'group' ),
				'hierarchical' => true,
			)
		);
		
	}
	
	public function add_leadership_details_metabox() 
	{
		
		$terms = get_terms( array(
			'taxonomy'=>'leadership-group', 
			'hide_empty' => false
		) );
		
		// Create a metabox for each term
		foreach($terms as $term) {
		
			add_meta_box(
				'leadership-metabox-'. $term->term_id,
				__( $term->name, 'leadership' ),
				array($this, 'render_leadership_details_metabox'),
				'leadership', 
				'normal',
				'high',
				$term /* pass the term array to the render function */
			);
						
		}
		
	}
	
	
	public function render_leadership_details_metabox($post, $args) {
		
		//echo "<pre>"; print_r($term); echo "</pre>"; exit();
		
		global $post;
		$term = $args['args'];
		
		// generate a nonce field
		wp_nonce_field( basename( __FILE__ ), 'leadership-leadership-info-nonce' );
		
		$line1 = get_post_meta( $post->ID, 'leadership-line1-'. $term->term_id, true );
		$link1 = get_post_meta( $post->ID, 'leadership-link1-'. $term->term_id, true );
		$line2 = get_post_meta( $post->ID, 'leadership-line2-'. $term->term_id, true );
		$link2 = get_post_meta( $post->ID, 'leadership-link2-'. $term->term_id, true );
		$sort = get_post_meta( $post->ID, 'leadership-sort-'. $term->term_id, true );
		$permalink_override = get_post_meta( $post->ID, 'leadership-permalink-'. $term->term_id, true );					
		
		//echo "<pre>"; print_r($terms); echo "</pre>"; exit();
		?>
			
			<label for="leadership-line1-<?php echo $term->term_id;?>"><?php _e( 'Caption 1', 'leadership' ); ?></label>
			<input class="widefat leadership-line1-<?php echo $term->term_id;?>" id="leadership-line1-<?php echo $term->term_id;?>" type="text" name="leadership-line1-<?php echo $term->term_id;?>" placeholder="" value="<?php echo $line1;?>" />
			<br><br>
			<label for="leadership-line2-<?php echo $term->term_id;?>"><?php _e( 'Caption 2', 'leadership' ); ?></label>
			<input class="widefat leadership-line2-<?php echo $term->term_id;?>" id="leadership-line2-<?php echo $term->term_id;?>" type="text" name="leadership-line2-<?php echo $term->term_id;?>" placeholder="" value="<?php echo $line2;?>" />
			<br><br>
			<label for="leadership-sort-<?php echo $term->term_id;?>"><?php _e( 'Sort Key ', 'leadership' ); ?></label>
			<input class="widefat leadership-sort-<?php echo $term->term_id;?>" id="leadership-sort-<?php echo $term->term_id;?>" type="text" name="leadership-sort-<?php echo $term->term_id;?>" placeholder="" value="<?php echo $sort;?>" />
			<br><br>
			<label for="leadership-permalink-<?php echo $term->term_id;?>"><?php _e( 'Permalink Override', 'leadership' ); ?></label>
			<input class="widefat leadership-permalink-<?php echo $term->term_id;?>" id="leadership-permalink-<?php echo $term->term_id;?>" type="text" name="leadership-permalink-<?php echo $term->term_id;?>" placeholder="" value="<?php echo $permalink_override;?>" />
			<hr><br><br>
				
		<?php 
	}
	
	public function save_leadership_details( $post_id ) {
		
		$slug = 'leadership';
		
		// We don't want to hook into to all save post operations, only the leadership post type.
        if (isset($_POST['post_type'])) {
            if ($slug != $_POST['post_type']) {
                return;
            }
        }
		
		//echo "<pre>"; print_r($_POST); echo "</pre>"; exit();
		
		// checking for the 'save' status
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );
		$is_valid_nonce = ( isset( $_POST['leadership-leadership-info-nonce'] ) && ( wp_verify_nonce( $_POST['leadership-leadership-info-nonce'], basename( __FILE__ ) ) ) ) ? true : false;
		
		// exit depending on the save status or if the nonce is not valid
		if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
			return;
		}
		
		
		$terms = get_terms( array(
			'taxonomy'=>'leadership-group', 
			'hide_empty' => false
		) );
		
		//echo "<pre>"; print_r($terms); echo "</pre>"; exit();
		
		// loop through each leadership taxonomy group and save the details
		foreach ($terms as $term) {
			
			//echo "<pre>"; print_r($_POST); echo "</pre>"; exit();
			
			
			if ( isset( $_POST['leadership-line1-'. $term->term_id] ) ) {
				update_post_meta( $post_id, 'leadership-line1-'. $term->term_id, $_POST['leadership-line1-'. $term->term_id] );
			}
			if ( isset( $_POST['leadership-line2-'. $term->term_id] ) ) {
				update_post_meta( $post_id, 'leadership-line2-'. $term->term_id, $_POST['leadership-line2-'. $term->term_id] );
			}
			if ( isset( $_POST['leadership-sort-'. $term->term_id] ) ) {
				update_post_meta( $post_id, 'leadership-sort-'. $term->term_id, $_POST['leadership-sort-'. $term->term_id] );
			}
			if ( isset( $_POST['leadership-permalink-'. $term->term_id] ) ) {
				update_post_meta( $post_id, 'leadership-permalink-'. $term->term_id, $_POST['leadership-permalink-'. $term->term_id] );
			}			
		}		
	}
	
	public function leadership_columns_head($defaults) {
		$defaults['leadership_groups'] = 'Groups';
		
		return $defaults;
	}
	
	public function leadership_columns_content($column_name, $post_ID) {
		//echo print_r($column_name); exit();
		if ($column_name == 'leadership_groups') {
			$leadership_groups = wp_get_post_terms( $post_ID, 'leadership-group', array("fields" => "names") );
			if ($leadership_groups) {
				echo implode(', ', $leadership_groups);
			}
		}
	}
	
}
