<?php 
$free_education_frontpage_teacher_option = get_theme_mod( 'free_education_frontpage_teacher_option', 'show' );
if( $free_education_frontpage_teacher_option == 'show' ) :
	?>	
	<!-- Team -->
	<section class="team section">
		<div class="container">
			<div class="row">
				<div class="col-12 wow zoomIn">
					<div class="section-title">
						<?php $teacher_title = get_theme_mod('free_education_frontpage_teacher_title_option');
						$query_post = get_post($teacher_title);	
						?>
						<h2><?php echo esc_html($query_post->post_title);?></h2>
						<p><?php echo esc_html($query_post->post_content);?></p>
						<?php wp_reset_postdata();  ?>
					</div>
				</div>
			</div>
			<div class="row">
				<?php free_education_teacher_items();?>
			</div>
		</div>
	</section>
	<!--/ End Team -->
	<?php endif;?>		