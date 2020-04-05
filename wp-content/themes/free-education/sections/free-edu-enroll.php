<?php $free_education_frontpage_enroll_option = get_theme_mod( 'free_education_frontpage_enroll_option', 'show' );
if( $free_education_frontpage_enroll_option == 'show' ) :?>
	<!-- Enroll -->
	<section class="enroll overlay section" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="row">
						<div class="col-lg-6 col-12 wow fadeInUp" data-wow-delay="0.4s">
							<!-- Single Enroll -->
							<div class="enroll-form">
								<div class="form-title">
									<?php 
									$enroll_form_title = get_theme_mod('free_education_frontpage_enroll_form_title_option');
									$enroll_form_subtitle = get_theme_mod('free_education_frontpage_enroll_form_subtitle_option');
									?>
									<h2><?php echo esc_html($enroll_form_title);?></h2>
									<p><?php echo esc_html($enroll_form_subtitle);?></p>
								</div>
								<!-- Form -->
								<form class="form" method="post">
									<?php if (get_theme_mod('free_education_contact_form_code')):
										echo do_shortcode(get_theme_mod('free_education_contact_form_code')); 
									endif; ?>		
								</form>
								<!--/ End Form -->
							</div>
							<!-- Single Enroll -->
						</div>
						<div class="col-lg-6 col-12 wow fadeInUp" data-wow-delay="0.6s">
							<div class="enroll-right">
								<div class="section-title">
									<?php
									$enroll_title = get_theme_mod('free_education_frontpage_enroll_title_option');
									$query_post = get_post($enroll_title);
									?>
									<h2><?php echo esc_html($query_post->post_title);?></h2>
									<p><?php echo esc_html($query_post->post_content);?></p>
									<?php wp_reset_postdata();?>
								</div>
							</div>
							<!-- Skill Main -->
							<div class="skill-main">
								<div class="row">
									<?php free_education_enroll_skill_items();?>
								</div>
							</div>
							<!--/ End Skill Main -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Enroll -->
	<?php endif;?>		