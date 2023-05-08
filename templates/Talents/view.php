<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
 */
?>
<!-- ======= Page CSS ======= -->
<style>
    p{
        color:#000000!important;
    }
    a{
        color:#662e8f;
    }
    a:hover{
        color:#FFFFFF;
    }
</style>

<main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= Display the talents name as the header ======= -->
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 style="color: #0b0b0b"><?=$talent->name ?></h2>
                    <h2 style="color: #0b0b0b"><?=$talent->firstname ?> <?=$talent->lastname ?></h2>
                    <div class="products form content">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ======= End Page Header ======= -->

    <!-- ======= Display the talents information ======= -->
    <!-- ======= This displays all information associated with the talent ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4">
                    <?= $this->Html->image($talent->featurephoto,['class'=>'img-fluid'])?>
                </div>
                <div class="col-lg-5 content">
                    <!--<h2 style="color: #5e1594">Details </h2>
                    <br>-->
                    <div class="row">
                        <div class="col-lg-6" style="width: 100%; white-space:nowrap;">
                            <ul>
                                <!-- if there is no industry information do not display it -->
                                <?php if ($talent->industrythree != null or $talent->industrytwo != null or $talent->industryone != null) { ?>
                                    <li><strong>Industry Interest:</strong> <span><?php if ($talent->industryone != null) { ?>
                                                <?= $talent->industryone;?>
                                            <?php } if ($talent->industrytwo != null and $talent->industryone != null) { ?>|
                                            <?php } if ($talent->industrytwo != null) { ?>
                                                <?= $talent->industrytwo; ?>
                                            <?php } if ($talent->industrytwo != null and $talent->industrythree != null) { ?>|
                                            <?php } if ($talent->industrythree != null) { ?>
                                                <?= $talent->industrythree; ?>
                                            <?php } if ($talent->industrythree == null and $talent->industrytwo == null and $talent->industryone == null) { ?>N/A<?php }?></span></li>
                                <?php }?>

                                <!-- if there is no role information do not display it -->
                                <?php if ($talent->rolethree != null or $talent->roletwo != null or $talent->roleone != null) { ?>
                                    <li><strong>Role Interest:</strong> <span><?php if ($talent->roleone != null) { ?>
                                                <?= $talent->roleone;?>
                                            <?php } if ($talent->roletwo != null and $talent->roleone != null) { ?>|
                                            <?php } if ($talent->roletwo != null) { ?>
                                                <?= $talent->roletwo; ?>
                                            <?php } if ($talent->roletwo != null and $talent->rolethree != null) { ?>|
                                            <?php } if ($talent->rolethree != null) { ?>
                                                <?= $talent->rolethree; ?>
                                            <?php } if ($talent->rolethree == null and $talent->roletwo == null and $talent->roleone == null) { ?>N/A<?php }?></span></li>
                                <?php }?>

                                <!-- if there is no first name do not display anything -->
                                <?php if ($talent->firstname != null) { ?>
                                    <li><strong>First Name:</strong> <span><?=$talent-> firstname?></span></li><?php } ?>

                                <!-- if there is no last name do not display anything -->
                                <?php if ($talent->lastname != null) { ?>
                                    <li><strong>Last Name:</strong> <span><?=$talent-> lastname?></span></li><?php } ?>

                                <!-- if there is no phone number do not display anything -->
                                <?php if ($talent->mobile != null) { ?>
                                    <li><strong>Phone Number:</strong> <span><?=$talent-> mobile?></span></li><?php } ?>

                                <!-- if there is no street name do not display anything -->
                                <?php if ($talent->address != null) { ?>
                                    <li><strong>Street:</strong> <span><?=$talent-> address?></span></li><?php } ?>

                                <!-- if there is no suburb name do not display anything -->
                                <?php if ($talent->suburb != null) { ?>
                                    <li><strong>Suburb:</strong> <span><?=$talent-> suburb?></span></li><?php } ?>

                                <!-- if there is no postcode do not display anything -->
                                <?php if ($talent->postcode != null) { ?>
                                    <li><strong>Postcode:</strong> <span><?=$talent-> postcode?></span></li><?php } ?>

                                <!-- if there is no date of birth do not display anything -->
                                <?php if ($talent->dob != null) { ?>
                                    <li><strong>Date of Birth:</strong> <span><?=$talent-> dob?></span></li><?php } ?>

                                <!-- if there is no email do not display anything -->
                                <?php if ($talent->email != null) { ?>
                                    <li><strong>Email Address:</strong> <span><?=$talent-> email?></span></li><?php } ?>

                                <!-- if there is no eye colour do not display anything -->
                                <?php if ($talent->eye != null) { ?>
                                    <li><strong>Eye Colour:</strong> <span><?=$talent-> eye?></span></li><?php } ?>

                                <!-- if there is no hair colour do not display anything -->
                                <?php if ($talent->hair != null) { ?>
                                    <li><strong>Hair Colour:</strong> <span><?=$talent-> hair?></span></li><?php } ?>

                                <!-- if there is no age range data do not display anything -->
                                <?php if ($talent->agerangethree != null or $talent->agerangetwo != null or $talent->agerangeone != null) { ?>
                                    <li><strong>Age Range:</strong> <span><?php if ($talent->agerangeone != null) { ?>
                                                <?= $talent->agerangeone;?>
                                            <?php } if ($talent->agerangetwo != null and $talent->agerangeone != null) { ?>|
                                            <?php } if ($talent->agerangetwo != null) { ?>
                                                <?= $talent->agerangetwo; ?>
                                            <?php } if ($talent->agerangetwo != null and $talent->agerangethree != null) { ?>|
                                            <?php } if ($talent->agerangethree != null) { ?>
                                                <?= $talent->agerangethree; ?>
                                            <?php } if ($talent->agerangethree == null and $talent->agerangetwo == null and $talent->agerangeone == null) { ?>N/A<?php }?></span></li>
                                <?php }?>

                                <!-- if there is no category data do not display anything -->
                                <?php if ($talent->category != null or $talent->categorytwo != null or $talent->categorythree != null) { ?>
                                    <li><strong>Skills:</strong> <span>
                                        <?php if ($talent->category != null) { ?>
                                            <?= $talent->category;?>
                                        <?php } if ($talent->categorytwo != null and $talent->category != null) { ?>|
                                            <?= $talent->categorytwo; ?>
                                        <?php } if ($talent->categorythree != null and $talent->categorytwo != null)  { ?>|
                                            <?= $talent->categorythree; ?>
                                        <?php } if ($talent->category == null and $talent->categorytwo == null and $talent->categorythree == null) { ?>N/A<?php }?>
                                    </span></li>
                                <?php }?>

                                <!-- if there is no gender data do not display anything -->
                                <?php if ($talent->gender != null) { ?>
                                    <li><strong>Gender:</strong> <span><?=$talent-> gender?></span></li><?php } ?>

                                <!-- if there is no height data do not display anything -->
                                <?php if ($talent->height != null) { ?>
                                    <li></i> <strong>Height:</strong> <span><?=$talent-> height?><?php if ($talent->height != null) { ?>cm <?php } ?></span></li><?php } ?>

                                <!-- if there is no location data do not display anything -->
                                <?php if ($talent->location->name != null) { ?>
                                    <li></i> <strong>Location:</strong> <span><?=$talent->location->name?></span></li><?php } ?>

                                <!-- if there is availability data do not display anything -->
                                <?php if ($talent->availability != null) { ?>
                                    <li><strong>Availability:</strong> <span><?=$talent-> availability?></span></li><?php } ?>

                                <!-- if there is experience data do not display anything -->
                                <?php if ($talent->experience != null) { ?>
                                    <li><strong>Experience:</strong> <span><?=$talent-> experience?></span></li><?php } ?>

                                <!-- if there is no nudity data do not display anything -->
                                <?php if ($talent->nudity != null) { ?>
                                    <li><strong>Nudity:</strong> <span><?=$talent-> nudity?></span></li><?php } ?>

                                <!-- if there is no tattoo data do not display anything -->
                                <?php if ($talent->tattoos != null) { ?>
                                    <li><strong>Tattoos:</strong> <span><?=$talent-> tattoos?></span></li><?php } ?>

                                <!-- if there is no body modification data do not display anything -->
                                <?php if ($talent->bodymod != null) { ?>
                                    <li><strong>Body Modifications:</strong> <span><?=$talent-> bodymod?></span></li><?php } ?>

                                <!-- if there is no piercing data do not display anything -->
                                <?php if ($talent->piercing != null) { ?>
                                    <li><strong>Piercings:</strong> <span><?=$talent-> piercing?></span></li><?php } ?>

                                <!-- if there is no physical differences data do not display anything -->
                                <?php if ($talent->differences != null) { ?>
                                    <li><strong>Physical Differences:</strong> <span><?=$talent-> differences?></span></li><?php } ?>

                                <!-- if there is no car data do not display anything -->
                                <?php if ($talent->car != null) { ?>
                                    <li><strong>Have a car:</strong> <span><?php if ($talent-> car == 1) { ?>Yes<?php } else {?>No<?php } ?></span></li><?php } ?>

                                <!-- if there is no driver's licence data do not display anything -->
                                <?php if ($talent->licence != null) { ?>
                                    <li><strong>Have a drivers licence:</strong> <span><?php if ($talent-> licence == 1) { ?>Yes<?php } else {?>No<?php } ?></span></li><?php } ?>


                            </ul>
                        </div>
                        <!-- If need more space for details -->
                        <div class="col-lg-6">
                            <ul>



                                <!--<li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>Master</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong> <span>email@example.com</span></li>
                                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li> -->
                            </ul>
                        </div>

                    </div>
                    <!-- if there is no social media data do not display anything -->
                    <?php if ($talent->bio != null){?>
                        <p class="py-3">
                        <h6>Social Media Links</h6>
                        <?=$talent->bio?>
                        </p>
                    <?php } ?>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Media Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">

            <!-- if there is no media data do not display anything -->
            <?php if (($talent->mediathree != null and $talent->mediathree != "user-img/") or ($talent->mediatwo != null and $talent->mediatwo != "user-img/") or ($talent->mediaone != null and $talent->mediaone != "user-img/")) { ?>

                <div class="section-header">
                    <h2>Medias </h2>
                    <p>Medias</p>
                </div>
            <?php } ?>

            <div class="slides-3 swiper">
                <div class="swiper-wrapper">
                    <!-- loop through each of the three medias and display the data if it exists -->
                    <?php foreach ([$talent->mediaone,$talent->mediatwo,$talent->mediathree] as $medias): ?>
                    <?php if ($medias != null and $medias != "" and $medias != "user-img/"){?>
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="profile mt-auto">
                                    <img class="img-fluid" alt="user1" <?= @$this->Html->image($medias); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php endforeach; ?>
                    <!-- End media item -->

                </div>
            </div>
        </div>
        </div>

        </div>
    </section>

    <!-- End Medias Section -->

</main>
<div id="bottom"></div>
