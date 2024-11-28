<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php')?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/groomingcenter.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/profile.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/addpet.css">


<?php require('components/header.php')?>


<body class="home-1">

    <section class="section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="track-area">
                        <div class="track-main border-top-0"> 
                            <div class="action-container text-end">
                                <a id="back-btn" class="btn btn-style1-custom-1 mx-2">Back</a>
                                <a id="next" class="btn btn-style1-custom-1">Next</a>
                            </div> 
                            <div class="track">
                                <div class="step level-0 active">
                                    <span class="icon"><i class="fa fa-check"></i></span>
                                    <span class="text">Select Pets(s)</span>
                                </div>
                                <div class="step level-1">
                                    <span class="icon"><i class="fa fa-user"></i></span>
                                    <span class="text">Select Plan</span>
                                </div>
                                <div class="step level-2">
                                    <span class="icon"><i class="fa fa-truck"></i></span>
                                    <span class="text">Select Time Slot</span>
                                </div>
                                <div class="step level-3">
                                    <span class="icon"><i class="fa fa-archive"></i>
                                    </span> <span class="text">Select Center</span>
                                </div>
                                <div class="step level-4">
                                    <span class="icon"><i class="fa fa-archive"></i>
                                    </span> <span class="text">Review Booking</span>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- ALREADY ADDED PET START-->
                    <div class="existing-pet-wrapper my-5">
                        <span class="groom-title">Select A Pet You Want Groomed:</span> 
                        <div class="row" id="user-pet-list"> 
                            <div class="col-md-3">
                                <div class="card-skeleton">
                                    <div class="skeleton pad-55"> </div>
                                    <div class="skeleton pad-15 mt-2"> </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-skeleton">
                                    <div class="skeleton pad-55"> </div>
                                    <div class="skeleton pad-15 mt-2"> </div>
                                </div>
                            </div>  
                            <div class="col-md-3">
                                <div class="card-skeleton">
                                    <div class="skeleton pad-55"> </div>
                                    <div class="skeleton pad-15 mt-2"> </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-skeleton">
                                    <div class="skeleton pad-55"> </div>
                                    <div class="skeleton pad-15 mt-2"> </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <!-- ALREADY ADDED PET ENDS --> 
                    <!-- Pricing page start -->
                    <div class="pricing-area pt-4">
                        <div class='containerrr' id="pricing-list">  
                            <div class="carddd skeleton-carddd-shadow">
                                <div class="card-skeleton">
                                    <div class="skeleton pad-30 skeleton-title"> </div> 
                                    <div class="skeleton pad-25 skeleton-img mb-4"> </div> 
                                    <div class="skeleton pad-15 mt-2 mb-4"> </div> 
                                    <div class="skeleton pad-25 mt-2"> </div> 
                                    <div class="skeleton pad-25 mt-1"> </div>   
                                    <div class="skeleton pad-10 mt-4"> </div> 
                                </div>
                            </div> 
                            <div class="carddd skeleton-carddd-shadow">
                                <div class="card-skeleton">
                                    <div class="skeleton pad-30 skeleton-title"> </div> 
                                    <div class="skeleton pad-25 skeleton-img mb-4"> </div> 
                                    <div class="skeleton pad-15 mt-2 mb-4"> </div> 
                                    <div class="skeleton pad-25 mt-2"> </div> 
                                    <div class="skeleton pad-25 mt-1"> </div>   
                                    <div class="skeleton pad-10 mt-4"> </div> 
                                </div>
                            </div> 
                            <div class="carddd skeleton-carddd-shadow">
                                <div class="card-skeleton">
                                    <div class="skeleton pad-30 skeleton-title"> </div> 
                                    <div class="skeleton pad-25 skeleton-img mb-4"> </div> 
                                    <div class="skeleton pad-15 mt-2 mb-4"> </div> 
                                    <div class="skeleton pad-25 mt-2"> </div> 
                                    <div class="skeleton pad-25 mt-1"> </div>   
                                    <div class="skeleton pad-10 mt-4"> </div> 
                                </div>
                            </div> 

                        </div>
                    </div>
                    <!-- pricing page ends -->
                </div>
            </div>
            <!-- TIME SLOT START -->
            <div class="time-slot">
                <div class="row">
                    <div class="col-lg-6"> 
                        <div id="calendar-container">
                            <p class="mb-4">Note: Date will be selectable for next 7 days</p>
                            <div id="calendar-header">
                                <button id="prev-month"><i class="ionicons ion-android-arrow-dropleft-circle"></i></button>
                                <span id="month-year"></span>
                                <button id="next-month"><i class="ionicons ion-android-arrow-dropright-circle"></i></button>
                            </div>
                            <div id="calendar"></div>
                        </div>    
                    </div>
                    <div class="col-lg-6"> 
                        <div id="timeSlot"> 
                            <h4><i class="ionicons ion-android-time"></i> Select Time</h4>
                            <div id="calendar-timeSlot">
                                <div class="timeslot-list">

                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            <!-- TIME SLOT ENDS -->


            <!-- SELECT CENTER START -->
            <div class="clinic-area">
                <div class="row" id="address-list">
                    <div class="col-md-3">
                        <div class="card-skeleton">
                            <div class="skeleton pad-55"> </div>
                            <div class="skeleton pad-15 mt-2"> </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-skeleton">
                            <div class="skeleton pad-55"> </div>
                            <div class="skeleton pad-15 mt-2"> </div>
                        </div>
                    </div>  
                    <div class="col-md-3">
                        <div class="card-skeleton">
                            <div class="skeleton pad-55"> </div>
                            <div class="skeleton pad-15 mt-2"> </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-skeleton">
                            <div class="skeleton pad-55"> </div>
                            <div class="skeleton pad-15 mt-2"> </div>
                        </div>
                    </div>  
                </div>
            </div>


            <!-- SELECT CENTER ENDS -->



        </div>

        <!-- REVIEW SECTION START -->
        <div class="review-area py-3" style="">
            <div class="container p-5 my-3">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="left-side-wrapper">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class=" box-shadow package-wrapper d-flex justify-content-center align-items-center flex-column p-2">
                                            <img id="review-plan-image" alt="" class="img-fluid d-block my-2" src="admin/uploads/pet/1729068173_9b635871766923b230a5.png">
                                            <span class="package-name d-block my-2" id="review-plan-name"></span>
                                            <span class="duration d-block mb-3 mt-2">Duration : <b id="review-plan-duration"></b></span>
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
                    <div class="col-lg-3  my-3 my-lg-0"> 
                        <div class="box-shadow p-4 text-center">
                            <div class="booking-amount d-flex justify-content-center align-items-center flex-column">
                                <span class="amount-text mb-2">Amount</span>
                                <span class="amount">₹ <b id="review-amount"></b></span>
                            </div>
                            <a href="petz:;" class="btn btn-style1-custom my-4 make-payment">Make Payment</a>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- REVIEW SECTION ENDS -->
    </section>

    <?php require('components/pet_popup.php')?>
    <?php require('components/address_popup.php')?>

    <?php require('components/footer.php')?>
    <?php require('components/js.php')?>

    <script src='<?= base_url() ?>/assets/custom/js/booking.js'></script>
    <script src='<?= base_url() ?>/assets/custom/js/pet-modal.js'></script>
    <script src='<?= base_url() ?>/assets/custom/js/address-modal.js'></script>

</body>

</html>