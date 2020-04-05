<?php
/**
 * Free Education Additional Settings panel at Theme Customizer
 *
 * @package Free_Education
 * @since 1.0.0
 */

add_action( 'customize_register', 'free_education_social_settings_register' );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Social Icons Section
 *
 * @since 1.0.0
 */
function free_education_social_settings_register( $wp_customize ) {

    $wp_customize->add_section(
        'free_education_social_icons_section',
        array(
            'title'     => esc_html__( 'Social Icons', 'free-education' ),
            'priority'  => 5,
        )
    );

    /**
     * Switch option for Top Header Social Media
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_top_header_social_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );

    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_top_header_social_option',
        array(
            'label'         => __( 'Top Header Social Media Option', 'free-education' ),
            'description'   => __( 'Show/Hide Socail media for top header(right).', 'free-education' ),
            'section'       => 'free_education_social_icons_section',
            'settings'      => 'free_education_top_header_social_option',
            'type'          => 'switch',
            'priority'      => 1,
            'choices'       => array(
                'show'          => __( 'Show', 'free-education' ),
                'hide'          => __( 'Hide', 'free-education' )
                )
            )
        )
    );


     /**
     * Switch option for Footer Header Social Media
     *
     * @since 1.0.0
     */
     $wp_customize->add_setting(
        'free_education_top_footer_social_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );

     $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_top_footer_social_option',
        array(
            'label'         => __( 'Footer Social media Option', 'free-education' ),
            'description'   => __( 'Show/Hide Socail media for Footer Section.', 'free-education' ),
            'section'       => 'free_education_social_icons_section',
            'settings'      => 'free_education_top_footer_social_option',
            'type'          => 'switch',
            'priority'      => 1,
            'choices'       => array(
                'show'          => __( 'Show', 'free-education' ),
                'hide'          => __( 'Hide', 'free-education' )
                )
            )
        )
    );
}