<?php
/**
 * Free Education Pages Settings panel at Theme Customizer
 *
 * @package Free_Education
 * @since 1.0.0
 */

add_action( 'customize_register', 'free_education_page_settings_register' );

function free_education_page_settings_register( $wp_customize ) {

	/**
     * Add Page Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
       'free_education_page_settings_panel',
       array(
           'priority'       => 10,
           'capability'     => 'edit_theme_options',
           'theme_supports' => '',
           'title'          => __( 'Page Template Settings', 'free-education' ),
       )
   );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Contact Page section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'free_education_contact_page_section',
        array(
        	'priority'       => 5,
        	'panel'          => 'free_education_page_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Contact Page', 'free-education' ),
            'description'    => __( 'Managed the content display at contact page.', 'free-education' ),
        )
    );

    // Contact form
    $wp_customize->add_setting( 'free_education_frontpage_contact_form_option', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'free_education_frontpage_contact_form_option', array(
        'label'                 =>  __( 'Contact Form Section Use Shortcode', 'free-education' ),
        'description'           =>  __( 'eg [contact-form-7 id="108" title="Contact form 1"]', 'free-education' ),
        'section'               => 'free_education_contact_page_section',
        'type'                  => 'text',
        'settings' => 'free_education_frontpage_contact_form_option',
    ) );


    

}