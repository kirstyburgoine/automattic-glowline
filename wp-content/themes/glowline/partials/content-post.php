<?php
/**
* @package Glowline
* The template for displaying full content on posts and pages
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="single-meta"><!-- Single Meta Start -->

		<div class="post-category">
			<?php
			$current_category = single_cat_title("", false);
			if ( true == $current_category ) :
				echo $current_category;
			else :
				the_category(', ');
			endif;
			?>
		</div>

		<?php the_title('<h1 class="post-title">', '</h1>'); ?>

		<div class="post-meta">
			<span class="post-date"><?php the_time( get_option('date_format') ); ?></span>
		</div>

	</header><!-- Single Meta End -->

	<div class="post-content clearfix"><!-- Content Start -->

		<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-img">
			<a href="<?php esc_url( the_permalink() ); ?>"> <?php the_post_thumbnail('post-thumbnails'); ?></a>
		</div>
		<?php endif; ?>

		<div class="description">
			<?php the_content( sprintf(
					wp_kses(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'glowline' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) ); ?>
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

	</div><!-- Content End -->

	<footer class="single-bottom-meta">

		<div class="tagcloud"><?php echo get_the_tag_list( '', __( ' ', 'glowline' ) ); ?></div>

		<div class="clearfix"></div>

		<?php glowline_author_bio(); ?>


		<?php
		the_post_navigation( array(
            'prev_text'                  => '<span class="meta-nav" aria-hidden="true">' . __( '%title', 'glowline' ) . '</span> ' ,
            'next_text'                  => '<span class="meta-nav" aria-hidden="true">' . __( '%title', 'glowline' ) . '</span> ' ,
            'in_same_term'               => true,
            'taxonomy'                   => __( 'post_tag' ),
            'screen_reader_text' => __( 'Continue Reading' ),
        ) );
		?>

	</footer>
	<div class="clearfix"></div>

	<?php edit_post_link( __( 'Edit', 'glowline' ), '<span class="edit-link">', '</span>' ); ?>

</article>
