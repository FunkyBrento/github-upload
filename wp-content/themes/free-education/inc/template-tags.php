<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Free_Education
 */

if ( ! function_exists( 'free_education_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function free_education_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By: %s', 'post author', 'free-education' ),
			'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i>' . esc_html( get_the_author() ) . '</a>'
		);

		echo '<span> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'free_education_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function free_education_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'free_education_course_price' ) ) {
	function free_education_course_price() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'learnpress/learnpress.php' ) ) {
			return;
		}

		$course_price = learn_press_course_price();;

		echo  esc_html( $course_price );
	}
}

if ( ! function_exists( 'free_education_course_students' ) ) {
	function free_education_course_students() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'learnpress/learnpress.php' ) ) {
			return;
		}

		$course = learn_press_get_course();

		if ( $course ) {
			echo esc_attr( $course->get_max_students() );
		}
	}
}