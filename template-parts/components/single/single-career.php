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
                <?php
                    if(is_single() && !is_front_page()):?>
                        <h1 class="display-2 museo fw-bold text-success">
                            <?php single_post_title() ?>
                        </h1>
                    <?php endif
                ?>
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
                        <?php if(get_post_type() === 'careers') :?>
                        <div id="blog_recent" class="mb-5">
                            <h4 class="fw-bold lora">Recent Post</h4>
                            <ul class="list-group list-group-flush mt-4">
                                <?php get_template_part('template-parts/sidebars/recent-careers') ?>
                            </ul>
                        </div>
                        <?php endif ?>
                        <div id="blog_categories" class="mb-5">
                            <h4 class="fw-bold lora">Categories</h4>
                            <div class="d-flex flex-wrap flex-row text-center g-5 text-md-start mt-4 align-items-start">
                            <?php echo do_shortcode('[post_categories]') ?>
                            </div>
                        </div>
                        <div id="blog_archive" class="mb-5">
                            <h4 class="fw-bold lora">Archive</h4>
                           <?php get_template_part('template-parts/components/archive/archives') ?>
                       </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer() ?>