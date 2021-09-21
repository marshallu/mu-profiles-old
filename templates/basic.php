<?php
/**
 * Template part for displaying profiles as Basic.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MU Profiles
 */

?>
<div class="bg-white">
	<div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
		<div class="space-y-12">
			<!-- <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Meet our leadership</h2> -->
			<div class="flex flex-wrap lg:-mx-6">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<div class="w-full lg:w-1/2 lg:px-6 mb-8">
						<div class="flex flex-wrap flex-row lg:-mx-2">
							<div class="w-full lg:w-1/4 lg:px-2">
								<img class="object-cover shadow-sm rounded-lg" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
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
	</div>
</div>
