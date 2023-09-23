<?php
/**
 * 
 * @package herbanext
 */
get_header();

$get_ts_bg = get_field('training_and_seminars_post_header_image','option');
$get_ts_title = get_field('training_and_seminars_post_heading_title', 'option');

$image_id = get_post_thumbnail_id(get_the_ID());
$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
?>


<main>
 <!-- jumbotron -->
 <section id="jumbotron_about" class="w-100 position-relative">
 <img src="<?php echo esc_url($get_ts_bg) ?>" alt="<?php echo esc_html_e($get_ts_title)?>" class="object-fit-cover w-100 position-absolute top-0 left-0">
     <div class="container position-absolute">
         <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start my-auto">
                <h1 class="display-2 museo fw-bold text-success">
                    <?php echo esc_html_e($get_ts_title)?>
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
             <?php 
                $args = array(
                    'post_type'     => 'trainingseminars',
                    'post_status'   => 'publish',
                    'posts_per_page' => 10,
                );
                $getCareer = new WP_Query($args);
                if($getCareer->have_posts()): 
                while($getCareer->have_posts()): $getCareer->the_post()?>
                     <?php get_template_part('template-parts/components/blog/entry-content')?>
                <?php endwhile; else:?>
                    <?php get_template_part('template-parts/content/content-empty')?>
            <?php endif; wp_reset_postdata();?>
         </div>
     </div>
 </section>
</main>

<?php get_footer()?>