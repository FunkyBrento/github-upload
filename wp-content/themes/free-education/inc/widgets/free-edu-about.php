<?php
if( !class_exists('Free_Education_About_Widget')){
	class Free_Education_About_Widget extends WP_Widget{
	//setup the widget name, description, etc....
		public function __construct(){
			$widget_ops=array(
				'classname'	=>	'free-education-about-widget',
				'description'	=>	'Custom '.get_bloginfo('name').' Widget',
			);

			parent::__construct( 'free_education_about_widget',get_bloginfo('name'). ' About Widget', $widget_ops );
		}

		public function widget( $args, $instance){?>
			<div class="col-lg-3 col-md-6 col-12">
				<!-- About -->
				<div class="single-widget about">
					<div class="logo">
						<?php if(has_custom_logo()):?>
							<?php the_custom_logo();?>
							<?php else: ?>	
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name');?></a>
							<?php endif; ?>
						</div>
						<p><?php bloginfo('description')?></p>
					</div>
					<!--/ End About -->
				</div>
			<?php	}
		}
	}

