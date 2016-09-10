<?php
/**
* @package Glowline
* The template for displaying all pages
*/
get_header();

?>
</div>
<div id="page" class="clearfix">
<div class="content"><!-- Content Start -->
<div class="page-content"><!-- blog-single -->
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div class="post-title"><h1><?php the_title(); ?></h1></div>
<div class="page-description">
	<?php the_content(); ?>
	<?php edit_post_link( __( 'Edit', 'glowline' ), '<span class="edit-link">', '</span>' ); ?>
</div>
	<div class="multipage-links">
		<?php
			wp_link_pages( array(
						'before'      => '<span class="meta-nav">' . __( 'Pages:', 'glowline' ) . '</span>',
						'after'       => '',
						'link_before' => '<span class="active">',
						'link_after'  => '</span>',
					) );
		?>
	</div>
	<div class="clearfix"></div>
<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
comments_template();
}
endwhile;
endif;
?>
</div>
</div>
<!-- / Content End -->

<div class="sidebar-wrapper">
<?php get_sidebar(); ?>
</div>

</div>
<?php get_footer(); ?>