<?php
/**
* @package Glowline
* The template for displaying the sidebar
*/
?>
<?php
if ( is_active_sidebar( 'primary-sidebar' ) ){ ?>
<aside class="sidebar">
	<div class="widget">
<?php
dynamic_sidebar( 'primary-sidebar' );
?>
	</div>
</aside>
<?php } ?>