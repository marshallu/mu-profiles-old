<?php
/**
 * Shortcodes for the MU Profiles plugin
 *
 * @package MU Profiles
 */

/**
 * Shortcode to display Profile listings.
 *
 * @param array  $atts Shortcode attributes.
 * @param string $content Shortcode content.
 *
 * @return string Shortcode output.
 */
function mu_employee( $atts, $content = null ) {
	$data = shortcode_atts(
		array(
			'ids'        => false,
			'department' => false,
			'layout'     => false,
			'site'       => false,
		),
		$atts
	);

	if ( $data['site'] ) {
		switch_to_blog( get_id_from_blogname( $data['site'] ) );
	}

	if ( $data['ids'] ) {
		$ids = trim( $data['ids'] );
		$ids = array_map( 'trim', explode( ',', $ids ) );

		$args = array(
			'post__in'       => $ids,
			'post_type'      => 'employee',
			'posts_per_page' => -1,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
		);
	} else {

		$the_term     = false;
		$dept_listing = false;

		if ( get_field( 'sort_by_last_name_first_name', 'option' ) ) {
			$args = array(
				'post_type'      => 'employee',
				'posts_per_page' => -1,
				'meta_query'     => array(
					'first_name' => array(
						'key' => 'first_name',
					),
					'last_name'  => array(
						'key' => 'last_name',
					),
				),
				'orderby'        => array(
					'menu_order' => 'ASC',
					'last_name'  => 'ASC',
					'first_name' => 'ASC',
					'title'      => 'ASC',
				),
			);
		} else {
			$args = array(
				'post_type'      => 'employee',
				'posts_per_page' => -1,
				'orderby'        => array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				),
			);
		}

		if ( $data['department'] ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'department',
					'field'    => 'slug',
					'terms'    => $data['department'],
				),
			);

			$the_term     = get_term_by( 'slug', $data['department'], 'department' );
			$dept_listing = get_field( 'department_listing_display', $the_term );
		}
	}

	$the_query = new WP_Query( $args );

	if ( $data['layout'] ) {
		$display_style = $data['layout'];
	} elseif ( $dept_listing && 'inherit' !== $dept_listing ) {
		$display_style = $dept_listing;
	} elseif ( get_field( 'profile_listing_display', 'option' ) ) {
		$display_style = get_field( 'profile_listing_display', 'option' );
	} else {
		$display_style = 'table';
	}

	$output = '';

	if ( $the_query->have_posts() ) {

		if ( 'row' === $display_style ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$image       = get_field( 'employee_headshot' );
				$position    = get_field( 'employee_position' );
				$office      = get_field( 'employee_office_location' );
				$phone       = get_field( 'employee_phone_number' );
				$email       = get_field( 'employee_email_address' );
				$contact_for = get_field( 'employee_contact_for' );

				$output .= '<div class="marsha-row flex flex-wrap -mx-2 lg:-mx-6 py-6 border-b border-gray-100">';
				$output .= '<div class="columns w-full lg:w-1/6 lg:px-6 mt-6 lg:mt-0">';

				if ( get_field( 'employee_headshot' ) ) {
					$output .= '<img src="' . esc_url( $image['sizes']['medium'] ) . '" alt="' . esc_attr( $image['sizes']['medium'] ) . '" class="rounded-lg" />';
				}

				$output .= '</div>';

				$output .= '<div class="columns w-full lg:w-5/12 lg:px-6 mt-6 lg:mt-0">';

				if ( get_field( 'employee_more_info_link' ) ) {
					$output .= '<strong><a href="' . esc_url( get_field( 'employee_more_info_link' ) ) . '" class="underline hover:no-underline">' . get_the_title() . '</a></strong><br>';
				} else {
					if ( get_field( 'department_hide_link_to_profile', $the_term ) ) {
						$output .= '<strong>' . get_the_title() . '</strong><br>';
					} else {
						$output .= '<strong><a href="' . esc_url( get_post_permalink() ) . '" rel="noopener noreferrer" class="underline hover:no-underline">' . get_the_title() . '</a></strong><br>';
					}
				}

				$output .= $position . '<br>';

				if ( get_field( 'employee_office_location' ) ) {
					$output .= 'Location: ' . $office . '<br>';
				}

				if ( get_field( 'employee_phone_number' ) ) {
					$output .= 'Telephone: <a href="tel:+1-' . esc_attr( mu_profiles_activate_format_phone( $phone ) ) . '">' . esc_attr( mu_profiles_activate_format_phone( $phone ) ) . '</a><br>';
				}

				if ( get_field( 'employee_email_address' ) && ( 'both' === get_field( 'profile_show_email_address', 'option' ) || 'listing' === get_field( 'profile_show_email_address', 'option' ) ) ) {
					$output .= 'E-mail: <a href="mailto:' . esc_attr( $email ) . '">' . esc_attr( $email ) . '</a>';
				}

				$output .= '</div>';

				$output .= '<div class="columns w-full lg:w-5/12  lg:px-6   mt-6 lg:mt-0">';

				if ( $contact_for ) {
					if ( ! empty( get_field( 'profile_row_title', 'option' ) ) ) {
						$row_title = get_field( 'profile_row_title', 'option' );
					} else {
						$row_title = 'Contact ' . get_the_title() . ' for:';
					}

					$output .= '<strong>' . esc_attr( $row_title ) . '</strong>';
					$output .= '<ul>';

					foreach ( $contact_for as $item ) {
						$output .= '<li>' . esc_html( $item['contact_text'] ) . '</li>';
					}

					$output .= '</ul>';
				}
				$output .= '</div>';
				$output .= '</div>';
			}
		} elseif ( 'enhanced' === $display_style ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$image       = get_field( 'employee_headshot' );
				$position    = get_field( 'employee_position' );
				$office      = get_field( 'employee_office_location' );
				$phone       = get_field( 'employee_phone_number' );
				$email       = get_field( 'employee_email_address' );
				$contact_for = get_field( 'employee_contact_for' );

				$output .= '<div class="marsha-row flex flex-wrap -mx-2 lg:-mx-6 py-6 border-b border-gray-100">';
				$output .= '<div class="columns w-full lg:w-1/6 lg:px-6 mt-6 lg:mt-0">';
				if ( get_field( 'employee_headshot' ) ) {
					$output .= '<img src="' . esc_url( $image['sizes']['medium'] ) . '" alt="' . esc_url( $image['alt'] ) . '" class="rounded-lg" />';
				}
				$output .= '</div>';
				$output .= '<div class="columns w-full lg:w-3/4 lg:px-6 mt-6 lg:mt-0 entry-content">';

				if ( get_field( 'department_hide_link_to_profile', $the_term ) ) {
					$output .= '<div class="text-xl font-semibold uppercase">' . get_the_title() . '</a></div>';
				} else {
					$output .= '<div class="text-xl font-semibold uppercase"><a href="' . esc_url( get_post_permalink() ) . '">' . get_the_title() . '</a></div>';
				}

				if ( get_field( 'employee_preferred_pronouns' ) ) {
						$output .= '<div class="flex items-center my-2">Preferred Pronouns: ' . esc_attr( get_field( 'employee_preferred_pronouns' ) ) . '</div>';
				}

				$output .= '<div class="mt-3 mb-4">';
				if ( get_field( 'employee_position' ) ) {
					$output .= '<div class="font-semibold mb-1">' . $position . '</div>';
				}

				$output .= marsha_profile_department_listing( get_the_ID(), true );

				$output .= '</div>';
				if ( get_field( 'employee_office_location' ) ) {
					$output .= '<div class="flex items-center my-2">';
					$output .= '<svg class="text-gray-200 fill-current h-5 w-5 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg>';
					$output .= $office;
					$output .= '</div>';
				}
				if ( get_field( 'employee_phone_number' ) ) {
					$output .= '<div class="flex items-center my-2">';
					$output .= '<svg class="text-gray-200 fill-current h-5 w-5 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>';
					$output .= esc_attr( mu_profiles_activate_format_phone( $phone ) );
					$output .= '</div>';
				}
				if ( get_field( 'employee_email_address' ) && ( 'both' === get_field( 'profile_show_email_address', 'option' ) || 'profile' === get_field( 'profile_show_email_address', 'option' ) ) ) {
					$output .= '<div class="flex items-center my-2">';
					$output .= '<svg class="text-gray-200 fill-current h-5 w-5 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>';
					$output .= '<a href="mailto:' . esc_attr( $email ) . '">' . esc_attr( $email ) . '</a>';
					$output .= '</div>';
				}

				if ( get_field( 'employee_website' ) ) {
					$output .= '<div class="flex items-center my-2">';
					$output .= '<svg class="text-gray-200 fill-current h-5 w-5 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z"></path></svg>';
					$output .= '<a href="' . get_field( 'employee_website' ) . '">Visit Website</a>';
					$output .= '</div>';
				}

				$output .= '</div>';
				$output .= '</div>';
			}
		} elseif ( 'card' === $display_style ) {
			$output .= '<div class="flex flex-wrap mx-0 lg:-mx-4">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$image    = get_field( 'employee_headshot' );
				$position = get_field( 'employee_position' );
				$office   = get_field( 'employee_office_location' );
				$phone    = get_field( 'employee_phone_number' );
				$email    = get_field( 'employee_email_address' );

				$output .= '<div class="w-full lg:w-1/3 px-0 lg:px-4 mb-4 lg:mb-8 flex flex-row">';
				$output .= '<div class="w-full bg-gray-100 border border-gray-200 px-4 py-4">';

				if ( get_field( 'profile_link_to_profile', 'option' ) ) {
					$output .= '<div class="text-xl font-semibold"><a href="' . esc_url( get_post_permalink() ) . '">' . get_the_title() . '</a></div>';
				} else {
					$output .= '<div class="text-xl font-semibold">' . get_the_title() . '</div>';
				}

				$output .= '<div class="pt-3 flex justify-between">';
				$output .= '<div>';

				if ( get_field( 'employee_headshot' ) ) {
					$output .= '<img src="' . esc_url( $image['url'] ) . '" alt="' . esc_attr( $image['alt'] ) . '" class="w-24 rounded-lg" />';
				}
				$output .= '</div>';

				$output .= '<div class="flex-1 ml-4">';
				if ( get_field( 'employee_position' ) ) {
					$output .= '<div class="font-semibold">' . get_field( 'employee_position' ) . '</div>';
				}

				if ( get_field( 'employee_office_location' ) ) {
					$output .= '<div>Office: ' . get_field( 'employee_office_location' ) . '</div>';
				}

				if ( get_field( 'employee_phone_number' ) ) {
					$output .= '<div>Phone: ' . ( mu_profiles_activate_format_phone( get_field( 'employee_phone_number' ) ) ) . '</div>';
				}

				if ( get_field( 'employee_email_address' ) && ( 'both' === get_field( 'profile_show_email_address', 'option' ) || 'listing' === get_field( 'profile_show_email_address', 'option' ) ) ) {
					$output .= '<div class="hidden xl:block"><a href="mailto:' . get_field( 'employee_email_address' ) . '">' . get_field( 'employee_email_address' ) . '</a></div>';
					$output .= '<div class="block xl:hidden"><a href="mailto:' . get_field( 'employee_email_address' ) . '">Email</a></div>';
				}

				if ( get_field( 'employee_website' ) ) {
					$output .= '<div><a href="' . get_field( 'employee_website' ) . '">Visit Website</a></div>';
				}
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
			}
			$output .= '</div>';
		} elseif ( 'basic' === $display_style ) {
			if ( is_page_template( array( 'page-full-width.php', 'page-full-width-hero.php', 'page-secondary-nav.php', 'page-secondary-classic.php', 'page-experience.php' ) ) ) {
				$width = ' lg:w-1/3 ';
			} else {
				$width = ' lg:w-1/2 ';
			}
			$output .= '<div class="">';
			$output .= '<div class="flex flex-wrap lg:-mx-6">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$image = get_field( 'employee_headshot' );

				$output .= '<div class="w-full ' . esc_attr( $width ) . ' lg:px-6 mb-8">';
				$output .= '<div class="flex flex-wrap flex-row lg:-mx-2">';
				$output .= '<div class="w-full lg:w-1/4 lg:px-2">';
				$output .= '<img class="object-cover rounded-lg" src="' . esc_url( $image['url'] ) . '" alt="' . esc_attr( $image['alt'] ) . '" />';
				$output .= '</div>';
				$output .= '<div class="w-full lg:w-3/4 lg:px-2 mt-4 lg:mt-0">';
				$output .= '<div class="text-lg font-semibold space-y-1">';
				$output .= '<div>' . get_the_title() . '</div>';
				$output .= '<p class="text-gray-500">' . get_field( 'employee_position' ) . '</p>';
				$output .= '</div>';
				$output .= '<div class="text-lg mt-1">';
				$output .= '<p class="text-gray-500">' . get_field( 'employee_biography' ) . '</p>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';

			}
			$output .= '</div>';
			$output .= '</div>';
		} elseif ( 'full-profile' === $display_style ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$image       = get_field( 'employee_headshot' );
				$position    = get_field( 'employee_position' );
				$office      = get_field( 'employee_office_location' );
				$phone       = get_field( 'employee_phone_number' );
				$email       = get_field( 'employee_email_address' );
				$contact_for = get_field( 'employee_contact_for' );

				$output .= '<div class="marsha-row flex flex-wrap -mx-2 lg:-mx-6 py-6 border-b border-gray-100">';
				$output .= '<div class="columns w-full lg:w-1/6 lg:px-6 mt-6 lg:mt-0">';
				if ( get_field( 'employee_headshot' ) ) {
					$output .= '<img src="' . esc_url( $image['sizes']['medium'] ) . '" alt="' . esc_url( $image['alt'] ) . '" class="rounded-lg" />';
				}
				$output .= '</div>';
				$output .= '<div class="columns w-full lg:w-3/4 lg:px-6 mt-6 lg:mt-0 entry-content">';

				if ( get_field( 'department_hide_link_to_profile', $the_term ) ) {
					$output .= '<div class="text-xl font-semibold uppercase">' . get_the_title() . '</a></div>';
				} else {
					$output .= '<div class="text-xl font-semibold uppercase"><a href="' . esc_url( get_post_permalink() ) . '">' . get_the_title() . '</a></div>';
				}

				$output .= '<div class="mt-3 mb-4">';
				if ( get_field( 'employee_position' ) ) {
					$output .= '<div class="font-semibold mb-1">' . $position . '</div>';
				}

				$output .= marsha_profile_department_listing( get_the_ID(), true );

				$output .= '</div>';
				if ( get_field( 'employee_office_location' ) ) {
					$output .= '<div class="flex items-center my-2">';
					$output .= '<svg class="text-gray-200 fill-current h-5 w-5 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg>';
					$output .= $office;
					$output .= '</div>';
				}
				if ( get_field( 'employee_phone_number' ) ) {
					$output .= '<div class="flex items-center my-2">';
					$output .= '<svg class="text-gray-200 fill-current h-5 w-5 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>';
					$output .= mu_profiles_activate_format_phone( $phone );
					$output .= '</div>';
				}
				if ( get_field( 'employee_email_address' ) && ( 'both' === get_field( 'profile_show_email_address', 'option' ) || 'profile' === get_field( 'profile_show_email_address', 'option' ) ) ) {
					$output .= '<div class="flex items-center my-2">';
					$output .= '<svg class="text-gray-200 fill-current h-5 w-5 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>';
					$output .= '<a href="mailto:' . esc_attr( $email ) . '">' . esc_attr( $email ) . '</a>';
					$output .= '</div>';
				}
				$output .= '<div class="mt-6">' . get_field( 'employee_biography' ) . '</div>';
				$output .= '</div>';
				$output .= '</div>';
			}
		} else {
			$output .= '<div class="large-table">';
			$output .= '<table class="table table-striped table-bordered w-full">';
			$output .= '<thead>';
			$output .= '<tr class="">';
			$output .= '<th>Name</th>';
			$output .= '<th>Title</th>';
			$output .= '<th>Office</th>';
			$output .= '<th>Phone</th>';
			if ( 'both' === get_field( 'profile_show_email_address', 'option' ) || 'profile' === get_field( 'profile_show_email_address', 'option' ) ) {
				$output .= '<th>Email</th>';
			}
			$output .= '</tr>';
			$output .= '</thead>';
			$output .= '<tbody>';

			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$position = get_field( 'employee_position' );
				$office   = get_field( 'employee_office_location' );
				$phone    = get_field( 'employee_phone_number' );
				$email    = get_field( 'employee_email_address' );

				$output .= '<tr class="">';

				if ( get_field( 'department_hide_link_to_profile', $the_term ) ) {
					$output .= '<td class="">' . esc_attr( get_the_title() ) . '</td>';
				} else {
					$output .= '<td class=""><a href="' . esc_url( get_post_permalink() ) . '" rel="noopener noreferrer">' . esc_attr( get_the_title() ) . '</a></td>';
				}

				$output .= '<td class="">' . $position . '</td>';
				$output .= '<td class="">' . $office . '</td>';
				$output .= '<td class="whitespace-nowrap">' . esc_attr( mu_profiles_activate_format_phone( $phone ) ) . '</td>';
				if ( 'both' === get_field( 'profile_show_email_address', 'option' ) || 'profile' === get_field( 'profile_show_email_address', 'option' ) ) {
					$output .= '<td class="whitespace-nowrap"><a href="mailto:' . esc_attr( $email ) . '" rel="noopener noreferrer">' . esc_attr( $email ) . '</a></td>';
				}

				$output .= '</tr>';
			}

			$output .= '</tbody>';
			$output .= '</table>';
			$output .= '</div>';
		}
	} else {
		$output = 'No profiles found for this category.';
	}

	if ( $data['site'] ) {
		restore_current_blog();
	}
	wp_reset_postdata();
	return $output;
}
add_shortcode( 'mu_employee', 'mu_employee' );
add_shortcode( 'mu_profiles', 'mu_employee' );
add_shortcode( 'mu_profile', 'mu_employee' );
