<?php
$featured_posts = glowline_get_featured_posts();

foreach ( $featured_posts as $post ) :
	setup_postdata( $post ); ?>

	<div class="item">

		<a href="<?php esc_url( the_permalink() ); ?>">
			<?php the_post_thumbnail( 'glowline-custom-slider-thumb' ); ?>
		</a>

		<div class="slider-post-content-wrapper">
			<div class="slider-post-content">

				<div class="slider-post-category">
					<span>
						<?php echo $category_list = get_the_category_list( __( ', ', 'glowline' ) ); ?>
					</span>
				</div>

				<div class="slider-post-title">
					<a href="<?php esc_url( the_permalink() ); ?>">
						<?php the_title( '<h2>','</h2>' ); ?>
					</a>
				</div>

				<div class="slider-post-date">
					<span>
						<a><?php the_time( get_option( 'date_format' ) ); ?></a>
					</span>
				</div>

				<p><?php the_excerpt(); ?></p>

				<div class="read-more read-more-slider">
					<a href="<?php esc_url( the_permalink() ); ?>">
						<?php _e( 'Continue Reading...','glowline' ); ?>
					</a>
				</div>

			</div>
		</div>

	</div>

<?php
endforeach; ?>
