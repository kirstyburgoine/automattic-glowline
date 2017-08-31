<?php
/**
 * A template for slider content on homepage.
 *
 * @package Glowline
 */

?>
<?php
// TODO : Check new functions should be used.
$featured_posts = glowline_get_featured_posts();

foreach ( $featured_posts as $post ) :
	setup_postdata( $post );
?>

	<div class="item">

		<?php
		if ( has_post_thumbnail() ) :
		?>
			<a href="<?php esc_url( the_permalink() ); ?>">
				<?php the_post_thumbnail( 'glowline-custom-slider-thumb' ); ?>
			</a>
		<?php
		endif;
		?>

		<div class="slider-post-content-wrapper">
			<div class="slider-post-content">

				<?php glowline_posted_in(); ?>

				<?php the_title( '<div class="slider-post-title"><h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2></div>' ); ?>

				<?php glowline_posted_on(); ?>
<!-- 				<div class="slider-post-date">
					<span>
						<a><?php //the_time( get_option( 'date_format' ) ); ?></a>
					</span>
				</div> -->

				<?php
				the_content(
					sprintf(
						wp_kses( /* translators: %s: Name of of post. Only seen by screenreaders. */
							__( 'Continue Reading...<span class="screen-reader-text"> "%s"</span>', 'glowline' ),
							array(
								'div' => array(
									'class' => array( 'read-more, read-more-slider' ),
								),
							)
						),
						get_the_title()
					)
				);
				?>

			</div>
		</div>

	</div>

<?php
endforeach; ?>
