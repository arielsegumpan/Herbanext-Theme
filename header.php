<?php
/**
 * Header Template
 * @package herbanext
 */
$get_prload_img = get_acf_option_field('preloader');

?>
<!doctype html>
<html lang="<?php language_attributes() ?>">
  <head>
    <meta charset="<?php bloginfo( 'charset' )?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Herbanext</title>
    <?php wp_head();?>
</head>
  <body <?php body_class() ?>>
     <!-- preloader -->
     <div id="preloader">
        <div class="loading-container">
            <img src="<?php echo esc_url($get_prload_img['preloader_icon']['url']) ?>" alt="<?php echo esc_attr($get_prload_img['preloader_icon']['alt']) ?>" class="d-block mx-auto" width="<?php echo esc_attr($get_prload_img['icon_width']) ?>" height="<?php echo esc_attr($get_prload_img['icon_height']) ?>">
            <div class="loading-text fs-5">
            </div>
          </div>
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
                        <a href="<?php echo esc_url(site_url('/shop')) ?>" class="btn btn-success"><i class="bi bi-shop"></i></a>
                    </div>
                    <div class="login">
                        <a href="#!" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#loginModal"><i class="bi bi-person-circle"></i></a>
                    </div>
                </div>

              </div>
            </div>
        </nav>
    </header>
    <!-- Modal -->
    <div class="modal fade " id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-5 p-3">
                <div class="modal-header border-0">
                <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5">
                    <div class="container">
                        <div class="row mb-5 pb-2">
                            <div class="col-10 mx-auto text-center">
                                <a href="#!" class="text-decoration-none">
                                    <img src="assets/imgs/herbanext.png" alt="" width="auto" height="50px">
                                </a>
                            </div>
                        </div>
                        <form action="#!">
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="" class="mb-2 fw-bold">Username</label>
                                    <input type="text" class="form-control px-4 py-3" required autofocus placeholder="Enter your username">
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col">
                                    <label for="" class="mb-2 fw-bold">Password</label>
                                    <input type="password" class="form-control px-4 py-3" required placeholder="Enter your password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-success btn-lg w-100 py-3"><i class="bi bi-box-arrow-in-right me-3"></i>Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- end of nav -->


