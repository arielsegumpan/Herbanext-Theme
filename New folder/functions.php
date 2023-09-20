<?php 

if ( ! function_exists( 'herbanext_theme_support' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since herbanext
     *
     * @return void
     */
    function herbanext_theme_support() {
    
        // Add support for block styles.
        add_theme_support( 'wp-block-styles' );
    
        // Enqueue editor styles.
        add_editor_style( 'style.css' );
    
    }
    
    endif;
    add_action( 'after_setup_theme', 'herbanext_theme_support' );




    /*====================================

    Enqueue styles

    =========================================*/

if ( ! function_exists( 'herbanext_styles' ) ) :
    function herbanext_styles(){
        wp_enqueue_style('herbanext-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
        wp_enqueue_style('herbanext-style-blocks', get_template_directory_uri() . '/assets/css/blocks.css');
        
    }
    add_action( 'wp_enqueue_scripts', 'herbanext_styles' );
endif;