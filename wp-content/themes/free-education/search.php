<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Free_Education
 */

get_header();
?>
<!-- Blogs -->
<section class="blog b-archives section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="row">
					<?php
					if ( have_posts() ) :?>
						<h1 class="page-title">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'free-education' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
						the_post();
						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', 'search' );

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
				<div class="col-lg-4 col-12">
					<div class="learnedu-sidebar">
						<?php get_sidebar();?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Blogs -->
	<?php
	get_footer();

	