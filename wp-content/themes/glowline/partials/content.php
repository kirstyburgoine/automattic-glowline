<?php
/**
 * @package Glowline
 * The default template for displaying content on archive pages
 * This is not used for single as well because the markup on archive pages requires content to be in a list rather than <articles>
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
				the_category(', ');
			endif;
			?>
		</span>


		<?php the_title( '<div class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h2 class="entry-title">', '</h2></a></div>' ); ?>

		<?php glowline_posted_on(); ?>

	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-img">
			<a href="<?php esc_url( the_permalink() ); ?>"> <?php the_post_thumbnail('post-thumbnails'); ?></a>
		</div>
	<?php endif; ?>

	<?php the_content( sprintf(
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

	<div class="clearfix"></div>

	<div class="standard-bottom-meta">

		<?php glowline_comment_number(); ?>

		<div class="post-share">
			<?php glowline_share_text(); ?>
		</div>

	</div>

</li>
