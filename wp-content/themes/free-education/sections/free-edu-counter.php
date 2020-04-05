<?php $free_education_frontpage_counter_option = get_theme_mod( 'free_education_frontpage_counter_option', 'show' );
if( $free_education_frontpage_counter_option == 'show' ) :
	?>
	<!-- Fun Facts -->
	<div class="fun-facts overlay" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
					
				<?php free_education_counter_items();?>
				
			</div>
		</div>
	</div>
	<!--/ End Fun Facts -->
	<?php endif;?>