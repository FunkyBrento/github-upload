<?php

    /**
     * Free Education Frontpage Settings panel at Theme Customizer
     *
     * @package Free_Education
     * @since 1.0.0
     */
    add_action( 'customize_register', 'free_education_frontpage_settings_register' );

    function free_education_frontpage_settings_register( $wp_customize ) {

    /**
     * Add Frontpage Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
        'free_education_frontpage_settings_panel',
        array(
            'priority'       => 15,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Frontpage Settings', 'free-education' ),
        )
    );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Front page slider section
     *
     * @since 1.0.0
     */

    $wp_customize->add_section(
        'free_education_frontpage_slider_section',
        array(
        	'priority'       => 1,
        	'panel'          => 'free_education_frontpage_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Slider Section', 'free-education' ),
            'description'    => __( 'Managed the slider display at Frontpage section.', 'free-education' ),
        )
    );

    /**
     * Switch option for  Slider
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_slider_option',
        array(
        	'capability'     	=> 'edit_theme_options',
            'default' 			=> 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );
    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_frontpage_slider_option',
        array(
            'label'     	=> __( 'Frontpage Slider Option', 'free-education' ),
            'description'   => __( 'Show/Hide option for Frontpage Slider section.', 'free-education' ),
            'section'   	=> 'free_education_frontpage_slider_section',
            'settings'		=> 'free_education_frontpage_slider_option',
            'type'      	=> 'switch',
            'choices'   	=> array(
                'show'  		=> __( 'Show', 'free-education' ),
                'hide'  		=> __( 'Hide', 'free-education' )
            )
        )
    )
    );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Front page Service section
     *
     * @since 1.0.0
     */

    $wp_customize->add_section(
        'free_education_frontpage_service_section',
        array(
            'priority'       => 5,
            'panel'          => 'free_education_frontpage_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Service Section', 'free-education' ),
            'description'    => __( 'Managed the Service display at Frontpage section.', 'free-education' ),
        )
    );

    /**
     * Switch option for  Service Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_service_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );

    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_frontpage_service_option',
        array(
            'label'         => __( 'Frontpage Service Option', 'free-education' ),
            'description'   => __( 'Show/Hide option for Frontpage Service section.', 'free-education' ),
            'section'       => 'free_education_frontpage_service_section',
            'settings'      => 'free_education_frontpage_service_option',
            'type'          => 'switch',
            'choices'       => array(
                'show'          => __( 'Show', 'free-education' ),
                'hide'          => __( 'Hide', 'free-education' )
            )
        )
    )
    );

    /**
     * Page option for Service section title and description
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_service_title_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'free_education_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control('free_education_frontpage_service_title_option',array(
        'label'         => __( 'Select Page for Service  section title and description', 'free-education' ),
        'section'       => 'free_education_frontpage_service_section',
        'settings'      => 'free_education_frontpage_service_title_option',
        'type'          => 'dropdown-pages'
    )
    );

    $wp_customize->add_setting('service_post_type_info', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Service_Post_Type_Info( $wp_customize, 'service_post_type_info', array(
        'label' => esc_attr__( 'Go to Service Page', 'free-education' ),
        'section' => 'free_education_frontpage_service_section',
        'settings' => 'service_post_type_info',
        'extra' => esc_attr__( ' for more info', 'free-education' )
    ) ) 
    );


    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Front page Enroll section
     *
     * @since 1.0.0
     */

    $wp_customize->add_section(
        'free_education_frontpage_enroll_section',
        array(
            'priority'       => 6,
            'panel'          => 'free_education_frontpage_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Enroll Section', 'free-education' ),
            'description'    => __( 'Managed the Enroll display at Frontpage section.', 'free-education' ),
        )
    );

    /**
     * Switch option for Enroll Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_enroll_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );

    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_frontpage_enroll_option',
        array(
            'label'         => __( 'Frontpage Why Choose Us Option', 'free-education' ),
            'description'   => __( 'Show/Hide option for Frontpage Enroll section.', 'free-education' ),
            'section'       => 'free_education_frontpage_enroll_section',
            'settings'      => 'free_education_frontpage_enroll_option',
            'type'          => 'switch',
            'choices'       => array(
                'show'          => __( 'Show', 'free-education' ),
                'hide'          => __( 'Hide', 'free-education' )
            )
        )
    )
    );

    /**
     * Text option for  Enroll Form title
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_enroll_form_title_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('free_education_frontpage_enroll_form_title_option',array(
        'label'         => __( 'Type Enroll Form Title', 'free-education' ),
        'section'       => 'free_education_frontpage_enroll_section',
        'settings'      => 'free_education_frontpage_enroll_form_title_option',
        'type'          => 'text'
    )
    );

    /**
     * Text option for  Enroll Form subtitle
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_enroll_form_subtitle_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('free_education_frontpage_enroll_form_subtitle_option',array(
        'label'         => __( 'Type Enroll Form Subtitle', 'free-education' ),
        'section'       => 'free_education_frontpage_enroll_section',
        'settings'      => 'free_education_frontpage_enroll_form_subtitle_option',
        'type'          => 'text'
    )
    );
    $wp_customize->add_setting( 'free_education_contact_form_code', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'free_education_contact_form_code', array(
        'label'                 =>  __( 'Contact Section Use Shortcode', 'free-education' ),
        /* translators: %s: Description */ 
        'description'           => sprintf( __( 'Use Contact Form 7 plugins shortcode: Eg: %1$s. %2$s See more here %3$s', 'free-education' ), '[contact-form-7 id="108" title="Contact form 1"]','<a href="'.esc_url('https://wordpress.org/plugins/contact-form-7/').'" target="_blank">','</a>' ),
        'section'               => 'free_education_frontpage_enroll_section',
        'type'                  => 'text',
        'settings' => 'free_education_contact_form_code',
    ) );
    /**
     * Page option for Enroll section title and description
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_enroll_title_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'free_education_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control('free_education_frontpage_enroll_title_option',array(
        'label'         => __( 'Select Page for Enroll section title and description', 'free-education' ),
        'section'       => 'free_education_frontpage_enroll_section',
        'settings'      => 'free_education_frontpage_enroll_title_option',
        'type'          => 'dropdown-pages'
    )
    );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Front page Course section
     *
     * @since 1.0.0
     */

    $wp_customize->add_section(
        'free_education_frontpage_course_section',
        array(
            'priority'       => 7,
            'panel'          => 'free_education_frontpage_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Course Section', 'free-education' ),
            'description'    => __( 'Managed the Course display at Frontpage section.', 'free-education' ),
        )
    );

    /**
     * Switch option for Our course Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_course_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );

    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_frontpage_course_option',
        array(
            'label'         => __( 'Frontpage Course Option', 'free-education' ),
            'description'   => __( 'Show/Hide option for Frontpage course section.', 'free-education' ),
            'section'       => 'free_education_frontpage_course_section',
            'settings'      => 'free_education_frontpage_course_option',
            'type'          => 'switch',
            'choices'       => array(
                'show'          => __( 'Show', 'free-education' ),
                'hide'          => __( 'Hide', 'free-education' )
            )
        )
    )
    );

    /**
     * Page option for Our course section title and description
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_course_title_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'free_education_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control('free_education_frontpage_course_title_option',array(
        'label'         => __( 'Select Page for Course  section title and description', 'free-education' ),
        'section'       => 'free_education_frontpage_course_section',
        'settings'      => 'free_education_frontpage_course_title_option',
        'type'          => 'dropdown-pages'
    )
    );

     $wp_customize->add_setting('free_education_course_post_type_info', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Course_Post_Type_Info( $wp_customize, 'free_education_course_post_type_info', array(
        'label' => esc_attr__( 'Go to Course Section', 'free-education' ),
        'section' => 'free_education_frontpage_course_section',
        'settings' => 'free_education_course_post_type_info',
        'extra' => esc_attr__( ' for more info', 'free-education' )
    ) ) 
    );
    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Front page Call to Action section
     *
     * @since 1.0.0
     */

    $wp_customize->add_section(
        'free_education_frontpage_call_to_action_section',
        array(
            'priority'       => 8,
            'panel'          => 'free_education_frontpage_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Call to Action Section', 'free-education' ),
            'description'    => __( 'Managed the  Call to action display at Frontpage section.', 'free-education' ),
        )
    );

    /**
     * Switch option for  Call to Action Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_call_to_action_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );

    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_frontpage_call_to_action_option',
        array(
            'label'         => __( 'Frontpage Call to Action Option', 'free-education' ),
            'description'   => __( 'Show/Hide option for Frontpage Call to Action section.', 'free-education' ),
            'section'       => 'free_education_frontpage_call_to_action_section',
            'settings'      => 'free_education_frontpage_call_to_action_option',
            'type'          => 'switch',
            'choices'       => array(
                'show'          => __( 'Show', 'free-education' ),
                'hide'          => __( 'Hide', 'free-education' )
            )
        )
    )
    );

    /**
     * Page option for Call to Action section title and description
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_call_to_action_title_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'free_education_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control('free_education_frontpage_call_to_action_title_option',array(
        'label'         => __( 'Select Page for Call to action  section title and description with feature image', 'free-education' ),
        'section'       => 'free_education_frontpage_call_to_action_section',
        'settings'      => 'free_education_frontpage_call_to_action_title_option',
        'type'          => 'dropdown-pages'
    )
    );

    /**
     * Text option for Call to action Button text
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 'free_education_frontpage_call_to_action_button_text_option', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'free_education_frontpage_call_to_action_button_text_option', array(
        'label'                 =>  __( 'Button  Text', 'free-education' ),
        'section'               => 'free_education_frontpage_call_to_action_section',
        'type'                  => 'text',
        'settings' => 'free_education_frontpage_call_to_action_button_text_option',
    ) );


    /**
     * Option for Call to action Button Url
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 'free_education_frontpage_call_to_action_button_url_option', array(
        'capability'            => 'edit_theme_options',
        'default'               => '',
        'sanitize_callback'     => 'esc_url_raw'
    ) );

    $wp_customize->add_control( 'free_education_frontpage_call_to_action_button_url_option', array(
        'label'                 =>  __( 'Button  Url', 'free-education' ),
        'section'               => 'free_education_frontpage_call_to_action_section',
        'type'                  => 'url',
        'settings' => 'free_education_frontpage_call_to_action_button_url_option',
    ) );


    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Front page Teacher section
     *
     * @since 1.0.0
     */

    $wp_customize->add_section(
        'free_education_frontpage_teacher_section',
        array(
            'priority'       => 9,
            'panel'          => 'free_education_frontpage_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Teacher Section', 'free-education' ),
            'description'    => __( 'Managed the  Teacher display at Frontpage section.', 'free-education' ),
        )
    );

    /**
     * Switch option for  Teacher Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_teacher_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );

    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_frontpage_teacher_option',
        array(
            'label'         => __( 'Frontpage Teacher Option', 'free-education' ),
            'description'   => __( 'Show/Hide option for Frontpage Teacher section.', 'free-education' ),
            'section'       => 'free_education_frontpage_teacher_section',
            'settings'      => 'free_education_frontpage_teacher_option',
            'type'          => 'switch',
            'choices'       => array(
                'show'          => __( 'Show', 'free-education' ),
                'hide'          => __( 'Hide', 'free-education' )
            )
        )
    )
    );

    /**
     * Page option for Teacher  section title and description
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_teacher_title_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'free_education_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control('free_education_frontpage_teacher_title_option',array(
        'label'         => __( 'Select Page for Teacher  section title and description', 'free-education' ),
        'section'       => 'free_education_frontpage_teacher_section',
        'settings'      => 'free_education_frontpage_teacher_title_option',
        'type'          => 'dropdown-pages'
    )
    );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Front page Testimonials section
     *
     * @since 1.0.0
     */

    $wp_customize->add_section(
        'free_education_frontpage_testimonials_section',
        array(
            'priority'       => 10,
            'panel'          => 'free_education_frontpage_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Testimonials Section', 'free-education' ),
            'description'    => __( 'Managed the  Testimonials display at Frontpage section.', 'free-education' ),
        )
    );

    /**
     * Switch option for  Testimonials Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_testimonials_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );

    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_frontpage_testimonials_option',
        array(
            'label'         => __( 'Frontpage Testimonials Option', 'free-education' ),
            'description'   => __( 'Show/Hide option for Frontpage Testimonials section.', 'free-education' ),
            'section'       => 'free_education_frontpage_testimonials_section',
            'settings'      => 'free_education_frontpage_testimonials_option',
            'type'          => 'switch',
            'choices'       => array(
                'show'          => __( 'Show', 'free-education' ),
                'hide'          => __( 'Hide', 'free-education' )
            )
        )
    )
    );

    $wp_customize->add_setting('testimonial_post_type_info', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Testimonial_Post_Type_Info( $wp_customize, 'testimonial_post_type_info', array(
        'label' => esc_attr__( 'Go to Testimonials Page', 'free-education' ),
        'section' => 'free_education_frontpage_testimonials_section',
        'settings' => 'testimonial_post_type_info',
        'extra' => esc_attr__( ' for more info', 'free-education' )
    ) ) 
    );
    
    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Front page Upcoming Events section
     *
     * @since 1.0.0
     */

    $wp_customize->add_section(
        'free_education_frontpage_events_section',
        array(
            'priority'       => 10,
            'panel'          => 'free_education_frontpage_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Events Section', 'free-education' ),
            'description'    => __( 'Managed the  Events display at Frontpage section.', 'free-education' ),
        )
    );

    /**
     * Switch option for Upcoming Events Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_events_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );

    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
        $wp_customize,
        'free_education_frontpage_events_option',
        array(
            'label'         => __( 'Frontpage Events Option', 'free-education' ),
            'description'   => __( 'Show/Hide option for Frontpage Events section.', 'free-education' ),
            'section'       => 'free_education_frontpage_events_section',
            'settings'      => 'free_education_frontpage_events_option',
            'type'          => 'switch',
            'choices'       => array(
                'show'          => __( 'Show', 'free-education' ),
                'hide'          => __( 'Hide', 'free-education' )
            )
        )
    )
    );

    /**
     * Page option for Events section title and description
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_events_title_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'free_education_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control('free_education_frontpage_events_title_option',array(
        'label'         => __( 'Select Page for Events  section title and description', 'free-education' ),
        'section'       => 'free_education_frontpage_events_section',
        'settings'      => 'free_education_frontpage_events_title_option',
        'type'          => 'dropdown-pages'
    )
    );

    $wp_customize->add_setting('event_post_type_info', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Event_Post_Type_Info( $wp_customize, 'event_post_type_info', array(
        'label' => esc_attr__( 'Go to Event Page', 'free-education' ),
        'section' => 'free_education_frontpage_events_section',
        'settings' => 'event_post_type_info',
        'extra' => esc_attr__( ' for more info', 'free-education' )
    ) ) 
    );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Frontpage Counter section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'free_education_counter_section',
        array(
            'priority'       => 11,
            'panel'          => 'free_education_frontpage_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Counter Section', 'free-education' ),
            'description'    => __( 'Managed the content display at Counter section.', 'free-education' ),
        )
    );

    /**
     * Switch option for Counter Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'free_education_frontpage_counter_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'hide',
            'sanitize_callback' => 'free_education_sanitize_switch_option',
        )
    );

    $wp_customize->add_control( new Free_Education_Customize_Switch_Control(
            $wp_customize,
            'free_education_frontpage_counter_option',
            array(
                'label'         => __( 'Inner Header Option', 'free-education' ),
                'description'   => __( 'Show/Hide option for Counter section.', 'free-education' ),
                'section'       => 'free_education_counter_section',
                'settings'      => 'free_education_frontpage_counter_option',
                'type'          => 'switch',
                'priority'      => 5,
                'choices'       => array(
                    'show'          => __( 'Show', 'free-education' ),
                    'hide'          => __( 'Hide', 'free-education' )
                )
            )
        )
    );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Front page blog section
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'free_education_frontpage_blog_section',
    array(
        'priority'       => 11,
        'panel'          => 'free_education_frontpage_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Blog Section', 'free-education' ),
        'description'    => __( 'Managed the  Blog display at Frontpage section.', 'free-education' ),
    )
);

/**
 * Switch option for  Blog Section
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'free_education_frontpage_blog_option',
    array(
        'capability'        => 'edit_theme_options',
        'default'           => 'hide',
        'sanitize_callback' => 'free_education_sanitize_switch_option',
    )
);

$wp_customize->add_control( new Free_Education_Customize_Switch_Control(
    $wp_customize,
    'free_education_frontpage_blog_option',
    array(
        'label'         => __( 'Frontpage Blog Option', 'free-education' ),
        'description'   => __( 'Show/Hide option for Frontpage Blog section.', 'free-education' ),
        'section'       => 'free_education_frontpage_blog_section',
        'settings'      => 'free_education_frontpage_blog_option',
        'type'          => 'switch',
        'choices'       => array(
            'show'          => __( 'Show', 'free-education' ),
            'hide'          => __( 'Hide', 'free-education' )
        )
    )
)
);

/**
 * Page option for Blog section title and description
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'free_education_frontpage_blog_title_option',
    array(
        'capability'        => 'edit_theme_options',
        'default'           => '',
        'sanitize_callback' => 'free_education_sanitize_dropdown_pages',
    )
);

$wp_customize->add_control('free_education_frontpage_blog_title_option',array(
    'label'         => __( 'Select Page for Blog  section title and description', 'free-education' ),
    'section'       => 'free_education_frontpage_blog_section',
    'settings'      => 'free_education_frontpage_blog_title_option',
    'type'          => 'dropdown-pages'
)
);

//Category select for blogs
$wp_customize->add_setting('free_education_blog_category_id',array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'free_education_sanitize_category',
    'default' =>  '1',
)
);

$wp_customize->add_control(new Free_Education_Customize_Dropdown_Taxonomies_Control($wp_customize,'free_education_blog_category_id',
    array(
     'label' => __('Select Category for Blog','free-education'),
     'section' => 'free_education_frontpage_blog_section',
     'settings' => 'free_education_blog_category_id',
     'type'=> 'dropdown-taxonomies',
 )
));

$wp_customize->add_setting( 'free_education_blog_number', array(
    'capability'            => 'edit_theme_options',
    'default'               => '3',
    'sanitize_callback'     => 'free_education_sanitize_number_absint'
));

$wp_customize->add_control( 'free_education_blog_number', array(
    'label'                 =>  __( 'Number of Recent Blogs to Show in Front Page', 'free-education' ),
    'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'free-education' ),
    'section'               => 'free_education_frontpage_blog_section',
    'type'                  => 'number',
    'settings' => 'free_education_blog_number',
) );
}