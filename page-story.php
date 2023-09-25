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
                            <?php echo _e(nl2br($story_who_we_Are['content']))?>
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
                            <?php echo esc_html_e(nl2br($novel_portfolio['content'])) ?>
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
                            <?php echo _e(nl2br($certified_toll['content'])) ?>
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
                            <?php echo _e(nl2br($organic['organic_content'])) ?>
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
                        <?php echo _e(nl2br($innovative['innovative_content'])) ?>
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
                        <h1 class="museo display-5 text-white fw-bold">Innovative and Customized Solutions</h1>
                        <p class="lh-lg text-white mt-5">
                            Herbanext is committed to advancing the scientific understanding and industrial development of Philippine medicinal plants. In 2009, the company established one of the largest in-situ gene bank of medicinal and aromatic plants in the country with over 200 species in its collection to date. In 2013, Herbanext became the first private company to join the academe-led “Tuklas Lunas” drug discovery research consortium funded by the Philippine Council for Health Research and Development of the Department of Science and Technology (DOST-PCHRD). To date, the consortium has screened over 1,000 species of Philippine medicinal plants for its safety, efficacy, and potential application for drug development. Recently, the Herbanext launched the state-of-the-art Applied Research and Innovation Laboratory for Natural Products (ARIL) with funding support from the DOST Business Innovation through Science and Technology Program. ARIL is a dedicated research facility for the scale-up production of pharmaceutical-grade medicinal plant extracts — a first in the Philippines.
                        </p>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="assets/imgs/intern-work2.jpg" alt="" class="img-fluid rounded-4 rounded-md-5">
                    </div>
                </div>
            </div>
        </div endif>
        <?php ?>
        <!-- mission vision -->
        <div class="mission_vision">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="assets/imgs/2b1c03_49e0d243d3f14a94ba95dd298db4005e~mv2.png" alt="" class="img-fluid rounded-5">
                    </div>
                    <div class="col-12 col-md-6 mx-auto text-center mt-5">
                        <div class="mission">
                            <h1 class="museo dispaly-5 fw-bold">Our Mission</h1>
                            <p class="lh-lg lead">Harnessing medicinal herbs through science and technology.</p>
                        </div>
                    </div>
                </div>
                <div class="vision">
                    <div class="row mb-5">
                        <div class="col-12 col-md-6 mx-auto text-center mt-5">
                            <div class="mission">
                                <h1 class="museo display-5 fw-bold">Our Vision</h1>
                            </div>
                        </div>
                    </div>
                   <div class="row row-cols row-cols-md-2 row-cols-lg-3 row-gap-5">
                    <div class="col">
                        <div class="d-flex flex-row justify-content-between align-items-start gap-3">
                            <img src="assets/imgs/icons-14.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap">
                                <h6 class="museo fw-bold fs-3">Industry</h6>
                                <small class="text-secondary">Be the leading manufacturer of philippine nutraceutical products
                                    through science-based formulas, customized raw materials, and modern processing technology.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-row justify-content-between align-items-start gap-3">
                            <img src="assets/imgs/icons-15.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap">
                                <h6 class="museo fw-bold fs-3">Products</h6>
                                <small class="text-secondary">Develop a portfolio of effective, affordable, and safe ingredients and products for the health needs of our clients, primarily the filipino public.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-row justify-content-between align-items-start gap-3">
                            <img src="assets/imgs/icons-16.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap">
                                <h6 class="museo fw-bold fs-3">Research</h6>
                                <small class="text-secondary">Develop a portfolio of effective, affordable, and safe ingredients and products for the health needs of our clients, primarily the filipino public.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-row justify-content-between align-items-start gap-3">
                            <img src="assets/imgs/icons-19.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap">
                                <h6 class="museo fw-bold fs-3">Country</h6>
                                <small class="text-secondary">Be the leading manufacturer of philippine nutraceutical products
                                    through science-based formulas, customized raw materials, and modern processing technology.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-row justify-content-between align-items-start gap-3">
                            <img src="assets/imgs/icons-18.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap">
                                <h6 class="museo fw-bold fs-3">Environment</h6>
                                <small class="text-secondary">Develop a portfolio of effective, affordable, and safe ingredients and products for the health needs of our clients, primarily the filipino public.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex flex-row justify-content-between align-items-start gap-3">
                            <img src="assets/imgs/icons-17.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap">
                                <h6 class="museo fw-bold fs-3">Humanity</h6>
                                <small class="text-secondary">Develop a portfolio of effective, affordable, and safe ingredients and products for the health needs of our clients, primarily the filipino public.</small>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
               
            </div>
        </div>
        <!-- core vlaues -->
        <div class="core_values bg-success">
            <div class="container">
                <div class="row">
                    <div class="col-6 mx-auto text-center mt-5">
                        <div class="mission">
                            <h1 class="museo dispaly-5 text-white fw-bold">Core Values</h1>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-3 row-gap-5 mt-5 pt-5">
                    <div class="col-12 col-md-3">
                        <div class="d-flex flex-column justify-content-center gap-3 align-items-center">
                            <img src="assets/imgs/icons-20.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap text-center">
                                <h6 class="museo fw-bold text-white fs-3">Quality</h6>
                                <p class="text-secondary text-white mt-3">What we do, we do well</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="d-flex flex-column justify-content-center gap-3 align-items-center">
                            <img src="assets/imgs/icons-21.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap text-center">
                                <h6 class="museo fw-bold text-white fs-3">Leadership</h6>
                                <p class="text-secondary text-white mt-3">Building a better tomorrow today</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="d-flex flex-column justify-content-center gap-3 align-items-center">
                            <img src="assets/imgs/icons-22.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap text-center">
                                <h6 class="museo fw-bold text-white fs-3">Integrity</h6>
                                <p class="text-secondary text-white mt-3">Trust and confidence is what we live for</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="d-flex flex-column justify-content-center gap-3 align-items-center">
                            <img src="assets/imgs/icons-23.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap text-center">
                                <h6 class="museo fw-bold text-white fs-3">Innovation</h6>
                                <p class="text-secondary text-white mt-3">There is always a better way</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="d-flex flex-column justify-content-center gap-3 align-items-center">
                            <img src="assets/imgs/icons-25.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap text-center">
                                <h6 class="museo fw-bold text-white fs-3">Passion</h6>
                                <p class="text-secondary text-white mt-3">Committed in heart and mind</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="d-flex flex-column justify-content-center gap-3 align-items-center">
                            <img src="assets/imgs/icons-26.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap text-center">
                                <h6 class="museo fw-bold text-white fs-3">Productivity</h6>
                                <p class="text-secondary text-white mt-3">Move fast and waste little</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="d-flex flex-column justify-content-center gap-3 align-items-center">
                            <img src="assets/imgs/icons-27.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap text-center">
                                <h6 class="museo fw-bold text-white fs-3">Teamwork</h6>
                                <p class="text-secondary text-white mt-3">Together we achieve more</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="d-flex flex-column justify-content-center gap-3 align-items-center">
                            <img src="assets/imgs/icons-24.png" alt="" class="bg-gray rounded-5 p-3">
                            <div class="vision_title_Wrap text-center">
                                <h6 class="museo fw-bold text-white fs-3">Caring</h6>
                                <p class="text-secondary text-white mt-3">For nature: Nature is the repository of our future discoveries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- quality standards -->
        <div class="quality_standard">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h1 class="museo dispaly-5 fw-bold text-center text-md-start">Our Quality<br/>Standards</h1>
                        <ul class="list-group list-group-flush mt-5">
                            <li class="list-group-item bg-transparent mb-5 mb-md-4 pt-0 px-0 pb-4">
                                <div class="d-flex flex-column flex-md-row justify-content-md-start align-items-center gap-3">
                                    <span class="bg-success px-4 py-3 text-white fw-bold rounded-4">1</span>
                                    <div>
                                        <h5 class="fw-bold text-center text-md-start">
                                            We work with farmers to supply us the highest quality herbs.
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-transparent mb-5 mb-md-4 pt-0 px-0 pb-4">
                                <div class="d-flex flex-column flex-md-row justify-content-md-start align-items-center gap-3">
                                    <span class="bg-success px-4 py-3 text-white fw-bold rounded-4">2</span>
                                    <div>
                                        <h5 class="fw-bold text-center text-md-start">
                                            We maintain our own research farm for developing greener farming technologies.
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-transparent mb-5 mb-md-4 pt-0 px-0 pb-4">
                                <div class="d-flex flex-column flex-md-row justify-content-md-start align-items-center gap-3">
                                    <span class="bg-success px-4 py-3 text-white fw-bold rounded-4">3</span>
                                    <div>
                                        <h5 class="fw-bold text-center text-md-start">
                                            We carefully evaluate each ingredient we use and every supplier we work with.
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-transparent mb-5 mb-md-4 pt-0 px-0 pb-4">
                                <div class="d-flex flex-column flex-md-row justify-content-md-start align-items-center gap-3">
                                    <span class="bg-success px-4 py-3 text-white fw-bold rounded-4">4</span>
                                    <div>
                                        <h5 class="fw-bold text-center text-md-start">
                                            We are committed to products that have proven efficacy and are free of artificial substances and potentially harmful ingredients.
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-transparent mb-5 mb-md-4 pt-0 px-0 pb-4">
                                <div class="d-flex flex-column flex-md-row justify-content-md-start align-items-center gap-3">
                                    <span class="bg-success px-4 py-3 text-white fw-bold rounded-4">5</span>
                                    <div>
                                        <h5 class="fw-bold text-center text-md-start">
                                            We invest in our own manufacturing facilities and do not rely on the services of others.
                                        </h5>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-transparent mb-5 mb-md-4 pt-0 px-0 pb-4">
                                <div class="d-flex flex-column flex-md-row justify-content-md-start align-items-center gap-3">
                                    <span class="bg-success px-4 py-3 text-white fw-bold rounded-4">6</span>
                                    <div>
                                        <h5 class="fw-bold text-center text-md-start">
                                            We invest in people and in research to attain and surpass our quality standards.
                                        </h5>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col mb-4">
                                <img src="assets/imgs/foodtech-lasalle4.jpg" alt="" class="img-fluid rounded-5">
                            </div>
                            <div class="col">
                                <img src="assets/imgs/rd.jpg" alt="" class="img-fluid rounded-5">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <img src="assets/imgs/herbanext_group_photo.jpg" alt="" class="img-fluid w-100 rounded-5 object-fit-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </section>
    </main>



<?php
get_footer()?>