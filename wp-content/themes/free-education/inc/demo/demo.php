<?php
/**
 * Demo configuration
 *
 * @package Free_Education
 */

$config = array(
	'static_page'    => 'home',
	'posts_page'     => 'blog',
	'menu_locations' => array(
		'primary' 		=> 'primary',
		'useful-link'	=>'useful-link'
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import Free Education Demo', 'free-education' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . '/inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/inc/demo/widgets.wie',
      		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/inc/demo/customizer.dat',
      		'import_notice'                => __( 'It will overwrite your settings', 'free-education' ),
      		'preview_url'                  => 'https://demo.scorpionthemes.com/free-education',
		),
		
	),
);

Free_Education_Demo::init( apply_filters( 'free_education_demo_filter', $config ) );