<?php
/**
 * Header Template
 * @package herbanext
 */
$get_prload_img = get_acf_option_field('preloader');
$login_url = esc_url(site_url('/wp-login.php'));
$shop_url = esc_url(site_url('/products'));
?>
<!doctype html>
<html <?php wp_kses_decode_entities(language_attributes()) ?>>
  <head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo esc_html_e('Herbanext');?></title>
    <?php wp_head()?>
</head>
  <body <?php body_class();?>>
     <!-- preloader -->
     <div id="preloader">
        <div class="loading-container">
            <img src="<?php echo esc_url($get_prload_img['preloader_icon']['url']); ?>" alt="<?php echo esc_attr($get_prload_img['preloader_icon']['alt']) ;?>" class="d-block mx-auto" width="<?php echo esc_attr($get_prload_img['icon_width']) ?>" height="<?php echo esc_attr($get_prload_img['icon_height']) ?>">
            <div class="loading-text fs-5">
            </div>
          </div>
    </div>
     <!-- scroll btn -->
    <div id="scroll_btn">
        <i class='bi bi-chevron-double-up fs-4 rounded-3 bg-success'></i>
    </div>
    <!-- nav -->
    <header class="fixed-top">
        <nav class="navbar navbar-expand-lg bg-body-transparent">
            <div class="container">
            <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    echo '<a class="navbar-brand" href="' . esc_url(home_url('/')) . '"><img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" width="auto" style="height:42px!important;"></a>';
                } else {
                    echo '<a class="navbar-brand" href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
                }
            ;?>
              <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="wrapper me-1">
                    <div class="icon_ni nav-icon-5">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
              </button>
              <div class="collapse navbar-collapse ps-5 ps-lg-0 py-5 py-lg-0 rounded-md-auto rounded-4" id="navbarSupportedContent">
              <?php get_template_part('template-parts/header/nav');?>
                
                <div class="d-flex flex-row gap-3 mt-4 mt-md-auto">
                    <div class="shop">
                        <a href="<?php echo $shop_url ?>" class="btn btn-success"><i class="bi bi-shop"></i></a>
                    </div>
                    <div class="login">
                        <a href="<?php echo $login_url ?>" class="btn btn-success"><i class="bi bi-person-circle"></i></a>
                    </div>
                </div>

              </div>
            </div>
        </nav>
    </header>

    <!-- end of nav -->


