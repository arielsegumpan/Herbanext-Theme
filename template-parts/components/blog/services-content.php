<?php if(have_posts()) :?>
    <?php while(have_posts()): the_post()?>
        <?php the_content()?>
    <?php endwhile; wp_reset_postdata()?>
<?php endif?>