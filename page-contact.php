<?php
/**
 * Template Name: Contact
 * @package herbanext
 */
get_header()
?>
<?php if(have_posts()):?>
<main>
    <!-- jumbotron -->
    <section id="jumbotron_product" class="w-100 position-relative">
        <img src="<?php  echo esc_url(get_the_post_thumbnail_url(get_the_ID()));?>" alt="" class="object-fit-cover w-100 position-absolute bottom-0 left-0">
        <div class="container position-absolute">
            <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start my-auto">
                <h1 class="display-2 museo fw-bold text-success">
                       Contact Us
                </h1>
                <h6 class="mt-4">
                    Home / Products / loremp-ipsum
                </h6>
            </div>
        </div>
    </section>  
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                    <iframe class="rounded-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3921.8474368178954!2d122.91041601057044!3d10.59109878950308!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aecf6926a1486b%3A0x5c43b6e1055dfe00!2sHerbanext%20Laboratories%2C%20Inc.!5e0!3m2!1sen!2sph!4v1693737826377!5m2!1sen!2sph"
                    width="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-12 col-lg-6">
                   
                        <?php echo do_shortcode('[contact-form-7 id="8dfc7ab" title="Contact form 1"]') ?>
                     
                    <?php endif;?>

                </div>
            </div>
        </div>
    </section>
</main>


<?php get_footer()?>