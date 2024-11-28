<!DOCTYPE html>
<html lang="en">

<?php require('components/head.php');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/profile.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/product.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/groomingcenter.css">  
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/custom/css/addpet.css">

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
                                    <h4> <span class='first_name'></span> <span class='last_name'></span> <i id='edit_user_profile' class='fa-fa-edit c-pointer'></i></h4>
                                    <span>Joined April 06, 2024</span>
                                </div>
                            </div>
                            <div class="order-his-page">
                                <ul class="profile-ul">
                                    <li class="profile-li"><a data-tap="#manage-profile" class="change-profile-tap active">Profile</a></li>
                                    <li class="profile-li"><a data-tap="#manage-address" class="change-profile-tap">Manage Address</a></li>
                                    <li class="profile-li"><a data-tap="#manage-pet" class="change-profile-tap">Manage Pet</a></li>
                                </ul>
                            </div>
                        </div>

                        
                        <div class="profile-form active" id="manage-profile">
                            <span class="groom-title">Profile information </span> 
                            <form>
                                <ul class="pro-input-label">
                                    <li>
                                        <label>First name</label>
                                        <input class='first_name profile-input' type="text" name="first_name" placeholder="First name">
                                    </li>
                                    <li>
                                        <label>Last name</label>
                                        <input class='last_name profile-input' type="text" name="last_name" placeholder="Last name">
                                    </li>
                                </ul>
                                <ul class="pro-input-label">
                                    <li>
                                        <label>Email address</label>
                                        <input class='email_id profile-input' type="text" name="email_id" placeholder="Email address" required>
                                    </li>
                                    <li>
                                        <label>Phone number</label>
                                        <input class='mobile_number profile-input' type="text" name="mobile_number" placeholder="Phone number">
                                    </li>
                                </ul>
                            </form>
                        </div>

                        <div class="profile-form" id="manage-address">  
                            <div class="clinic-area">
                                <span class="groom-title">Manage your address details </span> 
                                <div class="row" id="address-list">
                                    <div class="col-md-3">
                                        <div class="card-skeleton">
                                            <div class="skeleton pad-55"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-skeleton">
                                            <div class="skeleton pad-55"> </div>
                                        </div>
                                    </div>  
                                    <div class="col-md-3">
                                        <div class="card-skeleton">
                                            <div class="skeleton pad-55"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-skeleton">
                                            <div class="skeleton pad-55"> </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>

                        <div class="profile-form" id="manage-pet">  
                            <div class="existing-pet-wrapper">
                                <span class="groom-title">Manage your pet details </span> 
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    
    <?php require('components/footer.php');?>
    <?php require('components/js.php');?>
    <?php require('components/pet_popup.php')?>
    <?php require('components/address_popup.php')?>

    <script src='<?= base_url() ?>/assets/custom/js/profile.js'></script>
    <script src='<?= base_url() ?>/assets/custom/js/pet-modal.js'></script>
    <script src='<?= base_url() ?>/assets/custom/js/address-modal.js'></script>

    <script>
    // $(document).ready(function() {
    //     $('.addresss').click(function() {
    //         $('#profile').addClass('d-none');
    //         $('#address').removeClass('d-none').addClass('d-inline');
    //         $('.addresss').addClass('active')
    //         $('.profilee').removeClass('active')

    //     });

    //     $('.profilee').click(function() {
    //         $('#address').addClass('d-none');
    //         $('#profile').removeClass('d-none').addClass('d-inline');
    //         $('.profilee').addClass('active')
    //         $('.addresss').removeClass('active')
    //     });
    // });
    // </script>
</body>

</html>