<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
				<div class="blog-detail">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'free-education' ); ?></h1>
					<div class="detail-content">
						<div class="blog-info">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'free-education' ); ?></p>
							<?php
							/* translators: %1$s: smiley */
							$free_education_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'free-education' ), convert_smilies( ':)' ) ) . '</p>';?>
						</div>
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
<!--/ End Blog Single -->
<?php
get_footer();
