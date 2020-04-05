<?php 
$free_education_top_header_option = get_theme_mod( 'free_education_top_header_option', 'show' );
if( $free_education_top_header_option == 'show' ) :?>
	<!-- Topbar -->
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-12">
					<!-- Contact -->
					<?php free_education_top_header_items();?>
					<!-- End Contact -->
				</div>
				<div class="col-lg-4 col-12">
					<?php 
					$free_education_top_header_social_option = get_theme_mod( 'free_education_top_header_social_option', 'show' );
					if( $free_education_top_header_social_option == 'show' ) :?>
						<!-- Social -->
						<?php free_education_social_media_items();?>
						<!-- End Social -->
					<?php endif;?>	
				</div>
			</div>
		</div>
	</div>
	<!-- End Topbar -->
<?php endif;?>