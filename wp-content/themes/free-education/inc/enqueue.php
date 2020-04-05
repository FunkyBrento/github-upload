<?php
function free_education_scripts() {
	// Google font
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900', array(), '' );

	// Bootstrap CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), '4.0.0' );

	// fontawesome Css
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '4.7.0' );

	// Jquery Fancybox CSS
	wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() .'/assets/css/jquery.fancybox.min.css', array(), '4.7.0' );

	// Owl carousel CSS
	wp_enqueue_style( 'owl-carausel', get_template_directory_uri() .'/assets/css/owl.carousel.min.css', array(), '4.7.0' );

	// Owl theme default CSS
	wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() .'/assets/css/owl.theme.default.min.css', array(), '4.7.0' );

	// Animate CSS
	wp_enqueue_style( 'animate', get_template_directory_uri() .'/assets/css/animate.min.css', array(), '4.7.0' );

	// Slick Nav
	wp_enqueue_style( 'slicknav', get_template_directory_uri() .'/assets/css/slicknav.min.css', array(), '4.7.0' );

	// Magnific Popup
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() .'/assets/css/magnific-popup.css', array(), '4.7.0' );

	// Normalize CSS
	wp_enqueue_style( 'noramlize', get_template_directory_uri() .'/assets/css/normalize.css', array(), '4.7.0' );

	wp_enqueue_style( 'free-education-style', get_stylesheet_uri() );

	// Responsive CSS
	wp_enqueue_style( 'responsive', get_template_directory_uri() .'/assets/css/responsive.css', array(), '4.7.0' );

	// Theme Color CSS
	wp_enqueue_style( 'free-education-color', get_template_directory_uri() .'/assets/css/color/color1.css', array(), '4.7.0' );

	// Poper JS
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '3.3.1', true ); 

	// bootstrap JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.1', true );

	// jquery stellar JS
	wp_enqueue_script( 'jquery-stellar', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', array('jquery'), '3.3.1', true );

	// Particle JS
	wp_enqueue_script( 'particles', get_template_directory_uri() . '/assets/js/particles.min.js', array('jquery'), '3.3.1', true );

	// Fancy Box JS
	wp_enqueue_script( 'fancy-box', get_template_directory_uri() . '/assets/js/facnybox.min.js', array('jquery'), '3.3.1', true );

	// Magnific Popup JS
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '3.3.1', true );

	// Masonry JS
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array('jquery'), '3.3.1', true );

	// Circle Progress JS
	wp_enqueue_script( 'circle-progress', get_template_directory_uri() . '/assets/js/circle-progress.min.js', array('jquery'), '3.3.1', true );

	// Owl Carousel JS
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '3.3.1', true );

	// Waypoints JS
	wp_enqueue_script( 'waypoint', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '3.3.1', true );

	// Slick Nav JS
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/slicknav.min.js', array('jquery'), '3.3.1', true );

	// Counter Up JS
	wp_enqueue_script( 'counter-up', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '3.3.1', true );

	// Easing JS
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/easing.min.js', array('jquery'), '3.3.1', true );

	// Wow Min JS-
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '3.3.1', true );

	// Scroll Up JS
	wp_enqueue_script( 'jquery-scrollup', get_template_directory_uri() . '/assets/js/jquery.scrollUp.min.js', array('jquery'), '3.3.1', true );

	// Main JS
	wp_enqueue_script( 'free-education-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '3.3.1', true );
	wp_enqueue_script( 'free-education-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'free-education-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'free_education_scripts' );?>

