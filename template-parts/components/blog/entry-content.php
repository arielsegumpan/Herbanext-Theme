<?php
/**
 * Content Template
 * @package herbanext
 */
$featured_image_url = get_the_post_thumbnail_url(get_the_ID());
$featured_image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
$career_position = get_acf_field('career_field');
?>

<div class="col-12 col-md-6">
    <a href="<?php esc_url(the_permalink()) ?>" class="text-decoration-none">
        <div class="card border-0">
           <?php if($featured_image_url) :?>
            <div class="card-header border-0 p-0">
                <img src="<?php echo esc_url($featured_image_url) ?>" alt="<?php echo esc_attr( $featured_image_alt ) ?>" class="img-fluid rounded-4">
            </div>
           <?php endif ?>
            <div class="card-body">
                <div class="post_small_details d-flex flex-wrap flex-row text-secondary gap-4 mt-4">
                    <h6 class="fw-bold text-secondary"><i class="bi bi-person me-2"></i><?php esc_html(the_author() )?></h6>
                    <h6 class="fw-bold"><?php echo get_the_date('j/ n/ Y') ?></h6>
                </div>
                <h1 class="fs-3 museo fw-bold">
                    <?php esc_html( the_title() )?>
                </h1>
                <?php if(shortcode_exists('post_categories')) :?>
                <div class="d-flex flex-wrap flex-row text-center g-5 text-md-start mt-4 align-items-start">
                    <?php echo do_shortcode('[post_categories]'); ?>
                </div>
                <?php endif ?>
                <?php if($career_position) :?>
                    <div class="d-flex flex-row justify-content-between mt-3">
                        <div class="text-secondary">
                            <i class="bi bi-briefcase me-2"></i><?php echo esc_html_e($career_position['postion']) ?>
                        </div>
                        <div>
                            <a href="<?php echo esc_url($career_position['file_upload']['url']) ?>" class="btn btn-success btn-sm rounded-3 px-3 "><i class="bi bi-download me-2"></i><?php echo esc_html_e('Download') ?></a>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </a>
</div>