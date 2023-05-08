<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Media $media
 * @var \Cake\Collection\CollectionInterface|string[] $talents
 */
?>

<!-- ======= THIS VIEW IS NO LONGER BEING USED ======= -->
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
                <h2>Add Media</h2>
            </div>
        </div>
    </div>
</div><!-- End Page Header -->

    <section id="about" class="about">
        <div class="container">

            <div class="row gy-4 justify-content-center">

                <div class="col-lg-4"> <strong>Upload Image</strong>
                    <?= $this->Form->create($media, ['type'=>'file']) ?>
                    <?php echo $this->Form->control('filename',['type'=>'file', 'label'=>'']);?>
                    <?php if ($media->filename != null) { ?>
                        <?= $this->Html->image($media->filename,['class'=>'img-fluid'])?>
                    <?php } ?>
                </div>
            </div>
                <div class="row gy-4 justify-content-center" style="padding-top: 25px">
                <div class="col-lg-5 content">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul>
                                <?= $this->Form->control('talent_id', ['options' => $talents, 'label'=>'Talent Name']);?>

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
    </section><!-- End About Section -->
