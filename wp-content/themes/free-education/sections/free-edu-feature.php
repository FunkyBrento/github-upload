<?php $free_education_frontpage_service_option = get_theme_mod( 'free_education_frontpage_service_option', 'show' );
if( $free_education_frontpage_service_option == 'show' ) :?>
<!-- Features -->
<section class="our-features section">
	<div class="container">
		<div class="row">
			<div class="col-12 wow zoomIn">
				<div class="section-title">
					<?php
					$service_title = get_theme_mod('free_education_frontpage_service_title_option');
					$query_post = get_post($service_title);
					?>
					<h2><?php echo esc_html($query_post->post_title);?></h2>
					<p><?php echo esc_html($query_post->post_content);?></p>
					<?php wp_reset_postdata();?>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$args = array (
				'post_type' => 'service',
				'post_per_page' => 3,
				'orderby'           =>'post__in',
			);
			$serviceloop = new WP_Query($args);
			if ($serviceloop->have_posts()) :  while ($serviceloop->have_posts()) : $serviceloop->the_post(); ?>
				<div class="col-lg-4 col-md-4 col-12 wow fadeInUp" data-wow-delay="0.4s">
					<!-- Single Feature -->
					<div class="single-feature">
						<?php if(has_post_thumbnail()):?>
						<div class="feature-head">
							<?php the_post_thumbnail( 'free-education-frontpage-service-image-370x250' );?>
						</div>
						<?php endif;?>
						<h2><?php the_title();?></h2>
						<?php the_excerpt();?>
					</div>
					<!--/ End Single Feature -->
				</div>
				<?php
			endwhile; 
			wp_reset_postdata();
		endif; ?>
	</div>
</div>
</section>
<!-- End Features -->
<?php endif;?>