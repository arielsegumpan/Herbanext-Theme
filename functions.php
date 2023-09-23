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

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_filter( 'woocommerce_page_title', 'new_woocommerce_page_title' );
function new_woocommerce_page_title( $page_title ) {
	if ( $page_title == 'Shop' ) {
		return '<span class="fw-bold fs-2">Prodcut Catalog</span>';
	}
}

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



// Get Categories by Post Type
function post_categories_by_post_type_shortcode($atts) {
    global $post;

    // Check if we have a valid post
    if (!isset($post) || empty($post->ID)) {
        return 'No post found.';
    }

    // Define the allowed post types
    $allowed_post_types = array('careers', 'publications', 'trainingseminars', 'post');

    // Get the post's post type
    $post_type = get_post_type($post);

    // Check if the post type is allowed
    if (in_array($post_type, $allowed_post_types)) {
        // Get the post's categories
        $categories = get_the_category();
        $output = '';

        if (!empty($categories)) {
            foreach ($categories as $category) {
                $output .= '<a href="' . get_category_link($category->term_id) . '" class="text-decoration-none mb-2">
                    <span class="badge text-bg-green rounded-2 text-small px-3 me-2">
                    ' . $category->name . '</span></a>';
            }
        } else {
            $output = '';
        }
    } else {
        $output = '';
    }
    return $output;
}

add_shortcode('post_categories', 'post_categories_by_post_type_shortcode');

// Get all categoreis
function display_all_categories() {
    $categories = get_categories(array(
        'hide_empty' => 0,
    ));

    if (empty($categories)) {
        echo 'No categories found.';
        return;
    }

    foreach ($categories as $category) {
        $category_link = esc_url(get_category_link($category->term_id));
        $category_name = esc_html($category->name);

        echo <<<HTML
            <a href="$category_link" class="text-decoration-none mb-2">
                <span class="badge text-bg-green rounded-2 text-small px-3 me-2">$category_name</span>
            </a>
    HTML;
    }
}
add_shortcode('all_categories', 'display_all_categories');

// Breadcrumbs
function custom_breadcrumbs() {
    echo '<a class="text-success text-decoration-none" href="'.esc_url(home_url()).'" rel="nofollow"><i class="bi bi-house me-2"></i>'.__('Home', 'your-herbanext').'</a>';

    $delimiter = "&nbsp;&nbsp;&#187;&nbsp;&nbsp;"; // Delimiter between breadcrumbs

    if (is_archive() || is_home()) {
        echo $delimiter . '<span>' . esc_html(wp_title('', false)) . '</span>';
    }

    if (is_category() || is_single()) {
        $post_type = get_post_type();
        $post_type_slug = ($post_type == 'post') ? __('News', 'herbanext') : ucfirst($post_type);

        $archive_link = esc_url(get_post_type_archive_link($post_type));
        echo $delimiter . '<a class="text-success text-decoration-none" href="' . esc_url($archive_link) . '">' . esc_html($post_type_slug) . '</a>';

        if (is_single()) {
            echo $delimiter . the_title('', '', false);
        }
    } elseif (is_page()) {
        $post_slug = get_post_field('post_name', get_post());
        echo $delimiter . '<a href="' . esc_url(home_url('/' . $post_slug)) . '">' . esc_html(get_the_title()) . '</a>';
    } elseif (is_search()) {
        echo $delimiter . __('Search Results for...', 'your-herbanext') . ' "<em>' . esc_html(get_search_query()) . '</em>"';
    }
}

// function custom_breadcrumbs() {
//     echo '<a class="text-success text-decoration-none" href="'.esc_url(home_url()).'" rel="nofollow"><i class="bi bi-house me-2"></i>'.__('Home', 'your-herbanext').'</a>';

//     if (is_archive() || is_home()) {
//         echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
//         echo '<span>' . esc_html(wp_title('', false)) . '</span>';
//     }

//     if (is_category() || is_single()) {
//         echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        
//         // Get the post type's slug (or category slug)
//         $post_type = get_post_type();
//         $post_type_slug = '';

//         if ($post_type == 'post') {
//             $post_type_slug = __('News', 'herbanext');
//         } else {
//             if (is_single()) {
//                 $post_type_slug = ucfirst(get_post_type());
//             } else {
//                 $post_type_slug = ucfirst(get_queried_object()->slug);
//             }
//         }
//         // Construct the archive link manually
//         $archive_link = esc_url(home_url()) . '/' . strtolower($post_type_slug) . '/';

//         // Output the post type's slug as a breadcrumb with a link
//         echo '<a class="text-success text-decoration-none" href="' . esc_url($archive_link) . '">' . esc_html($post_type_slug) . '</a>';

//         if (is_single()) {
//             echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
//             the_title();
//         }
//     } elseif (is_page()) {
//         echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
//         echo esc_html(get_the_title());
//     } elseif (is_search()) {
//         echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;".__('Search Results for... ', 'your-herbanext');
//         echo '"<em>';
//         echo esc_html(get_search_query());
//         echo '</em>"';
//     }
// }


// Remove the product title from WooCommerce product loop
add_action('init', 'remove_loop_title');
function remove_loop_title() {
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
}


