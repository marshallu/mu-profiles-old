<?php
/**
 * Template part for displaying profiles as Row.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MU Profiles
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
		<div class="columns w-full lg:w-1/6 lg:px-6 mt-6 lg:mt-0">
			<?php if ( get_field( 'employee_headshot' ) ) { ?>
				<img src="<?php echo esc_url( $image['sizes']['medium'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="mx-auto" />
			<?php } ?>
		</div>
		<div class="columns w-full lg:w-5/12 lg:px-6 mt-6 lg:mt-0">
			<?php
			if ( get_field( 'employee_more_info_link' ) ) {
				?>
					<strong><a href="<?php echo esc_url( get_field( 'employee_more_info_link' ) ); ?>" class="underline hover:no-underline"><?php the_title(); ?></a></strong><br>
				<?php
			} else {
				if ( get_field( 'department_hide_link_to_profile', $the_term ) ) {
					?>
						<strong><?php the_title(); ?></strong><br>
					<?php
				} else {
					?>
					<strong><a href="<?php echo esc_url( get_post_permalink() ); ?>" rel="noopener noreferrer" class="underline hover:no-underline"><?php the_title(); ?></a></strong><br>
					<?php
				}
				?>
				<?php
			}

			if ( get_field( 'employee_preferred_pronouns' ) ) {
				?>
				Preferred Pronouns: <?php echo esc_attr( get_field( 'employee_preferred_pronouns' ) ); ?><br>
				<?php
			}

			echo esc_attr( $position );
			?>
			<br>

			<?php if ( get_field( 'employee_office_location' ) ) { ?>
				Location: <?php echo esc_attr( $office ); ?><br>
			<?php } ?>

			<?php if ( get_field( 'employee_phone_number' ) ) { ?>
				Telephone: <a href="tel:+1-<?php echo esc_attr( mu_profiles_activate_format_phone( $phone ) ); ?>"><?php echo esc_attr( mu_profiles_activate_format_phone( $phone ) ); ?></a><br>
			<?php } ?>

			<?php if ( get_field( 'employee_email_address' ) && ( 'both' === get_field( 'profile_show_email_address', 'option' ) || 'listing' === get_field( 'profile_show_email_address', 'option' ) ) ) { ?>
				E-mail: <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_attr( $email ); ?></a>
			<?php } ?>
		</div>

		<div class="columns w-full lg:w-5/12 lg:px-6  mt-6 lg:mt-0">
		<?php
		if ( count( $contact_for ) ) {
			if ( ! empty( get_field( 'profile_row_title', 'option' ) ) ) {
				$row_title = get_field( 'profile_row_title', 'option' );
			} else {
				$row_title = 'Contact ' . get_the_title() . ' for:';
			}
			?>
			<strong><?php echo esc_attr( $row_title ); ?></strong>
			<ul>
				<?php
				foreach ( $contact_for as $item ) {
					?>
					<li><?php echo esc_html( $item['contact_text'] ); ?></li>
					<?php
				}
				?>
			</ul>
		<?php } ?>
		</div>
	</div>
<?php } ?>
