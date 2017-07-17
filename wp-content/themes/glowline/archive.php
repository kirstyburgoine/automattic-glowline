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
<div class="archive-title">
	<h1><?php the_archive_title() ?></h1>
</div>
<?php if ( get_the_archive_description() ) : echo the_archive_description(); endif; ?>

</div>

<div id="page" class="clearfix right">
<!-- Content Start -->
<div class="content">
	<?php global $grid_layout; ?>
	<div id="main">
		<ul class="<?php echo $grid_layout; ?>">
			<?php
			if($grid_layout=='standard-layout'):
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
<?php the_posts_pagination( array(
    'mid_size' => 2,
    'prev_text' => __( 'Back', 'textdomain' ),
    'next_text' => __( 'Onward', 'textdomain' ),
) ); ?>
</div>
</div>
<div class="sidebar-wrapper"><!-- left -->
<?php get_sidebar(); ?>
</div>
</div><!-- Content End -->
<?php get_footer(); ?>