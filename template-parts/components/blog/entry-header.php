<?php
/**
 * Template for post entry header
 * @package herbanext
 */
// $the_post_id = get_the_ID(  );
// $has_post_ft_image = get_the_post_thumbnail($the_post_id);

 ?>

<?php

if($has_post_ft_image)?>
<div class="card-header border-0 p-0">

    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID())); ?>" alt="<?php esc_attr( the_title() )?>" class="img-fluid">
</div>
<?php endif ?>