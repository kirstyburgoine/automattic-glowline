<?php
/**
* @package Glowline
* The template for displaying posts in the Link post format
*/
?>
<li id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="post-title">
		<a href="<?php echo glowline_get_my_url(); ?>" target="_blank"><h2><?php the_title(); ?></h2></a>
	</div>
</li>