<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Free_Education
 */

?>
<div class="col-lg-4 col-12 grid-item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<!-- Single Blog -->
		<div class="single-blog">
			<div class="blog-head overlay">
				<div class="date">
					<h4><?php echo get_the_date( 'd'); ?> <span><?php echo get_the_date( 'F'); ?></span></h4>
				</div>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'free-education-blogs-image-800x550' );?>
					<?php endif;?>
				</div>
				<div class="blog-content">
					<?php
					if ( is_singular() ) :
						the_title( '<h4 class="blog-title">', '</h4>' );
					else :
						the_title( '<h4 class="blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
					endif;?>

					<div class="blog-info">

						<?php free_education_posted_by();?>
						<?php $categories = get_the_category();  
						if($categories):
						$cat_name = $categories[0]->cat_name;
						$cat_id	  =	$categories[0]->term_id;	
						?>	
						<a href="<?php echo esc_url(get_category_link( $cat_id ));?>"><i class="fa fa-list"></i><?php echo esc_html($cat_name);?></a>
						<?php endif;?>
					</div>
					<?php the_excerpt();?>	
					<div class="button">
						<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html__('Read More','free-education');?><i class="fa fa-angle-double-right"></i></a>
					</div>

					<?php wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'free-education' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</div>
			<!-- End Single Blog -->
		</article><!-- #post-<?php the_ID(); ?> -->
	</div>

	

