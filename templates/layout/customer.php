
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="Primal People">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Talent Management System</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('bootstrap.min.mona.css') ?>
    <?= $this->Html->css('animate.css') ?>
    <?= $this->Html->css('classy-nav.css') ?>
    <?= $this->Html->css('owl.carousel.min.css') ?>
    <?= $this->Html->css('magnific-popup.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('slick.css') ?>
    <?= $this->Html->css('hkgrotesk-fonts.css') ?>

    <?= $this->Html->css('plugins/bootstrap/bootstrap.min.css') ?>
    <?= $this->Html->css('plugins/bootstrap/bootstrap-slider.css') ?>
    <?= $this->Html->css('plugins/slick/slick-theme.css') ?>
    <?= $this->Html->css('plugins/jquery-nice-select/css/nice-select.css') ?>
</head>

<body>

<!-- ***** Header Area Start ***** -->
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
                            <li>
                                <?= $this->Html->link(
                                    'Home',
                                    ['controller' => 'CustomerView', 'action' => 'index'],
                                    ['class' => ''])
                                ?></li>
<!--                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./index.html">- Home</a></li>
                                    <li><a href="./about.html">- About Us</a></li>
                                    <li><a href="./projects.html">- Projects</a></li>
                                    <li><a href="./models.html">- Models</a></li>
                                    <li><a href="./casting.html">- Casting</a></li>
                                    <li><a href="./blog.html">- Blog</a></li>
                                    <li><a href="./single-blog.html">- Blog Details</a></li>
                                    <li><a href="./contact.html">- Contact</a></li>
                                    <li><a href="#">- Dropdown</a>
                                        <ul class="dropdown">
                                            <li><a href="#">- Dropdown Item</a></li>
                                            <li><a href="#">- Dropdown Item</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">- Even Dropdown</a></li>
                                                    <li><a href="#">- Even Dropdown</a></li>
                                                    <li><a href="#">- Even Dropdown</a></li>
                                                    <li><a href="#">- Even Dropdown</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">- Dropdown Item</a></li>
                                            <li><a href="#">- Dropdown Item</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>-->
<!--                            <li><a href="./projects.html">Project</a></li>-->
                            <li><?= $this->Html->link(
                                'About Us',
                                ['controller' => 'CustomerView', 'action' => 'aboutus'],
                                ['class' => ''])
                            ?></li>
                            <li>
                            <?= $this->Html->link(
                                'Talent',
                                ['controller' => 'CustomerView', 'action' => 'listtalent'],
                                ['class' => ''])
                            ?></li>
<!--                            <li><a href="./casting.html">Casting</a></li>-->
<!--                            <li><a href="#">Blog</a>-->
<!--                                <ul class="dropdown">-->
<!--                                    <li><a href="./blog.html">- Blog</a></li>-->
<!--                                    <li><a href="./single-blog.html">- Blog Details</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
                            <li>
                                <?= $this->Html->link(
                                    'Services',
                                    ['controller' => 'CustomerView', 'action' => 'showservice'],
                                    ['class' => ''])
                                ?>
                            </li>
                            <li>
                                <?= $this->Html->link(
                                    'Contact Us',
                                    ['controller' => 'Emails', 'action' => 'add'],
                                    ['class' => ''])
                                ?></li>
                            <li>
                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-shopping-cart"></span> Shortlist <span class="badge" id="cart-counter"></span>',
                                    array('controller'=>'Carts','action'=>'index'),array('escape'=>false));?>
                            </li>
                        </ul>
                        <!-- Search Icon -->
                        <div class="search-icon" data-toggle="modal" data-target="#searchModal">
                            <i class="icon_search"></i>
                        </div>
                    </div>
                    <!-- Nav End -->

                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<!-- ***** Top Search Area Start ***** -->
<!--<div class="top-search-area">-->
<!--     Search Modal -->
<!--    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">-->
<!--        <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-body">-->
<!--                      Close Button -->
<!--                    <button type="button" class="btn close-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>-->
<!--                      Form -->
<!--                    <form action="index.html" method="post">-->
<!--                        <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">-->
<!--                        <button type="submit">Search</button>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- ***** Top Search Area End ***** -->
<?php
echo $this->fetch('content');
?>

<footer class="footer-area section-padding-80-0">
    <div class="container">
        <div class="row justify-content-between">

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-4 col-xl-5">
                <div class="single-footer-widget mb-60">
                    <!-- Logo -->
                    <a href="#" class="d-block mb-4"><img src="./img/core-img/logo.png" alt=""></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris id interdum orci, sed rhoncus augue.
                        Fusce pretium arcu neque, eu scelerisque orci accumsan non. Nam fringilla non arcu quis faucibus.
                        Fusce urna justo, porta eget commodo id, pharetra non odio.
                        Vivamus rhoncus augue eros, in cursus nibh blandit eu. In quis nisl rhoncus, pellentesque augue vel, scelerisque dolor.
                        Suspendisse posuere varius sem, ac porta enim interdum quis.</p>
                    <div class="copywrite-text">
                        <p>&copy;
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;2000 - <script>document.write(new Date().getFullYear());</script> All rights reserved
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                <div class="single-footer-widget mb-60">
                    <!-- Widget Title -->
                    <h4 class="widget-title">Our Link</h4>

                    <!-- Catagories Nav -->
                    <nav>
                        <ul class="our-link">
                            <li> <?= $this->Html->link(
                                    'Privacy Policy',
                                    ['controller' => 'CustomerView', 'action' => 'privacypolicy'],
                                    ['class' => ''])
                                ?></li>
                            <li><?= $this->Html->link(
                                    'Terms of Use',
                                    ['controller' => 'CustomerView', 'action' => 'termsofuse'],
                                    ['class' => ''])
                                ?></li>
                            <li><?= $this->Html->link(
                                    'FAQ',
                                    ['controller' => 'CustomerView', 'action' => 'faq'],
                                    ['class' => ''])
                                ?></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-lg-4 col-xl-3">
                <div class="single-footer-widget mb-60">
                    <!-- Widget Title -->
                    <h4 class="widget-title">Contact</h4>
                    <!-- Footer Content -->
                    <div class="footer-content mb-30">
                        <h4>+123 456 789</h4>
                        <h6><?= $this->Html->link(
                                'Email',
                                ['controller' => 'Emails', 'action' => 'add'],
                                ['class' => ''])
                            ?></h6>
                    </div>
                    <!-- Social Info
                    <div class="footer-social-info">
                        <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                    </div>
                    -->
                </div>
            </div>

        </div>
    </div>
</footer>



<!-- Vendor JS Files -->
<?= $this->Html->script('jquery.min.js') ?>
<?= $this->Html->script('popper.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('mona.bundle.js') ?>
<?= $this->Html->script('active.js') ?>


<!-- Template Main JS File -->



</body>

</html>

