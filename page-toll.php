<?php
/**
 * Template Name: Toll Manufacturing
 * @package herbanext
 */
get_header();

$jumb = get_field('jumbotron');
$cont_sec_1 = get_field('content_section_1');
$cont_imgs = $cont_sec_1['content_image'];

?>


    <main>
        <!-- jumbotron -->
        <section id="jumbotron_about" class="w-100 position-relative">
            <img src="<?php echo esc_url($jumb['jumbotron_background_image']['url']) ?>" alt="<?php echo esc_url($jumb['jumbotron_background_image']['alt']) ?>" class="object-fit-cover w-100 position-absolute top-0 left-0">
            <div class="container position-absolute">
                <div class="col-12 col-md-8 col-lg-6 mx-auto text-center my-auto">
                <?php
                    if(is_page() && !is_front_page()):?>
                        <h1 class="display-2 museo fw-bold text-success">
                            <?php single_post_title() ?>
                        </h1>
                    <?php endif
                ?>
                    <h6 class="mt-2 mt-md-4">
                        Home / Toll Manufacturing
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
        <div class="novel_portfolio bg-success">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6 px-md-5 mb-5 mb-md-0 text-center text-md-start">
                        <h1 class="display-5 museo text-white fw-bold mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, veritatis</h1>
                        <img src="assets/imgs/herbanext-DOST-BIST-2.jpg" alt="" class="img-fluid rounded-5">
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-start my-auto pe-md-5">
                        <p class="text-secondary text-gray lh-lg">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi voluptas quisquam sint nesciunt error quo incidunt ut adipisci labore provident veritatis eum numquam doloremque obcaecati, iure necessitatibus praesentium et ipsum. Possimus porro tempore ipsum ipsa id ad commodi quis quo nesciunt, in, impedit sunt perspiciatis veritatis fuga voluptatem? Ut aliquam quod ad praesentium nesciunt quasi, totam quibusdam provident ab a quas aliquid voluptatibus ea quo, tempore nam nisi voluptatum asperiores minima placeat quos non repellendus eaque? Recusandae a voluptatum sit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- organic -->
        <div class="organic position-relative w-100">
            <img src="assets/imgs/essential-oil-peppermint-bottle-with-fresh-green-peppermint.jpg" alt="" class="object-fit-cover w-100 position-absolute">
            <div class="container position-absolute">
                <div class="row">
                    <div class="col-12 col-lg-8 col-xl-6 me-auto my-auto px-5 px-md-auto">
                        <h1 class="museo dispaly-5 text-black fw-bold pe-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae, dolorum</h1>
                        <p class="lh-lg text-secondary mt-5">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum voluptas ipsa numquam alias eos. Et corporis reprehenderit ipsum facere accusamus dolorum perspiciatis amet hic, sapiente iure nemo eos quibusdam, adipisci repellat consequuntur laboriosam aliquam, maxime ipsa porro earum fugiat deleniti officia facilis. Deleniti eveniet error nemo rerum, aliquam aliquid hic.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- innovative solutions -->
        <div class="innovative">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img src="assets/imgs/foodtech-lasalle4.jpg" alt="" class="img-fluid rounded-5">
                    </div>
                    <div class="col-12 col-md-6 my-auto px-md-5 text-center text-md-start">
                        <h1 class="museo dispaly-5 text-black fw-bold pe-md-5 mt-5 mt-md-0">Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                        <p class="lh-lg text-secondary mt-5">
                           Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, perferendis sit. Ea nostrum quam doloremque, recusandae omnis error neque quo debitis deleniti nobis amet est incidunt, culpa magni perferendis cupiditate sint accusamus in. Perspiciatis repellat enim nam quae. Sapiente qui quam a numquam harum perferendis veniam consequatur laborum ex. Ullam quas sit exercitationem debitis rem at. Numquam repellendus quasi adipisci ad modi! Ut voluptatum nisi pariatur minima maxime reiciendis saepe, necessitatibus sed minus nemo ducimus qui, nesciunt accusantium veniam iusto amet quas soluta eius iste illo! Facere quaerat cumque error mollitia perspiciatis laboriosam, sit debitis illum corporis veritatis, sapiente quos!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- quality standards -->
        <div class="quality_standard bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h1 class="museo dispaly-5 fw-bold text-center text-md-start">Lorem ipsum dolor sit amet</h1>
                        <p class="lh-lg mt-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. At nihil aliquid magnam ab tenetur optio exercitationem ea id labore, maxime illo nobis nisi aut architecto, ratione nulla, perspiciatis repellat vitae non consequatur quasi incidunt enim reprehenderit doloremque! Qui recusandae doloribus provident eius voluptatibus! Nesciunt, repellat? Exercitationem, temporibus doloribus esse labore impedit officiis voluptas deleniti soluta, quos harum autem vitae non ipsa earum est ut voluptatem cupiditate iure dolor laudantium commodi! Sequi non enim magni voluptatibus error suscipit cupiditate vero. Inventore illum voluptatibus, error eveniet incidunt porro reprehenderit fugit, odio amet, rem soluta fugiat a recusandae corporis iste! Dolor, nesciunt mollitia?</p>
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