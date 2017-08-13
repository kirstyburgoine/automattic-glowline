<?php
/**
* @package Glowline
* Template Name: Fullwidth Page
*/
get_header(); ?>

<main id="main" class="site-main">

	<div class="container clearfix">

		<?php
		if (have_posts()) : ?>

			<div class="content-fullwidth clearfix" id="content">

				<?php
				while (have_posts()) : the_post();

					get_template_part( 'partials/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
							comments_template();
					endif;

				endwhile;
				?>

			</div>

		<?php
		endif; ?>

	</div><!-- .container //-->

</main>

<?php get_footer(); ?>