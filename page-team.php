<?php
/**
 * Template Name: Team
 * @package herbanext
 */
get_header();

$jumb = get_acf_field('jumbotron');
$cont_sec_1 = get_acf_field('content_section_1');
$cont_imgs = $cont_sec_1 ? $cont_sec_1['content_image'] : [];
$cont_sec_2 = get_acf_field('content_section_2');
$cont_sec_3 = get_acf_field('content_section_3');
$cont_sec_4 = get_acf_field('content_section_4');
$cont_sec_5 = get_acf_field('content_section_5');
$cont_imgs_5 = $cont_sec_5 ? $cont_sec_5['content_5_image'] : [];
?>
    <main>
        <!-- jumbotron -->
        <section id="jumbotron_about" class="w-100 position-relative">
           <?php if($jumb): ?>
            <img src="<?php echo esc_url($jumb['jumbotron_background_image']['url']) ?>" alt="<?php echo esc_url($jumb['jumbotron_background_image']['alt']) ?>" class="object-fit-cover w-100 position-absolute top-0 left-0">
           <?php endif?>
            <div class="container position-absolute">
                <div class="col-12 col-md-8 col-lg-6 mx-auto text-center my-auto">
                <?php
                    if(is_page() && !is_front_page()):?>
                        <h1 class="display-2 museo fw-bold text-success">
                            <?php single_post_title() ?>
                        </h1>
                    <?php endif
                ?>
                    <h6 class="mt-4">
                        <nav aria-label="breadcrumb">
                            <?php custom_breadcrumbs() ?>
                        </nav>
                    </h6>
                </div>
            </div>
        </section>  

         <!-- CONTENT 1-->
       <section id="about">
        <?php if($cont_sec_1) : ?>
            <div class="who_are_are">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-5 mb-md-0 text-center text-md-start">
                            <h1 class="display-3 museo fw-bold"><?php echo esc_html_e($cont_sec_1['content_title']) ?></h1>
                            <p class="lh-lg text-secondary mt-5">
                            <?php echo _e(nl2br($cont_sec_1['content']))?>
                            </p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row mb-4">
                                <?php foreach ($cont_imgs as $key => $cont_img):?>
                                <div class="col<?php echo $key === array_key_first($cont_imgs) ? '-12 mb-4' : '' ?>">
                                    <img src="<?php echo esc_url($cont_img['image']['url'])?>" alt="<?php echo esc_attr($cont_img['image']['alt'])?>" class="img-fluid w-100 rounded-5 object-fit-cover">
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <!-- CONTENT 2 -->
        <?php if($cont_sec_2) :?>
        <div class="novel_portfolio bg-success">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 px-md-5 mb-5 mb-md-0 text-center text-md-start">
                        <h1 class="display-5 museo text-white fw-bold mb-5"><?php echo esc_html_e($cont_sec_2['content_title']) ?></h1>
                        <img src="<?php echo esc_url($cont_sec_2['content_image']['url']) ?>" alt="<?php echo esc_url($cont_sec_2['content_image']['alt']) ?>" class="img-fluid rounded-5">
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-start my-auto pe-md-5">
                        <p class="text-secondary text-gray lh-lg">
                            <?php echo esc_html_e(nl2br($cont_sec_2['content'])) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>


        <!-- CONTENT 3 -->
        <?php if($cont_sec_3) :?>
        <div class="organic position-relative w-100">
            <img src="<?php echo esc_url($cont_sec_3['content_3_background_image']['url']) ?>" alt="<?php echo esc_url($cont_sec_3['content_3_background_image']['alt']) ?>" class="object-fit-cover w-100 position-absolute">
            <div class="container position-absolute">
                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-6 me-auto my-auto px-5 px-md-auto">
                        <h1 class="museo dispaly-5 text-success fw-bold pe-5"><?php echo esc_html_e($cont_sec_3['content_title']) ?></h1>
                        <p class="lh-lg text-secondary mt-5">
                            <?php echo _e(nl2br($cont_sec_3['content']))?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>

        <!-- CONTENT 4 -->
        <?php if($cont_sec_4) :?>
        <div class="innovative">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                   <?php if($cont_sec_4['content_4_image']):?>
                    <img src="<?php echo esc_url($cont_sec_4['content_4_image']['url']) ?>" alt="<?php echo esc_attr($cont_sec_4['content_4_image']['alt']) ?>" class="img-fluid rounded-5">
                    <?php endif?>
                    </div>
                    <div class="col-12 col-md-6 my-auto px-md-5 text-center text-md-start">
                        <h1 class="museo dispaly-5 text-success fw-bold pe-md-5 mt-5 mt-md-0"><?php echo esc_html_e($cont_sec_4['content_title']) ?></h1>
                        <p class="lh-lg text-secondary mt-5">
                            <?php if($cont_sec_4['content']):?>
                                <?php echo _e(nl2br($cont_sec_4['content'])) ?>
                            <?php endif?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>

        <!-- CONTENT 5 -->
        <?php if($cont_sec_5['content']) :?>
        <div class="quality_standard bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h1 class="museo dispaly-5 fw-bold text-center text-md-start"><?php echo esc_html_e($cont_sec_5['content_title']) ?></h1>
                        <p class="lh-lg mt-5"><?php echo _e(nl2br($cont_sec_5['content'])) ?></p>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <?php if($cont_imgs_5): ?>
                                <?php foreach ($cont_imgs_5 as $key => $cont_img_5):?>
                                <div class="col<?php echo $key === array_key_last($cont_imgs_5) ? '-12' : ' mb-4' ?>">
                                    <img src="<?php echo esc_url($cont_img_5['image']['url'])?>" alt="<?php echo esc_attr($cont_img_5['image']['alt'])?>" class="img-fluid w-100 rounded-5 object-fit-cover">
                                </div>
                                <?php endforeach ?>
                            <?php endif?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        
       </section>
    </main>




<?php
get_footer()?>