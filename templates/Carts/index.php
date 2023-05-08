<!-- Core theme CSS (includes Bootstrap)-->
<?= $this->Html->css('admin.css') ?>
<?= $this->Html->css('soft-ui-dashboard.min.css') ?>
<?= $this->Html->css('bootstrap.css') ?>
<?= $this->Html->css('swiper-bundle.min.css') ?>
<?= $this->Html->css('glightbox.css') ?>
<?= $this->Html->css('bootstrap-icons.css') ?>
<?= $this->Html->css('viewstyles.css') ?>
<?= $this->Html->css('style.css') ?>
<?= $this->Html->css('bootstrap.min.mona.css') ?>
<?= $this->Html->css('classy-nav.css') ?>
<?= $this->Html->css('owl.carousel.min.css') ?>
<?= $this->Html->css('magnific-popup.css') ?>
<?= $this->Html->css('font-awesome.min.css') ?>
<?= $this->Html->css('slick.css') ?>

<html>
<body style="background-color:#ffffff;">
<style>
    .grid {
        display: grid;
        grid-template-columns: 40px 35px 0px;
    }
    img {
        background: skin-tone.jpg;
        background-size: cover;
        height: 100%;
        width: 100%;
        width:100px;
        height:100px;
        object-fit: cover;
    }

    a {
        font-size: 13.5px;
    }
    .btn-get-started{
        float:right;
        font-family: var(--font-primary);
        font-weight: 400;
        font-size: 14px;
        display: inline-block;
        padding: 12px 40px;
        border-radius: 4px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: 0.3s;
        color: #fff;
        background: #7c37b9;
    }
    .btn-get-started:hover {
        background: #9d4edd;
    }

</style>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <li class="nav-item d-flex align-items-center">
                <a href="javascript:" class="nav-link text-body font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none"></span>
                </a>
            </li>
        </nav>
    </div>
</nav>

<div style="padding-bottom: 0px">
</div>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12" style="padding: 75px">
            <div class="card mb-4">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 "><?= $this->Paginator->sort('Talent') ?></th>
                            <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ps-2"><?= $this->Paginator->sort('Category') ?></th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                        </thead>
                        <?php if($checkOutList != 0){ ?>
                            <tbody>
                            <?php foreach ($checkOutList as $item): ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <?php if ($item['featurephoto'] == null){?> <?php echo $this->Html->image('/image-not-found.png', array('alt' => 'CakePHP', 'class' => 'avatar avatar-lg me-3s')); ?> <?php } else { ?> <img class="avatar avatar-lg me-3" alt="user1" <?= @$this->Html->image($item['featurephoto']); ?> <?php } ?>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <div class="mb-0 text-lg text-bold">
<!--                                                    Check which one is not null-->
                                                    <?php if ($item['name']  != null){ ?>
                                                        <?= h($item['name'] )?>
                                                    <?php }  elseif ($item['firstname']  != null){ ?>
                                                        <?= h($item['firstname']);?>
                                                    <?php } elseif ($item['lastname'] != null) { ?>
                                                        <?= h($item['lastname']); ?>
                                                    <?php } else { ?> No Name <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-secondary text-s">
                                             <?php if ($item['category'] != null) { ?>
                                                 <?= $item['category'];?>
                                             <?php } if ($item['categorytwo'] != null and $item['category'] != null) { ?>|
                                                 <?= $item['categorytwo']; ?>
                                             <?php } if ($item['categorythree'] != null and $item['categorytwo'] != null)  { ?>|
                                                 <?= $item['categorythree']; ?>
                                             <?php } if ($item['category'] == null and $item['categorytwo'] == null and $item['categorythree'] == null) { ?>N/A<?php }?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        <?php }else{ ?>
                            <h1>No Talents Shortlisted</h1>
                        <?php } ?>
                    </table>
                    <?= $this->Html->link('Send an Enquiry',['controller' => 'Emails', 'action' => 'add', 2000],['class' => 'btn mona-btn btn-2 mt-15'] ); ?>

                </div>
        </div>
    </div>
</div>

</body>
</html>

