<?php
/*
* Template Nfffame: Contact page
*/	
get_header();
?>	
<!-- Contact Us -->
<section id="contact" class="contact section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<?php
					$contact_title = get_theme_mod('free_education_contactpage_title_option');
					$queried_post = get_post($contact_title);
					?>
					<h2><?php echo esc_html($queried_post->post_title); ?></h2>
					<p><?php echo esc_html($queried_post->post_content); ?></p>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<div class="contact-head">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12">
					<div class="contact-map">
						<!-- Map -->
						<div id="map">
							<?php if ( is_active_sidebar( 'google-map' ) ) { ?>
								<?php dynamic_sidebar( 'google-map' );?>
							<?php } ?>
						</div>
						<!--/ End Map -->
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-12">
					<div class="form-head">
						<!-- Form -->
						<form class="form" method="post">
							<div class="row">
								<?php if (get_theme_mod('free_education_frontpage_contact_form_option')):
									echo do_shortcode(get_theme_mod('free_education_frontpage_contact_form_option'));
								endif; ?>	
							</div>
						</form>
						<!--/ End Form -->
					</div>
				</div>
			</div>
		</div>
		<div class="contact-bottom">
			<div class="row">
				<?php free_education_contact_page_items();?>
			</div>
		</div>
	</div>
</section>
<!--/ End Contact Us -->
<?php 
get_footer(); 