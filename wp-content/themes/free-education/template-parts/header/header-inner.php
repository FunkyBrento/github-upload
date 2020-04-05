<!-- Header Inner -->
<div class="header-inner">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-12">
				<div class="logo">
					<?php
					if(has_custom_logo()):?>
						<?php the_custom_logo();?>
						<?php else: ?>	
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name');?></a></h1>
							<p><?php bloginfo( 'description' ) ?></p>
						<?php endif; ?>
					</div>
					<div class="mobile-menu"></div>
				</div>
				<?php 
				$free_education_inner_header_option = get_theme_mod( 'free_education_inner_header_option', 'show' );
				if( $free_education_inner_header_option == 'show' ) :?>
					<div class="col-lg-9 col-md-9 col-12">
						<!-- Header Widget -->
						<div class="header-widget">
							<?php free_education_inner_header_items();?>
						</div>
						<!--/ End Header Widget -->
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
	<!--/ End Header Inner -->
