<?php 
/**
 * @package herbanext
 */

 namespace HERBANEXT_THEME\Inc;

use HERBANEXT_THEME\Inc\Traits\Singleton;

class CustomPostTypeArchiveTemplate {
    use Singleton;

    protected function __construct() {
        // Add filter to select custom post type archive templates
        add_filter('template_include', [$this, 'locate_custom_post_type_archive_template'], 99);
    }

    public function locate_custom_post_type_archive_template($template) {
        $custom_post_types = ['careers', 'publications', 'trainingseminars','medicinal_herbs'];

        foreach ($custom_post_types as $post_type) {
            if (is_post_type_archive($post_type)) {
                $new_template = locate_template(['archive-' . $post_type . '.php']);
                if ('' != $new_template) {
                    return $new_template;
                }
            }
        }
        return $template;
    }
}


