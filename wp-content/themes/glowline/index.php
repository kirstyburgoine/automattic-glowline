<?php
/**
* @package Glowline
* The Index template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
* Template Name: Home
*/
get_header();

?>
<div class="container">
	<!-- Main Heading Start -->
	<div class="main-heading">
		<!-- Logo Start -->
		<div class="main-logo">
		<?php glowline_the_custom_logo(); ?>
		<?php
			if ( is_front_page() && is_home() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; ?></p>
		<?php endif;  ?>
		</div>
		<!-- / Logo End -->



		<?php if ( glowline_has_featured_posts( 1 ) ) : ?>
			<div class="slider">
    			<div id="owl-demo" class="owl-carousel">
					<?php get_template_part( 'templates/main', 'slider' ); ?>
				</div>
			</div>
		<?php endif; ?>



	</div> <!-- Main Heading End -->
</div>

</div> <!-- Main Header End -->

	<!--class="no-sidebar" full index-->
	<div id="page" class="clearfix" >
		<div class="content-wrapper clearfix">

			<div class="content">  <!-- right -->
			<?php if (have_posts()) : ?>

				<?php global $glowline_grid_layout; ?>

				<main id="main" class="site-main" role="main">
					<?php
					$glowline_grid_layout = get_theme_mod('dynamic_grid','standard-layout');
					?>

					<ul class="<?php esc_html_e($glowline_grid_layout, 'glowline'); ?>" id="posts-container">
						<?php
						if ( 'standard-layout' == $glowline_grid_layout ):
								// Start the post formate loop.
							while ( have_posts() ) : the_post();
								get_template_part( 'content', get_post_format() );
							endwhile;
						else :
							// Start the post formate grid.
							while ( have_posts() ) : the_post();
								get_template_part( 'content', 'grid' );
							endwhile;
						endif;
						// If no content, include the "No posts found" template.
						?>
					</ul>
				</main>

			<?php else :
				get_template_part( 'content', 'none' );
				endif;
			?>

			<div class="clearfix"></div>
			</div>

			<div class="sidebar-wrapper">
			<?php get_sidebar(); ?>
			</div>

		</div>
	</div>
<!-- / content-wrapper end -->
</div>
<?php get_footer(); ?>