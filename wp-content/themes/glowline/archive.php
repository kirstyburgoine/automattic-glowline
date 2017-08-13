<?php
/**
 * The template for displaying archive pages
 *
 * @package Glowline
 */
get_header(); ?>

<main id="main" class="site-main">

	<div class="container clearfix">

	<?php
	if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="archive-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header //-->

		<div class="content clearfix">

			<?php
			global $glowline_grid_layout;
			global $glowline_masonry_layout; ?>

			<ul class="<?php
				echo esc_attr($glowline_grid_layout, 'glowline');
				if ( 'standard-layout' !== $glowline_grid_layout ) :
					echo esc_attr( $glowline_masonry_layout, 'glowline' );
				endif;?> posts-container" id="posts-container">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					if ( 'standard-layout' == $glowline_grid_layout ):
					/*
					 * If layout is standard, include the Post-Format-specific template for the content.
					 */
					get_template_part( 'partials/content', get_post_format() );
					else :
					/*
					 * Otherwise, include the grid template for content.
					 */
					get_template_part( 'partials/content', 'grid' );
					endif;
				endwhile;
				?>

			</ul>

			<?php the_posts_navigation(); ?>

		</div> <!-- .content //-->

	<?php
		get_sidebar();

	else :
		get_template_part( 'partials/content', 'none' );
	endif;
	?>

	</div><!-- .container //-->

</main>

<?php get_footer(); ?>
