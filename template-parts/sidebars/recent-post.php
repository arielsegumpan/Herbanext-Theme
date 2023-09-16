<?php
/** get sidebar recent post
 * @package herbanext
 */
$get_image_url = get_the_post_thumbnail_url(get_the_ID());
$get_image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
?>

<?php
$count = 0;
$args = array(
    'post_type' => 'post',
    'post_status'   => 'publish',
    'posts_per_page'    => 5
);

$get_post  = new WP_Query($args);

if($get_post->have_posts()) :
    
    while($get_post->have_posts()):
        $count++;
        $get_post->the_post()?>

        <li class="list-group-item bg-transparent mb-4 pt-0 px-0 pb-4">
            <a href="<?php echo esc_url(the_permalink())?>" class="text-decoration-none text-success">
                <div class="d-flex flex-row align-items-center gap-3">
                    <div class="position-relative">
                        <span class="bg-success position-absolute z-1 text-white rouned-5">
                        <?php echo esc_html_e("0".$count)?>
                        </span>
                        <img src="<?php echo esc_url($get_image_url) ?>" alt="<?php echo esc_url($get_image_alt) ?>" class="rounded-4 object-fit-cover">
                    </div>
                    <div>
                        <h6 class="lora fw-bold text-start">
                            <?php echo esc_html_e(the_title()) ?>
                        </h6>
                    </div>
                </div>
            <a>
        </li>

<?php endwhile; endif; wp_reset_postdata(); ?>
