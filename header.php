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
    <title><?php echo esc_html_e('Herbanext') ?></title>
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
                        <?php
                        $args = array(
                            'echo'           => true,
                            'redirect'       => site_url($_SERVER['REQUEST_URI']), // Redirect to the current page after login
                            'form_id'        => 'loginform',
                            'label_username' => 'Username',
                            'label_password' => 'Password',
                            'label_remember' => true,
                            'label_log_in'   => 'Login',
                            'id_username'    => 'user_login',
                            'id_password'    => 'user_pass',
                            'id_remember'    => 'rememberme',
                            'id_submit'      => 'wp-submit',
                            'remember'       => true,
                            'value_remember' => false, // Set this to true to have the "Remember Me" checkbox checked by default
                            'class_form'     => 'form-signin', // Bootstrap class for the form
                            'class_submit'   => 'btn btn-success btn-lg w-100 py-3', // Bootstrap class for the submit button
                            'class_input'    => 'form-control px-4 py-3', // Bootstrap class for input fields
                        );

                        wp_login_form($args);
                        ?>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- end of nav -->


