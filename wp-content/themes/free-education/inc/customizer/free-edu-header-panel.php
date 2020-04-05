<?php
/**
 * Free Education Header Settings panel at Theme Customizer
 *
 * @package Free_Education
 * @since 1.0.0
 */

add_action( 'customize_register', 'free_education_header_settings_register' );

function free_education_header_settings_register( $wp_customize ) {

    $wp_customize->get_section( 'header_image' )->priority = '20';
    $wp_customize->get_section( 'header_image' )->title    = __( 'Header Image', 'free-education' );
    $wp_customize->get_section( 'header_image' )->panel    = 'free_education_header_settings_panel';

	/**
     * Add Header Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
     'free_education_header_settings_panel',
     array(
         'priority'       => 10,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Header Settings', 'free-education' ),
     )
 );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Top Header section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'free_education_top_header_section',
        array(
        	'priority'       => 5,
        	'panel'          => 'free_education_header_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Top Header Section', 'free-education' ),
            'description'    => __( 'Managed the content display at top header section.', 'free-education' ),
        )
    );

    /**
     * Switch option for Top Header
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_top_header_option',
        array(
        	'capability'     	=> 'edit_theme_options',
            'default' 			=> 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );
    
    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_top_header_option',
        array(
            'label'     	=> __( 'Top Header Option', 'free-education' ),
            'description'   => __( 'Show/Hide option for top header section.', 'free-education' ),
            'section'   	=> 'free_education_top_header_section',
            'settings'		=> 'free_education_top_header_option',
            'type'      	=> 'switch',
            'priority'  	=> 5,
            'choices'   	=> array(
                'show'  		=> __( 'Show', 'free-education' ),
                'hide'  		=> __( 'Hide', 'free-education' )
            )
        )
    )
);

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Inner Header section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'free_education_inner_header_section',
        array(
            'priority'       => 5,
            'panel'          => 'free_education_header_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Inner Header Section', 'free-education' ),
            'description'    => __( 'Managed the content display at inner header section.', 'free-education' ),
        )
    );

    /**
     * Switch option for Inner Header
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_inner_header_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_inner_header_option',
        array(
            'label'         => __( 'Inner Header Option', 'free-education' ),
            'description'   => __( 'Show/Hide option for Inner Header section.', 'free-education' ),
            'section'       => 'free_education_inner_header_section',
            'settings'      => 'free_education_inner_header_option',
            'type'          => 'switch',
            'priority'      => 5,
            'choices'       => array(
                'show'          => __( 'Show', 'free-education' ),
                'hide'          => __( 'Hide', 'free-education' )
            )
        )
    )
);
}