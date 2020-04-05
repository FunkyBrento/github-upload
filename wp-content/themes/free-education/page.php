<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Free_Education
 */

get_header();
?>

<!-- Blog Single -->
<section class="blog b-archives single section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
				endif;

				endwhile; // End of the loop.
				?>
				
			</div>
			<div class="col-lg-4 col-12">
				<div class="learnedu-sidebar">
					<?php get_sidebar();?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Blog Single -->

<?php
get_footer();
