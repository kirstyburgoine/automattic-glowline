<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Glowline
 */

get_header(); ?>

<main id="main" class="site-main">

	<div class="container clearfix<?php glowline_fullwidth(); ?>">

		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'glowline' ); ?></h1>
		</header><!-- .page-header -->

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>

			<div class="page-description">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'glowline' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</article>

	<?php
		get_sidebar();
		?>

	</div><!-- .container //-->

</main>

<?php get_footer(); ?>
