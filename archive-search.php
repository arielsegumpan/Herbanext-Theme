<?php
/**
 *
 * @package herbanext
 */
get_header();
$image_id = get_post_thumbnail_id(get_the_ID());
$alt_text = get_post_meta($image_id , '_wp_attachment_image_alt', true);
$get_blog_img = get_acf_option_field('blog_post_header_image');
$get_blog_title = get_acf_option_field('blog_post_heading_title');
?>
<main>
 <div>hello form archive searhc</div>
</main>

<?php get_footer()?>