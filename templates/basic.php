<?php
/**
 * Template part for displaying profiles as Basic.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MU Profiles
 */

if ( is_page_template( array( 'page-full-width.php', 'page-full-width-hero.php', 'page-secondary-nav.php', 'page-secondary-classic.php', 'page-experience.php' ) ) ) {
	$width = ' lg:w-1/3 ';
} else {
	$width = ' lg:w-1/2 ';
}
?>
<div class="">
	<!-- <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Meet our leadership</h2> -->
	<div class="flex flex-wrap lg:-mx-6">
		<?php
		while ( have_posts() ) :
			the_post();
			$image = get_field( 'employee_headshot' );
			?>
			<div class="w-full <?php echo esc_attr( $width ); ?> lg:px-6 mb-8">
				<div class="flex flex-wrap flex-row lg:-mx-2">
					<div class="w-full lg:w-1/4 lg:px-2">
						<img class="object-cover rounded-lg" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
					</div>
					<div class="w-full lg:w-3/4 lg:px-2 mt-4 lg:mt-0">
						<div class="text-lg font-semibold space-y-1">
							<div><?php echo esc_attr( get_the_title() ); ?></div>
							<p class="text-gray-500"><?php the_field( 'employee_position' ); ?></p>
						</div>
						<div class="text-lg mt-1">
							<p class="text-gray-500"><?php the_field( 'employee_biography' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>
