<?php
/**
 * The template for displaying archive pages
 *
 * @package Glowline
 */
get_header(); ?>

<main id="main">

	<div class="container" class="clearfix">

	<?php
	if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header //-->

		<div class="content">

			<?php global $glowline_grid_layout; ?>

			<ul class="<?php esc_attr($glowline_grid_layout, 'glowline'); ?>" id="posts-container">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					if ( 'standard-layout' == $glowline_grid_layout ):
					/*
					 * IIf ayout is standard, iclude the Post-Format-specific template for the content.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
					else :
					/*
					 * Otherwise, include the grid template for content.
					 */
					get_template_part( 'content', 'grid' );
					endif;
				endwhile;
				?>

			</ul>

			<?php the_posts_navigation(); ?>

		</div> <!-- .content //-->

	<?php
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;


	get_sidebar(); ?>

	</div><!-- .container //-->

<?php get_footer(); ?>

</main>
