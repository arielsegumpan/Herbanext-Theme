<?php
/**
 * Footer template
 * @package herbanext
 */
?>
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
                    <h4 class="fw-bold avenir text-white pe-md-5 mb-4 text-center">Quicklinks</h5>
                    <?php get_template_part('template-parts/header/nav');?>
                    <ul class="nav flex-column text-center text-md-start mx-auto ps-lg-5 ms-lg-5 text-black fw-bold">
                        <li class="nav-item mb-4">
                          <a class="text-black fw-bold fs-6 active" aria-current="page" href="services.html">Services</a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="text-black fw-bold fs-6 active" aria-current="page" href="products.html">Products</a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="text-black fw-bold fs-6 active" aria-current="page" href="about.html">About</a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="text-black fw-bold fs-6 active" aria-current="page" href="contact.html">Contact</a>
                        </li>
                        <li class="nav-item mb-4">
                            <a class="text-black fw-bold fs-6 active" aria-current="page" href="careers.html">Career</a>
                        </li>
                      </ul>
                </div>
                <div class="col-12 col-md-3 text-center text-md-start">
                    <div class="d-flex flex-column gap-5">
                        <div class="col text-center text-md-start">
                            <h4 class="avenir fw-bold text-white mb-3">Call</h4>
                            <div class="d-flex flex-row justify-content-center justify-content-md-start">
                                <i class="bi bi-telephone-outbound text-black fs-5 me-3"></i>
                                <a href="tel:+63347328106" class="text-decoration-none text-black fw-bold">+63 34 732 8106</a>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="avenir fw-bold text-white mb-3">Email</h4>
                            <div class="d-flex flex-wrap flex-row align-items-center justify-content-center justify-content-md-start">
                                <i class="bi bi-link-45deg text-black fs-3 me-2"></i>
                                <a href="mailto:info@herbanext.com" class="text-decoration-none text-black fw-bold">info@herbanext.com</a>
                            </div>
                        </div>
                        <div class="col">
                            <h4 class="avenir fw-bold text-white mb-3">Follow Us</h4>
                            <a href="#!" class="text-decoration-none">
                                <i class="bi bi-facebook fs-3 text-black"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- bottom footer -->
            <div class="d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center gap-4 pb-4">
                <p class="fw-bold text-black">&copy;2023 by Herbanext Laboratories, Inc.</p>
                <a href="#!" class="text-decoration-none">
                    <img src="assets/imgs/herbanext-inverted.png" alt="" width="auto" height="50">
                </a>
                <div class="d-flex flex-column flex-md-row gap-3 text-center text-lg-start">
                    <a href="#!" class=" fw-bold text-black">Terms and Conditions</a>
                    <a href="#!" class=" fw-bold text-black">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>



    <?php wp_footer() ;?>
  </body>
</html>
