<?php

/**
 * Template Name: Herbanext Catalog
 * @package herbanext
 */
get_header('shop')
 ;?>
    <main>
        <!-- jumbotron -->
        <section id="jumbotron_product" class="w-100 position-relative">
            <img src="assets/imgs/essential-oil-peppermint-bottle-with-fresh-green-peppermint.jpg" alt="" class="object-fit-cover w-100 position-absolute top-0 left-0">
            <div class="container position-absolute">
                <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start my-auto">
                    <h1 class="display-2 museo fw-bold text-primary">
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
                            Featured Products
                        </h3>
                    </div>
                    <div class="row row-cols-2 row-cols-lg-4 row-gap-4">
                        <div class="col">
                            <a href="#!" class="text-decoration-none">
                                <img src="assets/imgs/herbanext-dost-tawa-tawa-768x576.jpg" alt="" class="img-fluid object-fit-cover">
                            </a>
                        </div>
                        <div class="col">
                            <a href="#!" class="text-decoration-none">
                                <img src="assets/imgs/COCOLITE.png" alt="" class="img-fluid object-fit-cover">
                            </a>
                        </div>
                        <div class="col">
                            <a href="#!" class="text-decoration-none">
                                <img src="assets/imgs/herbanext-dost-tawa-tawa-768x576.jpg" alt="" class="img-fluid object-fit-cover">
                            </a>
                        </div>
                        <div class="col">
                            <a href="#!" class="text-decoration-none">
                                <img src="assets/imgs/elderly-person-holding-plant_1150-18574.jpg" alt="" class="img-fluid object-fit-cover">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lists">
                <div class="container">
                    <div class="row">
                        <div class="col mb-5">
                            <h3 class="fw-bold">
                                Product Catalog
                            </h3>
                            <p>Showing 1–9 of 10 results</p>
                        </div>
                    </div>
                   <div class="row ">
                   <?php woocommerce_content(); ?>
                   </div>
                </div>
            </div>
        </section>
    </main>


<?php get_footer()?>