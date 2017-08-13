<?php
/**
* @package Glowline
* The template for displaying the sidebar footer
*/

if ( ! is_active_sidebar( 'sidebar-2'  )
&& ! is_active_sidebar( 'sidebar-3' )
&& ! is_active_sidebar( 'sidebar-4'  )
) :
	return;
endif;
?>

<div class="container">

	<div class="footer">
	 	<div class="footer-widget-column footer-widget-3column-active">

			<?php
			if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<div class="widget">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			<?php
			endif; ?>

			<?php
			if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div class="widget">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			<?php
			endif; ?>

			<?php
			if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
				<div class="widget">
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</div>
			<?php
			endif; ?>

		</div>
	</div>

	<div class="clearfix"></div>

</div>