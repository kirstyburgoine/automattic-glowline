<?php
/**
* @package Glowline
* The template for displaying the footer
*/
?>
<div class="footer-wrapper">
	<div class="container">
		<?php get_sidebar('footer'); ?>
		<div class="clearfix"></div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<ul>
				<li class="copyright">
					<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'glowline' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'glowline' ), 'WordPress' ); ?></a> <?php printf( __( 'Theme: %1$s by %2$s.', 'glowline' ), 'Glowline', '<a href="https://wordpress.com/themes/" rel="designer">WordPress.com</a>' ); ?>
				</li>

			</ul>



		</div>
	</div>
</div>
<?php wp_footer();
?>
</body>
</html>