<?php
/**
 * A template for slider content on homepage.
 *
 * @package Glowline
 */

?>
<?php
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

				<?php the_excerpt(); ?>

				<div class="read-more read-more-slider">
					<a href="<?php esc_url( the_permalink() ); ?>">
						<?php echo esc_html( 'Continue Reading...', 'glowline' ); ?>
					</a>
				</div>

			</div>
		</div>

	</div>

<?php
endforeach; ?>
