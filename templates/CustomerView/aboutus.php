<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\About $abouts
 */
?>
<div class="breadcumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title">About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a <?= $this->Html->link(
                                    '⌂ Home',
                                    ['controller' => 'CustomerView', 'action' => 'index'],
                                    ['class' => ''])
                                ?></a></li>
                            <li class="breadcrumb-item " aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


    <section style="padding-top: 50px"></section>

    <?php foreach ($abouts as $about): ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 align-content-center">
                <h2><?= ($about->title) ?></h2>
                <p><?= ($about->content) ?></p>
            </div>
        </div>
    </div>
    <?php endforeach?>

<section style="padding-top: 50px"></section>

