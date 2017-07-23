<?php
/**
* @package Glowline
* The template for displaying the sidebar
*/
?>
<?php
if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<aside class="sidebar">
	<div class="widget">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside>
<?php endif; ?>