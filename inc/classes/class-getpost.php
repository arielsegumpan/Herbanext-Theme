<?php 
/**
 * @package herbanext
 */

 namespace HERBANEXT_THEME\Inc;

 use HERBANEXT_THEME\Inc\Traits\Singleton;
 
 class Getpost {
     use Singleton;
 
     protected function __construct() {
         $this->setup_hooks();
     }
     protected function setup_hooks() {
         $shortcodes = array(
             'herbanext_career_posts'        => 'careers',
             'herbanext_training_seminar_posts' => 'trainingseminars',
             'herbanext_publications_posts'   => 'publications',
             'herbanext_medicinal_herbs_posts'   => 'medicinal_herbs',
         );
         foreach ($shortcodes as $shortcode => $post_type) {
             add_shortcode($shortcode, function () use ($post_type) {
                 return $this->get_recent_posts($post_type);
             });
         }
     }
     // Create shortcode getting recent products displaying on the front page
     private function get_recent_posts($post_type) {
         $args = array(
             'post_type'      => $post_type,
             'post_status'    => 'publish',
             'posts_per_page' => 10,
         );

         $post_query = new \WP_Query($args);
         ob_start();
 
         if ($post_query->have_posts()) :
             while ($post_query->have_posts()) : $post_query->the_post();
                 get_template_part('template-parts/components/blog/entry','content');
             endwhile;
         else :
             get_template_part('template-parts/content/content-empty');
         endif;
 
         wp_reset_postdata();
 
         return ob_get_clean();
     }
 }
 