<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Free_Education
 */

?>
<div class="blog-detail">
	<div class="b-gallery">
		<div class="single-image">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'free-education-blogs-image-800x550' );?>
			<?php endif;?>
		</div>
	</div>
	<div class="detail-content">
		<?php
		
		the_title( '<h2 class="blog-title">', '</h2>' );
		
		the_content();?>
	</div>
</div>