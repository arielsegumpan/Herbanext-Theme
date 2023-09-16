<?php
/**
 * Template Name: Contact
 * @package herbanext
 */
get_header();

$contact_jumbotron = get_acf_field('contact_jumbotron_image');
$contact_map    = get_acf_field('body_map');
?>

<main>
    <!-- jumbotron -->
    <section id="jumbotron_product" class="w-100 position-relative">
        <?php if( $contact_jumbotron):?>
             <img src="<?php echo esc_url($contact_jumbotron['url']) ?>" alt="<?php echo esc_url($contact_jumbotron['alt']) ?>" class="object-fit-cover w-100 position-absolute bottom-0 left-0">
        <?php endif ?>
        <div class="container position-absolute">
            <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start my-auto">
                <?php
                    if(is_page() && !is_front_page()):?>
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
    <?php if($contact_map):?>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                   <?php echo _e($contact_map['map']) ?>
                </div>
                <div class="col-12 col-lg-6">
                    <?php echo do_shortcode('[contact-form-7 id="8dfc7ab" title="Contact form 1"]') ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif ?>
</main>
<?php get_footer()?>