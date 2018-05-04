<?php
/**
 * 16th Purley Scout Group Theme Customizer
 *
 * @package 16th_Purley_Scout_Group
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function purley_scouts_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';


	$wp_customize->add_panel( 'analytics', array(
		'priority'       => 600,
		'theme_supports' => '',
		'title'          => __( 'Analytics', 'purley_scouts' ),
		'description'    => __( 'Set properties used in site analytics.', 'purley_scouts' ),
	) );

	$wp_customize->add_section( 'analytics_google' , array(
		'title'    => __('Google','purley_scouts'),
		'panel'    => 'analytics',
		'priority' => 10
	) );

	$wp_customize->add_setting( 'analytics_google_tracking_id', array(
		'default'           => __( '', 'purley_scouts' ),
		'sanitize_callback' => 'sanitize_text'
   	) );

	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'analytics_google_tracking_id',
		    array(
				'label'    => __( 'Google Analytics Tracking ID', 'purley_scouts' ),
				'description' => __( 'Only enter your tracking ID in the format: UA-XXXXX-X. For example: UA-12345-6', 'purley_scouts' ),
		        'section'  => 'analytics_google',
		        'settings' => 'analytics_google_tracking_id',
		        'type'     => 'text'
		    )
	    )
	);

	$wp_customize->add_setting( 'copyright_block', array(
		'default'           => __( 'Some Copyright', 'purley_scouts' ),
		'sanitize_callback' => 'sanitize_text'
	   ) );
	   

	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
	'copyright_block',
		array(
			'label'    => __( 'Copyright', 'purley_scouts' ),
			'section'  => 'title_tagline',
			'settings' => 'copyright_block',
			'type'     => 'text',
			'transport' => 'postMessage'
		)
	) );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'purley_scouts_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'purley_scouts_customize_partial_blogdescription',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'copyright_block', array(
			'selector'        => '.site-info .copyright',
			'render_callback' => 'purley_scouts_customize_partial_copyrightblock',
		) );
	}
}

add_action( 'customize_register', 'purley_scouts_customize_register' );

/**
 * Render the copyright block for the selective refresh partial.
 *
 * @return void
 */

function purley_scouts_customize_partial_copyrightblock() {
	get_theme_mod( 'copyright_block' );
}


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function purley_scouts_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function purley_scouts_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function purley_scouts_customize_preview_js() {
	wp_enqueue_script( 'purley_scouts-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'purley_scouts_customize_preview_js' );


function sanitize_text( $text ) {
	return sanitize_text_field( $text );
}