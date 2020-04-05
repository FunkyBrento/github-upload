<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Free_Education
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Header -->
	<header class="header">
		<?php 
		get_template_part( 'template-parts/header/header','top' );
		get_template_part( 'template-parts/header/header','inner' );
		get_template_part( 'template-parts/header/header','menu' );
		?>
	</header>

	<?php if( is_home() || (!is_front_page())):?>
	<!-- Start Breadcrumbs -->
	<section class="breadcrumbs overlay" style="background: url('<?php echo esc_url(get_header_image());?>')">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php
					if ( is_archive() ) {
						the_archive_title( '<h2>', '</h2>' );
					}
					elseif(is_home()){
						echo '<h2>';
						bloginfo('name');
						echo '</h2>';
					}
					elseif(is_404()){
						echo '<h2>';
						echo esc_html__( '404 page','free-education' );
						echo '</h2>';
					}
					elseif(is_search()){
						echo '<h2>';
								the_search_query();
						echo  '</h2>';
					}
					else{
						echo '<h2>';
						echo esc_html( get_the_title() );
						echo '</h2>';
					}?>
					<?php if(!is_home()): ?>
						<ul class="bread-list">
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'free-education' );?><i class="fa fa-angle-right"></i></a></li>
							<li class="active"><a href="<?php the_permalink();?>">
								<?php
								if ( is_archive() ) {
									the_archive_title();
								}
								elseif(is_404()){
									echo esc_html__( '404 page','free-education' );
								}
								elseif(is_search()){
									the_search_query();
								}
								else{
									echo esc_html( get_the_title() );
								}?>
							</a></li>
						</ul>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>
	<!--/ End Breadcrumbs -->
<?php endif;?>
