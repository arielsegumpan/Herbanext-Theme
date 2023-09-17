<?php
/**
 * @package herbanext
 */
$get_career_form = get_acf_field('career_field');
?>
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
        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID())) ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) ?>" class="img-fluid">
    </div>
    <div class="blog_content text-secondary">
        <p class="lh-lg"><?php the_content() ?></p>
    </div>
    <?php if($get_career_form):?>
        <div class="mt-5">
            <?php echo _e($get_career_form['contact_form'])?>
        </div>
    <?php endif?>
</div>
