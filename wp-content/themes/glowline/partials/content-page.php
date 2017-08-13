<?php
/**
* @package Glowline
* The template for displaying full content on posts and pages
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>

	<?php the_title('<div class="post-title"><h1><span>', '</span></h1></div>'); ?>

	<div class="post-content clearfix"><!-- Content Start -->

		<div class="post-img">
			<a href="#"></a>
		</div>

		<div class="page-description">
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit', 'glowline' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

		<div class="clearfix"></div>

		<div class="multipage-links">
			<?php
				wp_link_pages( array(
							'before'      => '<span class="meta-nav">' . __( 'Pages:', 'glowline' ) . '</span>',
							'after'       => '',
							'link_before' => '<span class="active">',
							'link_after'  => '</span>',
						) );
			?>
		</div>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
				comments_template();
		endif;
		?>

	</div><!-- Content End -->

</article>
