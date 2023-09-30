<?php
/**
 * Template Name: Contact
 * @package herbanext
 */
get_header();

// Define an array of ACF field names
$contact_acf_fields = array(
    'contact_jumbotron_image' => 'contact_jumbotron_image',
    'body_map' => 'body_map',
    'contact_form' => 'contact_form',
);

// Initialize an empty array to store the field values
$contact_acf_values = array();

// Loop through the field names and fetch their values
foreach ($contact_acf_fields as $key => $contact_field_name) {
    $contact_acf_values[$key] = get_acf_field($contact_field_name);
}

?>

<main>
    <!-- jumbotron -->
    <section id="jumbotron_product" class="w-100 position-relative">
        <?php if (!empty($contact_acf_values['contact_jumbotron_image'])): ?>
             <img src="<?php echo esc_url($contact_acf_values['contact_jumbotron_image']['url']) ?>" alt="<?php echo esc_attr($contact_acf_values['contact_jumbotron_image']['alt']) ?>" class="object-fit-cover w-100 position-absolute bottom-0 left-0">
        <?php endif; ?>
        <div class="container position-absolute">
            <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start my-auto">
                <?php if(is_page() && !is_front_page()): ?>
                    <h1 class="display-2 museo fw-bold text-success">
                        <?php single_post_title(); ?>
                    </h1>
                <?php endif; ?>
                <h6 class="mt-4">
                    <nav aria-label="breadcrumb">
                        <?php custom_breadcrumbs(); ?>
                    </nav>
                </h6>
            </div>
        </div>
    </section>
    <?php if (!empty($contact_acf_values['body_map'])): ?>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                   <?php echo wp_kses_decode_entities($contact_acf_values['body_map']['map']); ?>
                </div>
                <div class="col-12 col-lg-6">
                    <?php echo wp_kses_decode_entities($contact_acf_values['contact_form']); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
