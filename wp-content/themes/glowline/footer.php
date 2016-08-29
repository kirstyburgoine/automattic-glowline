<?php
/**
* The template for displaying the footer
* @since GlowLine 1.0
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
					<?php 
						$copyright_textbox = get_theme_mod( 'copyright_textbox');
					if( $copyright_textbox!=''){
						echo esc_html($copyright_textbox);
						} else { ?>
					<a href="http://wordpress.org"><?php printf(__('WordPress theme by %s','glowline'),'Glowline')?></a>
					<?php } ?>
				</li>
				<li class="social-icon">
					<?php glowline_social_links(); ?>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php wp_footer();
?>
</body>
</html>