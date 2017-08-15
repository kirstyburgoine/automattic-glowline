<?php
/**
* @package Glowline
* The template for displaying the footer
*/
?>
		<div class="footer-wrapper" id="footer">

			<?php get_sidebar('footer'); ?>

		</div> <!-- closes .footer-wrapper //-->

		<footer id="colophon" class="site-footer">

			<div class="site-info">
				<div class="container">

					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'glowline' ) ); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'glowline' ); ?>" rel="generator"><?php printf( esc_html__( 'Proudly powered by %s', 'glowline' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'glowline' ), 'Glowline', '<a href="https://wordpress.com/themes/" rel="designer">WordPress.com</a>' );
					?>

				</div>
			</div>

		</footer> <!-- closes #colophon -->

		<?php wp_footer();?>

	</body>
</html>
