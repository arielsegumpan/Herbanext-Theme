<?php
/**
 * @package herbanext
 */

namespace HERBANEXT_THEME\Inc;

use HERBANEXT_THEME\Inc\Traits\Singleton;

class SidebarWidgets {
    use Singleton;

    protected function __construct() {
        // Add action hooks to register custom post types
        $this->setup_cpt_hooks();
    }

    protected function setup_cpt_hooks() {
        add_action('widgets_init', array($this, 'register_custom_sidebars'));
    }

    public function register_custom_sidebars() {
        // Register Product Sidebar
        register_sidebar(
            array(
                'name' => esc_html__('Product Sidebar', 'herbanext'),
                'id' => 'product-sidebar',
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
            )
        );

        // Register Post Sidebar
        register_sidebar(
            array(
                'name' => esc_html__('Post Sidebar', 'herbanext'),
                'id' => 'post-sidebar',
                'before_widget' => '<div class="widget">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
            )
        );
    }
}
