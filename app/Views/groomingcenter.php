<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php')?>

<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/custom/css/groomingcenter.css">
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/custom/css/profile.css">
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/responsive.css">

<?php require('components/header.php')?>

<body class="home-1">

    <section class="section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="track-area">
                        <div class="track-main">
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

                    <a id="next" class="btn btn-style1-custom-1 my-5 ">Next </a>


                    <!-- ALREADY ADDED PET START-->
                    <div class="existing-pet-wrapper my-5">
                        <span class="groom-title">Select A Pet You Want Groomed:</span>

                        <div class="row">
                            <div class="col-lg-4 my-2 my-lg-0">
                                <div class="existing-pet p-3">
                                    <div class="edit-delete text-end p-1 m-1">
                                        <i class="fa fa-pencil mx-2" aria-hidden="true"></i>
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </div>
                                    <div class="pets-details-wrapper d-flex justify-content-between align-items-center">
                                        <div class="pets-image">
                                            <img src="https://www.zigly.com/static/version1710913419/frontend/Amasty/JetTheme_child/en_US/Zigly_Managepets/images/ava_dog-1.png"
                                                alt="" class="img-fluid">
                                        </div>
                                        <div class="pets-details">
                                            <span class="pet-name d-block">Julie</span>
                                            <span class="pet-breed d-block">Indian Spitz</span>
                                            <span class="pet-age d-block">4 Years 5 Months </span>


                                        </div>

                                    </div>
                                    <a href="petz:;" class="btn btn-style1-custom">Select</a>

                                </div>
                            </div>
                            <div class="col-lg-4 my-2 my-lg-0">
                                <div class="existing-pet p-3">
                                    <div class="edit-delete text-end p-1 m-1">
                                        <i class="fa fa-pencil mx-2" aria-hidden="true"></i>
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </div>
                                    <div class="pets-details-wrapper d-flex justify-content-between align-items-center">
                                        <div class="pets-image">
                                            <img src="https://www.zigly.com/static/version1710913419/frontend/Amasty/JetTheme_child/en_US/Zigly_Managepets/images/ava_dog-1.png"
                                                alt="" class="img-fluid">
                                        </div>
                                        <div class="pets-details">
                                            <span class="pet-name d-block">Gwen</span>
                                            <span class="pet-breed d-block">Golder Retriver</span>
                                            <span class="pet-age d-block">2 Years 0 Months </span>


                                        </div>

                                    </div>
                                    <a href="petz:;" class="btn btn-style1-custom">Select</a>

                                </div>
                            </div>
                            <div class="col-lg-4 my-2 my-lg-0">
                                <div class="add-pet-wrapper">
                                    <span class="new-pet-text"><i class="fa fa-plus" aria-hidden="true"></i>Add New
                                        Pet</span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ALREADY ADDED PET ENDS -->

                    <!-- Pricing page start -->
                    <div class="pricing-area">
                        <div class='containerrr'>
                            <div class='carddd'>
                                <div class='carddd__info' style='background-image: url()'>
                                    <h5 class='carddd__name'>ESSENTIALS PACKAGE</h5>
                                    <p class='card__price' style='color: var(--color05)'>1399.00<span
                                            class='card__priceSpan'>/75mins</span></p>
                                </div>
                                <div class='carddd__content' style='border-color: var(--color05)'>
                                    <div class='carddd__rows'>
                                        <p class='carddd__row'>Hair Cut</p>
                                        <p class='carddd__row'>Cleaning Packgage</p>
                                        <p class='carddd__row'>Face & Feet Trin</p>
                                    </div>
                                    <a href='#emptyLink' class='carddd__link'
                                        style='background-color: var(--color02)'>Select</a>
                                </div>
                            </div>

                            <div class='carddd'>
                                <div class='carddd__info' style='background-image: url()'>
                                    <h5 class='carddd__name'>ALL IN ONE PACKAGE</h5>
                                    <p class='card__price' style='color: var(--color05)'>2099.00<span
                                            class='card__priceSpan'>/120mins</span></p>
                                </div>
                                <div class='carddd__content' style='border-color: var(--color05)'>
                                    <div class='carddd__rows'>
                                        <p class='carddd__row'>Hair Cut</p>
                                        <p class='carddd__row'>Cleaning Packgage</p>
                                        <p class='carddd__row'>Face & Feet Trin</p>
                                    </div>
                                    <a href='#emptyLink' class='carddd__link'
                                        style='background-color: var(--color02)'>Select</a>
                                </div>
                            </div>
                            <div class='carddd'>
                                <div class='carddd__info' style='background-image: url()'>
                                    <h5 class='carddd__name'>CUSTOMIZED PACKAGE</h5>
                                    <p class='card__price' style='color: var(--color05)'>4099.00<span
                                            class='card__priceSpan'></span></p>
                                </div>
                                <div class='carddd__content' style='border-color: var(--color05)'>
                                    <div class='carddd__rows'>
                                        <p class='carddd__row'>Hair Cut</p>
                                        <p class='carddd__row'>Cleaning Packgage</p>
                                        <p class='carddd__row'>Face & Feet Trin</p>
                                    </div>
                                    <a href='#emptyLink' class='carddd__link'
                                        style='background-color: var(--color02)'>Select</a>
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

                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>
            </div>
            <!-- TIME SLOT ENDS -->


            <!-- SELECT CENTER START -->
            <div class="clinic-area">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="center-wrapper m-2 p-4">
                            <span>New Delhi</span>
                            <span>A-1, Ground Floor, Block A, Kailash Colony, Near Kailash Colony Metro Station - Metro
                                Pillar No. 89
                                Delhi - 110048</span>
                            <a href="petz:;" class="btn btn-style1-custom">Select</a>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="center-wrapper m-2 p-4">
                            <span>New Delhi</span>
                            <span>A-1, Ground Floor, Block A, Kailash Colony, Near Kailash Colony Metro Station - Metro
                                Pillar No. 89
                                Delhi - 110048</span>
                            <a href="petz:;" class="btn btn-style1-custom">Select</a>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="center-wrapper m-2 p-4">
                            <span>New Delhi</span>
                            <span>A-1, Ground Floor, Block A, Kailash Colony, Near Kailash Colony Metro Station - Metro
                                Pillar No. 89
                                Delhi - 110048</span>
                            <a href="petz:;" class="btn btn-style1-custom">Select</a>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="center-wrapper m-2 p-4">
                            <span>New Delhi</span>
                            <span>A-1, Ground Floor, Block A, Kailash Colony, Near Kailash Colony Metro Station - Metro
                                Pillar No. 89
                                Delhi - 110048</span>
                            <a href="petz:;" class="btn btn-style1-custom">Select</a>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="center-wrapper m-2 p-4">
                            <span>New Delhi</span>
                            <span>A-1, Ground Floor, Block A, Kailash Colony, Near Kailash Colony Metro Station - Metro
                                Pillar No. 89
                                Delhi - 110048</span>
                            <a href="petz:;" class="btn btn-style1-custom">Select</a>

                        </div>
                    </div>
                </div>
            </div>


            <!-- SELECT CENTER ENDS -->



        </div>
        <!-- REVIEW SECTION START -->

        <div class="review-area">
            <div class="container bg-F9F9EB p-5 my-3">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="left-side-wrapper">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div
                                            class="package-wrapper d-flex justify-content-center align-items-center flex-column">
                                            <img src="https://www.zigly.com/media/plan/feature/Essential_Package.png"
                                                alt="" class="img-fluid d-block my-2">
                                            <span class="package-name d-block my-2">ESSENTIALS PACKAGE</span>
                                            <span class="duration d-block my-2"><i class="fa fa-clock-o px-2"
                                                    aria-hidden="true"></i> 75Mins</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="other-detail">
                                            <span class="pet-name-review d-block">For Julie</span>
                                            <span class="booking-date d-block"><i class="fa fa-calendar-check-o"
                                                    aria-hidden="true"></i> DATE: 26 MAR '24</span>
                                            <span class="booking-time d-block"><i class="fa fa-clock-o"
                                                    aria-hidden="true"></i> TIME: 10:00 AM</span>
                                            <span class="booking-place"><i class="fa fa-map-marker"
                                                    aria-hidden="true"></i>
                                                CENTER:</span>
                                            <span class="center-address">S-4, Green Park (Ground Floor), Main Market New
                                                Delhi, Delhi, Delhi - 110016</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 border-lefttt my-3 my-lg-0">
                        <div class="booking-amount d-flex justify-content-between align-items-center flex-column">
                            <span class="amount-text mb-2">Amount</span>
                            <span class="amount">₹1,399.00</span>
                        </div>
                        <a href="petz:;" class="btn btn-style1-custom my-5">Make Payment</a>

                    </div>
                </div>
            </div>
        </div>



        <!-- REVIEW SECTION ENDS -->
    </section>






    <?php require('components/footer.php')?>
    <?php require('components/js.php')?>

    <script>
    $(document).ready(function() {
        var level = 0;
        $('.pricing-area').hide();
        $('.time-slot').hide();
                $('.clinic-area').hide();
                $('.review-area').hide();


        $('#next').click(function() {
            level++;

            if (level == 1) {
                $('.existing-pet-wrapper').hide()
                $('.pricing-area').show();
                $('.level-1').addClass('active')

            } else if (level == 2) {
                $('.pricing-area').hide();
                $('.time-slot').show();
                $('.level-2').addClass('active')



            } else if (level == 3) {
                $('.time-slot').hide();
                $('.clinic-area').show();
                $('.level-3').addClass('active')



            } else if (level == 4) {
                $('.clinic-area').hide();
                $('.review-area').show();
                $('.level-4').addClass('active')



            }
        });
    });
    </script>
</body>

</html>