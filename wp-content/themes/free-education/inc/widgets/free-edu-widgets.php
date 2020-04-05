<?php
/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Register various widgets
 *
 * @since 1.0.0
 */

function free_education_register_grid_layout_widget() {
	register_widget( 'Free_Education_About_Widget' );
	register_widget( 'Free_Education_Useful_Link_Widget' );
	register_widget( 'Free_Education_Latest_Posts_Widget' );
	register_widget( 'Free_Education_Recent_Posts_Widget' );
}

add_action( 'widgets_init', 'free_education_register_grid_layout_widget' );

require get_template_directory() . '/inc/widgets/free-edu-about.php';
require get_template_directory() . '/inc/widgets/free-edu-usefullink.php';
require get_template_directory() . '/inc/widgets/free-edu-footer-latest-posts.php';
require get_template_directory() . '/inc/widgets/free-edu-sidebar-recent-posts.php';