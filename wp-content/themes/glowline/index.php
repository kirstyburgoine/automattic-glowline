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