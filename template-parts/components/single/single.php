<?php
/**
 * @package herbanext
 */
$get_career_form = get_acf_field('career_field');
?>
<div class="card border-0 mb-5">
    <div class="blog_feature_img mb-5">
        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID())) ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) ?>" class="img-fluid">
    </div>
    <div class="blog_content text-secondary lh-lg">
       <?php the_content() ?>
    </div>
    <?php if($get_career_form):?>
        <div class="mt-5">
            <?php echo _e($get_career_form['contact_form'])?>
        </div>
    <?php endif?>
</div>
