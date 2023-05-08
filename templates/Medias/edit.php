<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Media $media
 * @var string[]|\Cake\Collection\CollectionInterface $talents
 */
?>

<!-- ======= THIS VIEW IS NO LONGER BEING USED ======= -->
<style>
    .row {
        white-space: nowrap;
    }

    .row > div {
        width: 300px;
        display: inline-block;
    }

    h2{
        color:#000000!important;
    }
    p, li, div{
        color:#000000!important;
    }

</style>

<body style="background-color:#ffffff;">

<main  style="padding-top: 200px" id="main" data-aos="fade" data-aos-delay="1500">


    <section id="about" class="about">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4" style="padding-right: 250px">
                    <div class="col-lg-4" style="padding-right: 250px"> <strong>Upload Image</strong>
                        <?=
                        $this->Form->create($media, ['type'=>'file']) ?>
                        <?php echo $this->Form->control('change_image', ['type'=>'file', 'label'=>'']); ?>
                        <?php if ($media->filename != null) { ?>
                            <?= $this->Html->image($media->filename,['style'=>'width:275px'])?>
                        <?php } else { ?><?php echo $this->Html->image('image-not-found.png', array('alt' => 'error'));?><?php }?>
                    </div>
                    <div class="col-lg-5 content">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <br>
                                    <li><?= $this->Form->control('talent_id', ['options' => $talents, 'label'=>'Talent Name']);?></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="container position-relative">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-6 text-center">
                                <?= $this->Form->button(__('Submit'),['class'=>'button-submit']) ?>

                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
    </section><!-- End About Section -->

</main><!-- End #main -->

