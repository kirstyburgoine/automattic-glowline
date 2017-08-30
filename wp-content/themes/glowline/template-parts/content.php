<?php
/**
 * @package Glowline
 * The default template for displaying content on archive pages
 * This is not used for single as well because the markup on archive pages requires content to be in a list rather than <articles>
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<header class="post-header">

		<?php glowline_posted_in(); ?>

		<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h2 class="entry-title">', '</h2></a></div>' ); ?>

		<?php glowline_posted_on(); ?>

	</header>

	<?php
	if ( has_post_thumbnail() ) :
	?>
		<div class="post-img">
			<a href="<?php esc_url( the_permalink() ); ?>"> <?php the_post_thumbnail( 'post-thumbnails' ); ?></a>
		</div>
	<?php
	endif;
	?>

	<?php
	the_content(
		sprintf(
			wp_kses(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'glowline' ),
				array(
					'span' => array(
						'class' => array( 'read-more' ),
					),
				)
			),
			get_the_title()
		)
	);
	?>

	<div class="clearfix"></div>

	<?php glowline_content_bottom_meta(); ?>

</article>
