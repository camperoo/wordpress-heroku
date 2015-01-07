<?php
/**
 * Beardy Theme Customizer
 *
 * @package Beardy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rey_customize_register( $wp_customize ) {
	require get_template_directory() . '/inc/customizer-classes.php';
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->add_setting( 'image_logo' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'logo', 
		array(
			'label'      => __( 'Upload a logo', 'rey' ),
			'section'    => 'title_tagline',
			'settings'   => 'image_logo',
			'priority' => 20
		)
	));
	$wp_customize->add_setting( 'retina_image_logo' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'retina_image_logo', 
		array(
			'label'      => __( 'Upload a logo for Retina', 'rey' ),
			'section'    => 'title_tagline',
			'settings'   => 'retina_image_logo',
			'priority' => 25
		)
	));
	$wp_customize->add_setting( 'header_image' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'header_image', 
		array(
			'label'      => __( 'Upload a Header Image', 'rey' ),
			'section'    => 'title_tagline',
			'settings'   => 'header_image',
			'priority' => 30
		)
	));
	$wp_customize->add_setting( 'favicon_image' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'favicon_image', 
		array(
			'label'      => __( 'Upload a Favicon Image', 'rey' ),
			'section'    => 'title_tagline',
			'settings'   => 'favicon_image',
			'priority' => 35
		)
	));
	$wp_customize->add_setting( 'toggle_sticky_header' , array(  'type' => 'option', 'sanitize_callback' => 'wp_kses_post', 'default' => 0 ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'toggle_sticky_header', 
		array(
			'label'      => __( 'Disable Sticky Header', 'rey' ),
			'section'    => 'title_tagline',
			'settings'   => 'toggle_sticky_header',
			'type'           => 'checkbox',
			'priority' => 1
		)
	));
	$wp_customize->add_setting( 'header_top_margin' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '80px' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'header_top_margin', 
		array(
			'label'      => __( 'Space above site title or logo', 'rey' ),
			'section'    => 'title_tagline',
			'settings'   => 'header_top_margin',
			'priority' => 40
		)
	));
	$wp_customize->add_setting( 'header_bottom_margin' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '80px' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'header_bottom_margin', 
		array(
			'label'      => __( 'Space bellow site title or logo', 'rey' ),
			'section'    => 'title_tagline',
			'settings'   => 'header_bottom_margin',
			'priority' => 41
		)
	));
	$wp_customize->add_setting( 'site_title_size' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '52px' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'site_title_size', 
		array(
			'label'      => __( 'Site Title Font Size', 'rey' ),
			'section'    => 'title_tagline',
			'settings'   => 'site_title_size',
			'priority' => 50
		)
	));
	$wp_customize->add_setting( 'toggle_title_back' , array(  'type' => 'option', 'sanitize_callback' => 'wp_kses_post', 'default' => 0 ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'toggle_title_back', 
		array(
			'label'      => __( 'Hide Site Title White Background', 'rey' ),
			'section'    => 'title_tagline',
			'settings'   => 'toggle_title_back',
			'type'           => 'checkbox',
			'priority' => 53
		)
	));
	$wp_customize->add_setting( 'big_title_size' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '50px' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'big_title_size', 
		array(
			'label'      => __( 'Big Titles Font Size', 'rey' ),
			'section'    => 'title_tagline',
			'settings'   => 'big_title_size',
			'priority' => 56
		)
	));


	//   H O M E  F E A T U R E D  P O S T S

	$wp_customize->add_section( 'home_featured' , array(
		'title'      => __( 'Home Featured Posts', 'rey' ),
		'priority'   => 21,
	) );	

	$wp_customize->add_setting( 'toggle_home_featured' , array(  'type' => 'option', 'sanitize_callback' => 'wp_kses_post', 'default' => 0 ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'toggle_home_featured', 
		array(
			'label'      => __( 'Disable Home Featured Posts', 'rey' ),
			'section'    => 'home_featured',
			'settings'   => 'toggle_home_featured',
			'type'           => 'checkbox',
			'priority' => 1
		)
	));
	$wp_customize->add_setting( 'kind_home_featured' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => 'popular' ) );
	$wp_customize->add_control( new Rey_Customize_Featured_Select_Control( 
		$wp_customize, 'kind_home_featured', 
		array(
			'label'      => __( 'Posts to display', 'rey' ),
			'section'    => 'home_featured',
			'settings'   => 'kind_home_featured',
			'type'           => 'select',
			'choices'        => array(
                'popular'   => __( 'Most Viewed Posts', 'rey' ),
                'commented'  => __( 'Most Commented Posts', 'rey' ),
                'alphabetically'  => __( 'Sorted by Title', 'rey' ),
                'latest'  => __( 'The Latest Posts', 'rey' ),
                'random'  => __( 'Random Posts', 'rey' )
            ),
			'priority' => 2
		)
	));
	$wp_customize->add_setting( 'lot1_home_featured' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '6' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'lot1_home_featured', 
		array(
			'label'      => __( 'Posts to display on desktops?', 'rey' ),
			'section'    => 'home_featured',
			'settings'   => 'lot1_home_featured',
			'type'           => 'select',
			'choices'        => array(
                '1'   => __( '1', 'rey' ),
                '2'   => __( '2', 'rey' ),
                '3'   => __( '3', 'rey' ),
                '4'   => __( '4', 'rey' ),
                '5'   => __( '5', 'rey' ),
                '6'   => __( '6', 'rey' ),
                '7'   => __( '7', 'rey' ),
                '8'   => __( '8', 'rey' ),
                '9'   => __( '9', 'rey' ),
                '10'   => __( '10', 'rey' )
            ),
			'priority' => 3
		)
	));
	$wp_customize->add_setting( 'lot2_home_featured' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '5' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'lot2_home_featured', 
		array(
			'label'      => __( 'Posts to display on netbooks?', 'rey' ),
			'section'    => 'home_featured',
			'settings'   => 'lot2_home_featured',
			'type'           => 'select',
			'choices'        => array(
                '1'   => __( '1', 'rey' ),
                '2'   => __( '2', 'rey' ),
                '3'   => __( '3', 'rey' ),
                '4'   => __( '4', 'rey' ),
                '5'   => __( '5', 'rey' ),
                '6'   => __( '6', 'rey' ),
                '7'   => __( '7', 'rey' ),
                '8'   => __( '8', 'rey' )
            ),
			'priority' => 4
		)
	));
	$wp_customize->add_setting( 'lot3_home_featured' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '4' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'lot3_home_featured', 
		array(
			'label'      => __( 'Posts to display on landscape tabs?', 'rey' ),
			'section'    => 'home_featured',
			'settings'   => 'lot3_home_featured',
			'type'           => 'select',
			'choices'        => array(
                '1'   => __( '1', 'rey' ),
                '2'   => __( '2', 'rey' ),
                '3'   => __( '3', 'rey' ),
                '4'   => __( '4', 'rey' ),
                '5'   => __( '5', 'rey' ),
                '6'   => __( '6', 'rey' ),
                '7'   => __( '7', 'rey' )
            ),
			'priority' => 5
		)
	));
	$wp_customize->add_setting( 'lot4_home_featured' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '3' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'lot4_home_featured', 
		array(
			'label'      => __( 'Posts to display on tablets?', 'rey' ),
			'section'    => 'home_featured',
			'settings'   => 'lot4_home_featured',
			'type'           => 'select',
			'choices'        => array(
                '1'   => __( '1', 'rey' ),
                '2'   => __( '2', 'rey' ),
                '3'   => __( '3', 'rey' ),
                '4'   => __( '4', 'rey' ),
                '5'   => __( '5', 'rey' ),
                '6'   => __( '6', 'rey' )
            ),
			'priority' => 6
		)
	));
	$wp_customize->add_setting( 'lot5_home_featured' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '2' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'lot5_home_featured', 
		array(
			'label'      => __( 'Posts to display on smartphones?', 'rey' ),
			'section'    => 'home_featured',
			'settings'   => 'lot5_home_featured',
			'type'           => 'select',
			'choices'        => array(
                '1'   => __( '1', 'rey' ),
                '2'   => __( '2', 'rey' ),
                '3'   => __( '3', 'rey' ),
                '4'   => __( '4', 'rey' )
            ),
			'priority' => 7
		)
	));


	$wp_customize->add_setting( 'amount_home_featured' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '9' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'amount_home_featured', 
		array(
			'label'      => __( 'How many posts to load?', 'rey' ),
			'section'    => 'home_featured',
			'settings'   => 'amount_home_featured',
			'type'           => 'select',
			'choices'        => array(
                '6'   => __( '6', 'rey' ),
                '7'   => __( '7', 'rey' ),
                '8'   => __( '8', 'rey' ),
                '9'   => __( '9', 'rey' ),
                '10'   => __( '10', 'rey' ),
                '11'   => __( '11', 'rey' ),
                '12'   => __( '12', 'rey' ),
                '13'   => __( '13', 'rey' ),
                '14'   => __( '14', 'rey' ),
                '15'   => __( '15', 'rey' ),
                '16'   => __( '16', 'rey' ),
                '17'   => __( '17', 'rey' ),
                '18'   => __( '18', 'rey' ),
                '19'   => __( '19', 'rey' ),
                '20'   => __( '20', 'rey' )
            ),
			'priority' => 10
		)
	));
	$wp_customize->add_setting( 'height_home_featured' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '520' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'height_home_featured', 
		array(
			'label'      => __( 'Featured posts height', 'rey' ),
			'section'    => 'home_featured',
			'settings'   => 'height_home_featured',
			'type'           => 'select',
			'choices'        => array(
                '250'   => __( 'Least (250px)', 'rey' ),
                '350'   => __( 'Much Lower (350px)', 'rey' ),
                '450'   => __( 'Lower (450px)', 'rey' ),
                '520'   => __( 'Normal (520px)', 'rey' )
            ),
			'priority' => 11
		)
	));


	//   H O M E  L A T E S T  P O S T S

	$wp_customize->add_section( 'home_posts' , array(
		'title'      => __('Home Latest Posts', 'rey'),
		'priority'   => 22,
	) );	

	$wp_customize->add_setting( 'home_posts_title' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'home_posts_title', 
		array(
			'label'      => __( 'Title', 'rey' ),
			'section'    => 'home_posts',
			'settings'   => 'home_posts_title',
			'priority' => 1
		)
	));
	$wp_customize->add_setting( 'home_posts_subtitle' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'home_posts_subtitle', 
		array(
			'label'      => __( 'A subtitle', 'rey' ),
			'section'    => 'home_posts',
			'settings'   => 'home_posts_subtitle',
			'priority' => 2
		)
	));



	//   R E V I E W S

	$wp_customize->add_section( 'reviews' , array(
		'title'      => __('Reviews','rey'),
		'priority'   => 23,
	) );	

	$wp_customize->add_setting( 'toggle_reviews' , array(  'type' => 'option', 'sanitize_callback' => 'wp_kses_post', 'default' => 0 ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'toggle_reviews', 
		array(
			'label'      => __( 'Disable Reviews', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'toggle_reviews',
			'type'           => 'checkbox',
			'priority' => 1
		)
	));
	$wp_customize->add_setting( 'reviews_title' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'reviews_title', 
		array(
			'label'      => __( 'Reviews Title', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'reviews_title',
			'priority' => 2
		)
	));
	$wp_customize->add_setting( 'review_intro' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_intro', 
		array(
			'label'      => __( 'Reviews Introduction', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_intro',
			'priority' => 3
		)
	));
	$wp_customize->add_setting( 'reviews_image' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'reviews_image', 
		array(
			'label'      => __( 'Upload a Background Image', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'reviews_image',
			'priority' => 4
		)
	));
	$wp_customize->add_setting( 'review_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_1', 
		array(
			'label'      => __( '#1 Review', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_1',
			'priority' => 5
		)
	));
	$wp_customize->add_setting( 'review_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_2', 
		array(
			'label'      => __( '#2 Review', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_2',
			'priority' => 6
		)
	));
	$wp_customize->add_setting( 'review_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_3', 
		array(
			'label'      => __( '#3 Review', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_3',
			'priority' => 7
		)
	));
	$wp_customize->add_setting( 'review_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_4', 
		array(
			'label'      => __( '#4 Review', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_4',
			'priority' => 8
		)
	));
	$wp_customize->add_setting( 'review_5' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_5', 
		array(
			'label'      => __( '#5 Review', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_5',
			'priority' => 9
		)
	));
	$wp_customize->add_setting( 'review_6' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_6', 
		array(
			'label'      => __( '#6 Review', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_6',
			'priority' => 10
		)
	));
	$wp_customize->add_setting( 'review_7' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_7', 
		array(
			'label'      => __( '#7 Review', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_7',
			'priority' => 11
		)
	));
	$wp_customize->add_setting( 'review_8' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_8', 
		array(
			'label'      => __( '#8 Review', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_8',
			'priority' => 12
		)
	));
	$wp_customize->add_setting( 'review_9' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_9', 
		array(
			'label'      => __( '#9 Review', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_9',
			'priority' => 13
		)
	));
	$wp_customize->add_setting( 'review_10' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'review_10', 
		array(
			'label'      => __( '#10 Review', 'rey' ),
			'section'    => 'reviews',
			'settings'   => 'review_10',
			'priority' => 14
		)
	));



	//   O U R  T E A M

	$wp_customize->add_section( 'team' , array(
		'title'      => __('Team Members', 'rey'),
		'priority'   => 24,
	) );	

	$wp_customize->add_setting( 'team_image_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'team_image_1', 
		array(
			'label'      => __( '#1 Partner Photo', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_image_1',
			'priority' => 1
		)
	));
	$wp_customize->add_setting( 'team_name_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'team_name_1', 
		array(
			'label'      => __( '#1 Partner Name', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_name_1',
			'priority' => 2
		)
	));
	$wp_customize->add_setting( 'team_sitin_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'team_sitin_1', 
		array(
			'label'      => __( '#1 Partner Sit-in', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_sitin_1',
			'priority' => 3
		)
	));
		$wp_customize->add_setting( 'team_facebook_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_facebook_1', 
			array(
				'label'      => __( '#1 Partner Facebook URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_facebook_1',
				'priority' => 4
			)
		));
		$wp_customize->add_setting( 'team_twitter_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_twitter_1', 
			array(
				'label'      => __( '#1 Partner Twitter URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_twitter_1',
				'priority' => 5
			)
		));
		$wp_customize->add_setting( 'team_instagram_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_instagram_1', 
			array(
				'label'      => __( '#1 Partner Instagram URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_instagram_1',
				'priority' => 6
			)
		));
		$wp_customize->add_setting( 'team_google_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_google_1', 
			array(
				'label'      => __( '#1 Partner Google Plus URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_google_1',
				'priority' => 7
			)
		));
		$wp_customize->add_setting( 'team_tumblr_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_tumblr_1', 
			array(
				'label'      => __( '#1 Partner Tumblr URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_tumblr_1',
				'priority' => 8
			)
		));

	$wp_customize->add_setting( 'team_image_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'team_image_2', 
		array(
			'label'      => __( '#2 Partner Photo', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_image_2',
			'priority' => 10
		)
	));
	$wp_customize->add_setting( 'team_name_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'team_name_2', 
		array(
			'label'      => __( '#2 Partner Name', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_name_2',
			'priority' => 11
		)
	));
	$wp_customize->add_setting( 'team_sitin_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'team_sitin_2', 
		array(
			'label'      => __( '#2 Partner Sit-in', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_sitin_2',
			'priority' => 12
		)
	));
		$wp_customize->add_setting( 'team_facebook_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_facebook_2', 
			array(
				'label'      => __( '#2 Partner Facebook URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_facebook_2',
				'priority' => 13
			)
		));
		$wp_customize->add_setting( 'team_twitter_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_twitter_2', 
			array(
				'label'      => __( '#2 Partner Twitter URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_twitter_2',
				'priority' => 14
			)
		));
		$wp_customize->add_setting( 'team_instagram_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_instagram_2', 
			array(
				'label'      => __( '#2 Partner Instagram URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_instagram_2',
				'priority' => 15
			)
		));
		$wp_customize->add_setting( 'team_google_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_google_2', 
			array(
				'label'      => __( '#2 Partner Google Plus URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_google_2',
				'priority' => 16
			)
		));
		$wp_customize->add_setting( 'team_tumblr_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_tumblr_2', 
			array(
				'label'      => __( '#2 Partner Tumblr URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_tumblr_2',
				'priority' => 17
			)
		));

	$wp_customize->add_setting( 'team_image_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'team_image_3', 
		array(
			'label'      => __( '#3 Partner Photo', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_image_3',
			'priority' => 18
		)
	));
	$wp_customize->add_setting( 'team_name_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'team_name_3', 
		array(
			'label'      => __( '#3 Partner Name', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_name_3',
			'priority' => 19
		)
	));
	$wp_customize->add_setting( 'team_sitin_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'team_sitin_3', 
		array(
			'label'      => __( '#3 Partner Sit-in', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_sitin_3',
			'priority' => 20
		)
	));
		$wp_customize->add_setting( 'team_facebook_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_facebook_3', 
			array(
				'label'      => __( '#3 Partner Facebook URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_facebook_3',
				'priority' => 21
			)
		));
		$wp_customize->add_setting( 'team_twitter_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_twitter_3', 
			array(
				'label'      => __( '#3 Partner Twitter URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_twitter_3',
				'priority' => 22
			)
		));
		$wp_customize->add_setting( 'team_instagram_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_instagram_3', 
			array(
				'label'      => __( '#3 Partner Instagram URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_instagram_3',
				'priority' => 23
			)
		));
		$wp_customize->add_setting( 'team_google_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_google_3', 
			array(
				'label'      => __( '#3 Partner Google Plus URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_google_3',
				'priority' => 24
			)
		));
		$wp_customize->add_setting( 'team_tumblr_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_tumblr_3', 
			array(
				'label'      => __( '#3 Partner Tumblr URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_tumblr_3',
				'priority' => 25
			)
		));

	$wp_customize->add_setting( 'team_image_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( 
		$wp_customize, 'team_image_4', 
		array(
			'label'      => __( '#4 Partner Photo', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_image_4',
			'priority' => 26
		)
	));
	$wp_customize->add_setting( 'team_name_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'team_name_4', 
		array(
			'label'      => __( '#4 Partner Name', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_name_4',
			'priority' => 27
		)
	));
	$wp_customize->add_setting( 'team_sitin_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'team_sitin_4', 
		array(
			'label'      => __( '#4 Partner Sit-in', 'rey' ),
			'section'    => 'team',
			'settings'   => 'team_sitin_4',
			'priority' => 28
		)
	));
		$wp_customize->add_setting( 'team_facebook_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_facebook_4', 
			array(
				'label'      => __( '#4 Partner Facebook URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_facebook_4',
				'priority' => 29
			)
		));
		$wp_customize->add_setting( 'team_twitter_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_twitter_4', 
			array(
				'label'      => __( '#4 Partner Twitter URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_twitter_4',
				'priority' => 30
			)
		));
		$wp_customize->add_setting( 'team_instagram_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_instagram_4', 
			array(
				'label'      => __( '#4 Partner Instagram URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_instagram_4',
				'priority' => 31
			)
		));
		$wp_customize->add_setting( 'team_google_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_google_4', 
			array(
				'label'      => __( '#4 Partner Google Plus URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_google_4',
				'priority' => 32
			)
		));
		$wp_customize->add_setting( 'team_tumblr_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
		$wp_customize->add_control( new WP_Customize_Control( 
			$wp_customize, 'team_tumblr_4', 
			array(
				'label'      => __( '#4 Partner Tumblr URL', 'rey' ),
				'section'    => 'team',
				'settings'   => 'team_tumblr_4',
				'priority' => 33
			)
		));



	//   C O N T A C T

	$wp_customize->add_section( 'location' , array(
		'title'      => __('Map Location', 'rey'),
		'priority'   => 25,
	) );	

	$wp_customize->add_setting( 'location_map_lat' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'location_map_lat', 
		array(
			'label'      => __( 'Your Location Latitude', 'rey' ),
			'section'    => 'location',
			'settings'   => 'location_map_lat',
			'priority' => 1
		)
	));
	$wp_customize->add_setting( 'location_map_lng' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'location_map_lng', 
		array(
			'label'      => __( 'Your Location Longitude', 'rey' ),
			'section'    => 'location',
			'settings'   => 'location_map_lng',
			'priority' => 2
		)
	));
	$wp_customize->add_setting( 'location_map_marker' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'location_map_marker', 
		array(
			'label'      => __( 'Location Marker Content', 'rey' ),
			'section'    => 'location',
			'settings'   => 'location_map_marker',
			'priority' => 3
		)
	));



	//   S O C I A L
	$socialicons = array(
		''   => __( '', 'rey' ),
		'facebook'   => __( 'Facebook', 'rey' ),
		'twitter'   => __( 'Twitter', 'rey' ),
		'instagram'   => __( 'Instagram', 'rey' ),
		'google'   => __( 'Google+', 'rey' ),
		'pinterest'   => __( 'Pinterest', 'rey' ),
		'tumblr'   => __( 'Tumblr', 'rey' ),
		'github'   => __( 'GitHub', 'rey' ),
		'soundcloud'   => __( 'SoundCloud', 'rey' ),
		'paypal'   => __( 'PayPal', 'rey' ),
		'behance'   => __( 'Behance', 'rey' ),
		'envelope'   => __( 'Mail', 'rey' ),
		'twitch'   => __( 'Twitch', 'rey' ),
		'youtube'   => __( 'YouTube', 'rey' ),
		'spotify'   => __( 'Spotify', 'rey' ),
		'foursquare'   => __( 'Foursquare', 'rey' ),
		'flickr'   => __( 'Flickr', 'rey' ),
		'vine'   => __( 'Vine', 'rey' ),
		'apple'   => __( 'Apple', 'rey' )
	);

	$wp_customize->add_section( 'social' , array(
		'title'      => __('Social', 'rey'),
		'priority'   => 26,
	) );	

	$wp_customize->add_setting( 'social_icon_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_icon_1', 
		array(
			'label'      => __( '#1 Social Icon', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_icon_1',
			'type'           => 'select',
			'choices'        => $socialicons,
			'priority' => 1
		)
	));
	$wp_customize->add_setting( 'social_link_1' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_link_1', 
		array(
			'label'      => __( '#1 Social Url', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_link_1',
			'priority' => 2
		)
	));
	$wp_customize->add_setting( 'social_icon_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_icon_2', 
		array(
			'label'      => __( '#2 Social Icon', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_icon_2',
			'type'           => 'select',
			'choices'        => $socialicons,
			'priority' => 3
		)
	));
	$wp_customize->add_setting( 'social_link_2' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_link_2', 
		array(
			'label'      => __( '#2 Social Url', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_link_2',
			'priority' => 4
		)
	));
	$wp_customize->add_setting( 'social_icon_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_icon_3', 
		array(
			'label'      => __( '#3 Social Icon', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_icon_3',
			'type'           => 'select',
			'choices'        => $socialicons,
			'priority' => 5
		)
	));
	$wp_customize->add_setting( 'social_link_3' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_link_3', 
		array(
			'label'      => __( '#3 Social Url', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_link_3',
			'priority' => 6
		)
	));
	$wp_customize->add_setting( 'social_icon_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_icon_4', 
		array(
			'label'      => __( '#4 Social Icon', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_icon_4',
			'type'           => 'select',
			'choices'        => $socialicons,
			'priority' => 7
		)
	));
	$wp_customize->add_setting( 'social_link_4' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_link_4', 
		array(
			'label'      => __( '#4 Social Url', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_link_4',
			'priority' => 8
		)
	));
	$wp_customize->add_setting( 'social_icon_5' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_icon_5', 
		array(
			'label'      => __( '#5 Social Icon', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_icon_5',
			'type'           => 'select',
			'choices'        => $socialicons,
			'priority' => 9
		)
	));
	$wp_customize->add_setting( 'social_link_5' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_link_5', 
		array(
			'label'      => __( '#5 Social Url', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_link_5',
			'priority' => 10
		)
	));
	$wp_customize->add_setting( 'social_icon_6' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_icon_6', 
		array(
			'label'      => __( '#6 Social Icon', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_icon_6',
			'type'           => 'select',
			'choices'        => $socialicons,
			'priority' => 11
		)
	));
	$wp_customize->add_setting( 'social_link_6' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_link_6', 
		array(
			'label'      => __( '#6 Social Url', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_link_6',
			'priority' => 12
		)
	));
	$wp_customize->add_setting( 'social_icon_7' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_icon_7', 
		array(
			'label'      => __( '#7 Social Icon', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_icon_7',
			'type'           => 'select',
			'choices'        => $socialicons,
			'priority' => 13
		)
	));
	$wp_customize->add_setting( 'social_link_7' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_link_7', 
		array(
			'label'      => __( '#7 Social Url', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_link_7',
			'priority' => 14
		)
	));
	$wp_customize->add_setting( 'social_icon_8' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_icon_8', 
		array(
			'label'      => __( '#8 Social Icon', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_icon_8',
			'type'           => 'select',
			'choices'        => $socialicons,
			'priority' => 15
		)
	));
	$wp_customize->add_setting( 'social_link_8' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_link_8', 
		array(
			'label'      => __( '#8 Social Url', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_link_8',
			'priority' => 16
		)
	));
	$wp_customize->add_setting( 'social_icon_9' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_icon_9', 
		array(
			'label'      => __( '#9 Social Icon', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_icon_9',
			'type'           => 'select',
			'choices'        => $socialicons,
			'priority' => 17
		)
	));
	$wp_customize->add_setting( 'social_link_9' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_link_9', 
		array(
			'label'      => __( '#9 Social Url', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_link_9',
			'priority' => 18
		)
	));
	$wp_customize->add_setting( 'social_icon_10' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_icon_10', 
		array(
			'label'      => __( '#10 Social Icon', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_icon_10',
			'type'           => 'select',
			'choices'        => $socialicons,
			'priority' => 19
		)
	));
	$wp_customize->add_setting( 'social_link_10' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'social_link_10', 
		array(
			'label'      => __( '#10 Social Url', 'rey' ),
			'section'    => 'social',
			'settings'   => 'social_link_10',
			'priority' => 20
		)
	));



	//   A C C E N T  C O L O R

	$wp_customize->add_section( 'colors' , array(
		'title'      => __('Colors', 'rey'),
		'priority'   => 27,
	) );	

	$wp_customize->add_setting( 'accent_color' , array( 'sanitize_callback' => 'sanitize_hex_color', 'default' => '' ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 'accent_color', 
		array(
			'label'      => __( 'Accent Color', 'rey' ),
			'section'    => 'colors',
			'settings'   => 'accent_color',
			'priority' => 1
		)
	));



	//   S I N G L E  P A G E S  O P T I O N S

	$wp_customize->add_section( 'single_pages' , array(
		'title'      => __('Single Pages Options', 'rey'),
		'priority'   => 28,
	) );	

	$wp_customize->add_setting( 'single_pages_sidebar' , array(  'type' => 'option', 'sanitize_callback' => 'wp_kses_post', 'default' => 0 ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'single_pages_sidebar', 
		array(
			'label'      => __( 'Disable sidebar on Single Pages?', 'rey' ),
			'section'    => 'single_pages',
			'settings'   => 'single_pages_sidebar',
			'type'           => 'checkbox',
			'priority' => 1
		)
	));
	$wp_customize->add_setting( 'single_pages_comments' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => 'side' ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'single_pages_comments', 
		array(
			'label'      => __( 'Comments position', 'rey' ),
			'section'    => 'single_pages',
			'settings'   => 'single_pages_comments',
			'type'           => 'select',
			'choices'        => array(
                'side'   => __( 'To the side', 'rey' ),
                'bellow'   => __( 'Bellow', 'rey' )
            ),
			'priority' => 2
		)
	));
	$wp_customize->add_setting( 'single_pages_featured' , array(  'type' => 'option', 'sanitize_callback' => 'wp_kses_post', 'default' => 0 ) );
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 'single_pages_featured', 
		array(
			'label'      => __( 'Display featured images bellow the content on Single Pages?', 'rey' ),
			'section'    => 'single_pages',
			'settings'   => 'single_pages_featured',
			'type'           => 'checkbox',
			'priority' => 3
		)
	));



	//   F O O T E R

	$wp_customize->add_section( 'footer_options' , array(
		'title'      => __('Footer Options', 'rey'),
		'priority'   => 150,
	) );	

	$wp_customize->add_setting( 'footer_options_copy' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'footer_options_copy', 
		array(
			'label'      => __( 'Copyrights Text (links are allowed)', 'rey' ),
			'section'    => 'footer_options',
			'settings'   => 'footer_options_copy',
			'priority' => 3
		)
	));




	//   C U S T O M  C S S

	$wp_customize->add_section( 'custom_css' , array(
		'title'      => __('Custom CSS', 'rey'),
		'priority'   => 160,
	) );	

	$wp_customize->add_setting( 'custom_css_source' , array( 'sanitize_callback' => 'wp_kses_post', 'default' => '' ) );
	$wp_customize->add_control( new Rey_Customize_Textarea_Control( 
		$wp_customize, 'custom_css_source', 
		array(
			'section'    => 'custom_css',
			'settings'   => 'custom_css_source',
			'priority' => 3
		)
	));





}
add_action( 'customize_register', 'rey_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rey_customize_preview_js() {
	wp_enqueue_script( 'rey_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'rey_customize_preview_js' );


function rey_customize_preview_css() {
	?><style> 
		.customize-control .iconpicker { background: #fff; height: 123px; overflow-y: scroll; border: 1px solid #ddd; cursor: pointer; }
		.customize-control .iconpicker [class^="fa-"],
		.customize-control .iconpicker [class*=" fa-"] {
			background: #fff;
			position: relative;
			font-family: FontAwesome;
			font-weight: normal;
			font-style: normal;
			text-decoration: inherit;
			-webkit-font-smoothing: antialiased;
			font-size: 14px;
			line-height: 32px;
			text-align: center;
			cursor: pointer;
			width: 30px;
			height: 30px;
			display: inline-block;
			color: #494949;
			border: 1px solid #e1e1e1;
			margin-left: -1px;
			margin-top: -1px;
			transition: all 0.1s ease-out;
			-moz-transition: all 0.1s ease-out;
			-webkit-transition: all 0.1s ease-out;
			-o-transition: all 0.1s ease-out;			
		}
		.customize-control .iconpicker [class^="fa-"].active,
		.customize-control .iconpicker [class*=" fa-"].active {
			background-color: #d92c23;
			color: #fff;
		}
		.customize-control .iconpicker [class^="fa-"]:hover,
		.customize-control .iconpicker [class*=" fa-"]:hover {
			background-color: #eee;
			color: #000;
		}
		.customize-control .iconpicker [class^="fa-"] input[type=radio],
		.customize-control .iconpicker [class*=" fa-"] input[type=radio] {
			position: absolute;
			opacity: 0;
			top: 0;
			left: 0;
			width: 30px;
			height: 30px;
			margin: 0;
		}
	</style><?php
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.css', false, '4.1', 'all' );

}
add_action( 'customize_controls_print_styles', 'rey_customize_preview_css' );


function rey_customize_preview_scripts() { 

	?>
	<script type="text/javascript">
    ( function( $ ) {
    // activate iconpicker
    $('.iconpicker i').live('click', function(e) {
        e.preventDefault();

        var iconWithPrefix = $(this).attr('class');
        var fontName = $(this).attr('data-name');

        if($(this).hasClass('active')) {
            $(this).parent().find('.active').removeClass('active');

        } else {
            $(this).parent().find('.active').removeClass('active');
            $(this).addClass('active');

        }
    });
    } )( jQuery );

    </script>
	<?php

}
add_action( 'customize_controls_print_scripts', 'rey_customize_preview_scripts' );
