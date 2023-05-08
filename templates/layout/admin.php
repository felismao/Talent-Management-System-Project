
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Talent Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('swiper-bundle.min.css') ?>
    <?= $this->Html->css('glightbox.css') ?>
    <?= $this->Html->css('bootstrap-icons.css') ?>
    <?= $this->Html->script('plugins/tinymce/tinymce.min.js'); ?>

</head>


    <!-- Template Main CSS File -->
    <?= $this->Html->css('viewstyles.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('bootstrap.min.mona.css') ?>
    <?= $this->Html->css('classy-nav.css') ?>
    <?= $this->Html->css('owl.carousel.min.css') ?>
    <?= $this->Html->css('magnific-popup.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('slick.css') ?>
</head>

<body>

<!-- ======= Header ======= -->
<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="monaNav">

                <!-- Background Curve -->
                <div class="bg-curve" ></div>

                <!-- Logo -->
                <a class="nav-brand" ><?= $this->html->image('logos/logo-placeholder.jpg',['class'=>'nav-brand','width'=>'105px','height'=>'105px'])?></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Menu Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul id="nav">
                            <li class="current-item">
                            <li><?= $this->Html->link(
                                    'About Us',
                                    ['controller' => 'Abouts', 'action' => 'index'],
                                    ['class' => ''])
                                ?> </li>
                            <li class="current-item">
                                <li><?= $this->Html->link(
                                    'Talent',
                                    ['controller' => 'Talents', 'action' => 'index'],
                                    ['class' => ''])
                                    ?> </li>


               <!-- <li><?/*= $this->Html->link(
                        'Medias',
                        ['controller' => 'Medias', 'action' => 'index'],
                        ['class' => ''])
                    */?></li>-->

                <li><?= $this->Html->link(
                        'Users',
                        ['controller' => 'Users', 'action' => 'index'],
                        ['class' => ''])
                    ?></li>
                <li><?= $this->Html->link(
                        'FAQ',
                        ['controller' => 'Faqs', 'action' => 'index'],
                        ['class' => ''])
                    ?></li>
                            <li><?= $this->Html->link(
                                    'Emails',
                                    ['controller' => 'Emails', 'action' => 'index'],
                                    ['class' => ''])
                                ?></li>
                            <li>
                                <?= $this->Html->link(
                                    'Services',
                                    ['controller' => 'Services', 'action' => 'index'],
                                    ['class' => ''])
                                ?>
                            </li>
                            <li><?= $this->Html->link(
                                    'Customer View', '/',
                                    ['controller' => 'CustomerView', 'action' => 'index'],
                                    ['class' => ''])
                                ?></li>

                <li> <?php if(isset($_SESSION['id'])){ ?>
                        <?= $this->Html->link(
                            'Logout',
                            ['controller' => 'users', 'action' => 'logout'])
                        ?>
                    <?php }else{ ?>
                        <?= $this->Html->link(
                            'Logout',
                            ['controller' => 'users', 'action' => 'logout'])
                        ?>
                    <?php } ?>
                </li>
            </ul>
        </nav><!-- .navbar -->


        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header><!-- End Header -->


<?php
echo $this->fetch('content');
?>


<!-- Vendor JS Files -->
<?= $this->Html->script('bootstrap.bundle.js') ?>
<?= $this->Html->script('swiper-bundle.min.js') ?>
<?= $this->Html->script('glightbox.js') ?>
<?= $this->Html->script('aos.js') ?>
<?= $this->Html->script('validate.js') ?>


<!-- Template Main JS File -->
<?= $this->Html->script('main.js') ?>


</body>

</html>


