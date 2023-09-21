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

// bootstrap navwalker
if ( ! file_exists( get_template_directory() . '/inc/navwalker/bootstrap_5_wp_nav_menu_walker.php' ) ) 
{
        // file does not exist... return an error.
        return new WP_Error( 'bootstrap_5_wp_nav_menu_walker-missing', __( 'It appears the bootstrap_5_wp_nav_menu_walker.php file may be missing.', 'bootstrap_5_wp_nav_menu_walker' ) );
} else{
        // file exists... require it.
        require_once get_template_directory().'/inc/navwalker/bootstrap_5_wp_nav_menu_walker.php';
}


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
function get_all_categories_shortcode() {
    $categories = get_categories(array(
        'post_type' => ['post', 'careers', 'publications', 'trainingseminars'],
        'hide_empty' => 1,
    ));

    ob_start();

    foreach ($categories as $category) {
        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="badge text-bg-green rounded-2 mb-2 text-small px-3 me-2 text-decoration-none">' . esc_html($category->name) . '</a>';
    }

    return ob_get_clean();
}

add_shortcode('all_categories', 'get_all_categories_shortcode');


// Breadcrumbs
function custom_breadcrumbs() {
    echo '<a class="text-success text-decoration-none" href="'.esc_url(home_url()).'" rel="nofollow"><i class="bi bi-house me-2"></i>'.__('Home', 'your-herbanext').'</a>';

    if (is_archive() || is_home()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo '<span>' . esc_html(wp_title('', false)) . '</span>';
    }

    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        
        // Get the post type's slug (or category slug)
        $post_type = get_post_type();
        $post_type_slug = '';

        if ($post_type == 'post') {
            $post_type_slug = __('News', 'herbanext');
        } else {
            if (is_single()) {
                $post_type_slug = ucfirst(get_post_type());
            } else {
                $post_type_slug = ucfirst(get_queried_object()->slug);
            }
        }
        // Construct the archive link manually
        $archive_link = esc_url(home_url()) . '/' . strtolower($post_type_slug) . '/';

        // Output the post type's slug as a breadcrumb with a link
        echo '<a class="text-success text-decoration-none" href="' . esc_url($archive_link) . '">' . esc_html($post_type_slug) . '</a>';

        if (is_single()) {
            echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
            the_title();
        }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo esc_html(get_the_title());
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;".__('Search Results for... ', 'your-herbanext');
        echo '"<em>';
        echo esc_html(get_search_query());
        echo '</em>"';
    }
}


// Remove the product title from WooCommerce product loop
add_action('init', 'remove_loop_title');
function remove_loop_title() {
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
}
// Add custom buttons to WooCommerce product loop
add_action('woocommerce_after_shop_loop_item', 'custom_add_buttons_to_product_loop', 5);
function custom_add_buttons_to_product_loop() {
    $product_permalink = esc_url(get_permalink());
    $contact_url = esc_url(site_url('/contact'));

    echo '<div id="product_btn" class="vstack gap-3 col-md-5 mx-auto w-100 mt-4 px-4">
        <a href="' . $product_permalink . '" class="btn btn-outline-success py-3 fs-6"><i class="bi bi-eye me-2"></i>View</a>
        <a href="' . $contact_url . '" class="btn btn-success py-3 fs-6"><i class="bi bi-info-circle me-2"></i>Inquiry</a>
    </div>';
}



// get recent post
// add_shortcode('get_recent_front_page_post', 'get_recent_front_page_posts');
// function get_recent_front_page_posts(){
//     ob_start();
//     $args = array(
//         'post_type' => 'post',
//         'post_status' => 'publish',
//         'posts_per_page' => 3,
//     );
//     $loop = new WP_Query($args);

//     if ($loop->have_posts()) :
//         while ($loop->have_posts()) : $loop->the_post();
//             get_template_part('template-parts/components/blog/recent','post');
//         endwhile;
//     else :
//         esc_html_e('No recent post<br>display', 'herbanext'); // Use proper translation function
//     endif;

//     wp_reset_postdata();
//     return ob_get_clean();
// }
