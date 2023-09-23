<?php
/**
 * Register Herbanext Custom Post Type.
 * @package herbanext
 */
namespace HERBANEXT_THEME\Inc;

use HERBANEXT_THEME\Inc\Traits\Singleton;

class Widgets{
    use Singleton;

    protected function __construct() {
        // Add action hooks to register custom post types
        $this->setup_widget_hooks();
    }

    protected function setup_widget_hooks() {
        // Add any setup related to custom post types here
    }

    // ======================== THIS IS SIDEBAR WIDGET ========================//


}

