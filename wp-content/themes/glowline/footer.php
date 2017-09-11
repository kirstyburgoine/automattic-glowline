<?php
/**
 * The template for displaying the footer
 *
 * @package Glowline
 */

?>

		<?php get_sidebar( 'footer' ); ?>

		<footer id="colophon" class="site-footer">

			<div class="site-info">
				<div class="container">

					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'glowline' ) ); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'glowline' ); ?>" rel="generator"><?php /* translators: %s: Name of System. */ printf( esc_html__( 'Proudly powered by %s', 'glowline' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php
						/* translators: %1$s: Name of theme. %2$s: Name of theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'glowline' ), 'Glowline', '<a href="https://themehunk.com" rel="designer">Theme Hunk</a>' );
					?>

				</div>
			</div>

		</footer> <!-- closes #colophon -->

		<?php wp_footer(); ?>

	</body>
</html>
