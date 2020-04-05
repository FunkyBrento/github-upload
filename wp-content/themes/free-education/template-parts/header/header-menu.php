<!-- Header Menu -->
<div class="header-menu">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<nav class="navbar navbar-default">
					<div class="navbar-collapse">
						<!-- Main Menu -->
						<?php
						if ( has_nav_menu( 'primary' ) ) :
							wp_nav_menu( array(
								'theme_location'    => 'primary',
								'depth'             => 10,
								'container_class'   => '',
								'container_id'      => '',
								'menu_class'        => 'nav menu navbar-nav',
								'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
								'walker'            => new wp_bootstrap_navwalker(),
							));
							?>
							<?php else : ?>
								<ul class="nav menu navbar-nav">
									<li>
										<a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php esc_html_e('Add a menu','free-education'); ?></a>
									</li>
								</ul>
							<?php endif; ?>
							<!-- End Main Menu -->
						</div> 
					</nav>
				</div>
			</div>
		</div>
	</div>
<!--/ End Header Menu -->