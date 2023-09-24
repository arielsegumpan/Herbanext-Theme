<?php
/**
 * woofeature
 * @package herbanext
 */
namespace HERBANEXT_THEME\Inc;
use HERBANEXT_THEME\Inc\Traits\Singleton;

class Woofeat {
    use Singleton;
    
    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        // Add shortcode registration
        add_shortcode('custom_featured_products', [$this,'custom_get_featured_products_shortcode']);
        add_action('woocommerce_after_shop_loop_item', [$this,'custom_add_buttons_to_product_loop'], 5);
    }

    function custom_get_featured_products_shortcode() {
        // Query WooCommerce for 4 featured products
        $featured_products = wc_get_products(array(
            'limit' => 4,
            'status' => 'publish',
            'visibility' => 'catalog',
            'featured' => true,
        ));
    
        // Initialize output
        $output = '';
    
        if (!empty($featured_products)):
            foreach ($featured_products as $product) :
                $product_link = esc_url(get_permalink($product->get_id()));
                $product_image = esc_url(wp_get_attachment_image_url($product->get_image_id(), 'large'));
                $product_name = esc_attr($product->get_name());
    
                $output .= '<div class="col">
                                <div class="position-relative">
                                    <a href="' . $product_link . '" class="text-decoration-none position-relative">
                                        <span class="position-absolute badge mt-3 ms-3 rounded-3 bg-success px-2 text-white small">
                                            ' . esc_html__('Featured', 'herbanext') . '
                                        </span>
                                        <img src="' . $product_image . '" alt="' . $product_name . '" class="img-fluid object-fit-cover rounded-5">
                                    </a>
                                </div>
                            </div>';
            endforeach;
        else:
            $output .= '<p class="fw-bold display-5">' . esc_html__('No featured products found.', 'herbanext') . '</p>';
        endif;
        return $output;
    }

    function custom_add_buttons_to_product_loop() {
        $product_permalink = esc_url(get_permalink());
        $contact_url = esc_url(site_url('/contact'));
        $view_button_text = esc_html__('View', 'herbanext');
        $inquiry_button_text = esc_html__('Inquiry', 'herbeanext');
    
        echo '<div id="product_btn" class="vstack gap-3 col-md-5 mx-auto w-100 mt-4 px-4">
            <a href="' . $product_permalink . '" class="btn btn-outline-success py-3 fs-6"><i class="bi bi-eye me-2"></i>' . $view_button_text . '</a>
            <a href="' . $contact_url . '" class="btn btn-success py-3 fs-6"><i class="bi bi-info-circle me-2"></i>' . $inquiry_button_text . '</a>
        </div>';
    }

}
