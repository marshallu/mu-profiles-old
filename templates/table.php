<?php
/**
 * Template part for displaying profiles as HTML Table.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mu-profiles
 */

?>
<div class="large-table">
	<table class="table table-striped table-bordered w-full">
		<thead>
			<tr class="">
				<th>Name</th>
				<th>Title</th>
				<th>Office</th>
				<?php
				if ( 'both' === get_field( 'profile_show_email_address', 'option' ) || get_field( 'listing' === 'profile_show_email_address', 'option' ) ) {
					?>
					<th>Phone</th>
				<?php } ?>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<tr class="">
					<td class="asf"><a href="<?php echo esc_url( get_post_permalink() ); ?>" rel="noopener noreferrer"><?php echo esc_attr( get_the_title() ); ?></a></td>
					<td class=""><?php the_field( 'employee_position' ); ?></td>
					<td class=""><?php the_field( 'employee_office_location' ); ?></td>
					<?php
					if ( 'both' === get_field( 'profile_show_email_address', 'option' ) || 'listing' === get_field( 'profile_show_email_address', 'option' ) ) {
						?>
							<td class=""><?php the_field( 'employee_phone_number' ); ?></td>
					<?php } ?>
					<td class=""><a href="mailto:<?php the_field( 'employee_email_address' ); ?>" rel="noopener noreferrer"><?php the_field( 'employee_email_address' ); ?></a></td>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</div>
