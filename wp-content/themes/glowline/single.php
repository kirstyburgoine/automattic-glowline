<?php
/**
* @package Glowline
* The Template for displaying all single posts
*/
get_header(); ?>

<main id="main" class="site-main">

	<div class="container clearfix">

		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();

				get_template_part( 'partials/content', 'post' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile;
		endif;

		get_sidebar();
	?>

	</div><!-- .container //-->

</main>

<?php get_footer(); ?>
