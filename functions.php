<?php
/**
 * Functions template
 * @package herbanext
 */

use HERBANEXT_THEME\Inc\HERBANEXT_THEME;

!defined('HERBANEXT_DIR_PATH') ? define('HERBANEXT_DIR_PATH',untrailingslashit( get_template_directory() )) : '';
!defined('HERBANEXT_DIR_URI') ? define('HERBANEXT_DIR_URI',untrailingslashit( get_template_directory_uri() )) : '';
require_once HERBANEXT_DIR_PATH . '/inc/helpers/autoloader.php';

function herbanext_get_theme_instance(){
    HERBANEXT_THEME::get_instance();
}
herbanext_get_theme_instance();


// encapsulate acf fields
function get_acf_field($field_name) {
    return function_exists('get_field') ? get_field($field_name) : null;
}

// add custom image tag in product catalog
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {
        if ( ! class_exists( 'WooCommerce' ) ) {
            return;
        }

        global $post;
        $size = 'shop_catalog'; // You can change the image size here.
        $title = get_the_title();
        $image = has_post_thumbnail() ? get_the_post_thumbnail_url( $post->ID, $size ) : wc_placeholder_img_src( $size );

        echo '<img class="rounded-3" src="' . esc_url( $image ) . '" alt="' . esc_attr( $title ) . '">';
    }
}

// create shortcode displaying sa front page
add_shortcode('herbanext_recent_product','herbanext_recent_products');
function herbanext_recent_products() {
    $args = array(
        'post_type'      => 'product',
        'post_status'   => 'publish',
        'stock'          => 1,
        'posts_per_page' => 4,
    );
    
    $loop = new WP_Query($args);
    ob_start();
    
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
            $product = wc_get_product();
            $average_rating = $product->get_average_rating();
            ?>
            <div class="col">
                <a href="<?php esc_url(the_permalink()) ?>" class="text-decoration-none position-relative">
                    <div class="products_tag position-absolute">
                        <span class="badge text-bg-green rounded-3 px-3 py-1"><?php echo esc_html_e('New') ?></span>
                    </div>
                    <?php 
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('shop_catalog', array('class' => 'rounded-5'));
                        } else {
                            echo '<img src="' . esc_url(woocommerce_placeholder_img_src()) . '" alt="' . esc_attr(get_the_title()) . '"rounded-5"/>';
                        }
                    ?>
                </a>
            </div>
            <?php
        endwhile;
    else :
        ?>
        <p class="text-center"><?php _e('No Recent Product<br>display') ?></p>
    <?php
    endif;
    wp_reset_postdata();
    return ob_get_clean();
}

// Get Categories
function post_categories_shortcode() {
    global $post;

    // Check if we have a valid post
    if (!isset($post) || empty($post->ID)) {
        return 'No post found.';
    }

    // Delete the transient to force a cache reset
    delete_transient('post_categories_output_' . $post->ID);

    // Get the post's categories
    $categories = get_the_category($post->ID);

    if (!empty($categories)) {
        foreach ($categories as $category) {
            $output = '<a href="' . get_category_link($category->term_id) . '" class="text-decoration-none  mb-2">
            <span class="badge text-bg-green rounded-2 text-small px-3 me-2">
            ' . $category->name . '</span></a>';
        }
    } else {
        $output = 'No categories found for this post.';
    }

    // Cache the output for an hour (3600 seconds) with a unique key for each post
    // set_transient('post_categories_output_' . $post->ID, $output, 3600);

    return $output;
}
add_shortcode('post_categories', 'post_categories_shortcode');

