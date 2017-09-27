<?php
/**
 * The template for displaying full content on posts
 *
 * @package Glowline
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="single-meta"><!-- Single Meta Start -->

		<?php glowline_posted_in(); ?>

		<?php the_title( '<h1 class="post-title">', '</h1>' ); ?>

		<?php glowline_single_posted_on(); ?>

	</header><!-- Single Meta End -->

	<div class="post-content clearfix"><!-- Content Start -->

		<?php
		if ( has_post_thumbnail() ) :
		?>
			<div class="post-img">
				<a href="<?php esc_url( the_permalink() ); ?>"> <?php the_post_thumbnail( 'post-thumbnails' ); ?></a>
			</div>
		<?php
		endif;
		?>

		<div class="description clearfix">
			<?php the_content(); ?>
		</div>



		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="multipage-links"><span class="meta-nav">' . esc_html__( 'Pages:', 'glowline' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span class="active">',
					'link_after'  => '</span>',
				)
			);
			?>
	</div><!-- Content End -->

	<?php glowline_single_bottom_meta(); ?>

</article>
