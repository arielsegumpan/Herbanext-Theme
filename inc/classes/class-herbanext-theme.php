<?php
/**
 * Bootstrap the theme
 * @package herbanext
 * 
 */

 namespace HERBANEXT_THEME\Inc;

use HERBANEXT_THEME\Inc\Traits\Singleton;

 class HERBANEXT_THEME{
    use Singleton;


    protected function __construct(){
        // Load all class
        Menus::get_instance();
        Assets::get_instance();
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        add_action('after_setup_theme', [$this,'setup_theme']);
        add_filter( 'woocommerce_product_get_rating_html', [$this, 'filter_woocommerce_product_get_rating_html'], 10, 3 ); 
    }

    
    public function setup_theme(){
        add_theme_support('title_tag');
        add_theme_support('post-thumbnails');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('automatic-feed-links');
        add_theme_support( 'custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height'        =>  50,
            'width'         =>  100,
            'flex-height'   =>  true,
            'flex-width'    =>  true,
            'unlink-homepage-logo' => true, 
        ]);
        add_theme_support('custom-background',[
            'default-color'         =>      '#fff',
            'default-image'         =>      '',
            'default-repeat'        =>      'no-repeat',
            'default-size'          =>      'contain',
        ]);
        add_theme_support('html5',[
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style'
        ]);

        add_theme_support( 'woocommerce');
        add_editor_style();

        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );

        // global $content_width;
        // !isset($content_width) ? $content_width = 1320 : '';
    }



    //ratings
    function filter_woocommerce_product_get_rating_html( $rating_html, $rating, $count ) { 
        $rating_html  = '<div class="star-rating">';
        $rating_html .= wc_get_star_rating_html( $rating, $count );
        $rating_html .= '</div>';
        return $rating_html; 
    }
 
 }