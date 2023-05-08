<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Email $email
 */
$tempString = "";
?>
<?= $this->Html->script('plugins/tinymce/tinymce.min.js'); ?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent[]|\Cake\Collection\CollectionInterface $talents
 */
?>

<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title">Contact Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a <?= $this->Html->link(
                                    '⌂ Home',
                                    ['controller' => 'CustomerView', 'action' => 'index'],
                                    ['class' => ''])
                                ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Breadcrumb Area End ***** -->

<!-- ***** Contact Area Start ***** -->
<section class="mona-contact-area section-padding-80-0">
    <div class="container">
        <div class="row align-items-center justify-content-between">

            <!-- Google Maps -->
            <div class="col-12 col-lg-6 col-xl-6">
                <div class="casting-form-thumbnail mb-80">
                    <?=$this->html->image('30.jpg') ?>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-12 col-lg-6 col-xl-5">
                <div class="mona-contact-form mb-80">
                    <div class="contact-heading">
                        <h2>Interested in Our Talents? </h2>
                        <p>Contact us to enquire about our talents. </p>
                    </div>

                    <?= $this->Form->create($email) ?>
                        <div class="form-group">
                            <?=$this->Form->control('name',['class'=>'form-control']);?>
                        </div>
                        <div class="form-group">
                            <?= $this->Form->control('email',['class'=>'form-control','label'=>'Email Address']);?>
                        </div>
                    <div class="form-group">
                        <?= $this->Form->control('contact',['class'=>'form-control','label'=>'Contact Number']);?>
                    </div>
                    <div class="form-group">
                        <?php if($checkOutList != 0){ ?>
                            <?php foreach ($checkOutList as $item): ?>
                                <?php if ($item['name']  != null){ ?>
                                    <?php $tempString .= h($item['name'].", " )?>
                                <?php }  elseif ($item['firstname']  != null){ ?>
                                    <?php $tempString .= h($item['firstname'].", " );?>
                                <?php } elseif ($item['lastname'] != null) { ?>
                                    <?php $tempString .= h($item['lastname'.", " ]); ?>
                                <?php } else { ?> No Name <?php }?>
                            <?php endforeach; ?>
                        <?php }else{ ?>
                            <h6>No Talents Shortlisted</h6>
                        <?php } ?>
                        <?= $this->Form->control('interested_talent',['class'=>'form-control','label'=>'Interested Talents','value'=>$tempString]);?>
                    </div>
                    <div class="form-group">
                        <?php $options = ['Non-Commercial'=>'Non-Commercial', 'Commercial'=>'Commercial']?>
                        <label>Purposes</label>
                        <?= $this->Form->select('purpose',$options,['class'=>'form-control','label'=>'Purposes']);?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('company_name',['class'=>'form-control','label'=>'Company Name']);?>
                    </div>
                        <div class="form-group">
                            <?= $this->Form->control('enquiry',['type'=>'textarea', 'label'=>'Message']); ?>
                        </div>
                        <?= $this->Form->button(__('Submit'),['class'=>'btn mona-btn btn-2 mt-15']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>

</section>
<!-- ***** Contact Area End ***** -->
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



</body>

</html>

