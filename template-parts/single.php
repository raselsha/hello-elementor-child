<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

while ( have_posts() ) :
	the_post();
	?>

<main id="content" class="site-main" >
	<div class="single-content container">
		<div class="single-post-page">
			<div class="content">
				<header class="page-header">
					<h6 class="category">
						<?php the_category(','); ?>
					</h6>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<p>By&nbsp;&nbsp;<strong><?php the_author(); ?></strong>&nbsp;&bull;&nbsp;<?php the_time('d M, Y'); ?></p>	
				</header>
				<div>
					<?php the_content(); ?>
				</div>
				<div class="post-tags">
					<?php the_tags( '<span class="tag-links">' . esc_html__( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
				</div>
				<?php wp_link_pages(); ?>
			</div>
			<div class="comments">
				<?php comments_template(); ?>
			</div>
			
		</div>
		<div class="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>


</main>

	<?php
endwhile;
