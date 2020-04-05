<?php
/**
 * Free Education Theme Customizer
 *
 * @package Free_Education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function free_education_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'free_education_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'free_education_customize_partial_blogdescription',
		) );
	}

	//Upgrade to Pro
	// Register custom section types.
	$wp_customize->register_section_type( 'Free_Education_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Free_Education_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Go Pro', 'free-education' ),
				'pro_text' => esc_html__( 'Buy Education Pro', 'free-education' ),
				'pro_url'  => 'https://justwpthemes.com/downloads/education-pro/',
				'priority' => 1,
			)
		)
	);
}
add_action( 'customize_register', 'free_education_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function free_education_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function free_education_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function free_education_customize_preview_js() {
	wp_enqueue_script( 'free-education-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'free_education_customize_preview_js' );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function free_education_customize_backend_scripts() {

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0' );

	wp_enqueue_style( 'free-education-admin-customizer-style', get_template_directory_uri() . '/assets/customizer/free-edu-customizer-style.css', array(), '1.0.0' );

	wp_enqueue_script( 'free-education-admin_customizer', get_template_directory_uri() . '/assets/customizer/free-edu-customizer-controls.js', array( 'jquery', 'customize-controls' ),'1.0.0', true );
	wp_enqueue_script( 'free-education-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.js', array( 'customize-controls' ) );
	wp_enqueue_style( 'free-education-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'free_education_customize_backend_scripts', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Load customizer required panels.
 */

require get_template_directory() . '/inc/customizer/free-edu-general-panel.php';
require get_template_directory() . '/inc/customizer/free-edu-header-panel.php';
require get_template_directory() . '/inc/customizer/free-edu-social-media-section.php';
require get_template_directory() . '/inc/customizer/free-edu-frontpage-panel.php';
require get_template_directory() . '/inc/customizer/free-edu-page-panel.php';
require_once trailingslashit( get_template_directory() ) . '/inc/upgrade-to-pro/control.php';

require get_template_directory() . '/inc/customizer/free-edu-customizer-sanitize.php';
require get_template_directory() . '/inc/customizer/free-edu-customizer-classes.php';

