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

		<?php if(get_theme_mod('slider_on_off','slider_off')=='slider_on'):?>
		<?php  get_template_part( 'template/main', 'slider' ); ?>
		<?php endif; ?>
	</div> <!-- Main Heading End -->
</div>
</div> <!-- Main Header End -->
	<!--class="no-sidebar" full index-->
	<div id="page" class="clearfix" >
		<div class="content-wrapper clearfix">

			<div class="content">  <!-- right -->
			<main id="main" class="site-main" role="main">
			<?php
			$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 9,
				'paged' => $paged
			);

			$home_query = new WP_Query( $args );
			if ( $home_query->have_posts() ) :
			global $glowline_grid_layout;
			$glowline_grid_layout = get_theme_mod('dynamic_grid','standard-layout');
			?>
			<ul class="load_post <?php echo $glowline_grid_layout; ?>">
				<?php
				while ($home_query->have_posts()) : $home_query->the_post();
				if($glowline_grid_layout == 'standard-layout'):
						// Start the post formate loop.
					get_template_part( 'content', get_post_format() );
				else :
					// Start the post formate grid.
					get_template_part( 'content', 'grid');
				endif;
				endwhile;
				?>
			</ul>


			<?php
			else :
			// If no content, include the "No posts found" template.
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
			</main><!-- .site-main -->



		<div class="sidebar-wrapper">
		<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<!-- / content-wrapper end -->
</div>
<?php get_footer(); ?>