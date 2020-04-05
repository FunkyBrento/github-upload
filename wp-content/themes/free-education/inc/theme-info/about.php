<?php
/**
 * About configuration
 *
 * @package Free_Education
 */

$config = array(
	'menu_name' => esc_html__( 'Free Education Setup', 'free-education' ),
	'page_name' => esc_html__( 'Free Education Setup', 'free-education' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'free-education' ), 'Free Education' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'free-education' ), 'Free Education' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','free-education' ),
			'url'  => 'https://scorpionthemes.com/downloads/free-education-wordpress-theme/',
		),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','free-education' ),
			'url'  => 'https://demo.scorpionthemes.com/free-education',
		),
		'documentation_url' => array(
			'text'   => esc_html__( 'Documentation','free-education' ),
			'url'    => 'http://scorpionthemes.com/wp-content/uploads/2018/08/Free-Education.pdf',
		),
		'upgrade_url' => array(
			'text'   => esc_html__( 'Upgrade to Pro','free-education' ),
			'url'    => 'https://justwpthemes.com/downloads/education-pro/',
			'button' => 'primary'
		),
	),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'free-education' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'free-education' ),
		'support'             => esc_html__( 'Support', 'free-education' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'free-education' ),
			'text'                => esc_html__( 'Find step by step instructions to setup theme easily.', 'free-education' ),
			'button_label'        => esc_html__( 'View documentation', 'free-education' ),
			'button_link'         => '#',
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'free-education' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'free-education' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'free-education' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=free-education-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'free-education' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'free-education' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'free-education' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'free-education-helper' => array(
				'title'       => esc_html__( 'Free Education Helper Plugin', 'free-education' ),
				'description' => esc_html__( 'Please install the Free Education Helper Plugin Before Importing Demo.', 'free-education' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'free-education-helper',
				'id'          => 'free-education-helper',
			),
			'learnpress' => array(
				'title'       => esc_html__( 'LearnPress WordPress LMS Plugin', 'free-education' ),
				'description' => esc_html__( 'Please install the LearnPress WordPress LMS Plugin Before Importing Demo.', 'free-education' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'learnpress',
				'id'          => 'learnpress',
			),
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','free-education' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you import demo content.', 'free-education' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'free-education' ) . '</a>',
			),
			'contact-form-7' => array(
				'title'       => esc_html__( 'Contact Form 7', 'free-education' ),
				'description' => esc_html__( 'Please install the Contact Form 7 plugin Before Importing Demo.', 'free-education' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'contact-form-7',
				'id'          => 'contact-form-7',
			),
			'newsletter' => array(
				'title'       => esc_html__( 'NewsLetter Plugin', 'free-education' ),
				'description' => esc_html__( 'Please install the Newsletter Plugin Before Importing Demo.', 'free-education' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'newsletter',
				'id'          => 'newsletter',
			),

			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'free-education' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'free-education' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'free-education' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'free-education' ),
			'button_label' => esc_html__( 'Contact Support', 'free-education' ),
			'button_link'  => esc_url( 'https://scorpionthemes.com/downloads/free-education-wordpress-theme/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'free-education' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'free-education' ),
			'button_label' => esc_html__( 'View Documentation', 'free-education' ),
			'button_link'  => '#',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Customization Request', 'free-education' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'This is 100% free theme and has premium version.Either Upgrade to Pro or  Feel free to contact us any time if you need any customization service.', 'free-education' ),
			'button_label' => esc_html__( 'Upgrade to Pro', 'free-education' ),
			'button_link'  => '#',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
	),


);
Free_Education_About::init( apply_filters( 'free_education_about_filter', $config ) );