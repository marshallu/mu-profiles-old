<?php

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5f591b3bb909c',
		'title' => 'Employee',
		'fields' => array(
			array(
				'key' => 'field_5f592a22e90f6',
				'label' => 'Headshot',
				'name' => 'employee_headshot',
				'type' => 'image',
				'instructions' => 'The headshot file size should be no larger than 1MB.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'full',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => 1,
				'mime_types' => 'jpg',
			),
			array(
				'key' => 'field_5f5a2ce9645f5',
				'label' => 'Office Location',
				'name' => 'employee_office_location',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5f5fb385b2150',
				'label' => 'Office Campus',
				'name' => 'employee_office_campus',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'Huntington' => 'Huntington',
					'South Charleston' => 'South Charleston',
				),
				'default_value' => 'Huntington',
				'allow_null' => 1,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5f592355b12ff',
				'label' => 'Position',
				'name' => 'employee_position',
				'type' => 'text',
				'instructions' => '',
				'required' => 1,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5f59235e2c433',
				'label' => 'Email Address',
				'name' => 'employee_email_address',
				'type' => 'email',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => 'w-full lg:w-1/3',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array(
				'key' => 'field_5f592367d5e18',
				'label' => 'Website',
				'name' => 'employee_website',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => 'w-full lg:w-1/3',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			array(
				'key' => 'field_5f5923751ebf5',
				'label' => 'Phone Number',
				'name' => 'employee_phone_number',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => 'w-full lg:w-1/3',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5f5924737ea31',
				'label' => 'Facebook',
				'name' => 'employee_facebook',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			array(
				'key' => 'field_5f59247a49615',
				'label' => 'Twitter',
				'name' => 'employee_twitter',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			array(
				'key' => 'field_5f5924808c637',
				'label' => 'LinkedIn',
				'name' => 'employee_linkedin',
				'type' => 'url',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
			),
			array(
				'key' => 'field_5f592a7845477',
				'label' => 'Biography',
				'name' => 'employee_biography',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'basic',
				'media_upload' => 0,
				'delay' => 0,
			),
			array(
				'key' => 'field_5f71d368f7df4',
				'label' => 'Teaching Philosophy',
				'name' => 'employee_teaching_philosophy',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'basic',
				'media_upload' => 0,
				'delay' => 0,
			),
			array(
				'key' => 'field_5f5924c9d7b58',
				'label' => 'Education',
				'name' => 'employee_education',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add Education Entry',
				'sub_fields' => array(
					array(
						'key' => 'field_5f5924dcd7b59',
						'label' => 'Education Information',
						'name' => 'education_information',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f5924f5e1f8f',
				'label' => 'Awards',
				'name' => 'employee_awards',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add Award',
				'sub_fields' => array(
					array(
						'key' => 'field_5f59250de1f90',
						'label' => 'Award Information',
						'name' => 'award_information',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f5928c687deb',
				'label' => 'Scholarship',
				'name' => 'employee_scholarship',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add Scholarship Item',
				'sub_fields' => array(
					array(
						'key' => 'field_5f5928c687dec',
						'label' => 'Scholarship Information',
						'name' => 'scholarship_information',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f5928e1e62d1',
				'label' => 'Contracts, Grants, and Sponsored Research',
				'name' => 'employee_research',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add Research Item',
				'sub_fields' => array(
					array(
						'key' => 'field_5f5928f6e62d2',
						'label' => 'Contracts, Grants, and Sponsored Research Item',
						'name' => 'research_item',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f592925412e2',
				'label' => 'Conference Presentations',
				'name' => 'employee_conferences',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add Conference Presentation',
				'sub_fields' => array(
					array(
						'key' => 'field_5f592936412e3',
						'label' => 'Conference Information',
						'name' => 'conference_information',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f71d1f0ee787',
				'label' => 'Service to the Department',
				'name' => 'employee_department_service',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add Department Service Item',
				'sub_fields' => array(
					array(
						'key' => 'field_5f71d1f0ee788',
						'label' => 'Service Information',
						'name' => 'service_information',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f5929473a04c',
				'label' => 'Service to the College',
				'name' => 'employee_college_service',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add College Service Item',
				'sub_fields' => array(
					array(
						'key' => 'field_5f59295b3a04d',
						'label' => 'Service Information',
						'name' => 'service_information',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f592973b9e02',
				'label' => 'Service to the University',
				'name' => 'employee_university_service',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add University Service Item',
				'sub_fields' => array(
					array(
						'key' => 'field_5f592973b9e03',
						'label' => 'Service Information',
						'name' => 'service_information',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f592988a5d79',
				'label' => 'Service to the Profession',
				'name' => 'employee_service_profession',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add Profession Service Item',
				'sub_fields' => array(
					array(
						'key' => 'field_5f592998a5d7a',
						'label' => 'Service Information',
						'name' => 'service_information',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f5929deff949',
				'label' => 'Service to the Community',
				'name' => 'employee_service_community',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add Community Service Item',
				'sub_fields' => array(
					array(
						'key' => 'field_5f5929deff94a',
						'label' => 'Service Information',
						'name' => 'service_information',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f5a5bb9b4f85',
				'label' => 'Contact For',
				'name' => 'employee_contact_for',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => 'Add Contact For Item',
				'sub_fields' => array(
					array(
						'key' => 'field_5f5a5bc5b4f86',
						'label' => 'Contact Text',
						'name' => 'contact_text',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5f5f5f1139913',
				'label' => 'CV/Resume',
				'name' => 'employee_cvresume',
				'type' => 'file',
				'instructions' => 'You may upload a PDF version of your cv/resume.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'library' => 'all',
				'min_size' => '',
				'max_size' => '',
				'mime_types' => 'pdf',
			),
			array(
				'key' => 'field_5f71d3c4f7df5',
				'label' => 'Lists',
				'name' => 'employee_lists',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'table',
				'button_label' => 'Add List',
				'sub_fields' => array(
					array(
						'key' => 'field_5f71d60c0098b',
						'label' => 'List Title',
						'name' => 'list_title',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5f71d424f7df6',
						'label' => 'List Item',
						'name' => 'employee_list_item',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => '',
						'min' => 0,
						'max' => 0,
						'layout' => 'table',
						'button_label' => 'Add List Item',
						'sub_fields' => array(
							array(
								'key' => 'field_5f71d5c6606b2',
								'label' => 'List Item',
								'name' => 'list_item_detail',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
						),
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'employee',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'field',
		'hide_on_screen' => array(
			0 => 'excerpt',
			1 => 'discussion',
			2 => 'comments',
			3 => 'revisions',
			4 => 'author',
			5 => 'categories',
			6 => 'tags',
			7 => 'send-trackbacks',
		),
		'active' => true,
		'description' => '',
	));

	acf_add_local_field_group(array(
		'key' => 'group_5fda17ea665f8',
		'title' => 'Profile Departments Meta',
		'fields' => array(
			array(
				'key' => 'field_5fda1809c81fa',
				'label' => 'Listing Display',
				'name' => 'department_listing_display',
				'type' => 'select',
				'instructions' => 'Inherit will use the default setting for the site.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'inherit' => 'Inherit',
					'table' => 'Table',
					'row' => 'Row',
					'enhanced' => 'Enhanced',
				),
				'default_value' => 'inherit',
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5fff27c858618',
				'label' => 'Display Link',
				'name' => 'department_display_link',
				'type' => 'true_false',
				'instructions' => 'If turned off the department will not display on any of the listings or profile pages.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 1,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'department',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

	acf_add_local_field_group(array(
		'key' => 'group_5f5a670b426b6',
		'title' => 'Profile Display Settings',
		'fields' => array(
			array(
				'key' => 'field_5f5a67199170c',
				'label' => 'Show Email Address',
				'name' => 'profile_show_email_address',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'both' => 'Department Listing and Profile Page',
					'listing' => 'Department Listing Only',
					'profile' => 'Profile Page Only',
					'none' => 'Neither',
				),
				'default_value' => 'both',
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5f622f21a96e2',
				'label' => 'Listing Display',
				'name' => 'profile_listing_display',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'table' => 'Table',
					'row' => 'Row',
					'enhanced' => 'Enhanced',
				),
				'default_value' => 'table',
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_600f05e7ff04b',
				'label' => 'Row Title',
				'name' => 'profile_row_title',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_600f395bbf760',
				'label' => 'Row Display Link to Profiles',
				'name' => 'profile_row_display_link_to_profiles',
				'type' => 'true_false',
				'instructions' => 'If checked this will display a link to individuals\' Profile pages from Row Display Listing',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_601325f95f478',
				'label' => 'Hide "Profile"',
				'name' => 'hide_profile',
				'type' => 'true_false',
				'instructions' => 'If selected this will hide the word "Profile" in the header on Profile pages.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'profile-display-settings',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

	endif;
