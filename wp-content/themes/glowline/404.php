<?php
/**
* @package Glowline
* The template for displaying 404 pages (Not Found)
*/

get_header(); ?>
</div>
<div id="page" class="clearfix">
<div class="content"><!-- Content Start -->
<div class="page-content"><!-- blog-single -->
	<div class="post-title"><h1><?php _e( 'Not Found', 'glowline' ); ?></h1></div>
	<div class="page-description">
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'glowline' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</div>
</div>
<!-- / Content End -->

<div class="sidebar-wrapper">
<?php get_sidebar(); ?>
</div>

</div>
<?php get_footer(); ?>