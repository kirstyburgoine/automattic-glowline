<?php
/**
* @package Glowline
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'glowline' ); ?></a>

	<!-- Main Header Start -->
	<header class="header-wrapper clearfix" id="masthead">

		<!-- Top Header Start -->
		<div class="nav-wrapper">
			<div class="container header">
					<!-- Logo Start -->
					<div class="logo">

						<?php glowline_the_custom_logo(); ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

					</div>
					<!-- Menu Start -->
					<div id="main-menu-wrapper">
						<button href="#" id="pull" class="toggle-mobile-menu"></button>
						<nav class="navigation clearfix mobile-menu-wrapper">
							<?php
							wp_nav_menu(
								array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'menu',
								'menu_id'         => 'menu-1',
								'fallback_cb'     => 'glowline_wp_page_menu'
								)
							);
							?>
						</nav>
						<!-- search Start -->
						<div id="searchform-wrap" class="main-searchform-wrap">
							<?php  get_search_form(); ?>
						</div>
					</div>
			</div>
		</div>

		<?php
		// ------------------------------------------------------------------
		// ------------------------------------------------------------------
		if ( is_front_page() && is_home() ) : ?>

			<div class="main-logo container">

				<?php glowline_the_custom_logo(); ?>

				<h1 class="site-title"><?php esc_html( bloginfo( 'name' ) ); ?></h1>

				<?php
				$description = get_bloginfo( 'description', 'display' );

				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html( $description ); ?></p>
				<?php
				endif;  ?>

			</div>
			<!-- Ends Main Logo -->


			<!-- Slider Area -->
			<?php
			if ( glowline_has_featured_posts( 1 ) ) : ?>
			<div class="container featured-posts">

				<div class="slider">
		    		<div id="owl-demo" class="owl-carousel">
						<?php get_template_part( 'templates/main', 'slider' ); ?>
					</div>
				</div>

			</div>
			<?php
			endif; // ends if featured posts ?>

		<?php // Ends if front page and home
		endif;
		// ------------------------------------------------------------------
		// ------------------------------------------------------------------
		?>

	</header>
