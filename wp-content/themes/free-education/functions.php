<?php
/**
 * Free Education functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Free_Education
 */

if ( ! function_exists( 'free_education_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function free_education_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Free Education, use a find and replace
		 * to change 'free-education' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'free-education', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'free-education-blogs-image-800x550', 800, 550, true );
		add_image_size( 'free-education-blogs-image-750x550', 750, 550, true );
		add_image_size( 'free-education-banner-image-2000x1000', 2000, 1000, true );
		add_image_size( 'free-education-frontpage-service-image-370x250', 370, 250, true );
		add_image_size( 'free-education-footer-latest-posts-150x150', 150, 150, true );
		add_image_size( 'free-education-calltoaction-1343x508', 1343, 508, true );
		add_image_size( 'free-education-teacher-275x370', 275, 370, true );
		add_image_size( 'free-education-event-690x465', 690, 465, true );
		add_image_size( 'free-education-blog-800x550', 800, 550, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'free-education' ),
			'useful-link'=> esc_html__('Useful Links(Footer)','free-education')
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'free_education_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 55,
			'width'       => 262,
			'flex-width'  => true,
			'flex-height' => false,
		) );

		add_theme_support('woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'free_education_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function free_education_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'free_education_content_width', 640 );
}
add_action( 'after_setup_theme', 'free_education_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function free_education_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'free-education' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'free-education' ),
		'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget', 'free-education' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'free-education' ),
		'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Google map iframe', 'free-education' ),
		'id'            => 'google-map',
		'description'   => __( 'Add widgets here.', 'free-education' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'free_education_widgets_init' );


/*
* Free Education pagination function
*/

function free_education_pagination($pages = '', $range = 4)
{  
	$showitems = ($range * 2) + 1;  
	$paged = get_query_var( 'paged');

	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}   

	if(1 != $pages)
	{
		echo '<ul class="pagination">';
		if($paged > 1 ) echo "<li class='prev'><a href='".esc_url(get_pagenum_link($paged - 1))."'>&lsaquo;<span class='fa fa-angle-left'></span></a></li>";
		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<li class=\"active\"><a href='".esc_url(get_pagenum_link($i))."'>".esc_html($i)."</a></li>":"<li><a href='".esc_url(get_pagenum_link($i))."'>".esc_html($i)."</a></li>";
			}
		}

		if ($paged < $pages ) echo "<li class='next'><a href=\"".esc_url(get_pagenum_link($paged + 1))."\"><span class='fa fa-angle-right'></span></a></li>";  
		echo "</ul>";
	}
}
/**
 * Enqueue scripts and styles.
 */
require get_template_directory(). '/inc/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Bootstrap Navwalker
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 *Free Education Custom Widget
 */
require get_template_directory() . '/inc/widgets/free-edu-widgets.php';


if ( is_admin() ) {
	// Load about.
	
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/about.php';

	// Load demo.
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/class-demo.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/demo.php';
}


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}