<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
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
                    <h2>Edit Service</h2>
                </div>
            </div>
        </div>
    </div><!-- End Page Header -->

    <section id="about" class="about">
        <div class="container">

            <div class="row gy-4 justify-content-center">
                <?= $this->Form->create($service) ?>
                <?php echo $this->Form->control('title',['class'=>'form-control']);?>
                <?php echo $this->Form->control('content',['type'=>'textarea']);?>
            </div>
            <div class="row gy-4 justify-content-center" style="padding-top: 25px">
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
    </section><!-- End About Section -->
</main>
<script>
    tinymce.init({
        selector: "textarea",
        menubar: false,
        // full plugins list can be found in https://www.tinymce.com/docs/demo/full-featured/
        plugins: "image link media template codesample advlist lists wordcount imagetools  emoticons fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media table anchor toc lists wordcount imagetools contextmenu colorpicker textpattern help'",
        toolbar: 'fontsizeselect | undo redo | forecolor backcolor| numlist bullist | bold italic  underline strikethrough | alignleft aligncenter alignright alignjustify | outdent indent | emoticons',
        toolbar_mode: 'floating',
    });

</script>


