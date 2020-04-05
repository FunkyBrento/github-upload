<?php 
$free_education_frontpage_testimonials_option = get_theme_mod( 'free_education_frontpage_testimonials_option', 'show' );
if( $free_education_frontpage_testimonials_option == 'show' ) :
	?>	
	<!-- Testimonials -->
	<section class="testimonials overlay section" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="testimonial-slider">
						<?php
						$args = array (
							'post_type' => 'testimonial',
							'posts_per_page' => 10,
							'orderby'        =>'post__in',
						);
						$testimonialloop = new WP_Query($args);
						if ($testimonialloop->have_posts()) :  while ($testimonialloop->have_posts()) : $testimonialloop->the_post(); ?>
							<!-- Single Testimonial -->
							<div class="single-testimonial">
								<?php if(has_post_thumbnail()): ?>
									<?php the_post_thumbnail('free-education-footer-latest-posts-150x150'); ?> 
								<?php endif; ?>
								<div class="main-content">
									<h4 class="name"><?php the_title();?></h4>
									<?php the_excerpt();?>
								</div>
							</div>
							<!--/ End Single Testimonial -->
						<?php  endwhile;
						wp_reset_postdata();  
					endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Testimonials -->
<?php endif;?>		