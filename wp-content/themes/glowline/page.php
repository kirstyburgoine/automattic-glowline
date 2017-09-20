<?php
/**
 * The template for displaying all pages
 *
 * @package Glowline
 */

get_header(); ?>

<main id="main" class="site-main">

	<div class="container clearfix">

		<?php
		if ( have_posts() ) :
		?>

			<div class="content clearfix <?php glowline_fullwidth( $glowline_fullwidth ); ?>" id="content">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
							comments_template();
					endif;

				endwhile;
				?>

			</div>

		<?php
		endif;

		get_sidebar();
	?>

	</div><!-- .container //-->

</main>

<?php get_footer(); ?>
