<?php 
/**
 * @package herbanext
 */

 namespace HERBANEXT_THEME\Inc;

use HERBANEXT_THEME\Inc\Traits\Singleton;

class Recentpost {
    use Singleton;

    protected function __construct() {
        $this->setup_recent_post_hooks();
    }

    protected function setup_recent_post_hooks() {
        add_shortcode('herbanext_recent_product', [$this,'herbanext_recent_products']);
    }
    // Create shortcode getting recent products displaying on the front page
    function herbanext_recent_products() {
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'stock' => 1,
            'posts_per_page' => 4,
        );

        $loop = new \WP_Query($args);
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
}

