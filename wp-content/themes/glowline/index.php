<?php
/**
 * The Index template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Glowline
 */

get_header(); ?>

<main id="main" class="site-main">

	<div class="container clearfix">

		<?php
		if ( have_posts() ) :
		?>

		<?php
		global $glowline_grid_layout;
		global $glowline_masonry_layout;
		?>

		<div class="content clearfix <?php glowline_grid_classes( $glowline_grid_layout, $glowline_masonry_layout ); ?> posts-container" id="content">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				if ( 'standard-layout' === $glowline_grid_layout ) :
					/*
					 * If layout is standard, include the Post-Format-specific template for the content.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				else :
					/*
					 * Otherwise, include the grid template for content.
					 */
					get_template_part( 'template-parts/content', 'grid' );
				endif;
			endwhile;
			?>

			<?php the_posts_navigation(); ?>

		</div> <!-- .content //-->

	<?php
		get_sidebar();

	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>

	</div><!-- .container //-->

</main>

<?php get_footer(); ?>
