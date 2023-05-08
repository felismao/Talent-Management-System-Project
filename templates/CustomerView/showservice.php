<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service[]|\Cake\Collection\CollectionInterface $services
 */
?>
<style>
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 20px;
        transition: 0.4s;
    }

     .accordion:hover {
        background-color: #ccc;
    }

    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
        border-style: outset;
    }
</style>
<div class="breadcumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-end">
            <div class="col-12">
                <div class="breadcumb--con">
                    <h2 class="title">Services</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a <?= $this->Html->link(
                                    '⌂ Home',
                                    ['controller' => 'CustomerView', 'action' => 'index'],
                                    ['class' => ''])
                                ?></a></li>
                            <li class="breadcrumb-item " aria-current="page">Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="mona-tab-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <br>
                <br>
                <?php foreach ($services as $service): ?>
                    <button class="accordion"><?= h($service->title) ?></button>
                    <div class="panel">
                        <p><?= $service->content?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>
</div>


<!--Accordion animation-->
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>

