<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Email $email
 */
?>
<style>
    h2{
        color:#000000!important;
    }
    p{
        color:#000000!important;
    }
    a{
        color:blue;
    }
</style>

<main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Enquiry by <?=$email->name ?></h2>
                    <!--                    <a class ="btn mona-btn btn-2 mt-15" href="#bottom">Enquire Talent</a>-->
                </div>

            </div>
        </div>
    </div>
    </div><!-- End Page Header -->

    <section id="about" class="about">
        <div class="container text-center">
            <div class="col">
                <th><strong><?= __('Email: ') ?></strong></th>
                <td><?= $this->Html->link(h($email->email),'mailto:'.$email->email) ?></td>
            </div>
            <div class="col">
                <th><strong><?= __('Contact Number: ') ?></strong></th>
                <td><?= h($email->contact)?></td>
            </div>
                <div class="col">
                    <th><strong><?= __('Purpose: ') ?></strong></th>
                    <td><?= h($email->purpose)?></td>
                </div>
            <div class="col">
                <th><strong><?= __('Company Name: ') ?></strong></th>
                <td><?= h($email->company_name)?></td>
            </div>
            <div class="col">
                <th><?= __('Sent at') ?></th>
                <td><?= h($email->created)?></td>
            </div>
            <div class="col">
                <th><?= __('Interested Talents: ') ?></th>
                <td><strong><?= h($email->interested_talent)?></strong></td>
            </div>
            <div class ='row'>
                    <p class="py-3">
                        <?=$email->enquiry?>
                    </p>
            </div>

        </div>
    </section><!-- End About Section -->
                </div>
            </div>
        </div>
        </div>

        </div>
    </section>

    <!-- End Testimonials Section -->
</main>
<div id="bottom"></div>

