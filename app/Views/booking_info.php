<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php')?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/groomingcenter.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">


<?php require('components/header.php')?>


<body class="home-1">

    <section class="section-tb-padding"> 

        <!-- REVIEW SECTION START -->
        <div class="review-area py-2" style="background:#fff;">
            <div class="container px-5">
                <p class="mb-2"> 
                    <a href="<?php echo base_url();?>my-booking"> <i class="fa fa-chevron-left"></i> Back</a>
                </p>
                <h4 class="mb-4">Booking Information</h4>
                <div class="row mb-4">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="left-side-wrapper">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class=" box-shadow package-wrapper d-flex justify-content-center align-items-center flex-column p-2">
                                            <img id="review-plan-image" alt="" class="img-fluid d-block my-2">
                                            <span class="package-name d-block my-2" id="review-plan-name"></span>
                                            <span class="duration d-block mb-3 mt-2">Duration : <span id="review-plan-duration"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="other-detail">
                                            <span class="pet-name-review d-block pt-2">For <span id="review-pet-name"></span></span>
                                            <span class="booking-date d-block">
                                                <span class="summary-width"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp; DATE </span> :
                                                <span id="review-plan-date"></span>
                                            </span>
                                            <span class="booking-time d-block">
                                                <span class="summary-width"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; TIME </span> :
                                                <span id="review-timeslot"> </span>
                                            </span>
                                            <span class="booking-place">
                                                <span class="summary-width"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; ADDRESS </span> :
                                                <span class="center-address display-inline" id="review-address"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  my-3 my-lg-0">  
                        <div class="other-detail" id="bookingData">
                            <span class="pet-name-review d-block pt-2"> &nbsp;</span>
                            <span class="booking-date d-block">
                                <span class="summary-width"><i class="fa fa-money" aria-hidden="true"></i>&nbsp; Amount </span> :
                                <span id="review-amount"></span>
                            </span>
                            <span class="booking-time d-block">
                                <span class="summary-width"><i class="fa fa-legal" aria-hidden="true"></i>&nbsp; Payment Status  </span> :
                                <span class="payment-status"> </span>
                            </span>
                            <span class="booking-place">
                                <span class="summary-width"><i class="fa fa-check-square-o" aria-hidden="true"></i>&nbsp; Booking Status  </span> :
                                <span class="payment-status"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- REVIEW SECTION ENDS -->
    </section>

    <?php require('components/footer.php')?>
    <?php require('components/js.php')?>

    <script src='<?= base_url() ?>/assets/custom/js/booking_info.js'></script>

</body>

</html>