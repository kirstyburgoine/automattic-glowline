<?php
/**
* @package Glowline
* The template for displaying posts in the dynamic grid view
*/
?>
<?php global $glowline_grid_layout; ?>
<li id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="post-img">
		<a href="<?php the_permalink(); ?>"><?php glowline_grid_thumb($glowline_grid_layout); ?></a>
	</div>
	<div class="post-content">
		<div class="post-content-inner">
			<div class="post-header">
				<?php if(!glowline_home_post_meta('category')): ?>
				<span class="post-category">
					<?php echo $category_list = get_the_category_list( __( ', ', 'glowline' ) ); ?>
				</span>
				<?php endif; ?>
				<div class="post-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title('<h2>', '</h2>'); ?>
					</a>
				</div>
				<div class="post-meta">
					<?php  if(!glowline_home_post_meta('date')): ?>
					<span class="post-date"><?php the_time('M d, Y'); ?></span>
					<?php endif; ?>
					<?php  if(!glowline_home_post_meta('comment')): ?>
					<?php glowline_comment_number(); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="description"><p><?php the_excerpt(); ?></p></div>
			<div class="read-more">
				<a href="<?php the_permalink(); ?>"><?php _e('Continue Reading...','glowline'); ?></a>
			</div>
		</div>
	</div>
</li>