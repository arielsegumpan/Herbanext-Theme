<?php
/**
*   Template Name: Front Page
*   Main template file.
*   @package herbanext
*/
get_header();

// ACF FIELDS
is_protected_endpoint($jumbotron = get_field( "jumbotron"));
$features = get_field("features");
$feat_repeaters = $features['feature_cards'];
$story = get_field("story");
$story_carousel_imgs = $story['story_carousel'];
$services = get_field('services');
$services_icons = $services['service_cards'];
$products = get_field('products');
?>



<main>
        <?php if($jumbotron) :?>
        <!-- jumbotron -->
        <section id="jumbotron" class="w-100 position-relative">
                <img src="<?php echo esc_url($jumbotron['jumbotron_image']['url']) ?>" alt="<?php echo esc_attr( $jumbotron['jumbotron_image']['alt']) ?>" class="object-fit-cover w-100 position-absolute">
        </section>
        <!-- jumbortron content -->
        <section id="jumb_content" class="position-relative">
            <div class="container position-absolute">
                <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start">
                    <h1 class="display-2 museo fw-bold text-success">
                       <?php echo esc_html_e( $jumbotron['title']) ?>
                    </h1>
                    <h4 class="mt-4 mb-5">
                        <?php echo esc_html_e( $jumbotron['subtitle']) ?>
                    </h4>
                    <div class="d-flex flex-row justify-content-center justify-content-md-start gap-3 pt-3">
                        <div class="products_btn">
                            <a href="<?php echo esc_url( $jumbotron['product_page_link']) ?>" class="btn btn-lg btn-success px-4 py-3"><i class="bi bi-shop me-2"></i><?php esc_html_e('Products') ?></a>
                        </div>
                        <div class="more_btn">
                            <a href="<?php echo esc_url( $jumbotron['about_page_link']) ?>" class="btn btn-lg btn-outline-success px-4 py-3"><i class="bi bi-arrow-right me-2 border-2"></i><?php esc_html_e('More') ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif;?>

        <!-- features -->
        <?php if($features) :?>
        <section id="features" class="bg-success">
            <div class="container">
                <div class="row mb-md-5">
                    <div class="col-12 col-md-9 mx-auto text-center mb-5">
                        <div class="features_title text-white">
                            <h1 class="museo fs-1 fw-bold text-white mb-5"><?php echo esc_html_e($features['feature_title']) ?></h1>
                            <p class="lh-lg">
                                <?php echo esc_html_e(nl2br($features['feature_content'])) ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <?php foreach($feat_repeaters as $key => $feat_repeater) :?>
                        <div class="col-12 col-md-4 text-center <?php echo $key !== array_key_last($feat_repeaters) ? 'border_col_feature' : '' ?>  mb-5 mb-md-0">
                            <div class="feature_icon mb-5">
                                <img src="<?php echo esc_url($feat_repeater['feature_icon']['url']) ?>" alt="<?php echo esc_attr($feat_repeater['feature_icon']['alt']) ?>">
                            </div>
                            <div class="feature_content px-4">
                                <p class="lh-lg text-white">
                                    <?php echo esc_html_e( nl2br($feat_repeater['feature_content'])) ?>
                                </p>
                            </div>
                        </div>

                    <?php endforeach ?>
                   
                </div>
            </div>
        </section>
        <?php endif;?>

        <!-- story -->
        <?php if($story) : ?>
        <section id="story">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-5 px-md-5 my-auto text-center text-md-start">

                        <div class="story_title pb-5 mb-5">
                            <h1 class="museo display-2 fw-bold mb-5"><?php echo esc_html_e(nl2br($story['story_title'])) ?></h1>
                            <p class="lh-lg mb-5 text-secondary">
                                <?php echo esc_html_e(nl2br($story['story_content'])) ?>
                            </p>
                            <a href="<?php echo esc_url($story['about_page_link_2']) ?>" class="btn btn-outline-success border-3 px-4 py-3"><i class="bi bi-arrow-right me-2 border-2"></i><?php echo esc_html_e( 'Read More' ) ?></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 pe-md-0 mb-5 mb-md-0 pb-4 pb-md-0">
                        <!-- Displaying Carousel image sa front page -->
                        <?php if($story['story_carousel']):?>
                        <div id="story" class="owl-theme owl-carousel position-relative">
                            <?php foreach($story_carousel_imgs as $story_carousel_img) :?>

                                <div class="item">
                                    <img src="<?php echo esc_url($story_carousel_img['story_carousel_image']['url']) ?>" alt="<?php echo esc_attr($story_carousel_img['story_carousel_image']['alt']) ?>" class="img-fluid">
                                </div>

                            <?php endforeach ?>
                        </div>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- services -->
        <?php if($services) :?>
        <section id="services" class="bg-success">
            <div class="container">
                <div class="row mb-md-5">
                    <div class="col-12 col-md-8 mx-auto text-center mb-5">
                        <div class="features_title text-white">
                            <h1 class="museo fs-1 fw-bold text-white mb-5"><?php echo esc_html_e($services['service_title']) ?></h1>
                            <p class="lh-lg">
                                <?php echo esc_html_e($services['service_content'])?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php if($services_icons):?>
                    <?php foreach ($services_icons as $services_icon):?>
                        <div class="col mb-5 mb-md-auto">
                            <div class="d-flex flex-row gap-4 text-white align-items-center museo">
                                <div class="services_icon">
                                    <img src="<?php echo esc_url($services_icon['service_card_icon']['url'])?>" alt="<?php echo esc_attr($services_icon['service_card_icon']['alt'])?>" class="rounded-4 object-fit-cover" width="100" height="100">
                                </div>
                                <div class="services_content">
                                    <p class="fs-6 fw-bold"><?php echo esc_html_e($services_icon['service_card_title'])?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif?>
                </div>
                <div class="row mt-5 pt-md-5 text-center">
                    <div class="col-12 col-md-6 mx-auto">
                        <a href="<?php echo esc_url($services['service_page_link']) ?>" class="btn btn-outline-white border-3 px-5 py-3"><i class="bi bi-arrow-right me-2 border-2"></i><?php echo esc_html_e( 'More' ) ?></a>
                    </div>
                </div>
            </div>
        </section>
        <?php endif ?>

        <!-- products -->
        <?php if($products) :?>
        <section id="products" class="position-relative">
            <div class="products_img position-relative">
                <img src="<?php echo esc_url($products['product_page_background']['url']) ?>" alt="<?php echo esc_attr( $products['product_page_background']['alt'] ) ?>" class="position-absolute object-fit-cover">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-xl-5 me-auto">
                        <div class="d-flex flex-row justify-content-between align-items-end mb-5">
                            <h1 class="museo display-4 fw-bold"><?php echo nl2br($products['product_title']) ?></h1>
                            <a href="<?php echo esc_url($products['product_page_link']) ?>" class="btn btn-success px-4 py-3"><i class="bi bi-shop me-2"></i><?php esc_html_e('Products') ?></a>
                        </div>
                        <div class="row row-cols-2 row-gap-4">


                            <div class="col">
                                <a href="product_single.html" class="text-decoration-none position-relative">
                                    <div class="products_tag position-absolute">
                                        <span class="badge text-bg-green rounded-3 px-3 py-1">New</span>
                                    </div>
                                    <img src="assets/imgs/flat-lay-herbal-therapy-products_23-2149339723.jpg" alt="" class="rounded-5">
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif?>
        <!-- gallery -->
        <section id="gallery">
            <div class="container-fluid">
                <div class="row gap-0">
                    <div class="col p-0">
                        <img src="assets/imgs/herbanext_group_photo.jpg" alt="" >
                    </div>
                    <div class="col p-0">
                        <img src="assets/imgs/2b1c03_c261fe0c9b0f414c8e45a0ee1d80dbee~mv2.webp" alt="">
                    </div>
                    <div class="col p-0">
                        <img src="assets/imgs/pioneer.jpg" alt="">
                    </div>
                    <div class="col p-0">
                        <img src="assets/imgs/herbanext-DOST-BIST-2.jpg" alt="">
                    </div>
                    <div class="col p-0">
                        <img src="assets/imgs/rd.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- news and updates -->
        <section id="newsupdates" class="bg-success">
            <div class="container">
                <div class="row mb-md-5">
                    <div class="col-12 col-md-8 mx-auto text-center mb-5">
                        <div class="features_title text-white">
                            <h1 class="museo fs-1 fw-bold text-white mb-5">News and Updates</h1>
                            <p class="lh-lg">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim officia iure reiciendis, facilis accusantium illum iste. Necessitatibus nostrum esse hic!</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <ul class="border-0 list-group list-group-flush ">
                            <li class="list-group-item bg-transparent mb-5 mb-md-4 border-0">
                                <a href="blog_single.html" class="text-decoration-none">
                                    <div class="d-flex flex-column flex-md-row justify-content-md-center justify-content-md-between align-items-center gap-4">
                                        <img src="assets/imgs/bottle-organic-oil-with-capsules-table.jpg" alt="" class="rounded-4 object-fit-cover">
                                        <div>
                                            <h6 class="lead museo text-white fw-bold text-center text-md-start">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sunt?
                                            </h6>
                                            <div class="flex text-center text-md-start mt-3 justify-content-center justify-content-md-between">
                                                <span class="badge text-bg-green rounded-2 text-small px-3">Lorem, ipsum dolor</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item bg-transparent mb-5 mb-md-4 border-0">
                                <a href="#!" class="text-decoration-none">
                                    <div class="d-flex flex-column flex-md-row justify-content-md-center justify-content-md-between align-items-center gap-4">
                                        <img src="assets/imgs/2b1c03_49e0d243d3f14a94ba95dd298db4005e~mv2.png" alt="" class="rounded-4 object-fit-cover">
                                        <div>
                                            <h6 class="lead museo text-white fw-bold text-center text-md-start">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sunt?
                                            </h6>
                                            <div class="flex text-center text-md-start mt-3 justify-content-center justify-content-md-between">
                                                <span class="badge text-bg-green rounded-2 text-small px-3">Lorem, ipsum dolor</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="list-group-item bg-transparent mb-5 mb-md-4 border-0">
                                <a href="#!" class="text-decoration-none">
                                    <div class="d-flex flex-column flex-md-row justify-content-md-center justify-content-md-between align-items-center gap-4">
                                        <img src="assets/imgs/2b1c03_49e0d243d3f14a94ba95dd298db4005e~mv2.png" alt="" class="rounded-4 object-fit-cover">
                                        <div>
                                            <h6 class="lead museo text-white fw-bold text-center text-md-start">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sunt?
                                            </h6>
                                            <div class="flex text-center text-md-start mt-3 justify-content-center justify-content-md-between">
                                                <span class="badge text-bg-green rounded-2 text-small px-3">Lorem, ipsum dolor</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                                <span class="badge text-bg-green rounded-2 text-small px-3">New</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-6 text-center  mt-5 mgt-lg-0">
                        <img src="assets/imgs/herbanext_group_photo.jpg" alt="" class="img-fluid rounded-5">
                    </div>
                </div>
                <div class="row mt-5 pt-5 text-center">
                    <div class="col-6 mx-auto">
                        <a href="#!" class="btn btn-outline-white border-3 px-4 py-3"><i class="bi bi-arrow-right me-2 border-2"></i>Read More</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- partner with us -->
        <section id="partner" style="background-image: url('assets/imgs/herbanext-main.jpg');" class="object-fit-cover img-fluid">
            <div class="bg-white"></div>
            <div class="container position-relative">
                <?php echo do_shortcode('[contact-form-7 id="1f63276" title="Partner with us"]') ?>
            </div>
        </section>
    </main>









<?php
get_footer();?>