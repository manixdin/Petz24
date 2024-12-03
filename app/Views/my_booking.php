<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/profile.css"> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/groomingcenter.css">   
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/my_booking.css">

<?php require('components/header.php');?>

<body class="home-1" id="profile-section">
    <section class="order-histry-area section-tb-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="order-history"> 
                        <div class="profile">
                            <div class="order-pro">
                                <div class="pro-img">
                                    <a href="javascript:void(0)"><img
                                            src="<?php echo base_url();?>assets/img/proffessor.jpg" alt="img"
                                            class="img-fluid" width="90px" height="90px"></a>
                                </div>
                                <div class="order-name">
                                    <h4> <span class='first_name'></span> <span class='last_name'></span></h4>
                                </div>
                            </div>
                            <div class="order-his-page">
                                <ul class="profile-ul">
                                    <li class="profile-li"><a data-tap="#manage-profile" class="change-profile-tap active">Bookings</a></li> 
                                </ul>
                            </div>
                        </div> 
                        <div class="profile-form active" id="manage-profile">  
                            <div class="clinic-area">
                                <span class="groom-title pb-2">Upcoming Bookings </span> 
                                <div class="row" id="upcoming-booking">
                                    <div class="col-md-6">
                                        <div class="card-skeleton">
                                            <div class="skeleton pad-25"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-skeleton">
                                            <div class="skeleton pad-25"> </div>
                                        </div>
                                    </div>    
                                </div>
                                <span class="groom-title pb-2">Past Bookings </span> 
                                <div class="row" id="past-booking">   
                                    <div class="col-md-6">
                                        <div class="card-skeleton">
                                            <div class="skeleton pad-25"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-skeleton">
                                            <div class="skeleton pad-25"> </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div> 
                   

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    
    <?php require('components/footer.php');?>
    <?php require('components/js.php');?>  
    <script src='<?= base_url() ?>/assets/custom/js/my_booking.js'></script> 
</body>

</html>