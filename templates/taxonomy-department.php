<?php
/**
 * Default template for displaying Department listings
 *
 * @package MU Profiles
 */

get_header();

require get_template_directory() . '/template-parts/hero/no-hero.php';
?>

<div class="w-full xl:max-w-screen-xl px-6 xl:px-0 xl:mx-auto pt-4 lg:pt-12 pb-16">
	<div class="flex flex-wrap mx-0 lg:-mx-6 px-0">
		<div  class="w-full lg:w-3/4 lg:px-6">
			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				$the_term = get_queried_object();

				if ( get_field( 'department_custom_title', $the_term ) ) {
					echo '<h1 class="entry-title font-sans uppercase font-semibold text-gray-700 mb-4 text-3xl lg:text-4xl">' . esc_attr( get_field( 'department_custom_title', $the_term ) ) . '</h1>';
				} else {
					the_archive_title( '<h1 class="entry-title font-sans uppercase font-semibold text-gray-700 mb-4 text-3xl lg:text-4xl">', '</h1>' );
				}
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
				<?php

				$dept_listing = get_field( 'department_listing_display', $the_term );

				if ( 'row' === $dept_listing ) {
					include plugin_dir_path( __FILE__ ) . '/row.php';
				} elseif ( 'enhanced' === $dept_listing ) {
					include plugin_dir_path( __FILE__ ) . '/enhanced.php';
				} elseif ( 'table' === $dept_listing ) {
					include plugin_dir_path( __FILE__ ) . '/table.php';
				} elseif ( 'full-profile' === $dept_listing ) {
					include plugin_dir_path( __FILE__ ) . '/full-profile.php';
				} elseif ( 'card' === $dept_listing ) {
					include plugin_dir_path( __FILE__ ) . '/card.php';
				} elseif ( 'basic' === $dept_listing ) {
					include plugin_dir_path( __FILE__ ) . '/basic.php';
				} else {
					if ( 'row' === get_field( 'profile_listing_display', 'option' ) ) {
						include plugin_dir_path( __FILE__ ) . '/row.php';
					} elseif ( 'enhanced' === get_field( 'profile_listing_display', 'option' ) ) {
						include plugin_dir_path( __FILE__ ) . '/enhanced.php';
					} elseif ( 'full-profile' === get_field( 'profile_listing_display', 'option' ) ) {
						include plugin_dir_path( __FILE__ ) . '/full-profile.php';
					} elseif ( 'card' === get_field( 'profile_listing_display', 'option' ) ) {
						include plugin_dir_path( __FILE__ ) . '/card.php';
					} elseif ( 'basic' === get_field( 'profile_listing_display', 'option' ) ) {
						include plugin_dir_path( __FILE__ ) . '/basic.php';
					} else {
						include plugin_dir_path( __FILE__ ) . '/table.php';
					}
				}

				endif;
			?>
		</div>
		<div class="w-full lg:w-1/4 lg:px-6 mt-6 lg:mt-0">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</div>
</div>

<!-- Footer -->
<?php get_footer(); ?>
