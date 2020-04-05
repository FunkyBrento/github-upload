<?php
if( !class_exists('Free_Education_Useful_Link_Widget')){
	class Free_Education_Useful_Link_Widget extends WP_Widget{
	//setup the widget name, description, etc....
		public function __construct(){
			$widget_ops=array(
				'classname'	=>	'free-education-useful-link-widget',
				'description'	=>	'Custom '.get_bloginfo('name').' Useful Links Widget',
			);

			parent::__construct( 'free_education_usefull_link_widget',get_bloginfo('name'). ' Useful Links Widget', $widget_ops );
		}

		public function widget( $args, $instance){?>
			<div class="col-lg-2 col-md-6 col-12">
				<!-- Useful Links -->
				<div class="single-widget useful-links">
					<h2><?php echo esc_html__('Useful Links','free-education');?></h2>
					<?php
					if ( has_nav_menu( 'useful-link' ) ) :
						wp_nav_menu( array(
							'theme_location'    => 'useful-link',
							'depth'             => 0,
							'container_class'   => '',
							'container_id'      => '',
							'menu_class'        => '',
						));
						?>
					<?php endif; ?>
				</div>
				<!--/ End Useful Links -->
			</div>
		<?php	}
	}
}

