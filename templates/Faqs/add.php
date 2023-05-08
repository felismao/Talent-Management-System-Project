<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $faq
 */
?>

<?= $this->Html->script('plugins/tinymce/tinymce.min.js'); ?>

<style>

    h2{
        color:#000000!important;
    }
    p, li, div{
        color:#000000!important;
    }

</style>

<body style="background-color:#ffffff;">

<main id="main" data-aos="fade" data-aos-delay="1500">
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Add FAQ</h2>
                </div>
            </div>
        </div>
    </div><!-- End Page Header -->

    <section id="about" class="about">
        <div class="container">


            <div class="row gy-4 justify-content-center">
                <?= $this->Form->create($faq) ?>
                <li style="font-size: 20px"><strong><?php echo $this->Form->control('title',['class'=>'form-control']);?></strong></li>
            </div>
            <div class="row gy-4 justify-content-center" style="padding-top: 25px">
                <h5><strong>Content</strong></h5>
                <li style="font-size: 20px"><strong><?php echo $this->Form->control('content',['type'=>'textarea','rows'=>"9", 'cols'=>"110","label"=>'']);?></strong></li>
                <div class="col-lg-5 content">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>

                        </div>
                    </div>
                </div>
                <br><br>
                <div class="container position-relative" style="padding-top: 50px">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <?= $this->Form->button(__('Submit'),['class'=>'button-submit']) ?>

                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <br>
            <br>
    </section><!-- End About Section -->
</main>

