<?php
if( !class_exists('Free_Education_Recent_Posts_Widget')){
	class Free_Education_Recent_Posts_Widget extends WP_Widget{
		
		//setup the widget name, description, etc....
		public function __construct(){
			$widget_ops=array(
				'classname'	=>	'free-education-footer-latest-posts-widget',
				'description'	=>	'Custom '.get_bloginfo('name').'Sidebar Recent Post Widget',
			);

			parent::__construct( 'free-education_recent_posts_widget','Sidebar: Recent Posts Widget', $widget_ops );
		}

		public function widget( $args, $instance){?>
			<div class="single-widget posts">
				<h3><?php echo esc_html__('Recent Posts','free-education');?></h3>
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
					<div class="single-post">
						<div class="post-img">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('free-education-footer-latest-posts-150x150');
							} ?>
						</div>
						<div class="post-info">
							<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
							<span><i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y'); ?></span>
						</div>
					</div>
					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			
		<?php	}
	}
}

