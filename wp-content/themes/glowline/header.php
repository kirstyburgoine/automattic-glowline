<?php
/**
 * The main header template for the theme
 *
 * @package Glowline
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'glowline' ); ?></a>

	<header class="header-wrapper clearfix" id="masthead" style="background-image: url(
	<?php
	if ( '' !== get_header_image() ) {
		echo esc_url( get_header_image() ); }
?>
);" role="banner">

		<div class="nav-wrapper">
			<div class="container header">
					<div class="logo">

						<?php
						if ( function_exists( 'the_custom_logo' ) ) {
							the_custom_logo();
						}
						?>

						<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
						?>

					</div>
					<div id="main-menu-wrapper">
						<button id="pull" class="toggle-mobile-menu" aria-controls="menu-1">Menu</button>
						<nav class="navigation clearfix mobile-menu-wrapper" role="navigation" aria-label="<?php esc_attr( 'Main Menu' ); ?>">
							<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'menu-1',
									'container'       => false,
									'menu_class'      => 'menu',
									'menu_id'         => 'menu-1',
									'walker'		  => new Aria_Walker_Nav_Menu(),
									'fallback_cb'     => 'glowline_wp_page_menu',
									'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
								)
							);
							?>
						</nav>
						<div id="searchform-wrap" class="main-searchform-wrap">
							<?php get_search_form(); ?>
						</div>
					</div>
			</div>
		</div>

		<?php
		// ------------------------------------------------------------------
		// ------------------------------------------------------------------
		// if ( is_front_page() && is_home() ) :
		?>

			<div class="main-logo container">

				<?php
				if ( is_front_page() && is_home() ) :
					if ( function_exists( 'the_custom_logo' ) ) {
						the_custom_logo();
					}
				endif;
				?>

				<?php
				if ( is_front_page() && is_home() ) :
				?>
					<h1 class="site-title"><span class="highlight"><?php esc_html( bloginfo( 'name' ) ); ?></span></h1>
				<?php
				else :
				?>
					<h2 class="site-title"><span class="highlight"><?php esc_html( bloginfo( 'name' ) ); ?></span></h2>
				<?php
				endif;
				?>

				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) :
				?>
					<p class="site-description"><span><?php echo esc_html( $description ); ?></span></p>
				<?php
				endif;
				?>

			</div>

			<?php
			if ( is_front_page() && is_home() ) :
			if ( glowline_has_featured_posts( 1 ) ) :
			?>
			<div class="container featured-posts">

				<div class="flexslider">
					<ul class="slides">
						<?php get_template_part( 'templates/main', 'slider' ); ?>
					</ul>
				</div>

			</div>
			<?php
			endif;
			endif;
			?>

		<?php
		// endif;
		?>

	</header>
