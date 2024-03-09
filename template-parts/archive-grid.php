<?php
/**
 * The template for displaying archive pages.
 *
 * @package HelloElementor
 * @author Shahadat Hossain <raselsha@gmail.com>
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<main id="content" class="site-main ">
	<div class="cmx-post-grid">
		<?php
			$args = [
				'posts_per_page'      => 4,
				'post__in'            => get_option( 'sticky_posts' ),
				'order' 			  => 'DESC',
				'post_status' 		  => 'publish',
			];
			$the_query = new WP_Query($args);
		?>
		<?php if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?>
			<article class="post position-relative post-<?php echo $the_query->current_post; ?>">
				<?php
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('full', array('class' => 'img-fluid'));
						}else{
							echo '<img src="https://dummyimage.com/300">';
						}
					?>
				<div class="content position-absolute bottom-0 left-0">
					<h6 class="category-meta"><?php the_category(','); ?></h6>
					<a href="<?php the_permalink(); ?>"><h2><?php echo mb_strimwidth(get_the_title(), 0, 60, '...'); ?></h2></a>
					<p>By&nbsp;&nbsp;<strong><?php the_author(); ?></strong>&nbsp;&bull;&nbsp;<?php the_time('d M, Y'); ?></p>	
				</div>
			</article>
		<?php endwhile; wp_reset_postdata(); endif; ?>
		
	</div>
	<div class="d-flex justify-content-between align-items-center border-1 border-bottom">
		<h2 class="vt-heading-text">Must Read</h2>
	</div>
	<!-- --------- -->
	<div class="row cmx-post-list">
		<?php
			$args = [
				'posts_per_page'      => -1,
				'post__not_in'        => get_option( 'sticky_posts' ),
				'order' 			  => 'DESC',
				'post_status' 		  => 'publish',
			];
			$the_query = new WP_Query($args);
		?>
		<?php if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?>
			<article class="col-12 col-sm-4">
				<div class="post-list">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="thumb" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid')); ?></a>
					<?php endif; ?>
					<div class="content">
						<p><strong><?php the_category(','); ?></strong></p>
						<a href="<?php the_permalink(); ?>"><h2><?php echo mb_strimwidth(get_the_title(), 0, 60, '...'); ?></h2></a>
						<p><?php the_time('d M, Y'); ?></p>	
					</div>
				</div>
			</article>
		<?php endwhile; wp_reset_postdata(); endif; ?>
	</div>
</main>
