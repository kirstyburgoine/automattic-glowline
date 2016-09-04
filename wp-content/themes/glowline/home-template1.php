<?php
/**
* @package Glowline
* Template Name: Fullwidth Page
*/
get_header();
?>
</div>
<div id="page" class="clearfix <?php echo $value; ?>">
<div class="content"><!-- Content Start -->
<div class="page-content"><!-- blog-single -->
<?php if (have_posts()) : while (have_posts()) : the_post();?>
<div class="page-title"><h1><?php the_title(); ?></h1></div>
<div class="page-description">

<?php // get all the categories from the database
$cats = get_categories();
//var_dump($cats);
// loop through the categries
foreach ($cats as $cat) {
// setup the cateogory ID
$cat_id= $cat->term_id;
// Make a header for the cateogry
echo "<h2>".$cat->name."</h2>";
// create a custom wordpress query


$args = array(
	'cat' => $cat_id,
	'posts_per_page' => 100,
);
$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) : while ($my_query->have_posts()) : $my_query->the_post(); ?>


<?php // create our link now that the post is setup ?>

<a href="<?php the_permalink();?>"><?php the_title(); ?></a>

<?php echo "<hr/>"; ?>

<?php endwhile; endif; wp_reset_postdata();
// done our wordpress loop. Will start again for each category ?>

<?php } // done the foreach statement ?>

	<?php the_content(); ?>
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