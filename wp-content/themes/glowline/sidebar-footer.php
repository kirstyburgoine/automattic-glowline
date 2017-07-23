<?php
/**
* @package Glowline
* The template for displaying the sidebar footer
*/
?>
<div class="footer">
 	<div class="footer-widget-column footer-widget-3column-active">
		<?php
		if ( ! is_active_sidebar( 'sidebar-2'  )
		&& ! is_active_sidebar( 'sidebar-3' )
		&& ! is_active_sidebar( 'sidebar-4'  )
		) :
		return;
		endif;
		?>
		<div class="widget">
			<?php
			if ( is_active_sidebar( 'sidebar-2' ) ) :
			dynamic_sidebar( 'sidebar-2' );
			endif;
		?>
		</div>
		<div class="widget">
			<?php
			if ( is_active_sidebar( 'sidebar-3' ) ) :
			dynamic_sidebar( 'sidebar-3' );
			endif;
		?>
		</div>
		<div class="widget">
			<?php
			if ( is_active_sidebar( 'sidebar-4' ) ) :
			dynamic_sidebar( 'sidebar-4' );
			endif;
			?>
		</div>
	</div>
</div>