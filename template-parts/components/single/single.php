<?php
/**
 * @package herbanext
 */
$get_career_form = get_acf_field('career_field');
?>
<div class="card border-0 mb-5">
    <div class="blog_content text-secondary lh-lg">
       <?php the_content() ?>
    </div>
    <?php if($get_career_form):?>
        <div class="mt-5">
            <?php echo _e($get_career_form['contact_form'])?>
        </div>
    <?php endif?>
</div>
