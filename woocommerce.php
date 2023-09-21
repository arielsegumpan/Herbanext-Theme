<?php

/**
 * 
 * @package herbanext
 */
get_header('shop');
$shop_page_id = wc_get_page_id('shop');
$shop = get_field('herbanext_shop', $shop_page_id);

?>
    <main>
        <!-- jumbotron -->
        <section id="jumbotron_product" class="w-100 position-relative">
            <img src="<?php echo esc_url($shop['shop_background_image']['url']) ?>" alt="<?php echo esc_attr($shop['shop_background_image']['alt']) ?>" class="object-fit-cover w-100 position-absolute top-0 left-0">
            <div class="container position-absolute">
                <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start my-auto">
                    <h1 class="display-2 museo fw-bold text-success">
                       Our Products
                    </h1>
                    <h6 class="mt-4">
                        Home / Products
                    </h6>
                </div>
            </div>
        </section>  

        <section id="product_lists">
            <div class="featured_products mb-5 pb-5">
                <div class="container">
                    <div class="col mb-5">
                        <h3 class="fw-bold">
                            <i class="bi bi-bookmark-star me-3 bg-success text-white px-3 py-2 rounded-4"></i><?php echo esc_html_e('Featured Products') ?>
                        </h3>
                    </div>
                    <div class="row row-cols-2 row-cols-lg-4 row-gap-4">
                    <?php echo do_shortcode( '[custom_featured_products]' ) ?>
                    </div>
                </div>
            </div>

            <div class="lists">
                <div class="container">
                   <div class="row ">
                   <div class="col mb-3">
                        <h2 class="fw-bold"><i class="bi bi-basket2 me-3 bg-success text-white px-3 py-2 rounded-4"></i><?php echo esc_html_e('Products') ?></h2>
                    </div>
                   <?php woocommerce_content(); ?>
                   </div>
                </div>
            </div>
        </section>
    </main>


<?php get_footer()?>