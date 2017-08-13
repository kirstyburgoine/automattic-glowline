<?php
/**
* @package Glowline
* The template for displaying posts in the dynamic grid view
*/
?>
<?php global $glowline_grid_layout; ?>

<li id="post-<?php the_ID(); ?>" <?php post_class('grid-post'); ?> >

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-img">
			<a href="<?php esc_url( the_permalink() ); ?>"><?php glowline_grid_thumb($glowline_grid_layout); ?></a>
		</div>
	<?php endif; ?>


	<div class="post-content">

		<div class="post-content-inner">

			<header class="post-header">

				<span class="post-category">
					<?php echo the_category(', '); ?>
				</span>

				<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h2 class="entry-title">', '</h2></a></div>' ); ?>


				<?php glowline_posted_on(); ?>

				<?php glowline_comment_number(); ?>

			</header>

			<div class="description">
			<?php
				the_content( sprintf(
					wp_kses(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_s' ),
						array(
							'span' => array(
								'class' => array('read-more'),
							),
						)
					),
					get_the_title()
				) );
			?>
			</div> <!-- .description //-->

		</div> <!-- .post-content-inner //-->
	</div> <!-- .post-content //-->

</li>
