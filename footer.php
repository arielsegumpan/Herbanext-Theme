<?php
/**
 * Footer template
 * @package herbanext
 */


$global_setup = get_acf_option_field('global_settings_setup');
$contact_number = $global_setup['global_contact_number'];
if (!empty($contact_number)):
substr($contact_number, 0, 1) === '0' ? $contact_number = '+63' . substr($contact_number, 1) : '';
endif?>
    <footer class="bg-success w-100">
        <div class="container">
            <!-- main footer -->
            <div class="row">
                <div class="col-12 col-md-6 mb-5 mb-md-0">
                    <h4 class="fw-bold avenir text-white pe-md-5 mb-4 text-center text-md-start">Subscribe to our newsletter to
                        stay in touch with the latest.</h5>
                    <form action="#!">
                        <div class="input-group mb-3 position-relative">
                            <input type="text" class="form-control py-3 px-3 rounded-4 position-relative" placeholder="Your email" aria-label="Your email" aria-describedby="button-addon2">
                            <button class="btn btn-black rounded-4 px-5 position-absolute h-100 top-50 end-0 translate-middle-y" type="button" id="button-addon2">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <h4 class="fw-bold avenir text-white pe-md-5 mb-4 text-center"><?php echo esc_html_e('Quicklinks') ?></h5>
                    <?php get_template_part('template-parts/footer/nav');?>
                </div>
                <div class="col-12 col-md-3 text-center text-md-start">
                    <div class="d-flex flex-column gap-5">
                        <div class="col text-center text-md-start">
                            <h4 class="avenir fw-bold text-white mb-3">Call</h4>
                            <div class="d-flex flex-row justify-content-center justify-content-md-start">
                                <i class="bi bi-telephone-outbound text-black fs-5 me-3"></i>
                                <a href="tel:<?php echo esc_attr($contact_number); ?>" class="text-decoration-none text-black fw-bold"><?php echo esc_html($contact_number); ?></a>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="avenir fw-bold text-white mb-3">Email</h4>
                            <div class="d-flex flex-wrap flex-row align-items-center justify-content-center justify-content-md-start">
                                <i class="bi bi-link-45deg text-black fs-3 me-2"></i>
                                <a href="mailto:<?php echo esc_attr($global_setup['global_email_address'])?>" class="text-decoration-none text-black fw-bold"><?php echo esc_html_e($global_setup['global_email_address'])?></a>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="avenir fw-bold text-white mb-3">Follow Us</h4>
                            <a href="<?php echo esc_url($global_setup['socmed_link']) ?>" class="text-decoration-none" target="_blank">
                                <?php echo _e($global_setup['socmed_icon']) ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- bottom footer -->
            <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center gap-4 pb-4">
                <p class="fw-bold text-black"><?php echo esc_html_e($global_setup['global_copyright']) ?></p>
                <?php if($global_setup['footer_logo'] != null) :?>
                <a href="<?php echo esc_url(site_url('/')) ?>" class="text-decoration-none">
                    <img src="<?php echo esc_url( $global_setup['footer_logo']['url'] ) ?>" alt="<?php echo esc_attr( $global_setup['footer_logo']['alt'] ) ?>" width="auto" height="50">
                </a>
                <?php endif?>
                <div class="d-flex flex-column flex-md-row gap-3 text-center text-lg-start">
                    <a href="<?php echo esc_url($global_setup['global_terms_and_conditions']) ?>" class=" fw-bold text-black">Terms and Conditions</a>
                    <a href="<?php echo esc_url($global_setup['global_privacy_policy']) ?>" class=" fw-bold text-black">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>



    <?php wp_footer() ;?>
  </body>
</html>
