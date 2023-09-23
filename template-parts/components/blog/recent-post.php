
<li class="list-group-item bg-transparent mb-5 mb-md-4 border-0">
    <a href="<?php echo esc_url(the_permalink()) ?>" class="text-decoration-none">
        <div class="d-flex flex-column flex-md-row justify-content-md-start align-items-center gap-4">
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID())) ?>" alt="<?php echo esc_attr(the_title()) ?>" class="rounded-4 object-fit-cover">
            <div>
                <h6 class="lead museo text-white fw-bold text-center text-md-start">
                    <?php echo esc_html_e(the_title()) ?>
                </h6>
                <div class="flex text-center text-md-start mt-3 justify-content-center justify-content-md-between">
                    <?php 
                    $categories = get_the_category();

                    if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </a>
</li>