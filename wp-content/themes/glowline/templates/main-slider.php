<?php  /**  * @package Glowline  */

$loop = new WP_Query(array('posts_per_page' => get_theme_mod('slider_count',1),
'cat' => get_theme_mod('slider_cate'),
'order' => 'DESC',
'meta_query' => array(array( 'key' => '_thumbnail_id')) ));
if ($loop->have_posts()) {
$i = 0;
?>
<div class="slider">
    <div id="owl-demo" class="owl-carousel">
    <?php
    while ($loop->have_posts()) : $loop->the_post();
    ?>
        <div class="item">
        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('glowline-custom-slider-thumb'); ?></a>
            <div class="slider-post-content-wrapper">
                <div class="slider-post-content">
                    <div class="slider-post-category">
                        <span><?php echo $category_list = get_the_category_list( __( ', ', 'glowline' ) ); ?></span>
                    </div>
                    <div class="slider-post-title">
                        <a href="<?php the_permalink(); ?>">
                          <h2><?php the_title(); ?></h2>
                        </a>
                    </div>
                    <div class="slider-post-date"><span><a><?php the_time( get_option('date_format') ); ?></a></span></div>
                    <p>  <?php glowline_custom_excerpt(); ?> </p>
                    <div class="read-more read-more-slider"><a href="<?php the_permalink(); ?>"><?php _e('Continue Reading...','glowline'); ?></a></div>
                    <div class="slider-post-meta">

                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
</div>
<?php } ?>