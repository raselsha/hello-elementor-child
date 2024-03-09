<?php
// enque stylesheet
add_action( 'wp_enqueue_scripts', 'cmx_enqueue_styles',99);
function cmx_enqueue_styles() {
	wp_enqueue_style( 'bootstrap-icon','https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css','','5.3','all');
	wp_enqueue_style( 'main',get_stylesheet_directory_uri().'/css/main.css','',time(),'all');
	wp_enqueue_style( 'style',get_stylesheet_directory_uri().'/style.css',array( 'main' ),time(),'all');
	wp_enqueue_script( 'bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js','','5.3',true);	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/js/scripts.js', '',time(), true );
}

// ===========woo product content restructure===============

remove_action( 'woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10 );

	remove_action( 'woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

	remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10 );

	remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5 );
	remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10 );

	remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5 );

remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10 );

// =================category page==================
remove_action( 'woocommerce_archive_description','woocommerce_product_archive_description',10 );
remove_action( 'woocommerce_archive_description','woocommerce_taxonomy_archive_description',10 );


add_action( 'woocommerce_after_shop_loop','woocommerce_taxonomy_archive_description',10 );
add_action( 'woocommerce_after_shop_loop','woocommerce_taxonomy_archive_description',10 );



// =================== reposition hook=========================
add_action( 'woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10 );
	add_action( 'woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',10 );

add_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open',10 );
	add_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10 );
add_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',10 );

add_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',10 );
add_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10 );

add_action( 'woocommerce_after_shop_loop_item','open_button_div',10 );
    add_action( 'woocommerce_after_shop_loop_item', 'buy_now_and_checkout',10);
    add_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10 );
add_action( 'woocommerce_after_shop_loop_item','close_button_div',10 );


function excerpt_more_link( $excerpt ) {
    $excerpt .= sprintf( 
            '<a href="%s">%s</a>',
            esc_url( get_permalink() ),
            __( 'Read More' )
    );

    return $excerpt;
}
add_filter( 'the_excerpt', 'excerpt_more_link', 21 );

function excerpt_more( $more ) {
	$more = ' .....';
    return $more;
}
add_filter('excerpt_more', 'excerpt_more');

// =============Return an alternate title, without prefix, for every type used in the get_the_archive_title().
add_filter('get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = __( 'Blog Posts' );
    }
    return $title;
});

// =================================== breadcumb ==========

function the_breadcrumb()
{
    $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '/'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<ul><li><a href="' . $homeLink . '">' . $home . '</a></li></ul>';
        }
    } else {
        echo '<ul><li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . 'Posts by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</li></ul>';
    }
} 
