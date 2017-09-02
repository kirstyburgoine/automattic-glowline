<?php
/**
 * The Template for displaying all single posts
 *
 * @package Glowline
 */

get_header(); ?>

<main id="main" class="site-main">

	<div class="container clearfix">

		<?php
		if ( have_posts() ) :
		?>

			<div class="content clearfix" id="content">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'post' );

					the_post_navigation( array(
			            'prev_text'                  => __( 'Previous: %title' ),
			            'next_text'                  => __( 'Next: %title' ),
			            'in_same_term'               => true,
			            'screen_reader_text' => __( 'Continue Reading' ),
			        ) );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile;
				?>

			</div>

		<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;

		get_sidebar();
	?>

	</div><!-- .container //-->

</main>

<?php get_footer(); ?>
