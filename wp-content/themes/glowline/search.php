<?php
/**
 * @package Glowline
 * The template for displaying Search Results pages
 */
get_header(); ?>

<main id="main" class="site-main">

	<div class="container clearfix">

<?php
if ( have_posts() ) :
	?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				printf( esc_html__( 'Search Results for: %s', 'glowline' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header //-->

		<?php
		global $glowline_grid_layout;
		global $glowline_masonry_layout;
		?>

		<div class="content clearfix <?php glowline_grid_classes( $glowline_grid_layout, $glowline_masonry_layout, 'glowline' ); ?> posts-container" id="content">

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();
			if ( 'standard-layout' == $glowline_grid_layout ) :
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
