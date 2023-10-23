<?php
/**
 * Register Herbanext Custom Post Type.
 * @package herbanext
 */
namespace HERBANEXT_THEME\Inc;

use HERBANEXT_THEME\Inc\Traits\Singleton;

class Restriction {
    use Singleton;

    protected function __construct() {
        // Add action hooks to register custom post types
        $this->restrict_hooks();
    }

    protected function restrict_hooks() {
        add_filter('acf/settings/show_admin', [$this, 'hide_acf_options_pages_for_non_admins']);
        add_action('admin_menu', [$this, 'remove_menus']);
        add_action('admin_init', [$this, 'restrict_menus_for_non_admin']);
    }

    public function hide_acf_options_pages_for_non_admins($show_admin) {
        return current_user_can('administrator') ? $show_admin : false;
    }

    public function remove_menus() {
        if (!current_user_can('administrator')) {
            remove_menu_page('tools.php');
            remove_menu_page('options-general.php');
            remove_menu_page('edit.php?post_type=page');
            remove_menu_page('wpcf7');
            remove_menu_page('herbanext-shop');
            // ... add more menu pages as needed
        }
    }

    public function restrict_menus_for_non_admin() {
        if (!current_user_can('administrator')) {
            remove_menu_page('blog-settings');
            remove_menu_page('herbanext-shop');
        }
    }
}
