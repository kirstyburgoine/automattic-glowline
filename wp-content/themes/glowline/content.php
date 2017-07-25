<?php
/**
* @package Glowline
* The default template for displaying content
 */
?>
<?php if (is_single()) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-meta"><!-- Single Meta Start -->

		<div class="post-category">
		<?php
		$current_category = single_cat_title("", false);
		if ( true == $current_category ) :
			echo $current_category;
		else :
			$categories_list = get_the_category_list( __( ', ', 'glowline' ) );
		echo $categories_list;
		endif;
		?>
		</div>

	</div>

		<?php the_title('<div class="post-title"><h1><span>', '</span></h1></div>'); ?>

	<div class="post-meta">
		<span class="post-date"><?php the_time( get_option('date_format') ); ?></span>
	</div>
	</div><!-- Single Meta End -->
	<div class="post-content clearfix"><!-- Content Start -->
	<div class="post-img">
		<a href="#"></a>
	</div>
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
	<div class="single-bottom-meta">
		<div class="tagcloud"><?php echo get_the_tag_list( '', __( ' ', 'glowline' ) ); ?></div>
		<?php if(get_theme_mod('single_social_share','on')=='on'): ?>
		<div class="post-share">
			<?php glowline_share_text(); ?>
		</div>
		<?php endif; ?>
	</div>
	</div><!-- Content End -->


		<?php
		the_post_navigation( array(
            'prev_text'                  => '<span class="meta-nav" aria-hidden="true">' . __( '%title', 'glowline' ) . '</span> ' ,
            'next_text'                  => '<span class="meta-nav" aria-hidden="true">' . __( '%title', 'glowline' ) . '</span> ' ,
            'in_same_term'               => true,
            'taxonomy'                   => __( 'post_tag' ),
            'screen_reader_text' => __( 'Continue Reading' ),
        ) );
		?>



	<div class="clearfix"></div>
	<?php edit_post_link( __( 'Edit', 'glowline' ), '<span class="edit-link">', '</span>' );
	?>
</article>

<?php else: ?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="post-header">
		<div class="post-category">
			<?php
			$current_category = single_cat_title("", false);
			if ( true == $current_category ) :
				echo $current_category;
			else :
				$categories_list = get_the_category_list( __( ', ', 'glowline' ) );
			echo $categories_list;
			endif;
			?>
		</div>
		<div class="post-title">
			<a href="<?php the_permalink(); ?>">
				<h2><?php the_title(); ?></h2>
			</a>
		</div>
		<div class="post-meta">
			<span class="post-date"><?php the_time( get_option('date_format') ); ?></span>
		</div>
	</div>
	<div class="post-img">
		<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('post-thumbnails'); ?></a>
	</div>
	<?php the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_s' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
	?>
	<div class="clearfix"></div>
	<div class="standard-bottom-meta">

		<?php glowline_comment_number(); ?>
		<div class="post-share">
			<?php glowline_share_text(); ?>
		</div>
	</div>
</li>
<?php endif; ?>