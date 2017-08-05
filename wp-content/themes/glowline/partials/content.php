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

<?php else:
/*
 * Else, this is standard post content on archive pages
 * TODO: Check <a><h2></h2></a> is valid on title
 * TODO: Review current category link - Messy
 */
?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<header class="post-header">

		<span class="post-category">
			<?php
			// Get the title of the current category
			$current_category = single_cat_title("", false);
		    // Get the ID of the current category
		    $category_id = get_cat_ID( $current_category );
		    // Get the URL of this category too
		    $category_link = get_category_link( $category_id );


			if ( true == $current_category ) : ?>

				<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo esc_attr($current_category);?>"><?php echo esc_html($current_category);?></a>

			<?php
			else :
				$categories_list = get_the_category_list( __( ', ', 'glowline' ) );
				echo $categories_list;
			endif;
			?>
		</span>


		<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h2 class="entry-title">', '</h2></a></div>' ); ?>

		<?php glowline_posted_on(); ?>

	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-img">
			<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('post-thumbnails'); ?></a>
		</div>
	<?php endif; ?>

	<?php the_content( sprintf(
		wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
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

	<div class="clearfix"></div>

	<div class="standard-bottom-meta">

		<?php glowline_comment_number(); ?>

		<div class="post-share">
			<?php glowline_share_text(); ?>
		</div>

	</div>

</li>

<?php endif; ?>
