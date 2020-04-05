<?php
if( !class_exists('Free_Education_Latest_Posts_Widget')){
	class Free_Education_Latest_Posts_Widget extends WP_Widget{
	//setup the widget name, description, etc....
		public function __construct(){
			$widget_ops=array(
				'classname'		=>	'free-education-latest-posts-widget',
				'description'	=>	'Custom Footer Latest Post Widget',
			);

			parent::__construct( 'free-education_latest_post_widget','Footer: Latest Posts Widget', $widget_ops );
		}

		public function widget( $args, $instance){?>
			<div class="col-lg-4 col-md-6 col-12">
				<!-- Latest News -->
				<div class="single-widget latest-news">
					<h2><?php echo esc_html__('Latest Posts','free-education');?></h2>
					<?php
					$args = array(
						'numberposts' => 3,
						'offset' => 0,
						'category' => 0,
						'orderby' => 'post_date',
						'order' => 'DESC',
						'post_type' => 'post',
						'post_status' => 'publish',
						'suppress_filters' => true );
					$latest_post_query = new WP_Query( $args );
					while ($latest_post_query->have_posts()) : $latest_post_query->the_post();
						?>
						<div class="news-inner">
							<div class="single-news">
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('free-education-footer-latest-posts-150x150');
								} ?>
								<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
								<?php 				  
								$excerpt = get_the_excerpt();
								$excerpt = substr( $excerpt , 0, 60); 
								echo '<p>'.esc_html($excerpt).'</p>';?>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<!--/ End Latest News -->
			</div>
		<?php	}
	}
}

