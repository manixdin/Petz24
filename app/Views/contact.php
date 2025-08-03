<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php')?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/termsandcondition.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">


<?php require('components/header.php')?>


<body class="home-1">



    <section class="about-breadcrumb padding-top-custom">
        <div class="about-back p-5" style="background-image:url(<?= base_url();?>assets/img/home_banner/2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <ul class="about-link">
                                <!-- <li class="go-home"><a href="index1.html">Home</a></li> -->
                                <!-- <li class="about-p"><span>Terms & conditions</span></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- faq's collapse start -->
<section class="contactus-info-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="contactus-card p-4 shadow rounded-4 text-center animate__animated animate__fadeInUp">
                        <div class="contactus-icon mb-3">
                            <i class="fa fa-envelope fa-3x text-primary"></i>
                        </div>

                         <h2 class="mb-3">Get in Touch</h2>
                        <p class="mb-4">For any queries, suggestions, or support, feel free to contact us via the details below. Our team will get back to you as soon as possible!</p>
                        <div class="contactus-details mb-3">
                            <div class="mb-2">
                                <i class="fa fa-phone me-2 text-success"></i>
                                <span class="fw-semibold" id="support-phone"></span>
                            </div>
                            <div>
                                <i class="fa fa-envelope me-2 text-danger"></i>
                                <span class="fw-semibold" id="support-email"></span>
                            </div>
                        </div>
                        <!-- <div class="contactus-social mt-4">
                            <a href="#" class="btn btn-outline-primary btn-floating mx-1"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn btn-outline-info btn-floating mx-1"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-floating mx-1"><i class="fa fa-instagram"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php require('components/footer.php')?>
    <?php require('components/js.php')?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
    <script src='<?= base_url() ?>/assets/custom/js/contact.js'></script>


</body>

</html>