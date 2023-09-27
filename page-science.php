<?php
/**
 * Template Name: Our Science
 * @package herbanext
 */
get_header();

$science_page = get_acf_field('science_page');
$sci_image_id = get_post_thumbnail_id();
$sci_alt_text = get_post_meta($sci_image_id, '_wp_attachment_image_alt', true);
?>
<main>
    <!-- jumbotron -->
    <section id="jumbotron_about" class="w-100 position-relative">
        <?php if(!empty($science_page['jumbotron'])):?>
            <img src="<?php echo esc_url($science_page['jumbotron']['url']); ?>" alt="<?php echo esc_attr($science_page['jumbotron']['alt']); ?>" class="object-fit-cover w-100 position-absolute top-0 left-0">
        <?php else:?>
            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr($sci_alt_text); ?>" class="object-fit-cover w-100 position-absolute top-0 left-0">
        <?php endif?>
        <div class="container position-absolute">
            <?php echo do_shortcode('[custom_page_headers]') ?>
        </div>
    </section>
     <section id="about">
        <?php if (!empty($science_page['science_section_content_1'])) : ?>
            <div class="novel_portfolio bg-success">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 text-center text-md-start my-auto pe-md-5 text-white lh-lg">
                        <?php $content = $science_page['science_section_content_1']['content'];
                        echo !empty($content) ? wp_kses_decode_entities($content) : '';?>
                        </div>
                        <div class="col-12 col-md-6 px-md-5 mb-5 mb-md-0 text-center text-md-start">
                            <img src="<?php echo esc_url($science_page['science_section_content_1']['hero_image']['url']); ?>"
                                alt="<?php echo esc_attr($science_page['science_section_content_1']['hero_image']['alt']); ?>"
                                class="img-fluid rounded-5">
                        </div>
                    </div>
                </div>
            </div>
        <?php endif?>

        <?php if(!empty($science_page['science_section_content_2']['title'] || !empty($science_page['science_section_content_2']['content']))) :?>
        <div class="who_are_are">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <?php if (!empty($science_page['science_section_content_2']['images'])) : ?>
                            <div class="row">
                            <?php foreach ($science_page['science_section_content_2']['images'] as $key => $science_img) : ?>
                                <div class="col<?php echo $key === array_key_first($science_page['science_section_content_2']['images']) ? '-12 mb-4' : '' ?>">
                                    <img src="<?php echo esc_url($science_img['image']['url']) ?>" alt="<?php echo esc_attr($science_img['image']['alt']) ?>" class="img-fluid w-100 rounded-5 object-fit-cover">
                                </div>
                            <?php endforeach ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="col-12 col-lg-6 mb-5 mb-md-0 text-center text-md-start">
                        <h1 class="display-4 museo fw-bold"><?php echo $science_page['science_section_content_2']['title'] ?></h1>
                        <div class="lh-lg text-secondary mt-5">
                            <?php $content = $science_page['science_section_content_2']['content'];
                            echo !empty($content) ? wp_kses_decode_entities($content) : '';?>
                        </div>
                        <?php if(!empty($science_page['science_section_content_2']['call_to_action'])): ?>
                            <a href="<?php echo esc_url($science_page['science_section_content_2']['call_to_action']) ?>" class="btn btn-success px-4 py-3 mt-5"><?php echo wp_kses_decode_entities( $science_page['science_section_content_2']['call_to_action_icon'] ) ?><?php echo wp_kses_decode_entities( $science_page['science_section_content_2']['call_to_action_title'] ) ?></a>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
       <?php endif?>
        <?php if(!empty($science_page['science_section_content_3'])) :?>
        <div class="organic position-relative w-100">
            <img src="<?php echo esc_url($science_page['science_section_content_3']['background_image']['url']) ?>" alt="<?php echo esc_attr($science_page['science_section_content_3']['background_image']['alt']) ?>" class="object-fit-cover w-100 position-absolute">
            <div class="container position-absolute">
                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-7 me-auto my-auto px-5 px-md-auto">
                        <h1 class="museo dispaly-5 text-black fw-bold pe-5"><?php echo esc_html_e($science_page['science_section_content_3']['title']) ?></h1>
                        <div class="lh-lg text-secondary mt-5">
                           <?php echo nl2br(wp_kses_decode_entities( $science_page['science_section_content_3']['content'] )) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif?>
        <div class="innovative">
            <div class="container">
                <div class="row">
                    <h1 class="museo dispaly-5 fw-bold text-center mb-5 pb-lg-5"> <?php echo esc_html($science_page['science_section_content_1']['title']); ?></h1>
                    <!-- science_page -->
                    <?php if(!empty($science_page)) :?>
                    <div id="science_page">
                        <div class="row g-3">
                            <?php foreach ($science_page['gallery'] as $key => $science_gallery):?>
                            <a href="<?php echo esc_url($science_gallery['gallery_image']['url']) ?>" data-toggle="lightbox" data-gallery="<?php echo esc_attr($science_gallery['group_name']) ?>" class="col-4 col-lg-3">
                                <img src="<?php echo esc_url($science_gallery['gallery_image']['url']) ?>" alt="<?php echo esc_attr($science_gallery['gallery_image']['alt']) ?>" class="img-fluid">
                            </a>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php endif?>
                    <!-- end of science_page -->
                </div>
            </div>
        </div>
 </section>


</main>


<?php get_footer()?>