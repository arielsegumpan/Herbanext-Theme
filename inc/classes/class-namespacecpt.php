<?php
/**
 * Register Herbanext Pre Get Posts.
 * @package herbanext
 */
namespace HERBANEXT_THEME\Inc;

use HERBANEXT_THEME\Inc\Traits\Singleton;

class Namespacecpt{
    use Singleton;

    protected function __construct() {
        // Add action hooks to register custom post types
        $this->setup_cpt_hooks();
    }

    protected function setup_cpt_hooks() {
        // Add any setup related to custom post types here
        add_action('pre_get_posts', [$this,'namespace_add_custom_types']);
    }

    function namespace_add_custom_types($query) {
        if ($query->is_main_query() && (is_category() || is_tag())) {
            $post_types = array('post', 'careers', 'publications', 'trainingseminars');
            $query->set('post_type', $post_types);
        }
    }
    
}

