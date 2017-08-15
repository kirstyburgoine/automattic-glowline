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

					<?php dynamic_sidebar( 'sidebar-2' ); ?>

			<?php
			endif; ?>

			<?php
			if ( is_active_sidebar( 'sidebar-3' ) ) : ?>

					<?php dynamic_sidebar( 'sidebar-3' ); ?>

			<?php
			endif; ?>

			<?php
			if ( is_active_sidebar( 'sidebar-4' ) ) : ?>

					<?php dynamic_sidebar( 'sidebar-4' ); ?>

			<?php
			endif; ?>

		</div>
	</div>

	<div class="clearfix"></div>

</div>
