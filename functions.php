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
// Encapsulate ACF fields
function get_acf_field($field_name) {
    return function_exists('get_field') ? get_field($field_name) : null;
}

// Add custom image tag in product catalog
if (!function_exists('woocommerce_template_loop_product_thumbnail')) {
    function woocommerce_template_loop_product_thumbnail() {
        if (!class_exists('WooCommerce')) {
            return;
        }

        global $post;
        $size = 'shop_catalog'; // You can change the image size here.
        $title = get_the_title();
        $image = has_post_thumbnail() ? get_the_post_thumbnail_url($post->ID, $size) : wc_placeholder_img_src($size);

        echo '<img class="rounded-3" src="' . esc_url($image) . '" alt="' . esc_attr($title) . '">';
    }
}

// Create shortcode getting recent products displaying on the front page
add_shortcode('herbanext_recent_product', 'herbanext_recent_products');
function herbanext_recent_products() {
    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'stock' => 1,
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
                        <span class="badge text-bg-green rounded-2 text-small px-3 me-2"><?php echo esc_html_e('New') ?></span>
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

    // Get the post's categories
    $categories = get_the_category($post->ID);
    $output = '';

    if (!empty($categories)) {
        foreach ($categories as $category) {
            $output .= '<a href="' . get_category_link($category->term_id) . '" class="text-decoration-none mb-2">
                <span class="badge text-bg-green rounded-2 text-small px-3 me-2">
                ' . $category->name . '</span></a>';
        }
    } else {
        $output = 'No categories found for this post.';
    }

    return $output;
}
add_shortcode('post_categories', 'post_categories_shortcode');

// Breadcrumbs
function custom_breadcrumbs() {
    $breadcrumbs = '<li class="breadcrumb-item"><a href="' . home_url() . '">Home</a></li>';
    $current_page = get_queried_object();

    if (is_single()) {
        $category = get_the_category($current_page->ID);
        if (!empty($category)) {
            $breadcrumbs .= '<li class="breadcrumb-item"><a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a></li>';
        }
        $breadcrumbs .= '<li class="breadcrumb-item"><a href="' . get_permalink($current_page->ID) . '">' . get_the_title() . '</a></li>';
    } elseif (is_page() && $current_page->post_parent) {
        $ancestors = get_post_ancestors($current_page->ID);
        $ancestors = array_reverse($ancestors);
        foreach ($ancestors as $ancestor) {
            $breadcrumbs .= '<li class="breadcrumb-item"><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
        }
        $breadcrumbs .= '<li class="breadcrumb-item"><a href="' . get_permalink($current_page->ID) . '">' . get_the_title($current_page->ID) . '</a></li>';
    } elseif (is_category()) {
        $breadcrumbs .= '<li class="breadcrumb-item active" aria-current="page">' . single_cat_title('', false) . '</li>';
    } elseif (is_tag()) {
        $breadcrumbs .= '<li class="breadcrumb-item active" aria-current="page">' . single_tag_title('', false) . '</li>';
    } else {
        $breadcrumbs .= '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
    }

    echo '<ol class="breadcrumb">' . $breadcrumbs . '</ol>';
}
