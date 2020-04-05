<?php 
$free_education_frontpage_events_option = get_theme_mod( 'free_education_frontpage_events_option', 'show' );
if( $free_education_frontpage_events_option == 'show' ) :
	?>	
	<!-- Events -->
	<section class="events section">
		<div class="container">
			<div class="row">
				<div class="col-12 wow zoomIn">
					<div class="section-title">
						<?php $event_title = get_theme_mod('free_education_frontpage_events_title_option');
						$query_post = get_post($event_title);	
						?>
						<h2><?php echo esc_html($query_post->post_title);?></h2>
						<p><?php echo esc_html($query_post->post_content);?></p>
						<?php wp_reset_postdata();  ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="event-slider">
						<?php
						$args = array (
							'post_type' => 'event',
							'posts_per_page' => 10,
							'orderby'        =>'post__in',
							'post_status'    => 'publish',
						);
						$teamloop = new WP_Query($args); 
						if ($teamloop->have_posts()) :  while ($teamloop->have_posts()) : $teamloop->the_post(); ?>
							<!-- Single Event -->
							<div class="single-event">
								<div class="head overlay">
									<?php if (has_post_thumbnail()):
										$image_url = get_the_post_thumbnail_url(get_the_ID(),'	free-education-event-690x465');
										?>
									<img src="<?php echo esc_url($image_url);?>" alt="#">
									<a href="<?php echo esc_url($image_url);?>" data-fancybox="photo" class="btn"><i class="fa fa-search"></i></a>
									<?php endif;?>
								</div>
								<div class="event-content">
									<div class="meta"> 
										<span><i class="fa fa-calendar"></i><?php echo esc_html(get_the_date( 'd F, j')); ?></span>
										<span><i class="fa fa-clock-o"></i><?php echo esc_html(get_the_time());?></span>
									</div>
									<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
									<?php the_excerpt();?>
									<div class="button">
										<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html__( 'Read more', 'free-education' );?></a>
									</div>
								</div>
							</div>
							<!--/ End Single Event -->
						<?php  endwhile;
						wp_reset_postdata();  
					endif; ?>		

				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Events -->
<?php endif;?>