<?php
/**
 * Template part for displaying profiles as Row.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mu-profiles
 */

while ( have_posts() ) {
	the_post();

	$image       = get_field( 'employee_headshot' );
	$position    = get_field( 'employee_position' );
	$office      = get_field( 'employee_office_location' );
	$phone       = get_field( 'employee_phone_number' );
	$email       = get_field( 'employee_email_address' );
	$contact_for = get_field( 'employee_contact_for' );

	?>
	<div class="marsha-row flex flex-wrap -mx-2 lg:-mx-6 py-6 border-b border-gray-100">
		<div class="columns small-12 medium-12 large-2 lg:px-6 mt-6 lg:mt-0">
			<?php if ( get_field( 'employee_headshot' ) ) { ?>
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
			<?php } ?>
		</div>
		<div class="columns small-12 medium-12 large-5 lg:px-6 mt-6 lg:mt-0">
			<strong><?php the_title(); ?></strong><br>

			<?php echo esc_attr( $position ); ?><br>

			<?php if ( get_field( 'employee_office_location' ) ) { ?>
				Location: <?php echo esc_attr( $office ); ?><br>
			<?php } ?>

			<?php if ( get_field( 'employee_phone_number' ) ) { ?>
				Telephone: <a href="tel:+1-<?php echo esc_attr( $phone ); ?>"><?php echo esc_attr( $phone ); ?></a><br>
			<?php } ?>

			<?php if ( get_field( 'employee_email_address' ) && ( 'both' === get_field( 'profile_show_email_address', 'option' ) || 'listing' === get_field( 'profile_show_email_address', 'option' ) ) ) { ?>
				E-mail: <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_attr( $email ); ?></a>
			<?php } ?>
		</div>

		<div class="columns small-12 medium-12 large-5  lg:px-6   mt-6 lg:mt-0">
		<?php
		if ( ! empty( get_field( 'profile_row_title', 'option' ) ) ) {
			?>
			<strong><?php echo esc_attr( get_field( 'profile_row_title', 'option' ) ); ?></strong>
		<?php } else { ?>
			<strong>Contact <?php esc_attr( get_the_title() ); ?> for:</strong>
			<?php
		}
		?>

			<ul>
				<?php
				if ( $contact_for ) {
					foreach ( $contact_for as $item ) {
						?>
						<li><?php echo esc_html( $item['contact_text'] ); ?></li>
						<?php
					}
				}
				?>
			</ul>
		</div>
	</div>
<?php } ?>
