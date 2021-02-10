<?php
/**
 * Customization of the editor for Profile and Department
 *
 * @package mu-profiles
 */

/**
 * Remove YoastSEO metaboxes from Profiles
 */
function remove_yoast_metabox_employees() {
	remove_meta_box( 'wpseo_meta', 'employee', 'normal' );
}
add_action( 'add_meta_boxes', 'remove_yoast_metabox_employees', 11 );

/**
 * Remove Date, Last Modified, and Yoast SEO Columns from Profile listing page
 *
 * @param type $columns Default WordPress post columns.
 */
function set_custom_edit_employee_columns( $columns ) {

	if ( ! is_super_admin() ) {
		unset( $columns['date'] );
		unset( $columns['modified'] );
	}

	unset( $columns['wpseo-score'] );
	unset( $columns['wpseo-score-readability'] );
	unset( $columns['wpseo-title'] );
	unset( $columns['wpseo-metadesc'] );
	unset( $columns['wpseo-focuskw'] );
	unset( $columns['wpseo-links'] );
	unset( $columns['wpseo-linked'] );
	$columns['title'] = __( 'Name', 'textdomain' );
	return $columns;
}
add_filter( 'manage_employee_posts_columns', 'set_custom_edit_employee_columns' );

add_filter( 'manage_edit-employee_sortable_columns', 'mu_add_custom_column_make_sortable' );

/**
 * Change placeholder text on Create/Edit Profile page to 'Enter Name Here'
 *
 * @param string $title Current Post title.
 */
function change_default_title_to_name( $title ) {
	$screen = get_current_screen();

	if ( 'employee' === $screen->post_type ) {
		return 'Enter Name Here';
	}
}
add_filter( 'enter_title_here', 'change_default_title_to_name' );
