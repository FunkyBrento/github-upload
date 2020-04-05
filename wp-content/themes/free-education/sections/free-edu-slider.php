<?php $free_education_frontpage_slider_option = get_theme_mod( 'free_education_frontpage_slider_option', 'show' );
if( $free_education_frontpage_slider_option == 'show' ) :?>
<!-- Slider Area -->
	<section class="home-slider">
		<div class="slider-active">
			<!-- Single Slider -->
			<?php free_education_banner_items();?>
			<!--/ End Single Slider -->
		</div>
	</section>
<!--/ End Slider Area -->
<?php endif;?>