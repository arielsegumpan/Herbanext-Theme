<?php
/**
 * @package herbanext
 */
get_header();
$featured_image_url = get_the_post_thumbnail_url(get_the_ID());
$featured_image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
$get_career_form = get_acf_field('career_field');

?>
    <main>
        <!-- jumbotron -->
        <section id="jumbotron_product" class="w-100 position-relative">
            <img src="assets/imgs/close-up-medicine-pills-table.jpg" alt="" class="object-fit-cover w-100 position-absolute bottom-0 left-0">
            <div class="container position-absolute">
                <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start my-auto">
                    <h1 class="display-2 museo fw-bold text-primary">
                       Blog Posts
                    </h1>
                    <h6 class="mt-4">
                        <nav aria-label="breadcrumb">
                            <?php custom_breadcrumbs() ?>
                        </nav>
                    </h6>
                </div>
            </div>
        </section>  
        <section id="blog">
            <div class="container">
                <div class="row row-gap-5">
                    <div class="col-12 col-lg-9">
                        <div class="card border-0">
                            <div class="blog_title mb-5">
                                <h1 class="lora fw-bold"><?php echo esc_html_e(the_title()) ?></h1>
                                <?php if(shortcode_exists('post_categories')) :?>
                                    <div class="d-flex flex-wrap flex-row text-center g-5 text-md-start mt-4 align-items-start">
                                        <?php echo do_shortcode('[post_categories]') ?>
                                    </div>
                                <?php endif ?>
                            </div>
                            <div class="blog_feature_img mb-5">
                                <img src="<?php echo esc_url($featured_image_url) ?>" alt="<?php echo esc_url($featured_image_alt) ?>" class="img-fluid">
                            </div>
                            <div class="blog_content text-secondary">
                               <p class="lh-lg"><?php the_content() ?></p>
                            </div>
                            <div class="mt-5">
                                <?php echo _e($get_career_form['contact_form'])?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">   
                        <div id="blog_search" class="mb-5">
                            <h4 class="fw-bold lora">Search</h4>
                            <input type="text" class="form-control px-3 py-2" placeholder="Search here...">
                        </div>
                        <div id="blog_recent" class="mb-5">
                            <h4 class="fw-bold lora">Recent Post</h4>
                            <ul class="list-group list-group-flush mt-4">
                                <li class="list-group-item bg-transparent mb-4 pt-0 px-0 pb-4">
                                    <a href="#!" class="text-decoration-none">
                                        <div class="d-flex flex-row align-items-center gap-3">
                                            <div class="position-relative">
                                                <span class="bg-success position-absolute z-1 text-white rouned-5">
                                                    1
                                                </span>
                                                <img src="assets/imgs/bottle-organic-oil-with-capsules-table.jpg" alt="" class="rounded-4 object-fit-cover">
                                            </div>
                                            <div>
                                                <h6 class="lora fw-bold text-start">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sunt?
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item bg-transparent mb-4 pt-0 px-0 pb-4">
                                    <a href="#!" class="text-decoration-none">
                                        <div class="d-flex flex-row align-items-center gap-3">
                                            <div class="position-relative">
                                                <span class="bg-success position-absolute z-1 text-white rouned-5">
                                                    2
                                                </span>
                                                <img src="assets/imgs/bottle-organic-oil-with-capsules-table.jpg" alt="" class="rounded-4 object-fit-cover">
                                            </div>
                                            <div>
                                                <h6 class="lora fw-bold text-start">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sunt?
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item bg-transparent mb-4 pt-0 px-0 pb-4">
                                    <a href="#!" class="text-decoration-none">
                                        <div class="d-flex flex-row align-items-center gap-3">
                                            <div class="position-relative">
                                                <span class="bg-success position-absolute z-1 text-white rouned-5">
                                                    3
                                                </span>
                                                <img src="assets/imgs/bottle-organic-oil-with-capsules-table.jpg" alt="" class="rounded-4 object-fit-cover">
                                            </div>
                                            <div>
                                                <h6 class="lora fw-bold text-start">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sunt?
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item bg-transparent mb-4 pt-0 px-0 pb-4">
                                    <a href="#!" class="text-decoration-none">
                                        <div class="d-flex flex-row align-items-center gap-3">
                                            <div class="position-relative">
                                                <span class="bg-success position-absolute z-1 text-white rouned-5">
                                                    4
                                                </span>
                                                <img src="assets/imgs/bottle-organic-oil-with-capsules-table.jpg" alt="" class="rounded-4 object-fit-cover">
                                            </div>
                                            <div>
                                                <h6 class="lora fw-bold text-start">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sunt?
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-group-item bg-transparent mb-4 pt-0 px-0 pb-4">
                                    <a href="#!" class="text-decoration-none">
                                        <div class="d-flex flex-row align-items-center gap-3">
                                            <div class="position-relative">
                                                <span class="bg-success position-absolute z-1 text-white rouned-5">
                                                    5
                                                </span>
                                                <img src="assets/imgs/bottle-organic-oil-with-capsules-table.jpg" alt="" class="rounded-4 object-fit-cover">
                                            </div>
                                            <div>
                                                <h6 class="lora fw-bold text-start">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sunt?
                                                </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div id="blog_categories" class="mb-5">
                            <h4 class="fw-bold lora">Categories</h4>
                            <div class="d-flex flex-wrap flex-row text-center g-5 text-md-start mt-4 align-items-start">
                                <a href="#!" class="text-decoration-none  mb-2">
                                    <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum dolor</span>
                                </a>
                                <a href="#!" class="text-decoration-none  mb-2">
                                    <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum</span>
                                </a>
                                <a href="#!" class="text-decoration-none  mb-2">
                                    <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum dolor</span>
                                </a>
                                <a href="#!" class="text-decoration-none  mb-2">
                                    <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem</span>
                                </a>
                                <a href="#!" class="text-decoration-none  mb-2">
                                    <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum</span>
                                </a>
                                <a href="#!" class="text-decoration-none  mb-2">
                                    <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum dolor</span>
                                </a>
                                <a href="#!" class="text-decoration-none  mb-2">
                                    <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum dolor</span>
                                </a>
                            </div>
                        </div>
                        <div id="blog_archive" class="mb-5">
                            <h4 class="fw-bold lora">Archive</h4>
                            <select class="form-select py-2 mt-4 mb-4" aria-label="Select category">
                                <option selected disabled>Select category</option>
                                <option value="Category 1">Category 1</option>
                                <option value="Category 2">Category 2</option>
                                <option value="Category 3">Category 3</option>
                            </select>
                       </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer() ?>