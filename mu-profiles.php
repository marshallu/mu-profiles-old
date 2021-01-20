<?php
/**
 * MU Profiles
 *
 * This plugin was built to allow for Marshall University websites to display employee profiles.
 *
 * @package MU Profiles
 *
 * Plugin Name: MU Profiles
 * Plugin URI: https://www.marshall.edu
 * Description: A facutly, staff, employee management plugin for Marshall University
 * Version: 1.0
 * Author: Christopher McComas
 */

if ( ! class_exists( 'ACF' ) ) {
	return new WP_Error( 'broke', __( 'Advanced Custom Fields is required for this plugin.', 'my_textdomain' ) );
}

require plugin_dir_path( __FILE__ ) . '/shortcodes.php';
require plugin_dir_path( __FILE__ ) . '/editor.php';
require plugin_dir_path( __FILE__ ) . '/display-custom.php';

/**
 * Register a custom post type called "employee".
 *
 * @see get_post_type_labels() for label keys.
 */
function marsha_employee_post_type() {
	$labels = array(
		'name'                  => _x( 'Profiles', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Profile', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Profiles', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Profile', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Profile', 'textdomain' ),
		'new_item'              => __( 'New Profile', 'textdomain' ),
		'edit_item'             => __( 'Edit Profile', 'textdomain' ),
		'view_item'             => __( 'View Profile', 'textdomain' ),
		'all_items'             => __( 'All Profiles', 'textdomain' ),
		'search_items'          => __( 'Search Profiles', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Profiles:', 'textdomain' ),
		'not_found'             => __( 'No Profiles found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No Profiles found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Profile Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Profile archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into Profile', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Profile', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter Profiles list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Profiles list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Profiles list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'profile' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'custom-fields', 'page-attributes' ),
		'taxonomies'         => array( 'department' ),
		'menu_icon'          => 'dashicons-groups',
	);

	register_post_type( 'employee', $args );
}

/**
 * Add custom department taxonomy.
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_department_taxonomy() {

	$labels = array(
		'name'              => _x( 'Departments', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Department', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Departments', 'textdomain' ),
		'all_items'         => __( 'All Departments', 'textdomain' ),
		'parent_item'       => __( 'Parent Department', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Department:', 'textdomain' ),
		'edit_item'         => __( 'Edit Department', 'textdomain' ),
		'update_item'       => __( 'Update Department', 'textdomain' ),
		'add_new_item'      => __( 'Add New Department', 'textdomain' ),
		'new_item_name'     => __( 'New Department Name', 'textdomain' ),
		'menu_name'         => __( 'All Departments', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'directory' ),
	);

	register_taxonomy( 'department', array( 'employee' ), $args );

}

if ( function_exists( 'acf_add_options_sub_page' ) ) {
	acf_add_options_sub_page(
		array(
			'page_title'  => 'Display Settings',
			'menu_title'  => 'Display Settings',
			'menu_slug'   => 'profile-display-settings',
			'capability'  => 'manage_options',
			'parent_slug' => 'edit.php?post_type=employee',
			'redirect'    => false,
		)
	);
}

/**
 * Flush rewrites whenever the plugin is activated.
 */
function mu_profiles_activate() {
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'mu_profiles_activate' );

/**
 * Flush rewrites whenever the plugin is deactivated, also unregister 'employee' post type and 'department' taxonomy.
 */
function mu_profiles_deactivate() {
	unregister_post_type( 'employee' );
	unregister_taxonomy( 'department' );
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'mu_profiles_deactivate' );

/**
 * Load Employee Template
 *
 * @param string $template The filename of the template for a single employee.
 * @return string
 */
function load_employee_template( $template ) {
	global $post;

	if ( 'employee' === $post->post_type && locate_template( array( 'single-employee.php' ) ) !== $template ) {
		return plugin_dir_path( __FILE__ ) . 'templates/single-employee.php';
	}

	return $template;
}
add_filter( 'single_template', 'load_employee_template' );

/**
 * Load Department Template
 *
 * @param string $template The filename of the template for the Department taxonomy.
 * @return string
 */
function load_department_template( $template ) {
	global $post;

	if ( is_tax( 'department' ) && locate_template( array( 'taxonomy-department.php' ) ) !== $template ) {
		return plugin_dir_path( __FILE__ ) . 'templates/taxonomy-department.php';
	}

	return $template;
}
add_filter( 'template_include', 'load_department_template' );

add_action( 'init', 'marsha_employee_post_type' );
add_action( 'init', 'add_custom_department_taxonomy' );
