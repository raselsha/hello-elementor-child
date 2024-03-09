<?php if ( get_post_type()=='post' ) :?>
    <div class="sidebar-item categories">
        <h3 class="sidebar-title">Categories</h3>
        <div class="category">
            <?php 
                $categories = get_categories();
                foreach($categories as $category): ?>
                    <div class="category-item">
                        <a href="<?php echo get_category_link($category->term_id); ?>">
                        <?php echo MGC_Custom_Category_Image::get_category_image($category->term_id, 'thumbnail'); ?>
                        </a>
                        <div class="cat-info"><h2 class="h6"><?php echo $category->name ?></h2><span class="count"><?php echo $category->category_count; ?></span></div>
                    </div>
                <?php endforeach; ?>
        </div>
        
    </div><!-- End sidebar categories-->


    <div class="sidebar-item recent-posts">
        <h3 class="sidebar-title">Latest News</h3>
        <?php 
            $args = [
                'posts_per_page'      => 5,
				'post__in'            => get_option( 'sticky_posts' ),
				'order' 			  => 'DESC',
				'post_status' 		  => 'publish',
            ];
            $i=1;
            $the_query = New WP_Query($args);?>  
            <?php if($the_query->have_posts()): while($the_query->have_posts()): $the_query->the_post(); ?>
                <div class="thumb mt-4">
                    <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail('full', array('class' => 'img-fluid'));
                        }
                    ?>
                    <div class="corner"><?php echo $i++; ?></div>
                </div>
            <h6 class="category"><?php the_category(','); ?></h6>
            <a  href="<?php the_permalink(); ?>"><h2 class="h5"><?php echo mb_strimwidth(get_the_title(), 0, 60, '...'); ?></h2></a>
			<p>By&nbsp;&nbsp;<strong><?php the_author(); ?></strong>&nbsp;&bull;&nbsp;<?php the_time('d M, Y'); ?></p>
            <?php endwhile; endif; wp_reset_postdata(); ?>  
    </div><!-- End sidebar recent posts-->
        
    </div><!-- End sidebar recent posts-->
<?php endif; ?>