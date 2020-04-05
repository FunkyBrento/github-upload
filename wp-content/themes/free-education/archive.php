<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Free_Education
 */

get_header();
?>
<!-- Blogs -->
<section class="blog b-archives section">
	<div class="container">
		<div class="row masonry">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'archive' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Start Pagination -->
					<div class="pagination-main">
						<?php if (function_exists("free_education_pagination"))
						{
							free_education_pagination();
						}  ?>
					</div>
					<!--/ End Pagination -->
				</div>
			</div>
		</div>
	</section>
	<!--/ End Blogs -->	
	<?php
	get_footer();
