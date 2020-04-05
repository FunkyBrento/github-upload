<?php $free_education_frontpage_course_option = get_theme_mod( 'free_education_frontpage_course_option', 'show' );
if( $free_education_frontpage_course_option == 'show' ) :?>
	<!-- Courses -->
	<section class="courses section-bg section">
		<div class="container">
			<div class="row">
				<div class="col-12 wow zoomIn">
					<div class="section-title">
						<?php $course_title = get_theme_mod('free_education_frontpage_course_title_option');
						$query_post = get_post($course_title);	
						?>
						<h2><?php echo esc_html($query_post->post_title);?></h2>
						<p><?php echo esc_html($query_post->post_content);?></p>
						<?php wp_reset_postdata();  ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="course-slider">
						<?php
						$args    = array(
							'post_type'      => 'lp_course',
							'post_status'    => 'publish',
							'posts_per_page' => 3,
							'orderby' => 'post__in',
						);
						$courses = new WP_Query( $args );

						if ( $courses->have_posts() ) {
							while ( $courses->have_posts() ) { 
								$courses->the_post();
								$postid   = get_the_ID();
								$duration = get_post_meta( $postid, '_lp_duration',true );
								
								?>
								<!-- Single Course -->
								<div class="single-course">
									<div class="course-head overlay">
										<?php if (has_post_thumbnail()):
											$image_url = get_the_post_thumbnail_url($postid,'free-education-frontpage-service-image-370x250');
											?>
											<img src="<?php echo esc_url($image_url);?>" alt="#">
											<a href="<?php the_permalink();?>" class="btn"><i class="fa fa-link"></i></a>
										<?php endif;?>
									</div>
									<div class="single-content">
										<h4><a href="<?php the_permalink();?>"><span>
											<?php $terms =  get_the_terms( $postid, 'course_category' );
											if ( $terms && ! is_wp_error( $terms ) ) {?>
												<?php echo esc_html($terms[0]->name);?>
											<?php }?>
											</span><?php the_title();?></a></h4>
											<?php the_excerpt();?>
										</div>
										<div class="course-meta">
											<div class="meta-left">
												<span><i class="fa fa-users"></i><?php free_education_course_students();?> <?php echo esc_html__('Seat','free-education');?></span>
												<span><i class="fa fa-clock-o"></i><?php echo esc_html($duration);?></span>
											</div>
											<span class="price"><?php free_education_course_price();?></span>
										</div>
									</div>
									<!--/ End Single Course -->
								<?php }
							} ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Courses -->	
		<?php endif;?>	