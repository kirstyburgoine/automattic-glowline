<?php
/**
 * The template for displaying the sidebar
 *
 * @package Glowline
 */

?>
<?php
if ( is_active_sidebar( 'sidebar-1' ) ) :
?>

	<div class="sidebar-wrapper"><!-- left -->
		<aside class="sidebar">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside>
	</div>

<?php endif; ?>
