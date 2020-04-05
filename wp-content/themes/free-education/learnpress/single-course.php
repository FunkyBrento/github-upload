<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Free_Education
 */
get_header();

$postid   = get_the_ID();
$author   = get_post_meta( $postid, '_lp_course_author' );
$course_author = !empty($author) ? $author[0] : 1;
	$duration = get_post_meta( $postid, '_lp_duration',true );

$items = wp_cache_get( 'course-' . $post->ID, 'lp-course-items' );

$items = wp_cache_get( 'course-' . $post->ID, 'lp-course-items' );
$number_lessons = $number_quizzes = 0;
if ( $items ) {
	foreach ( $items as $item_id ) {
		if ( get_post_type( $item_id ) == LP_LESSON_CPT ) {
			$number_lessons ++;
		} else if ( get_post_type( $item_id ) == LP_QUIZ_CPT ) {
			$number_quizzes ++;
		}
	}
}

$categories = get_the_terms( $postid, 'course_category' );
$on_draught = '';
if ( $categories && ! is_wp_error( $categories ) ) {
	$draught_links = array();

	foreach ( $categories as $category ) {
		$draught_links[] = $category->name;
	}

	$on_draught = join( ", ", $draught_links );
}
?>
<!-- Courses -->
<section class="courses single section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="single-main">
					<div class="row">
						<?php if(has_post_thumbnail()):?>
							<div class="col-lg-8 col-12">
								<!-- Single Course -->
								<div class="single-course">
									<div class="course-head">		
										<?php the_post_thumbnail('full'); ?>
									</div>			
								</div>
								<!--/ End Single Course -->
							</div>	
						<?php endif;?>
						<div class="col-lg-4 col-12">
							<!-- Course Features -->
							<div class="course-feature">
								<div class="feature-main">
									<h4><?php echo esc_html__('Course Features','free-education');?></h4>
									<!-- Single Feature -->
									<div class="single-feature">
										<i class="fa fa-files-o"></i>
										<span class="label"><?php echo esc_html__('Lectures','free-education');?></span>
										<span class="value"><?php echo esc_html($number_lessons);?></span>
									</div>
									<!--/ End Single Feature -->
									<!-- Single Feature -->
									<div class="single-feature">
										<i class="fa fa-puzzle-piece"></i>
										<span class="label"><?php echo esc_html__('Quizzes','free-education');?></span>
										<span class="value"><?php echo absint( $number_quizzes );?></span>
									</div>
									<!--/ End Single Feature -->
									<!-- Single Feature -->
									<div class="single-feature">
										<i class="fa fa-clock-o"></i>
										<span class="label"><?php echo esc_html__('Duration','free-education');?></span>
										<span class="value"><?php echo esc_html($duration);?></span>
									</div>
									<!--/ End Single Feature -->
									
									<!-- Single Feature -->
									<div class="single-feature">
										<i class="fa fa-user"></i>
										<span class="label"><?php echo esc_html__('Students','free-education');?></span>
										<span class="value"><?php free_education_course_students();?></span>
									</div>
									<!--/ End Single Feature -->
								</div>
							</div>
							<!--/ End Course Features -->
						</div>	
					</div>	
					<div class="row">
						<div class="col-12">
							<!-- Course Meta -->
							<div class="course-meta">
								<!-- Course Info -->
								<div class="course-info">
									<div class="single-info author">
										<?php echo get_avatar( $course_author, 64 ); ?>
										<h4><?php echo esc_html__('Teacher:', 'free-education'); ?><a href="#"><span><?php echo esc_html( get_the_author_meta( 'display_name', $course_author ) ) ?></span></a></h4>
									</div>
									<div class="single-info category">
										<i class="fa fa-bolt"></i>
										<h4><?php echo esc_html__('Category', 'free-education'); ?><a href="#"><span><?php if ( $on_draught ) { echo esc_html( $on_draught );  } ?></span></a></h4>
									</div>
									<div class="single-info s-enroll">
										<i class="fa fa-users"></i>
										<h4><?php echo esc_html__('Enrolled:','free-education');?><span><?php learn_press_course_students() ?></span></h4>
									</div>
									<div class="single-info rattings">
										<i class="fa fa-clock-o"></i>
										<h4><?php echo esc_html__('Course Time:', 'free-education'); ?><span><?php echo esc_html($duration);?></span></h4>
									</div>
								</div>
								<!--/ End Course Info -->
								<!-- Course Price -->
								<div class="course-price">
									<p><?php free_education_course_price();?></p>
									<form name="enroll-course" class="enroll-course" method="post" enctype="multipart/form-data">

										<?php do_action( 'learn-press/before-enroll-button' ); ?>

										<input type="hidden" name="enroll-course" value="<?php echo esc_attr( $course->get_id() ); ?>"/>
										<input type="hidden" name="enroll-course-nonce"
										value="<?php echo esc_attr( LP_Nonce_Helper::create_course( 'enroll' ) ); ?>"/>

										<button class="lp-button button button-enroll-course btn"><i class="fa fa-users"></i>
											<?php echo esc_html( apply_filters( 'learn-press/enroll-course-button-text', __( 'Enroll', 'free-education' ) ) ); ?>
										</button>

										<?php do_action( 'learn-press/after-enroll-button' ); ?>

									</form>
								</div>
								<!--/ End Course Price -->
							</div>
							<!--/ End Course Meta -->
						</div>
						<div class="col-12">
							<div class="content">
								<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								<?php the_content();?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Courses -->	
<?php
get_footer();		