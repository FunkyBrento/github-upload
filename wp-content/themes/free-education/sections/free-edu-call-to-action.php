<?php $free_education_frontpage_call_to_action_option = get_theme_mod( 'free_education_frontpage_call_to_action_option', 'show' );
if( $free_education_frontpage_call_to_action_option == 'show' ) :
	$calltoaction_title = get_theme_mod('free_education_frontpage_call_to_action_title_option');
	$query_post = get_post($calltoaction_title);
	$calltoaction_img_url =  get_the_post_thumbnail_url($calltoaction_title,'free-education-calltoaction-1343x508');
	$button_text = get_theme_mod('free_education_frontpage_call_to_action_button_text_option');
	$button_url = get_theme_mod( 'free_education_frontpage_call_to_action_button_url_option' );
	?>
	<!-- Call To Action -->
	<section class="cta" data-stellar-background-ratio="0.5" style="background-image:url(<?php echo esc_url( $calltoaction_img_url);?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 offset-lg-6 col-12">
					<div class="cta-inner overlay">
						<div class="text-content">
							<h2><?php echo esc_html($query_post->post_title);?></h2>
							<p><?php echo esc_html($query_post->post_content);?></p>
							<div class="button">
								<a class="btn primary wow fadeInUp" href="<?php echo esc_url($button_url);?>" ><?php echo esc_html($button_text);?></a>
							</div>
							<?php wp_reset_postdata();?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Call To Action -->
	<?php endif;?>		