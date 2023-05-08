<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<!DOCTYPE html>
<html lang="en">

<?= $this->Html->css('bootstrap.css') ?>
<?= $this->Html->css('swiper-bundle.min.css') ?>
<?= $this->Html->css('glightbox.css') ?>
<?= $this->Html->css('bootstrap-icons.css') ?>


<!-- Template Main CSS File -->
<?= $this->Html->css('viewstyles.css') ?>

<!-- ======= Header ======= -->

<main id="main" data-aos="fade" data-aos-delay="1500">

    <!-- ======= End Page Header ======= -->
    <div class="page-header d-flex align-items-center">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Reset Password</h2>

                </div>
            </div>
        </div>
    </div><!-- End Page Header -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center mt-2">
                <div class="col-lg-5">
                    <?= $this->Form->create(); ?>
                    <div class="row justify-content-center mt-2">
                        <div class="col-md-6 form-group ">
                            <?php echo $this->Form->control('password', ['label'=>'Password:  ']);?>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <br>
                        <div class="col-md-6 form-group ">
                            <?= $this->Form->button(__('Change Password'),['class'=>'text-center']) ?>
                        </div>
                    </div>

                    </form>
                </div>
                <?= $this->Form->end();?><!-- End Contact Form -->

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="container">

    </div>
</footer><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->


</body>

</html>
