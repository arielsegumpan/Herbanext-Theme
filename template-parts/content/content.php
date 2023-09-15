<?php
/**
 * Content Template
 * @package herbanext
 */?>

<div class="col-12 col-md-6">
    <a href="<?php esc_url(the_permalink()) ?>" class="text-decoration-none">
        <div class="card border-0">
            
            <div class="card-body">
                <div class="post_small_details d-flex flex-wrap flex-row text-secondary gap-4">
                    <h6 class="fw-bold text-secondary"><i class="bi bi-person me-2"></i><?php esc_html(the_author() )?></h6>
                    <h6 class="fw-bold">04/09/2023</h6>
                </div>
                <h1 class="fs-3 museo fw-bold">
                    <?php esc_html( the_title() )?>
                </h1>
                <div class="d-flex flex-wrap flex-row text-center g-5 text-md-start mt-4 align-items-start">
                    <a href="#!" class="text-decoration-none  mb-2">
                        <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum dolor</span>
                    </a>
                    <a href="#!" class="text-decoration-none  mb-2">
                        <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum</span>
                    </a>
                    <a href="#!" class="text-decoration-none  mb-2">
                        <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum dolor</span>
                    </a>
                    <a href="#!" class="text-decoration-none  mb-2">
                        <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem</span>
                    </a>
                    <a href="#!" class="text-decoration-none  mb-2">
                        <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum</span>
                    </a>
                    <a href="#!" class="text-decoration-none  mb-2">
                        <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum dolor</span>
                    </a>
                    <a href="#!" class="text-decoration-none  mb-2">
                        <span class="badge text-bg-green rounded-2 text-small px-3 me-2">Lorem, ipsum dolor</span>
                    </a>
                </div>
            </div>
        </div>
    </a>
</div>