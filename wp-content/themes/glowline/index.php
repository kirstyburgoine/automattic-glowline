<?php
/**
* @package Glowline
* The Index template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
*/
get_header();
$value = get_post_meta( $post->ID, 'glowline_sidebar_dyn', true );
?>
</div>
<div id="page" class="clearfix <?php echo $value; ?>">
<div class="content"><!-- Content Start -->
<div class="page-content"><!-- blog-single -->
<?php if (have_posts()) : while (have_posts()) : the_post();
	get_template_part('content');
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
	comments_template();
	}

endwhile; endif;
?>
</div>
</div>
<!-- / Content End -->
<?php if($value!='no-sidebar'): ?>
<div class="sidebar-wrapper">
<?php get_sidebar(); ?>
</div>
<?php endif; ?>
</div>
<?php get_footer(); ?>