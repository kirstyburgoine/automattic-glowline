<?php
/**
* @package Glowline
* The template for displaying all pages
*/

get_header(); ?>

<main id="main" class="site-main">

	<div class="container clearfix">

		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();

				get_template_part( 'partials/content', 'page' );

				/* moved comments into content-page */

			endwhile;
		endif;

		get_sidebar();
	?>

	</div><!-- .container //-->

</main>

<?php get_footer(); ?>
