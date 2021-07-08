<?php
/**
 * Customization of the editor for Profile and Department
 *
 * @package MU Profiles
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
	$columns['title'] = __( 'Name', 'mu-profiles' );
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

function mu_profiles_modify_title( $data ) {
	if ( $data['post_type'] == 'employee' && ( $_POST['acf']['field_60d9fadc1cb1d'] && $_POST['acf']['field_60d9faf11cb1f'] ) ) { // If the actual field name of the rating date is different, you'll have to update this.
		$employee_title  = $_POST['acf']['field_60d9fb1ad119e'];
		$employee_first  = $_POST['acf']['field_60d9fadc1cb1d'];
		$employee_middle = $_POST['acf']['field_60d9fae71cb1e'];
		$employee_last   = $_POST['acf']['field_60d9faf11cb1f'];

		$full_name = '';

		if ( $employee_title ) {
			$full_name .= $employee_title . ' ';
		}

		$full_name .= $employee_first . ' ';

		if ( $employee_middle ) {
			$full_name .= $employee_middle . ' ';
		}

		$full_name .= $employee_last;

		$data['post_title'] = trim( $full_name );
	}
	return $data; // Returns the modified data.
}
add_filter( 'wp_insert_post_data', 'mu_profiles_modify_title', '99', 1 ); // Grabs the inserted post data so you can modify it.
