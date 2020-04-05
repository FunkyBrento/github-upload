<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Free_Education
 */

?>

<!-- Footer -->
<footer class="footer overlay section">
<?php if(is_active_sidebar( 'footer' )): ?>
	<!-- Footer Top -->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<?php 
					dynamic_sidebar( 'footer' ); 
				?>
			</div>
		</div>
	</div>
	<!--/ End Footer Top -->
<?php endif; ?>
	<!-- Footer Bottom -->
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bottom-head">
						<div class="row">
							<div class="col-12">
								<!-- Social -->
								<?php 
								$free_education_top_footer_social_option = get_theme_mod( 'free_education_top_footer_social_option', 'show' );
								if( $free_education_top_footer_social_option == 'show' ) :?>
									<!-- Social -->
									<?php free_education_social_media_items();?>
									<!-- End Social -->
								<?php endif;?>	
								<!-- End Social -->
								<!-- Copyright -->
								<div class="copyright">
									<p><?php esc_html_e('&copy; All Right Reserved ','free-education');  echo  esc_html(date('Y'));?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></p>
								</div>
								<!--/ End Copyright -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Footer Bottom -->
</footer>
<!--/ End Footer -->

<?php wp_footer(); ?>

</body>
</html>
