<?php
/**
 * Template part for displaying posts
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
				<?php the_post_thumbnail( 'free-education-blogs-image-750x550' );?>
			<?php endif;?>
		</div>
	</div>
	<div class="detail-content">
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
		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="blog-title">', '</h2>' );
		else :
			the_title( '<h2 class="blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;?>
		<?php the_content();?>
	</div>
</div>