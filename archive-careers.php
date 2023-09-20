<?php
/**
 * Template Name: Careers
 * @package herbanext
 */
get_header();

// Fetch values once to avoid redundancy
$career_bg = get_field('career_post_image', 'option');
$career_title = get_field('career_post_heading_title', 'options');

$args = array(
    'post_type'      => 'careers',
    'post_status'    => 'publish',
    'posts_per_page' => 10,
);

$career_query = new WP_Query($args);
?>

<main>
    <!-- jumbotron -->
    <section id="jumbotron_product" class="w-100 position-relative">
        <img src="<?php echo esc_url($career_bg); ?>" alt="<?php echo esc_attr($career_title); ?>" class="object-fit-cover w-100 position-absolute top-0 left-0">
        <div class="container position-absolute">
            <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start my-auto">
                <h1 class="display-2 museo fw-bold text-success">
                    <?php echo esc_html($career_title); ?>
                </h1>
                <h6 class="mt-4">
                    <nav aria-label="breadcrumb">
                        <?php custom_breadcrumbs(); ?>
                    </nav>
                </h6>
            </div>
        </div>
    </section>
    <section id="blog">
        <div class="container">
            <div class="row row-gap-5">
                <?php
                if ($career_query->have_posts()) :
                    while ($career_query->have_posts()) : $career_query->the_post();
                        get_template_part('template-parts/components/blog/entry-content');
                    endwhile;
                else :
                    get_template_part('template-parts/content/content-empty');
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
