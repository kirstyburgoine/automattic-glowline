<?php
/**
 * The default template for displaying content on archive pages.
 *
 * @package Glowline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<header class="post-header">

		<?php glowline_posted_in(); ?>

		<?php the_title( '<div class="post-title"><h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2></div>' ); ?>

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
			wp_kses( /* translators: %s: Name of of post. Only seen by screenreaders. */
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
