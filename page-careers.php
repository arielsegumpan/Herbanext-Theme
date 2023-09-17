<?php
/**
 * Template Name: Careers
 * @package herbanext
 */
get_header();

$cpt_post = get_acf_field('post_background_image');
?>


<main>
 <!-- jumbotron -->
 <section id="jumbotron_product" class="w-100 position-relative">
     <img src="<?php echo esc_url($cpt_post['image']['url']) ?>" alt="<?php echo esc_attr($cpt_post['image']['alt']) ?>" class="object-fit-cover w-100 position-absolute bottom-0 left-0">
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
 <section id="blog">
     <div class="container">
         <div class="row row-gap-5">
             <?php 
                $args = array(
                    'post_type'     => 'careers',
                    'post_status'   => 'publish',
                    'posts_per_page' => 10,
                );
                
                $getCareer = new WP_Query($args);

                if($getCareer->have_posts()): 
                while($getCareer->have_posts()): $getCareer->the_post()?>
                     <?php get_template_part('template-parts/components/blog/entry-content-career')?>
                <?php endwhile; else:?>
                    <?php get_template_part('template-parts/content/content-empty')?>
            <?php endif; wp_reset_postdata();?>
         </div>
     </div>
 </section>
</main>

<?php get_footer()?>