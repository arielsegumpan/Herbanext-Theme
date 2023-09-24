<?php 
/**
 * @package herbanext
 */

 namespace HERBANEXT_THEME\Inc;

use HERBANEXT_THEME\Inc\Traits\Singleton;

class Careerpost {
    use Singleton;

    protected function __construct() {
        $this->setup_recent_post_hooks();
    }

    protected function setup_recent_post_hooks() {
        add_shortcode('herbanext_career_posts', [$this,'herbanext_career_post']);
    }
    // Create shortcode getting recent products displaying on the front page
    function herbanext_career_post() {
        $args = array(
            'post_type'      => 'careers',
            'post_status'    => 'publish',
            'posts_per_page' => 10,
        );
        
        $career_query = new \WP_Query($args);
        ob_start();
        if ($career_query->have_posts()) :
            while ($career_query->have_posts()) : $career_query->the_post();
                get_template_part('template-parts/components/blog/entry-content');
            endwhile;
        else :
            get_template_part('template-parts/content/content-empty');
        endif;
        wp_reset_postdata();
        return ob_get_clean();
    }
}


