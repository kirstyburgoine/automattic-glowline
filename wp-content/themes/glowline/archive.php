<?php
/**
* @package Glowline
* The template for displaying archive pages
*/
?>
<?php get_header(); ?>
</div>
<?php if (have_posts()) : ?>
<div class="container" class="clearfix">

	<?php the_archive_title('<div class="archive-title"><h1>', '<h1></div>') ?>

<?php if ( get_the_archive_description() ) : echo the_archive_description(); endif; ?>

</div>

<div id="page" class="clearfix right">
<!-- Content Start -->
<div class="content">
	<?php global $glowline_grid_layout; ?>
	<div id="main">
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

	</div>
<?php
	else :
	get_template_part( 'content', 'none' );
	endif;
?>

<div class="clearfix"></div>
</div>
</div>
<div class="sidebar-wrapper"><!-- left -->
<?php get_sidebar(); ?>
</div>
</div><!-- Content End -->
<?php get_footer(); ?>