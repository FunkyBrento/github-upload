<?php $free_education_frontpage_blog_option = get_theme_mod( 'free_education_frontpage_blog_option', 'show' );
if( $free_education_frontpage_blog_option == 'show' ) :?>
	<!-- Blogs -->
	<section class="blog section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<?php
						$blog_title = get_theme_mod('free_education_frontpage_blog_title_option');
						$queried_post = get_post($blog_title);
						?>
						<h2><?php echo esc_html($queried_post->post_title); ?></h2>
						<p><?php echo esc_html($queried_post->post_content); ?></p>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="blog-slider">
						<?php
						$blog_catId = esc_attr(get_theme_mod( 'free_education_blog_category_id'));
						$blog_catLink = get_category_link($blog_catId);
						$blog_CatName = get_category($blog_catId);
						$blog_number = get_theme_mod('free_education_blog_number');
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => $blog_number,
							'post_status' => 'publish',
							'cat' => $blog_catId,

						);
						$blogloop = new WP_Query($args);
						if ( $blogloop->have_posts() ) :
							while ($blogloop->have_posts()) : 
								$blogloop->the_post(); 
								?>
								<!-- Single Blog -->
								<div class="single-blog">
									<div class="blog-head overlay">
										<div class="date">
											<h4><?php echo get_the_date( 'd'); ?><span><?php echo get_the_date( 'F'); ?></span></h4>
										</div>
										<?php if(has_post_thumbnail()):
											the_post_thumbnail( 'free-education-blog-800x550');
										endif;	
										?>
									</div>
									<div class="blog-content">
										<h4 class="blog-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
										<div class="blog-info">
											<?php free_education_posted_by();?>
											<?php $categories = get_the_category();  
											$cat_name = $categories[0]->cat_name;
											$cat_id	  =	$categories[0]->term_id;	
											?>	
											<a href="<?php echo esc_url(get_category_link( $cat_id ));?>"><i class="fa fa-list"></i><?php echo esc_html($cat_name);?></a>
										</div>
										<?php the_excerpt();?>
										<div class="button">
											<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html__('Read More','free-education');?><i class="fa fa-angle-double-right"></i></a>
										</div>
									</div>
								</div>
								<!-- End Single Blog -->
							<?php endwhile;
						endif;
						wp_reset_postdata();
						?>			
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Blogs -->
	<?php endif;?>		