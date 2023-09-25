<?php
/**
 * Template Name: Story
 * @package herbanext
 */
get_header();

$story_jumb = get_acf_field('story_jumbotron');
$story_who_we_Are = get_acf_field('who_we_are');
$who_imgs = $story_who_we_Are ? $story_who_we_Are['content_image'] : [];
$novel_portfolio = get_acf_field('novel_portfolio');
$certified_toll = get_acf_field('certified_toll');
$organic = get_acf_field('organic');
$innovative = get_acf_field('innovative');
$committed = get_acf_field('committed_to_science');
$mission_and_vision = get_acf_field('mission_and_vision');
$vision_cards = $mission_and_vision ? $mission_and_vision['herbanext_visions'] : [];
$core_values = get_acf_field('core_values');
$core_values_imgs = $core_values ? $core_values['core_values_cards'] : [];
$quality_standard = get_acf_field('quality_standard');
$quality_standard_lists = $quality_standard ? $quality_standard['quality_standard_lists'] : [];
$quality_standard_imgs = $quality_standard ? $quality_standard['quality_standard_images'] : [];
?>

    <main>
        <!-- jumbotron -->
        <section id="jumbotron_about" class="w-100 position-relative">
           <?php if($story_jumb != null) :?>
                <img src="<?php echo esc_url($story_jumb['jumbotron_story_image']['url']) ?>" alt="<?php echo esc_attr($story_jumb['jumbotron_story_image']['alt']) ?>" class="object-fit-cover w-100 position-absolute top-0 left-0">
           <?php endif?>
            <div class="container position-absolute">
                <?php echo do_shortcode( '[custom_page_headers]' ) ?>
            </div>
        </section>  
       <section id="about">
        <!-- who we are -->
        <?php if($story_who_we_Are != null):?>
        <div class="who_are_are">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mb-5 mb-md-0 text-center text-md-start">
                        <h1 class="display-3 museo fw-bold">
                            <?php echo esc_html_e($story_who_we_Are['content_title'])?>
                        </h1>
                        <p class="lh-lg text-secondary mt-5">
                            <?php echo esc_textarea($story_who_we_Are['content'])?>
                        </p>    
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row mb-4">
                        <?php if($who_imgs):?>
                            <?php foreach ($who_imgs as $key => $who_img):?>
                            <div class="col<?php echo $key === array_key_first($who_imgs) ? '-12 mb-4' : '' ?>">
                                <img src="<?php echo esc_url($who_img['image']['url'])?>" alt="<?php echo esc_attr($who_img['image']['alt'])?>" class="img-fluid w-100 rounded-5 object-fit-cover">
                            </div>
                            <?php endforeach ?>
                        <?php endif?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif?>
        <!-- novel portfolio -->
        <?php if($novel_portfolio != NULL) :?>
        <div class="novel_portfolio bg-success">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 px-md-5 mb-5 mb-md-0 text-center text-md-start">
                    <h1 class="display-5 museo text-white fw-bold mb-5"><?php echo esc_html_e($novel_portfolio['content_title']) ?></h1>
                        <img src="<?php echo esc_url($novel_portfolio['content_image']['url']) ?>" alt="<?php echo esc_url($novel_portfolio['content_image']['alt']) ?>" class="img-fluid rounded-5">
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-start my-auto pe-md-5">
                        <p class="text-secondary text-gray lh-lg">
                            <?php echo esc_textarea(nl2br($novel_portfolio['content'])) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <!-- certified toll -->
        <?php if($certified_toll != NULL): ?>
        <div class="certified_toll">
            <div class="container">
                <div class="col-12 text-center">
                    <img src="<?php echo esc_url($certified_toll['certified_toll_image']['url']) ?>" alt="<?php echo esc_attr($certified_toll['certified_toll_image']['alt']) ?>" class="rounded-5 object-fit-cover">
                    <div class="certified_toll_content">
                        <div class="col-12 col-lg-5 mx-auto">
                            <div class="certified_icon mb-5">
                                <img src="<?php echo esc_url($certified_toll['certified_toll_icon']['url']) ?>" alt="<?php echo esc_attr($certified_toll['certified_toll_icon']['alt']) ?>">
                            </div>
                            <h1 class="display-5 museo fw-bold mb-5"><?php echo esc_html_e($certified_toll['content_title']) ?></h1>
                        </div>
                        
                        <p class="lh-lg mt-5 text-secondary px-md-5">
                            <?php echo esc_textarea(nl2br($certified_toll['content'])) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <!-- organic -->
        <?php if($organic != NULL):?>
        <div class="organic position-relative w-100">
            <img src="<?php echo esc_url($organic['oragnic_image']['url']) ?>" alt="<?php echo esc_attr($organic['oragnic_image']['alt']) ?>" class="object-fit-cover w-100 position-absolute">
            <div class="container position-absolute">
                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-7 me-auto my-auto px-5 px-md-auto">
                        <h1 class="museo dispaly-5 text-black fw-bold pe-5"><?php echo esc_html_e($organic['organic_title']) ?></h1>
                        <p class="lh-lg text-secondary mt-5">
                            <?php echo esc_textarea(nl2br($organic['organic_content'])) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif?>
        <!-- innovative solutions -->
        <?php if($innovative != null): ?>
        <div class="innovative">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img src="<?php echo esc_url($innovative['innovative_image']['url']) ?>" alt="<?php echo esc_attr($innovative['innovative_image']['alt']) ?>" class="img-fluid rounded-5">
                    </div>
                    <div class="col-12 col-md-6 my-auto px-md-5 text-center text-md-start">
                        <h1 class="museo dispaly-5 text-black fw-bold pe-md-5 mt-5 mt-md-0"><?php echo esc_html_e($innovative['innovative_title']) ?></h1>
                        <p class="lh-lg text-secondary mt-5">
                        <?php echo esc_textarea(nl2br($innovative['innovative_content'])) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif?>
        <!-- committed to science -->
        <?php if($committed != null) :?>
        <div class="committed bg-success">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 my-auto text-center text-md-start mb-5 mb-md-0">
                        <h1 class="museo display-5 text-white fw-bold"><?php echo esc_html_e($committed['committed_title']) ?></h1>
                        <p class="lh-lg text-white mt-5">
                        <?php echo esc_textarea(nl2br($committed['committed_content'])) ?>
                        </p>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="<?php echo esc_url($committed['committed_image']['url']) ?>" alt="<?php echo esc_url($committed['committed_image']['alt']) ?>" class="img-fluid rounded-4 rounded-md-5">
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <!-- mission vision -->
        <?php if($mission_and_vision != null): ?>
        <div class="mission_vision">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if($mission_and_vision['mission_image'] != null )  :?>
                        <img src="<?php echo esc_url($mission_and_vision['mission_image']['url']) ?>" alt="<?php echo esc_attr($mission_and_vision['mission_image']['alt']) ?>" class="img-fluid rounded-5">
                        <?php endif?>
                    </div>
                    <div class="col-12 col-md-6 mx-auto text-center mt-5">
                        <div class="mission">
                            <h1 class="museo dispaly-5 fw-bold"><?php echo esc_html_e($mission_and_vision['mission_title']) ?></h1>
                            <p class="lh-lg lead"><?php echo esc_html_e($mission_and_vision['mission_subheading']) ?></p>
                        </div>
                    </div>
                </div>
                <div class="vision">
                    <div class="row mb-5">
                        <div class="col-12 col-md-6 mx-auto text-center mt-5">
                            <div class="mission">
                                <h1 class="museo display-5 fw-bold"><?php echo esc_html_e($mission_and_vision['vision_title']) ?></h1>
                            </div>
                        </div>
                    </div>
                   <div class="row row-cols row-cols-md-2 row-cols-lg-3 row-gap-5">
                   <?php if($vision_cards):?>
                        <?php foreach ($vision_cards as $key => $vision_card):?>
                            <div class="col">
                                <div class="d-flex flex-row justify-content-between align-items-start gap-3">
                                    <?php if($vision_card['icon'] != null):?>
                                        <img src="<?php echo esc_url($vision_card['icon']['url'])?>" alt="<?php echo esc_attr($vision_card['icon']['alt'])?>" class="bg-gray rounded-5 p-3">
                                    <?php endif?>
                                    <div class="vision_title_Wrap">
                                        <h6 class="museo fw-bold fs-3"><?php echo esc_html_e($vision_card['title']) ?></h6>
                                        <small class="text-secondary"><?php echo wp_kses_post($vision_card['content']) ?></small>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif?>
                   </div>
                </div>
            </div>
        </div>
        <?php endif?>
        <!-- core vlaues -->
        <?php if($core_values != null):?>
        <div class="core_values bg-success">
            <div class="container">
                <div class="row">
                    <div class="col-6 mx-auto text-center mt-5">
                        <div class="mission">
                            <h1 class="museo dispaly-5 text-white fw-bold"><?php echo esc_html_e($core_values['core_title']) ?></h1>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-3 row-gap-5 mt-5 pt-5">
                    <?php if($core_values_imgs):?>
                        <?php foreach ($core_values_imgs as $key => $core_values_img):?>          
                            <div class="col-12 col-md-3">
                                <div class="d-flex flex-column justify-content-center gap-3 align-items-center">
                                    <?php if($core_values_img['core_card_image'] != null):?>
                                        <img src="<?php echo esc_url($core_values_img['core_card_image']['url'])?>" alt="<?php echo esc_attr($core_values_img['core_card_image']['alt'])?>" class="bg-gray rounded-5 p-3">
                                    <?php endif?>
                                    <div class="vision_title_Wrap text-center">
                                        <h6 class="museo fw-bold text-white fs-3"><?php echo esc_html_e($core_values_img['core_card_heading']) ?></h6>
                                        <p class="text-secondary text-white mt-3"><?php echo esc_html_e($core_values_img['core_card_sub_heading']) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif?>
                </div>
            </div>
        </div>
        <?php endif?>
        <!-- quality standards -->
        <?php if($quality_standard != null):?>
        <div class="quality_standard">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h1 class="museo dispaly-5 fw-bold text-center text-md-start"><?php echo wp_kses_decode_entities(nl2br($quality_standard['title'])) ?></h1>
                        <ul class="list-group list-group-flush mt-5">
                        <?php if($quality_standard_lists != null): $count=0?>
                        <?php foreach ($quality_standard_lists as $key => $quality_standard_list) : $count++?>          
                            <li class="list-group-item bg-transparent mb-5 mb-md-4 pt-0 px-0 pb-4">
                                <div class="d-flex flex-column flex-md-row justify-content-md-start align-items-center gap-3">
                                    <span class="bg-success px-4 py-3 text-white fw-bold rounded-4"><?php echo $count < 10 ? '0' . $count : $count; ?></span>
                                    <div>
                                        <h5 class="fw-bold text-center text-md-start">
                                           <?php echo esc_html_e($quality_standard_list['list_content']) ?>
                                        </h5>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach ?>
                        <?php endif?>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                        <?php if($quality_standard_imgs):?>
                            <?php foreach ($quality_standard_imgs as $key => $quality_standard_img):?>
                            <div class="col<?php echo $key === array_key_last($quality_standard_imgs) ? '-12 mt-4' : '' ?>">
                                <img src="<?php echo esc_url($quality_standard_img['image']['url'])?>" alt="<?php echo esc_attr($quality_standard_img['image']['alt'])?>" class="img-fluid w-100 rounded-5 object-fit-cover">
                            </div>
                            <?php endforeach ?>
                        <?php endif?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif?>
       </section>
    </main>



<?php
get_footer()?>