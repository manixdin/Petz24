<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php')?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/contact.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">


<?php require('components/header.php')?>


<body class="home-1">
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding">
            <div class="about-l">
                <img src="https://www.zigly.com/media/mageplaza/bannerslider/banner/image/c/o/contact_banner_zigly.png"
                    alt="" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="contact my-3">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="map-area">
                        <div class="map-title">
                            <h1>Contact us</h1>
                        </div>
                        <div class="map-details section-t-padding">
                            <div class="contact-info">
                                <div class="contact-details">
                                    <h4>Drop us message</h4>
                                    <form>
                                        <label>Your name</label>
                                        <input type="text" name="name" placeholder="Enter your name">
                                        <label>Ph No</label>
                                        <input type="number" name="phno" placeholder="Enter your Phone No">
                                        <label>Email address</label>
                                        <input type="text" name="Email" placeholder="Enter your email address">
                                        <label>Message</label>
                                        <textarea rows="5" placeholder="Your message hare..."></textarea>
                                    </form>
                                    <a href="index1.html" class="btn-style1">Submit <i class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="contact-info">
                                <div class="information">
                                    <h4>Get in touch</h4>
                                    <div class="contact-in">
                                        <ul class="info-details">
                                            <li><i class="fa fa-street-view"></i></li>
                                            <li>
                                                <h4>Address</h4>
                                                <p>Church Street,Banglore</p>
                                            </li>
                                        </ul>
                                        <ul class="info-details">
                                            <li><i class="fa fa-phone"></i></li>
                                            <li>
                                                <h4>Phone</h4>
                                                <a href="tel:12345678999">+ 0123 4567 8999</a>
                                            </li>
                                        </ul>
                                        <ul class="info-details">
                                            <li><i class="fa fa-envelope"></i></li>
                                            <li>
                                                <h4>Email</h4>
                                                <a href="mailto:yoursite@demo.com">yoursite@demo.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>






    <?php require('components/footer.php')?>
    <?php require('components/js.php')?>
</body>

</html>