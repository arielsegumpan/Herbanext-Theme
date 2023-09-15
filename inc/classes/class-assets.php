<?php
/**
 * Assets theme asseets
 * @package herbanext
 */
namespace HERBANEXT_THEME\Inc;
 use HERBANEXT_THEME\Inc\Traits\Singleton;


 class Assets{
    use Singleton;

    protected function __construct(){
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        add_action('wp_enqueue_scripts',[$this,'register_styles']);
        add_action('wp_enqueue_scripts',[$this,'register_scripts']);
    }

    public function register_styles(){
        wp_register_style('style',get_stylesheet_uri(),[],filemtime(HERBANEXT_DIR_PATH.'/style.css'), 'all');
        wp_register_style('owl_carousel_css','//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css', array(), false, 'all');
        wp_register_style('icons','//cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css', array(), false, 'all');

        wp_enqueue_style('style');
        wp_enqueue_style('owl_carousel_css');
        wp_enqueue_style('icons');
    }


    public function register_scripts(){
        wp_deregister_script('jquery');

        wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', NULL, '3.7.1', true);
        wp_register_script('bootstrap_js', '//cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js',NULL, microtime(),true);
        wp_register_script('owl_carousel_js','///cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', NULL, '1.2.2', true);
        wp_register_script('custom_js',HERBANEXT_DIR_URI.'/assets/js/js.js',NULL, '1.0', true);

        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap_js');
        wp_enqueue_script('owl_carousel_js');
        wp_enqueue_script('custom_js');
    }
 }