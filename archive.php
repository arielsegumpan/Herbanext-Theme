<?php
/**
 *Template Name: Blog
 * @package herbanext
 */
get_header();

$nu_get_image = get_acf_field('news_and_updates');
?>

<main>
 <!-- jumbotron -->
 <section id="jumbotron_product" class="w-100 position-relative">
    
    <img src="<?php echo $nu_get_image['news_and_updates_image']['url']?>" alt="" class="object-fit-cover w-100 position-absolute top-0 left-0">
     <div class="container position-absolute">
         <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start my-auto">
            <?php
                if(is_post_type_archive() && !is_front_page()):?>
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
         <?php
                if (is_post_type_archive('careers')) {
                    _e('Careers', 'your-text-domain'); // Display custom post type archive title
                } else {
                    single_cat_title();
                }
                ?>
         </div>
        <?php if(get_next_posts_link() || get_previous_posts_link() ) :?>
         <div class="row">
            <div class="container text-center">
                <nav aria-label="Page navigation" class="mt-5 pt-4">
                    <ul class="pagination justify-content-center">
                        <?php if (get_previous_posts_link()) : ?>
                            <li class="page-item">
                                <span class="btn btn-success px-5 py-3">
                                    <?php previous_posts_link('<i class="bi bi-arrow-left me-3"></i>Previous'); ?>
                                </span>
                            </li>
                        <?php endif; ?>
                        
                        <?php if (get_next_posts_link()) : ?>
                            <li class="page-item">
                                <span class="btn btn-success px-5 py-3">
                                    <?php next_posts_link('Next<i class="bi bi-arrow-right ms-3"></i>'); ?>
                                </span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
         </div>
        <?php endif?>
     </div>
 </section>
</main>
<?php get_footer()?>