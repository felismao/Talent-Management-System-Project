<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent[]|\Cake\Collection\CollectionInterface $talents
 */
?>


<!-- ***** Top Search Area Start ***** -->
<div class="top-search-area">
    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Close Button -->
                    <button type="button" class="btn close-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <!-- Form -->
                    <form action="index.html" method="post">
                        <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ***** About Us Area Start ***** -->
<section class="mona-about-us-area mb-20 section-padding-0" style="padding-top:110px">
    <div class="container">
        <div class="row">

            <!-- About Us Thumbnail -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="about-us-thumbnail mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <span class="line"></span>
                    <?= $this->Html->image('16.jpg') ?>
                    <span class="line2"></span>
                </div>
            </div>

            <!-- About Us Thumbnail -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="about-us-thumbnail mb-50 wow fadeInUp" data-wow-delay="400ms">
                    <span class="line"></span>
                    <?= $this->Html->image('17.jpg') ?>
                    <span class="line2"></span>
                </div>
            </div>

            <!-- About Us Content -->
            <div class="col-12 col-lg-4">
                <div class="about-us-content mb-30 wow fadeInUp" data-wow-delay="700ms">
                    <?= $this->Html->image('logos/logo-placeholder.jpg') ?>
                    <h3><strong>Unique Talent Consulting & Casting</strong></h3>
                    <br>
                    <h5><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></h5>
                    <h7><strong>Specializing in the sub culture and alternative lifestyles for</strong></h7>
                    <br>
                    <h7>Film | TV | Music Video | Commercials | Documentaries | Stage | Modeling |
                    Fashion | Edge Performance | Events | Print/Digital Media</h7>
                </div>
            </div>
        </div>
    </div>


<!-- ***** Model Area Start ***** -->
<section class="mona-model-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <br>
                <br>
                <div class="model-tab-area">
                    <br>
                    <br>

                    <ul class="nav nav-tabs mb-50" id="mona_modelTab" role="tablist">
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">All</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Model</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" id="tab3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Actor</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" id="tab4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Singer</a>-->
<!--                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Mona Tab Content -->
    <div class="mona-tab-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content" id="mona_modelTabContent">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                            <!-- All Model Slide -->
                            <div class="mona-all-model-slide owl-carousel">
                                <!-- Single Model Item -->
                                <?php foreach ($talents as $queries): ?>
                                <div class="single-model-item">
                                    <div class="model-thumbnail">
                                        <!-- First Thumbnail -->
                                        <?php echo $this->Html->image($queries->featurephoto, [
                                            'class'=>'first-thumbnail',
                                            "alt" => "Feature Photo",
                                            'url' => ['action' => 'view', $queries->id]
                                        ]); ?>

                                        <?php echo $this->Html->image($queries->featurephoto, [
                                            'class'=>'second-thumbnail',
                                            "alt" => "Feature Photo",
                                            'url' => ['action' => 'view', $queries->id]
                                        ]); ?>
                                        <!-- Share Info -->
                                        <div class="share-info">
                                            <!-- Share Icon -->
<!--                                            <div class="share-icon">-->
<!--                                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>-->
<!--                                            </div>-->
<!--                                             Others Icon -->
<!--                                            <div class="others-icon">-->
<!--                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>-->
<!--                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>-->
<!--                                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>-->
<!--                                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>-->
<!--                                                <a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>-->
<!--                                            </div>-->
                                        </div>
                                    </div>
                                    <div class="model-info">
                                        <!-- <h3><?= $this->Html->link(__($queries->name), ['action' => 'view', $queries->id]) ?></h3> -->

                                        <h3>
                                            <!-- Display Talent Pseudonym if the have one, else display their first name, else last name -->
                                            <?php if ($queries->name != null){ ?>
                                                <?= $this->Html->link(_($queries->name), ['action' => 'view', $queries->id]);?>
                                            <?php }  elseif ($queries->firstname != null){ ?>
                                                <?= $this->Html->link(_($queries->firstname), ['action' => 'view', $queries->id]);?>
                                            <?php } else { ?>
                                                <?= $this->Html->link(_($queries->lastname), ['action' => 'view', $queries->id]);} ?></h3>


                                        <?php if ($queries->location->name != null) { ?>
                                            <h6 style="font-size: 12.5px; padding-top: 5px">
                                                <?php echo $queries->location->name ?></h6>
                                        <?php } ?>

                                        <?php if ($queries->gender != null) { ?>
                                            <h6 style="font-size: 12.5px; padding-top: 5px">
                                                <?php echo $queries->gender ?></h6>
                                        <?php } ?>

                                        <?php if ($queries->agerangeone != null) { ?>
                                            <h6 style="font-size: 12.5px; padding-top: 5px">
                                                <?php echo $queries->agerangeone ?></h6>
                                        <?php } ?>

                                        <?php if ($queries->category != null or $queries->categorytwo != null or $queries->categorythree != null) { ?>
                                        <h6 style="font-size: 12.5px; padding-top: 5px">
                                            <?php if ($queries->category != null) { ?>
                                                <?= $queries->category;?>
                                            <?php } if ($queries->categorytwo != null and $queries->category != null) { ?>|
                                                <?= $queries->categorytwo; ?>
                                            <?php } if ($queries->categorythree != null and $queries->categorytwo != null)  { ?>|
                                                <?= $queries->categorythree; } ?>
                                        </h6>
                                        <?php } ?>

                                        <!--<h6 style="font-size: 12.5px; padding-top: 5px">
                                            <?php if ($queries->agerangeone != null) { ?>
                                                <?php echo $queries->agerangeone;?>
                                            <?php } if ($queries->agerangetwo != null and $queries->agerangeone != null) { ?>|
                                            <?php } if ($queries->agerangetwo != null) { ?>
                                                <?php echo $queries->agerangetwo; ?>
                                            <?php } if ($queries->agerangetwo != null and $queries->agerangethree != null) { ?>|
                                            <?php } if ($queries->agerangethree != null) { ?>
                                                <?php echo $queries->agerangethree; } ?></span>
                                        </h6> -->

                                        <br>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Model Area End ***** -->

<!-- ***** Client Feedback Area Start ***** -->
<section class="clients-feedback-area section-padding-80 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            </div>
        </div>
    </div>
</section>
<!-- ***** Client Feedback Area End ***** -->

<!-- ***** CTA Area Start ***** -->
<section class="mona-cta-area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content">
                    <h2>Need a Talent?</h2>
                    <?= $this->Html->link(
                        'Contact Us',
                        ['controller' => 'Emails', 'action' => 'add'],
                        ['class' => 'btn mona-btn'])
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


