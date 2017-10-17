<?php
/**
 * The template for displaying full content on posts and pages
 *
 * @package Glowline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_title( '<header><h1 class="post-title">', '</h1></header>' ); ?>

	<div class="post-content clearfix"><!-- Content Start -->

		<?php
		if ( has_post_thumbnail() ) :
		?>
			<div class="post-img">
				<?php the_post_thumbnail( 'glowline-standard-thumb' ); ?>
			</div>
		<?php
		endif;
		?>

		<div class="page-description">
			<?php the_content(); ?>
			<?php edit_post_link( esc_html__( 'Edit', 'glowline' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

		<div class="clearfix"></div>

		<div class="multipage-links">
			<?php
				wp_link_pages(
					array(
						'before'      => '<span class="meta-nav">' . esc_html__( 'Pages:', 'glowline' ) . '</span>',
						'after'       => '',
						'link_before' => '<span class="active">',
						'link_after'  => '</span>',
					)
				);
			?>
		</div>

	</div><!-- post-content End -->

</article>
