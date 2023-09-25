<?php 
/**
 * Template Name: Partner with us
 * @package herbanext
 */

get_header();

$partner_sec = get_acf_field('partner_section_1');
$partner_sec_2 = get_acf_field('partner_section_2');
$partner_team = get_acf_field('partner_team');
?>

<main>
        <!-- jumbotron -->
        <?php if($partner_sec):?>
        <section id="jumbotron_about" class="w-100 position-relative">
            <?php if( $partner_sec):?>
                <img src="<?php echo esc_url($partner_sec['partner_jumbotron_image']['url']) ?>" alt="<?php echo esc_url($partner_sec['partner_jumbotron_image']['alt']) ?>" class="object-fit-cover w-100 position-absolute top-0 left-0">
            <?php endif ?>
            <div class="container position-absolute">
                <div class="col-12 col-md-8 col-lg-6 me-auto text-center text-md-start my-auto">
                    <?php
                        if(is_page() && !is_front_page()):?>
                            <h1 class="display-2 museo fw-bold text-success">
                                <?php single_post_title() ?>
                            </h1>
                        <?php endif
                    ?>
                    <h6 class="mt-2 mt-md-4">
                        <nav aria-label="breadcrumb">
                            <?php custom_breadcrumbs() ?>
                        </nav>
                    </h6>
                </div>
            </div>
        </section>
        <?php endif?>
       <section id="about">
        <!-- novel portfolio -->
        <?php if($partner_sec) :?>
        <div class="novel_portfolio bg-success">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 px-md-5 mb-5 mb-md-0 text-center text-md-start">
                        <div class="mb-5">
                            <h1 class="display-5 museo text-white fw-bold mb-5"><?php echo esc_html_e($partner_sec['partner_title']) ?></h1>
                            <div class="text-white lh-lg">
                                <?php echo wp_kses_decode_entities( $partner_sec['partner_content'] ) ?>
                            </div>
                        </div>
                        <img src="<?php echo esc_url($partner_sec['partner_image']['url']) ?>" alt="<?php echo esc_url($partner_sec['partner_image']['alt']) ?>" class="img-fluid rounded-5">
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-start my-auto pe-md-5">
                        <?php echo wp_kses_decode_entities($partner_sec['partner_form'])?>
                    </div>
                </div>
            </div>
        </div>
       <?php endif?>
        <!-- certified toll -->
        <div class="certified_toll" >
            <div class="container">
                <div class="col-12 text-center">
                    <div class="certified_toll_content">
                        <?php if($partner_sec_2) :?>
                        <div class="col-12 col-lg-10 mx-auto">
                            <div class="certified_icon mb-5">
                                <img src="<?php echo esc_url($partner_sec_2['partner_icon']['url']) ?>" alt="<?php echo esc_attr($partner_sec_2['partner_icon']['alt']) ?>">
                            </div>
                            <h1 class="display-5 museo fw-bold mb-5"><?php echo esc_html_e($partner_sec_2['partner_title_section_2']) ?></h1>
                            <div class="lh-lg my-5 text-secondary px-md-5 fs-5">
                                <?php echo wp_kses_decode_entities($partner_sec_2['partner_content_section_2']) ?>
                            </div>
                        </div>
                        <?php endif ?>
                        <?php if($partner_team) :?>
                        <div class="container-fluid p-0">
                            <div id="partner">
                                <div class="row row-cols row-cols-md-2 row-cols-lg-3 row-gap-lg-5">
                                    <?php foreach($partner_team as $partner):?>
                                    <div class="col">
                                        <div class="d-flex flex-column justify-content-center align-items-center gap-4 rounded-5 py-4 py-md-5">
                                            <img src="<?php echo esc_url($partner['team_image']['url'])?>" alt="<?php echo esc_attr($partner['team_image']['alt'])?>" class="bg-gray rounded-5 p-3">
                                            <div class="vision_title_Wrap text-center">
                                                <h6 class="museo fw-bold fs-3"><?php echo wp_kses_decode_entities($partner['team_name'])?></h6>
                                                <small class="text-secondary"><?php echo wp_kses_decode_entities($partner['team_content'])?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach?>
                                </div>
                            </div>
                        </div>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
       </section>
    </main>

<?php get_footer() ?>